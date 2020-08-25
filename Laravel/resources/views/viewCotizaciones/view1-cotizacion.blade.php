<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
    <h4 class="modal-title">Precotizacion</h4>
</div>
<!-- //modal-header-->

<div class="modal-body">

    <p>
        Numero de historia clinica:
        <strong>
            # {{$data->pa_hcl}}
        </strong>
        <br>
        Nombre del paciente:
        <strong>
            {{$data->pa_nombre}} {{$data->pa_appaterno }} {{$data->ap_materno }}
        </strong>
    </p>
    <hr>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <ul class="list-item angle">
                <li>-Especialidad Medica: <strong>{{ $data->cot_EspecialidadCirugia}}</strong></li>
                <li>-Nombre del Procedimiento: <strong>{{ $data->cot_tipoCirugia}}</strong> </li>
                <li>-Tiempo aproximado: <strong>{{ $data->cot_tiempoAproximado }}</strong></li>
                <li>-Cirujano - Honorarios solicitados: <strong>{{ $data->cot_cirujanoHonorarios }}</strong></li>
                <li>-Especialista anesteseologo: <strong>{{ $data->cot_espAneesteseologo }}</strong></li>
                <li>-Quirofano Mayor: <strong>{{ $data->cot_quirofanoMayor }}</strong></li>
                <li>-Sala de Endoscopia: <strong>{{ $data->cot_salaEndoscopia }}</strong></li>
                <li>-Sala de partos: <strong>{{ $data->cot_salaPartos }}</strong></li>
                <li>-Equipo de laparocopia: <strong>{{ $data->cot_equipoLaparosopica }}</strong></li>
                <li>-Ayudante 1: <strong>{{ $data->cot_ayudante1 }}</strong></li>
                <li>-Ayudante 2:<strong>{{ $data->cot_ayudante2 }}</strong></li>
            </ul>
        </div>
        <!-- //col-md-3 -->
        <div class="col-md-6 col-sm-6">
            <ul class="list-item arrow">
                <li>-Instrumentador: <strong>{{ $data->cot_instrumentador }}</strong></li>
                <li>-Circulante: <strong>{{ $data->cot_circulante }}</strong></li>
                <li>-Oxigeno: <strong>{{ $data->cot_oxigeno }}</strong></li>
                <li>-Aguja K: <strong>{{ $data->cot_agujaK }}</strong></li>
                <li>-Insumos en quirofano: <strong>{{ $data->cot_insumoQuirofano }}</strong></li>
                <li>-Medicamentosw en quirofano: <strong>{{ $data->cot_medicamentosQuirofano }}</strong></li>
                <li>-Otros: <strong>{{ $data->cot_otros }}</strong></li>
                <li>-Procedimiento:
                    <strong>
                        @if($data->cot_procedimiento == 1)
                        <strong>Mayor</strong>
                        @endif
                        @if($data->cot_procedimiento == 2)
                        <strong>Mediana</strong>
                        @endif
                        @if($data->cot_procedimiento == 3)
                        <strong>Menor</strong>
                        @endif
                    </strong>
                </li>
            </ul>
        </div>
        <!-- //col-md-3 -->
    </div>
    <hr>
    <div class=" content">
        <form id="form_registerCotizacion1" >
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Precio a cotizar: </label>
                    <div class="input-group"> <span class="input-group-addon">Bs.- </span>
                        <input type="text" name="precio" class="form-control" placeholder="Monto">
                    </div>
                </div>
                <div class="form-group offset">
                    <div>
                        <button type="submit" class="btn btn-theme">Registrar</button>
                        <button id="123123" class="btn ">Cancelar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Observaciones: </label>
                    <div>
                        <textarea class="form-control" name="observacion" placeholder="Describa una observación de la precotizacion..." rows="3"></textarea>
                    </div>
                </div>
            </div>
        </form>
<button type="button" id="primero" class="btn btn-darkorange">hola mundo</button>
        <form id="prapra">
            <input type="text" name="nombre" class="form-control" >
            <button class="btn btn-color btn-danger" id="btnDePrueba" type="button">5555</button>
        </form>
      
    </div>
</div>
</div>
<script type="text/javascript" src="{{ asset('/asincrono/cotizaciones.js') }}"></script>

    