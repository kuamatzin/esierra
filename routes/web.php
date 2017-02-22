<?php

use App\Cabana;
use App\Mail\NuevaReservacionEmail;
use App\Mail\ReservacionEmail;
use App\Reservacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'PageController@index');

Route::get('/disponibilidad', function(){
    $llegada = Carbon::createFromFormat('m/d/Y H:i:s',Input::get('llegada') . '00:00:00');
    $salida = Carbon::createFromFormat('m/d/Y H:i:s',Input::get('salida') . '00:00:00');
    $cabana_type = Input::get('cabana_type');

    $num_cabanas = Cabana::where('tipo', $cabana_type)->count();

    $reservaciones = Reservacion::whereBetween('fecha_llegada', [$llegada, $salida])->orWhereBetween('fecha_salida', [$llegada, $salida])->get();
    
    $disponibilidad = sizeof($reservaciones) > $num_cabanas ? false : true;

    return response()->json($disponibilidad, 200);
});

Route::post('/reservar', function(Request $request){
    $llegada = Carbon::createFromFormat('m/d/Y H:i:s', $request->fecha_llegada . '00:00:00');
    $salida = Carbon::createFromFormat('m/d/Y H:i:s', $request->fecha_salida . '00:00:00');
    $request['fecha_llegada'] = $llegada;
    $request['fecha_salida'] = $salida;

    Reservacion::create($request->all());

    //Send email to administrator
    Mail::to('kuamatzin@gmail.com')->send(new NuevaReservacionEmail($request->all()));

    //Send email to contact
    Mail::to($request->email)->send(new ReservacionEmail($request->all()));

    return response()->json(true, 200);
});

Route::post('/reservar/{id}/edit', function(Request $request){
    $reservacion = Reservacion::findOrFail($request->id);
    $reservacion->anticipo = $request->anticipo;
    $reservacion->save();

    return redirect()->back();
});

Route::delete('/reservar', function(Request $request){
    Reservacion::destroy($request->id);

    return redirect('admin');
});

Route::get('/admin', 'AdminController@index');

Route::post('/admin/registrar_cabana', 'AdminController@registrar_cabana');

Auth::routes();

Route::get('/home', 'HomeController@index');
