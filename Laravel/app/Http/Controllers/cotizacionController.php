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
        $data=cotizacion::where('id',$request->input('id'))
                        ->join('pacientes as pc','pc.pa_id','cotizacions.cot_id_paciente')
                        ->first();
        return view('viewCotizaciones.view1-cotizacion')->with('data',$data);
    }
    public function create(Request $request)
    {
        return $request;
    }
}
