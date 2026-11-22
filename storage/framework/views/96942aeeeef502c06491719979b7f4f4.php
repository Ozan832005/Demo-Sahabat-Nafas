

<?php $__env->startSection('title', 'Terapi - ' . config('app.name')); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-2xl p-6 text-white shadow-lg">
        <h1 class="text-2xl font-bold mb-2">Proses Terapi PPOK</h1>
        <p class="text-teal-100">Alur 5 Layar & Konten Klinis Lengkap</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <span class="text-sm font-medium text-gray-700">Progress Sesi</span>
            <span class="text-sm text-gray-500" id="progress-text">Layar 0 dari 4</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5">
            <div id="progress-bar" class="bg-teal-600 h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
        </div>
    </div>

    <div id="screen-0" class="screen-container bg-white rounded-2xl shadow-sm p-6">
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
                    <button onclick="pilihPendamping('keluarga')" class="pendamping-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="keluarga">
                        <p class="font-semibold text-gray-800">Anak / Keluarga</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-8">
            <button onclick="goToScreen(1)" class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium">
                Lanjut ke Langkah 1 →
            </button>
        </div>
    </div>

    <div id="screen-1" class="screen-container hidden bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Audit Teknik Inhaler & Kendala Kepatuhan
        </h2>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Jenis Inhaler yang Digunakan</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <button onclick="pilihJenisInhaler('mdi')" id="btn-mdi" class="inhaler-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="mdi">
                    <p class="font-semibold text-gray-800">MDI - Inhaler Semprot</p>
                    <p class="text-xs text-gray-600 mt-1">Metered Dose Inhaler</p>
                </button>
                <button onclick="pilihJenisInhaler('dpi')" id="btn-dpi" class="inhaler-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="dpi">
                    <p class="font-semibold text-gray-800">DPI - Inhaler Serbuk Kering</p>
                    <p class="text-xs text-gray-600 mt-1">Dry Powder Inhaler</p>
                </button>
            </div>
        </div>

        <div id="checklist-container" class="space-y-3 mb-6">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Hari Pemakaian Inhaler dalam 7 Hari Terakhir</label>
            <input type="range" id="hari-pakai" min="0" max="7" value="7" class="w-full" oninput="updateHariPakai()">
            <p class="text-center text-lg font-bold text-teal-600" id="hari-pakai-text">7 hari</p>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Skrining Kendala Kepatuhan</label>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="kendala-check w-5 h-5 text-teal-600" value="lupa" onchange="updateUmpanBalik()">
                    <span class="text-gray-700">Lupa jadwal memakai inhaler</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="kendala-check w-5 h-5 text-teal-600" value="enak" onchange="updateUmpanBalik()">
                    <span class="text-gray-700">Berhenti saat merasa enak</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="kendala-check w-5 h-5 text-teal-600" value="efek" onchange="updateUmpanBalik()">
                    <span class="text-gray-700">Takut efek samping obat</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="kendala-check w-5 h-5 text-teal-600" value="sulit" onchange="updateUmpanBalik()">
                    <span class="text-gray-700">Sulit menekan/menghisap alat</span>
                </label>
            </div>
        </div>

        <div id="umpan-balik" class="p-4 bg-blue-50 border border-blue-200 rounded-xl">
            <p class="text-blue-800 text-sm">Silakan lengkapi checklist untuk mendapatkan umpan balik.</p>
        </div>

        <div class="flex justify-between mt-8">
            <button onclick="goToScreen(0)" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-medium">
                ← Kembali
            </button>
            <button onclick="goToScreen(2)" class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium">
                Lanjut ke Langkah 2 →
            </button>
        </div>
    </div>

    <div id="screen-2" class="screen-container hidden bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            Perbandingan Opsi & Cek Fakta Medsos
        </h2>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">A. Matriks Perbandingan 4 Opsi Terapi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <button onclick="pilihOpsi('perbaiki_inhaler')" class="opsi-btn p-5 border-2 border-green-300 bg-green-50 rounded-xl hover:border-green-500 transition text-left" data-value="perbaiki_inhaler">
                    <p class="font-bold text-green-800">1. Perbaiki Cara Pakai Inhaler & Rutin Terapi</p>
                    <p class="text-sm text-green-600 mt-1">Langkah Utama Aman</p>
                </button>
                <button onclick="pilihOpsi('latihan_paru')" class="opsi-btn p-5 border-2 border-blue-300 bg-blue-50 rounded-xl hover:border-blue-500 transition text-left" data-value="latihan_paru">
                    <p class="font-bold text-blue-800">2. Latihan Paru & Jalan Santai Bertahap</p>
                    <p class="text-sm text-blue-600 mt-1">Dianjurkan Dokter Paru</p>
                </button>
                <button onclick="pilihOpsi('diam_rumah')" class="opsi-btn p-5 border-2 border-yellow-300 bg-yellow-50 rounded-xl hover:border-yellow-500 transition text-left" data-value="diam_rumah">
                    <p class="font-bold text-yellow-800">3. Hanya Diam di Rumah & Kurangi Gerak</p>
                    <p class="text-sm text-yellow-600 mt-1">Kurang Dianjurkan - Risiko Otot Melemah</p>
                </button>
                <button onclick="pilihOpsi('obat_alternatif')" class="opsi-btn p-5 border-2 border-red-300 bg-red-50 rounded-xl hover:border-red-500 transition text-left" data-value="obat_alternatif">
                    <p class="font-bold text-red-800">4. Ganti Obat Alternatif dari Media Sosial</p>
                    <p class="text-sm text-red-600 mt-1">Risiko Tinggi Bila Stop Obat Dokter</p>
                </button>
            </div>
        </div>

        <div class="mb-8 p-5 bg-yellow-50 border border-yellow-300 rounded-xl">
            <h3 class="text-lg font-semibold text-yellow-800 mb-3">B. Waspada 3 Ciri Info Obat Palsu di HP & Media Sosial</h3>
            <ul class="space-y-2 text-yellow-800">
                <li class="flex items-start gap-2">
                    <span class="text-yellow-600 font-bold">⚠️</span>
                    <span><strong>Janji Sembuh Total & Instan</strong></span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-yellow-600 font-bold">⚠️</span>
                    <span><strong>Menyuruh Stop Obat Dokter</strong></span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-yellow-600 font-bold">⚠️</span>
                    <span><strong>Hanya Modal Testimoni Video/Komentar</strong></span>
                </li>
            </ul>
        </div>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">C. Tanya Jawab: Fakta vs Mitos Info Medsos</h3>
            <div id="quiz-container" class="space-y-4">
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <button onclick="goToScreen(1)" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-medium">
                ← Kembali
            </button>
            <button onclick="goToScreen(3)" class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium">
                Lanjut ke Langkah 3 →
            </button>
        </div>
    </div>

    <div id="screen-3" class="screen-container hidden bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            Klarifikasi Nilai, Simulasi Napas & SURE Test
        </h2>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">A. Skala Prioritas Tujuan Hidup</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <button onclick="pilihPrioritas('berjalan')" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="berjalan">
                    <p class="font-semibold text-gray-800">Berjalan kaki tanpa ngos-ngosan</p>
                </button>
                <button onclick="pilihPrioritas('tidak_masuk_igd')" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="tidak_masuk_igd">
                    <p class="font-semibold text-gray-800">Tidak masuk IGD/rawat inap lagi tahun ini</p>
                </button>
                <button onclick="pilihPrioritas('beribadah')" class="prioritas-btn p-4 border-2 border-gray-200 rounded-xl hover:border-teal-500 transition text-left" data-value="beribadah">
                    <p class="font-semibold text-gray-800">Beribadah & berkumpul nyaman bersama keluarga</p>
                </button>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">B. Kotak Suara Pendamping</h3>
            <button onclick="isiContohDukungan()" class="mb-3 px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm font-medium">
                Isi Contoh Dukungan Istri
            </button>
            <textarea id="suara-pendamping" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent" placeholder="Masukkan dukungan dari istri/keluarga..."></textarea>
        </div>

        <div class="mb-8 p-6 bg-gradient-to-br from-teal-50 to-blue-50 rounded-xl border border-teal-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">C. Simulasi Pursed-Lip Breathing 60 Detik</h3>
            <div class="flex flex-col items-center">
                <div id="breathing-circle" class="w-32 h-32 bg-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg transition-all duration-2000">
                    Siap
                </div>
                <p id="breathing-instruction" class="mt-4 text-lg font-medium text-gray-700 text-center">Klik mulai untuk memandu pernapasan</p>
                <p id="breathing-timer" class="mt-2 text-2xl font-bold text-teal-600">60 detik</p>
                <button onclick="toggleBreathing()" id="btn-breathing" class="mt-4 px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium">
                    Mulai Latihan
                </button>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">D. Rencana Terapi yang Disepakati</h3>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="rencana-check w-5 h-5 text-teal-600" value="teknik_inhaler">
                    <span class="text-gray-700">Latihan teknik inhaler bersama perawat</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="rencana-check w-5 h-5 text-teal-600" value="rehab_paru">
                    <span class="text-gray-700">Rehabilitasi paru ringan rutin</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="rencana-check w-5 h-5 text-teal-600" value="lanjut_inhaler">
                    <span class="text-gray-700">Melanjutkan inhaler dokter tanpa terpengaruh produk medsos</span>
                </label>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">E. Cek Kemantapan Keputusan (SURE Test)</h3>
            <div id="sure-container" class="space-y-3">
            </div>
            <div class="mt-4 p-4 bg-gray-50 rounded-xl">
                <p class="text-center text-lg font-semibold">Skor SURE: <span id="sure-score" class="text-teal-600">0</span>/4</p>
            </div>
        </div>

        <div class="flex justify-between mt-8">
            <button onclick="goToScreen(2)" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-medium">
                ← Kembali
            </button>
            <button onclick="goToScreen(4)" class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium">
                Lanjut ke Langkah 4 →
            </button>
        </div>
    </div>

    <div id="screen-4" class="screen-container hidden bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Paspor Keputusan Bersama
        </h2>

        <div id="paspor-container" class="p-6 border-2 border-teal-600 rounded-xl bg-gradient-to-br from-teal-50 to-white mb-8">
            <h3 class="text-center text-xl font-bold text-teal-800 mb-4">PASPOR KEPUTUSAN BERSAMA — TERAPI PPOK</h3>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-600">Nama Pasien:</p>
                    <p class="font-semibold text-gray-800" id="paspor-nama">-</p>
                </div>
                <div>
                    <p class="text-gray-600">Usia:</p>
                    <p class="font-semibold text-gray-800" id="paspor-usia">- tahun</p>
                </div>
                <div>
                    <p class="text-gray-600">Tanggal Sesi:</p>
                    <p class="font-semibold text-gray-800" id="paspor-tanggal">-</p>
                </div>
                <div>
                    <p class="text-gray-600">Skala mMRC:</p>
                    <p class="font-semibold text-gray-800" id="paspor-mmrc">-</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600">Opsi Terapi Dipilih:</p>
                    <p class="font-semibold text-gray-800" id="paspor-opsi">-</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600">Skor SURE:</p>
                    <p class="font-semibold text-gray-800" id="paspor-sure">-/4</p>
                </div>
            </div>
        </div>

        <div class="mb-8 p-5 bg-red-50 border border-red-300 rounded-xl">
            <h3 class="text-lg font-semibold text-red-800 mb-3">⚠️ Tanda Bahaya (Red Flags) — Segera ke IGD Bila Muncul:</h3>
            <ul class="space-y-2 text-red-800 text-sm">
                <li>1. Sesak napas berat mendadak bahkan saat sedang beristirahat atau sulit mengucapkan kalimat</li>
                <li>2. Bibir, lidah, atau ujung jari tangan/kaki tampak kebiruan atau pucat dingin</li>
                <li>3. Dahak berubah warna menjadi kuning/hijau kental dalam jumlah banyak disertai demam tinggi</li>
                <li>4. Pasien tampak sangat mengantuk, bingung, atau sulit diajak berbicara</li>
            </ul>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-8">
            <button onclick="simpanData()" class="px-4 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Simpan Data ke Sistem
            </button>
            <button onclick="downloadPDF()" class="px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-medium flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Download Paspor (PDF)
            </button>
            <button onclick="printPaspor()" class="px-4 py-3 bg-gray-700 text-white rounded-xl hover:bg-gray-800 transition font-medium flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-27v-4a4 4 0 00-4-4H9a4 4 0 00-4 4v4"></path>
                </svg>
                Cetak Paspor (Print)
            </button>
            <button onclick="copySummary()" class="px-4 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition font-medium flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                Salin Ringkasan untuk Dokter
            </button>
        </div>

        <div class="flex justify-between mt-8">
            <button onclick="goToScreen(3)" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-medium">
                ← Kembali
            </button>
            <button onclick="startNewSession()" class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition font-medium">
                Sesi Baru
            </button>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 mt-8">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Riwayat Sesi Terapi</h3>
        <div id="riwayat-container">
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
let currentScreen = 0;
let therapyData = {
    nama: '',
    usia: null,
    kambuh: null,
    mmrc: null,
    pendamping: null,
    jenisInhaler: null,
    checklist: [],
    hariPakai: 7,
    kendala: [],
    opsi: null,
    jawabanQuiz: {},
    prioritas: null,
    suaraPendamping: '',
    rencana: [],
    sureAnswers: {},
    sureScore: 0,
    tanggal: new Date().toLocaleDateString('id-ID')
};

const mdiSteps = [
    'Mengocok tabung inhaler semprot terlebih dahulu sebelum dipakai.',
    'Membuang napas hingga tuntas menjauhi corong sebelum menghisap.',
    'Merapatkan bibir mengelilingi corong inhaler agar tidak bocor.',
    'Menekan tabung sambil menghisap obat secara pelan dan dalam.',
    'Menahan napas selama 5-10 detik agar obat mengendap di paru.',
    'Berkumur dengan air bersih setelah selesai memakai inhaler.'
];

const dpiSteps = [
    'Membuka tutup/menggeser tuas dosis TANPA mengocok alat.',
    'Membuang napas hingga tuntas menjauhi corong sebelum menghisap.',
    'Merapatkan bibir pada corong inhaler serbuk kering dengan rapat.',
    'Menghisap obat secara kuat dan cepat lewat mulut agar serbuk terhirup.',
    'Menahan napas selama 5-10 detik setelah menghisap serbuk obat.',
    'Berkumur dengan air bersih setelah selesai inhalasi.'
];

const factMitosQuestions = [
    { id: 1, topik: 'Iklan Herbal Medsos', pertanyaan: 'Katanya di medsos, jamu herbal bisa menyembuhkan total sakit paru dalam seminggu?', kunci: 'mitos', penjelasan: 'Itu mitos. Penyakit paru kronis tidak bisa sembuh instan hanya dengan jamu tanpa pengobatan dokter.' },
    { id: 2, topik: 'Stop Obat Dokter', pertanyaan: 'Kata video di HP, kalau sudah minum ramuan alami, inhaler dokter harus distop?', kunci: 'mitos', penjelasan: 'Jangan diikuti! Menghentikan inhaler dokter secara mendadak bisa memicu serangan sesak berat.' },
    { id: 3, topik: 'Info Grup WA', pertanyaan: 'Beredar pesan di grup WA, sering pakai inhaler bikin paru-paru rusak dan ketagihan?', kunci: 'mitos', penjelasan: 'Itu mitos. Inhaler justru menjaga saluran napas tetap terbuka dan aman dipakai rutin sesuai aturan dokter.' },
    { id: 4, topik: 'Edukasi Dokter', pertanyaan: 'Ada dokter di medsos bilang inhaler terasa kurang mempan karena cara hisapnya salah?', kunci: 'fakta', penjelasan: 'Betul, ini fakta! Kalau cara hisap dan tahan napasnya pas, obat masuk lebih dalam ke paru.' },
    { id: 5, topik: 'Larangan Gerak', pertanyaan: 'Kata postingan di medsos, orang sakit paru dilarang jalan kaki karena bikin napas putus?', kunci: 'mitos', penjelasan: 'Salah kaprah. Justru jalan santai bertahap dan latihan napas bikin otot paru makin kuat.' },
    { id: 6, topik: 'Info Kesehatan', pertanyaan: 'Info kesehatan terpercaya menyebut terlalu banyak diam dan tiduran malah bikin makin gampang sesak?', kunci: 'fakta', penjelasan: 'Betul, ini fakta. Kurang gerak bikin otot tubuh dan otot napas melemah sehingga cepat ngos-ngosan.' },
    { id: 7, topik: 'Cuci Paru Viral', pertanyaan: 'Viral di medsos minuman rebusan tertentu bisa mencuci bersih paru-paru yang kotor?', kunci: 'mitos', penjelasan: 'Itu mitos. Minuman yang diminum masuk ke lambung, bukan mencuci saluran paru-paru.' },
    { id: 8, topik: 'Testimoni Komentar', pertanyaan: 'Testimoni sembuh total dari sesak di kolom komentar medsos pasti aman diikuti semua orang?', kunci: 'mitos', penjelasan: 'Hati-hati, testimoni di medsos belum tentu asli dan kondisi paru setiap orang berbeda.' },
    { id: 9, topik: 'Video Perawat', pertanyaan: 'Video perawat di medsos mengajarkan tiup napas pelan lewat bibir mencucu meredakan panik sesak?', kunci: 'fakta', penjelasan: 'Betul, ini fakta! Tiup napas pelan lewat bibir mencucu membantu mengeluarkan udara terjebak di paru.' },
    { id: 10, topik: 'Peringatan Medis', pertanyaan: 'Info medis di medsos mengingatkan berhenti obat dokter tanpa izin bisa bikin masuk IGD?', kunci: 'fakta', penjelasan: 'Betul, ini fakta. Menghentikan obat paru tanpa evaluasi dokter berisiko tinggi memicu kambuh berat.' }
];

const sureQuestions = [
    { id: 1, pertanyaan: 'Apakah Anda sudah memahami manfaat dan risiko dari pilihan ini?' },
    { id: 2, pertanyaan: 'Apakah prioritas tujuan Anda sudah jelas dengan pilihan ini?' },
    { id: 3, pertanyaan: 'Apakah dukungan dari keluarga sudah cukup untuk menjalankan rencana ini?' },
    { id: 4, pertanyaan: 'Apakah Anda merasa yakin dengan keputusan yang diambil?' }
];

let breathingInterval = null;
let breathingSeconds = 60;
let breathingPhase = 'inhale';

document.addEventListener('DOMContentLoaded', function() {
    updateProgress();
    loadRiwayat();
    generateQuiz();
    generateSureTest();
});

function goToScreen(screen) {
    document.querySelectorAll('.screen-container').forEach(el => el.classList.add('hidden'));
    document.getElementById(`screen-${screen}`).classList.remove('hidden');
    currentScreen = screen;
    updateProgress();
    if (screen === 4) {
        updatePaspor();
    }
}

function updateProgress() {
    const total = 4;
    const percent = (currentScreen / total) * 100;
    document.getElementById('progress-bar').style.width = `${percent}%`;
    document.getElementById('progress-text').textContent = `Layar ${currentScreen} dari ${total}`;
}

function isiContohKasus() {
    document.getElementById('nama-pasien').value = 'Tn. R';
    document.getElementById('usia-pasien').value = 68;
    pilihKambuh(2);
    pilihMmrc(3);
    pilihPendamping('pasangan');
    therapyData.nama = 'Tn. R';
    therapyData.usia = 68;
}

function resetSession() {
    therapyData = {
        nama: '',
        usia: null,
        kambuh: null,
        mmrc: null,
        pendamping: null,
        jenisInhaler: null,
        checklist: [],
        hariPakai: 7,
        kendala: [],
        opsi: null,
        jawabanQuiz: {},
        prioritas: null,
        suaraPendamping: '',
        rencana: [],
        sureAnswers: {},
        sureScore: 0,
        tanggal: new Date().toLocaleDateString('id-ID')
    };
    document.querySelectorAll('.kambuh-btn, .mmrc-btn, .pendamping-btn, .inhaler-btn, .opsi-btn, .prioritas-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'bg-teal-50', 'border-2');
        btn.classList.add('border-gray-200');
    });
    document.getElementById('nama-pasien').value = '';
    document.getElementById('usia-pasien').value = '';
    document.getElementById('hari-pakai').value = 7;
    document.getElementById('hari-pakai-text').textContent = '7 hari';
    document.querySelectorAll('.kendala-check, .rencana-check').forEach(cb => cb.checked = false);
    document.getElementById('suara-pendamping').value = '';
    generateQuiz();
    generateSureTest();
    goToScreen(0);
}

function pilihKambuh(nilai) {
    therapyData.kambuh = nilai;
    document.querySelectorAll('.kambuh-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'bg-teal-50');
        btn.classList.add('border-gray-200');
    });
    document.querySelector(`.kambuh-btn[data-value="${nilai}"]`).classList.remove('border-gray-200');
    document.querySelector(`.kambuh-btn[data-value="${nilai}"]`).classList.add('border-teal-600', 'bg-teal-50');
}

function pilihMmrc(nilai) {
    therapyData.mmrc = nilai;
    document.querySelectorAll('.mmrc-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'bg-teal-50');
        btn.classList.add('border-gray-200');
    });
    document.querySelector(`.mmrc-btn[data-value="${nilai}"]`).classList.remove('border-gray-200');
    document.querySelector(`.mmrc-btn[data-value="${nilai}"]`).classList.add('border-teal-600', 'bg-teal-50');
}

function pilihPendamping(nilai) {
    therapyData.pendamping = nilai;
    document.querySelectorAll('.pendamping-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'bg-teal-50');
        btn.classList.add('border-gray-200');
    });
    document.querySelector(`.pendamping-btn[data-value="${nilai}"]`).classList.remove('border-gray-200');
    document.querySelector(`.pendamping-btn[data-value="${nilai}"]`).classList.add('border-teal-600', 'bg-teal-50');
}

function pilihJenisInhaler(jenis) {
    therapyData.jenisInhaler = jenis;
    document.querySelectorAll('.inhaler-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'bg-teal-50');
        btn.classList.add('border-gray-200');
    });
    document.querySelector(`.inhaler-btn[data-value="${jenis}"]`).classList.remove('border-gray-200');
    document.querySelector(`.inhaler-btn[data-value="${jenis}"]`).classList.add('border-teal-600', 'bg-teal-50');
    generateChecklist();
}

function generateChecklist() {
    const container = document.getElementById('checklist-container');
    const steps = therapyData.jenisInhaler === 'mdi' ? mdiSteps : dpiSteps;
    container.innerHTML = '';
    steps.forEach((step, index) => {
        const div = document.createElement('div');
        div.className = 'flex items-center gap-3 p-3 border border-gray-200 rounded-xl';
        div.innerHTML = `
            <input type="checkbox" class="checklist-step w-5 h-5 text-teal-600" data-step="${index}" onchange="updateChecklist()">
            <span class="text-gray-700"><strong>Langkah ${index + 1}:</strong> ${step}</span>
        `;
        container.appendChild(div);
    });
}

function updateChecklist() {
    therapyData.checklist = [];
    document.querySelectorAll('.checklist-step:checked').forEach(cb => {
        therapyData.checklist.push(parseInt(cb.dataset.step));
    });
    updateUmpanBalik();
}

function updateHariPakai() {
    therapyData.hariPakai = parseInt(document.getElementById('hari-pakai').value);
    document.getElementById('hari-pakai-text').textContent = `${therapyData.hariPakai} hari`;
    updateUmpanBalik();
}

function updateUmpanBalik() {
    therapyData.kendala = [];
    document.querySelectorAll('.kendala-check:checked').forEach(cb => {
        therapyData.kendala.push(cb.value);
    });
    
    const totalSteps = therapyData.jenisInhaler ? 6 : 0;
    const benar = therapyData.checklist.length;
    const kepatuhan = therapyData.hariPakai;
    const kendalaCount = therapyData.kendala.length;
    
    let pesan = '';
    if (benar === totalSteps && kepatuhan >= 5 && kendalaCount === 0) {
        pesan = '🎉 Luar biasa! Teknik inhaler Anda sudah sangat baik dan rutin dipakai. Pertahankan kebiasaan ini!';
    } else if (benar >= 4 && kepatuhan >= 4) {
        pesan = '👍 Bagus! Ada beberapa langkah teknik yang bisa diperbaiki. Mari latihan bersama perawat.';
    } else if (kendalaCount > 0) {
        pesan = '💡 Ada kendala kepatuhan yang perlu dibicarakan. Mari cari solusi bersama untuk memudahkan rutinitas.';
    } else {
        pesan = '📝 Mari kita periksa kembali teknik pemakaian inhaler dan jadwal penggunaan Anda.';
    }
    
    document.getElementById('umpan-balik').innerHTML = `<p class="text-blue-800">${pesan}</p>`;
}

function pilihOpsi(nilai) {
    therapyData.opsi = nilai;
    document.querySelectorAll('.opsi-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'ring-2', 'ring-teal-500');
    });
    document.querySelector(`.opsi-btn[data-value="${nilai}"]`).classList.add('border-teal-600', 'ring-2', 'ring-teal-500');
}

function generateQuiz() {
    const container = document.getElementById('quiz-container');
    container.innerHTML = '';
    factMitosQuestions.forEach(q => {
        const div = document.createElement('div');
        div.className = 'p-4 border border-gray-200 rounded-xl';
        div.id = `quiz-${q.id}`;
        div.innerHTML = `
            <p class="font-medium text-gray-800 mb-3">${q.pertanyaan}</p>
            <div class="flex gap-2">
                <button onclick="jawabQuiz(${q.id}, 'fakta')" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-medium">Fakta (Benar)</button>
                <button onclick="jawabQuiz(${q.id}, 'mitos')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm font-medium">Mitos (Salah)</button>
            </div>
            <div id="quiz-feedback-${q.id}" class="mt-3 hidden p-3 rounded-lg"></div>
        `;
        container.appendChild(div);
    });
}

function jawabQuiz(id, jawaban) {
    const q = factMitosQuestions.find(x => x.id === id);
    therapyData.jawabanQuiz[id] = jawaban;
    const feedback = document.getElementById(`quiz-feedback-${id}`);
    feedback.classList.remove('hidden');
    if (jawaban === q.kunci) {
        feedback.className = 'mt-3 p-3 bg-green-50 border border-green-200 rounded-lg';
        feedback.innerHTML = `<p class="text-green-800">✅ ${q.penjelasan}</p>`;
    } else {
        feedback.className = 'mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg';
        feedback.innerHTML = `<p class="text-yellow-800">💡 ${q.penjelasan}</p>`;
    }
}

function pilihPrioritas(nilai) {
    therapyData.prioritas = nilai;
    document.querySelectorAll('.prioritas-btn').forEach(btn => {
        btn.classList.remove('border-teal-600', 'bg-teal-50');
        btn.classList.add('border-gray-200');
    });
    document.querySelector(`.prioritas-btn[data-value="${nilai}"]`).classList.remove('border-gray-200');
    document.querySelector(`.prioritas-btn[data-value="${nilai}"]`).classList.add('border-teal-600', 'bg-teal-50');
}

function isiContohDukungan() {
    document.getElementById('suara-pendamping').value = '"Saya akan selalu ingatkan bapak pakai inhaler tepat waktu setiap pagi dan malam. Kita akan jalan santai bersama di halaman rumah setiap hari."';
    therapyData.suaraPendamping = document.getElementById('suara-pendamping').value;
}

function toggleBreathing() {
    const btn = document.getElementById('btn-breathing');
    if (breathingInterval) {
        clearInterval(breathingInterval);
        breathingInterval = null;
        btn.textContent = 'Lanjutkan Latihan';
        document.getElementById('breathing-circle').style.transform = 'scale(1)';
        document.getElementById('breathing-instruction').textContent = 'Latihan dijeda';
    } else {
        breathingSeconds = 60;
        btn.textContent = 'Jeda';
        startBreathingCycle();
        breathingInterval = setInterval(updateBreathing, 1000);
    }
}

function startBreathingCycle() {
    breathingPhase = 'inhale';
    document.getElementById('breathing-circle').style.transition = 'all 2s ease-in-out';
    document.getElementById('breathing-circle').style.transform = 'scale(1.3)';
    document.getElementById('breathing-instruction').textContent = 'TARIK NAPAS PELAN LEWAT HIDUNG';
    setTimeout(() => {
        breathingPhase = 'exhale';
        document.getElementById('breathing-circle').style.transition = 'all 4s ease-in-out';
        document.getElementById('breathing-circle').style.transform = 'scale(1)';
        document.getElementById('breathing-instruction').textContent = 'TIUP PERLAHAN LEWAT BIBIR MENCUCU';
    }, 2000);
}

function updateBreathing() {
    breathingSeconds--;
    document.getElementById('breathing-timer').textContent = `${breathingSeconds} detik`;
    if (breathingSeconds <= 0) {
        clearInterval(breathingInterval);
        breathingInterval = null;
        document.getElementById('btn-breathing').textContent = 'Ulangi Latihan';
        document.getElementById('breathing-instruction').textContent = 'Latihan selesai! Bagus sekali.';
        document.getElementById('breathing-timer').textContent = 'Selesai';
    } else if (breathingSeconds % 6 === 0) {
        startBreathingCycle();
    }
}

function generateSureTest() {
    const container = document.getElementById('sure-container');
    container.innerHTML = '';
    sureQuestions.forEach(q => {
        const div = document.createElement('div');
        div.className = 'p-4 border border-gray-200 rounded-xl';
        div.innerHTML = `
            <p class="font-medium text-gray-800 mb-3">${q.pertanyaan}</p>
            <div class="flex gap-2">
                <button onclick="jawabSure(${q.id}, 1)" id="sure-ya-${q.id}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm font-medium">Ya</button>
                <button onclick="jawabSure(${q.id}, 0)" id="sure-tidak-${q.id}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm font-medium">Belum Yakin</button>
            </div>
        `;
        container.appendChild(div);
    });
}

function jawabSure(id, nilai) {
    therapyData.sureAnswers[id] = nilai;
    document.getElementById(`sure-ya-${id}`).classList.remove('bg-teal-600', 'text-white');
    document.getElementById(`sure-tidak-${id}`).classList.remove('bg-orange-600', 'text-white');
    document.getElementById(`sure-ya-${id}`).classList.add('bg-gray-200', 'text-gray-700');
    document.getElementById(`sure-tidak-${id}`).classList.add('bg-gray-200', 'text-gray-700');
    
    if (nilai === 1) {
        document.getElementById(`sure-ya-${id}`).classList.remove('bg-gray-200', 'text-gray-700');
        document.getElementById(`sure-ya-${id}`).classList.add('bg-teal-600', 'text-white');
    } else {
        document.getElementById(`sure-tidak-${id}`).classList.remove('bg-gray-200', 'text-gray-700');
        document.getElementById(`sure-tidak-${id}`).classList.add('bg-orange-600', 'text-white');
    }
    
    therapyData.sureScore = Object.values(therapyData.sureAnswers).reduce((a, b) => a + b, 0);
    document.getElementById('sure-score').textContent = therapyData.sureScore;
}

function updatePaspor() {
    therapyData.nama = document.getElementById('nama-pasien').value || '-';
    therapyData.usia = document.getElementById('usia-pasien').value || '-';
    therapyData.tanggal = new Date().toLocaleDateString('id-ID');
    
    document.getElementById('paspor-nama').textContent = therapyData.nama;
    document.getElementById('paspor-usia').textContent = `${therapyData.usia} tahun`;
    document.getElementById('paspor-tanggal').textContent = therapyData.tanggal;
    document.getElementById('paspor-mmrc').textContent = `Skor ${therapyData.mmrc ?? '-'}`;
    
    const opsiText = {
        'perbaiki_inhaler': 'Perbaiki Cara Pakai Inhaler & Rutin Terapi',
        'latihan_paru': 'Latihan Paru & Jalan Santai Bertahap',
        'diam_rumah': 'Hanya Diam di Rumah & Kurangi Gerak',
        'obat_alternatif': 'Ganti Obat Alternatif dari Media Sosial'
    };
    document.getElementById('paspor-opsi').textContent = opsiText[therapyData.opsi] || '-';
    document.getElementById('paspor-sure').textContent = `${therapyData.sureScore}/4`;
}

async function downloadPDF() {
    updatePaspor();
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    doc.setFontSize(20);
    doc.text('PASPOR KEPUTUSAN BERSAMA - TERAPI PPOK', 20, 20);
    
    doc.setFontSize(12);
    doc.text(`Nama Pasien: ${therapyData.nama}`, 20, 40);
    doc.text(`Usia: ${therapyData.usia} tahun`, 20, 50);
    doc.text(`Tanggal: ${therapyData.tanggal}`, 20, 60);
    doc.text(`Skala mMRC: Skor ${therapyData.mmrc}`, 20, 70);
    doc.text(`Opsi Terapi: ${therapyData.opsi?.replace(/_/g, ' ')}`, 20, 80);
    doc.text(`Skor SURE: ${therapyData.sureScore}/4`, 20, 90);
    
    doc.text('Tanda Bahaya (Red Flags):', 20, 110);
    doc.setFontSize(10);
    doc.text('1. Sesak napas berat mendadak', 25, 120);
    doc.text('2. Bibir/uji jari kebiruan', 25, 130);
    doc.text('3. Dahak kuning/hijau kental + demam', 25, 140);
    doc.text('4. Bingung/sulit diajak bicara', 25, 150);
    
    doc.save(`paspor-terapi-${therapyData.nama}-${Date.now()}.pdf`);
}

function printPaspor() {
    updatePaspor();
    window.print();
}

function copySummary() {
    updatePaspor();
    const summary = `PASPOR KEPUTUSAN BERSAMA - TERAPI PPOK
Nama: ${therapyData.nama}
Usia: ${therapyData.usia} tahun
Tanggal: ${therapyData.tanggal}
Skala mMRC: Skor ${therapyData.mmrc}
Opsi Terapi: ${therapyData.opsi?.replace(/_/g, ' ') || '-'}
Skor SURE: ${therapyData.sureScore}/4`;
    
    navigator.clipboard.writeText(summary).then(() => {
        alert('Ringkasan berhasil disalin!');
    });
}

function startNewSession() {
    resetSession();
}

function simpanData() {
    updatePaspor();
    therapyData.suaraPendamping = document.getElementById('suara-pendamping').value;
    therapyData.rencana = [];
    document.querySelectorAll('.rencana-check:checked').forEach(cb => {
        therapyData.rencana.push(cb.value);
    });
    
    const riwayat = JSON.parse(localStorage.getItem('terapiRiwayat') || '[]');
    riwayat.push({...therapyData, id: Date.now()});
    localStorage.setItem('terapiRiwayat', JSON.stringify(riwayat));
    
    const requestData = {
        nama_pasien: therapyData.nama,
        usia: therapyData.usia,
        riwayat_kambuh: therapyData.riwayatKambuh,
        skala_mmrc: therapyData.mmrc,
        pendamping: therapyData.pendamping,
        jenis_inhaler: therapyData.jenisInhaler,
        checklist_inhaler: therapyData.checklistInhaler,
        hari_pemakaian: therapyData.hariPemakaian,
        kendala_kepatuhan: therapyData.kendalaKepatuhan,
        pilihan_terapi: therapyData.opsi,
        jawaban_fakta_mitos: therapyData.factMitosAnswers,
        prioritas_tujuan: therapyData.prioritas,
        dukungan_pendamping: therapyData.suaraPendamping,
        kesepakatan_tindakan: therapyData.rencana,
        jawaban_sure: therapyData.sureAnswers,
        skor_sure: therapyData.sureScore,
        paspor_keputusan: JSON.stringify({
            nama: therapyData.nama,
            usia: therapyData.usia,
            tanggal: therapyData.tanggal,
            mmrc: therapyData.mmrc,
            opsi: therapyData.opsi,
            prioritas: therapyData.prioritas,
            sureScore: therapyData.sureScore
        }),
        duration: 0
    };
    
    fetch('<?php echo e(route("pasien.terapi.store")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(requestData)
    }).then(response => response.json()).then(data => {
        if (data.success) {
            alert('Data terapi berhasil disimpan ke database!');
        } else {
            alert('Data tersimpan di lokal. Terapi selesai!');
        }
        loadRiwayat();
    }).catch(() => {
        alert('Data tersimpan di lokal. Terapi selesai!');
        loadRiwayat();
    });
}

function loadRiwayat() {
    const riwayat = JSON.parse(localStorage.getItem('terapiRiwayat') || '[]');
    const container = document.getElementById('riwayat-container');
    
    if (riwayat.length === 0) {
        container.innerHTML = '<p class="text-gray-500 text-center py-8">Belum ada riwayat sesi terapi</p>';
        return;
    }
    
    container.innerHTML = '';
    riwayat.reverse().forEach(item => {
        const div = document.createElement('div');
        div.className = 'p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition';
        div.innerHTML = `
            <div class="flex justify-between items-start">
                <div>
                    <p class="font-semibold text-gray-800">${item.nama || 'Pasien'}</p>
                    <p class="text-sm text-gray-600">${item.tanggal || '-'}</p>
                </div>
                <span class="px-3 py-1 bg-teal-100 text-teal-800 text-xs rounded-full">Skor SURE: ${item.sureScore || 0}/4</span>
            </div>
        `;
        container.appendChild(div);
    });
}

document.getElementById('nama-pasien').addEventListener('input', function(e) {
    therapyData.nama = e.target.value;
});

document.getElementById('usia-pasien').addEventListener('input', function(e) {
    therapyData.usia = e.target.value;
});

document.getElementById('suara-pendamping').addEventListener('input', function(e) {
    therapyData.suaraPendamping = e.target.value;
});
</script>

<style>
@media print {
    nav, .no-print, button {
        display: none !important;
    }
    .screen-container, #paspor-container {
        display: block !important;
        position: relative !important;
    }
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views/pasien/terapi.blade.php ENDPATH**/ ?>