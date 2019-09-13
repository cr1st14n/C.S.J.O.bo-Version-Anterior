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
