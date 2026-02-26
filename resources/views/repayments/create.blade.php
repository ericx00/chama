@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Record Repayment</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/repayments" method="POST">
            <input type="hidden" name="_token" value="csrf-token">
            
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Loan *</label>
                <select name="loan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">Select Loan</option>
                    @foreach($loans as $loan)
                        <option value="{{ $loan->id }}">
                            {{ $loan->member->name }} - KES {{ number_format($loan->amount, 2) }} (Balance: KES {{ number_format($loan->balance_remaining, 2) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Amount *</label>
                <input type="number" name="amount" step="0.01" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter repayment amount">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Repayment Date *</label>
                <input type="date" name="date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Notes</label>
                <textarea name="notes" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter any additional notes"></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Record Repayment</button>
                <a href="/repayments" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
