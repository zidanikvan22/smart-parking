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
        Schema::create('subzona', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zona_id');
            $table->string('nama_subzona')->unique();
            $table->string('foto');
            $table->timestamps();
    
            $table->foreign('zona_id')->references('id')->on('zona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subzona');
    }
};
