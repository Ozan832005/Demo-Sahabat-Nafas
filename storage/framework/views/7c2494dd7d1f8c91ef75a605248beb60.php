

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.pasien-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="pt-40 pb-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Riwayat Terapi</h1>
            <p class="text-lg mt-1" style="color: var(--text-secondary)">Daftar sesi terapi PPOK yang telah Anda selesaikan</p>
        </div>

        <?php if($therapyHistories && count($therapyHistories) > 0): ?>
            <div class="space-y-6">
                <?php $__currentLoopData = $therapyHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $therapy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 gradient-teal rounded-2xl flex items-center justify-center text-white text-2xl font-bold shadow-xl shadow-teal-300/40">
                                <?php echo e($therapy->layer ?? $index + 1); ?>

                            </div>
                            <div>
                                <h3 class="text-xl font-bold" style="color: var(--text-primary)">Sesi Terapi #<?php echo e($therapy->layer ?? $index + 1); ?></h3>
                                <p class="text-sm" style="color: var(--text-secondary)"><?php echo e($therapy->created_at ? $therapy->created_at->format('d F Y H:i') : '-'); ?></p>
                            </div>
                        </div>
                        <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold">Selesai</span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="p-4 rounded-xl" style="background: var(--bg-secondary)">
                            <p class="text-xs font-semibold uppercase tracking-wide mb-1" style="color: var(--text-secondary)">Nama Pasien</p>
                            <p class="font-bold" style="color: var(--text-primary)"><?php echo e($therapy->nama_pasien ?? '-'); ?></p>
                        </div>
                        <div class="p-4 rounded-xl" style="background: var(--bg-secondary)">
                            <p class="text-xs font-semibold uppercase tracking-wide mb-1" style="color: var(--text-secondary)">Usia</p>
                            <p class="font-bold" style="color: var(--text-primary)"><?php echo e($therapy->usia ?? '-'); ?> tahun</p>
                        </div>
                        <div class="p-4 rounded-xl" style="background: var(--bg-secondary)">
                            <p class="text-xs font-semibold uppercase tracking-wide mb-1" style="color: var(--text-secondary)">Skala MMRC</p>
                            <p class="font-bold" style="color: var(--text-primary)"><?php echo e($therapy->skala_mmrc ?? '-'); ?>/4</p>
                        </div>
                        <div class="p-4 rounded-xl" style="background: var(--bg-secondary)">
                            <p class="text-xs font-semibold uppercase tracking-wide mb-1" style="color: var(--text-secondary)">Skor SURE</p>
                            <p class="font-bold" style="color: var(--text-primary)"><?php echo e($therapy->skor_sure ?? '-'); ?>/4</p>
                        </div>
                    </div>

                    <?php if($therapy->paspor_keputusan): ?>
                    <div class="p-4 rounded-xl mb-6" style="background: var(--bg-secondary)">
                        <p class="text-xs font-semibold uppercase tracking-wide mb-2" style="color: var(--text-secondary)">Paspor Keputusan</p>
                        <p class="text-sm" style="color: var(--text-primary)"><?php echo e($therapy->paspor_keputusan); ?></p>
                    </div>
                    <?php endif; ?>

                    <div class="flex gap-3">
                        <button class="flex-1 py-3 px-6 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all">
                            Lihat Detail
                        </button>
                        <button class="py-3 px-6 border border-gray-200 rounded-xl font-bold hover:bg-gray-50 transition-all" style="color: var(--text-primary)">
                            Cetak Ulang
                        </button>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-[28px] p-16 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-secondary)">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3" style="color: var(--text-primary)">Belum Ada Riwayat Terapi</h3>
                <p class="text-lg mb-8" style="color: var(--text-secondary)">Mulai sesi terapi pertama Anda untuk melihat riwayat di sini</p>
                <a href="<?php echo e(route('pasien.terapi')); ?>" class="inline-block py-4 px-8 gradient-teal text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all">
                    Mulai Terapi
                </a>
            </div>
        <?php endif; ?>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/pasien/catatan.blade.php ENDPATH**/ ?>