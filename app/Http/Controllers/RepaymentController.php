<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Repayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RepaymentController extends Controller
{
    public function index(): View
    {
        $repayments = Repayment::with(['loan', 'member'])->latest()->paginate(20);

        return view('repayments.index', compact('repayments'));
    }

    public function create(): View
    {
        $loans = Loan::where('status', 'approved')
            ->where('balance_remaining', '>', 0)
            ->with('member')
            ->orderByDesc('id')
            ->get();

        return view('repayments.create', compact('loans'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'loan_id' => ['required', 'exists:loans,id'],
            'amount'  => ['required', 'numeric', 'min:0.01'],
            'date'    => ['required', 'date'],
            'notes'   => ['nullable', 'string', 'max:500'],
        ]);

        $loan = Loan::findOrFail($data['loan_id']);
        $data['member_id'] = $loan->member_id;

        Repayment::create($data);

        $this->recomputeLoanBalance($loan);

        return redirect()->route('repayments.index')
            ->with('status', 'Repayment recorded successfully.');
    }

    public function show(Repayment $repayment): View
    {
        return view('repayments.show', compact('repayment'));
    }

    public function edit(Repayment $repayment): View
    {
        $loans = Loan::where('status', 'approved')
            ->where('balance_remaining', '>', 0)
            ->with('member')
            ->get();

        return view('repayments.edit', compact('repayment', 'loans'));
    }

    public function update(Request $request, Repayment $repayment): RedirectResponse
    {
        $data = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'date'   => ['required', 'date'],
            'notes'  => ['nullable', 'string', 'max:500'],
        ]);

        $repayment->update($data);

        $this->recomputeLoanBalance($repayment->loan);

        return redirect()->route('repayments.show', $repayment)
            ->with('status', 'Repayment updated.');
    }

    public function destroy(Repayment $repayment): RedirectResponse
    {
        $loan = $repayment->loan;
        $repayment->delete();

        $this->recomputeLoanBalance($loan);

        return redirect()->route('repayments.index')
            ->with('status', 'Repayment removed.');
    }

    public function loanRepayments(Loan $loan): View
    {
        $repayments  = $loan->repayments()->latest()->paginate(10);
        $totalRepaid = $repayments->sum('amount');

        return view('repayments.loan-history', compact('loan', 'repayments', 'totalRepaid'));
    }

    public function overdueLoans(): View
    {
        $loans = Loan::where('status', 'approved')
            ->where('due_date', '<', now())
            ->where('balance_remaining', '>', 0)
            ->with('member')
            ->latest()
            ->paginate(15);

        return view('repayments.overdue', compact('loans'));
    }

    /**
     * Recompute the loan's outstanding balance and transition its status when
     * fully repaid (or revert to `approved` if a deletion re-opens it).
     */
    private function recomputeLoanBalance(Loan $loan): void
    {
        $totalRepaid = $loan->repayments()->sum('amount');
        $newBalance  = max(0, $loan->amount - $totalRepaid);

        $status = $newBalance == 0 ? 'fully_repaid'
            : ($loan->status === 'fully_repaid' ? 'approved' : $loan->status);

        $loan->update([
            'status'            => $status,
            'balance_remaining' => $newBalance,
        ]);
    }
}
