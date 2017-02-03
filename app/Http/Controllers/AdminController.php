<?php

namespace App\Http\Controllers;

use App\Cabana;
use App\Reservacion;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $cabañas = Cabana::orderBy('tipo')->get();

        $reservaciones = Reservacion::all();

        return view('admin.index', compact('cabañas', 'reservaciones'));
    }

    public function registrar_cabana(Request $request)
    {
        Cabana::create($request->all());

        return redirect('admin');
    }
}
