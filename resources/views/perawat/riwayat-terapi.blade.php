@extends('layouts.app')

@section('content')
    @include('layouts.perawat-nav')
    
    <div class="pt-40 pb-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="mb-8">
                <a href="{{ route('perawat.dashboard') }}" class="inline-flex items-center gap-2 text-sm font-medium mb-4" style="color: var(--text-secondary)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
                <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Riwayat Terapi Pasien</h1>
                <p class="mt-2" style="color: var(--text-secondary)">Lihat semua riwayat terapi pasien dan berikan catatan rekomendasi</p>
            </div>

            <div class="card-hover p-6 rounded-2xl mb-6">
                <div class="flex flex-wrap gap-4 items-center">
                    <div class="flex-1 min-w-[250px]">
                        <label class="block text-sm font-medium mb-2" style="color: var(--text-secondary)">Pilih Pasien</label>
                        <select id="pasienSelect" onchange="filterByPasien()" class="w-full px-4 py-3 rounded-xl border-0 focus:ring-2 focus:ring-teal-500" style="background: var(--bg-tertiary); color: var(--text-primary)">
                            <option value="">Semua Pasien</option>
                            @foreach($pasienList as $pasien)
                            <option value="{{ $pasien->id }}" @if(request('pasien_id') == $pasien->id) selected @endif>{{ $pasien->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            @if($therapyHistories->isEmpty())
            <div class="card-hover p-12 rounded-2xl text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2" style="color: var(--text-primary)">Belum ada riwayat terapi</h3>
                <p style="color: var(--text-secondary)">Riwayat terapi pasien akan muncul di sini setelah pasien melakukan sesi terapi</p>
            </div>
            @else
            <div class="space-y-4">
                @foreach($therapyHistories as $history)
                <div class="card-hover p-6 rounded-2xl">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-700 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ substr($history->user->name ?? '-', 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-bold" style="color: var(--text-primary)">{{ $history->user->name ?? 'Pasien Tidak Diketahui' }}</h4>
                                    <p class="text-sm" style="color: var(--text-secondary)">{{ $history->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <p class="text-xs font-medium mb-1" style="color: var(--text-secondary)">Teknik Pernapasan</p>
                                    <p class="font-semibold" style="color: var(--text-primary)">{{ $history->breathing_technique ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-medium mb-1" style="color: var(--text-secondary)">Lama Terapi</p>
                                    <p class="font-semibold" style="color: var(--text-primary)">{{ $history->duration ?? '-' }} detik</p>
                                </div>
                                <div>
                                    <p class="text-xs font-medium mb-1" style="color: var(--text-secondary)">Tingkat Kesulitan</p>
                                    <span class="px-2 py-1 rounded-full text-xs font-medium 
                                        @if($history->difficulty_level == 'mudah') bg-green-100 text-green-700
                                        @elseif($history->difficulty_level == 'sedang') bg-yellow-100 text-yellow-700
                                        @else bg-red-100 text-red-700 @endif">
                                        {{ ucfirst($history->difficulty_level ?? '-') }}
                                    </span>
                                </div>
                            </div>

                            @if($history->perawat_notes)
                            <div class="p-4 rounded-xl bg-teal-50 border border-teal-100">
                                <p class="text-xs font-bold mb-2" style="color: var(--gradient-end)">Catatan Perawat:</p>
                                <p class="text-sm" style="color: var(--text-primary)">{{ $history->perawat_notes }}</p>
                            </div>
                            @endif
                        </div>
                        
                        <div class="flex gap-2">
                            <button onclick="openNoteModal({{ $history->id }}, '{{ $history->perawat_notes ?? '' }}')" class="p-3 rounded-xl hover:bg-teal-50 transition-all duration-300 group" style="color: var(--gradient-end)">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="group-hover:scale-110 transition-transform">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <div id="noteModal" class="fixed inset-0 z-[99999] hidden items-center justify-center" style="background: rgba(15, 23, 42, 0.65); backdrop-filter: blur(24px) saturate(200%);">
        <div class="bg-white rounded-[32px] p-6 w-full max-w-lg mx-4 shadow-[0_40px_120px_rgba(0,0,0,0.5)]">
            <h3 class="text-xl font-bold mb-4" style="color: var(--text-primary)">Catatan untuk Pasien</h3>
            <form id="noteForm" method="POST" action="{{ route('perawat.riwayat-terapi.note') }}">
                @csrf
                <input type="hidden" id="historyId" name="history_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2" style="color: var(--text-secondary)">Tulis catatan rekomendasi untuk pasien</label>
                    <textarea id="noteText" name="note" rows="5" class="w-full px-4 py-3 rounded-xl border-0 focus:ring-2 focus:ring-teal-500 resize-none" style="background: var(--bg-tertiary); color: var(--text-primary)" placeholder="Contoh: Pertahankan pola pernapasan yang baik, tingkatkan durasi latihan secara bertahap..."></textarea>
                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="closeNoteModal()" class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-bold hover:bg-gray-200 transition-all duration-300">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:from-teal-600 hover:to-teal-800 transition-all duration-300">
                        Simpan Catatan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function filterByPasien() {
            const pasienId = document.getElementById('pasienSelect').value;
            const url = new URL(window.location);
            if (pasienId) {
                url.searchParams.set('pasien_id', pasienId);
            } else {
                url.searchParams.delete('pasien_id');
            }
            window.location = url.toString();
        }

        function openNoteModal(historyId, currentNote) {
            document.getElementById('historyId').value = historyId;
            document.getElementById('noteText').value = currentNote;
            document.getElementById('noteModal').classList.remove('hidden');
            document.getElementById('noteModal').classList.add('flex');
        }

        function closeNoteModal() {
            document.getElementById('noteModal').classList.add('hidden');
            document.getElementById('noteModal').classList.remove('flex');
        }
    </script>
@endsection