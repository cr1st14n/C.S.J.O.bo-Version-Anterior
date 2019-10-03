@extends('layouts.recHumLay')
@section('head1')
@endsection
@section('refUbi')
<ol class="breadcrumb">
    <li><a href="#">RRHH</a></li>
    <li class="active">Personal</li>
</ol>
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        <h2><strong>Registro</strong> Personal </h2>
    </header>
    <div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
        <button class="btn btn-theme-inverse btn-transparent btn-sm" onclick="showModalCreateUser()"><i class="fa fa-user"></i> Agregar</button>
        <button class="btn btn-theme-inverse btn-transparent btn-sm" onclick="listTodosEmp()"><i class="fa fa-users"></i> listar todos </button>
        <button class="btn btn-theme-inverse btn-transparent btn-sm">listar activos </button>
        <button class="btn btn-theme-inverse btn-transparent btn-sm">listar inactivos </button>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Profesión</th>
                        <th>Cargo</th>
                        <th>Area</th>
                        <th width="22%">Action</th>
                    </tr>
                </thead>
                <tbody align="center" id="tableUser">
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- modal crud User -->
<div id="md-createUser" class="modal fade md-flipHor " tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Datos Personales</h3>
        <h6>(Los campos con * son obligatorios)</h6>
    </div>
    <div class="modal-body">
        <div class="row">
            <form class="form-horizontal" data-collabel="6" data-alignlabel="rigth" id="formuladio1">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">CI*:</label>
                        <div>
                            <input type="number" min="0" class="form-control rounded" placeholder="# de C.I." id="createUserCi" onkeyup="validar('createUserCi')" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nombre*:</label>
                        <div>
                            <input type="text" class="form-control rounded" id="nombre" placeholder="Nombre completo" pattern="[A-Za-z ]+" onkeyup="validar('nombre')" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellidos*:</label>
                        <div>
                            <input type="text" class="form-control rounded" id="apellido1" placeholder="Apellido paterno" pattern="[A-Za-z ]+" onkeyup="validar('apellido1')" required><br>
                            <input type="text" class="form-control rounded" id="apellido2" placeholder="Apellido materno" pattern="[A-Za-z ]+" onkeyup="validar('apellido2')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputTwo">Fecha Nacimiento*:</label>
                        <div>
                            <input type="date" class="form-control rounded" id="fechaNacimiento" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lugar de nacimiento*:</label>
                        <div>
                            <input type="text" class="form-control rounded" id="lugarNacimiento" pattern="[A-Za-z ]+" onkeyup="validar('lugarNacimiento')" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tipo de Sangre:</label>
                        <div>
                            <input type="text" class="form-control rounded" id="tipoSangre" onkeyup="validar('tipoSangre')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sexo</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio1" name="sexo" value="option1" checked>
                                Masculino </label>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio2" name="sexo" value="option2">
                                Femenino </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Correo electronico*</label>
                        <div>
                            <input class="form-control" type="email" id="email" placeholder="nombre@gmail.com" required onkeyup="validar('email')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Estado Civil</label>
                        <div>
                            <select class="form-control" name="" id="estadoCivil" required>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="viudo">Viudo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telf / Cel*</label>
                        <div>
                            <div class="input-icon"> <i class="fa fa-map-marker ico"></i>
                                <input class="form-control " type="text" pattern="[0-9]+" id="telf" maxlength="10" required onkeyup="validar('telf')">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telf / Cel Referencia</label>
                        <div>
                            <div class="input-icon"> <i class="fa fa-user ico"></i>
                                <input class="form-control " type="text" id="telfRef" pattern="[0-9]+" maxlength="10" onkeyup="validar('telfRef')">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Zona donde sufragia*:</label>
                        <div>
                            <div class="input-icon right"> <i class="fa fa-keyboard-o ico "></i>
                                <input class="form-control " type="text" placeholder="Zona Especifica donde sufragia" pattern="[A-Za-z0-9 ]+" id="zonaSufragio" onkeyup="validar('zonaSufragio')" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Zona donde recide*:</label>
                        <div>
                            <div class="input-icon right"> <i class="fa fa-keyboard-o ico "></i>
                                <input class="form-control " type="text" placeholder="Zona Especifica donde recide" pattern="[A-Za-z0-9 ]+" id="zona" onkeyup="validar('zona')" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Domicilio</label>
                        <div>
                            <input class="form-control" type="text" placeholder="Direccion del domicilio" pattern="[A-Za-z0-9 ]+" id="domicilio" onkeyup="validar('domicilio')">
                        </div>
                    </div>
                    <div class="form-group offset">
                        <div>
                            <button type="submit" class="btn btn-theme-inverse">Continuar registro</button>
                            <!-- <button type="button" class="btn btn-theme-inverse" onclick="createUser(1)" >Continuar registro</button> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="md-createUser2" class="modal fade md-flipHor" tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Datos Profecion / institucionales</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <form class="form-horizontal" data-collabel="6" data-alignlabel="right" id="formulario2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Fecha de Contratacion*</label>
                        <div>
                            <input type="date" class="form-control rounded" id="fechaContratacion" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Titulo y Profecion*:</label>
                        <div>
                            <input type="text" class="form-control rounded" id="tituloOb" placeholder="Titulo obtenido" pattern="[A-Za-z ]+" required><br>
                            <input type="text" class="form-control rounded" id="profecionOb" placeholder="Profecion obtenida" pattern="[A-Za-z ]+">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Area Designada:</label>
                        <div>
                            <select class="form-control" name="" id="areaDesignada">
                                <option value="administracion">Administracion</option>
                                <option value="contabilidad">Contabilidad</option>
                                <option value="recepcion">Recepcion</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputTwo">Cargo a designar:</label>
                        <div>
                            <select class="form-control" name="" id="cargo">
                                <option value="encargado">Encargado</option>
                                <option value="operador">Operador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tipo de Contrato:</label>
                        <div>
                            <select class="form-control" name="" id="contrato">
                                <option value="planta">Planta</option>
                                <option value="eventual">Eventual</option>
                                <option value="estudiante">Estudiante (Segun Convenio)</option>
                                <option value="voluntario">Voluntario</option>
                                <option value="otro">Otros</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Acceso al sistema:</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="accesoSis" value="1" checked>
                                Si </label>
                            <label class="radio-inline">
                                <input type="radio" name="accesoSis" value="0">
                                No </label>
                        </div>
                    </div>
                    <hr>
                    <h4>Informacion de la entidad de seguro de corto y largo plazo </h4><br>
                    <div class="form-group">
                        <label class="control-label">Nombre de la institucion:</label>
                        <div>
                            <input type="text" class="form-control rounded" id="seguroNombreInstitucion" pattern="[A-Za-z0-9 ]+" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Numero de NUA:</label>
                        <div>
                            <input type="number" class="form-control rounded" id="numNua" pattern="[0-9]+">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Numero de C.N.S.::</label>
                        <div>
                            <input type="number" class="form-control rounded" id="numCNS" pattern="[0-9]+">
                        </div>
                    </div>
                </div>
                <button class="btn btn-block btn-sm btn-theme-inverse" type="button" onclick="createUser(2)">Concluir Registro</button>
            </form>
        </div>
    </div>
</div>
<!-- modal crud Documentos de usuario -->
<div id="md-DocUser" class="modal fade  " tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Documentos presentados</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
        <p></p>
        <div class="row">
            <form class="form-horizontal" data-collabel="4" data-label="color">
                <div class="form-group">
                    <label class="control-label">Documentos personales</label>
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="iCheck" data-color="green">
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 1</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" checked>
                                        <label>Documento 2</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 3</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 4</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="iCheck" data-color="green">
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 1</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" checked>
                                        <label>Documento 2</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 3</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 4</label>
                                    </li>
                                </ul>
                            </div><!-- //col-sm-6 -->
                        </div><!-- //row-->
                    </div>
                </div><!-- //form-group-->

                <div class="form-group">
                    <label class="control-label">Documentos academicos</label>
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="iCheck" data-style="square" data-color="green">
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 1</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" checked>
                                        <label>Documento 2</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 3</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 4</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="iCheck" data-style="square" data-color="green">
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 1</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" checked>
                                        <label>Documento 2</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 3</label>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <label>Documento 4</label>
                                    </li>
                                </ul>
                            </div><!-- //col-sm-6 -->
                        </div><!-- //row-->
                    </div>
                </div><!-- //form-group-->
            </form>
        </div>
    </div>
    <!-- //modal-body-->
</div>
<!-- modal funciones de registro de vacaciones -->
<div id="md-UserVacaciones" class="modal fade" tabindex="-1" data-width="700">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Registro de vacaciones</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-7">
                <h5>Fecha de contratacion 02-12-2008</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Fecha(s)</th>
                                <th>Dias</th>
                                <th>--//--</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            <tr>
                                <td>10-08-2018 / 15-08-2018</td>
                                <td>5</td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-5">
                <h4>Registrar vaciones del personal <br>
                    Dias disponibles: 20</h4><br>
                <form class="form-horizontal" data-collabel="4" data-alignlabel="left">
                    <div class="form-group">
                        <label for="form" class="control-label col-md-4">Inicio</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form" class="control-label col-md-4">Fin</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </form>
                <button class="btn btn-theme-inverse">Registrar Vacaciones</button>
                <button class="btn btn-theme-inverse btn-transparent"><i class="glyphicon glyphicon-print"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="md-UserVacacionesRegister" class="modal fade" tabindex="-1" data-width="600">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Registrar Vacaciones</h3>
    </div>
    <div class="modal-body">
        <p>aca ira las vacaciones</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success">Registrar</button>
    </div>
</div>
<!-- modal funciones para FALTAS Y PERMISOS -->
<div id="md-UserFalPer" class="modal fade" tabindex="-1" data-width="700">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Registro de Faltas y permisos</h3>
    </div>
    <div class="modal-body">
        <div class="col-lg-6">
            <button class="btn btn-default" onclick="listPermisos()">Permisos</button>
            <button class="btn btn-default" onclick="listFaltas()">Faltas</button>
            <button class="btn btn-default" onclick="listCambioTurno()">Cambios de turno</button>
        </div>
        <div class="col-lg-6" id="sectorBottonFaltasPermisos">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha(s)</th>
                        <th>Dias</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th>--//--</th>
                    </tr>
                </thead>
                <tbody id="listFaltasPermisos">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="md-stack1" class="modal fade" tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Datos del Empleado</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <h3>Datos Personales</h3><br>
                <p id="datosEmp"></p>
                <button type="button" class="btn btn-theme" onclick="showEditDat1User()">Actualizar</button>
            </div>
            <div class="col-lg-6">
                <h3>Datos Institucionales</h3><br>
                <p id="datosInst"></p>
                <button type="button" class="btn btn-theme" onclick="showEditDat2User()">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<div id="md-editDatUser" class="modal fade" tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Datos del Empleado</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <form class="form-horizontal" data-collabel="3" data-alignlabel="left">
                    <div class="form-group">
                        <label class="control-label">CI</label>
                        <div>
                            <input type="text" class="form-control rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido</label>
                        <div>
                            <input type="text" class="form-control rounded"><br>
                            <input type="text" class="form-control rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputTwo">Fecha Nacimiento</label>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sexo</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio1" name="sexo" value="option1" checked>
                                Masculino </label>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio2" name="sexo" value="option2">
                                Femenino </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Estado Civil</label>
                        <div>
                            <select class="form-control" name="" id="">
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="viudo">Viudo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telf / Cel</label>
                        <div>
                            <div class="input-icon"> <i class="fa fa-map-marker ico"></i>
                                <input class="form-control " type="number">
                            </div>
                        </div>
                    </div>

                </form>
                <p>Datos personales…</p>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Telf / Cel Referencia</label>
                    <div>
                        <div class="input-icon"> <i class="fa fa-map-marker ico"></i>
                            <input class="form-control " type="number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Zona</label>
                    <div>
                        <div class="input-icon right"> <i class="fa fa-keyboard-o ico "></i>
                            <input class="form-control " type="text" placeholder="Right icon">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Domicilio</label>
                    <div>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group offset">
                    <div>
                        <button type="button" class="btn btn-theme">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="md-editDatInstUser" class="modal fade" tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Datos del Empleado</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <p>Datos Profecionales e institucionales…</p>
                <form class="form-horizontal" data-collabel="3" data-alignlabel="left">
                    <div class="form-group">
                        <label class="control-label">Profecion</label>
                        <div>
                            <input type="text" class="form-control rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Area</label>
                        <div>
                            <input type="text" class="form-control rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Cargo</label>
                        <div>
                            <input type="text" class="form-control rounded"><br>
                            <input type="text" class="form-control rounded">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputTwo">Fecha Nacimiento</label>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sexo</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio1" name="sexo" value="option1" checked>
                                Masculino </label>
                            <label class="radio-inline">
                                <input type="radio" id="inlineRadio2" name="sexo" value="option2">
                                Femenino </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Estado Civil</label>
                        <div>
                            <select class="form-control" name="" id="">
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="viudo">Viudo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telf / Cel</label>
                        <div>
                            <div class="input-icon"> <i class="fa fa-map-marker ico"></i>
                                <input class="form-control " type="number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telf / Cel Referencia</label>
                        <div>
                            <div class="input-icon"> <i class="fa fa-map-marker ico"></i>
                                <input class="form-control " type="number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Zona</label>
                        <div>
                            <div class="input-icon right"> <i class="fa fa-keyboard-o ico "></i>
                                <input class="form-control " type="text" placeholder="Right icon">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Domicilio</label>
                        <div>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group offset">
                        <div>
                            <button type="submit" class="btn btn-theme">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/asincrono/homeJs.js') }}"></script>
<script type="text/javascript" src="{{ asset('/asincrono/recHumEmp.js') }}"></script>
@endsection