<?php

namespace App\Http\Controllers;

use App\usuCambioTurno;
use Illuminate\Http\Request;

class UsuCambioTurnoController extends Controller
{
    public function list(Request $request)
    {
        usuCambioTurno::where('id',$request->input('id'))->get();
    }

    public function create(Request $request)
    {
        return $request;
    }

    public function edit(usuCambioTurno $usuCambioTurno)
    {
        //
    }

    public function update(Request $request, usuCambioTurno $usuCambioTurno)
    {
        //
    }

    public function destroy(usuCambioTurno $usuCambioTurno)
    {
        //
    }
}
