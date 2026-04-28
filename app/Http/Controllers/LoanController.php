<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoanController extends Controller
{
    public function index(): View
    {
        $loans = Loan::with('member')->latest()->paginate(15);

        return view('loans.index', compact('loans'));
    }

    public function create(): View
    {
        $user = Auth::user();

        // Members can only request loans for themselves
        if ($user->isMember()) {
            $member = $user->member;
            if (!$member) {
                abort(403, 'Your user account is not linked to a member profile.');
            }
            return view('loans.create', ['members' => collect([$member]), 'lockedMember' => true]);
        }

        $members = Member::where('status', 'active')->orderBy('name')->get();
        return view('loans.create', compact('members'));
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $rules = [
            'amount'        => ['required', 'numeric', 'min:0.01'],
            'interest_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'due_date'      => ['nullable', 'date', 'after_or_equal:today'],
        ];

        // Members can only request loans for themselves
        if ($user->isMember()) {
            $member = $user->member;
            if (!$member) {
                abort(403, 'Your user account is not linked to a member profile.');
            }
            $data['member_id'] = $member->id;
        } else {
            $rules['member_id'] = ['required', 'exists:members,id'];
        }

        $data = $request->validate($rules);

        // For members, add their own member_id after validation
        if ($user->isMember()) {
            $data['member_id'] = $user->member->id;
        }

        $data['status']            = 'pending';
        $data['balance_remaining'] = $data['amount'];
        $data['interest_rate']     = $data['interest_rate'] ?? 0;

        Loan::create($data);

        return redirect()->route('loans.index')
            ->with('status', 'Loan application submitted.');
    }

    public function show(Loan $loan): View
    {
        $repayments = $loan->repayments()->latest()->paginate(10);

        return view('loans.show', compact('loan', 'repayments'));
    }

    public function edit(Loan $loan): View
    {
        $this->authorizeAdmin();
        $members = Member::where('status', 'active')->orderBy('name')->get();

        return view('loans.edit', compact('loan', 'members'));
    }

    public function update(Request $request, Loan $loan): RedirectResponse
    {
        $this->authorizeAdmin();
        $data = $request->validate([
            'amount'         => ['required', 'numeric', 'min:0.01'],
            'interest_rate'  => ['nullable', 'numeric', 'min:0', 'max:100'],
            'due_date'       => ['nullable', 'date', 'after_or_equal:today'],
            'approval_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $loan->update($data);

        return redirect()->route('loans.show', $loan)
            ->with('status', 'Loan updated.');
    }

    public function destroy(Loan $loan): RedirectResponse
    {
        $this->authorizeAdmin();
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('status', 'Loan record removed.');
    }

    public function approve(Loan $loan): RedirectResponse
    {
        $this->authorizeAdmin();
        $loan->update([
            'status'        => 'approved',
            'approved_date' => now(),
        ]);

        return redirect()->route('loans.index')
            ->with('status', 'Loan approved.');
    }

    public function reject(Request $request, Loan $loan): RedirectResponse
    {
        $this->authorizeAdmin();
        $data = $request->validate([
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $loan->update([
            'status'         => 'rejected',
            'approval_notes' => $data['notes'] ?? null,
        ]);

        return redirect()->route('loans.index')
            ->with('status', 'Loan rejected.');
    }

    public function pendingLoans(): View
    {
        $loans = Loan::where('status', 'pending')
            ->with('member')
            ->latest()
            ->paginate(15);

        return view('loans.pending', compact('loans'));
    }

    public function outstandingLoans(): View
    {
        $loans = Loan::where('status', 'approved')
            ->where('balance_remaining', '>', 0)
            ->with('member')
            ->latest()
            ->paginate(15);

        return view('loans.outstanding', compact('loans'));
    }
}
