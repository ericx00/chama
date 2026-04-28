@extends('layout')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Activity Log</h2>
            <p class="text-sm text-gray-500">Append-only audit trail of every notable action.</p>
        </div>
    </div>

    <form method="GET" action="{{ route('activity-logs.index') }}"
          class="bg-white rounded-lg shadow p-4 grid grid-cols-1 md:grid-cols-4 gap-3 mb-6">
        <input type="text" name="action" value="{{ request('action') }}"
               placeholder="Action contains..."
               class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        <input type="number" name="user_id" value="{{ request('user_id') }}"
               placeholder="User ID"
               class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        <input type="date" name="from" value="{{ request('from') }}"
               class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        <input type="date" name="to" value="{{ request('to') }}"
               class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        <div class="md:col-span-4 flex gap-2">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-filter mr-1"></i> Filter
            </button>
            <a href="{{ route('activity-logs.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Reset
            </a>
        </div>
    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="text-left px-4 py-3">When</th>
                    <th class="text-left px-4 py-3">Actor</th>
                    <th class="text-left px-4 py-3">Action</th>
                    <th class="text-left px-4 py-3">Description</th>
                    <th class="text-left px-4 py-3">Method</th>
                    <th class="text-left px-4 py-3">Status</th>
                    <th class="text-left px-4 py-3">IP</th>
                    <th class="text-left px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($logs as $log)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                            {{ optional($log->created_at)->format('Y-m-d H:i:s') }}
                        </td>
                        <td class="px-4 py-2 text-gray-700">
                            {{ $log->user?->name ?? 'system' }}
                        </td>
                        <td class="px-4 py-2 font-mono text-xs">
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ $log->action }}</span>
                        </td>
                        <td class="px-4 py-2 text-gray-700">{{ $log->description }}</td>
                        <td class="px-4 py-2">
                            @if ($log->method)
                                <span class="text-xs font-semibold text-blue-700">{{ $log->method }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if ($log->status_code)
                                @php
                                    $color = $log->status_code >= 500 ? 'red'
                                        : ($log->status_code >= 400 ? 'orange'
                                        : ($log->status_code >= 300 ? 'blue' : 'green'));
                                @endphp
                                <span class="text-xs font-semibold text-{{ $color }}-700">{{ $log->status_code }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-gray-500">{{ $log->ip_address }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('activity-logs.show', $log) }}"
                               class="text-green-700 hover:underline text-xs">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">No activity recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-4 py-3 bg-gray-50">
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection
