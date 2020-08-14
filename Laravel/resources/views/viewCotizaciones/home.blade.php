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
<div id="md-optionCotizacion" class="modal fade md-slideDown" data-width="60%" data-header-color="#736086" >
</div>
<!-- //modal-->

<script type="text/javascript" src="{{ asset('/asincrono/cotizaciones.js') }}"></script>