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
        $cp->cp_paciente= $request->input('ip_Pa');
        $cp->cp_especialidad= $request->input('especialidad');
        $cp->cp_procedimiento= $request->input('procedimiento');
        $cp->cp_med = $request->input('medico');
        $cp->cp_num_ticked= $request->input('nroTicked');
        $cp->cp_turno= $request->input('turno');
        $cp->cp_fecha= $request->input('fecha');
        $cp->cp_time= $request->input('hora');
        $cp->cp_observacion= $request->input('observacion');
        $res=$cp->save();
        if ($res) {
            return 1;
        } else {
            return 0;
        }
        
    }
    public function indexCitasPrevias()
    {
        // return 'hola';
        $fechaActual=Carbon::now()->format('Y-m-d');
        return view('viewRecepcion.homeCitasPrevias')->with('fechActual',$fechaActual);
    }
    public function listCitasPrevias(Request $req)
    {
        if ($req->input('turno')=='Jornal') {
            return citPrev::where('cp_fecha',Carbon::parse($req->input('date')))->select('cp_turno','cp_num_ticked','cp_time')
            ->join('pacientes as pa','pa.pa_id','cit_prevs.cp_paciente')->addSelect('pa_hcl','pa_nombre','pa_appaterno')
            ->join('especialidad as esp','esp.id','cit_prevs.cp_especialidad')->addSelect('esp.nombre')
            ->get();
        } else {
            return citPrev::where('cp_fecha',Carbon::parse($req->input('date')))->select('cp_turno','cp_num_ticked','cp_time')
            ->join('pacientes as pa','pa.pa_id','cit_prevs.cp_paciente')->addSelect('pa_hcl','pa_nombre','pa_appaterno')
            ->join('especialidad as esp','esp.id','cit_prevs.cp_especialidad')->addSelect('esp.nombre')
            ->where('cp_turno',$req->input('turno'))
            ->get();
        }
        
    }
}
