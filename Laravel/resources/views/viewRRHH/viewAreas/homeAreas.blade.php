@extends('layouts.admLay2')
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
            <h2><strong>Areas</strong>registradas</h2>
        </header>
        <div class="panel-body">
            <div class="panel-tools fully color" align="left"  data-toolscolor="#6CC3A0" >
                <button class="btn btn-theme-inverse btn-transparent " >Agregar </button>
                <button class="btn btn-theme-inverse btn-transparent" onclick="listAreas()">listar  </button>
            </div>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Nombre del area</th>
                        <th>Encargado</th>
                        <th width="15%">Empleados asignados al area</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center" id="tableListAreas">
                    <tr>
                        <td>DIR</td>
                        <td valign="middle">Direccion</td>
                        <td>directora.....</td>
                        <td><span class="label label-success">8</span></td>
                        <td>
                            <span class="tooltip-area">
                            <button onclick="ShowInfArea()" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-bullseye"></i></button>
                            <button class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>ADM</td>
                        <td>Administacion</td>
                        <td>Claudia Nina</td>
                        <td><span class="label label-warning">7</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a onclick="ShowInfArea()" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-bullseye"></i></a>
                            <a  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>CON</td>
                        <td>Contabilidad</td>
                        <td>juan</td>
                        <td><span class="label label-success ">5</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>DAI</td>
                        <td>Departamento de almacenes e inventarios</td>
                        <td></td>
                        <td><span class="label label-warning">7</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>RECP</td>
                        <td>Recepcion</td>
                        <td>....</td>
                        <td><span class="label label-danger">2</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>CA</td>
                        <td>Caja</td>
                        <td>Irene</td>
                        <td><span class="label label-danger">3</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>FARM</td>
                        <td>Farmacia</td>
                        <td>.....</td>
                        <td><span class="label label-danger">3</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>INT</td>
                        <td>Internaciones</td>
                        <td>.....</td>
                        <td><span class="label label-danger">10</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>QIR</td>
                        <td>Quirofano</td>
                        <td>.....</td>
                        <td><span class="label label-danger">20</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>EMR</td>
                        <td>Emergencias</td>
                        <td>.....</td>
                        <td><span class="label label-danger">11</span></td>
                        <td>
                            <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)"  class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div id="md-InfArea" class="modal fade" tabindex="-1" data-width="800" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
            <h3>Informacion del area</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Informacion del area</h3><br>
                    <p id="datosEmp"></p>
                </div>
                <div class="col-lg-6">
                    <h3>Personal en el area</h3><br>
                    <p id="datosInst"></p>
                </div>
            </div>
        </div>
    </div>

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
                                    <ul class="iCheck"  data-color="green">
                                        <li>
                                            <input type="checkbox">
                                            <label>Documento 1</label>
                                        </li>
                                        <li>
                                            <input  type="checkbox" checked>
                                            <label >Documento 2</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
                                            <label>Documento 3</label>
                                        </li>
                                        <li>
                                            <input type="checkbox">
                                            <label>Documento 4</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="iCheck"  data-color="green">
                                        <li>
                                            <input type="checkbox">
                                            <label>Documento 1</label>
                                        </li>
                                        <li>
                                            <input  type="checkbox" checked>
                                            <label >Documento 2</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
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
                                    <ul class="iCheck"  data-style="square" data-color="green">
                                        <li>
                                            <input type="checkbox">
                                            <label>Documento 1</label>
                                        </li>
                                        <li>
                                            <input  type="checkbox" checked>
                                            <label >Documento 2</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
                                            <label>Documento 3</label>
                                        </li>
                                        <li>
                                            <input type="checkbox">
                                            <label>Documento 4</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="iCheck"  data-style="square" data-color="green">
                                        <li>
                                            <input type="checkbox">
                                            <label>Documento 1</label>
                                        </li>
                                        <li>
                                            <input  type="checkbox" checked>
                                            <label >Documento 2</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
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
    <div id="md-stack2" class="modal fade" tabindex="-1" data-width="500" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
            <h3>Stack Two</h3>
        </div>
        <div class="modal-body">
            <p>One fine body…</p>
            <p>Two fine body…</p>

        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-inverse">Close</button>
            <button class="btn btn-theme" data-toggle="modal" data-target="#md-stack2">Launch modal</button>
        </div>
    </div>

    <div id="md-editDatUser" class="modal fade" tabindex="-1" data-width="800" >
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
                                <input type="date" class="form-control" >
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
                                    <input class="form-control " type="number" >
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
                                <input class="form-control " type="number" >
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
                            <input class="form-control" type="text" >
                        </div>
                    </div>
                    <div class="form-group offset">
                        <div>
                            <button type="button" class="btn btn-theme" >Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="md-editDatInstUser" class="modal fade" tabindex="-1" data-width="800" >
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
                                <input type="date" class="form-control" >
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
                                    <input class="form-control " type="number" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telf / Cel Referencia</label>
                            <div>
                                <div class="input-icon"> <i class="fa fa-map-marker ico"></i>
                                    <input class="form-control " type="number" >
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
                                <input class="form-control" type="text" >
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
    <script type="text/javascript" src="{{ asset('/asincrono/recHumAreas.js') }}"></script>
@endsection
