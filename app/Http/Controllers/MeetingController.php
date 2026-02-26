<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MeetingController extends Controller
{
    public function index(): View
    {
        $meetings = Meeting::latest()->paginate(15);
        return view('meetings.index', compact('meetings'));
    }

    public function create(): View
    {
        return view('meetings.create');
    }

    public function store(Request $request
    {
        $data = $request->all();
        
        // Remove _token from data
        unset($data['_token']);
        
        $data['created_by'] = 1; // Default user ID since auth not configured
        Meeting::create($data);

        return new Response('', 302, ['Location' => '/meetings']);
    }

    public function show(Meeting $meeting): View
    {
        $attendees = $meeting->attendees()->paginate(10);
        return view('meetings.show', compact('meeting', 'attendees'));
    }

    public function edit(Meeting $meeting): View
    {
        return view('meetings.edit', compact('meeting'));
    }

    public function update(Request $request, Meeting $meeting
    {
        $meeting->update($request->all());
        return redirect('/meetings/' . $meeting->id);
    }

    public function destroy(Meeting $meeting
    {
        $meeting->delete();
        return redirect('/meetings');
    }

    public function markAttendance(Meeting $meeting
    {
        $members = Member::where('status', 'active')->pluck('id');
        
        foreach ($members as $memberId) {
            $meeting->attendees()->syncWithoutDetaching([$memberId => ['attended' => false]]);
        }

        return redirect('/meetings/' . $meeting->id);
    }
}
