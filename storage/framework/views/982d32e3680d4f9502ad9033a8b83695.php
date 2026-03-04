

<?php $__env->startSection('content'); ?>
<div class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Loans Management</h2>
        <a href="/loans/create" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus"></i> Request Loan
        </a>
    </div>

    <!-- Loans Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Member</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Amount</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Balance</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <a href="/loans/<?php echo e($loan->id); ?>" class="text-blue-600 hover:underline"><?php echo e($loan->member->name); ?></a>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold">KES <?php echo e(number_format($loan->amount, 2)); ?></td>
                        <td class="px-6 py-4 text-sm">KES <?php echo e(number_format($loan->balance_remaining, 2)); ?></td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                <?php if($loan->status === 'approved'): ?> bg-green-100 text-green-800
                                <?php elseif($loan->status === 'pending'): ?> bg-yellow-100 text-yellow-800
                                <?php elseif($loan->status === 'rejected'): ?> bg-red-100 text-red-800
                                <?php else: ?> bg-blue-100 text-blue-800
                                <?php endif; ?>">
                                <?php echo e(ucfirst($loan->status)); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm space-x-3">
                            <a href="/loans/<?php echo e($loan->id); ?>" class="text-blue-600 hover:text-blue-800">View</a>
                            <a href="/loans/<?php echo e($loan->id); ?>/edit" class="text-blue-600 hover:text-blue-800">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No loans found
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\chama\resources\views/loans/index.blade.php ENDPATH**/ ?>