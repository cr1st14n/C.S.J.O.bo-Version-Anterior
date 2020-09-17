<?php

namespace App\Http\Controllers;

use App\descargosQE;
use Illuminate\Http\Request;

class DescargosQEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('descargosQE.home');
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
     * @param  \App\descargosQE  $descargosQE
     * @return \Illuminate\Http\Response
     */
    public function show(descargosQE $descargosQE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\descargosQE  $descargosQE
     * @return \Illuminate\Http\Response
     */
    public function edit(descargosQE $descargosQE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\descargosQE  $descargosQE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, descargosQE $descargosQE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\descargosQE  $descargosQE
     * @return \Illuminate\Http\Response
     */
    public function destroy(descargosQE $descargosQE)
    {
        //
    }
}
