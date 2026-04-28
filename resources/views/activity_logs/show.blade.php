@extends('layout')

@section('content')
<div class="p-8 max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Activity #{{ $log->id }}</h2>
        <a href="{{ route('activity-logs.index') }}" class="text-green-700 hover:underline text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back to log
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 space-y-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500">When</p>
                <p class="font-semibold">{{ optional($log->created_at)->format('Y-m-d H:i:s') }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500">Actor</p>
                <p class="font-semibold">{{ $log->user?->name ?? 'system' }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500">Action</p>
                <p class="font-mono text-sm">{{ $log->action }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500">Subject</p>
                <p class="font-mono text-sm">
                    @if ($log->subject_type)
                        {{ class_basename($log->subject_type) }} #{{ $log->subject_id }}
                    @else
                        -
                    @endif
                </p>
            </div>
            <div class="md:col-span-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">Description</p>
                <p>{{ $log->description }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500">Method / Status</p>
                <p class="font-mono text-sm">{{ $log->method ?? '-' }} / {{ $log->status_code ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500">IP</p>
                <p class="font-mono text-sm">{{ $log->ip_address ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">URL</p>
                <p class="font-mono text-xs break-all">{{ $log->url ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">User-Agent</p>
                <p class="font-mono text-xs break-all">{{ $log->user_agent ?? '-' }}</p>
            </div>
        </div>

        @if ($log->before)
            <div class="pt-4 border-t">
                <p class="text-xs uppercase tracking-wide text-gray-500 mb-1">Before</p>
                <pre class="bg-gray-50 rounded p-3 text-xs overflow-auto">{{ json_encode($log->before, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
            </div>
        @endif

        @if ($log->after)
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500 mb-1">After</p>
                <pre class="bg-gray-50 rounded p-3 text-xs overflow-auto">{{ json_encode($log->after, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
            </div>
        @endif

        @if ($log->context)
            <div>
                <p class="text-xs uppercase tracking-wide text-gray-500 mb-1">Request Payload</p>
                <pre class="bg-gray-50 rounded p-3 text-xs overflow-auto">{{ json_encode($log->context, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
            </div>
        @endif
    </div>
</div>
@endsection
