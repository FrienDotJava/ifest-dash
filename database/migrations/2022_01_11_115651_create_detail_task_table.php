<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_task', function (Blueprint $table) {
            $table->id();
            $table->string('task_id');
            $table->string('event_id');
            $table->string('task_name');
            $table->text('task_description');
            $table->datetime('close_task');
            $table->string('att_pembayaran')->nullable();
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
        Schema::dropIfExists('detail_task');
    }
}
