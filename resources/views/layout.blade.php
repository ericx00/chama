<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chama Digital Record-Keeping System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Top bar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                <i class="fas fa-users text-green-600 text-2xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Chama Digital</h1>
            </a>

            @auth
                <div class="flex items-center gap-3 text-sm">
                    <span class="hidden sm:inline text-gray-600">
                        <i class="fas fa-user-circle mr-1"></i>
                        {{ auth()->user()->name }}
                        <span class="ml-1 text-xs px-2 py-0.5 rounded bg-green-100 text-green-800">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1.5 rounded">
                            <i class="fas fa-sign-out-alt mr-1"></i> Sign out
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <div class="flex">
        @auth
            <aside class="w-64 bg-gray-800 text-white min-h-screen">
                <nav class="p-4 space-y-1">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-home w-5"></i> Dashboard</a>
                    <a href="{{ route('members.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-users w-5"></i> Members</a>
                    <a href="{{ route('contributions.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-coins w-5"></i> Contributions</a>
                    <a href="{{ route('loans.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-credit-card w-5"></i> Loans</a>
                    <a href="{{ route('repayments.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-redo w-5"></i> Repayments</a>
                    <a href="{{ route('meetings.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-calendar w-5"></i> Meetings</a>
                    <a href="{{ route('reports.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-chart-bar w-5"></i> Reports</a>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('activity-logs.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700"><i class="fas fa-clipboard-list w-5"></i> Activity Log</a>
                    @endif
                </nav>
            </aside>
        @endauth

        <main class="flex-1">
            @if (session('status'))
                <div class="mx-8 mt-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-800 text-sm flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if ($errors->any() && ! request()->is('login'))
                <div class="mx-8 mt-6 rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-red-700 text-sm">
                    <p class="font-semibold mb-1">Please correct the following:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
