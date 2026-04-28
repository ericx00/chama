@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Schedule New Meeting</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/meetings" method="POST">
            @csrf

            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <p class="text-red-700 font-semibold mb-1">Please fix the following errors:</p>
                    <ul class="text-red-600 text-sm list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Meeting Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror" placeholder="Enter meeting title">
                @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter meeting description">{{ old('description') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Scheduled Date & Time *</label>
                <input type="datetime-local" name="scheduled_date" value="{{ old('scheduled_date') }}" required
                       min="{{ now()->format('Y-m-d\TH:i') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('scheduled_date') border-red-500 @enderror">
                @error('scheduled_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                <p class="text-gray-500 text-xs mt-1">Cannot schedule meetings in the past.</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Location</label>
                <input type="text" name="location" value="{{ old('location') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('location') border-red-500 @enderror" placeholder="Enter meeting location">
                @error('location')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Schedule Meeting</button>
                <a href="/meetings" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
