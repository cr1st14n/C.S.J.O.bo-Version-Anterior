<?php

namespace App\Http\Controllers;

use App\descargoItem;
use App\descargosQE;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DescargosMedController extends Controller
{
    public function home()
    {
        $items=descargoItem::get();
        return view('descargosMedicos.home',compact('items'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=descargoItem::orderBy('created_at','desc')->get();
        return $items;
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
        $item=new descargoItem();
        $item->dmi_nombre=$request->input('nombreItem');
        $item->dmi_tipo=$request->input('tipoItem');
        $item->ca_usu_cod=Auth::user()->usu_ci;
        $item->ca_tipo='create';
        $item->ca_fecha=Carbon::now();
        $item->ca_estado=1;
        $res= $item->save();
        if ($res) {
            return 1;
        } else {
            return 0;
        }
        
        // return $res;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
