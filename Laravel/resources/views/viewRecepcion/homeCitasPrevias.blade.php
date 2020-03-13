@extends('layouts.RecepLay')
@section('refUbi')
<ol class="breadcrumb">
    <li><a href="#">Recepcion</a></li>
    <li class="active">Citas Previas</li>
</ol>
@endsection
@section('content')
<div class="col-lg-12">
    <section class="panel">
        <div class="panel-body">
            <div class="table-responsive">
                <div class="form-group navbar-form navbar-left">
                    <input type="date" id="citPrevDate_list" class="form-control" value="{{$fechActual}}">
                    <!--  <div class="btn btn-group">
                        <button class="btn btn-theme-inverse"><i class="fa fa-refresh"></i></button>
                        <select name="" id="especialidada_list" class="form-control" >
                            <option value="">ñlkj</option>
                            <option value="">asdf</option>
                        </select>
                    </div> -->
                    <select name="" id="turno_list" class="form-control">
                        <option value="Jornal">Jornal</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                    </select>

                    <button class="btn btn-theme-inverse" onclick="listCitasPrevias()"><i class="fa fa-search"></i>Buscar</button>
                </div>
                <table class="table table-hover  table-striped">
                    <thead>
                        <tr>
                            <th>HCL</th>
                            <th>Paciente</th>
                            <th>Especialidad</th>
                            <th>Turno</th>
                            <th># ficha</th>
                            <th>Hora</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody align="center" id="listCitPrev">
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
    </section>
</div>
<div id="md-form_citPrevAgendar" class="modal fade md-stickTop " tabindex="-1" data-width="700">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" id=""></i></button>
        <h2><strong>Agendar</strong>Cita </h2>
    </div>
    <form id="form_create_CitPrev">
        <input type="number" id="id_form_citPrevAgendar" hidden>
        <div class="modal-body">
            <div class="panel-body">
                <div class="form-horizontal" data-collabel="4" data-alignlabel="center">
                    <div class="form-group">
                        <label class="control-label">Especialidad:</label>
                        <div class="row">
                            <div class="col-md-8">
                                <select required="" id="ate_especialidad_citPrev" name="ate_especialidad" class=" form-control show-menu-arrow" data-style="btn-theme-inverse">
                                    <option selected="true" disabled="disabled">Seleccionar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Procedimiento</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="iCheck" data-color="blue">
                                    <li>
                                        <input type="radio" name="ateProcedimiento" value="Consulta" checked="true">
                                        <label class=""> Consulta</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="ateProcedimiento" value="Control">
                                        <label class="">Control </label>
                                    </li>
                                    <li>
                                        <input type="radio" name="ateProcedimiento" value="Emergencias">
                                        <label class="">Emergencias</label>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="iCheck" data-color="blue">
                                    <li>
                                        <input type="radio" name="ateProcedimiento" value="Curacion Mayor">
                                        <label class="">CRN Mayor</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="ateProcedimiento" value="Curacion Menor">
                                        <label class="">CRN Menor</label>
                                    </li>
                                    <li>
                                        <input type="radio" name="ateProcedimiento" value="Enfermeria">
                                        <label class="">Enfermeria</label>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Medico Asignado</label>
                        <div class="row">
                            <div class="col-md-8">
                                <select id="ate_med_citPrev" class="form-control" data-size="10" required="">
                                    <option selected="true" disabled="disabled">Buscar medico</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ticked" class="col-md-4 control-label"> # de ticked</label>
                        <div class="col-md-3">
                            <input type="number" class="form-control" placeholder="# ticked" id="ticked_citPrev" required="" autocomplete="off"></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Turno T/M</label>
                        <div class="row">
                            <div class="col-md-6">
                                <select id="ate_turno_citPrev" class=" form-control show-menu-arrow" data-style="btn-theme-inverse">
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" id="fecha_citPrev" class="form-control rounded" required>
                            </div>
                            <div class="col-md-4">
                                <input type="time" id="time_citPrev" class="form-control rounded" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Observacion</label>
                        <div class="row">
                            <div class="col-md-6">
                                <textarea id="observacion_citPrev" cols="30" rows="2" require></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="panel-footer" align="right">
            <button type="submit" class="btn btn-theme-inverse btn-block">Agendar Turno</button>
            <!-- <button type="reset" class="btn" onclick="clearForm(this.form);"> Limpiar Formulario</button> -->
        </footer>
    </form>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/asincrono/citasPrevias.js') }}"></script>
@endsection