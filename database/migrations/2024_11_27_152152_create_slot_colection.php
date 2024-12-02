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
        Schema::create('slot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subzona_id');
            $table->integer('nomor_slot');
            $table->enum('keterangan', ['Terisi', 'Tersedia', 'Perbaikan'])->default('Tersedia');
            $table->timestamps();
    
            $table->foreign('subzona_id')->references('id')->on('subzona')->onDelete('cascade');
            $table->unique(['subzona_id', 'nomor_slot']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot');
    }
};
