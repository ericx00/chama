<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Financial Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .section {
            margin: 30px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #4CAF50;
        }
        .section h2 {
            color: #333;
            margin-top: 0;
        }
        .stat-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .stat-label {
            font-weight: bold;
            color: #555;
        }
        .stat-value {
            color: #2196F3;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Financial Report</h1>
    <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>

    <div class="section">
        <h2>Organization Overview</h2>
        <div class="stat-row">
            <span class="stat-label">Total Members:</span>
            <span class="stat-value">{{ $totalMembers }}</span>
        </div>
    </div>

    <div class="section">
        <h2>Contributions</h2>
        <div class="stat-row">
            <span class="stat-label">Total Contributions:</span>
            <span class="stat-value">{{ number_format($totalContributions, 2) }}</span>
        </div>
    </div>

    <div class="section">
        <h2>Loans</h2>
        <div class="stat-row">
            <span class="stat-label">Number of Loans:</span>
            <span class="stat-value">{{ $totalLoansCount }}</span>
        </div>
        <div class="stat-row">
            <span class="stat-label">Total Loans Issued:</span>
            <span class="stat-value">{{ number_format($totalLoansIssued, 2) }}</span>
        </div>
        <div class="stat-row">
            <span class="stat-label">Number of Outstanding Loans:</span>
            <span class="stat-value">{{ $totalOutstandingCount }}</span>
        </div>
        <div class="stat-row">
            <span class="stat-label">Total Outstanding Amount:</span>
            <span class="stat-value">{{ number_format($totalOutstanding, 2) }}</span>
        </div>
    </div>
</body>
</html>
