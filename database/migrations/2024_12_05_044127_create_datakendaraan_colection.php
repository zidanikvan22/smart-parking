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
        Schema::create('datakendaraan', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->unsignedBigInteger('id_pengguna');
            $table->enum('jenis_kendaraan1', ['mobil', 'motor']);
            $table->string('no_plat1')->unique();
            $table->string('foto_kendaraan1');
            $table->string('qr_code1')->nullable();
            $table->enum('status1', ['aktif', 'nonAktif', 'ditolak'])->default('nonAktif');
        
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datakendaraan');
    }
};
