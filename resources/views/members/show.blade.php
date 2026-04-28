@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">{{ $member->name }}</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Member Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Member Information</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm">Phone</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $member->phone }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">ID Number</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $member->id_number }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Email</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $member->email ?? 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Status</p>
                        <span class="px-3 py-1 rounded-full text-white 
                            @if($member->status == 'active') bg-green-600
                            @elseif($member->status == 'suspended') bg-red-600
                            @else bg-gray-600 @endif">
                            {{ ucfirst($member->status) }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Date Joined</p>
                        <p class="text-lg font-semibold text-gray-800">{{ \Carbon\Carbon::parse($member->date_joined)->format('M d, Y') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Address</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $member->address ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Contributions -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Contributions</h3>
                @if($contributions->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contributions as $contribution)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($contribution->date)->format('M d, Y') }}</td>
                                        <td class="px-4 py-2 text-right font-semibold">KES {{ number_format($contribution->amount, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600">No contributions recorded yet.</p>
                @endif
            </div>

            <!-- Loans -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Loans</h3>
                @if($loans->count())
                    <div class="space-y-4">
                        @foreach($loans as $loan)
                            <div class="border-l-4 border-blue-500 p-4 bg-blue-50 rounded">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="font-semibold">KES {{ number_format($loan->amount, 2) }}</p>
                                    <span class="text-xs px-2 py-1 rounded-full 
                                        @if($loan->status == 'approved') bg-green-200 text-green-800
                                        @elseif($loan->status == 'pending') bg-yellow-200 text-yellow-800
                                        @else bg-red-200 text-red-800 @endif">
                                        {{ ucfirst($loan->status) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600">Balance: KES {{ number_format($loan->balance_remaining, 2) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No loans issued.</p>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="/members/{{ $member->id }}/edit" class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit Member
                    </a>
                    
                    <form action="/members/{{ $member->id }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Delete Member
                        </button>
                    </form>
                    
                    <a href="/members" class="block w-full bg-gray-300 text-gray-700 text-center px-4 py-2 rounded-lg hover:bg-gray-400">
                        Back to Members
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
