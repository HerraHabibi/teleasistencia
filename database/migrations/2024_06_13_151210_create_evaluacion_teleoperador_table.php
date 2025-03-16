<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('evaluacion_teleoperador', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('email_usuario', 100);
            $table->foreign('email_usuario')->references('email')->on('users')
            ->onDelete('cascade');
            $table->string('email_teleoperador', 100);
            $table->foreign('email_teleoperador')->references('email')->on('users')
            ->onDelete('cascade');
            $table->integer('bienvenida');
            $table->integer('contenido');
            $table->integer('comunicacion');
            $table->integer('despedida');
            $table->text('observaciones')->nullable();
            $table->integer('media');
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
        Schema::dropIfExists('evaluacion_teleoperador');
    }
};
