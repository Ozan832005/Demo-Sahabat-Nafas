<!-- Admin Navigation -->
<nav class="fixed top-20 left-0 right-0 z-50 max-w-7xl mx-auto">
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-2 text-xl font-bold tracking-wider" style="color: var(--gradient-end)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    <path d="M5 3v2h3v2H5v2h3v2H3v-2H2v-2h3v-2H3v-2zm6 7a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4zM8 5a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2h-4v-2zm7.168 6.832a5.996 5.996 0 01-4.245-1.06 5.997 5.997 0 11-1.877-8.198 5.997 5.997 0 018.198-1.877 5.996 5.996 0 011.06 4.245z"/>
                </svg>
                Beranda
            </a>
            <button class="flex items-center gap-2 px-4 py-2 rounded-xl hover:bg-gray-50 transition" style="background: var(--bg-tertiary); color: var(--text-primary)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 3l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Profil
            </button>
        </div>
        
        <div class="px-6 py-4 space-y-2">
            <!-- Kelola Pengguna -->
            <a href="<?php echo e(route('admin.users.index')); ?>" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-900 transition text-sm font-medium" style="color: var(--text-primary); background: var(--bg-tertiary)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h8v2h-2a2 2 0 00-2 2v7zM16 3.88a4 4 0 010 7.75 4.1 4.1 0 007.76 4h1.75c.69 0 1.32-.23 1.85-.68l7.25-4.32a4.1 4.1 0 00-.17-3.07L16 3.88z"/>
                </svg>
                Kelola Pengguna
            </a>
            
            <!-- Kelola Pesan -->
            <a href="<?php echo e(route('admin.messages')); ?>" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-900 transition text-sm font-medium" style="color: var(--text-primary); background: var(--bg-tertiary)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    <path d="M5 3v2h3v2H5v2h3v2H3v-2H2v-2h3v-2H3v-2zm6 7a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4z"/>
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Kelola Pesan
            </a>
            
            <!-- Riwayat Terapi -->
            <a href="<?php echo e(route('admin.therapy.history')); ?>" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-900 transition text-sm font-medium" style="color: var(--text-primary); background: var(--bg-tertiary)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2v4l2 2m4-6v12a2 2 0 01-2 2H6a2 2 0 01-2-2V10a2 2 0 012-2h8a2 2 0 012 2z"/>
                </svg>
                Riwayat Terapi
            </a>
            
            <!-- Fitur: Kontak Perawat/Pasien -->
            <a href="#" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-900 transition text-sm font-medium" style="color: var(--text-primary); background: var(--bg-tertiary)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                Hubungi Perawat/Pasien
            </a>
        </div>
    </div>
</nav><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\layouts\admin-nav.blade.php ENDPATH**/ ?>