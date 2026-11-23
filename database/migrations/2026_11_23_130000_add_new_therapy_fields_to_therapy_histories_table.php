<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            if (!Schema::hasColumn('therapy_histories', 'harapan_pasien')) {
                $table->string('harapan_pasien')->nullable();
            }
            if (!Schema::hasColumn('therapy_histories', 'dukungan_pendamping_baru')) {
                $table->text('dukungan_pendamping_baru')->nullable();
            }
            if (!Schema::hasColumn('therapy_histories', 'rencana_bertahap')) {
                $table->json('rencana_bertahap')->nullable();
            }
            if (!Schema::hasColumn('therapy_histories', 'paham_manfaat')) {
                $table->string('paham_manfaat')->nullable();
            }
            if (!Schema::hasColumn('therapy_histories', 'pilihan_tepat')) {
                $table->string('pilihan_tepat')->nullable();
            }
            if (!Schema::hasColumn('therapy_histories', 'dukungan_cukup')) {
                $table->string('dukungan_cukup')->nullable();
            }
            if (!Schema::hasColumn('therapy_histories', 'yakin_keputusan')) {
                $table->string('yakin_keputusan')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->dropColumn([
                'harapan_pasien',
                'dukungan_pendamping_baru',
                'rencana_bertahap',
                'paham_manfaat',
                'pilihan_tepat',
                'dukungan_cukup',
                'yakin_keputusan'
            ]);
        });
    }
};