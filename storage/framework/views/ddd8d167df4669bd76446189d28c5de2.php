<!-- Pasien Navigation - Modern Header Menu -->
<nav class="fixed top-20 left-0 right-0 z-50 max-w-7xl mx-auto">
    <div class="bg-white/80 backdrop-blur-md border border-white/20 rounded-3xl shadow-xl overflow-hidden">
        <div class="px-6 py-3 flex items-center justify-between">
            <!-- Brand -->
            <a href="<?php echo e(route('pasien.dashboard')); ?>" class="flex items-center gap-2" style="color: var(--gradient-end)">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                <span class="font-bold text-lg tracking-tight" style="color: var(--text-primary)">Sahabat Nafas</span>
            </a>

            <!-- Main Menu -->
            <div class="flex items-center gap-1">
                <?php
                    $currentRoute = request()->route()->getName() ?? '';
                    $isDashboard = $currentRoute === 'pasien.dashboard';
                    $isTerapi = $currentRoute === 'pasien.terapi';
                    $isCatatan = $currentRoute === 'pasien.catatan';
                ?>

                <!-- Dashboard -->
                <a href="<?php echo e(route('pasien.dashboard')); ?>"
                   class="nav-item px-5 py-2.5 rounded-2xl text-sm font-medium transition-all duration-200 flex items-center gap-2 <?php if($isDashboard): ?> bg-gradient-to-r from-teal-400 to-teal-600 text-white shadow-lg shadow-teal-200 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <!-- Terapi -->
                <a href="<?php echo e(route('pasien.terapi')); ?>"
                   class="nav-item px-5 py-2.5 rounded-2xl text-sm font-medium transition-all duration-200 flex items-center gap-2 <?php if($isTerapi): ?> bg-gradient-to-r from-teal-400 to-teal-600 text-white shadow-lg shadow-teal-200 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Terapi
                </a>

                <!-- Riwayat Terapi -->
                <a href="<?php echo e(route('pasien.catatan')); ?>"
                   class="nav-item px-5 py-2.5 rounded-2xl text-sm font-medium transition-all duration-200 flex items-center gap-2 <?php if($isCatatan): ?> bg-gradient-to-r from-teal-400 to-teal-600 text-white shadow-lg shadow-teal-200 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Riwayat Terapi
                </a>

                <!-- Notifikasi -->
                <a href="<?php echo e(route('pasien.catatan')); ?>"
                   class="nav-item relative px-5 py-2.5 rounded-2xl text-sm font-medium transition-all duration-200 flex items-center gap-2 text-gray-600 hover:bg-gray-50 hover:text-teal-600 group"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    Notifikasi
                    <span class="absolute -top-1 -right-1 flex items-center justify-center min-w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full ring-2 ring-white">
                        3
                    </span>
                </a>
            </div>

            <!-- User Avatar -->
            <div class="flex items-center gap-2">
                <div class="w-9 h-9 gradient-teal rounded-full flex items-center justify-center text-white font-semibold text-sm shadow-lg shadow-teal-200">
                    <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/layouts/pasien-nav.blade.php ENDPATH**/ ?>