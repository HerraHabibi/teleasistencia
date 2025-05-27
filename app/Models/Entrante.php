<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrante extends Model
{
    protected $table = 'registro_llamadas_entrantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_users',
        'dni_beneficiario',
        'hora_inicio',
        'hora_fin',
        'tipo_llamada',
        'nivel_activacion',
        'observaciones',
        'archivo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email_users', 'email');
    }
}
