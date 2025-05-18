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
        'situacion_familiar',
        'situacion_sanitaria',
        'observaciones',
        'situacion_de_la_vivienda',
        'situacion_economica',
        'otros_recursos',
        'instalacion_de_terminal',
        'otros_complementos_TAS',
        'dispone_de_teleasistencia_movil',
        'sistema_de_telelocalizacion',
        'custodia_de_llaves'
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'dni_beneficiario', 'dni');
    }
}
