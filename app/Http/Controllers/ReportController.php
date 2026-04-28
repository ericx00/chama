<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Repayment;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(): View
    {
        $totalMembers = Member::count();
        $totalContributions = Contribution::sum('amount');
        $totalLoansIssued = Loan::where('status', 'approved')->sum('amount');
        $totalOutstanding = Loan::where('status', 'approved')->sum('balance_remaining');
        $totalRepayments = Repayment::sum('amount');

        return view('reports.index', compact(
            'totalMembers',
            'totalContributions',
            'totalLoansIssued',
            'totalOutstanding',
            'totalRepayments'
        ));
    }

    public function contributionsPdf()
    {
        $contributions = Contribution::with('member')
            ->orderBy('date', 'desc')
            ->get();

        $totalContributions = $contributions->sum('amount');
        
        $pdf = Pdf::loadView('reports.contributions-pdf', [
            'contributions' => $contributions,
            'totalContributions' => $totalContributions,
        ]);

        return $pdf->download('contributions-report.pdf');
    }

    public function loansPdf()
    {
        $loans = Loan::with('member')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalLoansIssued = $loans->where('status', 'approved')->sum('amount');
        $totalOutstanding = $loans->where('status', 'approved')->sum('balance_remaining');
        
        $pdf = Pdf::loadView('reports.loans-pdf', [
            'loans' => $loans,
            'totalLoansIssued' => $totalLoansIssued,
            'totalOutstanding' => $totalOutstanding,
        ]);

        return $pdf->download('loans-report.pdf');
    }

    public function financialPdf()
    {
        $members = Member::all();
        $totalMembers = $members->count();
        $totalContributions = Contribution::sum('amount');
        $totalLoansIssued = Loan::where('status', 'approved')->sum('amount');
        $totalOutstanding = Loan::where('status', 'approved')->sum('balance_remaining');
        $totalLoansCount = Loan::where('status', 'approved')->count();
        $totalOutstandingCount = Loan::where('status', 'approved')->where('balance_remaining', '>', 0)->count();
        
        $pdf = Pdf::loadView('reports.financial-pdf', [
            'totalMembers' => $totalMembers,
            'totalContributions' => $totalContributions,
            'totalLoansIssued' => $totalLoansIssued,
            'totalOutstanding' => $totalOutstanding,
            'totalLoansCount' => $totalLoansCount,
            'totalOutstandingCount' => $totalOutstandingCount,
        ]);

        return $pdf->download('financial-report.pdf');
    }
}
