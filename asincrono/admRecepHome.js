function informe1() {
  $.get("admRecepHome/1")
    .done(function(data) {
      // console.log(typeof data);
      // console.log(data);
      var html = `
      <h3><strong>Porcentaje </strong>registro</h3>
      <br>
      <div class="progress progress-shine active progress-sm" style="height:8px;">
          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: ${data.porcentajeHombre}%; ">
          </div>
      </div>
      <label class="progress-label">Hombre ${data.porcentajeHombre}% </label>

      <!-- //progress-->
      <div class="progress progress-sm progress-shine active " style="height:8px;">
          <div class="progress-bar bg-danger " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: ${data.porcentajeMujer}%; ">
          </div>
      </div>
      <label class="progress-label">Mujeres ${data.porcentajeMujer}% </label>
      <!-- //progress-->
      <div class="progress progress-shine progress-sm" style="height:8px;">
          <div class="progress-bar  bg-warning" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: ${data.edad1P}%; ">
          </div>
      </div>
      <label class="progress-label">Edad entre 0-25 años ${data.edad1P}% ${data.edad1} pacientes</label>
      <!-- //progress-->
      <div class="progress progress-sm progress-shine active" style="height:8px;">
          <div class="progress-bar bg-gradient-blue" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: ${data.edad2P}%; ">
          </div>
      </div>
      <label class="progress-label">Edad entre 26-50 ${data.edad2P}% ${data.edad2} pacientes</label>
      <!-- //progress-->
      <div class="progress progress-sm progress-shine active" style="height:8px;">
          <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: ${data.edad3P}%; ">
          </div>
      </div>
      <label class="progress-label">Edad entre 51-adelante ${data.edad3P}% ${data.edad3} pacientes</label>
      <!-- //progress-->`;

      var html2=`<h3><strong>Total</strong> pacientes </h3>
      <br>
      <ol class="rectangle-list">
          <li><a >Total <span class="pull-right">${data.Total}</span></a></li>
          <li><a >Hombres <span class="pull-right">${data.TotalHombre}</span></a></li>
          <li><a >Mujeres <span class="pull-right">${data.TotalMujer} </span></a></li>
          <li><a >sin registro de genero <span class="pull-right">${data.TotalSinSexo} </span></a></li>
      </ol>`;

      $("#porcentajeRegistro").html(html);
      $("#totalRegistros").html(html2);
      // animateprogress("#progres1",91);
    })
    .fail(function() {});
}

function buscarCiHCL(dato, tipo) { 
    // console.log(dato,tipo);
    console.log(dato.length);   
    if(dato.length == 0){
        
        var hatmVacio= `<tr>
                            Ingrese datos para buscar!
                        </tr>`;
            document.getElementById('listPacientes').innerHTML=hatmVacio;
    }else{

        var data={'dato':dato,'tipo':tipo}
        $.get("admRecepHome/BuscHCL", data).done(function(data){
            if (data== 'vacio') {
                console.log('vacio');
                var hatmVacio= `<tr>
                                Informacion no encontrada!
                                </tr>`;
                document.getElementById('listPacientes').innerHTML=hatmVacio;
            }else{
                console.log(data);
                listPacientes(data);
            }
    
        }).fail(function(){
    
        });
    }

 }

 function listPacientes(data) {
    var html=data.map(function (elem,index) {    
        return(`<tr>
                    <td>${elem.pa_hcl}</td>
                    <td>${elem.pa_ci}</td>
                    <td>${elem.pa_nombre}</td>
                    <td>${elem.pa_appaterno} / ${elem.pa_apmaterno}</td>
                    <td>
                        <span class="tooltip-area">
                        <button name="${elem.pa_id}" class="btn btn-default btn-sm" title="Atender"><i class="fa  fa-plus-square"></i></button>
                        </span>
                    </td>
                    
                </tr>`);
    }).join(" ");
    document.getElementById('listPacientes').innerHTML=html;

}

function cuadroEstadistico() {
    console.log('hola');
    var html = '1000';
    document.getElementById('tablaEstadistica').innerText=html;
  }
function InfoCajaList(param) {
    var datos= {'mez':$('#infCajaMez').val(),'año':$('#infoCajaAño').val()}
    $.get('admRecepHome/InfoCajaList',datos).done(function (data) {
        console.log(data);
        var html=data.map(function (elem,index) {
            return(`
                <li><a href="#" onClick="ShowModalDetalleCajaEsp()"> ${elem.nombre} <span class="pull-right">${elem.cantidad}</span></a></li>
            `);
          }).join(" ");
          $("#listReporteCaja").html(html);


        
    }).fail(function (params) {
        
    });
  }
function ShowModalDetalleCajaEsp() {
    $("#md-DetalleCajaEsp").modal('show');
  }
function showDataEstEsp() {
    new Morris.Line({
        element: 'estadoAnualEst',
        data: [
            {"elapsed": "ene", "value": 34},
            {"elapsed": "feb", "value": 24},
            {"elapsed": "mar", "value": 3},
            {"elapsed": "abri", "value": 12},
            {"elapsed": "may", "value": 13},
            {"elapsed": "jun", "value": 22},
            {"elapsed": "jul", "value": 5},
            {"elapsed": "ago", "value": 26},
            {"elapsed": "sep", "value": 12},
            {"elapsed": "oct", "value": 45},
            {"elapsed": "nov", "value": 33},
            {"elapsed": "dic", "value": 78}
          ],
        xkey: 'elapsed',
        ykeys: ['value'],
        labels: ['value'],
        parseTime: false
      });
  }
