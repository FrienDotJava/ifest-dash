<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorDarahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_darah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npm')->nullable();
            $table->string('email');
            $table->string('no_hp');
            $table->string('umur');
            $table->string('berat_badan');
            $table->string('golongan_darah');
            $table->text('hal');
            $table->string('hari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donor_darah');
    }
}
