<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pacientes;
use Illuminate\Support\Carbon;

class admRecepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total=pacientes::count();
        $paHombre=pacientes::where('pa_sexo','M')->count();
        $paMujer=pacientes::where('pa_sexo','F')->count();
        $sinSexo=pacientes::count()-$paMujer-$paHombre;

        $paH=round (floatval(($paHombre*100)/$total),2);
        $paM=round (floatval(($paMujer*100)/$total),2);
        $paS=round (floatval(($sinSexo*100)/$total),2);
        $año=Carbon::now()->format('Y');
        $edad1=pacientes::whereYear('pa_fechnac','<',$año)->count();
        $edad2=pacientes::whereYear('pa_fechnac','<',$año-25)->count();
        $edad3=pacientes::whereYear('pa_fechnac','<',$año-50)->count();

        $edad1=($edad2+$edad3)-$edad1;
        $edad2=$edad2-$edad3;
        $edad3=$edad3;
        $edadTotal=$edad1+$edad2+$edad3;
        
        $edad1P=round (floatval($edad1*100/$edadTotal),2);
        $edad2P=round (floatval($edad2*100/$edadTotal),2);
        $edad3P=round (floatval($edad3*100/$edadTotal),2);
        

        return view('viewAdm.admRecepHome')
        ->with("total",$total)
        ->with("HomTotal",$paHombre)
        ->with("MujTotal",$paMujer)
        ->with("sinSex",$sinSexo)
        ->with("HomPor",$paH)
        ->with("MujPor",$paM)
        ->with("sinSexo",$paS)
        ->with("edad1",$edad1)
        ->with("edad2",$edad2)
        ->with("edad3",$edad3)
        ->with("edad1P",$edad1P)
        ->with("edad2P",$edad2P)
        ->with("edad3P",$edad3P);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    
    public function uno(){
        $total=pacientes::count();
        $paHombre=pacientes::where('pa_sexo','M')->count();
        $paMujer=pacientes::where('pa_sexo','F')->count();
        $sinSexo=pacientes::count()-$paMujer-$paHombre;

        $paH=round (floatval(($paHombre*100)/$total),2);
        $paM=round (floatval(($paMujer*100)/$total),2);
        $paS=round (floatval(($sinSexo*100)/$total),2);


        $array=['Total'=>$total,
                'TotalHombre'=>$paHombre,
                'TotalMujer'=>$paMujer,    
                'TotalSinSexo'=>$sinSexo,
                'porcentajeHombre'=>$paH,   
                'porcentajeMujer'=>$paM,
                'porcentajeSinSexo'=>$paS];
        $array1=['1'=>$array,'2'=>$array];
        return $array;

    }
}
