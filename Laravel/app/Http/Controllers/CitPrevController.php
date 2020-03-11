<?php

namespace App\Http\Controllers;

use App\citPrev;
use App\especialidad;
use App\pacientes;
use App\personalSalud;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CitPrevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function infoPaci(Request $request)
    {
        $especialidad=especialidad::orderBy('nombre')->get();
        $medico=personalSalud::select('id','ps_appaterno','ps_apmaterno','ps_nombre')->orderBy('ps_appaterno')->get();
        $pacientes= pacientes::where('pa_id',$request->input('id'))->first();
        $date=Carbon::now()->addDays(1)->format('Y-m-d');
        $data=['esp'=>$especialidad,'med'=>$medico,'pac'=>$pacientes,'date'=>$date];
        return $data;
    }
    public function create(Request $request)
    {
        $cp= new citPrev();
        $cp->cp_paciente= $request->input('');
        $cp->cp_especialidad= $request->input('');
        $cp->cp_procedimiento= $request->input('');
        $cp->cp_med = $request->input('');
        $cp->cp_turno= $request->input('');
        $cp->cp_num_ticked= $request->input('');
        $cp->cp_fecha= $request->input('');
        $cp->cp_time= $request->input('');
    }
}
