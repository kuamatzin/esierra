<?php

use App\Reservacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::get('/', 'PageController@index');

Route::get('/disponibilidad', function(){
    $llegada = Carbon::createFromFormat('m/d/Y H:i:s',Input::get('llegada') . '00:00:00');
    $salida = Carbon::createFromFormat('m/d/Y H:i:s',Input::get('salida') . '00:00:00');
    $reservaciones = Reservacion::whereBetween('fecha_llegada', [$llegada, $salida])->orWhereBetween('fecha_salida', [$llegada, $salida])->get();
    
    $disponibilidad = sizeof($reservaciones) > 0 ? false : true;

    return response()->json($disponibilidad, 200);
});

Route::post('/reservar', function(Request $request){
    $llegada = Carbon::createFromFormat('m/d/Y H:i:s', $request->fecha_llegada . '00:00:00');
    $salida = Carbon::createFromFormat('m/d/Y H:i:s', $request->fecha_salida . '00:00:00');
    $request['fecha_llegada'] = $llegada;
    $request['fecha_salida'] = $salida;

    Reservacion::create($request->all());

    return response()->json(true, 200);
});

Route::get('/admin', 'AdminController@index');

Route::post('/admin/registrar_cabana', 'AdminController@registrar_cabana');

Auth::routes();

Route::get('/home', 'HomeController@index');
