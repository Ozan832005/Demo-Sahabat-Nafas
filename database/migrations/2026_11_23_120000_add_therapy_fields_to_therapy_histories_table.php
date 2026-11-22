<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            if (!Schema::hasColumn('therapy_histories', 'layer')) {
                $table->integer('layer')->default(1);
            }
            
            $table->string('nama_pasien')->nullable();
            $table->integer('usia')->nullable();
            $table->integer('riwayat_kambuh')->nullable();
            $table->integer('skala_mmrc')->nullable();
            $table->string('pendamping')->nullable();
            $table->string('jenis_inhaler')->nullable();
            $table->json('checklist_inhaler')->nullable();
            $table->integer('hari_pemakaian')->nullable();
            $table->json('kendala_kepatuhan')->nullable();
            $table->integer('pilihan_terapi')->nullable();
            $table->json('jawaban_fakta_mitos')->nullable();
            $table->integer('prioritas_tujuan')->nullable();
            $table->text('dukungan_pendamping')->nullable();
            $table->json('kesepakatan_tindakan')->nullable();
            $table->json('jawaban_sure')->nullable();
            $table->integer('skor_sure')->nullable();
            $table->text('paspor_keputusan')->nullable();
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