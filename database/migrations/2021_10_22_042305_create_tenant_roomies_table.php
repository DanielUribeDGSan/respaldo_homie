<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantRoomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_roomies', function (Blueprint $table) {
            $table->id();
            $table->string('transaction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('compartira_renta');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('identificacion_oficial')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            $table->string('rfc')->nullable();
            $table->string('calle')->nullable();
            $table->string('num_exterior')->nullable();
            $table->string('num_interior')->nullable();
            $table->string('colonia')->nullable();
            $table->string('delegacion_alcaldia')->nullable();
            $table->string('estado')->nullable();
            $table->string('code_postal', 20)->nullable();
            $table->json('documentacion')->nullable();
            $table->string('historial_crediticio')->nullable();
            $table->string('tarjeta', 4)->nullable();


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
        Schema::dropIfExists('tenant_roomies');
    }
}
