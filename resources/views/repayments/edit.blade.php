@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Repayment</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/repayments/{{ $repayment->id }}" method="POST">
            <input type="hidden" name="_token" value="csrf-token">
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-4">
                <label for="loan_id" class="block text-sm font-semibold text-gray-700 mb-2">Loan *</label>
                <select id="loan_id" name="loan_id" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    required>
                    <option value="">Select a loan</option>
                    @foreach($loans as $loan)
                        <option value="{{ $loan->id }}" {{ $repayment->loan_id == $loan->id ? 'selected' : '' }}>
                            {{ $loan->member->name }} - KES {{ number_format($loan->amount, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount (KES) *</label>
                <input type="number" id="amount" name="amount" value="{{ $repayment->amount }}" 
                    placeholder="e.g., 5000"
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Repayment Date *</label>
                <input type="date" id="date" name="date" value="{{ $repayment->date }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes</label>
                <textarea id="notes" name="notes" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    rows="3">{{ $repayment->notes }}</textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">Update Repayment</button>
                <a href="/repayments/{{ $repayment->id }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
