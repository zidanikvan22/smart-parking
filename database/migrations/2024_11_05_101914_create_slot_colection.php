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
        Schema::create('slot', function (Blueprint $table) {
            $table->id('id_slot');
            $table->unsignedBigInteger('id_area');
            $table->enum('status_slot', ['kosong', 'terisi']);
            $table->timestamps();
            // $table->foreign('id_area')->references('id_area')->on('zona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
};
