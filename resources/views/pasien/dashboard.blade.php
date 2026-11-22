@extends('layouts.app')
@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16">
        <div class="mb-12">
            <div class="flex items-center gap-6 mb-4">
                <div class="w-16 h-16 gradient-teal rounded-2xl flex items-center justify-center text-white text-3xl shadow-xl shadow-teal-300/40">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold" style="color: var(--text-primary)">Selamat Datang, {{ $user->name }}!</h1>
                    <p class="text-lg mt-1" style="color: var(--text-secondary)">Semangat terus dalam perjalanan terapi pernapasanmu hari ini</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7 mb-12">
            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)] transition-all duration-500 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-teal-300/50">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="px-4 py-1.5 bg-teal-50 text-teal-600 text-xs font-bold rounded-full">Progres</span>
                </div>
                <p class="text-sm font-semibold text-gray-500 mb-2">Layer Terapi Saat Ini</p>
                <p class="text-5xl font-extrabold" style="color: var(--gradient-end)">Layer {{ $currentLayer }}</p>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)] transition-all duration-500 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-300/50">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 002-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="px-4 py-1.5 bg-blue-50 text-blue-600 text-xs font-bold rounded-full">Total</span>
                </div>
                <p class="text-sm font-semibold text-gray-500 mb-2">Sesi Terapi Selesai</p>
                <p class="text-5xl font-extrabold text-blue-600">{{ $totalTherapySessions }}</p>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)] transition-all duration-500 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-300/50">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <span class="px-4 py-1.5 bg-orange-50 text-orange-600 text-xs font-bold rounded-full">Baru</span>
                </div>
                <p class="text-sm font-semibold text-gray-500 mb-2">Notifikasi dari Perawat</p>
                <p class="text-5xl font-extrabold text-orange-600">{{ $unreadNotifications }}</p>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 hover:shadow-[0_25px_70px_rgba(0,0,0,0.12)] transition-all duration-500 hover:-translate-y-2">
                <div class="flex items-center justify-between mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-purple-300/50">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="px-4 py-1.5 bg-purple-50 text-purple-600 text-xs font-bold rounded-full">Target</span>
                </div>
                <p class="text-sm font-semibold text-gray-500 mb-2">Target Layer Berikutnya</p>
                <p class="text-5xl font-extrabold text-purple-600">Layer {{ min($currentLayer + 1, 4) }}</p>
            </div>
        </div>

        <div class="bg-white rounded-[28px] p-10 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100 mb-12">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-2xl font-extrabold" style="color: var(--text-primary)">Progres Layer Terapi</h2>
                    <p class="text-gray-500 mt-1">Lacak kemajuan terapi pernapasanmu dari Layer 0 hingga Layer 4</p>
                </div>
                <div class="px-6 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold shadow-lg shadow-teal-300/40">
                    {{ round(($currentLayer / 4) * 100) }}% Selesai
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                @for ($i = 0; $i <= 4; $i++)
                    <div class="relative group">
                        <div class="h-40 rounded-[24px] flex flex-col items-center justify-center transition-all duration-500 @if($i <= $currentLayer) bg-gradient-to-br from-teal-500 to-teal-700 text-white shadow-xl shadow-teal-300/50 scale-105 @else bg-gray-50 border-2 border-gray-200 text-gray-400 @endif">
                            <span class="text-5xl font-extrabold mb-3">Layer {{ $i }}</span>
                            @if($i < $currentLayer)
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            @elseif($i == $currentLayer)
                                <div class="w-6 h-6 bg-white rounded-full animate-pulse"></div>
                                <span class="text-sm font-bold mt-2">Sedang Berjalan</span>
                            @else
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </div>
                        @if($i < 4)
                            <div class="hidden md:block absolute top-1/2 -right-3 transform -translate-y-1/2 z-10">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="{{ $i < $currentLayer ? '#14b8a6' : '#d1d5db' }}" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-[28px] p-10 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-extrabold" style="color: var(--text-primary)">Notifikasi Terbaru</h2>
                        <p class="text-gray-500 mt-1">Catatan penting dari perawat untukmu</p>
                    </div>
                    <a href="{{ route('pasien.notifikasi') }}" class="text-teal-600 font-bold hover:text-teal-700 transition-colors">Lihat Semua →</a>
                </div>

                <div class="space-y-5">
                    @if(isset($notifications) && $notifications->count() > 0)
                        @foreach($notifications->take(3) as $notification)
                            <div class="flex items-start gap-5 p-5 bg-gradient-to-r from-orange-50 to-yellow-50 rounded-2xl border border-orange-100 hover:shadow-lg transition-shadow">
                                <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center text-white flex-shrink-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-800">{{ $notification->title ?? 'Catatan dari Perawat' }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $notification->message ?? '' }}</p>
                                    <p class="text-xs text-gray-400 mt-2">{{ isset($notification->created_at) ? $notification->created_at->diffForHumans() : '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-semibold">Belum ada notifikasi</p>
                            <p class="text-sm text-gray-400 mt-1">Notifikasi dari perawat akan muncul di sini</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-[28px] p-10 shadow-[0_15px_50px_rgba(0,0,0,0.08)] border border-gray-100">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-extrabold" style="color: var(--text-primary)">Riwayat Hasil Terapi</h2>
                        <p class="text-gray-500 mt-1">Catatan hasil terapi pernapasanmu</p>
                    </div>
                    <a href="{{ route('pasien.notifikasi') }}" class="text-teal-600 font-bold hover:text-teal-700 transition-colors">Lihat Semua →</a>
                </div>

                <div class="space-y-5">
                    @if($therapyHistories && count($therapyHistories) > 0)
                        @foreach($therapyHistories->take(4) as $index => $history)
                            <div class="flex items-center gap-5 p-5 border border-gray-100 rounded-2xl hover:border-teal-200 hover:bg-teal-50/30 transition-all">
                                <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                    L{{ $index + 1 }}
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-800">Sesi Terapi Layer {{ $index + 1 }}</p>
                                    <p class="text-sm text-gray-500">{{ isset($history->created_at) ? $history->created_at->format('d F Y, H:i') : '' }}</p>
                                </div>
                                <span class="px-4 py-2 bg-green-100 text-green-700 text-xs font-bold rounded-full">Selesai</span>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-5">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 002-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-semibold">Belum ada riwayat terapi</p>
                            <p class="text-sm text-gray-400 mt-1">Mulai sesi terapi pertamamu hari ini!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection