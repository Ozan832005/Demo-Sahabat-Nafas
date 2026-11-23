

<?php $__env->startSection('title', 'Riwayat Terapi - ' . config('app.name')); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.pasien-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="pt-40 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <div class="flex items-center gap-6 mb-4">
                <div class="w-16 h-16 gradient-teal rounded-2xl flex items-center justify-center text-white text-3xl shadow-xl shadow-teal-300/40">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Riwayat Terapi</h1>
                    <p class="text-lg mt-1" style="color: var(--text-secondary)">Daftar semua sesi terapi PPOK yang telah Anda simpan</p>
                </div>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3 mb-6">
                <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
                <span class="font-medium"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <?php if($therapyHistories->isEmpty()): ?>
            <div class="bg-white rounded-[28px] p-12 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-notes-medical text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Belum ada riwayat terapi</h3>
                <p class="text-gray-500 max-w-md mx-auto mb-6">Mulai sesi terapi pertama Anda dan simpan untuk melihat riwayatnya di sini</p>
                <a href="<?php echo e(route('pasien.terapi')); ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold shadow-lg shadow-teal-300/40 hover:shadow-xl transition-all">
                    <i class="fa-solid fa-plus"></i>
                    Mulai Sesi Terapi
                </a>
            </div>
        <?php else: ?>
            <div class="space-y-6">
                <?php $__currentLoopData = $therapyHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $therapy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)] transition-all duration-500">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-600 rounded-2xl flex items-center justify-center text-white flex-shrink-0 shadow-lg">
                                    <span class="text-xl font-bold"><?php echo e($index + 1); ?></span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-xl font-bold text-gray-800">Sesi Terapi #<?php echo e($index + 1); ?></h3>
                                        <span class="px-3 py-1 bg-teal-50 text-teal-600 text-xs font-bold rounded-full">Layer <?php echo e($index + 1); ?></span>
                                    </div>
                                    <p class="text-gray-500 text-sm mb-4">
                                        <i class="fa-solid fa-calendar mr-2"></i>
                                        <?php echo e($therapy->created_at->format('d F Y, H:i')); ?>

                                    </p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <span class="text-gray-500">Nama Pasien:</span>
                                            <span class="font-semibold text-gray-800 ml-2"><?php echo e($therapy->nama_pasien); ?></span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Usia:</span>
                                            <span class="font-semibold text-gray-800 ml-2"><?php echo e($therapy->usia); ?> tahun</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Riwayat Kambuh:</span>
                                            <span class="font-semibold text-gray-800 ml-2"><?php echo e($therapy->riwayat_kambuh); ?></span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Skala mMRC:</span>
                                            <span class="font-semibold text-gray-800 ml-2"><?php echo e($therapy->skala_mmrc); ?></span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Jenis Inhaler:</span>
                                            <span class="font-semibold text-gray-800 ml-2"><?php echo e($therapy->jenis_inhaler); ?></span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Pilihan Terapi:</span>
                                            <span class="font-semibold text-gray-800 ml-2"><?php echo e($therapy->pilihan_terapi); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 flex-wrap">
                                <button onclick="viewTherapy(<?php echo e($therapy->id); ?>)" class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl font-medium hover:bg-blue-100 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-eye"></i>
                                    Lihat
                                </button>
                                <button onclick="editTherapy(<?php echo e($therapy->id); ?>)" class="px-4 py-2 bg-yellow-50 text-yellow-600 rounded-xl font-medium hover:bg-yellow-100 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                                <button onclick="confirmDelete(<?php echo e($therapy->id); ?>)" class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-medium hover:bg-red-100 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    <div id="viewTherapyModal" class="form-modal hidden">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('viewTherapyModal')"></div>
        <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl p-6 max-h-[90vh] overflow-y-auto z-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Detail Riwayat Terapi</h2>
                <button onclick="closeModal('viewTherapyModal')" class="p-2 hover:bg-gray-100 rounded-xl transition-all">
                    <i class="fa-solid fa-xmark text-gray-500 text-xl"></i>
                </button>
            </div>
            <div id="viewTherapyContent" class="space-y-4">
            </div>
        </div>
    </div>

    <div id="editTherapyModal" class="form-modal hidden">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('editTherapyModal')"></div>
        <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl p-6 max-h-[90vh] overflow-y-auto z-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Edit Riwayat Terapi</h2>
                <button onclick="closeModal('editTherapyModal')" class="p-2 hover:bg-gray-100 rounded-xl transition-all">
                    <i class="fa-solid fa-xmark text-gray-500 text-xl"></i>
                </button>
            </div>
            <form id="editTherapyForm" class="space-y-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div id="editTherapyContent">
                </div>
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal('editTherapyModal')" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-xl font-medium hover:bg-gray-300 transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-medium hover:shadow-lg transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function viewTherapy(id) {
            fetch(`/pasien/terapi/${id}/edit`)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const therapy = data.therapy;
                        let html = `
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Nama Pasien</p>
                                    <p class="font-semibold text-gray-800">${therapy.nama_pasien}</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Usia</p>
                                    <p class="font-semibold text-gray-800">${therapy.usia} tahun</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Riwayat Kambuh</p>
                                    <p class="font-semibold text-gray-800">${therapy.riwayat_kambuh}</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Skala mMRC</p>
                                    <p class="font-semibold text-gray-800">${therapy.skala_mmrc}</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Jenis Inhaler</p>
                                    <p class="font-semibold text-gray-800">${therapy.jenis_inhaler}</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Pilihan Terapi</p>
                                    <p class="font-semibold text-gray-800">${therapy.pilihan_terapi}</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Prioritas Tujuan</p>
                                    <p class="font-semibold text-gray-800">${therapy.prioritas_tujuan}</p>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-500 mb-1">Harapan Pasien</p>
                                    <p class="font-semibold text-gray-800">${therapy.harapan_pasien}</p>
                                </div>
                            </div>
                        `;
                        document.getElementById('viewTherapyContent').innerHTML = html;
                        document.getElementById('viewTherapyModal').classList.remove('hidden');
                    }
                });
        }

        let currentEditId = null;

        function editTherapy(id) {
            currentEditId = id;
            fetch(`/pasien/terapi/${id}/edit`)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const therapy = data.therapy;
                        let html = `
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" value="${therapy.nama_pasien}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Usia</label>
                                    <input type="number" name="usia" value="${therapy.usia}" min="0" max="150" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                            </div>
                        `;
                        document.getElementById('editTherapyContent').innerHTML = html;
                        document.getElementById('editTherapyForm').action = `/pasien/terapi/${id}`;
                        document.getElementById('editTherapyModal').classList.remove('hidden');
                    }
                });
        }

        document.getElementById('editTherapyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    closeModal('editTherapyModal');
                    alert('Riwayat terapi berhasil diperbarui');
                    window.location.reload();
                }
            });
        });

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus riwayat terapi ini? Tindakan ini tidak dapat dibatalkan.')) {
                fetch(`/pasien/terapi/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Riwayat terapi berhasil dihapus');
                        window.location.reload();
                    }
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/pasien/riwayat-terapi.blade.php ENDPATH**/ ?>