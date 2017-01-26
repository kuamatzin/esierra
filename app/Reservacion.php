<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = 'reservaciones';

    protected $fillable = ['cabana_id', 'nombre', 'apellidos', 'telefono', 'email', 'fecha_llegada', 'fecha_salida', 'confirmado', 'comentarios', 'procedencia'];

    protected $dates = ['fecha_llegada', 'fecha_salida'];


    public function cabana()
    {
        return $this->belongsTo(Cabana::class, 'cabana_id');
    }

    
}
