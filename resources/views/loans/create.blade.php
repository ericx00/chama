@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Request Loan</h2>

    <form action="/loans" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="text-red-700 font-semibold mb-1">Please fix the following errors:</p>
                <ul class="text-red-600 text-sm list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="member_id" class="block text-sm font-semibold text-gray-700 mb-2">Member *</label>
            @if($lockedMember ?? false)
                <input type="hidden" name="member_id" value="{{ $members->first()->id }}">
                <input type="text" value="{{ $members->first()->name }} ({{ $members->first()->phone }})"
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100 text-gray-600" disabled>
                <p class="text-xs text-gray-500 mt-1">You can only request loans for yourself.</p>
            @else
                <select id="member_id" name="member_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('member_id') border-red-500 @enderror" required>
                    <option value="">Select Member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }} ({{ $member->phone }})
                        </option>
                    @endforeach
                </select>
                @error('member_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            @endif
        </div>

        <div class="mb-4">
            <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Loan Amount (KES) *</label>
            <input type="number" id="amount" name="amount" step="0.01" value="{{ old('amount') }}"
                   min="0.01"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('amount') border-red-500 @enderror" required>
            @error('amount')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label for="interest_rate" class="block text-sm font-semibold text-gray-700 mb-2">Interest Rate (%) *</label>
            <input type="number" id="interest_rate" name="interest_rate" step="0.01" value="{{ old('interest_rate', 0) }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-6">
            <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-2">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"
                   min="{{ now()->format('Y-m-d') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('due_date') border-red-500 @enderror">
            @error('due_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-gray-500 text-xs mt-1">Due date cannot be in the past.</p>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Submit Loan Request
            </button>
            <a href="{{ route('loans.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
