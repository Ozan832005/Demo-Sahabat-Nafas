

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Kelola Pengguna</h1>
            <p class="text-gray-500 mt-1">Kelola semua pengguna yang terdaftar di sistem</p>
        </div>
        <button onclick="openModal('addUserModal')" class="btn-primary text-white px-5 py-3 rounded-xl font-semibold flex items-center gap-2.5 w-full sm:w-auto justify-center">
            <i class="fa-solid fa-user-plus"></i>
            <span>Tambah Pengguna</span>
        </button>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
            <span class="font-medium"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-600 text-xl"></i>
            <span class="font-medium"><?php echo e(session('error')); ?></span>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <div class="relative w-full sm:w-80">
                <input type="text" id="searchUser" placeholder="Cari pengguna..." class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition-all">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Pengguna</th>
                        <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden md:table-cell">Email</th>
                        <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Role</th>
                        <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden lg:table-cell">Terdaftar</th>
                        <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="userTableBody">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50 transition-all">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="fa-solid fa-user text-white"></i>
                                </div>
                                <span class="font-semibold text-gray-800"><?php echo e($user->name); ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-gray-500 hidden md:table-cell"><?php echo e($user->email); ?></td>
                        <td class="py-4 px-6">
                            <?php if($user->role === 'admin'): ?>
                                <span class="px-3 py-1.5 bg-purple-100 text-purple-700 rounded-full text-xs font-bold">Admin</span>
                            <?php elseif($user->role === 'perawat'): ?>
                                <span class="px-3 py-1.5 bg-green-100 text-green-700 rounded-full text-xs font-bold">Perawat</span>
                            <?php else: ?>
                                <span class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">Pasien</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 text-gray-500 text-sm hidden lg:table-cell font-medium"><?php echo e($user->created_at->format('d M Y')); ?></td>
                        <td class="py-4 px-6">
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button type="button" onclick="showConfirm('Hapus Pengguna', 'Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.', 'deleteUserForm<?php echo e($user->id); ?>')" class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <form id="deleteUserForm<?php echo e($user->id); ?>" method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" style="display:none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="addUserModal" class="form-modal hidden">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('addUserModal')"></div>
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6 max-h-[90vh] overflow-y-auto z-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-800">Tambah Pengguna</h2>
            <button onclick="closeModal('addUserModal')" class="p-2 hover:bg-gray-100 rounded-xl transition-all">
                <i class="fa-solid fa-xmark text-gray-500 text-xl"></i>
            </button>
        </div>
        <form action="<?php echo e(route('admin.users.store')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Masukkan nama lengkap">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Masukkan email">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Minimal 6 karakter">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Role</label>
                <select name="role" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <option value="pasien">Pasien</option>
                    <option value="perawat">Perawat</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeModal('addUserModal')" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all">Batal</button>
                <button type="submit" class="flex-1 btn-primary text-white px-4 py-3 rounded-xl font-semibold">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = '';
}
document.getElementById('searchUser').addEventListener('input', function(e) {
    const search = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#userTableBody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(search) ? '' : 'none';
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\admin\users.blade.php ENDPATH**/ ?>