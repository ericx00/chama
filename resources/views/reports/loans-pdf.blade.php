<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Loans Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #2196F3;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Loans Report</h1>
    <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>

    <table>
        <thead>
            <tr>
                <th>Member</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Balance Remaining</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->member->name ?? 'N/A' }}</td>
                    <td>{{ number_format($loan->amount, 2) }}</td>
                    <td>{{ ucfirst($loan->status) }}</td>
                    <td>{{ number_format($loan->balance_remaining, 2) }}</td>
                    <td>{{ $loan->due_date ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <h3>Summary</h3>
        <p><strong>Total Loans Issued:</strong> {{ number_format($totalLoansIssued, 2) }}</p>
        <p><strong>Total Outstanding:</strong> {{ number_format($totalOutstanding, 2) }}</p>
    </div>
</body>
</html>
