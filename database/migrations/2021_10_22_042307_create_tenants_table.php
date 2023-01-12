<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('transaction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('tipo_de_persona');
            $table->string('rfc', 13);
            $table->date('fecha_de_nacimiento');
            $table->string('estado_civil');
            $table->string('ingresos_netos');
            $table->string('identificacion_oficial');
            $table->string('calle');
            $table->string('num_exterior');
            $table->string('num_interior')->nullable();
            $table->string('colonia');
            $table->string('delegacion_alcaldia');
            $table->string('estado');
            $table->string('code_postal', 20);
            $table->string('institucion_educativa');
            $table->string('historial_crediticio');
            $table->string('tarjeta', 4)->nullable();
            $table->string('trabajo');
            $table->string('empresa')->nullable();
            $table->string('actividad_empresa')->nullable();
            $table->string('cantidad_mascotas')->nullable();
            $table->json('documentacion');
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
        Schema::dropIfExists('tenants');
    }
}
