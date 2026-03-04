<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contributions Report</title>
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
            background-color: #4CAF50;
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
        .total {
            font-weight: bold;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>Contributions Report</h1>
    <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Member</th>
                <th>Amount</th>
                <th>Month/Year</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contributions as $contribution)
                <tr>
                    <td>{{ $contribution->date }}</td>
                    <td>{{ $contribution->member->name ?? 'N/A' }}</td>
                    <td>{{ number_format($contribution->amount, 2) }}</td>
                    <td>{{ $contribution->month }}/{{ $contribution->year }}</td>
                    <td>{{ $contribution->notes ?? '-' }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="2"></td>
                <td>{{ number_format($totalContributions, 2) }}</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
