<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = 'reservaciones';

    protected $fillable = ['cabana_id', 'nombre', 'apellidos', 'telefono', 'email', 'fecha_llegada', 'fecha_salida', 'confirmado', 'comentarios', 'procedencia', 'anticipo'];

    protected $dates = ['fecha_llegada', 'fecha_salida'];

    public function cabana()
    {
        return $this->belongsTo(Cabana::class, 'cabana_id');
    }

    public function getFechaLlegadaAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->toFormattedDateString();
    }

    public function getFechaSalidaAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->toFormattedDateString();
    }
}
