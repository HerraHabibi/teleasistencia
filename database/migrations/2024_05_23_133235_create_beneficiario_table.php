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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('apellidos', 255);
            $table->string('dni', 9)->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20)->unique();
            $table->string('num_seguridad_social', 20)->unique();
            $table->string('sexo', 10);
            $table->string('estado_civil', 20);
            $table->string('tipo_beneficiario', 20);
            $table->string('direccion', 255);
            $table->string('codigo_postal', 10);
            $table->string('localidad', 100);
            $table->string('provincia', 100);
            $table->string('email', 100)->unique();
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
        Schema::dropIfExists('beneficiarios');
    }
};
