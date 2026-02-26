@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Contribution</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/contributions/{{ $contribution->id }}" method="POST">
            <input type="hidden" name="_token" value="csrf-token">
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-4">
                <label for="member_id" class="block text-sm font-semibold text-gray-700 mb-2">Member *</label>
                <select id="member_id" name="member_id" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="">Select a member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ $contribution->member_id == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount (KES) *</label>
                <input type="number" id="amount" name="amount" value="{{ $contribution->amount }}" 
                    placeholder="e.g., 1000"
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Date *</label>
                <input type="date" id="date" name="date" value="{{ $contribution->date }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="month" class="block text-sm font-semibold text-gray-700 mb-2">Month (1-12)</label>
                <input type="number" id="month" name="month" value="{{ $contribution->month }}" 
                    min="1" max="12"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-sm font-semibold text-gray-700 mb-2">Year</label>
                <input type="number" id="year" name="year" value="{{ $contribution->year }}" 
                    min="2000" max="2099"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes</label>
                <textarea id="notes" name="notes" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    rows="3">{{ $contribution->notes }}</textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Update Contribution</button>
                <a href="/contributions/{{ $contribution->id }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
