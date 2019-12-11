<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\atencion;
use App\usuContrato;
use App\userDatosInst;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

// use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class empleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        return view('viewRRHH.viewEmp.viewEmp');
        /*return User::where('id','0')->firstOr(function (){
            return"hola";
        });*/
    }
    function showEmpTodos()
    {
        // return User::orderBy('created_at','desc')->get();
        return User::select('usu_nombre','usu_appaterno','usu_apmaterno','usu_area','usu_ci','users.created_at','users.id')
            ->join('usu_contratos as cot','users.id','cot.cod_usu')
            ->addSelect('cot.uc_area')
            ->join('user_datos_insts as udi','users.id','udi.cod_usu')
            ->addSelect('udi.di_profecion')->orderBy('created_at','desc')->get();

        
    }
    function showDatosEmp($id)
    {
       return User::where('users.id',$id)
        ->join('user_datos_insts as udi','users.id','udi.cod_usu')
        ->join('usu_contratos as uc','users.id','uc.cod_usu')
        ->select('udi.di_titulo','udi.di_profecion','udi.di_especialidad','udi.di_seguroNombre','udi.di_seguroNua','udi.di_seguroCns')
        ->addSelect('users.*')
        ->first();
    }
    function segun()
    {
        //    return User::join('atencion','atencion.usu_ci','users.usu_ci')->paginate(25);
        return User::Usuarios()->paginate(50);
    }
    function revCiEmail(Request $request)
    {
        $revCI = User::where('usu_ci', $request->input('ci'))->first();
        $revEmail = User::where('email', $request->input('email'))->first();
        if ($request->input('email') == null) {
            $revEmail = null;
        }
        if ($revCI != null) {
            return "ciYaExistente";
        }
        if ($revEmail != null) {
            return "emailYaExistente";
        }
        return "true";
    }
    function createUser(Request $request)
    {
        // return $request;
        $revCI = User::where('usu_ci', $request->input('ci'))->first();
        if ($revCI != null) {
            return "ciYaExistente";
        }
        $revEmail = User::where('email', $request->input('email'))->first();
        if ($request->input('email') == null) {
            $revEmail = null;
        }
        if ($revEmail != null) {
            return "emailYaExistente";
        }
        //    se registrara al usuario
        $newUser = new User;

        $newUser->usu_ci = $request->input('ci');
        $newUser->email = $request->input('email');
        $newUser->password = bcrypt('12345');
        $newUser->usu_nombre = $request->input('nombre');
        $newUser->usu_appaterno = $request->input('apellido1');
        $newUser->usu_apmaterno = $request->input('apellido2');
        $newUser->usu_sexo = $request->input('sexo');
        $newUser->usu_fechnac = $request->input('fechaNacimiento');
        $newUser->usu_paisnac = $request->input('paisNacimiento');
        $newUser->usu_depnac = $request->input('depNacimiento');
        $newUser->usu_estadocivil = $request->input('estadoCivil');
        $newUser->usu_telf = $request->input('telf');
        $newUser->usu_telfref = $request->input('telfRef');
        $newUser->usu_zona = $request->input('zona');
        $newUser->usu_domicilio = $request->input('domicilio');
        $newUser->usu_zonaSufragio = $request->input('zonaSufragio');
        $newUser->usu_tipoSangre = $request->input('tipoSangre');
        /*datos2 */
        $newUser->usu_cod = Auth::user()->usu_ci;
        $newUser->usu_acceso = $request->input('accesoSistema');
        $newUser->usu_area = $request->input('accModSis');
        $resp = $newUser->save();
        $idNewuser = $newUser->id;
        if ($resp) {
            $nub = new userDatosInst();
            $nub->cod_usu = $idNewuser;
            $nub->di_titulo = $request->input('tituloOB');
            $nub->di_profecion = $request->input('profecionOB');
            $nub->di_especialidad = "";
            $nub->di_seguroNombre = $request->input('seguroNombreInstitucion');
            $nub->di_seguroNua = $request->input('numNua');
            $nub->di_seguroCns = $request->input('numCNS');
            $nub->ca_usu_cod = Auth::user()->usu_ci;
            $nub->ca_tipo = "create";
            $nub->ca_fecha = Carbon::now()->format('Y-m-d');
            $nub->ca_estado = 1;
            $resp1 = $nub->save();
            if ($resp1) {
                $nuC = new usuContrato();
                $nuC->cod_usu = $idNewuser;
                $nuC->uc_fechaInicio = $request->input('fechaContratacion');
                $nuC->uc_tipoContrato = $request->input('contrato');
                $nuC->uc_estado = 1;
                $nuC->uc_area = $request->input('areaDesignada');
                $nuC->uc_cargoDesignado = $request->input('cargo');
                $nuC->ca_usu_cod = Auth::user()->usu_ci;
                $nuC->ca_tipo = 'create';
                $nuC->ca_fecha = Carbon::now()->format('Y-m-d');
                $nuC->ca_estado = 1;
                $resp2 = $nuC->save();
                if ($resp2) {
                    return "succes";
                }
            }
        } else {
            return "false";
        }
    }
}
