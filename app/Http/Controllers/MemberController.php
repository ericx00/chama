<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = Member::paginate(15);
        return view('members.index', compact('members'));
    }

    public function create(): View
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        // Remove _token from data
        unset($data['_token']);
        
        // Combine first_name and last_name into name
        $data['name'] = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
        unset($data['first_name']);
        unset($data['last_name']);
        
        // Set date joined
        $data['date_joined'] = now()->toDateString();
        
        // Check for duplicate ID number
        $existingMember = Member::where('id_number', $data['id_number'])->first();
        if ($existingMember) {
            return new Response('', 302, ['Location' => '/members/create']);
        }
        
        Member::create($data);

        return new Response('', 302, ['Location' => '/members']);
    }

    public function show(Member $member): View
    {
        $contributions = $member->contributions()->latest()->paginate(10);
        $loans = $member->loans()->latest()->paginate(10);
        $repayments = $member->repayments()->latest()->paginate(10);

        return view('members.show', compact('member', 'contributions', 'loans', 'repayments'));
    }

    public function edit(Member $member): View
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member
    {
        $member->update($request->all());
        return new Response('', 302, ['Location' => '/members/' . $member->id]);
    }

    public function destroy(Member $member
    {
        $member->delete();
        return new Response('', 302, ['Location' => '/members']);
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $members = Member::where('name', 'like', "%$query%")
            ->orWhere('id_number', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->paginate(15);

        return view('members.index', compact('members'));
    }
}
