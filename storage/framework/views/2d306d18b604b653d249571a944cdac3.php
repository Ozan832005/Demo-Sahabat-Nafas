

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.users.index')); ?>" class="p-3 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all shadow-sm">
            <i class="fa-solid fa-arrow-left text-gray-600"></i>
        </a>
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Edit Pengguna</h1>
            <p class="text-gray-500 mt-1">Perbarui informasi pengguna <?php echo e($user->name); ?></p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
        <form action="<?php echo e(route('admin.users.update', $user)); ?>" method="POST" class="space-y-5">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Masukkan nama lengkap">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Masukkan email">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Minimal 6 karakter">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Role</label>
                <select name="role" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <option value="pasien" <?php echo e($user->role === 'pasien' ? 'selected' : ''); ?>>Pasien</option>
                    <option value="perawat" <?php echo e($user->role === 'perawat' ? 'selected' : ''); ?>>Perawat</option>
                    <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
                </select>
            </div>
            <div class="flex gap-3 pt-4">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all text-center">Batal</a>
                <button type="submit" class="flex-1 btn-primary text-white px-4 py-3 rounded-xl font-semibold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\admin\user-edit.blade.php ENDPATH**/ ?>