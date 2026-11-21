@extends('layouts.app')

@section('content')
<div class="pt-32 pb-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Welcome Section -->
        <div class="mb-10">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Selamat Datang, {{ $user->name }}! 👋</h1>
                    <p class="mt-2 text-lg" style="color: var(--text-secondary)">Berikut adalah ringkasan progres terapi PPOK Anda hari ini.</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm px-4 py-2 rounded-full bg-gradient-to-r from-teal-400 to-teal-600 text-white font-medium">
                        🟢 Terapi Aktif
                    </span>
                </div>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Card Progres Layer -->
            <div class="widget-card">
                <div class="widget-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Layer {{ $currentLayer }}/4</h3>
                <p class="text-sm mb-4" style="color: var(--text-secondary)">Progres terapi saat ini</p>
                <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                    <div class="gradient-teal h-3 rounded-full transition-all duration-500" style="width: {{ ($currentLayer / 4) * 100 }}%"></div>
                </div>
                <div class="widget-arrow">
                    <span>Lanjutkan Terapi</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- Card Sesi Terapi -->
            <div class="widget-card">
                <div class="widget-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">{{ $totalTherapySessions }} Sesi</h3>
                <p class="text-sm mb-4" style="color: var(--text-secondary)">Total riwayat terapi</p>
                <div class="flex items-center gap-2 text-sm text-blue-600">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <span>+2 sesi minggu ini</span>
                </div>
            </div>

            <!-- Card Notifikasi -->
            <div class="widget-card">
                <div class="widget-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706); box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">{{ $unreadNotifications }} Baru</h3>
                <p class="text-sm mb-4" style="color: var(--text-secondary)">Catatan dari perawat</p>
                <div class="flex items-center gap-2 text-sm text-amber-600">
                    <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                    <span>Menunggu dibaca</span>
                </div>
            </div>

            <!-- Card Status Kesehatan -->
            <div class="widget-card">
                <div class="widget-icon" style="background: linear-gradient(135deg, #10b981, #059669); box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Baik</h3>
                <p class="text-sm mb-4" style="color: var(--text-secondary)">Status kesehatan hari ini</p>
                <div class="flex items-center gap-2 text-sm text-green-600">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Tidak ada keluhan</span>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Progres Terapi Layer -->
            <div class="lg:col-span-2">
                <div class="card-hover p-8 rounded-2xl" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold" style="color: var(--text-primary)">Progres Layer Terapi</h2>
                        <a href="{{ route('pasien.terapi') }}" class="text-sm font-medium text-teal-600 hover:text-teal-700 transition">
                            Lihat Detail →
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-5 gap-4">
                        @for ($i = 0; $i <= 4; $i++)
                            <div class="text-center">
                                <div class="w-full aspect-square rounded-2xl flex flex-col items-center justify-center transition-all duration-300 @if($i <= $currentLayer) gradient-teal text-white shadow-lg shadow-teal-200 @else bg-gray-100 text-gray-400 @endif">
                                    <span class="text-2xl font-bold">Layer {{ $i }}</span>
                                    <span class="text-xs mt-1 opacity-80">
                                        @if($i == 0) Identitas @endif
                                        @if($i == 1) Audit Inhaler @endif
                                        @if($i == 2) Opsi & Mitos @endif
                                        @if($i == 3) Nilai & Simulasi @endif
                                        @if($i == 4) Paspor @endif
                                    </span>
                                </div>
                                <div class="mt-3">
                                    @if($i < $currentLayer)
                                        <span class="text-xs text-green-600 font-medium">✓ Selesai</span>
                                    @elseif($i == $currentLayer)
                                        <span class="text-xs text-teal-600 font-medium animate-pulse">⚡ Sedang Berjalan</span>
                                    @else
                                        <span class="text-xs text-gray-400 font-medium">🔒 Tertunda</span>
                                    @endif
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Notifikasi Terbaru -->
            <div>
                <div class="card-hover p-8 rounded-2xl h-full" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold" style="color: var(--text-primary)">Notifikasi</h2>
                        <span class="px-3 py-1 rounded-full bg-red-500 text-white text-xs font-bold">{{ $unreadNotifications }}</span>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="p-4 rounded-xl bg-amber-50 border border-amber-100 transition-all hover:shadow-md">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center text-white flex-shrink-0">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold" style="color: var(--text-primary)">Catatan Perawat</p>
                                    <p class="text-xs mt-1" style="color: var(--text-secondary)">Ingat untuk rutin menggunakan inhaler sesuai jadwal ya!</p>
                                    <p class="text-xs mt-2 text-amber-600">2 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-4 rounded-xl bg-blue-50 border border-blue-100 transition-all hover:shadow-md">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white flex-shrink-0">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold" style="color: var(--text-primary)">Sesi Terapi Selesai</p>
                                    <p class="text-xs mt-1" style="color: var(--text-secondary)">Layer 1 telah selesai dikerjakan. Lanjutkan ke Layer berikutnya!</p>
                                    <p class="text-xs mt-2 text-blue-600">Kemarin</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-4 rounded-xl bg-green-50 border border-green-100 transition-all hover:shadow-md">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white flex-shrink-0">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold" style="color: var(--text-primary)">Peningkatan Progres!</p>
                                    <p class="text-xs mt-1" style="color: var(--text-secondary)">Anda telah menyelesaikan 75% dari seluruh sesi terapi.</p>
                                    <p class="text-xs mt-2 text-green-600">3 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Terapi Terbaru -->
        <div class="mt-8">
            <div class="card-hover p-8 rounded-2xl" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold" style="color: var(--text-primary)">Riwayat Hasil Terapi Terbaru</h2>
                    <a href="{{ route('pasien.catatan') }}" class="text-sm font-medium text-teal-600 hover:text-teal-700 transition">
                        Lihat Semua Riwayat →
                    </a>
                </div>
                
                @if($therapyHistories->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b" style="border-color: var(--border-color)">
                                    <th class="text-left py-4 px-4 text-sm font-semibold" style="color: var(--text-secondary)">Tanggal</th>
                                    <th class="text-left py-4 px-4 text-sm font-semibold" style="color: var(--text-secondary)">Layer</th>
                                    <th class="text-left py-4 px-4 text-sm font-semibold" style="color: var(--text-secondary)">Skor mMRC</th>
                                    <th class="text-left py-4 px-4 text-sm font-semibold" style="color: var(--text-secondary)">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($therapyHistories->take(5) as $history)
                                    <tr class="border-b hover:bg-gray-50 transition" style="border-color: var(--border-color)">
                                        <td class="py-4 px-4 text-sm" style="color: var(--text-primary)">{{ $history->created_at->format('d M Y') }}</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 rounded-full text-xs font-medium gradient-teal text-white">
                                                Layer {{ $history->layer ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-sm" style="color: var(--text-primary)">{{ $history->mmrc_score ?? '-' }}/4</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                                Selesai
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">📋</div>
                        <h3 class="text-lg font-semibold mb-2" style="color: var(--text-primary)">Belum ada riwayat terapi</h3>
                        <p class="text-sm mb-6" style="color: var(--text-secondary)">Mulai sesi terapi pertama Anda untuk melihat riwayat di sini.</p>
                        <a href="{{ route('pasien.terapi') }}" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold hover:shadow-lg transition">
                            Mulai Terapi Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection