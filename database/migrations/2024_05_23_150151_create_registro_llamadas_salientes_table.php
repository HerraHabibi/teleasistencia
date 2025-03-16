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
        Schema::create('registro_llamadas_salientes', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->string('email_users', 100);
            $table->foreign('email_users')->references('email')->on('users')
            ->onDelete('cascade');
            $table->enum('responde', ['Si', 'No']);
            $table->integer('intentos');
            $table->string('quien_coge', 255);
            $table->enum('beneficiario', ['Si', 'No']);
            $table->date('fecha');
            $table->time('hora')->default('00:00:00');
            $table->string('duracion', 10)->default('0m0s');
            $table->text('observaciones')->nullable();
            $table->string('dni_beneficiario', 9);
            $table->enum('tipo', [
                'Llamada saliente rutinaria por la mañana',
                'Llamada saliente rutinaria por la tarde',
                'Llamada saliente rutinaria por la noche',
                'Llamada saliente para recordatorio de cita médica',
                'Llamada saliente para felicitación de cumpleaños'
            ]);

            $table->string('archivo')->nullable();
            $table->timestamps();
            
            $table->foreign('dni_beneficiario')->references('dni')->on('beneficiarios')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_llamadas_salientes');
    }
};
