<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            if (!Schema::hasColumn('therapy_histories', 'perawat_notes')) {
                $table->text('perawat_notes')->nullable()->after('paspor_keputusan');
            }
        });
    }

    public function down()
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            if (Schema::hasColumn('therapy_histories', 'perawat_notes')) {
                $table->dropColumn('perawat_notes');
            }
        });
    }
};