function ShowInfArea(id) {
  var data={id:id};
  $.get("/C.S.J.O.bo/adm/area/show", data,
    function (data) {
     console.log(data); 
    }
  );
  var datosEMP = `Nomnbre del area: <strong>Administracion</strong><br>
                  Encargado: <strong>Lic claudia</strong><br>
                  # personal en el area: <strong>10</strong> <hr>
                   Personal de planta: <strong>2</strong><br>
                   Personal de Eventual: <strong>5</strong><br>
                   Estudiante segun Convenio: <strong>7</strong><br>
                   Voluntario: <strong>3</strong><br>
                   Otros: <strong>3</strong><br>
                  `;
  document.getElementById("datosEmp").innerHTML = datosEMP;
  var html2 = `   Nombre de personal en el area<br>
                  1 personal<br>
                  2 personal<br>
                  3 personal<br>
                  4 personal<br>
                  5 personal<br>
                  `;
  document.getElementById("datosInst").innerHTML = html2;

  $("#md-InfArea")
    .addClass("md-flipHor")
    .modal("show");
}
function listAreas() {
$.get("/C.S.J.O.bo/adm/area/list",
  function (data) {
   console.log(data) 
   list=data.map(function (e) { 
     return `
     <tr>
        <td>COD-${e.id}</td>
        <td valign="middle">${e.nombre}</td>
        <td>${e.usu_appaterno} ${e.usu_nombre}</td>
        <td><span class="label label-success">${e.cant_usuarios}</span></td>
        <td>
            <span class="tooltip-area">
            <button onclick="ShowInfArea(${e.id})" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-bullseye"></i></button>
            <button class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button>
            </span>
        </td>
      </tr>
     `;
    }).join(" ");
    $('#tableListAreas').html(list);
  }
);  
  }
