@extends('layouts.app')

@section('title', 'Terapi - ' . config('app.name'))

@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-2xl p-6 text-white shadow-lg mb-6">
            <h1 class="text-2xl font-bold mb-2">Proses Terapi PPOK</h1>
            <p class="text-teal-100">Alur 5 Layar & Konten Klinis Lengkap</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-gray-700">Progress Sesi</span>
                <span class="text-sm text-gray-500" id="progress-text">Layar 0 dari 4</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div id="progress-bar" class="bg-teal-600 h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
        </div>

        <div id="screen-0" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Identitas, Skala Sesak & Pendamping
            </h2>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="isiContohKasus()" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm font-medium">
                    Isi Contoh Kasus Tn. R
                </button>
                <button onclick="resetSession()" class="px-4 py-2 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition text-sm font-medium">
                    Reset Sesi Baru
                </button>
            </div>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama / Inisial Pasien</label>
                    <input type="text" id="nama-pasien" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Masukkan nama pasien">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Usia (Tahun)</label>
                    <input type="number" id="usia-pasien" min="0" max="150" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Masukkan usia">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Riwayat Kambuh 1 Tahun Terakhir</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <button onclick="pilihKambuh(0)" class="kambuh-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="0">
                            <p class="font-semibold text-gray-800">0 kali</p>
                        </button>
                        <button onclick="pilihKambuh(1)" class="kambuh-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="1">
                            <p class="font-semibold text-gray-800">1 kali</p>
                        </button>
                        <button onclick="pilihKambuh(2)" class="kambuh-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="2">
                            <p class="font-semibold text-gray-800">2 kali atau lebih</p>
                            <p class="text-xs text-red-600 mt-1">Risiko Tinggi - GOLD Grup E</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Skala Derajat Sesak mMRC (0-4)</label>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                        <button onclick="pilihMmrc(0)" class="mmrc-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="0">
                            <p class="text-2xl font-bold text-teal-600">0</p>
                            <p class="text-xs text-gray-600 mt-1">Sesak hanya saat aktivitas berat</p>
                        </button>
                        <button onclick="pilihMmrc(1)" class="mmrc-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="1">
                            <p class="text-2xl font-bold text-teal-600">1</p>
                            <p class="text-xs text-gray-600 mt-1">Sesak saat jalan cepat/menanjak ringan</p>
                        </button>
                        <button onclick="pilihMmrc(2)" class="mmrc-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="2">
                            <p class="text-2xl font-bold text-yellow-600">2</p>
                            <p class="text-xs text-gray-600 mt-1">Berjalan lebih lambat dari orang seusia</p>
                        </button>
                        <button onclick="pilihMmrc(3)" class="mmrc-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="3">
                            <p class="text-2xl font-bold text-orange-600">3</p>
                            <p class="text-xs text-gray-600 mt-1">Berhenti bernapas setelah ~100m</p>
                        </button>
                        <button onclick="pilihMmrc(4)" class="mmrc-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="4">
                            <p class="text-2xl font-bold text-red-600">4</p>
                            <p class="text-xs text-gray-600 mt-1">Terlalu sesak keluar rumah/berpakaian</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pendamping Konsultasi</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <button onclick="pilihPendamping('sendiri')" class="pendamping-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="sendiri">
                            <p class="font-semibold text-gray-800">Sendiri</p>
                        </button>
                        <button onclick="pilihPendamping('pasangan')" class="pendamping-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="pasangan">
                            <p class="font-semibold text-gray-800">Istri / Suami</p>
                        </button>
                        <button onclick="pilihPendamping('anak')" class="pendamping-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="anak">
                            <p class="font-semibold text-gray-800">Anak / Keluarga</p>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button onclick="nextScreen(1)" class="px-8 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-1" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6 hidden">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
                Kepatuhan Inhaler & Faktor Penghambat
            </h2>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Jenis Inhaler yang Digunakan</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <button onclick="pilihInhaler('mdpi')" class="inhaler-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="mdpi">
                            <p class="font-semibold text-gray-800">MDPI (Metered Dose)</p>
                        </button>
                        <button onclick="pilihInhaler('dpi')" class="inhaler-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="dpi">
                            <p class="font-semibold text-gray-800">DPI (Dry Powder)</p>
                        </button>
                        <button onclick="pilihInhaler('nebu')" class="inhaler-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="nebu">
                            <p class="font-semibold text-gray-800">Nebulizer</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Checklist Teknik Penggunaan Inhaler</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="checklist-inhaler w-5 h-5 text-teal-600" value="kocok">
                            <span class="text-gray-700">1. Mengocok inhaler sebelum digunakan</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="checklist-inhaler w-5 h-5 text-teal-600" value="hembus">
                            <span class="text-gray-700">2. Menghembuskan napas sebelum menghirup</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="checklist-inhaler w-5 h-5 text-teal-600" value="hirup">
                            <span class="text-gray-700">3. Menghirup bersamaan dengan menekan inhaler</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="checklist-inhaler w-5 h-5 text-teal-600" value="tahan">
                            <span class="text-gray-700">4. Menahan napas 5-10 detik</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="checklist-inhaler w-5 h-5 text-teal-600" value="cuci">
                            <span class="text-gray-700">5. Mencuci mulut setelah penggunaan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Hari Pemakaian Inhaler dalam Seminggu</label>
                    <input type="range" id="hari-pemakaian" min="0" max="7" value="7" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-teal-600">
                    <div class="flex justify-between text-sm text-gray-500 mt-2">
                        <span>0 hari</span>
                        <span id="hari-value" class="font-bold text-teal-600">7 hari</span>
                        <span>7 hari</span>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Kendala Kepatuhan</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kendala-kepatuhan w-5 h-5 text-teal-600" value="lupa">
                            <span class="text-gray-700">Sering lupa memakai</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kendala-kepatuhan w-5 h-5 text-teal-600" value="sembuh">
                            <span class="text-gray-700">Berhenti pakai karena merasa sembuh</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kendala-kepatuhan w-5 h-5 text-teal-600" value="efek">
                            <span class="text-gray-700">Khawatir efek samping</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kendala-kepatuhan w-5 h-5 text-teal-600" value="teknik">
                            <span class="text-gray-700">Teknik penggunaan salah</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button onclick="prevScreen(0)" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-300 transition-all">
                    ← Kembali
                </button>
                <button onclick="nextScreen(2)" class="px-8 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-2" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6 hidden">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Eksplorasi Persepsi & Fakta Mitos
            </h2>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pilihan Prioritas Terapi Pasien</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <button onclick="pilihTerapi(0)" class="terapi-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="0">
                            <p class="font-semibold text-gray-800">Mengurangi sesak napas</p>
                        </button>
                        <button onclick="pilihTerapi(1)" class="terapi-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="1">
                            <p class="font-semibold text-gray-800">Meningkatkan kemampuan beraktivitas</p>
                        </button>
                        <button onclick="pilihTerapi(2)" class="terapi-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="2">
                            <p class="font-semibold text-gray-800">Mengurangi frekuensi kambuh</p>
                        </button>
                        <button onclick="pilihTerapi(3)" class="terapi-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="3">
                            <p class="font-semibold text-gray-800">Lainnya</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Fakta vs Mitos PPOK</label>
                    <div class="space-y-4">
                        <div class="p-5 border border-gray-200 rounded-xl bg-gray-50">
                            <p class="font-semibold text-gray-800 mb-4 text-lg">"Inhaler steroid akan membuat ketergantungan"</p>
                            <div class="flex gap-4">
                                <button onclick="pilihFaktaMitos(0, 'fakta')" class="fm-btn flex-1 px-5 py-3 border-2 border-gray-300 rounded-xl font-bold transition-all duration-300 hover:scale-105" data-q="0" data-v="fakta">Fakta</button>
                                <button onclick="pilihFaktaMitos(0, 'mitos')" class="fm-btn flex-1 px-5 py-3 border-2 border-gray-300 rounded-xl font-bold transition-all duration-300 hover:scale-105" data-q="0" data-v="mitos">Mitos</button>
                            </div>
                        </div>
                        <div class="p-5 border border-gray-200 rounded-xl bg-gray-50">
                            <p class="font-semibold text-gray-800 mb-4 text-lg">"PPOK hanya terjadi pada perokok"</p>
                            <div class="flex gap-4">
                                <button onclick="pilihFaktaMitos(1, 'fakta')" class="fm-btn flex-1 px-5 py-3 border-2 border-gray-300 rounded-xl font-bold transition-all duration-300 hover:scale-105" data-q="1" data-v="fakta">Fakta</button>
                                <button onclick="pilihFaktaMitos(1, 'mitos')" class="fm-btn flex-1 px-5 py-3 border-2 border-gray-300 rounded-xl font-bold transition-all duration-300 hover:scale-105" data-q="1" data-v="mitos">Mitos</button>
                            </div>
                        </div>
                        <div class="p-5 border border-gray-200 rounded-xl bg-gray-50">
                            <p class="font-semibold text-gray-800 mb-4 text-lg">"Latihan pernapasan bisa membantu PPOK"</p>
                            <div class="flex gap-4">
                                <button onclick="pilihFaktaMitos(2, 'fakta')" class="fm-btn flex-1 px-5 py-3 border-2 border-gray-300 rounded-xl font-bold transition-all duration-300 hover:scale-105" data-q="2" data-v="fakta">Fakta</button>
                                <button onclick="pilihFaktaMitos(2, 'mitos')" class="fm-btn flex-1 px-5 py-3 border-2 border-gray-300 rounded-xl font-bold transition-all duration-300 hover:scale-105" data-q="2" data-v="mitos">Mitos</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button onclick="prevScreen(1)" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-300 transition-all">
                    ← Kembali
                </button>
                <button onclick="nextScreen(3)" class="px-8 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-3" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6 hidden">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                Penentuan Prioritas & Kesepakatan Tindakan
            </h2>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Prioritas Tujuan Terapi Bersama</label>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                        <button onclick="pilihPrioritas(0)" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="0">
                            <p class="text-3xl font-bold text-teal-600">1</p>
                            <p class="text-sm text-gray-600 mt-1">Tertinggi</p>
                        </button>
                        <button onclick="pilihPrioritas(1)" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="1">
                            <p class="text-3xl font-bold text-yellow-600">2</p>
                            <p class="text-sm text-gray-600 mt-1">Sedang</p>
                        </button>
                        <button onclick="pilihPrioritas(2)" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="2">
                            <p class="text-3xl font-bold text-orange-600">3</p>
                            <p class="text-sm text-gray-600 mt-1">Rendah</p>
                        </button>
                        <button onclick="pilihPrioritas(3)" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="3">
                            <p class="text-3xl font-bold text-gray-600">4</p>
                            <p class="text-sm text-gray-600 mt-1">Tidak Setuju</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Dukungan Pendamping terhadap Rencana</label>
                    <textarea id="dukungan-pendamping" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Tuliskan dukungan pendamping terhadap rencana terapi..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Kesepakatan Tindakan yang Disetujui</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kesepakatan-tindakan w-5 h-5 text-teal-600" value="inhaler">
                            <span class="text-gray-700">Rencana penggunaan inhaler yang benar</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kesepakatan-tindakan w-5 h-5 text-teal-600" value="olahraga">
                            <span class="text-gray-700">Jadwal olahraga pernapasan rutin</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kesepakatan-tindakan w-5 h-5 text-teal-600" value="pantau">
                            <span class="text-gray-700">Pemantauan gejala harian</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="kesepakatan-tindakan w-5 h-5 text-teal-600" value="kontak">
                            <span class="text-gray-700">Rencana kontak jika gejala memburuk</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button onclick="prevScreen(2)" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-300 transition-all">
                    ← Kembali
                </button>
                <button onclick="nextScreen(4)" class="px-8 py-3 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-teal-300/40 transition-all">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-4" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6 hidden">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Penilaian Keyakinan (SURE) & Paspor Keputusan
            </h2>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Skala Keyakinan SURE (0-4)</label>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                        <button onclick="pilihSure(0)" class="sure-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="0">
                            <p class="text-2xl font-bold text-gray-600">0</p>
                            <p class="text-xs text-gray-600 mt-1">Sangat Tidak Yakin</p>
                        </button>
                        <button onclick="pilihSure(1)" class="sure-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="1">
                            <p class="text-2xl font-bold text-orange-600">1</p>
                            <p class="text-xs text-gray-600 mt-1">Kurang Yakin</p>
                        </button>
                        <button onclick="pilihSure(2)" class="sure-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="2">
                            <p class="text-2xl font-bold text-yellow-600">2</p>
                            <p class="text-xs text-gray-600 mt-1">Cukup Yakin</p>
                        </button>
                        <button onclick="pilihSure(3)" class="sure-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="3">
                            <p class="text-2xl font-bold text-teal-600">3</p>
                            <p class="text-xs text-gray-600 mt-1">Yakin</p>
                        </button>
                        <button onclick="pilihSure(4)" class="sure-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-center" data-value="4">
                            <p class="text-2xl font-bold text-green-600">4</p>
                            <p class="text-xs text-gray-600 mt-1">Sangat Yakin</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Alasan Keyakinan / Keraguan</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="jawaban-sure w-5 h-5 text-teal-600" value="manfaat">
                            <span class="text-gray-700">Percaya manfaat terapi</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="jawaban-sure w-5 h-5 text-teal-600" value="khawatir">
                            <span class="text-gray-700">Khawatir efek samping</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="jawaban-sure w-5 h-5 text-teal-600" value="dukungan">
                            <span class="text-gray-700">Ada dukungan keluarga</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" class="jawaban-sure w-5 h-5 text-teal-600" value="biaya">
                            <span class="text-gray-700">Khawatir biaya pengobatan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Paspor Keputusan - Ringkasan Kesepakatan</label>
                    <textarea id="paspor-keputusan" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Ringkasan kesepakatan bersama yang telah disepakati..."></textarea>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button onclick="prevScreen(3)" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-300 transition-all">
                    ← Kembali
                </button>
                <div class="flex gap-3">
                    <button onclick="simpanData()" class="px-8 py-3 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-green-300/40 transition-all">
                        Simpan & Cetak PDF
                    </button>
                    <button onclick="resetSession()" class="px-8 py-3 bg-gray-600 text-white rounded-xl font-bold hover:bg-gray-700 transition-all">
                        Reset
                    </button>
                </div>
            </div>
        </div>

        <div id="success-message" class="hidden bg-green-100 border border-green-300 rounded-2xl p-6 text-center mb-6">
            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl shadow-green-400/25">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-green-800 mb-2">Data Berhasil Disimpan!</h3>
            <p class="text-green-600">Sesi terapi telah dicatat ke dalam riwayat.</p>
        </div>

        <!-- Panel Error Validasi (Modern) -->
        <div id="validation-error-panel" class="hidden bg-red-50 border border-red-200 rounded-2xl p-6 mb-6 shadow-sm ring-1 ring-red-500/20">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-red-800 mb-1 flex items-center gap-2">
                        <span>Validasi Gagal</span>
                    </h3>
                    <p class="text-sm text-red-700 mb-3">Periksa kembali pengisian berikut sebelum menyimpan:</p>
                    <ul id="validation-error-list" class="list-disc list-inside space-y-2 text-sm text-red-700"></ul>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-red-100 flex justify-end">
                <button onclick="hideValidationErrors()" class="px-4 py-2 text-red-600 text-sm font-medium hover:bg-red-50 rounded-xl transition">Tutup</button>
            </div>
        </div>

        <!-- Toast Notification Container -->
        <div id="toast-container" class="fixed top-4 right-4 z-[100] flex flex-col gap-3 pointer-events-none"></div>
    </div>

    <style>
        #toast-container .toast {
            animation: toastIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes toastIn {
            from { opacity: 0; transform: translateY(-20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes toastOut {
            to { opacity: 0; transform: translateY(-10px) scale(0.98); }
        }
        #validation-error-panel {
            animation: slideUp 0.35s ease-out forwards;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function showToast(message, type = 'success', duration = 5000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const isError = type === 'error';
            const bg = isError ? 'bg-gradient-to-r from-red-500 to-red-600' : 'bg-gradient-to-r from-teal-500 to-teal-600';
            const icon = isError
                ? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                : '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
            toast.className = 'toast flex items-center gap-3 px-5 py-4 rounded-2xl ' + bg + ' text-white shadow-[0_10px_40px_rgba(0,0,0,0.25)] border border-white/20 backdrop-blur-sm min-w-[260px]';
            toast.innerHTML =
                '<div class="flex-shrink-0">' + icon + '</div>' +
                '<div class="flex-1 min-w-0">' +
                '<p class="text-sm font-semibold leading-tight">' + (isError ? 'Gagal' : 'Berhasil') + '</p>' +
                '<p class="text-xs opacity-90 leading-tight mt-0.5">' + message + '</p>' +
                '</div>' +
                '<button onclick="this.parentElement.style.animation=\'toastOut 0.3s ease forwards\'; setTimeout(()=>this.parentElement.remove(),300)" class="w-7 h-7 rounded-full hover:bg-white/20 flex items-center justify-center transition shrink-0">' +
                '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>' +
                '</button>';
            container.appendChild(toast);
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.style.animation = 'toastOut 0.3s ease forwards';
                    setTimeout(() => toast.remove(), 300);
                }
            }, duration);
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
                    li.className = 'flex items-center gap-2 text-sm text-red-700';
                    li.innerHTML = '<svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>' +
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
        }

        function prevScreen(screen) {
            document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
            document.getElementById(`screen-${screen}`).classList.remove('hidden');
            currentScreen = screen;
            updateProgress();
        }

        function pilihKambuh(val) {
            document.querySelectorAll('.kambuh-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.kambuh-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
            formData.riwayat_kambuh = val;
        }

        function pilihMmrc(val) {
            document.querySelectorAll('.mmrc-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.mmrc-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
            formData.skala_mmrc = val;
        }

        function pilihPendamping(val) {
            document.querySelectorAll('.pendamping-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.pendamping-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
            formData.pendamping = val;
        }

        function pilihInhaler(val) {
            document.querySelectorAll('.inhaler-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.inhaler-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
            formData.jenis_inhaler = val;
        }

        function pilihTerapi(val) {
            document.querySelectorAll('.terapi-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.terapi-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
            formData.pilihan_terapi = val;
        }

        function pilihFaktaMitos(q, v) {
            document.querySelectorAll(`.fm-btn[data-q="${q}"]`).forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-500', 'text-white', 'border-red-500', 'bg-red-500');
                btn.classList.add('border-gray-300');
            });
            const selectedBtn = document.querySelector(`.fm-btn[data-q="${q}"][data-v="${v}"]`);
            if (v === 'fakta') {
                selectedBtn.classList.remove('border-gray-300');
                selectedBtn.classList.add('border-teal-500', 'bg-teal-500', 'text-white');
            } else {
                selectedBtn.classList.remove('border-gray-300');
                selectedBtn.classList.add('border-red-500', 'bg-red-500', 'text-white');
            }
            formData.jawaban_fakta_mitos[q] = v;
            console.log('FaktaMitos selected:', q, v, formData.jawaban_fakta_mitos);
        }

        function pilihPrioritas(val) {
            document.querySelectorAll('.prioritas-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.prioritas-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
            formData.prioritas_tujuan = val;
        }

        function pilihSure(val) {
            document.querySelectorAll('.sure-btn').forEach(btn => btn.classList.remove('border-teal-500', 'bg-teal-50'));
            document.querySelector(`.sure-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50');
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
                    // Coba baca sebagai JSON dulu, kalau gagal ambil text
                    return res.text().then(text => {
                        try {
                            const errData = JSON.parse(text);
                            throw { status: res.status, json: errData };
                        } catch (e) {
                            throw { status: res.status, text: text.substring(0, 200) };
                        }
                    });
                }
                return res.json();
            })
            .then(data => {
                console.log('Server response:', data);
                hideValidationErrors();
                if (data.success) {
                    showToast('Data terapi berhasil disimpan!', 'success');
                    generatePDF();
                    document.getElementById('success-message').classList.remove('hidden');
                } else {
                    showToast('Gagal menyimpan: ' + (data.message || 'Terjadi kesalahan server'), 'error');
                    if (data.errors) {
                        showValidationErrors(data.errors);
                    }
                }
            })
            .catch(err => {
                console.error('Error:', err);
                let errorMsg = 'Terjadi kesalahan jaringan';
                if (err.text) {
                    errorMsg = 'Server mengembalikan respons tidak valid (bukan JSON). Status: ' + err.status;
                } else if (err.json && err.json.message) {
                    errorMsg = 'Gagal menyimpan: ' + err.json.message;
                    if (err.json.errors) {
                        showValidationErrors(err.json.errors);
                    }
                } else if (err.message) {
                    errorMsg = 'Terjadi kesalahan jaringan: ' + err.message;
                }
                showToast(errorMsg, 'error');
                hideValidationErrors();
            });
        }

        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.setFontSize(22);
            doc.text('Paspor Keputusan Terapi PPOK', 20, 20);
            
            doc.setFontSize(12);
            doc.text(`Nama Pasien: ${formData.nama_pasien || '-'}`, 20, 40);
            doc.text(`Usia: ${formData.usia || '-'} tahun`, 20, 50);
            doc.text(`Tanggal: ${new Date().toLocaleDateString('id-ID')}`, 20, 60);
            
            doc.save('paspor-terapi.pdf');
        }

        updateProgress();
    </script>
@endsection