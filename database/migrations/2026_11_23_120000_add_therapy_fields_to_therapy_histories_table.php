<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->string('nama_pasien')->nullable()->after('layer');
            $table->integer('usia')->nullable()->after('nama_pasien');
            $table->integer('riwayat_kambuh')->nullable()->after('usia');
            $table->integer('skala_mmrc')->nullable()->after('riwayat_kambuh');
            $table->string('pendamping')->nullable()->after('skala_mmrc');
            $table->string('jenis_inhaler')->nullable()->after('pendamping');
            $table->json('checklist_inhaler')->nullable()->after('jenis_inhaler');
            $table->integer('hari_pemakaian')->nullable()->after('checklist_inhaler');
            $table->json('kendala_kepatuhan')->nullable()->after('hari_pemakaian');
            $table->integer('pilihan_terapi')->nullable()->after('kendala_kepatuhan');
            $table->json('jawaban_fakta_mitos')->nullable()->after('pilihan_terapi');
            $table->integer('prioritas_tujuan')->nullable()->after('jawaban_fakta_mitos');
            $table->text('dukungan_pendamping')->nullable()->after('prioritas_tujuan');
            $table->json('kesepakatan_tindakan')->nullable()->after('dukungan_pendamping');
            $table->json('jawaban_sure')->nullable()->after('kesepakatan_tindakan');
            $table->integer('skor_sure')->nullable()->after('jawaban_sure');
            $table->text('paspor_keputusan')->nullable()->after('skor_sure');
        });
    }

    public function down(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->dropColumn([
                'nama_pasien',
                'usia',
                'riwayat_kambuh',
                'skala_mmrc',
                'pendamping',
                'jenis_inhaler',
                'checklist_inhaler',
                'hari_pemakaian',
                'kendala_kepatuhan',
                'pilihan_terapi',
                'jawaban_fakta_mitos',
                'prioritas_tujuan',
                'dukungan_pendamping',
                'kesepakatan_tindakan',
                'jawaban_sure',
                'skor_sure',
                'paspor_keputusan'
            ]);
        });
    }
};