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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('laporan_id');
            $table->string('pengirim');
            $table->foreign('pengirim')->references('nik')->on('wargas');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->enum('status',['Selesai','Belum Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};