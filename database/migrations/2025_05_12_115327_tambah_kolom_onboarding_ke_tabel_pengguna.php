<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomOnboardingKeTabelPengguna extends Migration
{
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->integer('onboarding_step')->default(0);
            $table->boolean('onboarding_completed')->default(false);
        });
    }

    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn(['onboarding_step', 'onboarding_completed']);
        });
    }
}
