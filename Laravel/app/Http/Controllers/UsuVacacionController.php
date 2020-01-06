<?php

namespace App\Http\Controllers;

use App\User;
use App\usuContrato;
use App\usuVacacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsuVacacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $dato = array();
        $diasV = 0;
        $fechaCotrato = usuContrato::where('cod_usu', $id)
            ->where('uc_nroContrato', usuContrato::where('cod_usu', $id)->max('uc_nroContrato'))->value('uc_fechaInicio');
        $fechaCon = Carbon::parse($fechaCotrato);
        $fechaCon = $fechaCon->format('d-m-Y');


        $fechaCotrato = Carbon::parse($fechaCotrato);
        $añoContrato = $fechaCotrato->format('Y');
        $fechaActual = Carbon::now();
        $AñosTrabajados = $fechaCotrato->diffInYears($fechaActual);

        for ($i = 1; $i <= $AñosTrabajados+1; $i++) {
            $a = ["a" => $fechaCon, "b" => $diasV];
            $añoContrato += 1;
            array_push($dato, $a);
            $fechaCon = Carbon::parse($fechaCon)->addYear()->format('d-m-Y');
            $diasV=15;
            if ($i == 4) {
                $diasV = 20;
            } else if ($i == 11) {
                $diasV = 30;
            }
        }
        $dat = array(['años' => $dato, 'dias' => $diasV]);

        return $dat;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuVacacion  $usuVacacion
     * @return \Illuminate\Http\Response
     */
    public function show(usuVacacion $usuVacacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuVacacion  $usuVacacion
     * @return \Illuminate\Http\Response
     */
    public function edit(usuVacacion $usuVacacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuVacacion  $usuVacacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuVacacion $usuVacacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuVacacion  $usuVacacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuVacacion $usuVacacion)
    {
        //
    }
}
