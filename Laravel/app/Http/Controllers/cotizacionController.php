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
    public function list1(Request $request)
    {
        $date=Carbon::createFromFormat('Y-m-d', $request->input('date_list_cotizaciones'))->format('Y-m-d');
        // return $date;
       return cotizacion::where('cot_estado',0)
       ->join('pacientes as pa','pa.pa_id','cot_id_paciente')
       ->join('users as u','u.id','cotizacions.ca_usu_cod')
       ->select('cotizacions.*','pa.pa_nombre','pa.pa_appaterno','pa.pa_apmaterno','u.usu_nombre','u.usu_appaterno')
       ->whereDate('cotizacions.created_at',$date)
       ->orderBy('created_at','desc')
       ->get();
    }
    public function list2(Request $request)
    {
        $date=Carbon::createFromFormat('Y-m-d', $request->input('date_list_cotizaciones'))->format('Y-m-d');
        // return $date;
        return cotizacion::where('cot_estado',1)
        ->join('pacientes as pa','pa.pa_id','cot_id_paciente')
        ->join('users as u','u.id','cotizacions.ca_usu_cod')
        ->select('cotizacions.*','pa.pa_nombre','pa.pa_appaterno','pa.pa_apmaterno','u.usu_nombre','u.usu_appaterno')
        ->whereDate('cotizacions.created_at',$date)
       ->orderBy('created_at','desc')
       ->get();
    }
    public function store1(Request $request)
    {
        $data=cotizacion::where('id',$request->input('id'))
                        ->join('pacientes as pc','pc.pa_id','cotizacions.cot_id_paciente')
                        ->first();
        if ($data->cot_estado==0) {
            return view('viewCotizaciones.view1-cotizacion')->with('data',$data);
        } else {
            return view('viewCotizaciones.view1-cotizacion_edit')->with('data',$data);
        }
        
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
