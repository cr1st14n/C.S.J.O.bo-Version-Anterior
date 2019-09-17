@extends('layouts.admLay2')
@section('head')

@endsection
@section('refUbi')
<ol class="breadcrumb">
    <li><a href="#">Administracion</a></li>
    <li class="active">Estado Recepcion</li>
</ol>

@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="well bg-inverse">
            <div class="widget-tile">
                <section>
                    <h5><strong>Clientes </strong> Registrados </h5>
                    <h2>{{$total}}</h2>
                    <div class="progress progress-xs progress-white progress-over-tile">
                        <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
                    </div>
                </section>
                <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                <div class=" ">
                    <button class="btn btn-transparent btn-theme-inverse " data-toggle="modal" data-target="#md-informePacientes" onclick="informe1()"><i class="glyphicon glyphicon-signal"></i></button>
                    <button class="btn btn-transparent btn-theme-inverse " data-toggle="modal" data-target="#md-full-width"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well bg-inverse">
            <div class="widget-tile">
                <section>
                    <h5><strong>citas </strong>medicas </h5>
                    <h2>478</h2>
                    <div class="progress progress-xs progress-white progress-over-tile">
                        <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="478" aria-valuemax="1000"></div>
                    </div>
                    <button class="btn btn-transparent btn-theme-inverse " data-toggle="modal" data-target="#md-infoCaja"><i class="glyphicon glyphicon-signal"></i></button>
                </section>
                <div class="hold-icon"><i class="fa fa-shopping-cart"></i></div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-8">
        <section class="panel corner-flip">
            <div class="widget-chart bg-lightseagreen bg-gradient-green" onclick="cuadroEstadistico()" >
                <h2>Estado anual registro de pacientes</h2>
                <table class="flot-chart" data-type="lines" data-tick-color="rgba(255,255,255,0.2)" data-width="100%" data-height="220px">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="color : #FFF;">Test</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            <th>ENE</th>
                            <td>{{$enero}}</td>
                        </tr>
                        <tr>
                            <th>FEB</th>
                            <td>{{$febrero}}</td>
                        </tr>
                        <tr>
                            <th>MAR</th>
                            <td>{{$marzo}}</td>
                        </tr>
                        <tr>
                            <th>ABR</th>
                            <td>{{$abril}}</td>
                        </tr>
                        <tr>
                            <th>MAY</th>
                            <td>{{$mayo}}</td>
                        </tr>
                        <tr>
                            <th>JUN</th>
                            <td>{{$junio}}</td>
                        </tr>
                        <tr>
                            <th>JUL</th>
                            <td>{{$julio}}</td>
                        </tr>
                        <tr>
                            <th>AGO</th>
                            <td>{{$agosto}}</td>
                        </tr>
                        <tr>
                            <th>SEP</th>
                            <td>{{$septiembre}}</td>
                        </tr>
                        <tr>
                            <th>OCT</th>
                            <td>{{$octubre}}</td>
                        </tr>
                        <tr>
                            <th>NOV</th>
                            <td>{{$noviembre}}</td>
                        </tr>
                        <tr>
                            <th>DIC</th>
                            <td>{{$diciembre}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-body">
                <h3>Estado mes actual</h3>
                <div class="row align-lg-center">
                    <div class="col-sm-6">
                        <div class="showcase showcase-pie-easy clearfix">
                            <span class="easy-chart pull-left" data-percent="75" data-color="purple" data-track-color="#EDEDED" data-line-width="15" data-size="140">
                                <span class="percent"></span>
                            </span>
                            <ul>
                                <li>548<small>Pacientes registrados</small></li>
                                <li>3,984<small>Pacientes atendidos</small></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                <h2><strong>Usuarios </strong> en el area</h2>
            </header>
            <ul class="list-group">
                <li class="list-group-item">
                    Elena
                </li>
                <li class="list-group-item">
                    Monica
                </li>
                <li class="list-group-item">
                    --
                </li>
                <li class="list-group-item">
                    --
                </li>
            </ul>
        </section>
    </div>
</div>


//? Modal para filtrar
<div id="md-informePacientes" class="modal fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Informe de registro de pacientes</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-7" id="porcentajeRegistro">

                </div>

                <div class="col-md-5" id="totalRegistros">

                </div>
            </div>
        </div>
    </div>
    <!-- //modal-body-->
</div>

<div id="md-full-width" class="modal fade container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Pacientes registrados</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">

        <div class="col-lg-3">
            <input type="number" class="form-control" placeholder="CI / HCL" id="buscNumHCL" oninput="buscarCiHCL(this.value,1)" onkeyup="validar('buscNumHCL')" pattern="[0-9]+">
        </div>
        <div class="col-lg-3">
            <input type="text" class="form-control" placeholder="Nombre apellico" oninput="buscarCiHCL(this.value,2)">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th># HCL</th>
                        <th>CI</th>
                        <th>Nombre </th>
                        <th>apellico</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody align="center" id="listPacientes">
                    <tr>
                        <td>
                            Ingrese datos para buscar!
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- //modal-body-->
</div>

<div id="md-infoCaja" class="modal fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Informe de caja</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                <h4>Filtrar por rango de fechas</h4>
                <div class="align-lg-center ">
                    <input class="form-control" type="date" name="" id="">a
                    <input class="form-control" type="date" name="" id="">
                </div>
                <div class="col-md-6">
                    <h3><strong>Porcentaje </strong>%</h3>
                    <br>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-purple" aria-valuetransitiongoal="45"></div>
                    </div>
                    <label class="progress-label">Emfermeria 45% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" aria-valuetransitiongoal="62"></div>
                    </div>
                    <label class="progress-label">pediatria 62% </label>
                    <!-- //progress-->
                    <div class="progress progress-shine progress-sm">
                        <div class="progress-bar bg-inverse" aria-valuetransitiongoal="57"></div>
                    </div>
                    <label class="progress-label">Odontologia 57% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-theme-inverse" aria-valuetransitiongoal="33"></div>
                    </div>
                    <label class="progress-label">------- 33% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
                    </div>
                    <label class="progress-label">------ 24% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
                    </div>
                    <label class="progress-label">------ 24% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
                    </div>
                    <label class="progress-label">------ 24% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
                    </div>
                    <label class="progress-label">------ 24% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
                    </div>
                    <label class="progress-label">------ 24% </label>
                    <!-- //progress-->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
                    </div>
                    <label class="progress-label">------ 24% </label>
                    <!-- //progress-->
                </div>

                <div class="col-md-6">
                    <h3><strong>Total</strong>.- </h3>
                    <br>
                    <ol class="rectangle-list">
                        <li><a href="#"> ******<span class="pull-right">17,485</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        <li><a href="#"> ****** <span class="pull-right">11,452</span></a></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal-body-->
</div>
<div id="md-full-width01" class="modal fade container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Pacientes registrados</h4>
    </div>
    <!-- //modal-header-->



    <div class="modal-body">
        <div class="row">
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="CI / HCL">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Nombre apellico">
            </div>
            <div class="col-sm-4">
                <button class="btn  btn-primary">Filtrar</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>

                        <th>Status</th>
                        <th>Manager</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr>
                        <td>1</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- //modal-body-->
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('asincrono/admRecepHome.js') }}"></script>
<script type="text/javascript" src="{{ asset('asincrono/homejs.js') }}"></script>

@endsection