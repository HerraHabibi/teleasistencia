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
        Schema::create('registro_llamadas_entrantes', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->string('email_users', 100);
            $table->foreign('email_users')->references('email')->on('users')
            ->onDelete('cascade');
            $table->string('quien_llama');
            $table->enum('beneficiario', ['Si', 'No']);
            $table->date('fecha');
            $table->time('hora')->default('00:00:00');
            $table->string('duracion', 10)->default('0m0s');
            $table->text('observaciones')->nullable();
            $table->enum('tipo_llamada', [
                'Llamada entrante para conversar',
                'Llamada entrante para obtener información (teléfonos, horarios, direcciones...)',
                'Llamada entrante para pedir cita médica',
                'Llamada entrante para asistencia médica',
                'Llamada entrante por accidente doméstico',
                'Otras llamadas entrantes'
            ]);
            $table->string('archivo')->nullable();
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
        Schema::dropIfExists('registro_llamadas_entrantes');
    }
};
