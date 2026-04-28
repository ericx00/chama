@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">{{ $meeting->title }}</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Meeting Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Meeting Details</h3>
                
                <div class="mb-4">
                    <p class="text-gray-600">
                        <strong>Date & Time:</strong> {{ $meeting->scheduled_date->format('M d, Y H:i') }}
                    </p>
                </div>

                @if ($meeting->location)
                    <div class="mb-4">
                        <p class="text-gray-600">
                            <strong>Location:</strong> {{ $meeting->location }}
                        </p>
                    </div>
                @endif

                @if ($meeting->description)
                    <div class="mb-4">
                        <p class="text-gray-600">
                            <strong>Description:</strong>
                        </p>
                        <p class="text-gray-700 mt-2">{{ $meeting->description }}</p>
                    </div>
                @endif
            </div>

            <!-- Attendees List -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Attendees</h3>
                
                @if ($attendees->count())
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendees as $attendee)
                                    <tr class="border-t">
                                        <td class="px-6 py-3">{{ $attendee->name }}</td>
                                        <td class="px-6 py-3">{{ $attendee->email }}</td>
                                        <td class="px-6 py-3">{{ $attendee->phone }}</td>
                                        <td class="px-6 py-3">
                                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">Attended</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6">
                        {{ $attendees->links() }}
                    </div>
                @else
                    <p class="text-gray-600">No attendees recorded yet.</p>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="/meetings/{{ $meeting->id }}/edit" class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit Meeting
                    </a>
                    
                    <form action="/meetings/{{ $meeting->id }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Delete Meeting
                        </button>
                    </form>
                    
                    <a href="/meetings" class="block w-full bg-gray-300 text-gray-700 text-center px-4 py-2 rounded-lg hover:bg-gray-400">
                        Back to Meetings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
