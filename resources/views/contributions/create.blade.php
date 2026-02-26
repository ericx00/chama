@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Record Contribution</h2>

    <form action="/contributions" method="POST" class="bg-white rounded-lg shadow-md p-6">
        <input type="hidden" name="_token" value="csrf-token">

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
            <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount (KES) *</label>
            <input type="number" id="amount" name="amount" step="0.01" value="{{ old('amount') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Date *</label>
            <input type="date" id="date" name="date" value="{{ old('date', now()->toDateString()) }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-6">
            <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes</label>
            <textarea id="notes" name="notes" rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('notes') }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Record Contribution
            </button>
            <a href="{{ route('contributions.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
