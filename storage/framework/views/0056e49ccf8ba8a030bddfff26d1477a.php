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
    <p>Generated on: <?php echo e(date('Y-m-d H:i:s')); ?></p>

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
            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loan->member->name ?? 'N/A'); ?></td>
                    <td><?php echo e(number_format($loan->amount, 2)); ?></td>
                    <td><?php echo e(ucfirst($loan->status)); ?></td>
                    <td><?php echo e(number_format($loan->balance_remaining, 2)); ?></td>
                    <td><?php echo e($loan->due_date ?? '-'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="summary">
        <h3>Summary</h3>
        <p><strong>Total Loans Issued:</strong> <?php echo e(number_format($totalLoansIssued, 2)); ?></p>
        <p><strong>Total Outstanding:</strong> <?php echo e(number_format($totalOutstanding, 2)); ?></p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\user\Desktop\chama\resources\views/reports/loans-pdf.blade.php ENDPATH**/ ?>