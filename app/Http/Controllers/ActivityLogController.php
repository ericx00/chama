<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityLogController extends Controller
{
    public function index(Request $request): View
    {
        $query = ActivityLog::with('user')->latest();

        if ($action = $request->string('action')->trim()->toString()) {
            $query->where('action', 'like', "%{$action}%");
        }

        if ($userId = $request->integer('user_id')) {
            $query->where('user_id', $userId);
        }

        if ($from = $request->date('from')) {
            $query->where('created_at', '>=', $from);
        }

        if ($to = $request->date('to')) {
            $query->where('created_at', '<=', $to);
        }

        $logs = $query->paginate(25)->withQueryString();

        return view('activity_logs.index', compact('logs'));
    }

    public function show(ActivityLog $activity_log): View
    {
        $activity_log->load('user');

        return view('activity_logs.show', ['log' => $activity_log]);
    }
}
