<!-- Pasien Navigation - Modern Header Menu -->
<nav class="fixed top-6 left-0 right-0 z-50 max-w-7xl mx-auto px-4 sm:px-6">
    <div class="bg-white/95 backdrop-blur-2xl border border-white/40 rounded-[28px] shadow-[0_20px_60px_rgba(0,0,0,0.15)]">
        <div class="px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between">
            <!-- Brand -->
            <a href="<?php echo e(route('pasien.dashboard')); ?>" class="flex items-center gap-3" style="color: var(--gradient-end)">
                <div class="w-8 sm:w-10 h-8 sm:h-10 bg-gradient-to-br from-teal-500 to-teal-700 rounded-[10px] sm:rounded-[12px] flex items-center justify-center shadow-xl shadow-teal-300/50 p-1">
                    <img src="<?php echo e(asset('icon.png')); ?>" alt="Logo Sahabat Nafas" class="w-full h-full object-contain">
                </div>
                <span class="font-bold text-sm sm:text-lg tracking-tight hidden sm:block" style="color: var(--text-primary)">Sahabat Nafas</span>
            </a>

            <!-- Main Menu -->
            <div class="flex items-center gap-1 sm:gap-3 overflow-x-auto md:overflow-visible pb-1">
                <?php
                    $currentRoute = request()->route()->getName() ?? '';
                    $isDashboard = $currentRoute === 'pasien.dashboard';
                    $isTerapi = $currentRoute === 'pasien.terapi';
                    $isRiwayatTerapi = $currentRoute === 'pasien.riwayat-terapi';
                    $isCatatanPerawat = $currentRoute === 'pasien.notifikasi';
                    $isEdukasi = $currentRoute === 'pasien.edukasi';
                ?>

                <!-- Dashboard -->
                <a href="<?php echo e(route('pasien.dashboard')); ?>"
                   class="nav-item px-3 sm:px-4 py-2 sm:py-2.5 rounded-[16px] text-[10px] sm:text-xs font-bold transition-all duration-300 flex items-center gap-1 sm:gap-2 <?php if($isDashboard): ?> bg-teal-100 text-teal-600 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-101 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" sm:width="18" sm:height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span class="hidden sm:block whitespace-nowrap">Dashboard</span>
                    <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 h-0.5 w-0 bg-teal-500 rounded-full transition-transform duration-300 <?php if($isDashboard): ?> scale-x-108 <?php else: ?> scale-x-0 <?php endif; ?>" style="transform-origin: 0 0;"></div>
                </a>

                <!-- Terapi -->
                <a href="<?php echo e(route('pasien.terapi')); ?>"
                   class="nav-item px-3 sm:px-4 py-2 sm:py-2.5 rounded-[16px] text-[10px] sm:text-xs font-bold transition-all duration-300 flex items-center gap-1 sm:gap-2 <?php if($isTerapi): ?> bg-teal-100 text-teal-600 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-101 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" sm:width="18" sm:height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                        <path d="M2 12h20"/>
                        <path d="M12 2v20"/>
                    </svg>
                    <span class="hidden sm:block whitespace-nowrap">Terapi</span>
                </a>

                <!-- Riwayat Terapi -->
                <a href="<?php echo e(route('pasien.riwayat-terapi')); ?>"
                   class="nav-item px-3 sm:px-4 py-2 sm:py-2.5 rounded-[16px] text-[10px] sm:text-xs font-bold transition-all duration-300 flex items-center gap-1 sm:gap-2 <?php if($isRiwayatTerapi): ?> bg-teal-100 text-teal-600 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-101 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" sm:width="18" sm:height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    <span class="hidden sm:block whitespace-nowrap">Riwayat Terapi</span>
                    <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 h-0.5 w-0 bg-teal-500 rounded-full transition-transform duration-300 <?php if($isRiwayatTerapi): ?> scale-x-108 <?php else: ?> scale-x-0 <?php endif; ?>" style="transform-origin: 0 0;"></div>
                </a>

                <!-- Catatan Perawat -->
                <a href="<?php echo e(route('pasien.notifikasi')); ?>"
                   class="nav-item px-3 sm:px-4 py-2 sm:py-2.5 rounded-[16px] text-[10px] sm:text-xs font-bold transition-all duration-300 flex items-center gap-1 sm:gap-2 <?php if($isCatatanPerawat): ?> bg-teal-100 text-teal-600 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-101 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" sm:width="18" sm:height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <span class="hidden sm:block whitespace-nowrap">Catatan Perawat</span>
                    <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 h-0.5 w-0 bg-teal-500 rounded-full transition-transform duration-300 <?php if($isCatatanPerawat): ?> scale-x-108 <?php else: ?> scale-x-0 <?php endif; ?>" style="transform-origin: 0 0;"></div>
                </a>

                <!-- Edukasi -->
                <a href="<?php echo e(route('pasien.edukasi')); ?>"
                   class="nav-item px-3 sm:px-4 py-2 sm:py-2.5 rounded-[16px] text-[10px] sm:text-xs font-bold transition-all duration-300 flex items-center gap-1 sm:gap-2 <?php if($isEdukasi): ?> bg-teal-100 text-teal-600 <?php else: ?> text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-101 <?php endif; ?>"
                   style="color: var(--text-primary)">
                    <svg width="16" height="16" sm:width="18" sm:height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span class="hidden sm:block whitespace-nowrap">Edukasi</span>
                </a>
            </div>

            <!-- User Avatar with Dropdown -->
            <div class="relative" x-data="{ open: false, showLogoutModal: false }">
                <button @click="open = !open" class="flex items-center gap-4 p-3 rounded-[20px] hover:bg-gray-50 transition-all duration-300 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-xl shadow-teal-300/40 transition-transform duration-300 group-hover:scale-110">
                        <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                    </div>
                    <svg :class="open ? 'rotate-90' : ''" class="w-5 h-5 text-gray-500 transition-transform duration-300 group-hover:text-teal-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform opacity-0 scale-90 translate-y-2" x-transition:enter-end="transform opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform opacity-100 scale-100 translate-y-0" x-transition:leave-end="transform opacity-0 scale-90 translate-y-2" class="absolute right-0 mt-3 w-96 bg-white rounded-[28px] shadow-[0_30px_100px_rgba(0,0,0,0.22)] border border-white/60 z-[200]">
                    <!-- User Info Header -->
                    <div class="px-6 py-5 bg-gradient-to-r from-teal-500 to-teal-700">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-lg text-white"><?php echo e(auth()->user()->name); ?></p>
                                <p class="text-sm text-teal-100"><?php echo e(auth()->user()->email); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <div class="p-3">
                        <a href="<?php echo e(route('pasien.profile')); ?>" @click="open = false" class="flex items-center gap-4 px-5 py-4 rounded-[20px] text-gray-700 hover:bg-teal-50 hover:text-teal-700 transition-all duration-300 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-100 to-teal-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-teal-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold">Edit Profil</p>
                                <p class="text-xs text-gray-400">Perbarui data diri Anda</p>
                            </div>
                        </a>

                        <button @click="open = false; showLogoutModal = true" class="w-full flex items-center gap-4 px-5 py-4 rounded-[20px] text-red-600 hover:bg-red-50 transition-all duration-300 group">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </div>
                            <div class="flex-1 text-left">
                                <p class="font-bold">Keluar</p>
                                <p class="text-xs text-gray-400">Keluar dari akun Anda</p>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Logout Confirmation Modal Overlay (Full Screen Centered) -->
                <div x-show="showLogoutModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="showLogoutModal = false" class="fixed inset-0 z-[99999] flex items-center justify-center min-h-screen" style="background: rgba(15, 23, 42, 0.65); backdrop-filter: blur(24px) saturate(200%); -webkit-backdrop-filter: blur(24px) saturate(200%);">
                    <!-- Modal Content -->
                    <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform opacity-0 scale-90 translate-y-4" x-transition:enter-end="transform opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform opacity-100 scale-100 translate-y-0" x-transition:leave-end="transform opacity-0 scale-90 translate-y-4" class="bg-white rounded-[32px] p-6 w-full max-w-md max-h-[85vh] overflow-y-auto shadow-[0_40px_120px_rgba(0,0,0,0.5)] border border-white/20 mx-4 sm:mx-0">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-200/40">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Yakin ingin keluar?</h3>
                            <p class="text-gray-500 mb-8 text-sm leading-relaxed">Anda akan keluar dari akun Sahabat Nafas. Pastikan semua data terapi sudah tersimpan sebelum keluar.</p>
                            <div class="flex gap-3 sm:flex-row flex-col">
                                <button @click="showLogoutModal = false" class="flex-1 px-6 py-4 bg-gray-100 text-gray-700 rounded-[20px] font-bold hover:bg-gray-200 transition-all duration-300 shadow-sm">
                                    Batal
                                </button>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" class="flex-1">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full px-6 py-4 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-[20px] font-bold hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg shadow-red-300/40 flex items-center justify-center gap-2">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Ya, Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/layouts/pasien-nav.blade.php ENDPATH**/ ?>