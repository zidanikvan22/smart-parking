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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('jenis_kendaraan', ['mobil' , 'motor']);
            $table->string('qr_code');
            $table->string('no_plat');
            $table->string('foto_profile');
            $table->string('kata_sandi');
            $table->enum('role', ['admin', 'pengguna']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
