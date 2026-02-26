@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Loan Details</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Loan Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Loan Information</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm">Member</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $loan->member->name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Loan Amount</p>
                        <p class="text-lg font-semibold text-green-600">KES {{ number_format($loan->amount, 2) }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Balance Remaining</p>
                        <p class="text-lg font-semibold text-orange-600">KES {{ number_format($loan->balance_remaining, 2) }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Interest Rate</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $loan->interest_rate ?? 'N/A' }}%</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Status</p>
                        <span class="px-3 py-1 rounded-full text-white 
                            @if($loan->status == 'approved') bg-green-600
                            @elseif($loan->status == 'pending') bg-yellow-600
                            @elseif($loan->status == 'rejected') bg-red-600
                            @else bg-blue-600 @endif">
                            {{ ucfirst($loan->status) }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Due Date</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $loan->due_date ? \Carbon\Carbon::parse($loan->due_date)->format('M d, Y') : 'N/A' }}</p>
                    </div>
                </div>

                @if($loan->approval_notes)
                    <div class="mt-6 pt-6 border-t">
                        <p class="text-gray-600 text-sm">Approval Notes</p>
                        <p class="text-gray-700 mt-2">{{ $loan->approval_notes }}</p>
                    </div>
                @endif
            </div>

            <!-- Repayments -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Repayments</h3>
                @if($repayments->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($repayments as $repayment)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($repayment->date)->format('M d, Y') }}</td>
                                        <td class="px-4 py-2 text-right font-semibold">KES {{ number_format($repayment->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600">No repayments recorded yet.</p>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="/loans/{{ $loan->id }}/edit" class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit Loan
                    </a>

                    @if($loan->status == 'pending')
                        <form action="/loans/{{ $loan->id }}/approve" method="POST">
                            <input type="hidden" name="_token" value="csrf-token">
                            <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Approve Loan
                            </button>
                        </form>
                        
                        <form action="/loans/{{ $loan->id }}/reject" method="POST">
                            <input type="hidden" name="_token" value="csrf-token">
                            <input type="hidden" name="notes" value="">
                            <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                Reject Loan
                            </button>
                        </form>
                    @endif
                    
                    <form action="/loans/{{ $loan->id }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        <input type="hidden" name="_token" value="csrf-token">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Delete Loan
                        </button>
                    </form>
                    
                    <a href="/loans" class="block w-full bg-gray-300 text-gray-700 text-center px-4 py-2 rounded-lg hover:bg-gray-400">
                        Back to Loans
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
