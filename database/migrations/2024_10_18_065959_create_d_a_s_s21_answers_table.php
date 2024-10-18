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
        Schema::create('tr_dass21', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_id')->constrained('hasils')->onDelete('cascade');
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('q1');
            $table->integer('q2');
            $table->integer('q3');
            $table->integer('q4');
            $table->integer('q5');
            $table->integer('q6');
            $table->integer('q7');
            $table->integer('q8');
            $table->integer('q9');
            $table->integer('q10');
            $table->integer('q11');
            $table->integer('q12');
            $table->integer('q13');
            $table->integer('q14');
            $table->integer('q15');
            $table->integer('q16');
            $table->integer('q17');
            $table->integer('q18');
            $table->integer('q19');
            $table->integer('q20');
            $table->integer('q21');
            $table->integer('depresi');
            $table->integer('kecemasan');
            $table->integer('stress');
            $table->string('keterangan_kecemasan');
            $table->string('keterangan_stress');
            $table->string('keterangan_depresi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_dass21');
    }
};
