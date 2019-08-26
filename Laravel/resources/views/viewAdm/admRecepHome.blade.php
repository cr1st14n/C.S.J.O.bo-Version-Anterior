@extends('layouts.admLay2')
@section('refUbi')
<ol class="breadcrumb">
    <li><a href="#">Administracion</a></li>
    <li class="active">Estado Recepcion</li>
</ol>

@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="well bg-info">
            <div class="widget-tile">
                <section>
                    <h5><strong>Clientes </strong> Registrados </h5>
                    <h2>8,590</h2>
                    <div class="progress progress-xs progress-white progress-over-tile">
                        <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
                    </div>
                </section>
                <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                <button class="btn btn-block btn-inverse " data-toggle="modal" data-target="#md-full-width"> Listar pacientes registrados </button>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well bg-inverse">
            <div class="widget-tile">
                <section>
                    <h5><strong>Pacientes </strong> citas medicas </h5>
                    <h2>478</h2>
                    <div class="progress progress-xs progress-white progress-over-tile">
                        <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="478" aria-valuemax="1000"></div>
                    </div>
                    <button class="btn btn-block btn-inverse " data-toggle="modal" data-target="#md-full-width"> Listar citas pagadas </button>
                </section>
                <div class="hold-icon"><i class="fa fa-shopping-cart"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well bg-theme">
            <div class="widget-tile">
                <section>
                    <h5><strong>Pacientes</strong> que no pagaron </h5>
                    <h2>84</h2>
                    <div class="progress progress-xs progress-white progress-over-tile">
                        <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="97584" aria-valuemax="300000"></div>
                    </div>
                    <button class="btn btn-block btn-inverse "> Listar citas pendientes </button>
                </section>
                <div class="hold-icon"><i class="fa fa-laptop"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-8">
        <section class="panel corner-flip">
            <div class="widget-chart bg-lightseagreen bg-gradient-green">
                <h2>Estado anual registro de pacientes</h2>
                <table class="flot-chart" data-type="lines" data-tick-color="rgba(255,255,255,0.2)" data-width="100%" data-height="220px">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="color : #FFF;">Test</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>ENE</th>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <th>FEB</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>MAR</th>
                            <td>1015</td>
                        </tr>
                        <tr>
                            <th>ABR</th>
                            <td>2500</td>
                        </tr>
                        <tr>
                            <th>MAY</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>JUN</th>
                            <td>15700</td>
                        </tr>
                        <tr>
                            <th>JUL</th>
                            <td>2315</td>
                        </tr>
                        <tr>
                            <th>AGO</th>
                            <td>200</td>
                        </tr>
                        <tr>
                            <th>SEP</th>
                            <td>5605</td>
                        </tr>
                        <tr>
                            <th>OCT</th>
                            <td>1900</td>
                        </tr>
                        <tr>
                            <th>NOV</th>
                            <td>1900</td>
                        </tr>
                        <tr>
                            <th>DIC</th>
                            <td>1900</td>
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
<div id="md-normal" class="modal fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Modals normal</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
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
<!-- //modal-->

<!--
		/////////////////////////////////////////////////////////////////////
		//////////     MODAL FULL WIDTH    //////////
		//////////////////////////////////////////////////////////////////
		-->
<div id="md-full-width" class="modal fade container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Modals full width</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
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
@endsection