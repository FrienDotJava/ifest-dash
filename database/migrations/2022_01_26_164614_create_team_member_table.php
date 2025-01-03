<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member', function (Blueprint $table) {
            $table->id();
            $table->string('id_event');
            $table->string('team_id', 255);
            $table->string('nama_anggota', 255);
            $table->string('no_iden', 100);
            $table->string('email');
            $table->string('asal_ins', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp', 13);
            $table->string('id_line');
            $table->string('instagram');
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('team_member');
    }
}
