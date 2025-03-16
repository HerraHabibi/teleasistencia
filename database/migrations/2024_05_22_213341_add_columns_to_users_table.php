<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('perfil')->default(0)->after('remember_token');
            $table->boolean('verificado')->default(0)->after('remember_token');
            // 0= Usuario 1= Profe
            $table->date('fecha_nacimiento')->unique()->nullable(false)->after('remember_token');
            $table->timestamp('last_login')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_login');
            $table->dropUnique(['fecha_nacimiento']);
            $table->dropColumn('fecha_nacimiento');
        });
    }
};

