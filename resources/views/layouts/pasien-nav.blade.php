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
                    $isCatatan = $currentRoute === 'pasien.catatan';
                    $isCatatanPerawat = $currentRoute === 'pasien.notifikasi';
                    $isEdukasi = $currentRoute === 'pasien.edukasi';
                @endphp

                <!-- Dashboard -->
                <a href="{{ route('pasien.dashboard') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isDashboard) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Dashboard
                </a>

                <!-- Terapi -->
                <a href="{{ route('pasien.terapi') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isTerapi) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                        <path d="M2 12h20"/>
                        <path d="M12 2v20"/>
                    </svg>
                    Terapi
                </a>

                <!-- Catatan -->
                <a href="{{ route('pasien.catatan') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isCatatan) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Catatan
                </a>

                <!-- Catatan Perawat -->
                <a href="{{ route('pasien.notifikasi') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isCatatanPerawat) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    Catatan Perawat
                </a>

                <!-- Edukasi -->
                <a href="{{ route('pasien.edukasi') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isEdukasi) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
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