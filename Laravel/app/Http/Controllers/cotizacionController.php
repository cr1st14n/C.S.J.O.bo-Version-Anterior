<?php

namespace App\Http\Controllers;

use App\cotizacion;
use Illuminate\Http\Request;
use View;

class cotizacionController extends Controller
{
    public function index()
    {
        return View('viewCotizaciones.home');
    }
    public function list1()
    {
       return cotizacion::get();
    }
    public function store1(Request $request)
    {
        return cotizacion::where('id',$request->input('id'))->first();
    }
}
