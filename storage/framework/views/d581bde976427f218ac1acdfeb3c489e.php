

<?php $__env->startSection('content'); ?>
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header Judul -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold" style="color: var(--text-primary)">Audit Keputusan Terapi PPOK</h1>
            <p class="mt-2" style="color: var(--text-secondary)">Selesaikan 5 langkah berikut untuk mendapatkan paspor keputusan bersama yang bisa dibawa ke dokter.</p>
        </div>

        <!-- Progress Steps -->
        <div class="flex w-full justify-between mb-8 px-2">
            <div class="flex-1 text-center px-2" id="step-0-label" style="color: var(--text-secondary)">Layar 0: Identitas &amp; Skala</div>
            <div class="flex-1 text-center px-2" id="step-1-label" style="color: var(--text-secondary)">Layar 1: Audit Inhaler</div>
            <div class="flex-1 text-center px-2" id="step-2-label" style="color: var(--text-secondary)">Layar 2: Opsi &amp; Mitos</div>
            <div class="flex-1 text-center px-2" id="step-3-label" style="color: var(--text-secondary)">Layar 3: Nilai &amp; Simulasi</div>
            <div class="flex-1 text-center px-2" id="step-4-label" style="color: var(--text-secondary)">Layar 4: Paspor Keputusan</div>
        </div>

        <!-- ========== LAYAR 0: Halaman Pembuka ========== -->
        <div id="screen-0" class="screen active">

                <div class="card-hover p-8 rounded-2xl mb-6" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <h2 class="text-xl font-bold mb-4" style="color: var(--text-primary)">📋 Identitas &amp; Skala Sesak (Layar 0)</h2>
                    <p class="text-sm mb-6" style="color: var(--text-secondary)">Kumpulkan data dasar sebelum masuk ke audit terapi.</p>

                    <!-- Tombol Contoh & Reset -->
                    <div class="flex flex-wrap gap-3 mb-6">
                        <button type="button" onclick="fillExampleCase()" class="px-4 py-2 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-md transition">
                            Isi Contoh Kasus Tn. R
                        </button>
                        <button type="button" onclick="resetSession()" class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">
                            Reset Sesi Baru
                        </button>
                    </div>

                    <!-- Identitas Dasar -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-2" style="color: var(--text-primary)">Nama / Inisial Pasien</label>
                            <input type="text" id="input-nama" placeholder="Contoh: Tn. R" class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-teal-500 outline-none transition" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2" style="color: var(--text-primary)">Usia (Tahun)</label>
                            <input type="number" id="input-usia" placeholder="Contoh: 65" min="0" max="120" class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-teal-500 outline-none transition" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)">
                        </div>
                    </div>
                    <!-- Riwayat Kambuh -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Riwayat Kambuh 1 Tahun Terakhir</label>
                        <div class="grid md:grid-cols-3 gap-3">
                            <button type="button" onclick="setKambuh(this, '0')" id="kambuh-0" class="kambuh-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                0 kali
                            </button>
                            <button type="button" onclick="setKambuh(this, '1')" id="kambuh-1" class="kambuh-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                1 kali
                            </button>
                            <button type="button" onclick="setKambuh(this, '2plus')" id="kambuh-2plus" class="kambuh-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                2 kali atau lebih<br><span class="text-xs text-red-600 font-semibold">(Risiko Tinggi - GOLD Grup E)</span>
                            </button>
                        </div>
                        <input type="hidden" id="val-kambuh" value="">
                    </div>
                    <!-- Skala mMRC -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Skala Derajat Sesak mMRC (0-4)</label>
                        <div class="grid md:grid-cols-5 gap-3">
                            <button type="button" onclick="setMMRC(this, 0)" id="mmrc-0" class="mmrc-btn p-3 rounded-xl border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Skor 0<br><span class="text-xs">sesak hanya saat aktivitas berat</span>
                            </button>
                            <button type="button" onclick="setMMRC(this, 1)" id="mmrc-1" class="mmrc-btn p-3 rounded-xl border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Skor 1<br><span class="text-xs">sesak saat jalan cepat / menanjak ringan</span>
                            </button>
                            <button type="button" onclick="setMMRC(this, 2)" id="mmrc-2" class="mmrc-btn p-3 rounded-xl border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Skor 2<br><span class="text-xs">berjalan lebih lambat dari seusia karena sesak</span>
                            </button>
                            <button type="button" onclick="setMMRC(this, 3)" id="mmrc-3" class="mmrc-btn p-3 rounded-xl border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Skor 3<br><span class="text-xs">berhenti bernapas setelah ~100 meter</span>
                            </button>
                            <button type="button" onclick="setMMRC(this, 4)" id="mmrc-4" class="mmrc-btn p-3 rounded-xl border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Skor 4<br><span class="text-xs">terlalu sesak keluar rumah</span>
                            </button>
                        </div>
                        <input type="hidden" id="val-mmrc" value="">
                    </div>
                    <!-- Pendamping -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Pendamping Konsultasi</label>
                        <div class="grid md:grid-cols-3 gap-3">
                            <button type="button" onclick="setPendamping(this, 'Sendiri')" id="pendamping-Sendiri" class="pendamping-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Sendiri
                            </button>
                            <button type="button" onclick="setPendamping(this, 'Istri / Suami')" id="pendamping-Istri / Suami" class="pendamping-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Istri / Suami
                            </button>
                            <button type="button" onclick="setPendamping(this, 'Anak / Keluarga')" id="pendamping-Anak / Keluarga" class="pendamping-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Anak / Keluarga
                            </button>
                        </div>
                        <input type="hidden" id="val-pendamping" value="">
                    </div>
                </div> <!-- close card -->

                <div class="flex justify-between">
                    <button type="button" onclick="goToScreen(1)" id="btn-next-0" class="px-6 py-3 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-lg transition">Lanjut ke Langkah 1 →</button>
                </div>
            </div> <!-- close screen-0 -->

            <!-- ========== LAYAR 1: Audit Teknik Inhaler ========== -->
            <div id="screen-1" class="screen hidden">
                <div class="card-hover p-8 rounded-2xl mb-6" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <h2 class="text-xl font-bold mb-4" style="color: var(--text-primary)">💨 Langkah 1: Audit Teknik Inhaler &amp; Kepatuhan</h2>
                    <p class="text-sm mb-6" style="color: var(--text-secondary)">Menilai apakah keluhan obat kurang mempan disebabkan oleh teknik pemakaian yang keliru atau hambatan kepatuhan harian.</p>

                    <!-- Pilih Jenis Inhaler -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Pilih Jenis Inhaler yang Digunakan</label>
                        <div class="grid md:grid-cols-2 gap-4">
                            <button type="button" onclick="setInhalerType(this, 'MDI')" id="inhaler-MDI" class="inhaler-type-btn p-4 rounded-xl border border-gray-200 bg-white flex flex-col items-center text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                <span class="text-2xl mb-1">💨</span>
                                MDI (Metered Dose Inhaler)<br><span class="text-xs text-gray-500">Inhaler Semprot</span>
                            </button>
                            <button type="button" onclick="setInhalerType(this, 'DPI')" id="inhaler-DPI" class="inhaler-type-btn p-4 rounded-xl border border-gray-200 bg-white flex flex-col items-center text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                <span class="text-2xl mb-1">🌀</span>
                                DPI (Dry Powder Inhaler)<br><span class="text-xs text-gray-500">Inhaler Serbuk Kering</span>
                            </button>
                        </div>
                        <input type="hidden" id="val-inhaler-type" value="">
                    </div>

                    <!-- Checklist 6 Langkah -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">Checklist 6 Langkah Teknik Pemakaian</h3>
                        <div id="checklist-inhaler" class="space-y-3">
                            <!-- Diisi oleh JavaScript berdasarkan jenis inhaler -->
                        </div>
                    </div>

                    <!-- Kepatuhan: Jumlah Hari -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-3" style="color: var(--text-primary)">Jumlah Hari Pemakaian Inhaler dalam 7 Hari Terakhir</label>
                        <input type="number" id="input-hari-pepakai" min="0" max="7" value="0" class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-teal-500 outline-none transition" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)">
                    <!-- Skrining 5 Kendala Kepatuhan -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">Skrining Kendala Kepatuhan (centang yang anda alami)</h3>
                        <div class="grid md:grid-cols-3 gap-3">
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:border-teal-500 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="kepatuhan-checkbox" value="lupa-jadwal"> <span class="text-sm">Lupa jadwal minum obat</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:border-teal-500 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="kepatuhan-checkbox" value="berhenti-enak"> <span class="text-sm">Berhenti saat merasa sudah enak</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:border-teal-500 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="kepatuhan-checkbox" value="takut-efek-samping"> <span class="text-sm">Takut efek samping obat</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:border-teal-500 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="kepatuhan-checkbox" value="sulit-tekan"> <span class="text-sm">Sulit menekan / menghisap alat</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:border-teal-500 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="kepatuhan-checkbox" value="lainnya"> <span class="text-sm">Kendala lainnya</span>
                            </label>
                        </div>
                    </div>

                    <!-- Umpan Balik Empatik -->
                    <div class="bg-teal-50 border border-teal-100 rounded-2xl p-4 mb-6">
                        <p class="text-sm" style="color: var(--text-secondary)"><strong>Umpan Balik:</strong> <span id="feedback-empatis" class="text-teal-700">Terima kasih telah mengevaluasi teknik pemakaian inhaler Anda. Ini adalah langkah penting untuk memastikan obat bekerja dengan maksimal.</span></p>
                    </div>
                </div> <!-- close card screen-1 -->

                <div class="flex justify-between">
                    <button type="button" onclick="goToScreen(0)" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">← Kembali</button>
                    <button type="button" onclick="goToScreen(2)" id="btn-next-1" class="px-6 py-3 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-lg transition">Lanjut ke Langkah 2 →</button>
                </div>
            </div> <!-- close screen-1 -->

            <!-- ========== LAYAR 2: Opsi Terapi & Mitos Medsos ========== -->
            <div id="screen-2" class="screen hidden">
                <div class="card-hover p-8 rounded-2xl mb-6" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <h2 class="text-xl font-bold mb-4" style="color: var(--text-primary)">🩺 Langkah 2: Opsi Terapi &amp; Cek Fakta/Mitos</h2>
                    <p class="text-sm mb-6" style="color: var(--text-secondary)">Timbandingkan pilihan medis dan saring hoaks kesehatan di media sosial.</p>

                    <!-- A. Matriks Perbandingan 4 Opsi -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">A. Matriks Perbandingan 4 Opsi Terapi</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-teal-200 bg-teal-50" style="color: var(--text-primary)">
                                <h4 class="font-bold text-sm mb-2" style="color: var(--text-primary)">(1) Perbaiki Cara Pakai Inhaler &amp; Rutin Terapi</h4>
                                <p class="text-xs text-teal-800" style="color: var(--text-secondary)">Langkah Utama Aman - disarankan sebagai prioritas pertama.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-blue-200 bg-blue-50" style="color: var(--text-primary)">
                                <h4 class="font-bold text-sm mb-2" style="color: var(--text-primary)">(2) Latihan Paru &amp; Jalan Santai Bertahap</h4>
                                <p class="text-xs text-blue-800" style="color: var(--text-secondary)">Dianjurkan Dokter Paru - bantu otot paru lebih kuat.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-orange-200 bg-orange-50" style="color: var(--text-primary)">
                                <h4 class="font-bold text-sm mb-2" style="color: var(--text-primary)">(3) Hanya Diam di Rumah &amp; Kurangi Gerak</h4>
                                <p class="text-xs text-orange-800" style="color: var(--text-secondary)">Kurang Dianjurkan - Risiko otot melemah.</p>
                            </div>
                            <div class="p-4 rounded-xl border border-red-200 bg-red-50" style="color: var(--text-primary)">
                                <h4 class="font-bold text-sm mb-2" style="color: var(--text-primary)">(4) Ganti Obat Alternatif dari Media Sosial</h4>
                                <p class="text-xs text-red-800" style="color: var(--text-secondary)">Risiko Tinggi bila stop obat dokter.</p>
                            </div>
                        </div>
                    </div>

                    <!-- B. 3 Ciri Obat Palsu -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">B. Waspada 3 Ciri Info Obat Palsu di HP &amp; Media Sosial</h3>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4">
                            <div class="flex items-start gap-3">
                                <span class="text-yellow-600 text-xl">⚠️</span>
                                <div>
                                    <p class="text-xs font-bold text-yellow-800 mb-2">Tanda Bahaya Iklan Kesehatan di HP:</p>
                                    <ul class="text-xs text-yellow-700 space-y-1" style="color: var(--text-secondary)">
                                        <li>Janji Sembuh Total &amp; Instan</li>
                                        <li>Menyuruh Stop Obat Dokter</li>
                                        <li>Hanya Modal Testimoni Video/Komentar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- C. 10 Tanya Jawab Fakta/Mitos -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">C. Tanya Jawab Singkat: Mana Fakta, Mana Mitos?</h3>
                        <div id="fakta-mitos-list" class="space-y-3">
                            <!-- Diisi oleh JavaScript -->
                        </div>
                    </div>
                </div> <!-- close card screen-2 -->

                <div class="flex justify-between">
                    <button type="button" onclick="goToScreen(1)" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">← Kembali</button>
                    <button type="button" onclick="goToScreen(3)" id="btn-next-2" class="px-6 py-3 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-lg transition">Lanjut ke Langkah 3 →</button>
                </div>
            </div> <!-- close screen-2 -->
            <!-- ========== LAYAR 3: Klarifikasi Nilai & Simulasi ========== -->
            <div id="screen-3" class="screen hidden">
                <div class="card-hover p-8 rounded-2xl mb-6" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <h2 class="text-xl font-bold mb-4" style="color: var(--text-primary)">🎯 Langkah 3: Klarifikasi Nilai &amp; Simulasi Napas</h2>
                    <p class="text-sm mb-6" style="color: var(--text-secondary)">Klarifikasi prioritas, dukungan keluarga, latihan napas, dan evaluasi keputusan.</p>

                    <!-- A. Skala Prioritas Tujuan Hidup -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">A. Skala Prioritas Tujuan Hidup</h3>
                        <div class="grid md:grid-cols-3 gap-3">
                            <button type="button" onclick="setTujuan(this, 'walking')" id="tujuan-walking" class="tujuan-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Berjalan kaki tanpa ngos-ngosan
                            </button>
                            <button type="button" onclick="setTujuan(this, 'igd')" id="tujuan-igd" class="tujuan-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Tidak masuk IGD/rawat inap lagi tahun ini
                            </button>
                            <button type="button" onclick="setTujuan(this, 'ibadah')" id="tujuan-ibadah" class="tujuan-btn p-4 rounded-xl border border-gray-200 bg-white text-sm font-medium text-gray-700 hover:border-teal-500 hover:bg-teal-50 transition" style="color: var(--text-primary)">
                                Beribadah &amp; berkumpul nyaman bersama keluarga
                            </button>
                        </div>
                        <input type="hidden" id="val-tujuan" value="">
                    </div>

                    <!-- B. Kotak Suara Pendamping -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">B. Kotak Suara Pendamping</h3>
                        <div class="flex gap-3 mb-3">
                            <textarea id="input-suara-pendamping" rows="3" placeholder="Masukkan dukungan dari istri/keluarga..." class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-teal-500 outline-none transition" style="background: var(--input-bg); border-color: var(--border-color); color: var(--text-primary)"></textarea>
                            <button type="button" onclick="fillContohDukungan()" class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">
                                Isi Contoh Dukungan Istri
                            </button>
                        </div>
                    </div>
                    <!-- C. Simulasi Pursed-Lip Breathing 60 Detik -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">C. Simulasi Pursed-Lip Breathing 60 Detik</h3>
                        <div class="flex flex-col items-center">
                            <div id="plb-circle" class="w-32 h-32 rounded-full flex items-center justify-center mb-4 relative overflow-hidden" style="background: linear-gradient(135deg, #10b981, #059669);">
                                <span id="plb-text" class="text-white font-bold text-2xl">Mulai</span>
                            </div>
                            <div id="plb-timer" class="text-2xl font-bold text-teal-600 mb-2">60</div>
                            <button type="button" onclick="togglePLB()" id="plb-btn" class="px-6 py-2 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-lg transition">
                                Mulai Simulasi
                            </button>
                            <p class="text-xs text-center text-gray-500 mt-2" style="color: var(--text-secondary)">Tarik napas pelan lewat hidung (2 detik) → Tiup perlahan lewat bibir mencucu (4 detik)</p>
                        </div>
                    </div>

                    <!-- D. Rencana Terapi -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">D. Rencana Terapi yang Disepakati</h3>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="rencana-checkbox" value="teknik-inhaler"> <span class="text-sm">Latihan teknik inhaler yang benar</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="rencana-checkbox" value="rehabilitasi-paru"> <span class="text-sm">Rehabilitasi paru ringan (jalan santai &amp; latihan napas)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 transition cursor-pointer" style="color: var(--text-primary)">
                                <input type="checkbox" class="rencana-checkbox" value="lanjut-inhaler"> <span class="text-sm">Melanjutkan inhaler dokter tanpa terpengaruh produk medsos</span>
                            </label>
                        </div>
                    </div>

                    <!-- E. SURE Test -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold mb-3" style="color: var(--text-primary)">E. Cek Kemantapan Keputusan (SURE Test)</h3>
                        <div class="space-y-4" id="sure-test">
                            <!-- Diisi oleh JavaScript -->
                        </div>
                        <div id="sure-score" class="mt-3 p-3 rounded-xl bg-blue-50 border border-blue-100 hidden" style="color: var(--text-secondary)">
                            <p class="text-sm font-semibold">Skor SURE: <span id="sure-score-val">0</span> / 4</p>
                        </div>
                    </div>
                </div> <!-- close card screen-3 -->

                <div class="flex justify-between">
                    <button type="button" onclick="goToScreen(2)" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">← Kembali</button>
                    <button type="button" onclick="goToScreen(4)" id="btn-next-3" class="px-6 py-3 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-lg transition">Lanjut ke Paspor Keputusan →</button>
                </div>
            </div> <!-- close screen-3 -->
            <!-- ========== LAYAR 4: Paspor Keputusan Bersama ========== -->
            <div id="screen-4" class="screen hidden">
                <div class="card-hover p-8 rounded-2xl mb-6" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                    <h2 class="text-xl font-bold mb-4" style="color: var(--text-primary)">📄 Langkah 4: Paspor Keputusan Bersama</h2>
                    <p class="text-sm mb-6" style="color: var(--text-secondary)">Ringkasan seluruh hasil Langkah 0-3 yang siap dibawa ke dokter.</p>

                    <!-- Paspor Card -->
                    <div id="paspor-content" class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm mb-6" style="color: var(--text-primary)">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-xl">📄</span>
                            <h3 class="font-bold text-sm text-teal-700">PASPOR KEPUTUSAN BERSAMA — TERAPI PPOK</h3>
                        </div>
                        <div id="paspor-ringkasan" class="text-sm space-y-2">
                            <!-- Diisi oleh JavaScript -->
                        </div>
                    </div>

                    <!-- Red Flags -->
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-4 mb-6">
                        <h3 class="text-sm font-bold text-red-800 mb-3">🚩 Tanda Bahaya (Red Flags) — Segera ke IGD Bila Muncul:</h3>
                        <ul class="text-xs text-red-700 space-y-1 list-disc list-inside" style="color: var(--text-secondary)">
                            <li>Sesak napas berat mendadak bahkan saat sedang beristirahat atau sulit mengucapkan kalimat.</li>
                            <li>Bibir, lidah, atau ujung jari tangan/kaki tampak kebiruan atau pucat dingin.</li>
                            <li>Dahak berubah warna menjadi kuning/hijau kental dalam jumlah banyak disertai demam tinggi.</li>
                            <li>Pasien tampak sangat mengantuk, bingung, atau sulit diajak berbicara.</li>
                        </ul>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="grid md:grid-cols-2 gap-3">
                        <button type="button" onclick="simpanData()" class="px-4 py-3 rounded-xl bg-gradient-to-r from-teal-400 to-teal-600 text-white font-semibold text-sm hover:shadow-lg transition">
                            Simpan Data ke Sistem
                        </button>
                        <button type="button" onclick="downloadPDF()" class="px-4 py-3 rounded-xl bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold text-sm hover:shadow-lg transition">
                            Download Paspor (PDF)
                        </button>
                        <button type="button" onclick="cetakPaspor()" class="px-4 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">
                            Cetak Paspor
                        </button>
                        <button type="button" onclick="salinRingkasan()" class="px-4 py-3 rounded-xl bg-indigo-100 text-indigo-700 font-semibold text-sm border border-indigo-200 hover:bg-indigo-200 transition">
                            Salin Ringkasan untuk Dokter
                        </button>
                    </div>
                </div> <!-- close card screen-4 -->

                <div class="flex justify-between">
                    <button type="button" onclick="goToScreen(3)" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold text-sm border border-gray-200 hover:bg-gray-200 transition">← Kembali</button>
                </div>
            </div> <!-- close screen-4 -->
        </div> <!-- close max-w-7xl -->
    </div> <!-- close py-8 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    let activeScreen = 0;
    let plbInterval = null;
    let plbTimeLeft = 60;
    let plbPhase = 'in';

    const mdidata = [
        "Mengocok tabung inhaler semprot terlebih dahulu sebelum dipakai.",
        "Membuang napas hingga tuntas menjauhi corong sebelum menghisap.",
        "Merapatkan bibir mengelilingi corong inhaler agar tidak bocor.",
        "Menekan tabung sambil menghisap obat secara pelan dan dalam.",
        "Menahan napas selama 5-10 detik agar obat mengendap di paru.",
        "Berkumur dengan air bersih setelah selesai memakai inhaler."
    ];
    const dpidata = [
        "Membuka tutup/menggeser tuas dosis TANPA mengocok alat.",
        "Membuang napas hingga tuntas menjauhi corong sebelum menghisap.",
        "Merapatkan bibir pada corong inhaler serbuk kering dengan rapat.",
        "Menghisap obat secara kuat dan cepat lewat mulut agar serbuk terhirup.",
        "Menahan napas selama 5-10 detik setelah menghisap serbuk obat.",
        "Berkumur dengan air bersih setelah selesai inhalasi."
    ];

    const faktaMitos = [
        {q:"Katanya di medsos, jamu herbal bisa menyembuhkan total sakit paru dalam seminggu?",k:"Mitos",p:"Itu mitos. Penyakit paru kronis tidak bisa sembuh instan hanya dengan jamu tanpa pengobatan dokter."},
        {q:"Kata video di HP, kalau sudah minum ramuan alami, inhaler dokter harus distop?",k:"Mitos",p:"Jangan diikuti! Menghentikan inhaler dokter secara mendadak bisa memicu serangan sesak berat."},
        {q:"Beredar pesan di grup WA, sering pakai inhaler bikin paru-paru rusak dan ketagihan?",k:"Mitos",p:"Itu mitos. Inhaler justru menjaga saluran napas tetap terbuka dan aman dipakai rutin sesuai aturan dokter."},
        {q:"Ada dokter di medsos bilang inhaler terasa kurang mempan karena cara hisapnya salah?",k:"Fakta",p:"Betul, ini fakta! Kalau cara hisap dan tahan napasnya pas, obat masuk lebih dalam ke paru."},
        {q:"Kata postingan di medsos, orang sakit paru dilarang jalan kaki karena bikin napas putus?",k:"Mitos",p:"Salah kaprah. Justru jalan santai bertahap dan latihan napas bikin otot paru makin kuat."},
        {q:"Info kesehatan terpercaya menyebut terlalu banyak diam dan tiduran malah bikin makin gampang sesak?",k:"Fakta",p:"Betul, ini fakta. Kurang gerak bikin otot tubuh dan otot napas melemah sehingga cepat ngos-ngosan."},
        {q:"Viral di medsos minuman rebusan tertentu bisa 'mencuci bersih' paru-paru yang kotor?",k:"Mitos",p:"Itu mitos. Minuman yang diminum masuk ke lambung, bukan mencuci saluran paru-paru."},
        {q:"Testimoni sembuh total dari sesak di kolom komentar medsos pasti aman diikuti semua orang?",k:"Mitos",p:"Hati-hati, testimoni di medsos belum tentu asli dan kondisi paru setiap orang berbeda."},
        {q:"Video perawat di medsos mengajarkan tiup napas pelan lewat bibir mencucu meredakan panik sesak?",k:"Fakta",p:"Betul, ini fakta! Tiup napas pelan lewat bibir mencucu membantu mengeluarkan udara terjebak di paru."},
        {q:"Info medis di medsos mengingatkan berhenti obat dokter tanpa izin bisa bikin masuk IGD?",k:"Fakta",p:"Betul, ini fakta. Menghentikan obat paru tanpa evaluasi dokter berisiko tinggi memicu kambuh berat."}
    ];

    const sureQuestions = [
        "Apakah Anda memahami manfaat dan risiko setiap opsi terapi yang dipilih?",
        "Apakah prioritas tujuan hidup Anda sudah jelas dan Anda yakin dengannya?",
        "Apakah Anda merasa mendapat dukungan yang cukup dari pendamping/keluarga?",
        "Apakah Anda yakin dengan keputusan terapi yang telah dibuat bersama?"
    ];
    function goToScreen(n) {
        document.querySelectorAll('.screen').forEach(s => { s.classList.remove('active'); s.classList.add('hidden'); });
        const s = document.getElementById('screen-' + n);
        s.classList.remove('hidden');
        s.classList.add('active');
        activeScreen = n;
        updateStepLabels();
    }

    function updateStepLabels() {
        for(let i=0;i<5;i++){
            const el = document.getElementById('step-'+i+'-label');
            el.style.color = (i === activeScreen) ? 'var(--gradient-end)' : 'var(--text-secondary)';
            el.style.fontWeight = (i === activeScreen) ? 'bold' : 'normal';
        }
    }

    function setSelected(btnGroup, id, valInput, val) {
        document.querySelectorAll('.'+btnGroup).forEach(b => {
            b.classList.remove('border-teal-500','bg-teal-50');
            b.classList.add('border-gray-200','bg-white');
        });
        const btn = document.getElementById(id);
        btn.classList.remove('border-gray-200','bg-white');
        btn.classList.add('border-teal-500','bg-teal-50');
        document.getElementById(valInput).value = val;
    }

    function setKambuh(btn, val) { setSelected('kambuh-btn','kambuh-'+val,'val-kambuh',val); }
    function setMMRC(btn, val) { setSelected('mmrc-btn','mmrc-'+val,'val-mmrc',val); }
    function setPendamping(btn, val) { setSelected('pendamping-btn','pendamping-'+val.replace(' / ',' '),'val-pendamping',val); }
    function setTujuan(btn, val) { setSelected('tujuan-btn','tujuan-'+val,'val-tujuan',val); }

    function setInhalerType(btn, type) {
        setSelected('inhaler-type-btn','inhaler-'+type,'val-inhaler-type',type);
        const list = document.getElementById('checklist-inhaler');
        list.innerHTML = '';
        const data = type === 'MDI' ? mdidata : dpidata;
        data.forEach((text,i) => {
            list.innerHTML += '<label class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-white hover:border-teal-500 transition cursor-pointer" style="color:var(--text-primary)">' +
                '<input type="checkbox" class="inhaler-check"> <span class="text-sm">Langkah '+(i+1)+': '+text+'</span>' +
                '</label>';
        });
    }
    function fillExampleCase() {
        document.getElementById('input-nama').value = 'Tn. R';
        document.getElementById('input-usia').value = '65';
        setKambuh(null,'2plus');
        setMMRC(null,3);
        setPendamping(null,'Istri / Suami');
        setInhalerType(null,'MDI');
        document.getElementById('input-hari-pepakai').value = '5';
        document.querySelectorAll('.kepatuhan-checkbox')[0].checked = true;
        document.getElementById('input-suara-pendamping').value = "Saya akan mendampingi Bapak untuk latihan napas setiap pagi dan mengingatkan jadwal inhaler.";
        setTujuan(null,'walking');
        document.querySelectorAll('.rencana-checkbox').forEach(c => c.checked = true);
        generatePaspor();
    }

    function resetSession() {
        if(!confirm('Yakin ingin mereset seluruh data sesi?')) return;
        document.querySelectorAll('input').forEach(i => { if(i.type!=='hidden') i.value=''; });
        document.querySelectorAll('textarea').forEach(t => t.value='');
        document.querySelectorAll('input[type="checkbox"]').forEach(c => c.checked=false);
        document.querySelectorAll('.kambuh-btn,.mmrc-btn,.pendamping-btn,.inhaler-type-btn,.tujuan-btn').forEach(b => {
            b.classList.remove('border-teal-500','bg-teal-50');
            b.classList.add('border-gray-200','bg-white');
        });
        document.getElementById('val-kambuh').value='';
        document.getElementById('val-mmrc').value='';
        document.getElementById('val-pendamping').value='';
        document.getElementById('val-inhaler-type').value='';
        document.getElementById('val-tujuan').value='';
        document.getElementById('checklist-inhaler').innerHTML='';
        document.getElementById('paspor-ringkasan').innerHTML='';
        document.getElementById('fakta-mitos-list').innerHTML='';
        document.getElementById('sure-test').innerHTML='';
        document.getElementById('sure-score').classList.add('hidden');
    }

    function renderFaktaMitos() {
        const list = document.getElementById('fakta-mitos-list');
        list.innerHTML = '';
        faktaMitos.forEach((item,i) => {
            list.innerHTML += '<div class="p-4 rounded-xl border border-gray-200 bg-white" style="color:var(--text-primary)">' +
                '<div class="flex justify-between items-start mb-2">' +
                '<span class="font-semibold text-sm">Q'+(i+1)+'. '+item.q+'</span>' +
                '</div>' +
                '<div class="flex gap-2">' +
                '<button onclick="answerFM(this,'+i+',\'Fakta\')" class="px-3 py-1.5 rounded-lg text-xs font-medium border transition bg-white text-gray-700 hover:border-teal-500">Fakta</button>' +
                '<button onclick="answerFM(this,'+i+',\'Mitos\')" class="px-3 py-1.5 rounded-lg text-xs font-medium border transition bg-white text-gray-700 hover:border-red-500">Mitos</button>' +
                '</div>' +
                '<div id="fm-result-'+i+'" class="mt-2 text-xs hidden"></div>' +
                '</div>';
        });
    }

    function answerFM(btn, idx, jawaban) {
        const benar = faktaMitos[idx].k;
        const result = document.getElementById('fm-result-'+idx);
        const isBenar = jawaban === benar;
        result.classList.remove('hidden');
        result.innerHTML = '<strong>'+(isBenar?'&#x2705; Benar':'&#x274c; Salah')+'</strong> '+faktaMitos[idx].p;
        document.querySelectorAll('#fakta-mitos-list button').forEach(b => b.disabled = true);
    }

    function renderSURE() {
        const list = document.getElementById('sure-test');
        list.innerHTML = '';
        sureQuestions.forEach((q,i) => {
            list.innerHTML += '<div class="p-3 rounded-xl border border-gray-200 bg-white mb-2" style="color:var(--text-primary)">' +
                '<p class="text-sm font-medium mb-2">'+(i+1)+'. '+q+'</p>' +
                '<label class="flex items-center gap-2 p-2 rounded border border-gray-300 bg-gray-50 cursor-pointer hover:border-teal-500 text-xs">' +
                '<input type="radio" name="sure-'+i+'" value="ya"> Ya' +
                '</label>' +
                '<label class="flex items-center gap-2 p-2 rounded border border-gray-300 bg-gray-50 cursor-pointer hover:border-teal-500 text-xs ml-2">' +
                '<input type="radio" name="sure-'+i+'" value="tidak"> Tidak' +
                '</label>' +
                '</div>';
        });
    }

    function hitungSURE() {
        let skor = 0;
        sureQuestions.forEach((_,i) => {
            const ya = document.querySelector('input[name="sure-'+i+'"]:checked');
            if(ya && ya.value === 'ya') skor++;
        });
        document.getElementById('sure-score-val').textContent = skor;
        document.getElementById('sure-score').classList.remove('hidden');
    }
    function generatePaspor() {
        const nama = document.getElementById('input-nama').value || '-';
        const usia = document.getElementById('input-usia').value || '-';
        const kambuh = document.getElementById('val-kambuh').value || '-';
        const mmrc = document.getElementById('val-mmrc').value || '-';
        const pendamping = document.getElementById('val-pendamping').value || '-';
        const inhaler = document.getElementById('val-inhaler-type').value || '-';
        const tujuan = document.getElementById('val-tujuan').value || '-';
        const suara = document.getElementById('input-suara-pendamping').value || '-';
        const tujuanLabel = {walking:'Berjalan kaki tanpa ngos-ngosan',igd:'Tidak masuk IGD/rawat inap lagi tahun ini',ibadah:'Beribadah & berkumpul nyaman bersama keluarga'}[tujuan] || '-';
        const html = '<div class="text-sm space-y-2">' +
            '<p class="font-bold border-b border-gray-200 pb-1">Identitas Pasien</p>' +
            '<p>Nama: '+nama+' | Usia: '+usia+' tahun</p>' +
            '<p class="font-bold border-b border-gray-200 pb-1 mt-2">Hasil Audit</p>' +
            '<p>Riwayat Kambuh: '+kambuh+' | Skala mMRC: Skor '+mmrc+'</p>' +
            '<p>Pendamping: '+pendamping+' | Jenis Inhaler: '+inhaler+'</p>' +
            '<p>Tujuan Utama: '+tujuanLabel+'</p>' +
            '<p>Suara Pendamping: '+suara+'</p>' +
            '</div>';
        document.getElementById('paspor-ringkasan').innerHTML = html;
    }

    function togglePLB() {
        const btn = document.getElementById('plb-btn');
        const circle = document.getElementById('plb-circle');
        const text = document.getElementById('plb-text');
        const timer = document.getElementById('plb-timer');
        if (!plbInterval) {
            plbTimeLeft = 60;
            plbPhase = 'in';
            text.textContent = 'TARIK NAPAS PELAN LEWAT HIDUNG';
            btn.textContent = 'Berhenti';
            timer.textContent = plbTimeLeft;
            plbInterval = setInterval(() => {
                plbTimeLeft--;
                timer.textContent = plbTimeLeft;
                if (plbPhase === 'in') {
                    text.textContent = 'TARIK NAPAS PELAN LEWAT HIDUNG';
                    circle.style.transform = 'scale(1.2)';
                    setTimeout(() => { plbPhase = 'out'; }, 2000);
                } else {
                    text.textContent = 'TIUP PERLAHAN LEWAT BIBIR MENCUCU';
                    circle.style.transform = 'scale(1)';
                    setTimeout(() => { plbPhase = 'in'; }, 4000);
                }
                if (plbTimeLeft <= 0) {
                    clearInterval(plbInterval);
                    plbInterval = null;
                    btn.textContent = 'Mulai Simulasi';
                    text.textContent = 'Selesai';
                    timer.textContent = '0';
                }
            }, 1000);
        } else {
            clearInterval(plbInterval);
            plbInterval = null;
            btn.textContent = 'Mulai Simulasi';
            text.textContent = 'Mulai';
            timer.textContent = '60';
            circle.style.transform = 'scale(1)';
        }
    }

    function simpanData() {
        const data = {
            nama: document.getElementById('input-nama').value,
            usia: document.getElementById('input-usia').value,
            kambuh: document.getElementById('val-kambuh').value,
            mmrc: document.getElementById('val-mmrc').value,
            pendamping: document.getElementById('val-pendamping').value,
            inhaler: document.getElementById('val-inhaler-type').value,
            hari: document.getElementById('input-hari-pepakai').value,
            tujuan: document.getElementById('val-tujuan').value,
            suara: document.getElementById('input-suara-pendamping').value,
            timestamp: new Date().toISOString()
        };
        const existing = JSON.parse(localStorage.getItem('pasien_ppok_data') || '[]');
        existing.push(data);
        localStorage.setItem('pasien_ppok_data', JSON.stringify(existing));
        alert('Data berhasil disimpan ke sistem (localStorage).');
    }

    function downloadPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(16);
        doc.text('PASPOR KEPUTUSAN BERSAMA - TERAPI PPOK', 20, 20);
        doc.setFontSize(11);
        doc.text(document.getElementById('paspor-ringkasan').innerText, 20, 40);
        doc.save('Paspor-Keputusan-PPOK.pdf');
    }

    function cetakPaspor() {
        const printWin = window.open('', '', 'width=800,height=800');
        printWin.document.write('<html><head><title>Paspor PPOK</title>' +
            '<style>body{font-family:Inter,sans-serif;} @media print{button{display:none;}}</style>' +
            '</head><body><h2>Paspor Keputusan Bersama - Terapi PPOK</h2>' +
            document.getElementById('paspor-ringkasan').innerHTML +
            '<div class="mt-4 bg-red-50 border border-red-100 rounded-xl p-4">' +
            '<strong>Tanda Bahaya (Red Flags):</strong><br>' +
            '1. Sesak napas berat mendadak bahkan saat beristirahat.<br>' +
            '2. Bibir/lidah/ujung jari kebiruan atau pucat dingin.<br>' +
            '3. Dahak kuning/hijau kental disertai demam tinggi.<br>' +
            '4. Pasien sangat mengantuk, bingung, atau sulit diajak bicara.' +
            '</div></body></html>');
        printWin.document.close();
        printWin.print();
    }

    function salinRingkasan() {
        const text = document.getElementById('paspor-ringkasan').innerText;
        navigator.clipboard.writeText(text).then(() => alert('Ringkasan disalin ke clipboard.'));
    }

    document.addEventListener('DOMContentLoaded', function() {
        renderFaktaMitos();
        renderSURE();
        generatePaspor();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\pasien\dashboard.blade.php ENDPATH**/ ?>