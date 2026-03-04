

<?php $__env->startSection('content'); ?>
<div class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Repayments</h2>
        <a href="/repayments/create" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus"></i> Record Repayment
        </a>
    </div>

    <!-- Repayments Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Member</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Amount</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $repayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <a href="/repayments/<?php echo e($repayment->id); ?>" class="text-blue-600 hover:underline"><?php echo e($repayment->member->name); ?></a>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-green-600">KES <?php echo e(number_format($repayment->amount, 2)); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($repayment->date); ?></td>
                        <td class="px-6 py-4 text-sm space-x-3">
                            <a href="/repayments/<?php echo e($repayment->id); ?>" class="text-blue-600 hover:text-blue-800">View</a>
                            <a href="/repayments/<?php echo e($repayment->id); ?>/edit" class="text-blue-600 hover:text-blue-800">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            No repayments recorded
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\chama\resources\views/repayments/index.blade.php ENDPATH**/ ?>