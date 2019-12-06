//?----------- onclick de formularios
var formCreatuser1 = document.getElementById("formuladio1");
formCreatuser1.addEventListener("submit", function(event) {
  event.preventDefault();
  createUser(1);
});
$("#formulario2").on("submit", function(event) {
  event.preventDefault();
  createUser(2);
});
$("#formCreatePermiso").on("submit", function(e) {
  e.preventDefault();
  permisoCreate();
});
$("#formEditPermiso").on("submit", function(e) {
  e.preventDefault();
  permisoUpdate();
});
$("#formCreateFalta").on("submit", function(e) {
  e.preventDefault();
  createFalta();
});
$("#formEditFalta").on("submit", function(e) {
  e.preventDefault();
  updateFalta();
});
//! -----------------------------------------------------------------------

function showListEmp() {}
// ? func create usuario
function showModalCreateUser() {
  $("#formuladio1").trigger("reset");
  $("#md-createUser").modal("show");
}

function createUser(tip) {
  switch (tip) {
    case 1:
      var form = document.getElementById("formuladio1");
      if (form.checkValidity()) {
        var data = {
          _token: $("meta[name=csrf-token]").attr("content"),
          ci: $("#createUserCi").val(),
          email: $("#email").val()
        };
        $.post("/C.S.J.O.bo/RRHH/personal/revCiEmail", data)
          .done(function(data) {
            switch (data) {
              case "ciYaExistente":
                notif("2", "CI ya registrado!");
                break;
              case "emailYaExistente":
                notif("2", "Email ya registrado!");
                break;
              case "true":
                showModalCreateUser2();
                break;
            }
          })
          .fail();
      } else {
        notif("2", "Complete los datos con * !");
      }
      break;
    case 2:
      var form2 = document.getElementById("formulario2");
      // console.log(createUser2());
      if (form2.checkValidity()) {
        var data = createUser2();
        $.post("/C.S.J.O.bo/RRHH/personal/createUser", data)
          .done(function(rest) {
            // console.log(rest);
            if (rest == "succes") {
              notif("1", "Usuario registrado!");
              limpiarFomrUserCreate();
              listTodosEmp();
            } else if (rest == "emailYaExistente") {
              notif("2", "Error. registro de correo electronico!");
              notif("4", "Correo electronico ya registrado !");
            } else {
              notif("2", "Error. Vuelva a intentarlo!");
            }
          })
          .fail(function() {
            notif(2, "Error. Reinicie actividad");
          });
      } else {
        notif("2", "Completa los campos con *");
      }
      break;
  }
}
function showModalCreateUser2() {
  $("#formulario2").trigger("reset");
  $("#md-createUser2").modal("show");
}

function createUser2() {
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    ci: $("#createUserCi").val(),
    nombre: $("#nombre").val(),
    apellido1: $("#apellido1").val(),
    apellido2: $("#apellido2").val(),
    sexo: document.querySelector("input[name=sexo]:checked").value,
    fechaNacimiento: $("#fechaNacimiento").val(),
    paisNacimiento: $("#paisNacimiento").val(),
    depNacimiento: $("#depNacimiento").val(),
    tipoSangre: $("#tipoSangre").val(),
    estadoCivil: $("#estadoCivil").val(),
    telf: $("#telf").val(),
    telfRef: $("#telfRef").val(),
    zona: $("#zona").val(),
    domicilio: $("#domicilio").val(),
    zonaSufragio: $("#zonaSufragio").val(),
    email: $("#email").val(),
    /*datos2*/
    fechaContratacion: $("#fechaContratacion").val(),
    contrato: $("#contrato").val(),
    tituloOB: $("#tituloOb").val(),
    profecionOB: $("#profecionOb").val(),
    areaDesignada: $("#areaDesignada").val(),
    cargo: $("#cargo").val(),
    accModSis: $("#accModSis").val(),
    accesoSistema: document.querySelector("input[name=accesoSis]:checked")
      .value,
    seguroNombreInstitucion: $("#seguroNombreInstitucion").val(),
    numNua: $("#numNua").val(),
    numCNS: $("#numCNS").val()
  };
  return data;
}

function listTodosEmp() {
  $.get("/C.S.J.O.bo/RRHH/personal/showEmpTodos")
    .done(function(data) {
      // console.log(data);
      var html = data
        .map(function(elem) {
          return `<tr>
                    <td>${elem.usu_ci}</td>
                    <td align="left">${
                      elem.usu_appaterno
                    } ${elem.usu_apmaterno}, ${elem.usu_nombre}</td>
                    <td>${veriNull(elem.di_profecion)}</td>
                    <td>${elem.uc_area}</td>
                    <td>${elem.usu_area}</td>
                    <td>
                        <span class="tooltip-area">
                        <a class="btn btn-default btn-sm" title="Faltas Permisos" onclick="showUserFalPerm(${
                          elem.id
                        })"><i class="fa fa-exclamation"></i></a>
                        <a class="btn btn-default btn-sm" title="Vacaciones" onclick="showUserVacaciones(${
                          elem.id
                        })"><i class="fa fa-tag"></i></a>
                        <a class="btn btn-default btn-sm" title="Datos Registrados" onclick="showDatosEmp(${
                          elem.id
                        })"><i class="fa fa-user"></i></a>
                        <a class="btn btn-default btn-sm" title="Doc presentados" onclick="showDocUser()"><i class="fa fa-archive"></i></a>
                        <a class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                    </tr>`;
        })
        .join(" ");
      document.getElementById("tableUser").innerHTML = html;
    })
    .fail(function() {
      notif("1", "ERROR SERVER LTE");
    });
}

function showDatosEmp(id) {
  $.get("/C.S.J.O.bo/RRHH/personal/showDatosEmp/" + id + "")
    .done(function(elem) {
      var datosEMP = `CI: <strong>${elem.usu_ci}</strong><br>
                  Nombre: <strong>${elem.usu_nombre} </strong><br>
                  Apellidos: <strong>${elem.usu_appaterno} ${elem.usu_apmaterno}</strong> <br>
                  Sexo: <strong>${elem.usu_sexo}</strong><br>
                  Fecha de nacimiento: <strong>${elem.usu_fechnac}</strong><br>
                  Lugar de Nacimiento: <strong>La paz - Bolivia</strong><br>
                  Tipo de sangre: <strong>O+</strong><br><hr>
                  Lugar de trabajo: <strong>CENTRO DE SALUD JESUS OBRERO</strong><br><hr>
                  Email: <strong>${elem.email}</strong><br>
                  Estado Civil: <strong>${elem.usu_estadocivil}</strong><br>
                  Telf/Cel: <strong>${elem.usu_telf}</strong><br>
                  Telf/Cel referencia: <strong>${elem.usu_telfref}</strong> <br>
                  Zona de sufragio: <strong>${elem.usu_zonaSufragio}</strong><br>
                  Zona: <strong>${elem.usu_zona}</strong><br>
                  Domicilio: <strong>${elem.usu_domicilio}</strong><br><hr>
                  Lugar donde Sufragia: <strong>La paz el alto</strong>
                  `;
      document.getElementById("datosEmp").innerHTML = datosEMP;
      var html2 = `
                Fecha de contratacion: <strong>08-12-2008</strong><br>
                Titulo: <strong>Licenciada</strong><br><hr>
                Area : <strong>${elem.usu_area}</strong><br>
                Cargo: <strong>${elem.usu_cargo} </strong><br>
                Tipo de Contrato: <strong>En planta</strong><br><hr>
                Acceso al sistema: <strong>SI</strong><br><hr>
                <h4>Informacion de la entidad de seguro de corto y largo plazo </h4> <br>
                Nombre de la institucion: <strong>Previcion</strong> <br>
                # de NUA: <strong>868768</strong> <br>
                # de asegurado C.N.S: <strong>8767865765</strong> <br>
                `;
      document.getElementById("datosInst").innerHTML = html2;
      $("#md-stack1")
        .addClass("md-flipHor")
        .modal("show");
    })
    .fail(function() {
      notif("2", "ERROR SERVER");
    });
}

function showDatos() {
  $("#md-stack2")
    .addClass("md-flipHor")
    .modal("show");
}

function showEditDat1User() {
  $("#md-editDatUser")
    .addClass("md-flipHor")
    .modal("show");
}

function showEditDat2User() {
  $("#md-editDatInstUser")
    .addClass("md-flipHor")
    .modal("show");
}

function showDocUser() {
  $("#md-DocUser")
    .addClass("md-flipHor")
    .modal("show");
}

function showUserVacaciones() {
  $("#md-UserVacaciones")
    .addClass("md-flipHor")
    .modal("show");
}

function showUserFalPerm(codUsu1) {
  document.getElementById("listFaltasPermisos").innerHTML = "";
  document.getElementById("sectorBottonFaltasPermisos").innerHTML = "";
  document.getElementById("codUsu1").value = "";
  document.getElementById("codUsu1").value = codUsu1;
  $("#md-UserFalPer")
    // .addClass("md-flipHor")
    .modal("show");
}

function listFaltas() {
  var boton = `<button class="btn btn-theme" id="" onClick="SMNfalta()">Registrar Falta</button>`;
  var headHtml = `<tr>
  <th>Cod Doc</th>
  <th>Motivo</th>
  <th>Fecha</th>
  <th>Horario</th>
  <th>*</th>
  </tr>`;
  document.getElementById("sectorBottonFaltasPermisos").innerHTML = boton;
  document.getElementById("head-listFaltasPermisos").innerHTML = headHtml;
  var data = { userId: $("#codUsu1").val() };
  $.get("/C.S.J.O.bo/RRHH/personal/faltas/list", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    console.log(data);
    var html = data
      .map(function(e) {
        return `<tr>
       <td>${e.uf_codDoc}</td>
       <td>${e.uf_motivo}</td>
       <td>${moment(e.uf_fecha).format("DD/MM/YYYY")}</td>
       <td>${e.uf_horario}</td>
       <td>
       <span class="tooltip-area">
       <a class="btn btn-default btn-sm" title="Editar" onclick="ShowModalEditFalta(${
         e.id
       })"><i class="fa fa-pencil"></i></a>
       <a class="btn btn-default btn-sm" title="Eliminar" onclick="permisoDestroy(${
         e.id
       })"><i class="fa fa-trash-o"></i></a>
       </span>
     </td>
   </tr>`;
      })
      .join(" ");
    document.getElementById("listFaltasPermisos").innerHTML = html;
  });
}

function listPermisos() {
  var boton = `<button class="btn btn-theme" onClick="SMRPermisos()">Registrar Permiso</button>`;
  document.getElementById("sectorBottonFaltasPermisos").innerHTML = boton;
  var headhtml = `<tr>
  <th>Cod Doc</th>
  <th>Motivo</th>
  <th>Remplazo</th>
  <th>Fecha de Solicitud</th>
  <th>Fecha a Solicitar</th>
  <th>Tiempo</th>
  <th>*</th>
  </tr>`;
  document.getElementById("head-listFaltasPermisos").innerHTML = headhtml;
  var data = { userId: $("#codUsu1").val() };
  $.get("/C.S.J.O.bo/RRHH/personal/permiso/show", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    var html = data
      .map(function(e) {
        return `<tr>
                  <td>${e.up_codRespaldoDoc}</td>
                  <td>${e.up_motivo}</td>
                  <td>${e.up_remplazo}</td>
                  <td>${moment(e.up_fechaSolicitud).format("DD/MM/YYYY")}</td>
                  <td>${moment(e.up_fechaPermiso).format("DD/MM/YYYY")}</td>
                  <td>${e.up_horaInicio} - ${e.up_horaFinal}</td>
                  <td>
                    <span class="tooltip-area">
                    <a class="btn btn-default btn-sm" title="Editar" onclick="ShowModalEditPermiso(${
                      e.id
                    })"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-default btn-sm" title="Eliminar" onclick="permisoDestroy(${
                      e.id
                    })"><i class="fa fa-trash-o"></i></a>
                    </span>
                  </td>
                </tr>`;
      })
      .join(" ");
    document.getElementById("listFaltasPermisos").innerHTML = html;
  });
}

function listCambioTurno() {
  var boton = `<button class="btn btn-theme" id="">Registrar Cambio de turno</button>`;
  var html = `<tr>
                <td>12-06-2018 // 20-06-2018</td>
                <td>8</td> 
                <td>Permiso</td>
                <td>Solicitud de falta</td>
                <td></td>
            </tr>`;
  document.getElementById("listFaltasPermisos").innerHTML = html;
  document.getElementById("sectorBottonFaltasPermisos").innerHTML = boton;
}

function limpiarFomrUserCreate() {
  $("#md-createUser2").modal("hide");
  $("#md-createUser").modal("hide");
}

function prubb() {
  $.get("/C.S.J.O.bo/RRHH/personal/22")
    .done(function(data) {
      console.log(data);
    })
    .fail(function(data) {
      console.log(data);
    });
}

function jose(params) {
  notif("1", "hola");

  if (condition) {
    var a = 1 + 1;
  }
}

function marww(data) {
  return data;
}

// ? funciones para permisos de personal
function SMRPermisos() {
  $("#md-permisos1").modal("show");
  $("#formCreatePermiso").trigger("reset");
}

function permisoCreate() {
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    codUsu1: $("#codUsu1").val(),
    motivo: $("#motivo").val(),
    remplazo: $("#remplazo").val(),
    fechaSolicitud: $("#fechaSolicitud").val(),
    fechaPermiso: $("#fechaPermiso").val(),
    horaInicio: $("#horaInicio").val(),
    horaFinal: $("#horaFinal").val(),
    codRespaldoDoc: $("#codRespaldoDoc").val()
  };
  $.post("/C.S.J.O.bo/RRHH/personal/permiso/create", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    if (data == "success") {
      $("#md-permisos1").modal("toggle");
      notif("1", "Permiso registrado Exitosamente.");
      listPermisos();
    } else {
      notif("2", "Error!, Vuelva a intentarlo");
    }
  }).fail(function() {
    console.log("error de server 987");
  });
}
function ShowModalEditPermiso(idPermiso) {
  var data = { id: idPermiso };
  $.get("/C.S.J.O.bo/RRHH/personal/permiso/edit", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    $("#CodPermisoUp").val(data.id);
    $("#motivoUp").val(data.up_motivo);
    $("#remplazoUp").val(data.up_remplazo);
    $("#fechaSolicitudUp").val(data.up_fechaSolicitud);
    $("#fechaPermisoUp").val(data.up_fechaPermiso);
    $("#horaInicioUp").val(data.up_horaInicio);
    $("#horaFinalUp").val(data.up_horaFinal);
    $("#codRespaldoDocUp").val(data.up_codRespaldoDoc);
  }).fail(function() {});
  $("#md-permisos2").modal("show");
}
function permisoUpdate(param) {
  data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    id: $("#CodPermisoUp").val(),
    up_motivo: $("#motivoUp").val(),
    up_remplazo: $("#remplazoUp").val(),
    up_fechaSolicitud: $("#fechaSolicitudUp").val(),
    up_fechaPermiso: $("#fechaPermisoUp").val(),
    up_horaInicio: $("#horaInicioUp").val(),
    up_horaFinal: $("#horaFinalUp").val(),
    up_codRespaldoDoc: $("#codRespaldoDocUp").val()
  };
  $.post("/C.S.J.O.bo/RRHH/personal/permiso/update", data, function(
    dat,
    textStatus,
    jqXHR
  ) {
    console.log(dat);
    listPermisos();
    document.getElementById("btn-md-permisos1-close").click();
  }).fail(function() {
    notif("2", "error server ACP");
  });
}

function permisoDestroy(id) {
  var data = { id: id };
  $.get("/C.S.J.O.bo/RRHH/personal/permiso/destroy", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    if (data == "success") {
      notif("1", "Permiso eliminado, Exitosamente");
      listPermisos();
    } else {
      notif("2", "Error. Server 401");
    }
  });
}

//?------
function SMNfalta(id) {
  $("#md-faltaCreate").modal("show");
  $("#formCreateFalta").trigger("reset");
}
function createFalta() {
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    codUsu1: $("#codUsu1").val(),
    uf_motivo: $("#FaltaMotivo").val(),
    uf_fecha: $("#FaltaFecha").val(),
    uf_horario: $("#FaltaHorario").val(),
    uf_codDoc: $("#FaltaCodDoc").val()
  };
  $.post("/C.S.J.O.bo/RRHH/personal/faltas/create", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    console.log(data);
    if (data == "success") {
      notif("1", "Falta registrada");
      listFaltas();
      document.getElementById("btn-md-falta1-close").click();
    } else {
      notif("2", "Error. vuelva a intentarlo");
    }
  });
}
function ShowModalEditFalta(idFalta) {
  var data = { id: idFalta };
  $.get("/C.S.J.O.bo/RRHH/personal/faltas/edit", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    console.log(data);
    document.getElementById("CodfaltaUp").value = data.id;
    document.getElementById("FaltaMotivoUp").value = data.uf_motivo;
    document.getElementById("FaltaFechaUp").value = data.uf_fecha;
    document.getElementById("FaltaHorarioUp").value = data.uf_horario;
    document.getElementById("FaltaCodDocUp").value = data.uf_codDoc;
    $("#md-faltaEdit").modal("show");
  });
}
function updateFalta() {
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    id: $("#CodfaltaUp").val(),
    uf_codDoc: $("#FaltaCodDocUp").val(),
    uf_motivo: $("#FaltaMotivoUp").val(),
    uf_fecha: $("#FaltaFechaUp").val(),
    uf_horario: $("#FaltaHorarioUp").val()
  };
  $.post("/C.S.J.O.bo/RRHH/personal/faltas/update", data,
    function (data, textStatus, jqXHR) {
     if (data=="success") {
       notif('1','Falta actulizada');
       listFaltas();
       document.getElementById("btn-md-falta2-close").click();
     } else {
       notif('2','Error Vuelva al intentarlo');
     } 
    }
  );
}
function deleteFalta() {
  
  }
