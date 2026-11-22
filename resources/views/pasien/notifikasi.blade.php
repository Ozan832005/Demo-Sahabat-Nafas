@extends('layouts.app')
@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16">
        <div class="mb-12">
            <div class="flex items-center gap-6 mb-4">
                <div class="w-16 h-16 gradient-teal rounded-2xl flex items-center justify-center text-white text-3xl shadow-xl shadow-teal-300/40">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Catatan dari Perawat</h1>
                    <p class="text-lg mt-1" style="color: var(--text-secondary)">Catatan dan saran medis setelah sesi terapi</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-600 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold" style="color: var(--text-primary)">Saran Setelah Sesi Terapi</h3>
                            <span class="text-sm text-gray-500">23 Nov 2024, 14:30</span>
                        </div>
                        <p class="text-gray-600 mb-4">Hasil sesi terapi hari ini menunjukkan peningkatan yang baik. Lanjutkan latihan pernapasan secara rutin 3x sehari dan perhatikan pola makan.</p>
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 bg-teal-50 text-teal-600 text-xs font-semibold rounded-full">Dari: Perawat Sarah</span>
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">Sesi: Layer 3</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold" style="color: var(--text-primary)">Pengingatan Rutin</h3>
                            <span class="text-sm text-gray-500">22 Nov 2024, 09:15</span>
                        </div>
                        <p class="text-gray-600 mb-4">Jangan lupa untuk minum air putih minimal 2 liter setiap hari dan hindari lingkungan berasap. Lanjutkan penggunaan inhaler sesuai jadwal.</p>
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 bg-teal-50 text-teal-600 text-xs font-semibold rounded-full">Dari: Perawat Sarah</span>
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">Sesi: Layer 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection