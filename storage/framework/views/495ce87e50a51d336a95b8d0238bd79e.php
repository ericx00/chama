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
    <p>Generated on: <?php echo e(date('Y-m-d H:i:s')); ?></p>

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
            <?php $__currentLoopData = $contributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contribution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($contribution->date); ?></td>
                    <td><?php echo e($contribution->member->name ?? 'N/A'); ?></td>
                    <td><?php echo e(number_format($contribution->amount, 2)); ?></td>
                    <td><?php echo e($contribution->month); ?>/<?php echo e($contribution->year); ?></td>
                    <td><?php echo e($contribution->notes ?? '-'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class="total">
                <td colspan="2"></td>
                <td><?php echo e(number_format($totalContributions, 2)); ?></td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\user\Desktop\chama\resources\views/reports/contributions-pdf.blade.php ENDPATH**/ ?>