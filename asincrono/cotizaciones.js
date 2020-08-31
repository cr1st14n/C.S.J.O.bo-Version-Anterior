function listCotizacines1() {
  $.ajax({
    type: "get",
    url: "../adm/cotizaciones/list1",
    success: function (response) {
      var html = response
        .map(function (e) {
          return (html = ` 
                <tr>
                    <td>${e.cod_cot}</td>
                    <td valign="middle">${e.cot_id_paciente}</td>
                    <td><span class="label label-success">${e.cot_tipoCirugia}</span></td>
                    <td>${e.ca_cod_usu}</td>
                    <td>---</td>
                    <td>
                        <span class="tooltip-area">
                            <button onClick="show_option_otizacion(${e.id})"  class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                </tr>
                `);
        })
        .join(" ");
      $("#table-list_precotizaciones").html(html);
    },
  });
}
function listCotizacines2() {
  $.ajax({
    type: "get",
    url: "../adm/cotizaciones/list2",
    success: function (response) {
      var html = response
        .map(function (e) {
          return (html = ` 
                <tr>
                    <td>${e.cod_cot}</td>
                    <td valign="middle">${e.cot_id_paciente}</td>
                    <td><span class="label label-success">${e.cot_tipoCirugia}</span></td>
                    <td>${e.ca_cod_usu}</td>
                    <td>${e.cot_costoProcedimiento} Bs.-</td>
                    <td>
                        <span class="tooltip-area">
                            <button onClick="show_option_otizacion(${e.id})"  class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-eye"></i></button>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                </tr>
                `);
        })
        .join(" ");
      $("#table-list_precotizaciones").html(html);
    },
  });
}

$("#btn_list_precotizaciones").click(function () {});
function show_option_otizacion(id) {
  $("#form_registerCotizacion1").trigger("reset");
  $.ajax({
    type: "get",
    url: "../adm/cotizaciones/store1",
    data: { id: id },
    success: function (html) {
      // $("#md-optionCotizacion").html("");
      $("#md-optionCotizacion").html(html);
    },
  });
  $("#md-optionCotizacion").modal("show");
}

$("#form_registerCotizacion1").submit(function (e) {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "../adm/cotizaciones/create",
    data: $("#form_registerCotizacion1").serialize(),
    //  dataType: "bolean",
    success: function (response) {
      if (response==1) {
        listCotizacines1();
        $('#md-optionCotizacion').modal('hide');
      } else {
        $('#md-optionCotizacion').modal('hide');
        notif('2','Error! Vuelva a intentarlo.')
      }
    },
  });
});
