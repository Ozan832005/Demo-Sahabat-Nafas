

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Riwayat Terapi</h1>
            <p class="text-gray-500 mt-1">Kelola riwayat terapi pasien</p>
        </div>
        <button onclick="openModal('addTherapyModal')" class="btn-primary text-white px-5 py-3 rounded-xl font-semibold flex items-center gap-2.5 w-full sm:w-auto justify-center">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Terapi</span>
        </button>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
            <span class="font-medium"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    <?php if($therapies->isEmpty()): ?>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-notes-medical text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Belum ada riwayat terapi</h3>
            <p class="text-gray-500">Riwayat terapi pasien akan muncul di sini</p>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Pasien</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden md:table-cell">Jenis Terapi</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Durasi</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden lg:table-cell">Tanggal</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600 hidden xl:table-cell">Catatan</th>
                            <th class="text-left py-4 px-6 font-bold text-sm text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $therapies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $therapy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                                        <i class="fa-solid fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800"><?php echo e($therapy->user->name); ?></p>
                                        <p class="text-xs text-gray-500">Oleh: <?php echo e($therapy->admin->name); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-700 hidden md:table-cell font-medium"><?php echo e($therapy->therapy_type); ?></td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-xs font-bold"><?php echo e($therapy->duration); ?> menit</span>
                            </td>
                            <td class="py-4 px-6 text-gray-500 text-sm hidden lg:table-cell font-medium"><?php echo e($therapy->created_at->format('d M Y H:i')); ?></td>
                            <td class="py-4 px-6 text-gray-600 text-sm hidden xl:table-cell max-w-xs truncate"><?php echo e($therapy->notes ?? '-'); ?></td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button type="button" onclick="openEditTherapyModal(<?php echo e($therapy->id); ?>, <?php echo e($therapy->user_id); ?>, '<?php echo e($therapy->therapy_type); ?>', <?php echo e($therapy->duration); ?>, '<?php echo e($therapy->notes ?? ''); ?>')" class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" onclick="showConfirm('Hapus Riwayat Terapi', 'Apakah Anda yakin ingin menghapus riwayat terapi ini? Tindakan ini tidak dapat dibatalkan.', 'deleteTherapyForm<?php echo e($therapy->id); ?>')" class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <form id="deleteTherapyForm<?php echo e($therapy->id); ?>" method="POST" action="<?php echo e(route('admin.therapy.destroy', $therapy)); ?>" style="display:none;">
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
    <?php endif; ?>
</div>

<div id="addTherapyModal" class="form-modal hidden">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('addTherapyModal')"></div>
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6 max-h-[90vh] overflow-y-auto z-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-800">Tambah Riwayat Terapi</h2>
            <button onclick="closeModal('addTherapyModal')" class="p-2 hover:bg-gray-100 rounded-xl transition-all">
                <i class="fa-solid fa-xmark text-gray-500 text-xl"></i>
            </button>
        </div>
        <form action="<?php echo e(route('admin.therapy.store')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Pilih Pasien</label>
                <select name="user_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Terapi</label>
                <input type="text" name="therapy_type" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Contoh: Latihan pernapasan">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Durasi (menit)</label>
                <input type="number" name="duration" required min="1" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Masukkan durasi terapi">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan (opsional)</label>
                <textarea name="notes" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none resize-none" placeholder="Tambahkan catatan terapi"></textarea>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeModal('addTherapyModal')" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all">Batal</button>
                <button type="submit" class="flex-1 btn-primary text-white px-4 py-3 rounded-xl font-semibold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="editTherapyModal" class="form-modal hidden">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('editTherapyModal')"></div>
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6 max-h-[90vh] overflow-y-auto z-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-800">Edit Riwayat Terapi</h2>
            <button onclick="closeModal('editTherapyModal')" class="p-2 hover:bg-gray-100 rounded-xl transition-all">
                <i class="fa-solid fa-xmark text-gray-500 text-xl"></i>
            </button>
        </div>
        <form id="editTherapyForm" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="therapy_id" id="editTherapyId">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Pilih Pasien</label>
                <select name="user_id" id="editUserId" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Terapi</label>
                <input type="text" name="therapy_type" id="editTherapyType" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Contoh: Latihan pernapasan">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Durasi (menit)</label>
                <input type="number" name="duration" id="editDuration" required min="1" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Masukkan durasi terapi">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan (opsional)</label>
                <textarea name="notes" id="editNotes" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none resize-none" placeholder="Tambahkan catatan terapi"></textarea>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeModal('editTherapyModal')" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all">Batal</button>
                <button type="submit" class="flex-1 btn-primary text-white px-4 py-3 rounded-xl font-semibold">Perbarui</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditTherapyModal(therapyId, userId, therapyType, duration, notes) {
    document.getElementById('editTherapyId').value = therapyId;
    document.getElementById('editUserId').value = userId;
    document.getElementById('editTherapyType').value = therapyType;
    document.getElementById('editDuration').value = duration;
    document.getElementById('editNotes').value = notes || '';
    document.getElementById('editTherapyForm').action = '/admin/therapy/' + therapyId;
    openModal('editTherapyModal');
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\admin\therapy.blade.php ENDPATH**/ ?>