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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id('id_organisasi');
            $table->string('nama_organisasi',30);
            $table->string('ketua');
            $table->foreign('ketua')->references('nik')->on('wargas');
            $table->string('wakil');
            $table->foreign('wakil')->references('nik')->on('wargas');
            $table->integer('jumlah_anggota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
