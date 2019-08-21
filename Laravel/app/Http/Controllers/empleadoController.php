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
       $this->middleware('auth');
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
    function revCiEmail(Request $request){
        $revCI=User::where('usu_ci',$request->input('ci'))->first();
        $revEmail=User::where('email',$request->input('email'))->first();
        if ($revCI!=null){
            return "ciYaExistente";
        }
        if ($revEmail!=null){
            return "emailYaExistente";
        }
        return "true";
    }
    function createUser(Request $request){
        $revCI=User::where('usu_ci',$request->input('ci'))->first();
        if ($revCI!=null){
            return "ciYaExistente";
        }
        $revEmail=User::where('email',$request->input('email'))->first();
        if ($revEmail!=null){
            return "emailYaExistente";
        }
//        se registrara al usuario
        $newUser=new User;

        $newUser->usu_ci=$request->input('ci');
        $newUser->email=$request->input('email');
        $newUser->password=12345;
        $newUser->usu_nombre=$request->input('nombre');
        $newUser->usu_appaterno=$request->input('apellido1');
        $newUser->usu_apmaterno=$request->input('apellido2');
        $newUser->usu_sexo=$request->input('sexo');
        $newUser->usu_telf=$request->input('telf');
        $newUser->usu_telfref=$request->input('telfRef');
        $newUser->usu_zonaSufragio=$request->input('zonaSufragio');
        $newUser->usu_zona=$request->input('zona');
        $newUser->usu_domicilio=$request->input('domicilio');
        $newUser->usu_fechnac=$request->input('fechaNacimiento');
        $newUser->usu_paisnac=$request->input('lugarNacimiento');
        $newUser->usu_estadocivil=$request->input('estadoCivil');
        $newUser->usu_tipoSangre=$request->input('tipoSangre');
        /*datos2 */
        $newUser->usu_area=$request->input('area');
        $newUser->usu_fechContratacion=$request->input('fechaContratacion');
        $newUser->usu_titulo=$request->input('tituloOb');
        $newUser->usu_profesion=$request->input('profecionOb');
        $newUser->usu_contrato=$request->input('contrato');
        $newUser->usu_cargo=$request->input('cargo');
        $newUser->usu_acceso=$request->input('accesoSistema');
        $newUser->usu_SI=$request->input('seguroNombreInstitucion');
        $newUser->usu_numNua=$request->input('numNua');
        $newUser->usu_numCns=$request->input('numCNS');
        $resp=$newUser->save();
        if ($resp){
            return"true";
        }else{
            return"false";
        }
    }
}
