$('#btn_list_precotizaciones').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "cotizaciones/list1",
        success: function (response) {
            var html=response.map(function (e) {
                return ` 
                <tr>
                    <td>${e.cod_cot}</td>
                    <td valign="middle">${e.cot_id_paciente}</td>
                    <td><span class="label label-success">${e.cot_tipoCirugia}</span></td>
                    <td>${e.ca_cod_usu}</td>
                    <td>
                        <span class="tooltip-area">
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                </tr>
                `;
            }).join(" ");
           $('#table-list_precotizaciones').html(html); 
        }
    });
});