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
        Schema::create('incomes', function (Blueprint $table) {
            $table->date('date');
            $table->id('income_id');
            $table->string('income_name');
            $table->enum('income_type', ['Iuran Warga', 'Sumbangan', 'Usaha RW', 'Bantuan Pemerintah']);
            $table->integer('inflow');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
