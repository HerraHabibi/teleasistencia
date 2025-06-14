<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionTeleoperador extends Model
{
    protected $table = 'evaluacion_teleoperador';

    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'email_usuario',
        'nombre_usuario',
        'email_teleoperador',
        'nombre_teleoperador',
        'bienvenida',
        'contenido',
        'comunicacion',
        'despedida',
        'observaciones',
        'media',
    ];
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'email_usuario', 'email');
    }

    public function teleoperador()
    {
        return $this->belongsTo(User::class, 'email_teleoperador', 'email');
    }
}
