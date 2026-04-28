<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function index(): View
    {
        $meetings = Meeting::latest()->paginate(15);

        return view('meetings.index', compact('meetings'));
    }

    public function create(): View
    {
        $this->authorizeAdmin();
        return view('meetings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeAdmin();
        $data = $this->validatedData($request);

        $data['created_by'] = Auth::id();
        $data['status']     = $data['status'] ?? 'scheduled';

        Meeting::create($data);

        return redirect()->route('meetings.index')
            ->with('status', 'Meeting scheduled.');
    }

    public function show(Meeting $meeting): View
    {
        $attendees = $meeting->attendees()->paginate(10);

        return view('meetings.show', compact('meeting', 'attendees'));
    }

    public function edit(Meeting $meeting): View
    {
        $this->authorizeAdmin();
        return view('meetings.edit', compact('meeting'));
    }

    public function update(Request $request, Meeting $meeting): RedirectResponse
    {
        $this->authorizeAdmin();
        $data = $this->validatedData($request);

        $meeting->update($data);

        return redirect()->route('meetings.show', $meeting)
            ->with('status', 'Meeting updated.');
    }

    public function destroy(Meeting $meeting): RedirectResponse
    {
        $this->authorizeAdmin();
        $meeting->delete();

        return redirect()->route('meetings.index')
            ->with('status', 'Meeting removed.');
    }

    public function markAttendance(Meeting $meeting): RedirectResponse
    {
        $this->authorizeAdmin();
        $members = Member::where('status', 'active')->pluck('id');

        foreach ($members as $memberId) {
            $meeting->attendees()->syncWithoutDetaching([$memberId => ['attended' => false]]);
        }

        return redirect()->route('meetings.show', $meeting)
            ->with('status', 'Attendance roster initialised.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title'          => ['required', 'string', 'max:200'],
            'description'    => ['nullable', 'string', 'max:1000'],
            'scheduled_date' => ['required', 'date', 'after_or_equal:today'],
            'location'       => ['nullable', 'string', 'max:200'],
            'minutes'        => ['nullable', 'string'],
            'status'         => ['nullable', 'in:scheduled,completed,cancelled'],
        ]);
    }
}
