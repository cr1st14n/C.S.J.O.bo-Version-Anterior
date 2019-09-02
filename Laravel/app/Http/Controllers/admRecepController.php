<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pacientes;

class admRecepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewAdm.admRecepHome');
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
