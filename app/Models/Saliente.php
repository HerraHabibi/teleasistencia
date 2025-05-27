<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saliente extends Model
{
    protected $table = 'registro_llamadas_salientes';

    protected $fillable = [
        'email',
        'email_users',
        'responde',
        'intentos',
        'quien_coge',
        'beneficiario',
        'fecha',
        'hora',
        'duracion',
        'observaciones',
        'dni_beneficiario',
        'tipo',
        'archivo',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Gestion::class, 'dni_beneficiario', 'dni');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email_users', 'email');
    }
}
