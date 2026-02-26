<?php

namespace App\Http\Controllers;

use App\Models\Repayment;
use App\Models\Loan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
            ->get();

        return view('repayments.create', compact('loans'));
    }

    public function store(Request $request
    {
        $data = $request->all();
        
        // Remove _token from data
        unset($data['_token']);
        
        $loan = Loan::find($data['loan_id']);
        $data['member_id'] = $loan->member_id;

        Repayment::create($data);

        // Update loan balance
        $totalRepaid = $loan->repayments()->sum('amount');
        $newBalance = $loan->amount - $totalRepaid;

        if ($newBalance <= 0) {
            $loan->update(['status' => 'fully_repaid', 'balance_remaining' => 0]);
        } else {
            $loan->update(['balance_remaining' => $newBalance]);
        }

        return new Response('', 302, ['Location' => '/repayments']);
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

    public function update(Request $request, Repayment $repayment
    {
        $oldAmount = $repayment->amount;
        $repayment->update($request->all());

        // Recalculate loan balance
        $loan = $repayment->loan;
        $totalRepaid = $loan->repayments()->sum('amount');
        $newBalance = $loan->amount - $totalRepaid;

        if ($newBalance <= 0) {
            $loan->update(['status' => 'fully_repaid', 'balance_remaining' => 0]);
        } else {
            $loan->update(['balance_remaining' => $newBalance]);
        }

        return new Response('', 302, ['Location' => '/repayments/' . $repayment->id]);
    }

    public function destroy(Repayment $repayment
    {
        $loan = $repayment->loan;
        $repayment->delete();

        // Recalculate loan balance after deletion
        $totalRepaid = $loan->repayments()->sum('amount');
        $newBalance = $loan->amount - $totalRepaid;

        if ($newBalance <= 0) {
            $loan->update(['status' => 'fully_repaid', 'balance_remaining' => 0]);
        } else {
            $loan->update(['balance_remaining' => $newBalance]);
        }

        return new Response('', 302, ['Location' => '/repayments']);
    }

    public function loanRepayments(Loan $loan): View
    {
        $repayments = $loan->repayments()->latest()->paginate(10);
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
}
