@extends('layouts.app')

@section('title', 'Terapi - ' . config('app.name'))

@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-[24px] p-8 text-white shadow-xl mb-8">
            <h1 class="text-3xl font-extrabold mb-3">Proses Terapi PPOK</h1>
            <p class="text-teal-100 text-lg">Alur 5 Layar & Konten Klinis Lengkap</p>
        </div>

        <div class="bg-white rounded-[24px] shadow-lg p-6 mb-8 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <span class="text-base font-semibold text-gray-800">Progress Sesi</span>
                <span class="text-sm text-gray-600 font-medium" id="progress-text">Layar 0 dari 4</span>
            </div>
            <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                <div id="progress-bar" class="bg-gradient-to-r from-teal-500 to-teal-700 h-3 rounded-full transition-all duration-500 ease-out" style="width: 0%"></div>
            </div>
        </div>

        <div id="screen-0" class="screen-container bg-white rounded-[28px] shadow-xl p-8 mb-8 border border-gray-100">
            <div class="mb-8 p-6 bg-gradient-to-r from-teal-50 to-blue-50 rounded-[20px] border border-teal-100">
                <h2 class="text-2xl font-extrabold text-teal-800 mb-3">Mari Kita Pilih Perawatan Napas Terbaik Bersama</h2>
                <p class="text-gray-700 leading-relaxed">Alat bantu ini memandu Bapak/Ibu dan keluarga memahami pilihan perawatan PPOK secara bertahap sebelum berdiskusi dengan dokter di poliklinik.</p>
            </div>

            <h2 class="text-2xl font-extrabold text-gray-800 mb-8 flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                Identitas, Skala Sesak & Pendamping
            </h2>

            <div class="flex flex-wrap gap-4 mb-8">
                <button onclick="isiContohKasus()" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl hover:shadow-lg hover:shadow-blue-300/40 transition-all duration-300 text-sm font-bold">
                    Isi Contoh Kasus Tn. R
                </button>
                <button onclick="resetSession()" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 text-sm font-bold border border-gray-200">
                    Reset Sesi Baru
                </button>
            </div>

            <div class="space-y-8">
                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-3">Nama / Inisial Pasien</label>
                    <input type="text" id="nama-pasien" class="w-full px-5 py-4 border-2 border-gray-200 rounded-[16px] focus:ring-4 focus:ring-teal-500/20 focus:border-teal-500 transition-all duration-300 text-base" placeholder="Masukkan nama pasien">
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-3">Usia (Tahun)</label>
                    <input type="number" id="usia-pasien" min="0" max="150" class="w-full px-5 py-4 border-2 border-gray-200 rounded-[16px] focus:ring-4 focus:ring-teal-500/20 focus:border-teal-500 transition-all duration-300 text-base" placeholder="Masukkan usia">
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Riwayat Kambuh 1 Tahun Terakhir</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button onclick="pilihKambuh(0)" class="kambuh-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="0">
                            <p class="font-bold text-gray-800 text-lg">0 kali</p>
                        </button>
                        <button onclick="pilihKambuh(1)" class="kambuh-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="1">
                            <p class="font-bold text-gray-800 text-lg">1 kali</p>
                        </button>
                        <button onclick="pilihKambuh(2)" class="kambuh-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="2">
                            <p class="font-bold text-gray-800 text-lg">2 kali atau lebih</p>
                            <p class="text-sm text-red-600 mt-2 font-semibold">Risiko Tinggi - GOLD Grup E</p>
                        </button>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Skala Derajat Sesak mMRC (0-4)</label>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <button onclick="pilihMmrc(0)" class="mmrc-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="0">
                            <p class="text-3xl font-extrabold text-teal-600 mb-2">0</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Sesak hanya saat aktivitas berat</p>
                        </button>
                        <button onclick="pilihMmrc(1)" class="mmrc-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="1">
                            <p class="text-3xl font-extrabold text-teal-600 mb-2">1</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Sesak saat jalan cepat/menanjak ringan</p>
                        </button>
                        <button onclick="pilihMmrc(2)" class="mmrc-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="2">
                            <p class="text-3xl font-extrabold text-yellow-600 mb-2">2</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Berjalan lebih lambat dari orang seusia</p>
                        </button>
                        <button onclick="pilihMmrc(3)" class="mmrc-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="3">
                            <p class="text-3xl font-extrabold text-orange-600 mb-2">3</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Berhenti bernapas setelah ~100m</p>
                        </button>
                        <button onclick="pilihMmrc(4)" class="mmrc-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="4">
                            <p class="text-3xl font-extrabold text-red-600 mb-2">4</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Terlalu sesak keluar rumah/berpakaian</p>
                        </button>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Pendamping Konsultasi</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button onclick="pilihPendamping('sendiri')" class="pendamping-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="sendiri">
                            <p class="font-bold text-gray-800 text-lg">Sendiri</p>
                        </button>
                        <button onclick="pilihPendamping('pasangan')" class="pendamping-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="pasangan">
                            <p class="font-bold text-gray-800 text-lg">Istri / Suami</p>
                        </button>
                        <button onclick="pilihPendamping('anak')" class="pendamping-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="anak">
                            <p class="font-bold text-gray-800 text-lg">Anak / Keluarga</p>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-10">
                <button onclick="nextScreen(1)" class="px-8 py-4 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-[16px] font-bold hover:shadow-xl hover:shadow-teal-300/50 transition-all duration-300 text-base min-w-[220px]">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-1" class="screen-container bg-white rounded-[28px] shadow-xl p-8 mb-8 border border-gray-100 hidden">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-8 flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                Kepatuhan Inhaler & Faktor Penghambat
            </h2>

            <div class="space-y-8">
                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Jenis Inhaler yang Digunakan</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button onclick="pilihInhaler('mdpi')" class="inhaler-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="mdpi">
                            <p class="font-bold text-gray-800 text-lg">MDPI (Metered Dose)</p>
                        </button>
                        <button onclick="pilihInhaler('dpi')" class="inhaler-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="dpi">
                            <p class="font-bold text-gray-800 text-lg">DPI (Dry Powder)</p>
                        </button>
                        <button onclick="pilihInhaler('nebu')" class="inhaler-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="nebu">
                            <p class="font-bold text-gray-800 text-lg">Nebulizer</p>
                        </button>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Checklist Teknik Penggunaan Inhaler</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="kocok">
                            <span class="text-gray-800 font-medium">1. Mengocok inhaler sebelum digunakan</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="hembus">
                            <span class="text-gray-800 font-medium">2. Menghembuskan napas sebelum menghirup</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="hirup">
                            <span class="text-gray-800 font-medium">3. Menghirup bersamaan dengan menekan inhaler</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="tahan">
                            <span class="text-gray-800 font-medium">4. Menahan napas 5-10 detik</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="cuci">
                            <span class="text-gray-800 font-medium">5. Mencuci mulut setelah penggunaan</span>
                        </label>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-3">Jumlah Hari Pemakaian Inhaler dalam Seminggu</label>
                    <input type="range" id="hari-pemakaian" min="0" max="7" value="7" class="w-full h-3 bg-gray-200 rounded-full appearance-none cursor-pointer accent-teal-600">
                    <div class="flex justify-between text-sm text-gray-600 mt-3">
                        <span class="font-medium">0 hari</span>
                        <span id="hari-value" class="font-extrabold text-teal-600 text-lg">7 hari</span>
                        <span class="font-medium">7 hari</span>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Kendala Kepatuhan</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="lupa">
                            <span class="text-gray-800 font-medium">Sering lupa memakai</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="sembuh">
                            <span class="text-gray-800 font-medium">Berhenti pakai karena merasa sembuh</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="efek">
                            <span class="text-gray-800 font-medium">Khawatir efek samping</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="teknik">
                            <span class="text-gray-800 font-medium">Teknik penggunaan salah</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-10 gap-4">
                <button onclick="prevScreen(0)" class="px-6 py-3.5 bg-gray-100 text-gray-700 rounded-[16px] font-bold hover:bg-gray-200 transition-all duration-300 border border-gray-200 min-w-[140px]">
                    ← Kembali
                </button>
                <button onclick="nextScreen(2)" class="px-8 py-3.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-[16px] font-bold hover:shadow-xl hover:shadow-teal-300/50 transition-all duration-300 text-base min-w-[220px]">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-2" class="screen-container bg-white rounded-[28px] shadow-xl p-8 mb-8 border border-gray-100 hidden">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-8 flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                Eksplorasi Persepsi & Fakta Mitos
            </h2>

            <div class="space-y-8">
                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Pilihan Prioritas Terapi Pasien</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button onclick="pilihTerapi(0)" class="terapi-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="0">
                            <p class="font-bold text-gray-800 text-lg">Mengurangi sesak napas</p>
                        </button>
                        <button onclick="pilihTerapi(1)" class="terapi-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="1">
                            <p class="font-bold text-gray-800 text-lg">Meningkatkan kemampuan beraktivitas</p>
                        </button>
                        <button onclick="pilihTerapi(2)" class="terapi-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="2">
                            <p class="font-bold text-gray-800 text-lg">Mengurangi frekuensi kambuh</p>
                        </button>
                        <button onclick="pilihTerapi(3)" class="terapi-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="3">
                            <p class="font-bold text-gray-800 text-lg">Lainnya</p>
                        </button>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Fakta vs Mitos PPOK</label>
                    <div class="space-y-5">
                        <div class="p-6 border-2 border-gray-200 rounded-[20px] bg-gradient-to-br from-gray-50 to-white">
                            <p class="font-bold text-gray-800 mb-5 text-xl">"Inhaler steroid akan membuat ketergantungan"</p>
                            <div class="flex gap-4">
                                <button onclick="pilihFaktaMitos(0, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-[16px] font-bold transition-all duration-300 hover:scale-[1.02]" data-q="0" data-v="fakta">Fakta</button>
                                <button onclick="pilihFaktaMitos(0, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-[16px] font-bold transition-all duration-300 hover:scale-[1.02]" data-q="0" data-v="mitos">Mitos</button>
                            </div>
                        </div>
                        <div class="p-6 border-2 border-gray-200 rounded-[20px] bg-gradient-to-br from-gray-50 to-white">
                            <p class="font-bold text-gray-800 mb-5 text-xl">"PPOK hanya terjadi pada perokok"</p>
                            <div class="flex gap-4">
                                <button onclick="pilihFaktaMitos(1, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-[16px] font-bold transition-all duration-300 hover:scale-[1.02]" data-q="1" data-v="fakta">Fakta</button>
                                <button onclick="pilihFaktaMitos(1, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-[16px] font-bold transition-all duration-300 hover:scale-[1.02]" data-q="1" data-v="mitos">Mitos</button>
                            </div>
                        </div>
                        <div class="p-6 border-2 border-gray-200 rounded-[20px] bg-gradient-to-br from-gray-50 to-white">
                            <p class="font-bold text-gray-800 mb-5 text-xl">"Latihan pernapasan bisa membantu PPOK"</p>
                            <div class="flex gap-4">
                                <button onclick="pilihFaktaMitos(2, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-[16px] font-bold transition-all duration-300 hover:scale-[1.02]" data-q="2" data-v="fakta">Fakta</button>
                                <button onclick="pilihFaktaMitos(2, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-[16px] font-bold transition-all duration-300 hover:scale-[1.02]" data-q="2" data-v="mitos">Mitos</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-10 gap-4">
                <button onclick="prevScreen(1)" class="px-6 py-3.5 bg-gray-100 text-gray-700 rounded-[16px] font-bold hover:bg-gray-200 transition-all duration-300 border border-gray-200 min-w-[140px]">
                    ← Kembali
                </button>
                <button onclick="nextScreen(3)" class="px-8 py-3.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-[16px] font-bold hover:shadow-xl hover:shadow-teal-300/50 transition-all duration-300 text-base min-w-[220px]">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-3" class="screen-container bg-white rounded-[28px] shadow-xl p-8 mb-8 border border-gray-100 hidden">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-8 flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                Eksplorasi Opsi & Kesepakatan Tindakan
            </h2>

            <div class="space-y-8">
                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Prioritas Tujuan Terapi</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button onclick="pilihPrioritas(0)" class="prioritas-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="0">
                            <p class="font-bold text-gray-800 text-lg">Mengurangi gejala</p>
                        </button>
                        <button onclick="pilihPrioritas(1)" class="prioritas-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="1">
                            <p class="font-bold text-gray-800 text-lg">Meningkatkan fungsi</p>
                        </button>
                        <button onclick="pilihPrioritas(2)" class="prioritas-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-left group" data-value="2">
                            <p class="font-bold text-gray-800 text-lg">Menghindari kambuh</p>
                        </button>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-3">Tingkat Dukungan Pendamping</label>
                    <textarea id="dukungan-pendamping" rows="3" class="w-full px-5 py-4 border-2 border-gray-200 rounded-[16px] focus:ring-4 focus:ring-teal-500/20 focus:border-teal-500 transition-all duration-300 text-base" placeholder="Ceritakan dukungan yang Anda dapatkan dari keluarga..."></textarea>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Kesepakatan Tindakan</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="obat">
                            <span class="text-gray-800 font-medium">Rencana pengobatan inhaler</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="olahraga">
                            <span class="text-gray-800 font-medium">Jadwal olahraga pernapasan rutin</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="pantau">
                            <span class="text-gray-800 font-medium">Pemantauan gejala harian</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="kontak">
                            <span class="text-gray-800 font-medium">Rencana kontak jika gejala memburuk</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-10 gap-4">
                <button onclick="prevScreen(2)" class="px-6 py-3.5 bg-gray-100 text-gray-700 rounded-[16px] font-bold hover:bg-gray-200 transition-all duration-300 border border-gray-200 min-w-[140px]">
                    ← Kembali
                </button>
                <button onclick="nextScreen(4)" class="px-8 py-3.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-[16px] font-bold hover:shadow-xl hover:shadow-teal-300/50 transition-all duration-300 text-base min-w-[220px]">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-4" class="screen-container bg-white rounded-[28px] shadow-xl p-8 mb-8 border border-gray-100 hidden">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-8 flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-700 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                Penilaian Keyakinan (SURE) & Paspor Keputusan
            </h2>

            <div class="space-y-8">
                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Skala Keyakinan SURE (0-4)</label>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <button onclick="pilihSure(0)" class="sure-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="0">
                            <p class="text-3xl font-extrabold text-gray-600 mb-2">0</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Sangat Tidak Yakin</p>
                        </button>
                        <button onclick="pilihSure(1)" class="sure-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="1">
                            <p class="text-3xl font-extrabold text-orange-600 mb-2">1</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Kurang Yakin</p>
                        </button>
                        <button onclick="pilihSure(2)" class="sure-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="2">
                            <p class="text-3xl font-extrabold text-yellow-600 mb-2">2</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Cukup Yakin</p>
                        </button>
                        <button onclick="pilihSure(3)" class="sure-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="3">
                            <p class="text-3xl font-extrabold text-teal-600 mb-2">3</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Yakin</p>
                        </button>
                        <button onclick="pilihSure(4)" class="sure-btn p-6 border-2 border-gray-200 rounded-[20px] hover:border-teal-400 hover:shadow-lg hover:shadow-teal-100 transition-all duration-300 text-center group" data-value="4">
                            <p class="text-3xl font-extrabold text-green-600 mb-2">4</p>
                            <p class="text-sm text-gray-600 leading-relaxed">Sangat Yakin</p>
                        </button>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-4">Alasan Keyakinan / Keraguan</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="jawaban-sure w-6 h-6 text-teal-600 rounded-lg" value="manfaat">
                            <span class="text-gray-800 font-medium">Percaya manfaat terapi</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="jawaban-sure w-6 h-6 text-teal-600 rounded-lg" value="khawatir">
                            <span class="text-gray-800 font-medium">Khawatir efek samping</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="jawaban-sure w-6 h-6 text-teal-600 rounded-lg" value="dukungan">
                            <span class="text-gray-800 font-medium">Ada dukungan keluarga</span>
                        </label>
                        <label class="flex items-center gap-4 p-5 border-2 border-gray-200 rounded-[16px] cursor-pointer hover:border-teal-300 hover:bg-teal-50/50 transition-all duration-300 group">
                            <input type="checkbox" class="jawaban-sure w-6 h-6 text-teal-600 rounded-lg" value="biaya">
                            <span class="text-gray-800 font-medium">Khawatir biaya pengobatan</span>
                        </label>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-base font-bold text-gray-800 mb-3">Paspor Keputusan - Ringkasan Kesepakatan</label>
                    <textarea id="paspor-keputusan" rows="4" class="w-full px-5 py-4 border-2 border-gray-200 rounded-[16px] focus:ring-4 focus:ring-teal-500/20 focus:border-teal-500 transition-all duration-300 text-base" placeholder="Ringkasan kesepakatan bersama yang telah disepakati..."></textarea>
                </div>
            </div>

            <div class="flex flex-wrap justify-between items-center mt-10 gap-4">
                <button onclick="prevScreen(3)" class="px-6 py-3.5 bg-gray-100 text-gray-700 rounded-[16px] font-bold hover:bg-gray-200 transition-all duration-300 border border-gray-200 min-w-[140px]">
                    ← Kembali
                </button>
                <div class="flex gap-3 flex-wrap">
                    <button onclick="simpanData()" class="px-6 py-3.5 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-[16px] font-bold hover:shadow-xl hover:shadow-green-300/50 transition-all duration-300 text-base">
                        Simpan & Cetak PDF
                    </button>
                    <button onclick="resetSession()" class="px-6 py-3.5 bg-gray-600 text-white rounded-[16px] font-bold hover:bg-gray-700 transition-all duration-300 text-base">
                        Reset
                    </button>
                </div>
            </div>
        </div>

        <div id="success-message" class="hidden bg-gradient-to-r from-green-50 to-teal-50 border border-green-200 rounded-[24px] p-8 text-center mb-8 shadow-lg">
            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl shadow-green-400/30">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-extrabold text-green-800 mb-3">Data Berhasil Disimpan!</h3>
            <p class="text-green-600 text-lg">Sesi terapi telah dicatat ke dalam riwayat.</p>
        </div>

        <div id="validation-error-panel" class="hidden bg-red-50 border border-red-200 rounded-[24px] p-8 mb-8 shadow-lg ring-1 ring-red-500/20">
            <div class="flex items-start gap-5">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-red-800 mb-2 flex items-center gap-2 text-lg">
                        <span>Validasi Gagal</span>
                    </h3>
                    <p class="text-base text-red-700 mb-4">Periksa kembali pengisian berikut sebelum menyimpan:</p>
                    <ul id="validation-error-list" class="list-disc list-inside space-y-2 text-base text-red-700"></ul>
                </div>
            </div>
            <div class="mt-6 pt-6 border-t border-red-100 flex justify-end">
                <button onclick="hideValidationErrors()" class="px-5 py-2.5 text-red-600 text-base font-bold hover:bg-red-100 rounded-xl transition-all duration-300">Tutup</button>
            </div>
        </div>

        <div id="toast-container" class="fixed top-6 right-6 z-[100] flex flex-col gap-4 pointer-events-none"></div>
    </div>

    <style>
        #toast-container .toast {
            animation: toastIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes toastIn {
            from { opacity: 0; transform: translateY(-30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes toastOut {
            to { opacity: 0; transform: translateY(-20px) scale(0.95); }
        }
        #validation-error-panel {
            animation: slideUp 0.4s ease-out forwards;
        }
        .kambuh-btn.selected, .mmrc-btn.selected, .pendamping-btn.selected, .inhaler-btn.selected, .terapi-btn.selected, .prioritas-btn.selected, .sure-btn.selected {
            border-color: #14b8a6 !important;
            background: linear-gradient(135deg, #ecfdf5, #f0fdfa) !important;
            box-shadow: 0 10px 40px rgba(20, 184, 166, 0.2) !important;
        }
        .fm-btn.selected-fakta {
            border-color: #14b8a6 !important;
            background: linear-gradient(135deg, #14b8a6, #0d9488) !important;
            color: white !important;
        }
        .fm-btn.selected-mitos {
            border-color: #ef4444 !important;
            background: linear-gradient(135deg, #ef4444, #dc2626) !important;
            color: white !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function showToast(message, type = 'success', duration = 5000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const isError = type === 'error';
            const bg = isError ? 'bg-gradient-to-r from-red-500 to-red-600' : 'bg-gradient-to-r from-teal-500 to-teal-700';
            const icon = isError
                ? '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                : '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
            toast.className = 'toast flex items-center gap-4 px-6 py-5 rounded-[20px] ' + bg + ' text-white shadow-[0_15px_50px_rgba(0,0,0,0.3)] border border-white/30 backdrop-blur-sm min-w-[300px] pointer-events-auto';
            toast.innerHTML =
                '<div class="flex-shrink-0">' + icon + '</div>' +
                '<div class="flex-1 min-w-0">' +
                '<p class="text-base font-bold leading-tight">' + (isError ? 'Gagal' : 'Berhasil') + '</p>' +
                '<p class="text-sm opacity-95 leading-tight mt-1">' + message + '</p>' +
                '</div>' +
                '<button onclick="this.parentElement.style.animation=\'toastOut 0.35s ease forwards\'; setTimeout(()=>this.parentElement.remove(),350)" class="w-9 h-9 rounded-full hover:bg-white/25 flex items-center justify-center transition shrink-0">' +
                '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>' +
                '</button>';
            container.appendChild(toast);
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.style.animation = 'toastOut 0.35s ease forwards';
                    setTimeout(() => toast.remove(), 350);
                }
            }, duration);
        }

        function showScreenTransitionToast(screen) {
            const messages = [
                'Layer 0 berhasil disimpan! Menuju Layer Identitas selesai...',
                'Layer 1 berhasil disimpan! Menuju Layer Kepatuhan Inhaler...',
                'Layer 2 berhasil disimpan! Menuju Layer Eksplorasi Persepsi...',
                'Layer 3 berhasil disimpan! Menuju Layer Kesepakatan Tindakan...'
            ];
            if (screen < messages.length) {
                showToast(messages[screen], 'success', 4000);
            }
        }

        function showValidationErrors(errors) {
            const panel = document.getElementById('validation-error-panel');
            const list = document.getElementById('validation-error-list');
            list.innerHTML = '';
            let total = 0;
            for (const [field, msgs] of Object.entries(errors)) {
                const label = field.replace(/_/g, ' ');
                msgs.forEach(msg => {
                    const li = document.createElement('li');
                    li.className = 'flex items-center gap-2 text-base text-red-700';
                    li.innerHTML = '<svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>' +
                        '<strong>' + label + ':</strong> ' + msg;
                    list.appendChild(li);
                    total++;
                });
            }
            panel.classList.remove('hidden');
            panel.scrollIntoView({ behavior: 'smooth', block: 'center' });
            showToast('Terdapat ' + total + ' kesalahan pengisian data', 'error', 7000);
        }

        function hideValidationErrors() {
            document.getElementById('validation-error-panel').classList.add('hidden');
        }
        let currentScreen = 0;
        let formData = {
            nama_pasien: '',
            usia: null,
            riwayat_kambuh: null,
            skala_mmrc: null,
            pendamping: '',
            jenis_inhaler: '',
            checklist_inhaler: [],
            hari_pemakaian: 7,
            duration: 0,
            kendala_kepatuhan: [],
            pilihan_terapi: null,
            jawaban_fakta_mitos: {},
            prioritas_tujuan: null,
            dukungan_pendamping: '',
            kesepakatan_tindakan: [],
            jawaban_sure: [],
            skor_sure: null,
            paspor_keputusan: ''
        };

        document.getElementById('hari-pemakaian').addEventListener('input', function(e) {
            document.getElementById('hari-value').textContent = e.target.value + ' hari';
            formData.hari_pemakaian = parseInt(e.target.value);
        });

        function updateProgress() {
            const progress = (currentScreen / 4) * 100;
            document.getElementById('progress-bar').style.width = progress + '%';
            document.getElementById('progress-text').textContent = `Layar ${currentScreen} dari 4`;
        }

        function nextScreen(screen) {
            document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
            document.getElementById(`screen-${screen}`).classList.remove('hidden');
            currentScreen = screen;
            updateProgress();
            if (screen > 0) {
                showScreenTransitionToast(screen - 1);
            }
        }

        function prevScreen(screen) {
            document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
            document.getElementById(`screen-${screen}`).classList.remove('hidden');
            currentScreen = screen;
            updateProgress();
        }

        function pilihKambuh(val) {
            document.querySelectorAll('.kambuh-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.kambuh-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.riwayat_kambuh = val;
        }

        function pilihMmrc(val) {
            document.querySelectorAll('.mmrc-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.mmrc-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.skala_mmrc = val;
        }

        function pilihPendamping(val) {
            document.querySelectorAll('.pendamping-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.pendamping-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.pendamping = val;
        }

        function pilihInhaler(val) {
            document.querySelectorAll('.inhaler-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.inhaler-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.jenis_inhaler = val;
        }

        function pilihTerapi(val) {
            document.querySelectorAll('.terapi-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.terapi-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.pilihan_terapi = val;
        }

        function pilihFaktaMitos(q, v) {
            document.querySelectorAll(`.fm-btn[data-q="${q}"]`).forEach(btn => {
                btn.classList.remove('selected-fakta', 'selected-mitos', 'border-teal-500', 'bg-teal-500', 'text-white', 'border-red-500', 'bg-red-500');
                btn.classList.add('border-gray-300');
            });
            const selectedBtn = document.querySelector(`.fm-btn[data-q="${q}"][data-v="${v}"]`);
            if (v === 'fakta') {
                selectedBtn.classList.remove('border-gray-300');
                selectedBtn.classList.add('selected-fakta');
            } else {
                selectedBtn.classList.remove('border-gray-300');
                selectedBtn.classList.add('selected-mitos');
            }
            formData.jawaban_fakta_mitos[q] = v;
        }

        function pilihPrioritas(val) {
            document.querySelectorAll('.prioritas-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.prioritas-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.prioritas_tujuan = val;
        }

        function pilihSure(val) {
            document.querySelectorAll('.sure-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelector(`.sure-btn[data-value="${val}"]`).classList.add('selected', 'border-teal-500', 'bg-teal-50');
            formData.skor_sure = val;
        }

        function isiContohKasus() {
            document.getElementById('nama-pasien').value = 'Tn. R';
            document.getElementById('usia-pasien').value = 68;
            pilihKambuh(2);
            pilihMmrc(3);
            pilihPendamping('pasangan');
        }

        function resetSession() {
            currentScreen = 0;
            formData = {
                nama_pasien: '',
                usia: null,
                riwayat_kambuh: null,
                skala_mmrc: null,
                pendamping: '',
                jenis_inhaler: '',
                duration: 0,
                checklist_inhaler: [],
                hari_pemakaian: 7,
                kendala_kepatuhan: [],
                pilihan_terapi: null,
                jawaban_fakta_mitos: {},
                prioritas_tujuan: null,
                dukungan_pendamping: '',
                kesepakatan_tindakan: [],
                jawaban_sure: [],
                skor_sure: null,
                paspor_keputusan: ''
            };
            document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
            document.getElementById('screen-0').classList.remove('hidden');
            document.getElementById('success-message').classList.add('hidden');
            document.querySelectorAll('.kambuh-btn, .mmrc-btn, .pendamping-btn, .inhaler-btn, .terapi-btn, .prioritas-btn, .sure-btn').forEach(btn => {
                btn.classList.remove('selected', 'border-teal-500', 'bg-teal-50');
            });
            document.querySelectorAll('.fm-btn').forEach(btn => {
                btn.classList.remove('selected-fakta', 'selected-mitos', 'border-teal-500', 'bg-teal-500', 'text-white', 'border-red-500', 'bg-red-500');
                btn.classList.add('border-gray-300');
            });
            updateProgress();
        }

        function simpanData() {
            formData.nama_pasien = document.getElementById('nama-pasien').value;
            formData.usia = parseInt(document.getElementById('usia-pasien').value) || null;
            formData.checklist_inhaler = Array.from(document.querySelectorAll('.checklist-inhaler:checked')).map(el => el.value);
            formData.kendala_kepatuhan = Array.from(document.querySelectorAll('.kendala-kepatuhan:checked')).map(el => el.value);
            formData.dukungan_pendamping = document.getElementById('dukungan-pendamping').value;
            formData.kesepakatan_tindakan = Array.from(document.querySelectorAll('.kesepakatan-tindakan:checked')).map(el => el.value);
            formData.jawaban_sure = Array.from(document.querySelectorAll('.jawaban-sure:checked')).map(el => el.value);
            formData.paspor_keputusan = document.getElementById('paspor-keputusan').value;

            if (!formData.nama_pasien || !formData.usia || formData.riwayat_kambuh === null || formData.skala_mmrc === null || !formData.pendamping || !formData.jenis_inhaler || formData.pilihan_terapi === null || formData.prioritas_tujuan === null || formData.skor_sure === null) {
                showToast('Harap lengkapi semua field yang wajib diisi!', 'error');
                hideValidationErrors();
                return;
            }

            console.log('Sending data:', formData);

            fetch('{{ route('pasien.terapi.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(res => {
                console.log('Response status:', res.status, 'Content-Type:', res.headers.get('content-type'));
                if (!res.ok) {
                    return res.text().then(text => {