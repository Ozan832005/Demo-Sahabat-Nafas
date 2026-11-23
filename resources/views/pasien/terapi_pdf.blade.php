<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ringkasan Terapi PPOK</title>
    <style>
        body { font-family: sans-serif; margin: 40px; color: #333; }
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { margin: 0; color: #00796B; }
        .header p { margin: 5px 0; color: #555; }
        .content { border: 1px solid #B2DFDB; border-radius: 10px; padding: 25px; }
        h2 { color: #00796B; border-bottom: 2px solid #00796B; padding-bottom: 10px; margin-top: 30px; margin-bottom: 20px; }
        .section { margin-bottom: 20px; }
        .section p { margin: 5px 0; }
        .section strong { color: #004D40; min-width: 180px; display: inline-block; }
        .footer { text-align: center; margin-top: 40px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sahabat Nafas</h1>
        <p>Ringkasan Sesi Terapi PPOK</p>
        <p><strong>Pasien:</strong> {{ $therapy->nama_pasien }} | <strong>Tanggal:</strong> {{ $therapy->created_at->format('d F Y') }}</p>
    </div>

    <div class="content">
        <h2>Layar 1: Identitas, Skala Sesak & Pendamping</h2>
        <div class="section">
            <p><strong>Nama Pasien:</strong> {{ $therapy->nama_pasien }}</p>
            <p><strong>Usia:</strong> {{ $therapy->usia }} tahun</p>
            <p><strong>Riwayat Kambuh 1 Tahun Terakhir:</strong> {{ $therapy->riwayat_kambuh_text ?? $therapy->riwayat_kambuh }}</p>
            <p><strong>Skala Derajat Sesak (mMRC):</strong> {{ $therapy->skala_mmrc }}</p>
            <p><strong>Pendamping Konsultasi:</strong> {{ ucfirst($therapy->pendamping) }}</p>
        </div>

        <h2>Layar 2: Kepatuhan Inhaler & Faktor Penghambat</h2>
        <div class="section">
            <p><strong>Jenis Inhaler:</strong> {{ strtoupper($therapy->jenis_inhaler) }}</p>
            <p><strong>Teknik Penggunaan Inhaler Dikuasai:</strong> {{ !empty($therapy->checklist_inhaler) ? implode(', ', $therapy->checklist_inhaler) : '-' }}</p>
            <p><strong>Kendala Kepatuhan:</strong> {{ !empty($therapy->kendala_kepatuhan) ? implode(', ', $therapy->kendala_kepatuhan) : '-' }}</p>
            <p><strong>Hari Pemakaian Inhaler/Minggu:</strong> {{ $therapy->hari_pemakaian }} hari</p>
        </div>

        <h2>Layar 3: Pilihan Terapi & Pemahaman</h2>
        <div class="section">
            <p><strong>Pilihan Terapi:</strong> {{ ucfirst($therapy->pilihan_terapi) }}</p>
            <p><strong>Jawaban Fakta/Mitos:</strong> {{ !empty($therapy->jawaban_fakta_mitos) ? implode(', ', $therapy->jawaban_fakta_mitos) : '-' }}</p>
        </div>

        <h2>Layar 4: Tujuan & Kesepakatan</h2>
        <div class="section">
            <p><strong>Prioritas Tujuan:</strong> {{ ucfirst($therapy->prioritas_tujuan) }}</p>
            <p><strong>Dukungan dari Pendamping:</strong> {{ $therapy->dukungan_pendamping ?? '-' }}</p>
            <p><strong>Kesepakatan Tindakan:</strong> {{ !empty($therapy->kesepakatan_tindakan) ? implode(', ', $therapy->kesepakatan_tindakan) : '-' }}</p>
        </div>

        <h2>Layar 5: Keputusan Akhir</h2>
        <div class="section">
            <p><strong>Harapan Pasien:</strong> {{ ucfirst($therapy->harapan_pasien) }}</p>
            <p><strong>Dukungan Baru dari Pendamping:</strong> {{ $therapy->dukungan_pendamping_baru ?? '-' }}</p>
            <p><strong>Rencana Bertahap:</strong> {{ !empty($therapy->rencana_bertahap) ? implode(', ', $therapy->rencana_bertahap) : '-' }}</p>
            <p><strong>Paham Manfaat Pilihan:</strong> {{ $therapy->paham_manfaat ?? '-' }}</p>
            <p><strong>Merasa Pilihan Paling Tepat:</strong> {{ $therapy->pilihan_tepat ?? '-' }}</p>
            <p><strong>Dukungan Keluarga/Teman Cukup:</strong> {{ $therapy->dukungan_cukup ?? '-' }}</p>
            <p><strong>Yakin dengan Keputusan:</strong> {{ $therapy->yakin_keputusan ?? '-' }}</p>
        </div>
    </div>

    <div class="footer">
        Laporan ini dibuat secara otomatis oleh sistem Sahabat Nafas.
    </div>
</body>
</html>