<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContributionController extends Controller
{
    public function index(): View
    {
        $contributions = Contribution::with('member')->latest()->paginate(20);

        return view('contributions.index', compact('contributions'));
    }

    public function create(): View
    {
        $members = Member::where('status', 'active')->orderBy('name')->get();

        return view('contributions.create', compact('members'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'amount'    => ['required', 'numeric', 'min:0.01'],
            'date'      => ['required', 'date'],
            'notes'     => ['nullable', 'string', 'max:500'],
        ]);

        $date = Carbon::parse($data['date']);
        $data['month'] = $date->month;
        $data['year']  = $date->year;

        Contribution::create($data);

        return redirect()->route('contributions.index')
            ->with('status', 'Contribution recorded successfully.');
    }

    public function show(Contribution $contribution): View
    {
        return view('contributions.show', compact('contribution'));
    }

    public function monthlyReport(): View
    {
        $currentMonth = now()->month;
        $currentYear  = now()->year;

        $monthlySummary = Contribution::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->with('member')
            ->get()
            ->groupBy('member_id');

        $totalContributions = Contribution::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('amount');

        return view('contributions.monthly-report', compact('monthlySummary', 'totalContributions', 'currentMonth', 'currentYear'));
    }

    public function memberContributions(Member $member): View
    {
        $contributions      = $member->contributions()->latest()->paginate(15);
        $totalContributions = $member->contributions()->sum('amount');

        return view('contributions.member-history', compact('member', 'contributions', 'totalContributions'));
    }
}
