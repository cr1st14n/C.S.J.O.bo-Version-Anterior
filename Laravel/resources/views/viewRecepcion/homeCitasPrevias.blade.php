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
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/asincrono/citasPrevias.js') }}"></script>
@endsection