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
            $table->integer('ghq_total')->nullable();
            $table->dateTime('ghq_waktu')->nullable();
            $table->enum('status_pengerjaan', ['selesai', 'belum selesai'])->default('belum selesai');
            $table->enum('last_test', ['ghq12','dass-21', 'hscl-25', 'htq'])->nullable();
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
