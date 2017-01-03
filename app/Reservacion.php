<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = 'reservaciones';

    protected $fillable = ['cabana_id', 'nombre', 'apellidos', 'telefono', 'email', 'fecha_llegada', 'fecha_salida', 'confirmado'];

    protected $dates = ['fecha_llegada', 'fecha_salida'];

    
}
