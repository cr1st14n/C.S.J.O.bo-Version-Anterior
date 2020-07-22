<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2><strong>Pre</strong> Cotizaciones </h2>
            </header>
            <div class="panel-body">
                <button class="btn btn-theme-inverse btn-sm" id="btn_list_precotizaciones"><i class="fa fa-search"></i></button>
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th># Cod</th>
                                <th>Nombre</th>
                                <th>Procedimento medico</th>
                                <th>Medico</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody align="center" id="table-list_precotizaciones">
                            <tr>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="md-optionCotizacion" class="modal fade md-slideDown" data-header-color="#736086">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title">Precotizacion</h4>
    </div>
    <!-- //modal-header-->
    <div class="modal-body">
        <p><strong>Paciente</strong></p>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <ul class="list-item angle">
                    <li>Especialidad Medica</li>
                    <li>Nombre del Procedimiento</li>
                    <li>Tiempo aproximado</li>
                    <li>Cirujano - Honorarios solicitados</li>
                    <li></li>
                </ul>
            </div>
            <!-- //col-md-3 -->

            <div class="col-md-6 col-sm-6">
                <ul class="list-item arrow">
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ul>
            </div>
            <!-- //col-md-3 -->
        </div>
    </div>
    <!-- //modal-body-->
</div>
<!-- //modal-->
<script type="text/javascript" src="{{ asset('/asincrono/cotizaciones.js') }}"></script>