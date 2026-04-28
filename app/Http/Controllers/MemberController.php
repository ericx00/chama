<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(Request $request): View
    {
        $query = Member::query();

        if ($search = $request->string('q')->trim()->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('id_number', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $members = $query->latest()->paginate(15)->withQueryString();

        return view('members.index', compact('members'));
    }

    public function create(): View
    {
        $this->authorizeAdmin();
        return view('members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeAdmin();
        $data = $this->validatedData($request);

        Member::create($data);

        return redirect()->route('members.index')
            ->with('status', 'Member registered successfully.');
    }

    public function show(Member $member): View
    {
        $contributions = $member->contributions()->latest()->paginate(10);
        $loans         = $member->loans()->latest()->paginate(10);
        $repayments    = $member->repayments()->latest()->paginate(10);

        return view('members.show', compact('member', 'contributions', 'loans', 'repayments'));
    }

    public function edit(Member $member): View
    {
        $this->authorizeAdmin();
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $this->authorizeAdmin();
        $data = $this->validatedData($request, $member);

        $member->update($data);

        return redirect()->route('members.show', $member)
            ->with('status', 'Member details updated.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        $this->authorizeAdmin();
        $member->delete();

        return redirect()->route('members.index')
            ->with('status', 'Member removed.');
    }

    public function search(Request $request): View
    {
        return $this->index($request->merge(['q' => $request->input('query')]));
    }

    private function validatedData(Request $request, ?Member $member = null): array
    {
        $idRule = 'required|string|max:20|unique:members,id_number';
        if ($member) {
            $idRule .= ',' . $member->id;
        }

        $data = $request->validate([
            'first_name' => ['nullable', 'string', 'max:100'],
            'last_name'  => ['nullable', 'string', 'max:100'],
            'name'       => ['nullable', 'string', 'max:200'],
            'phone'      => ['required', 'string', 'max:20'],
            'id_number'  => $idRule,
            'email'      => ['nullable', 'email', 'max:150'],
            'address'    => ['nullable', 'string', 'max:500'],
            'status'     => ['nullable', 'in:active,inactive,suspended'],
        ]);

        // Combine first_name + last_name into name when name is not provided directly.
        $name = trim((string) ($data['name'] ?? ''));
        if ($name === '') {
            $name = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
        }

        if ($name === '') {
            abort(422, 'A member name (or first/last name) must be provided.');
        }

        return [
            'name'        => $name,
            'phone'       => $data['phone'],
            'id_number'   => $data['id_number'],
            'email'       => $data['email'] ?? null,
            'address'     => $data['address'] ?? null,
            'status'      => $data['status'] ?? 'active',
            'date_joined' => $member?->date_joined ?? now()->toDateString(),
        ];
    }
}
