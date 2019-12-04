<?php

namespace App\Http\Controllers;

use App\usuFalta;
use Illuminate\Http\Request;

class UsuFaltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newFalta=usuFalta();
        
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
     * @param  \App\usuFalta  $usuFalta
     * @return \Illuminate\Http\Response
     */
    public function show(usuFalta $usuFalta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuFalta  $usuFalta
     * @return \Illuminate\Http\Response
     */
    public function edit(usuFalta $usuFalta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuFalta  $usuFalta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuFalta $usuFalta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuFalta  $usuFalta
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuFalta $usuFalta)
    {
        //
    }
}
