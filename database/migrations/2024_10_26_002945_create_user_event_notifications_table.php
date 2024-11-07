<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('user_event_notifications', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained('acaras','user_id')->onDelete('cascade');
    //         $table->foreignId('acara_id')->constrained('acaras','id_acara')->onDelete('cascade');
    //         $table->boolean('is_read')->default(false); // False by default, meaning the event is new
    //         $table->timestamps();
    //     });

    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_event_notifications');
    }
};
