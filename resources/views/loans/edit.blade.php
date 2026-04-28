@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Loan</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/loans/{{ $loan->id }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-4">
                <label for="member_id" class="block text-sm font-semibold text-gray-700 mb-2">Member *</label>
                <select id="member_id" name="member_id" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">Select a member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ $loan->member_id == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Loan Amount (KES) *</label>
                <input type="number" id="amount" name="amount" value="{{ $loan->amount }}" 
                    placeholder="e.g., 50000"
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="balance_remaining" class="block text-sm font-semibold text-gray-700 mb-2">Balance Remaining (KES)</label>
                <input type="number" id="balance_remaining" name="balance_remaining" value="{{ $loan->balance_remaining }}" 
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="interest_rate" class="block text-sm font-semibold text-gray-700 mb-2">Interest Rate (%)</label>
                <input type="number" id="interest_rate" name="interest_rate" value="{{ $loan->interest_rate }}" 
                    placeholder="e.g., 5"
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-2">Due Date</label>
                <input type="date" id="due_date" name="due_date" value="{{ $loan->due_date }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="pending" {{ $loan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $loan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $loan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="disbursed" {{ $loan->status == 'disbursed' ? 'selected' : '' }}>Disbursed</option>
                    <option value="defaulted" {{ $loan->status == 'defaulted' ? 'selected' : '' }}>Defaulted</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="approval_notes" class="block text-sm font-semibold text-gray-700 mb-2">Approval Notes</label>
                <textarea id="approval_notes" name="approval_notes" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="3">{{ $loan->approval_notes }}</textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Update Loan</button>
                <a href="/loans/{{ $loan->id }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
