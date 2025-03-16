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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('dni_beneficiario', 9);
            $table->foreign('dni_beneficiario')->references('dni')->on('beneficiarios')
            ->onDelete('cascade');
            $table->string('email', 100)->unique();
            $table->string('nombre', 255);
            $table->string('apellidos', 255);
            $table->string('telefono', 20)->unique();
            $table->string('tipo', 20);
            $table->string('direccion', 255);
            $table->string('codigopostal', 10);
            $table->string('localidad', 100);
            $table->string('provincia', 100);
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
        Schema::dropIfExists('contactos');
    }
};
