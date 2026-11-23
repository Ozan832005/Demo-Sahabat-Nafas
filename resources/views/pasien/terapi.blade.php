@extends('layouts.app')

@section('title', 'Terapi - ' . config('app.name'))

@section('content')
    @include('layouts.pasien-nav')
    
    <div class="pt-40 pb-16 px-4 sm:px-6 lg:px-8">
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

        <!-- Therapy initial data for JavaScript pre-population -->
        <input type="hidden" id="therapy-initial-data" value="{{ json_encode($latestTherapy ? [
    'layer' => $latestTherapy->layer,
    'nama_pasien' => $latestTherapy->nama_pasien,
    'usia' => $latestTherapy->usia,
    'riwayat_kambuh' => $latestTherapy->riwayat_kambuh,
    'skala_mmrc' => $latestTherapy->skala_mmrc,
    'pendamping' => $latestTherapy->pendamping,
    'jenis_inhaler' => $latestTherapy->jenis_inhaler,
    'checklist_inhaler' => $latestTherapy->checklist_inhaler ?? [],
    'hari_pemakaian' => $latestTherapy->hari_pemakaian,
    'duration' => $latestTherapy->duration,
    'kendala_kepatuhan' => $latestTherapy->kendala_kepatuhan ?? [],
    'pilihan_terapi' => $latestTherapy->pilihan_terapi,
    'jawaban_fakta_mitos' => $latestTherapy->jawaban_fakta_mitos ?? [],
    'prioritas_tujuan' => $latestTherapy->prioritas_tujuan,
    'dukungan_pendamping' => $latestTherapy->dukungan_pendamping,
    'kesepakatan_tindakan' => $latestTherapy->kesepakatan_tindakan ?? [],
    'harapan_pasien' => $latestTherapy->harapan_pasien,
    'dukungan_pendamping_baru' => $latestTherapy->dukungan_pendamping_baru,
    'rencana_bertahap' => $latestTherapy->rencana_bertahap ?? [],
    'paham_manfaat' => $latestTherapy->paham_manfaat,
    'pilihan_tepat' => $latestTherapy->pilihan_tepat,
    'dukungan_cukup' => $latestTherapy->dukungan_cukup,
    'yakin_keputusan' => $latestTherapy->yakin_keputusan
] : null) }}">

        <div id="screen-0" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Mari Kita Pilih Perawatan Napas Terbaik Bersama</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Alat bantu ini memandu Bapak/Ibu dan keluarga memahami pilihan perawatan PPOK secara bertahap sebelum berdiskusi dengan dokter di poliklinik.</p>
            </div>

            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Identitas, Skala Sesak & Pendamping
            </h2>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="isiContohKasus()" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm font-medium sm:w-full">
                    Isi Contoh Kasus Tn. R
                </button>
                <button onclick="resetSession()" class="px-4 py-2 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition text-sm font-medium sm:w-full">
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
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button onclick="pilihKambuh(0)" class="kambuh-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="0">
                            <p class="font-bold text-gray-800 text-lg">0 kali</p>
                        </button>
                        <button onclick="pilihKambuh(1)" class="kambuh-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="1">
                            <p class="font-bold text-gray-800 text-lg">1 kali</p>
                        </button>
                        <button onclick="pilihKambuh(2)" class="kambuh-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="2">
                            <p class="font-bold text-gray-800 text-lg">2 kali atau lebih</p>
                            <p class="text-xs text-red-600 mt-2 font-medium">Risiko Tinggi - GOLD Grup E</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Skala Derajat Sesak mMRC (0-4)</label>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <button onclick="pilihMmrc(0)" class="mmrc-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-center transform hover:-translate-y-0.5" data-value="0">
                            <p class="text-3xl font-bold text-teal-600 mb-2">0</p>
                            <p class="text-sm text-gray-600 leading-tight">Sesak hanya saat aktivitas berat</p>
                        </button>
                        <button onclick="pilihMmrc(1)" class="mmrc-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-center transform hover:-translate-y-0.5" data-value="1">
                            <p class="text-3xl font-bold text-teal-600 mb-2">1</p>
                            <p class="text-sm text-gray-600 leading-tight">Sesak saat jalan cepat/menanjak ringan</p>
                        </button>
                        <button onclick="pilihMmrc(2)" class="mmrc-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-center transform hover:-translate-y-0.5" data-value="2">
                            <p class="text-3xl font-bold text-yellow-600 mb-2">2</p>
                            <p class="text-sm text-gray-600 leading-tight">Berjalan lebih lambat dari orang seusia</p>
                        </button>
                        <button onclick="pilihMmrc(3)" class="mmrc-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-center transform hover:-translate-y-0.5" data-value="3">
                            <p class="text-3xl font-bold text-orange-600 mb-2">3</p>
                            <p class="text-sm text-gray-600 leading-tight">Berhenti bernapas setelah ~100m</p>
                        </button>
                        <button onclick="pilihMmrc(4)" class="mmrc-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-center transform hover:-translate-y-0.5" data-value="4">
                            <p class="text-3xl font-bold text-red-600 mb-2">4</p>
                            <p class="text-sm text-gray-600 leading-tight">Terlalu sesak keluar rumah/berpakaian</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pendamping Konsultasi</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <button onclick="pilihPendamping('sendiri')" class="pendamping-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="sendiri">
                            <p class="font-bold text-gray-800 text-lg">Sendiri</p>
                        </button>
                        <button onclick="pilihPendamping('pasangan')" class="pendamping-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="pasangan">
                            <p class="font-bold text-gray-800 text-lg">Istri / Suami</p>
                        </button>
                        <button onclick="pilihPendamping('anak')" class="pendamping-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="anak">
                            <p class="font-bold text-gray-800 text-lg">Anak / Keluarga</p>
                        </button>
                        <button onclick="pilihPendamping('lainnya')" class="pendamping-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="lainnya">
                            <p class="font-bold text-gray-800 text-lg">Lainnya</p>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button onclick="nextScreen(1)" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-medium hover:shadow-lg hover:shadow-teal-300/40 transition-all transform hover:-translate-y-0.5">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="pilihInhaler('mdpi')" class="inhaler-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="mdpi">
                        <p class="font-bold text-gray-800 text-lg">MDPI (Metered Dose)</p>
                    </button>
                    <button onclick="pilihInhaler('dpi')" class="inhaler-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="dpi">
                        <p class="font-bold text-gray-800 text-lg">DPI (Dry Powder)</p>
                    </button>
                    <button onclick="pilihInhaler('nebu')" class="inhaler-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="nebu">
                        <p class="font-bold text-gray-800 text-lg">Nebulizer</p>
                    </button>
                </div>
            </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Teknik Penggunaan Inhaler yang Sudah Dikuasai</label>
                    <div class="space-y-4">
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="kocok">
                            <span class="text-gray-800 font-medium text-lg">Mengocok inhaler sebelum pakai</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="napasdalam">
                            <span class="text-gray-800 font-medium text-lg">Mengembuskan napas dalam sebelum menghirup</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="hirup">
                            <span class="text-gray-800 font-medium text-lg">Menghirup perlahan saat menekan inhaler</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="tahan">
                            <span class="text-gray-800 font-medium text-lg">Menahan napas 10 detik setelah menghirup</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="checklist-inhaler w-6 h-6 text-teal-600 rounded-lg" value="cuci">
                            <span class="text-gray-800 font-medium text-lg">Mencuci mulut setelah pakai inhaler steroid</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Kendala Kepatuhan</label>
                    <div class="space-y-4">
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="lupa">
                            <span class="text-gray-800 font-medium text-lg">Sering lupa memakai</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="sembuh">
                            <span class="text-gray-800 font-medium text-lg">Berhenti pakai karena merasa sembuh</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="efek">
                            <span class="text-gray-800 font-medium text-lg">Khawatir efek samping</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kendala-kepatuhan w-6 h-6 text-teal-600 rounded-lg" value="teknik">
                            <span class="text-gray-800 font-medium text-lg">Teknik penggunaan salah</span>
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
            </div>

            <div class="flex justify-between items-center mt-8 gap-4">
                <button onclick="prevScreen(0)" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-all transform hover:-translate-y-0.5 border border-gray-200">
                    ← Kembali
                </button>
                <button onclick="nextScreen(2)" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-medium hover:shadow-lg hover:shadow-teal-300/40 transition-all transform hover:-translate-y-0.5">
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

            <div class="mb-8 p-5 bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl border border-teal-100 shadow-sm">
                <p class="text-gray-700 leading-relaxed">Pelajari manfaat dan risiko tiap pilihan perawatan di bawah ini, lalu cek bersama mana informasi di HP/medsos yang merupakan Fakta dan mana yang Mitos.</p>
            </div>

                <div class="space-y-4">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-5 border border-green-200 hover:shadow-md transition-all duration-300">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">LANGKAH UTAMA (AMAN)</span>
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">1. Perbaiki Cara Pakai Inhaler & Rutin Terapi</h4>
                        <div class="space-y-2 text-sm text-gray-700">
                            <p><strong class="text-green-700">Manfaat:</strong> Obat masuk lebih dalam ke saluran napas sehingga sesak berkurang tanpa harus langsung ganti obat baru.</p>
                            <p><strong class="text-green-700">Tantangan:</strong> Perlu latihan peragaan bersama perawat dan disiplin jadwal harian.</p>
                            <p><strong class="text-green-700">Pertimbangan:</strong> Langkah pertama yang paling aman saat obat terasa kurang maksimal.</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-5 border border-blue-200 hover:shadow-md transition-all duration-300">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">DIANJURKAN DOKTER PARU</span>

                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">2. Latihan Paru & Jalan Santai Bertahap</h4>
                        <div class="space-y-2 text-sm text-gray-700">
                            <p><strong class="text-blue-700">Manfaat:</strong> Menguatkan otot pernapasan, mengurangi sesak saat beraktivitas, dan mencegah masuk rumah sakit lagi.</p>
                            <p><strong class="text-blue-700">Tantangan:</strong> Napas terasa sedikit bekerja di awal, namun dimulai pelan-pelan di bawah pengawasan petugas.</p>
                            <p><strong class="text-blue-700">Pertimbangan:</strong> Sangat baik untuk pasien yang sering kambuh dan didukung penuh oleh istri/keluarga.</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-2xl p-5 border border-yellow-200 hover:shadow-md transition-all duration-300">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">KURANG DIANJURKAN</span>
           
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">3. Hanya Diam di Rumah & Kurangi Gerak</h4>
                        <div class="space-y-2 text-sm text-gray-700">
                            <p><strong class="text-yellow-700">Manfaat:</strong> Terasa aman sementara karena menghindari rasa lelah sesaat.</p>
                            <p><strong class="text-red-600">Risiko:</strong> Otot tubuh dan otot napas makin melemah, sehingga jalan sebentar saja sudah ngos-ngosan.</p>
                            <p><strong class="text-yellow-700">Pertimbangan:</strong> Membuat kemandirian berkurang dalam jangka panjang.</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-2xl p-5 border border-red-200 hover:shadow-md transition-all duration-300">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">RISIKO TINGGI BILA STOP OBAT DOKTER</span>
                         
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-2">4. Ganti Obat Alternatif dari Media Sosial</h4>
                        <div class="space-y-2 text-sm text-gray-700">
                            <p><strong class="text-orange-700">Manfaat:</strong> Hanya memberi harapan dari cerita testimoni yang belum terbukti.</p>
                            <p><strong class="text-red-600">Risiko:</strong> Belum teruji aman; menghentikan inhaler dokter berisiko tinggi memicu serangan sesak berat.</p>
                            <p><strong class="text-red-700">Pertimbangan:</strong> Berbahaya bagi keselamatan bila menggantikan terapi standar dokter.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-200">
                    <div class="flex items-start gap-3 mb-4">
                        <span class="text-2xl">🛡️</span>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg mb-1">Waspada 3 Ciri Info Obat Palsu di HP & Media Sosial</h3>
                          
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Sebelum percaya iklan atau kiriman video di HP, perhatikan 3 tanda bahaya berikut:</p>
                    <div class="space-y-3">
                        <div class="flex gap-3 items-start">
                            <span class="bg-orange-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">1</span>
                            <div>
                                <p class="font-semibold text-gray-800">Janji Sembuh Total & Instan</p>
                                <p class="text-sm text-gray-600">Penyakit paru kronis dikendalikan secara bertahap, bukan sembuh total dalam hitungan hari.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start">
                            <span class="bg-orange-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">2</span>
                            <div>
                                <p class="font-semibold text-gray-800">Menyuruh Stop Obat Dokter</p>
                                <p class="text-sm text-gray-600">Info kesehatan yang aman tidak pernah menyuruh pasien membuang inhaler resep dokter.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start">
                            <span class="bg-orange-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">3</span>
                            <div>
                                <p class="font-semibold text-gray-800">Hanya Modal Testimoni Video</p>
                                <p class="text-sm text-gray-600">Cerita sembuh di kolom komentar medsos tidak bisa menggantikan uji medis dan izin resmi BPOM.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pilihan Prioritas Terapi Pasien</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button onclick="pilihTerapi(0)" class="terapi-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="0">
                            <p class="font-bold text-gray-800 text-lg">Mengurangi sesak napas</p>
                        </button>
                        <button onclick="pilihTerapi(1)" class="terapi-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="1">
                            <p class="font-bold text-gray-800 text-lg">Meningkatkan kemampuan beraktivitas</p>
                        </button>
                        <button onclick="pilihTerapi(2)" class="terapi-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="2">
                            <p class="font-bold text-gray-800 text-lg">Mengurangi frekuensi kambuh</p>
                        </button>
                        <button onclick="pilihTerapi(3)" class="terapi-btn p-5 border-2 border-gray-200 rounded-2xl hover:border-teal-500 hover:shadow-md hover:shadow-teal-100/50 transition-all duration-300 text-left transform hover:-translate-y-0.5" data-value="3">
                            <p class="font-bold text-gray-800 text-lg">Lainnya</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Fakta vs Mitos PPOK</label>
                    <div class="space-y-5">
                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="0">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">1. Katanya di medsos, jamu herbal bisa menyembuhkan total sakit paru dalam seminggu?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(0, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="0" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(0, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="0" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q0-explanation">
                                <p class="text-gray-700 leading-relaxed">Penyakit paru kronis seperti COPD atau asma adalah kondisi yang bertahap dan tidak bisa sembuh total dalam seminggu. Obat terapeutik seperti inhaler berfungsi untuk mengontrol gejala dan mencegah komplikasi, bukan untuk "sembuh" total dalam waktu sesingkat waktu.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="1">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">2. Kata video di HP, kalau sudah minum ramuan alami, inhaler dokter harus distop?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(1, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="1" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(1, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="1" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q1-explanation">
                                <p class="text-gray-700 leading-relaxed">Menurut prinsip perawatan standar, penghentian obat penghasil sesak (seperti inhaler bronkodilator) harus dilakukan secara bertahap dan bawah pengawasan dokter. Mercedera ramuan alami tidak berarti harus menghentikan inhaler yang telah diresepkan dokter, karena hal ini bisa memicu serangan sesak yang berat.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="2">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">3. Beredar pesan di grup WA, sering pakai inhaler bikin paru-paru rusak dan ketagihan?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(2, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="2" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(2, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="2" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q2-explanation">
                                <p class="text-gray-700 leading-relaxed">Inhaler yang diresepkan dokter dan digunakan sesuai petunjuk tidak merusak paru-paru. Ketagihan atau overuse obat bisa terjadi, tetapi inhaler itu sendiri tidak membuat organ paru "rusak". Justru, ketidakpatuhan dalam memakai obat yang diresepkan justru meningkatkan risiko komplikasi.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="3">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">4. Ada dokter di medsos bilang inhaler terasa kurang mempan karena cara hisapnya salah?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(3, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="3" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(3, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="3" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q3-explanation">
                                <p class="text-gray-700 leading-relaxed">Benar! Teknik hisap inhaler yang salah bisa membuat obat tidak menyebar dengan optimal ke saluran napas, sehingga efek terasa lemah. Teknik yang benar meliputi: mengocok inhaler sebelum digunakan, mengembuskan napas sebelum menghirup, menghirup perlahan saat menekan inhaler, dan menahan napas 10 detik setelah menghirup.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="4">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">5. Kata postingan di medsos, orang sakit paru dilarang jalan kaki karena bikin napas putus?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(4, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="4" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(4, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="4" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q4-explanation">
                                <p class="text-gray-700 leading-relaxed">Mitos! Pasien sakit paru tidak dilarang total untuk beraktivitas ringan seperti jalan kaki. Aktivitas fisik yang terkontrol sebenarnya membantu meningkatkan fungsi paru dan kekuatan otot pernapasan. Namun, harus dilakukan dengan pengawasan dan sesuai kemampuan pasien.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="5">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">6. Info kesehatan terpercaya menyebut terlalu banyak diam dan tiduran malah bikin makin gampang sesak?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(5, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="5" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(5, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="5" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q5-explanation">
                                <p class="text-gray-700 leading-relaxed">Faktanya benar! Terlalu lama diam (tidur panjang) dan aktivitas fisik minim bisa membuat otot pernapasan melemah dan sekresi mengental, justru membuat sesak menjadi lebih mudah terjadi. Gerakannya ringan dan rutin sangat dianjurkan.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="6">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">7. Viral di medsos minuman rebusan tertentu bisa "mencuci bersih" paru-paru yang kotor?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(6, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="6" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(6, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="6" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q6-explanation">
                                <p class="text-gray-700 leading-relaxed">Mitos! Tidak ada minuman atau larutan yang bisa "mencuci bersih" organ paru secara medis. Paru-paru memiliki sistem Imun yang sendiri dan obat-obatan yang sesuai prosedur medis yang digunakan untuk membersihkan atau mencegah infeksi. Minuman rebusan bisa membantu meredakan gejala tetapi bukan pengganti terapi medis.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="7">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">8. Testimoni sembuh total dari sesak di kolom komentar medsos pasti aman diikuti semua orang?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(7, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="7" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(7, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="7" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q7-explanation">
                                <p class="text-gray-700 leading-relaxed">Mitos! Setiap individu memiliki respons tubuh yang berbeda terhadap obat atau terapi. Testimoni dari kolom komentar medsos tidak dapat dijadikan standar perawatan karena belum melalui uji klinis dan regulasi BPOM. yang aman untuk satu orang mungkin berbahaya untuk orang lain.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="8">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">9. Video perawat di medsos mengajarkan tiup napas pelan lewat bibir mencucu meredakan panik sesak?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(8, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="8" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(8, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="8" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q8-explanation">
                                <p class="text-gray-700 leading-relaxed">Faktanya benar! Teknik tiup napas dengan bibir mencucu (pursed-lip breathing) adalah metode yang terbukti untuk mengurangi tingkat napa dan meredakan sesak napas pada saat panik. Teknik ini membantu menahan udara di saluran napas dan meningkatkan oksigenasi.</p>
                            </div>
                        </div>

                        <div class="fm-question p-6 border border-gray-200 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-sm hover:shadow-md transition-all duration-300" data-q="9">
                            <p class="font-bold text-gray-800 mb-5 text-lg leading-relaxed">10. Info medis di medsos mengingatkan berhenti obat dokter tanpa izin bisa bikin masuk IGD?</p>
                            <div class="flex gap-4 mb-4">
                                <button onclick="pilihFaktaMitos(9, 'fakta')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="9" data-v="fakta">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-green-600">✓</span> Fakta (Benar)
                                    </span>
                                </button>
                                <button onclick="pilihFaktaMitos(9, 'mitos')" class="fm-btn flex-1 px-6 py-4 border-2 border-gray-300 rounded-xl font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-md" data-q="9" data-v="mitos">
                                    <span class="flex items-center justify-center gap-2">
                                        <span class="text-red-600">✕</span> Mitos (Salah)
                                    </span>
                                </button>
                            </div>
                            <div class="fm-explanation hidden p-4 rounded-xl mt-3" id="q9-explanation">
                                <p class="text-gray-700 leading-relaxed">Faktanya benar! Menghentikan obat ruam dokter tanpa izin medis berisiko tinggi menyebabkan komplikasi berat sesak napas yang membutuhkan perawatan darurat di IGD. Selalu konsultasikan dengan dokter sebelum melakukan perubahan pada terapi yang diresepkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="flex justify-between items-center mt-8 gap-4">
                <button onclick="prevScreen(1)" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-all transform hover:-translate-y-0.5 border border-gray-200">
                    ← Kembali
                </button>
                <button onclick="nextScreen(3)" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-medium hover:shadow-lg hover:shadow-teal-300/40 transition-all transform hover:-translate-y-0.5">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
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
                    <div class="space-y-4">
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="inhaler">
                            <span class="text-gray-800 font-medium text-lg">Rencana penggunaan inhaler yang benar</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="olahraga">
                            <span class="text-gray-800 font-medium text-lg">Jadwal olahraga pernapasan rutin</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="pantau">
                            <span class="text-gray-800 font-medium text-lg">Pemantauan gejala harian</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="kesepakatan-tindakan w-6 h-6 text-teal-600 rounded-lg" value="kontak">
                            <span class="text-gray-800 font-medium text-lg">Rencana kontak jika gejala memburuk</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-8 gap-4">
                <button onclick="prevScreen(2)" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-all transform hover:-translate-y-0.5 border border-gray-200">
                    ← Kembali
                </button>
                <button onclick="nextScreen(4)" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-medium hover:shadow-lg hover:shadow-teal-300/40 transition-all transform hover:-translate-y-0.5">
                    Lanjut ke Layar Berikutnya →
                </button>
            </div>
        </div>

        <div id="screen-4" class="screen-container bg-white rounded-2xl shadow-sm p-6 mb-6 hidden">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Harapan Bapak/Ibu, Suara Keluarga & Latihan Napas
            </h2>

            <div class="mb-8 p-5 bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl border border-teal-100 shadow-sm">
                <p class="text-gray-700 leading-relaxed">Selaraskan harapan Bapak/Ibu dengan dukungan keluarga, lalu coba langsung latihan pengaturan napas selama 60 detik.</p>
            </div>

            <div class="space-y-8">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-full flex items-center justify-center text-sm font-bold">A</span>
                        Apa yang Paling Penting bagi Bapak/Ibu Saat Ini?
                    </h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="radio" name="harapan-pasien" class="w-6 h-6 text-teal-600" value="aktivitas">
                            <span class="text-gray-800 font-medium text-lg">Bisa berjalan kaki & beraktivitas ringan tanpa ngos-ngosan</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="radio" name="harapan-pasien" class="w-6 h-6 text-teal-600" value="tidak_rawat">
                            <span class="text-gray-800 font-medium text-lg">Tidak masuk IGD atau dirawat inap lagi tahun ini</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="radio" name="harapan-pasien" class="w-6 h-6 text-teal-600" value="ibadah">
                            <span class="text-gray-800 font-medium text-lg">Bisa beribadah & berkumpul nyaman bersama keluarga</span>
                        </label>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-full flex items-center justify-center text-sm font-bold">B</span>
                        Kotak Suara Pendamping (Dukungan Istri / Keluarga)
                    </h3>
                    <div class="p-5 bg-gradient-to-r from-blue-50 to-teal-50 rounded-2xl border border-blue-100">
                        <p class="text-sm text-gray-600 mb-3">💬 Isi Contoh Dukungan Istri</p>
                        <textarea id="dukungan-pendamping-baru" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Tuliskan harapan atau bentuk dukungan pendamping (contoh: istri mendukung latihan paru dan siap menemani jalan pagi)..."></textarea>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-full flex items-center justify-center text-sm font-bold">D</span>
                        Rencana Bertahap yang Disepakati Bersama (Boleh pilih lebih dari satu):
                    </h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="rencana-bertahap w-6 h-6 text-teal-600 rounded-lg" value="inhaler">
                            <span class="text-gray-800 font-medium text-lg">Memperbaiki cara pakai inhaler sesuai jenis alat bersama perawat hari ini.</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="rencana-bertahap w-6 h-6 text-teal-600 rounded-lg" value="latihan">
                            <span class="text-gray-800 font-medium text-lg">Memulai latihan paru intensitas ringan dengan pendampingan istri/keluarga.</span>
                        </label>
                        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-teal-50 hover:to-white hover:border-teal-300 hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                            <input type="checkbox" class="rencana-bertahap w-6 h-6 text-teal-600 rounded-lg" value="obat">
                            <span class="text-gray-800 font-medium text-lg">Tetap memakai inhaler dokter sesuai jadwal dan tidak menghentikannya untuk produk medsos.</span>
                        </label>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 bg-teal-600 text-white rounded-full flex items-center justify-center text-sm font-bold">E</span>
                        Cek Kemantapan Keputusan (4 Pertanyaan Singkat)
                    </h3>
                    <p class="text-gray-600 mb-4">Jawab Ya atau Tidak untuk memastikan Bapak/Ibu sudah mantap dengan pilihan hari ini:</p>
                    
                    <div class="space-y-5">
                        <div class="p-4 border border-gray-200 rounded-2xl">
                            <p class="text-gray-800 font-medium mb-3">1. Apakah Bapak/Ibu sudah paham manfaat dan risiko dari setiap pilihan perawatan?</p>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="paham-manfaat" class="w-5 h-5 text-teal-600" value="ya">
                                    <span>Ya</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="paham-manfaat" class="w-5 h-5 text-teal-600" value="tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-gray-200 rounded-2xl">
                            <p class="text-gray-800 font-medium mb-3">2. Apakah sudah jelas pilihan mana yang paling sesuai dengan harapan Bapak/Ibu?</p>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pilihan-tepat" class="w-5 h-5 text-teal-600" value="ya">
                                    <span>Ya</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pilihan-tepat" class="w-5 h-5 text-teal-600" value="tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-gray-200 rounded-2xl">
                            <p class="text-gray-800 font-medium mb-3">3. Apakah Bapak/Ibu merasa mendapat dukungan yang cukup dari keluarga dan perawat?</p>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="dukungan-cukup" class="w-5 h-5 text-teal-600" value="ya">
                                    <span>Ya</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="dukungan-cukup" class="w-5 h-5 text-teal-600" value="tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-gray-200 rounded-2xl">
                            <p class="text-gray-800 font-medium mb-3">4. Apakah Bapak/Ibu sudah merasa yakin dengan keputusan yang dipilih hari ini?</p>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="yakin-keputusan" class="w-5 h-5 text-teal-600" value="ya">
                                    <span>Ya</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="yakin-keputusan" class="w-5 h-5 text-teal-600" value="tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-8 gap-4 flex-wrap">
                <button onclick="prevScreen(3)" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-all transform hover:-translate-y-0.5 border border-gray-200">
                    ← Kembali
                </button>
                <button onclick="nextScreen(5)" class="px-6 py-2.5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-xl font-medium hover:shadow-lg hover:shadow-teal-300/40 transition-all transform hover:-translate-y-0.5">
                    Lanjut ke Ringkasan →
                </button>
            </div>
        </div>

        <div id="screen-5" class="screen-container hidden">
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-teal-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Ringkasan Paspor Keputusan Terapi</h2>
                    <p class="text-gray-600">Berikut adalah ringkasan lengkap dari semua isian Anda</p>
                </div>

                <div id="summary-container" class="bg-gradient-to-br from-gray-50 to-white border border-gray-200 rounded-2xl p-6 shadow-inner">
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <span class="w-6 h-6 bg-teal-600 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                Data Dasar Pasien
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Nama Pasien</p>
                                    <p id="summary-nama" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Usia</p>
                                    <p id="summary-usia" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Riwayat Kambuh</p>
                                    <p id="summary-kambuh" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Skala Sesak (MMRC)</p>
                                    <p id="summary-mmrc" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100 md:col-span-2">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Pendamping</p>
                                    <p id="summary-pendamping" class="text-gray-800 font-semibold">-</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <span class="w-6 h-6 bg-teal-600 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                                Profil Penggunaan Inhaler
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Jenis Inhaler</p>
                                    <p id="summary-inhaler" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Hari Pemakaian</p>
                                    <p id="summary-hari" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100 md:col-span-2">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Checklist Inhaler</p>
                                    <p id="summary-checklist" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100 md:col-span-2">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Kendala Kepatuhan</p>
                                    <p id="summary-kendala" class="text-gray-800 font-semibold">-</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <span class="w-6 h-6 bg-teal-600 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                                Pilihan Terapi & Fakta Mitos
                            </h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Pilihan Terapi</p>
                                    <p id="summary-terapi" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Jawaban Fakta & Mitos</p>
                                    <p id="summary-fakta" class="text-gray-800 font-semibold">-</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <span class="w-6 h-6 bg-teal-600 text-white rounded-full flex items-center justify-center text-xs font-bold">4</span>
                                Prioritas Tujuan & Kesepakatan
                            </h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Prioritas Tujuan</p>
                                    <p id="summary-prioritas" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Dukungan Pendamping</p>
                                    <p id="summary-dukungan" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Kesepakatan Tindakan</p>
                                    <p id="summary-kesepakatan" class="text-gray-800 font-semibold">-</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <span class="w-6 h-6 bg-teal-600 text-white rounded-full flex items-center justify-center text-xs font-bold">5</span>
                                Harapan Pasien & Keputusan Akhir
                            </h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Harapan Pasien</p>
                                    <p id="summary-harapan" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Suara Pendamping</p>
                                    <p id="summary-suara" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Rencana Bertahap</p>
                                    <p id="summary-rencana" class="text-gray-800 font-semibold">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide">Kemantapan Keputusan</p>
                                    <p id="summary-kemantapan" class="text-gray-800 font-semibold">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mt-8 gap-4 flex-wrap">
                    <button onclick="prevScreen(4)" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-all transform hover:-translate-y-0.5 border border-gray-200">
                        ← Kembali
                    </button>
                    <div class="flex gap-3 flex-wrap">
                 <button type="button" onclick="simpanData(event)" class="px-6 py-2.5 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl font-medium hover:shadow-lg hover:shadow-green-300/40 transition-all transform hover:-translate-y-0.5">
                    Simpan & Cetak PDF
                </button>
                        <button onclick="resetSession()" class="px-5 py-2.5 bg-gray-600 text-white rounded-xl font-medium hover:bg-gray-700 transition-all transform hover:-translate-y-0.5">
                            Reset
                        </button>
                    </div>
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

        <div id="toast-container" class="fixed top-4 right-4 z-[100] flex flex-col gap-3 pointer-events-none"></div>

        <!-- VIDEO EDUKASI PPOK: sengaja diletakkan di luar .screen-container agar selalu tampil -->
        <section id="edukasi-media" class="max-w-6xl mx-auto mt-10 mb-6 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60">
            <div class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-teal-950 to-teal-800 px-6 py-8 sm:px-8 sm:py-10">
                <div class="pointer-events-none absolute -right-12 -top-16 h-48 w-48 rounded-full bg-teal-400/10 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-20 left-1/3 h-44 w-44 rounded-full bg-cyan-300/10 blur-2xl"></div>

                <div class="relative z-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="max-w-2xl">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-teal-100">
                            <span class="h-2 w-2 rounded-full bg-teal-300"></span>
                            Edukasi Media
                        </span>
                        <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                            Video Edukasi Terapi PPOK
                        </h2>
                        <p class="mt-2 max-w-xl text-sm leading-6 text-teal-100 sm:text-base">
                            Pelajari informasi seputar terapi PPOK melalui video berikut. Putar langsung dari halaman ini tanpa perlu meninggalkan situs.
                        </p>
                    </div>

                    <div class="hidden h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-white shadow-lg sm:flex">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6.75A2.75 2.75 0 0 1 6.75 4h10.5A2.75 2.75 0 0 1 20 6.75v10.5A2.75 2.75 0 0 1 17.25 20H6.75A2.75 2.75 0 0 1 4 17.25V6.75Z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m10 8.5 5 3.5-5 3.5v-7Z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-6 lg:p-8">
                <div class="relative w-full overflow-hidden rounded-2xl bg-slate-950 shadow-lg ring-1 ring-slate-900/10" style="aspect-ratio: 16 / 9; min-height: 200px;">
                    <iframe
                        class="absolute inset-0 block h-full w-full border-0"
                        src="https://www.youtube.com/embed/ppaGu_ZxfwQ?rel=0&amp;playsinline=1"
                        title="Video Edukasi Terapi PPOK"
                        loading="lazy"
                        referrerpolicy="origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="mt-5 flex flex-col gap-4 border-t border-slate-100 pt-5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-teal-50 text-teal-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <circle cx="12" cy="12" r="9" stroke-width="1.8"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 11v5m0-8h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800">Materi edukasi pasien</p>
                            <p class="mt-1 text-sm leading-5 text-slate-500">Gunakan video ini sebagai bahan belajar dan diskusi bersama tenaga kesehatan.</p>
                        </div>
                    </div>

                    <a
                        href="https://www.youtube.com/watch?v=ppaGu_ZxfwQ"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-teal-600/20 transition duration-200 hover:-translate-y-0.5 hover:bg-teal-700 focus:outline-none focus:ring-4 focus:ring-teal-200">
                        Tonton di YouTube
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M8 7h9v9"></path>
                        </svg>
                    </a>
                </div>

                <p class="mt-5 rounded-xl border border-amber-100 bg-amber-50 px-4 py-3 text-xs leading-5 text-amber-800">
                    Catatan: Video ini merupakan media edukasi umum, bukan pengganti pemeriksaan atau anjuran medis pribadi. Tetap ikuti rencana terapi dan petunjuk dokter atau tenaga kesehatan yang menangani.
                </p>
            </div>
        </section>
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
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .kambuh-btn.selected, .mmrc-btn.selected, .pendamping-btn.selected, .inhaler-btn.selected, .terapi-btn.selected, .prioritas-btn.selected, .sure-btn.selected {
            border-color: #0d9488 !important;
            background-color: #f0fdfa !important;
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

        function showSuccessScreenToast(screenNumber) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = 'toast flex items-center gap-3 px-5 py-4 rounded-2xl bg-gradient-to-r from-green-500 to-green-600 text-white shadow-[0_10px_40px_rgba(0,0,0,0.25)] border border-white/20 backdrop-blur-sm min-w-[280px]';
            toast.innerHTML =
                '<div class="flex-shrink-0">' +
                '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>' +
                '</div>' +
                '<div class="flex-1 min-w-0">' +
                '<p class="text-sm font-semibold leading-tight">Layar Berhasil Dilengkapi!</p>' +
                '<p class="text-xs opacity-90 leading-tight mt-0.5">Anda telah berhasil melengkapi Layar ' + screenNumber + ', lanjut ke layar berikutnya.</p>' +
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
            }, 4000);
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
        let timerInterval = null;
        let remainingTime = 60;
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
            harapan_pasien: null,
            dukungan_pendamping_baru: '',
            rencana_bertahap: [],
            paham_manfaat: null,
            pilihan_tepat: null,
            dukungan_cukup: null,
            yakin_keputusan: null
        };

        // Try to load existing therapy data from the page's initial data
        // This will be populated by the server-side code
        const existingTherapyData = JSON.parse(document.getElementById('therapy-initial-data')?.value || 'null');
        if (existingTherapyData && existingTherapyData.layer && existingTherapyData.layer > 0) {
            // Populate formData from existing therapy history
            formData = {
                nama_pasien: existingTherapyData.nama_pasien || '',
                usia: existingTherapyData.usia || null,
                riwayat_kambuh: existingTherapyData.riwayat_kambuh || null,
                skala_mmrc: existingTherapyData.skala_mmrc || null,
                pendamping: existingTherapyData.pendamping || '',
                jenis_inhaler: existingTherapyData.jenis_inhaler || '',
                checklist_inhaler: existingTherapyData.checklist_inhaler || [],
                hari_pemakaian: existingTherapyData.hari_pemakaian || 7,
                duration: existingTherapyData.duration || 0,
                kendala_kepatuhan: existingTherapyData.kendala_kepatuhan || [],
                pilihan_terapi: existingTherapyData.pilihan_terapi || null,
                jawaban_fakta_mitos: existingTherapyData.jawaban_fakta_mitos || {},
                prioritas_tujuan: existingTherapyData.prioritas_tujuan || null,
                dukungan_pendamping: existingTherapyData.dukungan_pendamping || '',
                kesepakatan_tindakan: existingTherapyData.kesepakatan_tindakan || [],
                harapan_pasien: existingTherapyData.harapan_pasien || null,
                dukungan_pendamping_baru: existingTherapyData.dukungan_pendamping_baru || '',
                rencana_bertahap: existingTherapyData.rencana_bertahap || [],
                paham_manfaat: existingTherapyData.paham_manfaat || null,
                pilihan_tepat: existingTherapyData.pilihan_tepat || null,
                dukungan_cukup: existingTherapyData.dukungan_cukup || null,
                yakin_keputusan: existingTherapyData.yakin_keputusan || null
            };
        }

        function startLatihanNapas() {
            if (timerInterval) {
                clearInterval(timerInterval);
                timerInterval = null;
                remainingTime = 60;
                document.getElementById('timer-display').textContent = '60 detik';
                document.getElementById('start-timer-btn').textContent = '▶ Mulai Latihan 60 Detik';
                return;
            }
            
            remainingTime = 60;
            document.getElementById('start-timer-btn').textContent = '⏹ Hentikan Latihan';
            formData.pilihan_terapi = document.querySelector('input[name="pilihan-terapi"]:checked')?.value || null;
            timerInterval = setInterval(() => {
                remainingTime--;
                document.getElementById('timer-display').textContent = remainingTime + ' detik';
                
                if (remainingTime <= 0) {
                    clearInterval(timerInterval);
                    timerInterval = null;
                    document.getElementById('timer-display').textContent = 'Selesai!';
                    document.getElementById('start-timer-btn').textContent = '▶ Mulai Ulang';
                    showToast('Latihan napas selesai!', 'success');
                }
            }, 1000);
        }

        document.getElementById('hari-pemakaian').addEventListener('input', function(e) {
            document.getElementById('hari-value').textContent = e.target.value + ' hari';
            formData.hari_pemakaian = parseInt(e.target.value);
        });

        function updateProgress() {
            // 6 screens (0-5), progress calculation remains /5 for 0%-100% range
            const progress = (currentScreen / 5) * 100;
            // Display as "Layar 1 dari 6" to "Layar 6 dari 6" for user-friendly display
            document.getElementById('progress-bar').style.width = progress + '%';
            document.getElementById('progress-text').textContent = `Layar ${currentScreen + 1} dari 6`;
        }

        function isScreenComplete(screen) {
            if (screen === 0) {
                return formData.nama_pasien && formData.usia && formData.riwayat_kambuh !== null && formData.skala_mmrc !== null && formData.pendamping;
            } else if (screen === 1) {
                return formData.jenis_inhaler && formData.checklist_inhaler.length > 0;
            } else if (screen === 2) {
                return formData.pilihan_terapi !== null && Object.keys(formData.jawaban_fakta_mitos).length >= 10;
            } else if (screen === 3) {
                return formData.prioritas_tujuan !== null && formData.dukungan_pendamping && formData.kesepakatan_tindakan.length > 0;
            } else if (screen === 4) {
                return formData.harapan_pasien !== null && formData.dukungan_pendamping_baru && (formData.rencana_bertahap === null || formData.rencana_bertahap.length > 0) && formData.paham_manfaat !== null && formData.pilihan_tepat !== null && formData.dukungan_cukup !== null && formData.yakin_keputusan !== null;
            } else if (screen === 5) {
                return true; // Summary screen doesn't need validation
            }
            return true;
        }

        function nextScreen(screen) {
            if (currentScreen < 5 && isScreenComplete(currentScreen)) {
                showSuccessScreenToast(currentScreen);
            }
            document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
            document.getElementById(`screen-${screen}`).classList.remove('hidden');
            currentScreen = screen;
            updateProgress();
            
            // If navigating to summary screen, populate it with data
            if (screen === 5) {
                populateSummaryScreen();
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
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.kambuh-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.riwayat_kambuh = val;
        }

        function pilihMmrc(val) {
            document.querySelectorAll('.mmrc-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.mmrc-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.skala_mmrc = val;
        }

        function pilihPendamping(val) {
            document.querySelectorAll('.pendamping-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.pendamping-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.pendamping = val;
        }

        function pilihInhaler(val) {
            document.querySelectorAll('.inhaler-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.inhaler-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.jenis_inhaler = val;
        }

        function pilihTerapi(val) {
            document.querySelectorAll('.terapi-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.terapi-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.pilihan_terapi = val;
        }

        const fmExplanations = [
            { fakta: 'Mitos! Jamu herbal tidak dapat menyembuhkan total PPOK dalam seminggu. PPOK adalah penyakit paru kronis yang perlu pengobatan jangka panjang dari dokter.', mitos: 'Benar, ini adalah Mitos! Jamu herbal tidak dapat menyembuhkan total PPOK dalam seminggu. PPOK adalah penyakit paru kronis yang perlu pengobatan jangka panjang dari dokter.' },
            { fakta: 'Mitos! Menghentikan inhaler dokter hanya karena minum ramuan alami sangat berbahaya dan dapat memicu serangan sesak berat.', mitos: 'Benar, ini adalah Mitos! Menghentikan inhaler dokter hanya karena minum ramuan alami sangat berbahaya dan dapat memicu serangan sesak berat.' },
            { fakta: 'Mitos! Inhaler yang diresepkan dokter aman dan tidak menyebabkan kerusakan paru atau ketagihan jika digunakan sesuai petunjuk.', mitos: 'Benar, ini adalah Mitos! Inhaler yang diresepkan dokter aman dan tidak menyebabkan kerusakan paru atau ketagihan jika digunakan sesuai petunjuk.' },
            { fakta: 'Fakta! Banyak kasus inhaler terasa kurang mempan karena teknik menghirup yang salah, bukan karena obatnya tidak bekerja.', mitos: 'Benar, ini adalah Fakta! Banyak kasus inhaler terasa kurang mempan karena teknik menghirup yang salah, bukan karena obatnya tidak bekerja.' },
            { fakta: 'Mitos! Jalan kaki bertahap justru memperkuat otot napas, bukan membuat napas putus. Mulailah dengan jarak pendek secara rutin.', mitos: 'Benar, ini adalah Mitos! Jalan kaki bertahap justru memperkuat otot napas, bukan membuat napas putus. Mulailah dengan jarak pendek secara rutin.' },
            { fakta: 'Fakta! Terlalu banyak diam dan tiduran akan membuat otot tubuh melemah dan sesak semakin sering muncul.', mitos: 'Benar, ini adalah Fakta! Terlalu banyak diam dan tiduran akan membuat otot tubuh melemah dan sesak semakin sering muncul.' },
            { fakta: 'Mitos! Tidak ada minuman rebusan yang dapat "mencuci bersih" paru-paru. Klaim ini tidak memiliki bukti medis yang kuat.', mitos: 'Benar, ini adalah Mitos! Tidak ada minuman rebusan yang dapat "mencuci bersih" paru-paru. Klaim ini tidak memiliki bukti medis yang kuat.' },
            { fakta: 'Mitos! Testimoni di kolom komentar medsos tidak dapat dijadikan acuan umum. Setiap orang memiliki kondisi kesehatan yang berbeda.', mitos: 'Benar, ini adalah Mitos! Testimoni di kolom komentar medsos tidak dapat dijadikan acuan umum. Setiap orang memiliki kondisi kesehatan yang berbeda.' },
            { fakta: 'Fakta! Teknik tiup napas pelan lewat bibir mencucu adalah cara yang terbukti meredakan panik saat sesak muncul.', mitos: 'Benar, ini adalah Fakta! Teknik tiup napas pelan lewat bibir mencucu adalah cara yang terbukti meredakan panik saat sesak muncul.' },
            { fakta: 'Fakta! Berhenti obat dokter tanpa izin dapat memperburuk gejala dan meningkatkan risiko masuk IGD akibat serangan sesak berat.', mitos: 'Benar, ini adalah Fakta! Berhenti obat dokter tanpa izin dapat memperburuk gejala dan meningkatkan risiko masuk IGD akibat serangan sesak berat.' }
        ];

        function pilihFaktaMitos(q, v) {
            document.querySelectorAll(`.fm-btn[data-q="${q}"]`).forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-500', 'text-white', 'border-red-500', 'bg-red-500');
                btn.classList.add('border-gray-300');
            });
            const selectedBtn = document.querySelector(`.fm-btn[data-q="${q}"][data-v="${v}"]`);
            const questionContainer = document.querySelector(`.fm-question[data-q="${q}"]`);
            const explanationDiv = questionContainer.querySelector('.fm-explanation');
            
            if (v === 'fakta') {
                selectedBtn.classList.remove('border-gray-300');
                selectedBtn.classList.add('border-teal-500', 'bg-teal-500', 'text-white');
                explanationDiv.className = 'fm-explanation p-4 rounded-xl mt-3 bg-gradient-to-r from-green-50 to-teal-50 border border-green-200';
                explanationDiv.innerHTML = '<p class="text-green-800 font-medium">' + fmExplanations[q].fakta + '</p>';
            } else {
                selectedBtn.classList.remove('border-gray-300');
                selectedBtn.classList.add('border-red-500', 'bg-red-500', 'text-white');
                explanationDiv.className = 'fm-explanation p-4 rounded-xl mt-3 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200';
                explanationDiv.innerHTML = '<p class="text-blue-800 font-medium">' + fmExplanations[q].mitos + '</p>';
            }
            
            explanationDiv.classList.remove('hidden');
            formData.jawaban_fakta_mitos[q] = v;
            console.log('FaktaMitos selected:', q, v, formData.jawaban_fakta_mitos);
        }

        function pilihPrioritas(val) {
            document.querySelectorAll('.prioritas-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.prioritas-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.prioritas_tujuan = val;
        }

        function pilihSure(val) {
            document.querySelectorAll('.sure-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected');
            });
            document.querySelector(`.sure-btn[data-value="${val}"]`).classList.add('border-teal-500', 'bg-teal-50', 'selected');
            formData.skor_sure = val;
        }

        document.getElementById('nama-pasien').addEventListener('input', function(e) {
            formData.nama_pasien = e.target.value;
        });

        document.getElementById('usia-pasien').addEventListener('input', function(e) {
            formData.usia = parseInt(e.target.value) || null;
        });
        // Event listener untuk checkbox checklist inhaler
document.querySelectorAll('.checklist-inhaler').forEach(cb => {
    cb.addEventListener('change', function() {
        formData.checklist_inhaler = Array.from(document.querySelectorAll('.checklist-inhaler:checked')).map(el => el.value);
    });
});

// Event listener untuk checkbox kendala kepatuhan
document.querySelectorAll('.kendala-kepatuhan').forEach(cb => {
    cb.addEventListener('change', function() {
        formData.kendala_kepatuhan = Array.from(document.querySelectorAll('.kendala-kepatuhan:checked')).map(el => el.value);
    });
});

// Event listener untuk textarea dukungan pendamping
document.getElementById('dukungan-pendamping').addEventListener('input', function(e) {
    formData.dukungan_pendamping = e.target.value;
});

// Event listener untuk checkbox kesepakatan tindakan
document.querySelectorAll('.kesepakatan-tindakan').forEach(cb => {
    cb.addEventListener('change', function() {
        formData.kesepakatan_tindakan = Array.from(document.querySelectorAll('.kesepakatan-tindakan:checked')).map(el => el.value);
    });
});

// Event listener untuk radio harapan pasien
document.querySelectorAll('input[name="harapan-pasien"]').forEach(radio => {
    radio.addEventListener('change', function(e) {
        formData.harapan_pasien = e.target.value;
    });
});

// Event listener untuk textarea dukungan pendamping baru
document.getElementById('dukungan-pendamping-baru').addEventListener('input', function(e) {
    formData.dukungan_pendamping_baru = e.target.value;
});

// Event listener untuk checkbox rencana bertahap
document.querySelectorAll('.rencana-bertahap').forEach(cb => {
    cb.addEventListener('change', function() {
        formData.rencana_bertahap = Array.from(document.querySelectorAll('.rencana-bertahap:checked')).map(el => el.value);
    });
});
// Event listener untuk radio Paham Manfaat
document.querySelectorAll('input[name="paham-manfaat"]').forEach(radio => {
    radio.addEventListener('change', function(e) {
        formData.paham_manfaat = e.target.value;
    });
});

// Event listener untuk radio Pilihan Tepat
document.querySelectorAll('input[name="pilihan-tepat"]').forEach(radio => {
    radio.addEventListener('change', function(e) {
        formData.pilihan_tepat = e.target.value;
    });
});

// Event listener untuk radio Dukungan Cukup
document.querySelectorAll('input[name="dukungan-cukup"]').forEach(radio => {
    radio.addEventListener('change', function(e) {
        formData.dukungan_cukup = e.target.value;
    });
});

// Event listener untuk radio Yakin Keputusan
document.querySelectorAll('input[name="yakin-keputusan"]').forEach(radio => {
    radio.addEventListener('change', function(e) {
        formData.yakin_keputusan = e.target.value;
    });
});

        function isiContohKasus() {
            document.getElementById('nama-pasien').value = 'Tn. R';
            document.getElementById('usia-pasien').value = 68;
            pilihKambuh(2);
            pilihMmrc(3);
            pilihPendamping('pasangan');
        }

        function resetSession() {
            currentScreen = 0;
            if (timerInterval) {
                clearInterval(timerInterval);
                timerInterval = null;
            }
            remainingTime = 60;
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
                harapan_pasien: null,
                dukungan_pendamping_baru: '',
                rencana_bertahap: [],
                paham_manfaat: null,
                pilihan_tepat: null,
                dukungan_cukup: null,
                yakin_keputusan: null
            };
            document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
            document.getElementById('screen-0').classList.remove('hidden');
            document.getElementById('success-message').classList.add('hidden');
            document.querySelectorAll('.kambuh-btn, .mmrc-btn, .pendamping-btn, .inhaler-btn, .terapi-btn, .prioritas-btn, .sure-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-50', 'selected', 'border-teal-500', 'bg-teal-500', 'text-white', 'border-red-500', 'bg-red-500');
            });
            document.querySelectorAll('.checklist-inhaler, .kendala-kepatuhan, .kesepakatan-tindakan, .jawaban-sure').forEach(cb => cb.checked = false);
            document.querySelectorAll('.fm-explanation').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.fm-btn').forEach(btn => {
                btn.classList.remove('border-teal-500', 'bg-teal-500', 'text-white', 'border-red-500', 'bg-red-500');
                btn.classList.add('border-gray-300');
            });
            document.getElementById('hari-pemakaian').value = 7;
            document.getElementById('hari-value').textContent = '7 hari';
            document.getElementById('dukungan-pendamping').value = '';
            document.getElementById('dukungan-pendamping-baru').value = '';
            document.getElementById('nama-pasien').value = '';
            document.getElementById('usia-pasien').value = '';
            const timerDisplay = document.getElementById('timer-display');
            if (timerDisplay) timerDisplay.textContent = '60 detik';
            const startTimerBtn = document.getElementById('start-timer-btn');
            if (startTimerBtn) startTimerBtn.textContent = '▶ Mulai Latihan 60 Detik';
            updateProgress();
        }

        function simpanData(e) {
            if (e) e.preventDefault();
            // Collect all form data
            formData.nama_pasien = document.getElementById('nama-pasien').value;
            formData.usia = parseInt(document.getElementById('usia-pasien').value) || null;
            formData.riwayat_kambuh = document.querySelector('input[name="riwayat-kambuh"]:checked')?.value || null;
            formData.skala_mmrc = document.querySelector('input[name="skala-mmrc"]:checked')?.value || null;
            // formData.pendamping = document.querySelector('.pendamping-btn.selected')?.dataset.value || null;
            // formData.jenis_inhaler = document.querySelector('.inhaler-btn.selected')?.dataset.value || null;
            // formData.pilihan_terapi = document.querySelector('.terapi-btn.selected')?.dataset.value || null;
            // formData.prioritas_tujuan = document.querySelector('.prioritas-btn.selected')?.dataset.value || null;
            formData.checklist_inhaler = Array.from(document.querySelectorAll('.checklist-inhaler:checked')).map(el => el.value);
            formData.kendala_kepatuhan = Array.from(document.querySelectorAll('.kendala-kepatuhan:checked')).map(el => el.value);
            formData.dukungan_pendamping = document.getElementById('dukungan-pendamping').value;
            formData.kesepakatan_tindakan = Array.from(document.querySelectorAll('.kesepakatan-tindakan:checked')).map(el => el.value);
            formData.harapan_pasien = document.querySelector('input[name="harapan-pasien"]:checked')?.value || null;
            formData.dukungan_pendamping_baru = document.getElementById('dukungan-pendamping-baru').value;
            formData.rencana_bertahap = Array.from(document.querySelectorAll('.rencana-bertahap:checked')).map(el => el.value);
            formData.paham_manfaat = document.querySelector('input[name="paham-manfaat"]:checked')?.value || null;
            formData.pilihan_tepat = document.querySelector('input[name="pilihan-tepat"]:checked')?.value || null;
            formData.dukungan_cukup = document.querySelector('input[name="dukungan-cukup"]:checked')?.value || null;
            formData.yakin_keputusan = document.querySelector('input[name="yakin-keputusan"]:checked')?.value || null;
            
            // Tambahkan field yang wajib ada di controller
            const hariValueEl = document.getElementById('hari-value');
            formData.hari_pemakaian = hariValueEl ? parseInt(hariValueEl.textContent) || 7 : 7;
            formData.duration = 60;
            formData.layer = 1;
            // Konversi jawaban_fakta_mitos dari object ke array

            if (typeof formData.jawaban_fakta_mitos === 'string') {
                try {
                    formData.jawaban_fakta_mitos = JSON.parse(formData.jawaban_fakta_mitos);
                } catch (e) {
                    formData.jawaban_fakta_mitos = [];
                }
            } else {
                formData.jawaban_fakta_mitos = Object.values(formData.jawaban_fakta_mitos);
            }

            console.log('Form data sebelum dikirim ke server:', JSON.stringify(formData, null, 2));

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

function populateSummaryScreen() {
    const riwayatKambuhText = ['0 kali', '1 kali', '2 kali atau lebih'];
    const mmrcText = ['Tidak Sesak', 'Sesak Berat Aktivitas', 'Sesak Jalan Cepat', 'Sesak Jalan Pelan', 'Sesak Ringan', 'Sesak Berat'];
    const inhalerText = { 'mdpi': 'MDPI (Metered Dose)', 'dpi': 'DPI (Dry Powder)', 'nebu': 'Nebulizer' };
    const terapiText = ['Mengurangi sesak napas', 'Meningkatkan kemampuan beraktivitas', 'Mengurangi frekuensi kambuh', 'Lainnya'];
    const prioritasText = ['Tertinggi', 'Sedang', 'Rendah', 'Tidak Setuju'];
    const pendampingText = { 'sendiri': 'Sendiri', 'pasangan': 'Istri / Suami', 'anak': 'Anak / Keluarga' };
    const rencanaText = { 'inhaler': 'Perbaiki Cara Pakai Inhaler', 'latihan': 'Latihan Paru Intensitas Ringan', 'obat': 'Tetap Pakai Obat Dokter' };
    
    document.getElementById('summary-nama').textContent = formData.nama_pasien || '-';
    document.getElementById('summary-usia').textContent = (formData.usia ? formData.usia + ' tahun' : '-');
    document.getElementById('summary-kambuh').textContent = (formData.riwayat_kambuh !== null ? riwayatKambuhText[formData.riwayat_kambuh] : '-');
    document.getElementById('summary-mmrc').textContent = (formData.skala_mmrc !== null ? mmrcText[formData.skala_mmrc] : '-');
    document.getElementById('summary-pendamping').textContent = (formData.pendamping ? pendampingText[formData.pendamping] : '-');
    document.getElementById('summary-inhaler').textContent = (formData.jenis_inhaler ? inhalerText[formData.jenis_inhaler] : '-');
    document.getElementById('summary-hari').textContent = (formData.hari_pemakaian ? formData.hari_pemakaian + ' hari/minggu' : '-');
    document.getElementById('summary-checklist').textContent = (formData.checklist_inhaler.length > 0 ? formData.checklist_inhaler.join(', ') : '-');
    document.getElementById('summary-kendala').textContent = (formData.kendala_kepatuhan.length > 0 ? formData.kendala_kepatuhan.join(', ') : '-');
    document.getElementById('summary-terapi').textContent = (formData.pilihan_terapi !== null ? terapiText[formData.pilihan_terapi] : '-');
    document.getElementById('summary-fakta').textContent = Object.keys(formData.jawaban_fakta_mitos).length + ' soal terjawab';
    document.getElementById('summary-prioritas').textContent = (formData.prioritas_tujuan !== null ? prioritasText[formData.prioritas_tujuan] : '-');
    document.getElementById('summary-dukungan').textContent = formData.dukungan_pendamping || '-';
    document.getElementById('summary-kesepakatan').textContent = (formData.kesepakatan_tindakan.length > 0 ? formData.kesepakatan_tindakan.join(', ') : '-');
    document.getElementById('summary-harapan').textContent = formData.harapan_pasien || '-';
    document.getElementById('summary-suara').textContent = formData.dukungan_pendamping_baru || '-';
    document.getElementById('summary-rencana').textContent = (formData.rencana_bertahap.length > 0 ? formData.rencana_bertahap.map(r => rencanaText[r]).join(', ') : '-');
    
    const kemantapan = [];
    if (formData.paham_manfaat) kemantapan.push('Paham Manfaat: ' + formData.paham_manfaat);
    if (formData.pilihan_tepat) kemantapan.push('Pilihan Tepat: ' + formData.pilihan_tepat);
    if (formData.dukungan_cukup) kemantapan.push('Dukungan Cukup: ' + formData.dukungan_cukup);
    if (formData.yakin_keputusan) kemantapan.push('Yakin: ' + formData.yakin_keputusan);
    document.getElementById('summary-kemantapan').textContent = kemantapan.length > 0 ? kemantapan.join(' | ') : '-';
}

        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('p', 'mm', 'a4');
            
            const pageWidth = doc.internal.pageSize.getWidth();
            const pageHeight = doc.internal.pageSize.getHeight();
            const margin = 20;
            let yPos = margin;
            
            doc.setFillColor(13, 148, 136);
            doc.rect(0, 0, pageWidth, 40, 'F');
            
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(24);
            doc.setFont('helvetica', 'bold');
            doc.text('PASPOR KEPUTUSAN TERAPI PPOK', pageWidth / 2, 25, { align: 'center' });
            
            yPos = 55;
            
            doc.setFillColor(240, 253, 250);
            doc.roundedRect(margin, yPos, pageWidth - (margin * 2), 45, 8, 8, 'F');
            
            doc.setTextColor(0, 0, 0);
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text('DATA DASAR PASIEN', margin + 8, yPos + 12);
            
            doc.setFontSize(11);
            doc.setFont('helvetica', 'normal');
            const riwayatKambuhText = { 'tidak_pernah': 'Tidak Pernah', '1x': '1 Kali', '2x': '2 Kali', '3x_lebih': '3 Kali atau Lebih' };
            const mmrcText = ['Tidak Sesak', 'Sesak Berat Aktivitas', 'Sesak Jalan Cepat', 'Sesak Jalan Pelan', 'Sesak Ringan', 'Sesak Berat'];
            const inhalerText = { 'kuning': 'Inhaler Kuning (Seretide)', 'hijau': 'Inhaler Hijau (Ventolin)', 'biru': 'Inhaler Biru (Atrovent)', 'lainnya': 'Lainnya' };
            const terapiText = { 'rutin': 'Terapi Rutin', 'latihan': 'Latihan Paru', 'kombinasi': 'Kombinasi Rutin + Latihan' };
            const prioritasText = { 'tidak_ngos': 'Aktivitas Tanpa Ngos-ngosan', 'tidak_rawat': 'Tidak Rawat Inap', 'ibadah': 'Bisa Beribadah Bersama Keluarga' };
            const harapanText = { 'aktivitas': 'Aktivitas Tanpa Ngos-ngosan', 'rawat': 'Tidak Perlu Rawat Inap', 'ibadah': 'Bisa Beribadah Bersama Keluarga' };
            const rencanaText = { 'inhaler': 'Perbaiki Cara Pakai Inhaler', 'latihan': 'Latihan Paru Intensitas Ringan', 'obat': 'Tetap Pakai Obat Dokter' };
            
            const leftCol = margin + 8;
            const rightCol = pageWidth / 2 + 8;
            doc.text('Nama Pasien', leftCol, yPos + 25);
            doc.text(': ' + (formData.nama_pasien || '-'), leftCol + 35, yPos + 25);
            doc.text('Usia', rightCol, yPos + 25);
            doc.text(': ' + (formData.usia ? formData.usia + ' tahun' : '-'), rightCol + 20, yPos + 25);
            doc.text('Tanggal', leftCol, yPos + 35);
            doc.text(': ' + new Date().toLocaleDateString('id-ID'), leftCol + 35, yPos + 35);
            doc.text('Pendamping', rightCol, yPos + 35);
            doc.text(': ' + (formData.pendamping || '-'), rightCol + 20, yPos + 35);
            
            yPos += 55;
            
            doc.setFillColor(240, 253, 250);
            doc.roundedRect(margin, yPos, pageWidth - (margin * 2), 35, 8, 8, 'F');
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text('PROFIL PENGGUNAAN INHALER', margin + 8, yPos + 12);
            doc.setFontSize(11);
            doc.setFont('helvetica', 'normal');
            doc.text('Jenis Inhaler', leftCol, yPos + 25);
            doc.text(': ' + (formData.jenis_inhaler ? inhalerText[formData.jenis_inhaler] : '-'), leftCol + 35, yPos + 25);
            doc.text('Hari Pakai', rightCol, yPos + 25);
            doc.text(': ' + (formData.hari_pemakaian ? formData.hari_pemakaian + ' hari/minggu' : '-'), rightCol + 20, yPos + 25);
            
            yPos += 45;
            
            doc.setFillColor(240, 253, 250);
            doc.roundedRect(margin, yPos, pageWidth - (margin * 2), 35, 8, 8, 'F');
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text('PILIHAN TERAPI & FAKTA MITOS', margin + 8, yPos + 12);
            doc.setFontSize(11);
            doc.setFont('helvetica', 'normal');
            doc.text('Pilihan Terapi', leftCol, yPos + 25);
            doc.text(': ' + (formData.pilihan_terapi ? terapiText[formData.pilihan_terapi] : '-'), leftCol + 35, yPos + 25);
            doc.text('Jawaban', rightCol, yPos + 25);
            doc.text(': ' + Object.keys(formData.jawaban_fakta_mitos).length + ' soal', rightCol + 20, yPos + 25);
            
            yPos += 45;
            
            doc.setFillColor(240, 253, 250);
            doc.roundedRect(margin, yPos, pageWidth - (margin * 2), 35, 8, 8, 'F');
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text('PRIORITAS & KESEPAKATAN', margin + 8, yPos + 12);
            doc.setFontSize(11);
            doc.setFont('helvetica', 'normal');
            doc.text('Prioritas', leftCol, yPos + 25);
            doc.text(': ' + (formData.prioritas_tujuan ? prioritasText[formData.prioritas_tujuan] : '-'), leftCol + 35, yPos + 25);
            doc.text('Dukungan', rightCol, yPos + 25);
            doc.text(': ' + (formData.dukungan_pendamping || '-'), rightCol + 20, yPos + 25);
            
            yPos += 45;
            
            doc.setFillColor(240, 253, 250);
            doc.roundedRect(margin, yPos, pageWidth - (margin * 2), 50, 8, 8, 'F');
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text('HARAPAN & KEPUTUSAN AKHIR', margin + 8, yPos + 12);
            doc.setFontSize(11);
            doc.setFont('helvetica', 'normal');
            doc.text('Harapan Pasien', leftCol, yPos + 25);
            doc.text(': ' + (formData.harapan_pasien ? harapanText[formData.harapan_pasien] : '-'), leftCol + 35, yPos + 25);
            doc.text('Rencana Bertahap', leftCol, yPos + 38);
            doc.text(': ' + (formData.rencana_bertahap.length > 0 ? formData.rencana_bertahap.map(r => rencanaText[r]).join(', ') : '-'), leftCol + 35, yPos + 38);
            
            yPos += 60;
            
            doc.setDrawColor(200, 200, 200);
            doc.line(margin, yPos, pageWidth - margin, yPos);
            
            yPos += 10;
            doc.setFontSize(10);
            doc.setTextColor(100, 100, 100);
            doc.text('Dokumen ini dihasilkan secara otomatis oleh Sistem Sahabat Nafas', pageWidth / 2, yPos, { align: 'center' });
            
            doc.save('paspor-terapi-' + (formData.nama_pasien || 'pasien') + '.pdf');
        }
        updateProgress();
    </script>
@endsection