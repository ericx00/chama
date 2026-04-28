<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// ---------------------------------------------------------------------------
// Public landing page
// ---------------------------------------------------------------------------
Route::get('/', fn () => view('welcome'))->name('home');

// ---------------------------------------------------------------------------
// Authentication
// ---------------------------------------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ---------------------------------------------------------------------------
// Authenticated application
// ---------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Members
    Route::get('/members/search', [MemberController::class, 'search'])->name('members.search');
    Route::resource('members', MemberController::class);

    // Contributions
    Route::get('/contributions/monthly-report', [ContributionController::class, 'monthlyReport'])
        ->name('contributions.monthly-report');
    Route::get('/members/{member}/contributions', [ContributionController::class, 'memberContributions'])
        ->name('contributions.member');
    Route::resource('contributions', ContributionController::class);

    // Loans (specific routes before resource to keep collisions out of {loan})
    Route::get('/loans/pending', [LoanController::class, 'pendingLoans'])->name('loans.pending');
    Route::get('/loans/outstanding', [LoanController::class, 'outstandingLoans'])->name('loans.outstanding');
    Route::post('/loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
    Route::post('/loans/{loan}/reject', [LoanController::class, 'reject'])->name('loans.reject');
    Route::resource('loans', LoanController::class);

    // Repayments
    Route::get('/repayments/overdue', [RepaymentController::class, 'overdueLoans'])->name('repayments.overdue');
    Route::get('/loans/{loan}/repayments', [RepaymentController::class, 'loanRepayments'])->name('repayments.loan');
    Route::resource('repayments', RepaymentController::class);

    // Meetings
    Route::post('/meetings/{meeting}/attend', [MeetingController::class, 'markAttendance'])->name('meetings.attend');
    Route::resource('meetings', MeetingController::class);

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/contributions/pdf', [ReportController::class, 'contributionsPdf'])->name('reports.contributions.pdf');
    Route::get('/reports/loans/pdf', [ReportController::class, 'loansPdf'])->name('reports.loans.pdf');
    Route::get('/reports/financial/pdf', [ReportController::class, 'financialPdf'])->name('reports.financial.pdf');

    // Audit / activity log (admin only)
    Route::middleware('admin')->group(function () {
        Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
        Route::get('/activity-logs/{activity_log}', [ActivityLogController::class, 'show'])->name('activity-logs.show');
    });
});
