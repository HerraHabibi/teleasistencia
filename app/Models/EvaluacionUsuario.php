<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionUsuario extends Model
{
    protected $table = 'evaluacion_usuario';

    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'email_usuario',
        'email_teleoperador',
        'creatividad',
        'satisfaccion_usuario',
        'satisfaccion_teleoperador',
        'teatralizacion',
        'observaciones',
        'media',
    ];

    // Relación con la tabla 'users' para email_usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'email_usuario', 'email');
    }

    // Relación con la tabla 'users' para email_teleoperador
    public function teleoperador()
    {
        return $this->belongsTo(User::class, 'email_teleoperador', 'email');
    }
}
