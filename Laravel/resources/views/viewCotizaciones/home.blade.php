<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2><strong>Pre</strong> Cotizaciones </h2>
            </header>
            <div class="panel-body">
                <div class=" col-lg-3">
                    <button class="btn btn-theme-inverse btn-sm" onclick="listCotizacines1()">Sin Cotizar<i class="fa fa-th-list "></i></button>
                    <button class="btn btn-theme-inverse btn-sm" onclick="listCotizacines2()">Cotizado<i class="fa fa-th-list"></i></button>
                </div>
                <div class="col-lg-3">
                <form id="form_list_cotizaciones">
                    <div class="input-group">
                        <input type="date" class="form-control" id="date_list_cotizaciones" required>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-theme-inverse" id="btn_list_cotizaciones1"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th># Cod</th>
                                <th>Nombre</th>
                                <th>Procedimento medico</th>
                                <th>Medico</th>
                                <th>Monto Cotizado </th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody align="center" id="table-list_precotizaciones">
                            <tr>
                                <td>--</td>
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

<div id="md-optionCotizacion" class="modal fade md-slideDown" data-width="60%" data-header-color="#736086">
</div>
<!-- //modal-->

<script type="text/javascript" src="{{ asset('/asincrono/cotizaciones.js') }}"></script>