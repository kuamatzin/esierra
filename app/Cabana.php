<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabana extends Model
{
    protected $table = 'cabanas';

    protected $fillable = ['nombre', 'ubicacion', 'tipo', 'disponibilidad', 'tipo'];

    public function getTipoAttribute($value)
    {
        switch ($value) {
            case '1':
                return "1 habitación";
                break;
            case '2':
                return "2 habitaciones";
                break;
            case '3':
                return "3 habitaciones";
                break;
            case '4':
                return "Temazcal";
                break;
            default:
                return "Entrada a la sierra";
                break;
        }
    }

    public function getDisponibilidadAttribute($value)
    {
        return (!$value) ? "Disponible" : "No Disponible";
    }
}
