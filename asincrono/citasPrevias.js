function listCitasPrevias() {
    var data={
        date:$('#citPrevDate_list').val(),
        turno:$('#turno_list').val(),
    }
    $.get("listCitasPrevias", data,
        function (data) {
         var html=data.map(function (e) { 
             return`
             <tr>
                <td>${e.pa_hcl}</td>
                <td valign="middle">${e.pa_nombre} ${e.pa_appaterno}</td>
                <td>${e.nombre}</td>
                <td>${e.cp_turno}</td>
                <td>${e.cp_num_ticked}</td>
                <td><span class="label label-success">${e.cp_time}</span></td>
                <td>
                    <span class="tooltip-area">
                        <a onclick="" class="btn btn-default btn-sm" title="Agendar"><i class="fa fa-exclamation"></i></a>
                        <a onclick="" class="btn btn-default btn-sm" title="Editar"><i class="fa fa-pencil"></i></a>
                        <a onclick="" class="btn btn-default btn-sm" title="Eliminar"><i class="fa fa-trash-o"></i></a>
                    </span>
                </td>
            </tr>   
             `;
            }).join(' '); 
            $('#listCitPrev').html(html);
        }
    );
  }