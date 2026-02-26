@extends('layout')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Reports & Exports</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Contributions Report -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
            <div class="text-4xl text-green-500 mb-4">
                <i class="fas fa-file-csv"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Contributions Report</h3>
            <p class="text-gray-600 mb-4">View and export all member contributions</p>
            <a href="/reports/contributions/pdf" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Download PDF
            </a>
        </div>

        <!-- Loans Report -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
            <div class="text-4xl text-blue-500 mb-4">
                <i class="fas fa-file-pdf"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Loans Report</h3>
            <p class="text-gray-600 mb-4">View all loans issued and their status</p>
            <a href="/reports/loans/pdf" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Download PDF
            </a>
        </div>

        <!-- Financial Report -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
            <div class="text-4xl text-purple-500 mb-4">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Financial Summary</h3>
            <p class="text-gray-600 mb-4">Complete financial overview of the chama</p>
            <a href="/reports/financial/pdf" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                Download PDF
            </a>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="mt-12">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Quick Statistics</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-gray-600 text-sm">Total Members</p>
                <p class="text-3xl font-bold text-blue-600">-</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <p class="text-gray-600 text-sm">Total Contributions</p>
                <p class="text-3xl font-bold text-green-600">-</p>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg">
                <p class="text-gray-600 text-sm">Total Loans Issued</p>
                <p class="text-3xl font-bold text-purple-600">-</p>
            </div>
            <div class="bg-red-50 p-4 rounded-lg">
                <p class="text-gray-600 text-sm">Outstanding Amount</p>
                <p class="text-3xl font-bold text-red-600">-</p>
            </div>
        </div>
    </div>
</div>
@endsection
