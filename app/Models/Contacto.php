<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'tipo',
        'direccion',
        'codigopostal',
        'localidad',
        'provincia',
        'dni_beneficiario',
        'email',
        'dispone_llave_del_domicilio',
        'observaciones'
    ];
    public function beneficiario()
    {
        return $this->belongsTo(Gestion::class, 'dni_beneficiario', 'dni');
    }
}
