<!-- Pasien Navigation - Modern Header Menu -->
<nav class="fixed top-6 left-0 right-0 z-50 max-w-7xl mx-auto px-4">
    <div class="bg-white/95 backdrop-blur-2xl border border-white/40 rounded-[28px] shadow-[0_20px_60px_rgba(0,0,0,0.15)] overflow-hidden">
        <div class="px-8 py-5 flex items-center justify-between">
            <!-- Brand -->
            <a href="{{ route('pasien.dashboard') }}" class="flex items-center gap-4" style="color: var(--gradient-end)">
                <div class="w-12 h-12 gradient-teal rounded-[18px] flex items-center justify-center text-white shadow-xl shadow-teal-300/50">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <span class="font-bold text-2xl tracking-tight" style="color: var(--text-primary)">Sahabat Nafas</span>
            </a>

            <!-- Main Menu -->
            <div class="flex items-center gap-3">
                @php
                    $currentRoute = request()->route()->getName() ?? '';
                    $isDashboard = $currentRoute === 'pasien.dashboard';
                    $isTerapi = $currentRoute === 'pasien.terapi';
                    $isRiwayat = $currentRoute === 'pasien.notifikasi' || $currentRoute === 'pasien.catatan';
                    $isEdukasi = $currentRoute === 'pasien.edukasi';
                @endphp

                <!-- Dashboard -->
                <a href="{{ route('pasien.dashboard') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isDashboard) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <!-- Terapi -->
                <a href="{{ route('pasien.terapi') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isTerapi) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Terapi
                </a>

                <!-- Notifikasi -->
                <a href="{{ route('pasien.notifikasi') }}"
                   class="nav-item relative px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isRiwayat) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    Notifikasi
                    @php $unreadNotifications = auth()->user()->unreadNotifications ?? 0; @endphp
                    @if($unreadNotifications > 0)
                        <span class="absolute -top-1 -right-1 flex items-center justify-center min-w-[22px] h-[22px] bg-red-500 text-white text-[11px] font-bold rounded-full ring-2 ring-white animate-pulse shadow-lg">
                            {{ $unreadNotifications }}
                        </span>
                    @endif
                </a>

                <!-- Edukasi -->
                <a href="{{ route('pasien.edukasi') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isEdukasi) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332-.477-4.5-1.253"/>
                    </svg>
                    Edukasi
                </a>
            </div>

            <!-- User Avatar with Dropdown -->
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="flex items-center gap-4 p-3 rounded-[20px] hover:bg-gray-50 transition-all duration-300 group">
                    <div class="w-12 h-12 gradient-teal rounded-full flex items-center justify-center text-white font-bold text-lg shadow-xl shadow-teal-300/40 transition-transform duration-300 group-hover:scale-110">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <svg :class="open ? 'rotate-90' : ''" class="w-5 h-5 text-gray-500 transition-transform duration-300 group-hover:text-teal-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-4 w-72 bg-white rounded-[24px] shadow-[0_25px_80px_rgba(0,0,0,0.2)] border border-gray-100 overflow-hidden z-50">
                    <!-- User Info Header -->
                    <div class="px-6 py-5 bg-gradient-to-r from-teal-50 to-teal-100 border-b border-teal-100">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 gradient-teal rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-lg" style="color: var(--text-primary)">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <div class="p-3">
                        <a href="{{ route('pasien.profile') }}" class="flex items-center gap-4 px-5 py-4 rounded-[16px] text-gray-700 hover:bg-teal-50 hover:text-teal-700 transition-all duration-200 group">
                            <div class="w-11 h-11 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-teal-100 transition-colors">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-600 group-hover:text-teal-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold">Profil Saya</p>
                                <p class="text-xs text-gray-400">Lihat dan edit data profil</p>
                            </div>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-4 px-5 py-4 rounded-[16px] text-red-600 hover:bg-red-50 transition-all duration-200 group">
                                <div class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center group-hover:bg-red-100 transition-colors">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-red-500 group-hover:text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                </div>
                                <div class="flex-1 text-left">
                                    <p class="font-semibold">Keluar</p>
                                    <p class="text-xs text-gray-400">Keluar dari akun</p>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>