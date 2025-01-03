<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPerioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_perio', function (Blueprint $table) {
            $table->id();
            $table->string('event_code');
            $table->string('event_name');
            $table->text('description');
            $table->string('price');
            $table->string('task_event_code');
            $table->enum('event_type', ['Tim', 'Solo']);
            $table->Integer('max_member')->nullable();
            $table->datetime('start_regis');
            $table->datetime('close_regis');
            $table->string('image_event');
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
        Schema::dropIfExists('event_perio');
    }
}
