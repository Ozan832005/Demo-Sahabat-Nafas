<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('therapy_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->string('therapy_type');
            $table->integer('duration');
            $table->text('notes')->nullable();
            $table->string('status')->default('selesai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('therapy_histories');
    }
};