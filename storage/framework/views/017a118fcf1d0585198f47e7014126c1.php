<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahabat Nafas - Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:wght:300;400;500;600;700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f8fafc; min-height: 100vh; }
        .sidebar { background: linear-gradient(180deg, #059669, #047857, #065f46); box-shadow: 4px 0 32px rgba(0,0,0,0.12); transition: all 0.3s ease; z-index: 40; height: 100vh; position: fixed; top: 0; left: 0; display: flex; flex-direction: column; }
        .sidebar-link { transition: all 0.3s ease; position: relative; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.15); transform: translateX(4px); }
        .glass { background: rgba(255,255,255,0.95); backdrop-filter: blur(24px); border: 1px solid rgba(255,255,255,0.8); box-shadow: 0 4px 24px rgba(0,0,0,0.06); }
        .btn-primary { background: linear-gradient(135deg, #10b981, #059669); transition: all 0.3s ease; box-shadow: 0 4px 16px rgba(16,185,129,0.3); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(16,185,129,0.4); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.08); }
        @keyframes pulse-dot { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:0.5; transform:scale(1.3); } }
        .pulse-dot { animation: pulse-dot 2s ease-in-out infinite; }
        @media (max-width: 1024px) { .sidebar { left: -288px; } .sidebar.open { left: 0; } }
        main { margin-left: 288px; }
        @media (max-width: 1024px) { main { margin-left: 0; } }
        .header-notification { position: relative; }
        .header-notification .badge { position: absolute; top: -2px; right: -2px; width: 10px; height: 10px; background: #ef4444; border-radius: 50%; border: 2px solid white; }
        .notification-dropdown { position: absolute; top: calc(100% + 8px); right: 0; width: 360px; background: white; border-radius: 16px; box-shadow: 0 8px 32px rgba(0,0,0,0.12); border: 1px solid #e5e7eb; z-index: 50; display: none; overflow: hidden; }
        .notification-dropdown.show { display: block; }
        .sidebar nav { overflow: visible !important; height: auto !important; }
        .sidebar { overflow: hidden !important; }
        
        .form-modal {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 1000 !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 16px !important;
        }
        .form-modal.show {
            display: flex !important;
        }
        
        .confirm-modal {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 99999 !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .confirm-modal.show {
            display: flex !important;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen w-full">
        <aside id="sidebar" class="sidebar w-72 p-5 flex flex-col flex-shrink-0">
            <div class="flex items-center gap-3 mb-8 px-2">
                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg overflow-hidden">
                    <img src="<?php echo e(asset('icon.png')); ?>" alt="Logo Kampus" class="w-full h-full object-contain p-1">
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg">Sahabat Nafas</h1>
                    <p class="text-emerald-100 text-xs">Admin Panel</p>
                </div>
            </div>

            <nav class="flex-1 space-y-1.5">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white">
                    <i class="fa-solid fa-house-chimney w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="<?php echo e(route('admin.profile')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.profile') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:text-white">
                    <i class="fa-solid fa-user-circle w-5"></i>
                    <span class="font-medium">Kelola Profile</span>
                </a>
                <a href="<?php echo e(route('admin.users.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.users.index') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:text-white">
                    <i class="fa-solid fa-users-gear w-5"></i>
                    <span class="font-medium">Kelola Pengguna</span>
                </a>
                <a href="<?php echo e(route('admin.messages')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.messages') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:text-white">
                    <i class="fa-solid fa-envelope-open-text w-5"></i>
                    <span class="font-medium">Kelola Pesan</span>
                    <?php if(isset($unreadMessages) && $unreadMessages > 0): ?>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full font-bold pulse-dot"><?php echo e($unreadMessages); ?></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.therapy.history')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.therapy.history') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:text-white">
                    <i class="fa-solid fa-clock-rotate-left w-5"></i>
                    <span class="font-medium">Riwayat Terapi</span>
                </a>
                <a href="<?php echo e(route('admin.contact')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.contact') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:text-white">
                    <i class="fa-solid fa-paper-plane w-5"></i>
                    <span class="font-medium">Hubungi Pengguna</span>
                </a>
                <a href="<?php echo e(route('admin.site')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.site') ? 'active' : ''); ?> flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:text-white">
                    <i class="fa-solid fa-globe w-5"></i>
                    <span class="font-medium">Site</span>
                </a>
            </nav>

            <div class="mt-auto pt-5 border-t border-white/15 flex-shrink-0">
                <div class="flex items-center gap-3 px-3 py-3 bg-white/10 rounded-xl mb-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-user text-emerald-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-white font-semibold text-sm"><?php echo e(Auth::user()->name ?? 'Admin Sahabat'); ?></p>
                        <p class="text-emerald-100 text-xs">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="<?php echo e(route('logout')); ?>" id="logoutForm">
                    <?php echo csrf_field(); ?>
                    <button type="button" onclick="showConfirm('Keluar dari Akun', 'Apakah Anda yakin ingin keluar dari akun admin?', 'logoutForm')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all">
                        <i class="fa-solid fa-right-from-bracket w-5"></i>
                        <span class="font-medium">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-4 sm:p-6 lg:p-8 min-w-0 overflow-x-hidden">
            <header class="glass rounded-2xl p-4 sm:p-5 mb-6 flex items-center justify-between gap-4 sticky top:0 z-30">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="p-2.5 rounded-xl hover:bg-gray-100 transition-all lg:hidden">
                        <i class="fa-solid fa-bars text-xl text-gray-600"></i>
                    </button>
                </div>
                <div class="flex items-center gap-3 sm:gap-4">
                    <div class="hidden sm:flex items-center gap-2.5 px-4 py-2.5 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200">
                        <i class="fa-solid fa-calendar-days text-emerald-600"></i>
                        <span class="text-sm font-semibold text-gray-700"><?php echo e(now()->format('d F Y')); ?></span>
                    </div>
                    <div class="header-notification relative">
                        <button onclick="toggleNotification()" class="p-2.5 rounded-xl hover:bg-gray-100 transition-all">
                            <i class="fa-solid fa-bell text-xl text-gray-600"></i>
                            <?php if(isset($unreadMessages) && $unreadMessages > 0): ?>
                                <span class="badge pulse-dot"></span>
                            <?php endif; ?>
                        </button>
                        <div id="notificationDropdown" class="notification-dropdown">
                            <div class="p-4 border-b border-gray-100">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-bold text-gray-800">Notifikasi</h3>
                                    <?php if(isset($unreadMessages) && $unreadMessages > 0): ?>
                                        <span class="text-xs bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full font-bold"><?php echo e($unreadMessages); ?> baru</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="max-h-80 overflow-y-auto">
                                <?php if(isset($messages) && $messages->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $messages->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('admin.messages')); ?>" class="flex items-start gap-3 p-4 hover:bg-gray-50 transition-all border-b border-gray-50 <?php echo e(!$message->is_read ? 'bg-emerald-50' : ''); ?>">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                                                <i class="fa-solid fa-user text-white text-sm"></i>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="font-semibold text-gray-800 text-sm"><?php echo e($message->name); ?></p>
                                                <p class="text-xs text-gray-500 truncate"><?php echo e(Str::limit($message->message, 50)); ?></p>
                                                <p class="text-xs text-gray-400 mt-1"><?php echo e($message->created_at->diffForHumans()); ?></p>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="p-8 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <i class="fa-solid fa-bell-slash text-gray-400"></i>
                                        </div>
                                        <p class="text-gray-500 text-sm">Tidak ada notifikasi</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <a href="<?php echo e(route('admin.messages')); ?>" class="block p-3 text-center text-sm font-semibold text-emerald-600 hover:bg-emerald-50 transition-all">
                                Lihat semua pesan <i class="fa-solid fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }
        function toggleNotification() {
            document.getElementById('notificationDropdown').classList.toggle('show');
        }
        function openModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('show');
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }
        function closeModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('show');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }
        document.addEventListener('click', function(e) {
            const notifDropdown = document.getElementById('notificationDropdown');
            const notifBtn = e.target.closest('.header-notification button');
            if (!notifDropdown.contains(e.target) && !notifBtn) {
                notifDropdown.classList.remove('show');
            }
            if (window.innerWidth <= 1024) {
                const sidebar = document.getElementById('sidebar');
                if (!sidebar.contains(e.target) && !e.target.closest('button[onclick*="toggleSidebar"]')) {
                    sidebar.classList.remove('open');
                }
            }
        });

        let confirmFormId = null;
        let confirmCallback = null;
        function showConfirm(title, message, callbackOrFormId) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMessage').textContent = message;
            confirmCallback = null;
            confirmFormId = null;
            if (typeof callbackOrFormId === 'function') {
                confirmCallback = callbackOrFormId;
            } else {
                confirmFormId = callbackOrFormId;
            }
            const modal = document.getElementById('confirmModal');
            modal.classList.add('show');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function hideConfirm() {
            const modal = document.getElementById('confirmModal');
            modal.classList.remove('show');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            confirmFormId = null;
            confirmCallback = null;
        }
        function executeConfirm() {
            const formId = confirmFormId;
            const callback = confirmCallback;
            hideConfirm();
            setTimeout(function() {
                if (callback) {
                    callback();
                } else if (formId) {
                    const form = document.getElementById(formId);
                    if (form) {
                        form.submit();
                    }
                }
            }, 100);
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('confirmModal');
            if (modal) {
                modal.classList.remove('show');
                modal.classList.add('hidden');
            }
        });
    </script>

    <div id="confirmModal" class="confirm-modal hidden" style="z-index: 99999;background: rgba(3, 103, 71, 0.6); backdrop-filter: blur(8px);">
        <div class="fixed inset-0 bg-black/60 backdrop-blur-md" onclick="hideConfirm()"></div>
        <div class="bg-white rounded-3xl shadow-[0_25px_80px_rgba(0,0,0,0.3)] p-8 max-w-md mx-4 border border-gray-100 transform transition-all duration-300 scale-100 relative z-10" style="border-radius: 24px; box-shadow: 0 25px 80px rgba(0,0,0,0.3); border-color: rgba(0,0,0,0.05);">
            <div class="text-center mb-7">
                <div class="w-20 h-20 bg-gradient-to-br from-red-400 via-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-5 shadow-2xl shadow-red-300 animate-pulse" style="background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c); box-shadow: 0 8px 24px rgba(220,38,38,0.3);">
                    <i class="fa-solid fa-triangle-exclamation text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2" id="confirmTitle">Konfirmasi</h3>
                <p class="text-gray-500 text-base leading-relaxed" id="confirmMessage">Apakah Anda yakin ingin melanjutkan tindakan ini?</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="hideConfirm()" class="flex-1 px-6 py-4 bg-gray-50 text-gray-700 rounded-2xl font-semibold hover:bg-gray-100 transition-all duration-200 border border-gray-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-xmark mr-2"></i>Batal
                </button>
                <button onclick="executeConfirm()" class="flex-1 px-6 py-4 bg-gradient-to-r from-red-500 via-red-600 to-red-700 text-white rounded-2xl font-semibold hover:from-red-600 hover:via-red-700 hover:to-red-800 transition-all duration-200 shadow-xl shadow-red-300 hover:shadow-red-400 transform hover:-translate-y-0.5" style="background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c);">
                    <i class="fa-solid fa-check mr-2"></i>Ya, Lanjutkan
                </button>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\layouts\dashboard.blade.php ENDPATH**/ ?>