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
                    <input type="date" id="citPrevDate_list" class="form-control">
                    <div class="btn btn-group">
                        <button class="btn btn-theme-inverse"><i class="fa fa-refresh"></i></button>
                        <select name="" id="especialidada_list" class="form-control" >
                            <option value="">ñlkj</option>
                            <option value="">asdf</option>
                        </select>
                    </div>
                    <select name="" id="turno_list" class="form-control">
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
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody align="center" id="listCitPrev">
                        <tr>
                            <td>1</td>
                            <td valign="middle">Sander</td>
                            <td>example@demo.com</td>
                            <td><span class="label label-success">Purchased</span></td>
                            <td>
                                <span class="tooltip-area">
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Martie</td>
                            <td>example@demo.com</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>
                                <span class="tooltip-area">
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lucien</td>
                            <td>example@demo.com</td>
                            <td><span class="label label-success ">Purchased</span></td>
                            <td>
                                <span class="tooltip-area">
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Fulvio</td>
                            <td>example@demo.com</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>
                                <span class="tooltip-area">
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Shavonne</td>
                            <td>example@demo.com</td>
                            <td><span class="label label-danger">Suspended</span></td>
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
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/asincrono/citasPrevias.js') }}"></script>
@endsection