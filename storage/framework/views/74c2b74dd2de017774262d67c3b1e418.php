

<?php $__env->startSection('content'); ?>
<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h2>

    <!-- Key Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Members -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Members</p>
                    <p class="text-3xl font-bold text-gray-800"><?php echo e($totalMembers); ?></p>
                </div>
                <i class="fas fa-users text-blue-500 text-4xl opacity-20"></i>
            </div>
        </div>

        <!-- Total Contributions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Contributions</p>
                    <p class="text-3xl font-bold text-gray-800">KES <?php echo e(number_format($totalContributions, 2)); ?></p>
                </div>
                <i class="fas fa-coins text-green-500 text-4xl opacity-20"></i>
            </div>
        </div>

        <!-- Loans Issued -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Loans Issued</p>
                    <p class="text-3xl font-bold text-gray-800">KES <?php echo e(number_format($loansIssued, 2)); ?></p>
                </div>
                <i class="fas fa-credit-card text-purple-500 text-4xl opacity-20"></i>
            </div>
        </div>

        <!-- Outstanding Loans -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Outstanding Loans</p>
                    <p class="text-3xl font-bold text-gray-800">KES <?php echo e(number_format($loansOutstanding, 2)); ?></p>
                </div>
                <i class="fas fa-exclamation-circle text-red-500 text-4xl opacity-20"></i>
            </div>
        </div>
    </div>

    <!-- Upcoming Meetings & Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Upcoming Meetings -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Upcoming Meetings</h3>
            <?php if($upcomingMeetings->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $upcomingMeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <p class="font-semibold text-gray-800"><?php echo e($meeting->title); ?></p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-calendar"></i> <?php echo e($meeting->scheduled_date->format('M d, Y - H:i')); ?>

                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500">No upcoming meetings</p>
            <?php endif; ?>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
            <?php if($recentActivities->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $recentActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-l-4 <?php if($activity['type'] === 'contribution'): ?> border-green-500 <?php else: ?> border-purple-500 <?php endif; ?> pl-4 py-2">
                            <p class="text-sm text-gray-800"><?php echo e($activity['description']); ?></p>
                            <p class="text-xs text-gray-500"><?php echo e($activity['date']->diffForHumans()); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500">No recent activities</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\chama\resources\views/dashboard/index.blade.php ENDPATH**/ ?>