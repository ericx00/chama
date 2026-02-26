@extends('layout')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Meetings</h2>
        <a href="{{ route('meetings.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus"></i> Schedule Meeting
        </a>
    </div>

    <!-- Meetings Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Location</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($meetings as $meeting)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $meeting->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $meeting->scheduled_date->format('M d, Y - H:i') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $meeting->location ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if($meeting->status === 'scheduled') bg-blue-100 text-blue-800
                                @elseif($meeting->status === 'completed') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($meeting->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('meetings.show', $meeting) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('meetings.edit', $meeting) }}" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No meetings scheduled
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($meetings->hasPages())
        <div class="mt-6">
            {{ $meetings->links() }}
        </div>
    @endif
</div>
@endsection
