@extends('layouts.RecepLay')
@section('refUbi')
<ol class="breadcrumb">
	<li><a href="#">Recepcion</a></li>
	<li class="active">Buscar paciente</li>
</ol>
@endsection
@section('content')
<div class="col-lg-12">
<section class="panel">
    <div class="panel-body">
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <label>Buscar :</label>
                <input type="text" size="3" class="form-control" name='num' onkeypress="return soloNu(event)" onblur="limpia()" placeholder="CI/HCL" id="HCLpaciente" autocomplete="off" />
                
                <input type="text" size="17" class="form-control" name='dato1' placeholder="NOMBRE APELLIDOS" onkeypress="return soloNuLe(event)" onblur="limpia()" id="NOMBRESpaciente" autocomplete="off" />
            </div>
        </form>
        <div class="row">
            <div class="table-responsive col-lg-12">
                <table cellpadding="0" cellspacing="0" border="0" class=" table-bordered table-striped" id="tableBuscarPaciente" style="width: 100%">
                    <thead>
                        <tr>
                            <th width="15%" class="text-center"> # HISTORIAL</th>
                            <th width="15%" class="text-center">C.I.</th>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">APELLIDO</th>
                            <th class="text-center"><i class="fa fa-bars"></i></th>
                            <th width="25%" class="text-center">ACCION</th>
                        </tr>
                    </thead>
                    <tbody align="center" id="resulBusqPacientes">
                    </tbody>
                </table>
            </div>
        </div>     
    </div>
</section>

</div>
<div id="md-HCLprestamo" class="modal fade" tabindex="-1" data-width="450">
    <div class="modal-header bg-inverse bd-inverse-darken">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Formulario: prestamo de HCL: <strong id="codHCL">...</strong> </h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label col-md-6">Personal a entregar</label>
                    <div class="col-md-6">
                        <label id="presIDHCL" hidden></label>
                        <input id="usuEntrega" class="form-control" type="text" name="userInteresado" autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="control-label col-md-6">Area de destino</label>
                    <div class="col-md-6">
                        <select id="areaEntrega" class="selectpicker form-control" data-size="10" data-live-search="true" style="display: none;" name="area">
                            <option value="" selected >Seleccionar </option>
                            <option value="Direccion">Direccion </option>
                            <option value="Administracion">Administracion</option>
                            <option value="Contabilidad">Contabilidad</option>
                            <option value="Consultorios">Consultorios</option>
                            <option value="Internaciones">Internaciones</option>
                            <option value="Quirofano">Quirofano</option>
                            <option value="Farmacia">Farmacia</option>
                            <option value="NULO">NULO</option>
                        </select>
                    </div>
                </div>
                <button id="regisPrest" onclick="registrarPrestamo()" type="button" class="btn btn-theme-inverse btn-block btn-sm">Registrar</button>
            </div>
        </div>
    </div>
    <!-- //modal-body-->
</div>
<!-- //modal-->
<!-- //modal-->
<div id="md-editPres" class="modal fade" tabindex="-1" data-width="450">
    <div class="modal-header bg-inverse bd-inverse-darken">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Gestionar prestamo - fecha de prestamo: <p id="fechaPrestamo"></p> </h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <select  class=" form-control" data-size="5" id="area_pres_update">
                        <option value="Direccion">Direccion </option>
                        <option value="Administracion">Administracion</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Consultorios">Consultorios</option>
                        <option value="Internaciones">Internaciones</option>
                        <option value="Quirofano">Quirofano</option>
                        <option value="Farmacia">Farmacia</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Personal " id="personal_pres_update">
                    <lavel hidden id="idPresCerrar" ></lavel>
                </div>
                <div class="col-sm-6">
                    <button type="button" onclick="cerrarPrestamo()" class="btn btn-theme-inverse btn-block">Concluir Prestamo</button>
                    <button type="button" onclick="updatePrestamo()" class="btn btn-theme btn-block" >Actualizar</button>

                </div>

            </div>
        </div>
    </div>
</div>
<div id="md-form_create_sitaPrev" class="modal fade md-stickTop " tabindex="-1" data-width="400">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" id="btn_formCreate_close"></i></button>
        <h2><strong>Registrar </strong>Area</h2>

    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="form-createArea">
                    <section class="panel ">

                        <div class="panel-tools color" align="right" data-toolscolor="#4EA582">
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal" data-collabel="4" data-alignlabel="center">
                                <div class="form-group">
                                    <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-6">
                                        <input id="area_nombre" type="text" class="form-control rounded" autocomplete="off" maxlength="50" data-always-show="true" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Descripcion </label>
                                    <div>
                                        <input id="area_descripcion" type="text" class="form-control rounded" maxlength="200" data-always-show="false" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Personal Encargado</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select id="area_usuEncargado" class=" form-control show-menu-arrow" data-style="btn-theme-inverse" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Area medica</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select id="area_tipo" class=" form-control show-menu-arrow" data-style="btn-theme-inverse" required>
                                                <option selected="true" disabled="disabled"></option>

                                                <option value="Administrativa">Administrativa</option>
                                                <option value="Salud">Salud</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="panel-footer">
                        <button type="submit" class="btn btn-theme-inverse">Registrar</button>
                        <button type="reset" class="btn" onclick="clearForm(this.form);"> Limpiar Formulario</button>
                    </footer>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/asincrono/pacientes.js') }}"></script>
@endsection

@section('head1')
<script type="text/javascript">
    var int=self.setInterval("refresh()",6000);
    function refresh()
    {
        location.reload(false);
    }
</script>
@endsection
