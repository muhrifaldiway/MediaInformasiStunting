<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('artikel_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->text('isi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
