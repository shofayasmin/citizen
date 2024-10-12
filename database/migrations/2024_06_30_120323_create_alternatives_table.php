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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rumah_id');
            $table->foreign('rumah_id')->references('rumah_id')->on('rumahs');
            $table->string('name');
            $table->integer('jumlah_usia_produktif');
            $table->double('jumlah_anggota_keluarga');
            $table->integer('jumlah_usia_lanjut');
            $table->integer('kondisi_rumah');
            $table->float('pendapatan_total', 15, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatives');
    }
};
