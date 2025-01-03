<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_team', function (Blueprint $table) {
            $table->id();
            $table->string('id_event');
            $table->string('team_id', 255);
            $table->string('team_name', 255);
            $table->string('asal_ins', 255);
            $table->text('alamat_ins');
            $table->string('nama_pendamping', 255);
            $table->string('no_hp', 13);
            $table->integer('owner_id');
            $table->enum('status', ['1','0','bl']);
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
        Schema::dropIfExists('event_team');
    }
}
