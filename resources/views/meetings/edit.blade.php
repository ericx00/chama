@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Edit Meeting</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/meetings/{{ $meeting->id }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Meeting Title</label>
                <input type="text" name="title" value="{{ $meeting->title }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter meeting title">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter meeting description">{{ $meeting->description }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Scheduled Date & Time</label>
                <input type="datetime-local" name="scheduled_date" value="{{ $meeting->scheduled_date->format('Y-m-d\TH:i') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Location</label>
                <input type="text" name="location" value="{{ $meeting->location }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter meeting location">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Update Meeting</button>
                <a href="/meetings/{{ $meeting->id }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
