<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'beneficiarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'num_seguridad_social',
        'sexo',
        'estado_civil',
        'tipo_beneficiario',
        'direccion',
        'codigo_postal',
        'localidad',
        'provincia',
        'email',
        'mayor65',
        'discapacidad',
        'situacion_familiar',
        'situacion_sanitaria',
        'observaciones'
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'dni_beneficiario', 'dni');
    }
}
