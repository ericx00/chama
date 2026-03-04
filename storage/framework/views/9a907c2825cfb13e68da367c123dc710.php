

<?php $__env->startSection('content'); ?>
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Loan</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/loans/<?php echo e($loan->id); ?>" method="POST">
            <input type="hidden" name="_token" value="csrf-token">
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-4">
                <label for="member_id" class="block text-sm font-semibold text-gray-700 mb-2">Member *</label>
                <select id="member_id" name="member_id" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">Select a member</option>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($member->id); ?>" <?php echo e($loan->member_id == $member->id ? 'selected' : ''); ?>>
                            <?php echo e($member->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Loan Amount (KES) *</label>
                <input type="number" id="amount" name="amount" value="<?php echo e($loan->amount); ?>" 
                    placeholder="e.g., 50000"
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="balance_remaining" class="block text-sm font-semibold text-gray-700 mb-2">Balance Remaining (KES)</label>
                <input type="number" id="balance_remaining" name="balance_remaining" value="<?php echo e($loan->balance_remaining); ?>" 
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="interest_rate" class="block text-sm font-semibold text-gray-700 mb-2">Interest Rate (%)</label>
                <input type="number" id="interest_rate" name="interest_rate" value="<?php echo e($loan->interest_rate); ?>" 
                    placeholder="e.g., 5"
                    step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-2">Due Date</label>
                <input type="date" id="due_date" name="due_date" value="<?php echo e($loan->due_date); ?>" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="pending" <?php echo e($loan->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="approved" <?php echo e($loan->status == 'approved' ? 'selected' : ''); ?>>Approved</option>
                    <option value="rejected" <?php echo e($loan->status == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                    <option value="disbursed" <?php echo e($loan->status == 'disbursed' ? 'selected' : ''); ?>>Disbursed</option>
                    <option value="defaulted" <?php echo e($loan->status == 'defaulted' ? 'selected' : ''); ?>>Defaulted</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="approval_notes" class="block text-sm font-semibold text-gray-700 mb-2">Approval Notes</label>
                <textarea id="approval_notes" name="approval_notes" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="3"><?php echo e($loan->approval_notes); ?></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Update Loan</button>
                <a href="/loans/<?php echo e($loan->id); ?>" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\chama\resources\views/loans/edit.blade.php ENDPATH**/ ?>