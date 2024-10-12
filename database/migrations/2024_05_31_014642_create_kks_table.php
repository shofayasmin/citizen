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
        Schema::create('kks', function (Blueprint $table) {
            $table->id('id_kk');
            $table->string('no_kk',30);
            $table->text('alamat');
            $table->string('nik_kepala_keluarga');
            $table->foreign('nik_kepala_keluarga')->references('nik')->on('wargas');
            $table->integer('jumlah_usia_produktif')->default(0);
            $table->integer('jumlah_anggota_kk')->default(0);
            $table->integer('jumlah_usia_lanjut')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kks');
    }
};
