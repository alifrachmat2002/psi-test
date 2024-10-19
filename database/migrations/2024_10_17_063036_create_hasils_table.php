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
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status_pengerjaan', ['selesai', 'belum selesai'])->default('belum selesai');
            $table->enum('last_test', ['ghq12','dass-21', 'hscl-25', 'htq'])->nullable();

            // columns for GHQ
            $table->integer('ghq_total')->nullable();
            $table->dateTime('ghq_waktu')->nullable();

            // columns for DASS-21
            $table->integer('dass21_depresi')->nullable();
            $table->integer('dass21_kecemasan')->nullable();
            $table->integer('dass21_stress')->nullable();
            $table->dateTime('dass21_waktu')->nullable();
            
            // columns for HSCL-25
            $table->float('hscl25_kecemasan')->nullable();
            $table->float('hscl25_depresiDSM4')->nullable();
            $table->float('hscl25_total')->nullable();
            $table->dateTime('hscl25_waktu')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasils');
    }
};
