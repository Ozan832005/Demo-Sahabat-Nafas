<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->integer('layer')->default(1)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('therapy_histories', function (Blueprint $table) {
            $table->dropColumn('layer');
        });
    }
};