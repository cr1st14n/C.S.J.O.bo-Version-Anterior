<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\atencion;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class empleadoController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }
    function index(){
        return view('viewRRHH.viewEmp.viewEmp');
        /*return User::where('id','0')->firstOr(function (){
            return"hola";
        });*/
    }
    function showEmpTodos(){
        return User::get();
    }
    function showDatosEmp($id){
        return User::where('id',$id)->first();
    }
    function segun()
    {
//        return User::join('atencion','atencion.usu_ci','users.usu_ci')->paginate(25);
        return User::Usuarios()->paginate(50);
    }
    function createUser(Request $request){
        return $request;
        $newUser=new User;
        $newUser->usu_ci=$request->input('ci');
        $newUser->email="";
        $newUser->password=12345;
        $newUser->usu_nombre=$request->input('nombre');
        $newUser->usu_appaterno=$request->input('apellido1');
        $newUser->usu_apmaterno=$request->input('apellido2');
        $newUser->usu_sexo=$request->input('sexo');
        $newUser->usu_telf=$request->input('telf');
        $newUser->usu_telfref=$request->input('telfRef');
        $newUser->usu_zona=$request->input('zona');
        $newUser->usu_domicilio=$request->input('domicilio');
        $newUser->usu_fechnac=$request->input('fechaNacimiento');
        /*datos2 */
        $newUser->usu_area=$request->input('area');
        $newUser->usu_especialidad=$request->input('');
        $newUser->save();
        return " tengo que aprender";
    }
}
