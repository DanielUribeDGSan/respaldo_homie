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
            $table->string('type');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('password')->nullable();
            $table->string('pass_temp')->nullable();
            $table->integer('fase')->default(0);
            $table->string('transaction')->nullable();
            $table->string('referred_id')->unique()->nullable();
            $table->string('referred_guest')->nullable();
            $table->string('nombre_inmobiliaria')->nullable();
            $table->string('ganancia')->default('$0 MXN');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
