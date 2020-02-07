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
        <div class="panel-tools fully color" align="left" data-toolscolor="#6CC3A0">
            <button class="btn btn-theme-inverse btn-transparent" onclick="formCreateArea()">Agregar </button>
            <button class="btn btn-theme-inverse btn-transparent" onclick="listAreas()">listar </button>
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
                                <a class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="md-InfArea" class="modal fade md-flipHor" tabindex="-1" data-width="800">
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
<div id="md-createArea" class="modal fade md-stickTop " tabindex="-1" data-width="800">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h3>Registrar nueva area</h3>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <form id="form-createArea">
                    <section class="panel corner-flip">
                        <header class="panel-heading sm" data-color="theme-inverse">
                            <h2><strong>Registrar </strong> Nueva Area</h2>

                        </header>
                        <div class="panel-tools color" align="right" data-toolscolor="#4EA582">
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal" data-collabel="3" data-alignlabel="center">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-6">
                                        <input id="nombre" type="text" class="form-control rounded" name="nombre" value="{{ old('nombre') }}" maxlength="50" data-always-show="true">
                                        @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                    <label class="control-label">Descripcion </label>
                                    <div>
                                        <input id="descripcion" name="descripcion" value="{{ old('descripcion') }}" type="text" class="form-control rounded" maxlength="200" data-always-show="false">
                                        @if ($errors->has('descripcion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                                    <label class="control-label">Area medica</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select id="area" name="area" class=" form-control show-menu-arrow" data-style="btn-theme-inverse">
                                                <option selected="true" disabled="disabled"></option>

                                                <option value="Administrativa">Administrativa</option>
                                                <option value="Salud">Salud</option>
                                            </select>
                                            @if ($errors->has('area'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('area') }} <br> selccione un tipo de area</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                </div>




                                <footer class="panel-footer">
                                    <button type="submit" class="btn btn-theme">Registrar</button>
                                    <button type="reset" class="btn" onclick="clearForm(this.form);"> Limpiar Formulario</button>
                                </footer>
                            </div>
                        </div>
                    </section>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/asincrono/recHumAreas.js') }}"></script>
@endsection