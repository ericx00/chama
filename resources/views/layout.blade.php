<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chama Digital Record-Keeping System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-users text-green-600 text-2xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Chama Digital</h1>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen">
            <nav class="p-4 space-y-2">
                <a href="/dashboard" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="/members" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-users"></i> Members
                </a>
                <a href="/contributions" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-coins"></i> Contributions
                </a>
                <a href="/loans" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-credit-card"></i> Loans
                </a>
                <a href="/repayments" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-redo"></i> Repayments
                </a>
                <a href="/meetings" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-calendar"></i> Meetings
                </a>
                <a href="/reports" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-chart-bar"></i> Reports
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
