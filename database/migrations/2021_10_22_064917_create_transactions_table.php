<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('broker_id')->nullable();
            $table->foreign('broker_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('propietario_id')->nullable();
            // $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('inquilino_id')->nullable();
            $table->foreign('inquilino_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('asesor_llenara_datos')->nullable();
            $table->integer('fase_broker')->nullable();
            $table->integer('fase_inquilino')->nullable();
            $table->integer('fase_propietario')->nullable();
            $table->string('status')->default('Pendiente');
            $table->string('ganancia')->default('$0 MXN');
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
        Schema::dropIfExists('transactions');
    }
}
