<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Contribution;
use App\Models\Loan;
use App\Models\Meeting;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalMembers = Member::count();
        $totalContributions = Contribution::sum('amount');
        $loansIssued = Loan::where('status', 'approved')->sum('amount');
        $loansOutstanding = Loan::where('status', 'approved')->sum('balance_remaining');
        
        $upcomingMeetings = Meeting::where('scheduled_date', '>=', now())
            ->where('status', 'scheduled')
            ->orderBy('scheduled_date')
            ->limit(5)
            ->get();

        $recentActivities = collect()
            ->merge(Contribution::latest()->limit(3)->get()->map(function ($contribution) {
                return [
                    'type' => 'contribution',
                    'description' => $contribution->member->name . ' contributed KES ' . number_format($contribution->amount, 2),
                    'date' => $contribution->created_at,
                ];
            }))
            ->merge(Loan::latest()->limit(3)->get()->map(function ($loan) {
                return [
                    'type' => 'loan',
                    'description' => $loan->member->name . ' ' . $loan->status . ' loan of KES ' . number_format($loan->amount, 2),
                    'date' => $loan->created_at,
                ];
            }))
            ->sortByDesc('date')
            ->take(5);

        return view('dashboard.index', [
            'totalMembers' => $totalMembers,
            'totalContributions' => $totalContributions,
            'loansIssued' => $loansIssued,
            'loansOutstanding' => $loansOutstanding,
            'upcomingMeetings' => $upcomingMeetings,
            'recentActivities' => $recentActivities,
        ]);
    }
}
