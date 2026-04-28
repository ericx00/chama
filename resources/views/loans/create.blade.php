@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Request Loan</h2>

    <form action="/loans" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf

        <div class="mb-4">
            <label for="member_id" class="block text-sm font-semibold text-gray-700 mb-2">Member *</label>
            <select id="member_id" name="member_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">
                        {{ $member->name }} ({{ $member->phone }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Loan Amount (KES) *</label>
            <input type="number" id="amount" name="amount" step="0.01" value="{{ old('amount') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-4">
            <label for="interest_rate" class="block text-sm font-semibold text-gray-700 mb-2">Interest Rate (%) *</label>
            <input type="number" id="interest_rate" name="interest_rate" step="0.01" value="{{ old('interest_rate', 0) }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-6">
            <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-2">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
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
