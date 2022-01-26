<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreSolicitante');
            $table->string('carreraSolicita');
            $table->string('nombreEvento');
            $table->string('nombrePractica');
            $table->string('fecha');
            $table->string('horaInicio');
            $table->string('horaFin');

            //llaves foraneas //IMPORTANTE AGREGAR EL MODERADOR unsigned, SI NO PUEDE GENERAR UN ERROR
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('laboratory_id')->unsigned();

            $table->timestamps();

            //ESTABLECER LAS LLAVES FORANEAS, AGREGAR...aca de hace la referencia con otra tabla
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('laboratory_id')->references('id')->on('laboratorios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
