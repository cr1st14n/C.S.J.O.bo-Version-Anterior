function listCotizacines1(data) {
  $.ajax({
    type: "get",
    data:data,
    url: "../adm/cotizaciones/list1",
    success: function (response) {
      console.log(response);

      var html = response
        .map(function (e) {
          return (html = ` 
                <tr>
                    <td>${e.cod_cot}</td>
                    <td valign="middle"> ${veriNull(e.pa_nombre)} ${veriNull(e.pa_appaterno)} </td>
                    <td><span class="label label-success">${e.cot_EspecialidadCirugia} - ${e.cot_tipoCirugia}</span></td>
                    <td>${veriNull(e.usu_nombre)} ${veriNull(e.usu_appaterno)}</td>
                    <td>---</td>
                    <td>
                        <span class="tooltip-area">
                            <button onClick="show_option_otizacion(${e.id})"  class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
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
function listCotizacines2(data) {
  $.ajax({
    type: "get",
    data:data,
    url: "../adm/cotizaciones/list2",
    success: function (response) {
      console.log(response);
      var html = response
        .map(function (e) {
          return (html = ` 
                <tr>
                    <td>${e.cod_cot}</td>
                    <td valign="middle">${veriNull(e.pa_nombre)} ${veriNull(e.pa_appaterno)} </td>
                    <td><span class="label label-success">${e.cot_EspecialidadCirugia} - ${e.cot_tipoCirugia}</span></td>
                    <td>${veriNull(e.usu_nombre)} ${veriNull(e.usu_appaterno)}</td>
                    <td>${e.cot_costoProcedimiento} Bs.-</td>
                    <td>
                        <span class="tooltip-area">
                            <button onClick="show_option_otizacion_edit(${e.id})"  class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
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
function show_option_otizacion_edit(id) {
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
        listCotizacines1($('#form_list_cotizaciones').serialize());
        $('#md-optionCotizacion').modal('hide');
      } else {
        $('#md-optionCotizacion').modal('hide');
        notif('2','Error! Vuelva a intentarlo.')
      }
    },
  });
});
// $("#form_registerCotizacion2").submit(function (e) {
//   e.preventDefault();
//   $.ajax({
//     type: "post",
//     url: "../adm/cotizaciones/create",
//     data: $("#form_registerCotizacion1").serialize(),
//     //  dataType: "bolean",
//     success: function (response) {
//       if (response==1) {
//         listCotizacines2($('#form_list_cotizaciones').serialize());
//         $('#md-optionCotizacion').modal('hide');
//       } else {
//         $('#md-optionCotizacion').modal('hide');
//         notif('2','Error! Vuelva a intentarlo.')
//       }
//     },
//   });
// });

$('#form_list_cotizaciones').submit(function (e) {
  e.preventDefault();
  var data=$('#form_list_cotizaciones').serialize();
  if ($('#estado_cotizacion').val()==0) {
    listCotizacines1(data);
  }else{
    listCotizacines2(data);
  }
});
