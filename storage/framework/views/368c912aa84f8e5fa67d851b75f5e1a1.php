

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.pasien-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="pt-40 pb-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Catatan dari Perawat</h1>
            <p class="text-lg mt-1" style="color: var(--text-secondary)">Saran dan catatan medis setelah sesi terapi dari perawat</p>
        </div>

        <?php $hasNotes = false; ?>
        <?php if($therapyHistories && count($therapyHistories) > 0): ?>
            <div class="space-y-6">
                <?php $__currentLoopData = $therapyHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $therapy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($therapy->perawat_notes)): ?>
                    <?php $hasNotes = true; ?>
                    <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="2">
                                        <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold" style="color: var(--text-primary)">Catatan Sesi #<?php echo e($therapy->layer ?? '-'); ?></h3>
                                    <p class="text-sm" style="color: var(--text-secondary)"><?php echo e($therapy->created_at ? $therapy->created_at->format('d F Y H:i') : '-'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 rounded-xl" style="background: var(--bg-secondary)">
                            <p class="text-base leading-relaxed" style="color: var(--text-primary)"><?php echo e($therapy->perawat_notes); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if(!$hasNotes): ?>
            <div class="bg-white rounded-[28px] p-16 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-secondary)">
                        <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3" style="color: var(--text-primary)">Belum Ada Catatan dari Perawat</h3>
                <p class="text-lg" style="color: var(--text-secondary)">Catatan dari perawat akan muncul di sini setelah perawat meninjau hasil sesi terapi Anda</p>
            </div>
        <?php endif; ?>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/pasien/notifikasi.blade.php ENDPATH**/ ?>