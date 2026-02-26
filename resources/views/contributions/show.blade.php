@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Contribution Details</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Contribution Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Contribution Information</h3>
                
                <div class="space-y-6">
                    <div>
                        <p class="text-gray-600 text-sm">Member</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $contribution->member->name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Amount</p>
                        <p class="text-2xl font-bold text-green-600">KES {{ number_format($contribution->amount, 2) }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Date</p>
                        <p class="text-lg font-semibold text-gray-800">{{ \Carbon\Carbon::parse($contribution->date)->format('M d, Y') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Month/Year</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $contribution->month }}/{{ $contribution->year }}</p>
                    </div>

                    @if($contribution->notes)
                        <div class="pt-6 border-t">
                            <p class="text-gray-600 text-sm">Notes</p>
                            <p class="text-gray-700 mt-2">{{ $contribution->notes }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="/contributions" class="block w-full bg-gray-300 text-gray-700 text-center px-4 py-2 rounded-lg hover:bg-gray-400">
                        Back to Contributions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
