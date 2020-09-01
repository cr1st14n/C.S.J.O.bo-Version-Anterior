<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2><strong>Pre</strong> Cotizaciones </h2>
            </header>
            <div class="panel-body">

                <form id="form_list_cotizaciones">
                    <div class="col-lg-2">
                        <select name="estado_cotizacion" id="estado_cotizacion" class="form-control" required>
                            <option value="0">Sin cotizar</option>
                            <option value="1">Cotizado</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input type="date" class="form-control" name="date_list_cotizaciones" value="<?php echo date("Y-m-d");?>" required>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-circle btn-theme-inverse"><i class="fa fa-search"></i></button>
                    </div>
                </form>
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

<div id="md-optionCotizacion" class="modal fade md-slideDown" data-width="48%" data-header-color="#736086">
</div>
<!-- //modal-->

<script type="text/javascript" src="{{ asset('/asincrono/cotizaciones.js') }}"></script>