<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LoanController extends Controller
{
    public function index(): View
    {
        $loans = Loan::with('member')->latest()->paginate(15);
        return view('loans.index', compact('loans'));
    }

    public function create(): View
    {
        $members = Member::where('status', 'active')->get();
        return view('loans.create', compact('members'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        // Remove _token from data
        unset($data['_token']);
        
        $data['status'] = 'pending';
        $data['balance_remaining'] = $data['amount'];

        Loan::create($data);
        return new Response('', 302, ['Location' => '/loans']);
    }

    public function show(Loan $loan): View
    {
        $repayments = $loan->repayments()->latest()->paginate(10);
        return view('loans.show', compact('loan', 'repayments'));
    }

    public function edit(Loan $loan): View
    {
        $members = Member::where('status', 'active')->get();
        return view('loans.edit', compact('loan', 'members'));
    }

    public function update(Request $request, Loan $loan)
    {
        $loan->update($request->all());
        return new Response('', 302, ['Location' => '/loans/' . $loan->id]);
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return new Response('', 302, ['Location' => '/loans']);
    }

    public function approve(Loan $loan)
    {
        $loan->update([
            'status' => 'approved',
            'approved_date' => now(),
        ]);

        return new Response('', 302, ['Location' => '/loans']);
    }

    public function reject(Request $request, Loan $loan)
    {
        $data = $request->all();
        $loan->update([
            'status' => 'rejected',
            'approval_notes' => $data['notes'] ?? '',
        ]);

        return new Response('', 302, ['Location' => '/loans']);
    }

    public function pendingLoans(): View
    {
        $loans = Loan::where('status', 'pending')->with('member')->latest()->paginate(15);
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
