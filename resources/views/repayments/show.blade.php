@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Repayment Details</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Repayment Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Repayment Information</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm">Member</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $repayment->member->name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Amount Paid</p>
                        <p class="text-lg font-semibold text-green-600">KES {{ number_format($repayment->amount, 2) }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Loan Amount</p>
                        <p class="text-lg font-semibold text-gray-800">KES {{ number_format($repayment->loan->amount, 2) }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Payment Date</p>
                        <p class="text-lg font-semibold text-gray-800">{{ \Carbon\Carbon::parse($repayment->date)->format('M d, Y') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Loan Status</p>
                        <p class="text-lg font-semibold">
                            <span class="px-3 py-1 rounded-full text-white 
                                @if($repayment->loan->status == 'fully_repaid') bg-green-600
                                @elseif($repayment->loan->status == 'approved') bg-blue-600
                                @else bg-yellow-600 @endif">
                                {{ ucfirst($repayment->loan->status) }}
                            </span>
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Balance Remaining</p>
                        <p class="text-lg font-semibold text-orange-600">KES {{ number_format($repayment->loan->balance_remaining, 2) }}</p>
                    </div>
                </div>

                @if($repayment->notes)
                    <div class="mt-6 pt-6 border-t">
                        <p class="text-gray-600 text-sm">Notes</p>
                        <p class="text-gray-700 mt-2">{{ $repayment->notes }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="/repayments/{{ $repayment->id }}/edit" class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit Repayment
                    </a>
                    
                    <form action="/repayments/{{ $repayment->id }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Delete Repayment
                        </button>
                    </form>
                    
                    <a href="/repayments" class="block w-full bg-gray-300 text-gray-700 text-center px-4 py-2 rounded-lg hover:bg-gray-400">
                        Back to Repayments
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
