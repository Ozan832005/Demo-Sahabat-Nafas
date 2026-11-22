@extends('layouts.app')

@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Catatan Harian</h1>
            <p class="mt-2" style="color: var(--text-secondary)">Catat gejala dan kondisi Anda setiap hari</p>
        </div>

        <div class="card-hover p-8 rounded-2xl mb-8">
            <h3 class="text-xl font-bold mb-6" style="color: var(--text-primary)">Tambah Catatan Hari Ini</h3>
            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Tingkat Sesak Napas</label>
                    <div class="flex gap-2">
                        <button type="button" class="flex-1 py-3 rounded-xl border text-sm font-medium hover:border-teal-500 transition" style="border-color: var(--border-color); color: var(--text-primary)">Tidak Ada</button>
                        <button type="button" class="flex-1 py-3 rounded-xl border text-sm font-medium hover:border-teal-500 transition" style="border-color: var(--border-color); color: var(--text-primary)">Ringan</button>
                        <button type="button" class="flex-1 py-3 rounded-xl border text-sm font-medium hover:border-teal-500 transition" style="border-color: var(--border-color); color: var(--text-primary)">Sedang</button>
                        <button type="button" class="flex-1 py-3 rounded-xl border text-sm font-medium hover:border-teal-500 transition" style="border-color: var(--border-color); color: var(--text-primary)">Berat</button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Catatan Tambahan</label>
                    <textarea rows="4" class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-teal-500 outline-none transition" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)" placeholder="Tulis gejala lain, kondisi, atau hal penting lainnya..."></textarea>
                </div>
                <button type="submit" class="w-full py-4 gradient-teal text-white rounded-xl font-semibold hover:opacity-90 transition">
                    Simpan Catatan
                </button>
            </form>
        </div>

        <h3 class="text-xl font-bold mb-4" style="color: var(--text-primary)">Riwayat Catatan</h3>
        <div class="space-y-4">
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium" style="color: var(--text-secondary)">18 November 2026</span>
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Ringan</span>
                </div>
                <p style="color: var(--text-primary)">Hari ini merasa cukup baik, sesak napas hanya muncul saat berjalan cepat. Sudah melakukan semua latihan napas sesuai jadwal.</p>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium" style="color: var(--text-secondary)">17 November 2026</span>
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Sedang</span>
                </div>
                <p style="color: var(--text-primary)">Pagi ini sesak napas cukup terasa saat bangun tidur. Sudah menggunakan inhaler dan kondisi membaik setelah 30 menit.</p>
            </div>
            <div class="card-hover p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium" style="color: var(--text-secondary)">16 November 2026</span>
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Tidak Ada</span>
                </div>
                <p style="color: var(--text-primary)">Hari ini kondisi sangat baik, tidak ada sesak napas sama sekali. Bisa berjalan santai di taman tanpa kesulitan bernapas.</p>
            </div>
        </div>
    </div>
    </div>
@endsection