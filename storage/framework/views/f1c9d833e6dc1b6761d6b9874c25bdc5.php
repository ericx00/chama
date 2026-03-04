

<?php $__env->startSection('content'); ?>
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8"><?php echo e($member->name); ?></h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Member Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Member Information</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm">Phone</p>
                        <p class="text-lg font-semibold text-gray-800"><?php echo e($member->phone); ?></p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">ID Number</p>
                        <p class="text-lg font-semibold text-gray-800"><?php echo e($member->id_number); ?></p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Email</p>
                        <p class="text-lg font-semibold text-gray-800"><?php echo e($member->email ?? 'N/A'); ?></p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Status</p>
                        <span class="px-3 py-1 rounded-full text-white 
                            <?php if($member->status == 'active'): ?> bg-green-600
                            <?php elseif($member->status == 'suspended'): ?> bg-red-600
                            <?php else: ?> bg-gray-600 <?php endif; ?>">
                            <?php echo e(ucfirst($member->status)); ?>

                        </span>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Date Joined</p>
                        <p class="text-lg font-semibold text-gray-800"><?php echo e(\Carbon\Carbon::parse($member->date_joined)->format('M d, Y')); ?></p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 text-sm">Address</p>
                        <p class="text-lg font-semibold text-gray-800"><?php echo e($member->address ?? 'N/A'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Contributions -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Contributions</h3>
                <?php if($contributions->count()): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $contributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contribution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-t">
                                        <td class="px-4 py-2"><?php echo e(\Carbon\Carbon::parse($contribution->date)->format('M d, Y')); ?></td>
                                        <td class="px-4 py-2 text-right font-semibold">KES <?php echo e(number_format($contribution->amount, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-gray-600">No contributions recorded yet.</p>
                <?php endif; ?>
            </div>

            <!-- Loans -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Loans</h3>
                <?php if($loans->count()): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border-l-4 border-blue-500 p-4 bg-blue-50 rounded">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="font-semibold">KES <?php echo e(number_format($loan->amount, 2)); ?></p>
                                    <span class="text-xs px-2 py-1 rounded-full 
                                        <?php if($loan->status == 'approved'): ?> bg-green-200 text-green-800
                                        <?php elseif($loan->status == 'pending'): ?> bg-yellow-200 text-yellow-800
                                        <?php else: ?> bg-red-200 text-red-800 <?php endif; ?>">
                                        <?php echo e(ucfirst($loan->status)); ?>

                                    </span>
                                </div>
                                <p class="text-sm text-gray-600">Balance: KES <?php echo e(number_format($loan->balance_remaining, 2)); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-600">No loans issued.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="/members/<?php echo e($member->id); ?>/edit" class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit Member
                    </a>
                    
                    <form action="/members/<?php echo e($member->id); ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="_token" value="csrf-token">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Delete Member
                        </button>
                    </form>
                    
                    <a href="/members" class="block w-full bg-gray-300 text-gray-700 text-center px-4 py-2 rounded-lg hover:bg-gray-400">
                        Back to Members
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\chama\resources\views/members/show.blade.php ENDPATH**/ ?>