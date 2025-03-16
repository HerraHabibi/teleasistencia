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
        Schema::create('beneficiario_interes', function (Blueprint $table) {
            $table->id();
            $table->string('dni_beneficiario', 9);
            $table->foreign('dni_beneficiario')->references('dni')->on('beneficiarios')
            ->onDelete('cascade');
            $table->string('enfermedades')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicacion_manana')->nullable();
            $table->string('medicacion_tarde')->nullable();
            $table->string('medicacion_noche')->nullable();
            $table->time('hora_preferente_manana')->default('08:00');
            $table->time('hora_preferente_tarde')->default('15:00');
            $table->time('hora_preferente_noche')->default('21:00');
            $table->enum('ambulatorio', ['Si', 'No']);
            $table->enum('ambulancia', ['Si', 'No']);
            $table->enum('policia', ['Si', 'No']);
            $table->enum('bomberos', ['Si', 'No']);
            $table->enum('urgencias', ['Si', 'No']);
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
        Schema::dropIfExists('beneficiario_interes');
    }
};
