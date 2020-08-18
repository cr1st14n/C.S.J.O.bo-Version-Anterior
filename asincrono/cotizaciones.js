function paralisis() {
  console.log('tendree');
  $.ajax({
    type: "get",
    url: "../adm/cotizaciones/list1",
    success: function (response) {
      var html = response
        .map(function (e) {
          return ` 
                <tr>
                    <td>${e.cod_cot}</td>
                    <td valign="middle">${e.cot_id_paciente}</td>
                    <td><span class="label label-success">${e.cot_tipoCirugia}</span></td>
                    <td>${e.ca_cod_usu}</td>
                    <td>
                        <span class="tooltip-area">
                            <button onClick="show_option_otizacion(${e.id})"  class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-eye"></i></button>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                </tr>
                `;
        })
        .join(" ");
      $("#table-list_precotizaciones").html(html);
    },
  });
  }



$("#btn_list_precotizaciones").click(function (e) {
  
});
function show_option_otizacion(id) {
  $("#md-optionCotizacion").modal("show");
  $.ajax({
    type: "get",
    url: "../adm/cotizaciones/store1",
    data: { id: id },
    success: function (e) {
      $("#md-optionCotizacion").html("");
      $("#md-optionCotizacion").html(e);
    },
  });
}
$('#btnDePrueba').click(function (e) { 
  e.preventDefault();
  var casa= $('#prapra').serealize();
  console.log(casa);
});

