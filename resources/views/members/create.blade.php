@extends('layout')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Add New Member</h2>

    <form action="/members" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
            <input type="text" id="name" name="name" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number (10 digits) *</label>
            <input type="text" id="phone" name="phone" 
                placeholder="e.g., 0712345678"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                required>
        </div>

        <div class="mb-4">
            <label for="id_number" class="block text-sm font-semibold text-gray-700 mb-2">ID Number *</label>
            <input type="text" id="id_number" name="id_number" value="{{ old('id_number') }}" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-6">
            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
            <textarea id="address" name="address" rows="4"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('address') }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Add Member
            </button>
            <a href="{{ route('members.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
