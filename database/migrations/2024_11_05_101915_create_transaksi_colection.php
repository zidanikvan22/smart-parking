<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_slot')->nullable();
            $table->timestamp('waktu_masuk')->useCurrent();
            $table->timestamp('waktu_keluar')->nullable();
            $table->enum('status_transaksi', ['aktif', 'selesai', 'gagal']);
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            $table->foreign('id_slot')->references('id_slot')->on('slot')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
