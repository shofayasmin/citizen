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
        Schema::create('rts', function (Blueprint $table) {
            $table->id('rt_id');
            $table->string('nik_ketua');
            $table->foreign('nik_ketua')->references('nik')->on('wargas');
            $table->string('no_rt',5);
            $table->date('mulai_masa_jabatan');
            $table->date('berakhir_masa_jabatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rts');
    }
};
