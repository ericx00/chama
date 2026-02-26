@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h2>

    <!-- Key Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Members -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Members</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalMembers }}</p>
                </div>
                <i class="fas fa-users text-blue-500 text-4xl opacity-20"></i>
            </div>
        </div>

        <!-- Total Contributions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Contributions</p>
                    <p class="text-3xl font-bold text-gray-800">KES {{ number_format($totalContributions, 2) }}</p>
                </div>
                <i class="fas fa-coins text-green-500 text-4xl opacity-20"></i>
            </div>
        </div>

        <!-- Loans Issued -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Loans Issued</p>
                    <p class="text-3xl font-bold text-gray-800">KES {{ number_format($loansIssued, 2) }}</p>
                </div>
                <i class="fas fa-credit-card text-purple-500 text-4xl opacity-20"></i>
            </div>
        </div>

        <!-- Outstanding Loans -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Outstanding Loans</p>
                    <p class="text-3xl font-bold text-gray-800">KES {{ number_format($loansOutstanding, 2) }}</p>
                </div>
                <i class="fas fa-exclamation-circle text-red-500 text-4xl opacity-20"></i>
            </div>
        </div>
    </div>

    <!-- Upcoming Meetings & Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Upcoming Meetings -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Upcoming Meetings</h3>
            @if($upcomingMeetings->count() > 0)
                <div class="space-y-3">
                    @foreach($upcomingMeetings as $meeting)
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <p class="font-semibold text-gray-800">{{ $meeting->title }}</p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-calendar"></i> {{ $meeting->scheduled_date->format('M d, Y - H:i') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No upcoming meetings</p>
            @endif
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
            @if($recentActivities->count() > 0)
                <div class="space-y-3">
                    @foreach($recentActivities as $activity)
                        <div class="border-l-4 @if($activity['type'] === 'contribution') border-green-500 @else border-purple-500 @endif pl-4 py-2">
                            <p class="text-sm text-gray-800">{{ $activity['description'] }}</p>
                            <p class="text-xs text-gray-500">{{ $activity['date']->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No recent activities</p>
            @endif
        </div>
    </div>
</div>
@endsection
