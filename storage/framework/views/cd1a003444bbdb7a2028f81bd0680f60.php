

<?php $__env->startSection('content'); ?>
<div class="p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Member</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="/members/<?php echo e($member->id); ?>" method="POST">
            <input type="hidden" name="_token" value="csrf-token">
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                <input type="text" id="name" name="name" value="<?php echo e($member->name); ?>" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                <input type="text" id="phone" name="phone" value="<?php echo e($member->phone); ?>" 
                    placeholder="e.g., 0712345678"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="id_number" class="block text-sm font-semibold text-gray-700 mb-2">ID Number *</label>
                <input type="text" id="id_number" name="id_number" value="<?php echo e($member->id_number); ?>" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e($member->email); ?>" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                <textarea id="address" name="address" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    rows="3"><?php echo e($member->address); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="active" <?php echo e($member->status == 'active' ? 'selected' : ''); ?>>Active</option>
                    <option value="inactive" <?php echo e($member->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                    <option value="suspended" <?php echo e($member->status == 'suspended' ? 'selected' : ''); ?>>Suspended</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Update Member</button>
                <a href="/members/<?php echo e($member->id); ?>" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\chama\resources\views/members/edit.blade.php ENDPATH**/ ?>