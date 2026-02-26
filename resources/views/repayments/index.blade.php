@extends('layout')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Repayments</h2>
        <a href="/repayments/create" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus"></i> Record Repayment
        </a>
    </div>

    <!-- Repayments Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Member</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Amount</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($repayments as $repayment)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <a href="/repayments/{{ $repayment->id }}" class="text-blue-600 hover:underline">{{ $repayment->member->name }}</a>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-green-600">KES {{ number_format($repayment->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $repayment->date }}</td>
                        <td class="px-6 py-4 text-sm space-x-3">
                            <a href="/repayments/{{ $repayment->id }}" class="text-blue-600 hover:text-blue-800">View</a>
                            <a href="/repayments/{{ $repayment->id }}/edit" class="text-blue-600 hover:text-blue-800">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            No repayments recorded
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
