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
                    $isRiwayat = $currentRoute === 'pasien.catatan';
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

                <!-- Edukasi -->
                <a href="{{ route('pasien.edukasi') }}"
                   class="nav-item px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isEdukasi) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332-.477-4.5-1.253"/>
                    </svg>
                    Edukasi
                </a>

                <!-- Riwayat Terapi & Notifikasi -->
                <a href="{{ route('pasien.catatan') }}"
                   class="nav-item relative px-6 py-3.5 rounded-[20px] text-sm font-bold transition-all duration-300 flex items-center gap-3 @if($isRiwayat) bg-gradient-to-r from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/40 scale-105 @else text-gray-600 hover:bg-gray-50 hover:text-teal-600 hover:scale-102 @endif"
                   style="color: var(--text-primary)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Riwayat
                    <span class="absolute -top-1 -right-1 flex items-center justify-center min-w-[22px] h-[22px] bg-red-500 text-white text-[11px] font-bold rounded-full ring-2 ring-white animate-pulse shadow-lg">
                        3
                    </span>
                </a>
            </div>

            <!-- User Avatar -->
            <div class="flex items-center gap-5">
                <div class="w-12 h-12 gradient-teal rounded-full flex items-center justify-center text-white font-bold text-lg shadow-xl shadow-teal-300/40 cursor-pointer hover:scale-115 transition-transform duration-300">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>
        </div>
    </div>
</nav>