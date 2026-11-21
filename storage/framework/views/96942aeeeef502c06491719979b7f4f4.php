

<?php $__env->startSection('content'); ?>
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-8">
            <a href="<?php echo e(route('pasien.dashboard')); ?>" class="inline-flex items-center gap-2 text-sm font-medium mb-4" style="color: var(--text-secondary)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Dashboard
            </a>
            <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Panduan Penggunaan Inhaler</h1>
            <p class="mt-2" style="color: var(--text-secondary)">Ikuti langkah demi langkah untuk penggunaan inhaler yang benar</p>
        </div>

        <div class="space-y-6">
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold">1</div>
                    <div>
                        <h3 class="text-lg font-bold mb-2" style="color: var(--text-primary)">Kocok Inhaler</h3>
                        <p style="color: var(--text-secondary)">Kocok inhaler dengan kuat selama 3-5 detik untuk memastikan campuran obat yang merata.</p>
                    </div>
                </div>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold">2</div>
                    <div>
                        <h3 class="text-lg font-bold mb-2" style="color: var(--text-primary)">Lepas Tutup</h3>
                        <p style="color: var(--text-secondary)">Lepas tutup pelindung dari corong inhaler dan periksa adanya partikel debu.</p>
                    </div>
                </div>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold">3</div>
                    <div>
                        <h3 class="text-lg font-bold mb-2" style="color: var(--text-primary)">Buang Napas</h3>
                        <p style="color: var(--text-secondary)">Hembuskan napas perlahan sampai paru-paru hampir kosong, jangan sampai terburu-buru.</p>
                    </div>
                </div>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold">4</div>
                    <div>
                        <h3 class="text-lg font-bold mb-2" style="color: var(--text-primary)">Posisi Mulut</h3>
                        <p style="color: var(--text-secondary)">Tempelkan corong di antara gigi, tutup rapat dengan bibir, pastikan lidah tidak menghalangi.</p>
                    </div>
                </div>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold">5</div>
                    <div>
                        <h3 class="text-lg font-bold mb-2" style="color: var(--text-primary)">Tekan dan Hirup</h3>
                        <p style="color: var(--text-secondary)">Tekan inhaler sambil menghirup napas perlahan dan dalam selama 3-4 detik.</p>
                    </div>
                </div>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold">6</div>
                    <div>
                        <h3 class="text-lg font-bold mb-2" style="color: var(--text-primary)">Tahan Napas</h3>
                        <p style="color: var(--text-secondary)">Tahan napas selama 10 detik (atau selama yang Anda mampu) sebelum menghembuskan perlahan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 p-6 rounded-2xl" style="background: var(--bg-tertiary)">
            <h3 class="text-lg font-bold mb-4" style="color: var(--text-primary)">Tips Penting</h3>
            <ul class="space-y-2" style="color: var(--text-secondary)">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Gunakan spacer jika tersedia untuk meningkatkan efektivitas obat
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Tunggu minimal 1 menit antara setiap semprotan inhaler
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Bersihkan corong inhaler seminggu sekali dengan air hangat
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/pasien/terapi.blade.php ENDPATH**/ ?>