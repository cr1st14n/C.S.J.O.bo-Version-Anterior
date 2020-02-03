function ShowInfArea() {
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
  }
);  
  }
