<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabana extends Model
{
    protected $table = 'cabanas';

    protected $fillable = ['nombre', 'ubicacion', 'tipo', 'disponibilidad'];

    public function getTipoAttribute($value)
    {
        return "Cabaña $value";
    }

    public function getDisponibilidadAttribute($value)
    {
        return (!$value) ? "Disponible" : "No Disponible";
    }
}
