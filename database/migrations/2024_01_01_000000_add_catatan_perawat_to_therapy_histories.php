<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->text('catatan_perawat')->nullable();
            $table->boolean('is_read')->default(false);
        });
    }

    public function down()
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->dropColumn(['catatan_perawat', 'is_read']);
        });
    }
};