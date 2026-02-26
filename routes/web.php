<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Member Management
Route::resource('members', MemberController::class);
Route::get('/members/search', [MemberController::class, 'search'])->name('members.search');

    // Contributions
    // Contributions
    Route::resource('contributions', ContributionController::class);
    Route::get('/contributions/monthly-report', [ContributionController::class, 'monthlyReport'])->name('contributions.monthly-report');
    Route::get('/members/{member}/contributions', [ContributionController::class, 'memberContributions'])->name('contributions.member');

    // Loans
    Route::resource('loans', LoanController::class);
    Route::post('/loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
    Route::post('/loans/{loan}/reject', [LoanController::class, 'reject'])->name('loans.reject');
    Route::get('/loans/pending', [LoanController::class, 'pendingLoans'])->name('loans.pending');
    Route::get('/loans/outstanding', [LoanController::class, 'outstandingLoans'])->name('loans.outstanding');

    // Repayments
    Route::resource('repayments', RepaymentController::class);
    Route::get('/loans/{loan}/repayments', [RepaymentController::class, 'loanRepayments'])->name('repayments.loan');
    Route::get('/repayments/overdue', [RepaymentController::class, 'overdueLoans'])->name('repayments.overdue');

    // Meetings
    Route::resource('meetings', MeetingController::class);
    Route::post('/meetings/{meeting}/attend', [MeetingController::class, 'markAttendance'])->name('meetings.attend');

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/contributions/pdf', [ReportController::class, 'contributionsPdf'])->name('reports.contributions.pdf');
    Route::get('/reports/loans/pdf', [ReportController::class, 'loansPdf'])->name('reports.loans.pdf');
    Route::get('/reports/financial/pdf', [ReportController::class, 'financialPdf'])->name('reports.financial.pdf');
