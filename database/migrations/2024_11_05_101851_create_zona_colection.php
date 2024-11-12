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
        Schema::create('zona', function (Blueprint $table) {
            $table->id('id_area');
            $table->unsignedBigInteger('id_transaksi')->nullable();
            $table->string('zona_parkir');
            $table->date('hari');
            $table->integer('total_kendaraan');
            $table->time('jam_sibuk');
            $table->timestamps();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zona');
    }
};
