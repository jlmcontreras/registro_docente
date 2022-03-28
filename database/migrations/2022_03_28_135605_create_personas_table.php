<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('documento',24);
            $table->string('apellido', 45);
            $table->string('nombres', 45);
            $table->enum('sexo', array('F','M'));
            $table->date('fecha_nacimiento');
            $table->string('domicilio',255);
            $table->string('localidad',45);
            $table->string('departamento',45);
            $table->string('telefono', 45);
            $table->string('celular', 45);
            $table->string('correo',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
