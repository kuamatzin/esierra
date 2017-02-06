<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        dd("HOLA");
    }

    public function index()
    {
        return view('page.index');
    }
}
