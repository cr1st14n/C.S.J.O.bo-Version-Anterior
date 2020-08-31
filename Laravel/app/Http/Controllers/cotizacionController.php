<?php

namespace App\Http\Controllers;

use App\cotizacion;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use View;

class cotizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return View('viewCotizaciones.home');
    }
    public function list1()
    {
       return cotizacion::where('cot_estado',0)->orderBy('created_at','desc')->get();
    }
    public function list2()
    {
       return cotizacion::where('cot_estado',1)->orderBy('created_at','desc')->get();
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
        return cotizacion::where('id',$request->id_cotizacion_create)->update([
            'cot_costoProcedimiento'=>$request->input('precio'),
            'cot_fechaCotizacion'=>Carbon::now(),
            'cot_usu_cod_cotiza'=>Auth::user()->usu_ci,
            'cot_estado'=>1,
        ]);
    }
}
