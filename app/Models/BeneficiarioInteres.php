<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiarioInteres extends Model
{
    use HasFactory;
    protected $table = 'beneficiario_interes';

    protected $fillable = [
        'dni_beneficiario',
        'enfermedades',
        'alergias',
        'medicacion_manana',
        'medicacion_tarde',
        'medicacion_noche'
    ];
    public function beneficiario()
    {
        return $this->belongsTo(Gestion::class, 'dni_beneficiario', 'dni');
    }
}
