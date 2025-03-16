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
        'email',
        'email_users',
        'quien_llama',
        'beneficiario',
        'fecha',
        'hora',
        'duracion',
        'tipo_llamada',
        'observaciones',
        'archivo',
    ];
}
