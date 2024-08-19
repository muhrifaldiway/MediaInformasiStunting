<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnosas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petugas_id');
            $table->unsignedBigInteger('masyarakat_id');
            $table->unsignedBigInteger('konsultasi_id');
            $table->text('jawaban');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('petugas_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('masyarakat_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('konsultasi_id')->references('id')->on('konsultasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosas');
    }
};
