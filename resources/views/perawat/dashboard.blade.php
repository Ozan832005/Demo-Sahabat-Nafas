@extends('layouts.app')

@section('content')
    @include('layouts.perawat-nav')
    
    <div class="pt-40 pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8">
                <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Dashboard Perawat 👩‍⚕️</h1>
                <p class="mt-2" style="color: var(--text-secondary)">Pantau kondisi pasien dan berikan panduan terapi</p>
            </div>

            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="card-hover p-6 rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium" style="color: var(--text-secondary)">Total Pasien</span>
                        <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold" style="color: var(--text-primary)">{{ $pasienList->count() }}</p>
                    <p class="text-sm mt-1" style="color: var(--text-secondary)">Pasien terdaftar</p>
                </div>
                <div class="card-hover p-6 rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium" style="color: var(--text-secondary)">Sesi Terapi Hari Ini</span>
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold" style="color: var(--text-primary)">{{ $todayTherapies ?? 0 }}</p>
                    <p class="text-sm mt-1" style="color: var(--text-secondary)">Sesi terapi tercatat</p>
                </div>
                <div class="card-hover p-6 rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium" style="color: var(--text-secondary)">Butuh Perhatian</span>
                        <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold" style="color: var(--text-primary)">{{ $needsAttention ?? 0 }}</p>
                    <p class="text-sm mt-1" style="color: var(--text-secondary)">Pasien gejala berat</p>
                </div>
                <div class="card-hover p-6 rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium" style="color: var(--text-secondary)">Total Riwayat Terapi</span>
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-3xl font-bold" style="color: var(--text-primary)">{{ $totalTherapies ?? 0 }}</p>
                    <p class="text-sm mt-1" style="color: var(--text-secondary)">Catatan terapi tersimpan</p>
                </div>
            </div>

            <div class="card-hover p-8 rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold" style="color: var(--text-primary)">Daftar Pasien</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border-color)">
                                <th class="text-left py-3 px-4 font-semibold text-sm" style="color: var(--text-secondary)">Nama</th>
                                <th class="text-left py-3 px-4 font-semibold text-sm" style="color: var(--text-secondary)">Email</th>
                                <th class="text-left py-3 px-4 font-semibold text-sm" style="color: var(--text-secondary)">Tanggal Daftar</th>
                                <th class="text-left py-3 px-4 font-semibold text-sm" style="color: var(--text-secondary)">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasienList as $pasien)
                            <tr class="border-b" style="border-color: var(--border-color)">
                                <td class="py-4 px-4" style="color: var(--text-primary)">{{ $pasien->name }}</td>
                                <td class="py-4 px-4" style="color: var(--text-secondary)">{{ $pasien->email }}</td>
                                <td class="py-4 px-4" style="color: var(--text-secondary)">{{ $pasien->created_at->format('d M Y') }}</td>
                                <td class="py-4 px-4">
                                    <a href="{{ route('perawat.riwayat-terapi', ['pasien_id' => $pasien->id]) }}" class="px-3 py-1 text-sm rounded-lg inline-flex items-center gap-1" style="background: var(--bg-tertiary); color: var(--text-primary)">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                            <polyline points="14 2 14 8 20 8"/>
                                        </svg>
                                        Lihat Riwayat
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection