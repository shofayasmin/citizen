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
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id('rumah_id');
            $table->string('nik_pemilik');
            $table->foreign('nik_pemilik')->references('nik')->on('wargas');
            $table->text('alamat');
            $table->integer('luas_bangunan');
            $table->integer('luas_tanah');
            $table->integer('jumlah_anggota_kk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahs');
    }
};
