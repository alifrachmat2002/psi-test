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
        Schema::create('ref_qghq12', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('pil1');
            $table->string('pil2');
            $table->string('pil3');
            $table->string('pil4');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_qghq12');
    }
};
