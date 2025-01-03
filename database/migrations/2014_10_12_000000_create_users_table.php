<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('foto')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type', ['superuser', 'staff', 'user'])->default('user');
            $table->string('nomor_id', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('id_line')->nullable();
            $table->string('instagram')->nullable();
            $table->string('no_telpon')->nullable();
            $table->text('alamat')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrat~ions.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
