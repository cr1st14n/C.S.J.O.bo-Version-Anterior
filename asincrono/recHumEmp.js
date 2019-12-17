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
$("#formCreateCambioTurno").on("submit", function(e) {
  e.preventDefault();
  CamTurnCreate();
});
$("#formEditCambioTurno").on("submit", function(e) {
  e.preventDefault();
  updateCambTurno();
});
$("#formulario1Up").on("submit", function(e) {
  e.preventDefault();
  updateUser();
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
      if (form2.checkValidity()) {
        var data = createUser2();
        $.post("/C.S.J.O.bo/RRHH/personal/createUser", data)
          .done(function(rest) {
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
      console.log(elem);
      console.log(elem[0]);
      console.log(elem[1]);
      if (elem[0].usu_acceso == 1) {
        var usu_acceso = "Si";
      } else {
        var usu_acceso = "No";
      }

      var datosEMP = `CI: <strong>${elem[0].usu_ci}</strong><br>
                  Nombre: <strong>${elem[0].usu_nombre} </strong><br>
                  Apellidos: <strong>${elem[0].usu_appaterno} ${
        elem[0].usu_apmaterno
      }</strong> <br>
                  Sexo: <strong>${elem[0].usu_sexo}</strong><br>
                  Fecha de nacimiento: <strong>${moment(
                    elem[0].usu_fechnac
                  ).format("D/MM/YYYY")}</strong><br>
                  Lugar de Nacimiento: <strong>${
                    elem[0].usu_depnac
                  }</strong><br>
                  Tipo de sangre: <strong>${
                    elem[0].usu_tipoSangre
                  }</strong><br><hr>
                  Lugar de trabajo: <strong>CENTRO DE SALUD JESUS OBRERO</strong><br><hr>
                  Email: <strong>${elem[0].email}</strong><br>
                  Estado Civil: <strong>${elem[0].usu_estadocivil}</strong><br>
                  Telf/Cel: <strong>${elem[0].usu_telf}</strong><br>
                  Telf/Cel referencia: <strong>${
                    elem[0].usu_telfref
                  }</strong> <br>
                  Zona de sufragio: <strong>${
                    elem[0].usu_zonaSufragio
                  }</strong><br>
                  Zona: <strong>${elem[0].usu_zona}</strong><br>
                  Domicilio: <strong>${elem[0].usu_domicilio}</strong><br><hr>
                  Lugar donde Sufragia: <strong>${elem[0].usu_zonaSufragio}</strong>
                  `;
      document.getElementById("datosEmp").innerHTML = datosEMP;
      var html2 = `
                Fecha de contratacion: <strong>${moment(
                  elem[1].uc_fechaInicio
                ).format("DD-MM-YYYY")}</strong><br>
                Titulo: <strong>${elem[0].di_titulo}</strong><br><hr>
                Area : <strong>${elem[0].usu_area}</strong><br>
                Cargo: <strong>${elem[1].uc_cargoDesignado} </strong><br>
                Tipo de Contrato: <strong>${
                  elem[1].uc_tipoContrato
                }</strong><br><hr>
                Acceso al sistema: <strong>${usu_acceso}</strong><br><hr>
                <h4>Informacion de la entidad de seguro de corto y largo plazo </h4> <br>
                Nombre de la institucion: <strong>${
                  elem[0].di_seguroNombre
                }</strong> <br>
                # de NUA: <strong>${elem[0].di_seguroNua}</strong> <br>
                # de asegurado C.N.S: <strong>${
                  elem[0].di_seguroCns
                }</strong> <br>
                `;
      document.getElementById("datosInst").innerHTML = html2;
      var boton = `<button type="button" class="btn btn-theme" onclick="showEditDat1User(${elem[0].id})">Actualizar Datos</button>`;
      document.getElementById("datosEditButon").innerHTML = boton;
      $("#md-stack1")
        .addClass("md-flipHor")
        .modal("show");
    })
    .fail(function() {
      notif("2", "ERROR SERVER");
    });
}

function showEditDat1User(id) {
  $("#idEdituser").val();
  data = { id: id };
  $.get("/C.S.J.O.bo/RRHH/personal/editDatos1Emp/", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    console.log(data);
    $("#idEdituser").val(data.id);
    $("#createUserCiUp").val(data.usu_ci),
      $("#nombreUp").val(data.usu_nombre),
      $("#apellido1Up").val(data.usu_appaterno),
      $("#apellido2Up").val(data.usu_apmaterno),
      document.querySelector("input[name=sexo]:checked").value,
      $("#fechaNacimientoUp").val(data.usu_fechnac),
      $("#paisNacimientoUp").val(data.usu_paisnac),
      $("#depNacimientoUp").val(data.usu_depnac),
      $("#tipoSangreUp").val(data.usu_tipoSangre),
      $("#estadoCivilUp").val(data.usu_estadocivil),
      $("#telfUp").val(data.usu_telf),
      $("#telfRefUp").val(data.usu_telfref),
      $("#zonaUp").val(data.usu_zona),
      $("#domicilioUp").val(data.usu_domicilio),
      $("#zonaSufragioUp").val(data.usu_zonaSufragio),
      $("#emailUp").val(data.email);
  });
  $("#md-editDatUser").modal("show");
}

function updateUser() {
  var cons = $("#idEdituser").val(data.id);
  if (cons != null) {
    console.log("se peude actualizar");
    var dato={
      _token: $("meta[name=csrf-token]").attr("content"),
      'idEdituser':$("#idEdituser").val(),
      'createUserCiUp':$("#createUserCiUp").val(),
        'nombreUp':$("#nombreUp").val(),
        'apellido1Up':$("#apellido1Up").val(),
        'apellido2Up':$("#apellido2Up").val(),
        'sexoUp':document.querySelector("input[name=sexo]:checked").value,
        'fechaNacimientoUp':$("#fechaNacimientoUp").val(),
        'paisNacimientoUp':$("#paisNacimientoUp").val(),
        'depNacimientoUp':$("#depNacimientoUp").val(),
        'tipoSangreUp':$("#tipoSangreUp").val(),
        'estadoCivilUp':$("#estadoCivilUp").val(),
        'telfUp':$("#telfUp").val(),
        'telfRefUp':$("#telfRefUp").val(),
        'zonaUp':$("#zonaUp").val(),
        'domicilioUp':$("#domicilioUp").val(),
        'zonaSufragioUp':$("#zonaSufragioUp").val(),
        'emailUp':$("#emailUp").val()
    }
    $.post("/C.S.J.O.bo/RRHH/personal/updateDatos1Emp", dato,
      function (data, textStatus, jqXHR) {
       console.log(data); 
      }
    );


  } else {
    console.log("NO peude actualizar");
  }
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
       <a class="btn btn-default btn-sm" title="Eliminar" onclick="deleteFalta(${
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
  var boton = `<button class="btn btn-theme" onClick="SMCambioTurno()">Registrar Cambio de turno</button>`;
  document.getElementById("sectorBottonFaltasPermisos").innerHTML = boton;
  var headhtml = `<tr>
  <th>Cod Doc</th>
  <th>Motivo</th>
  <th>Remplazo</th>
  <th>Fecha de Solicitud</th>
  <th>Fecha a Solicitar</th>
  <th>Horario</th>
  <th>*</th>
  </tr>`;
  document.getElementById("head-listFaltasPermisos").innerHTML = headhtml;
  var dat = { id: $("#codUsu1").val() };
  $.get("/C.S.J.O.bo/RRHH/personal/cambioTurno/list", dat, function(data) {
    var html = data
      .map(function(e) {
        return `<tr>
        <td>${e.uct_codDoc}</td>
        <td>${e.uct_motivo}</td>
        <td>${e.cod_usu2}</td>
        <td>${moment(e.ca_fecha).format("DD/MM/YYYY")}</td>
        <td>${moment(e.uct_fecha).format("DD/MM/YYYY")}</td>
        <td>${e.uct_horario}</td>
        <td>
        <span class="tooltip-area">
        <a class="btn btn-default btn-sm" title="Editar" onclick="showModalCambioturno(${
          e.id
        })"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-default btn-sm" title="Eliminar" onclick="deleteCambTurn(${
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
  $.post("/C.S.J.O.bo/RRHH/personal/faltas/update", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    if (data == "success") {
      notif("1", "Falta actulizada");
      listFaltas();
      document.getElementById("btn-md-falta2-close").click();
    } else {
      notif("2", "Error Vuelva al intentarlo");
    }
  });
}
function deleteFalta(id) {
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    id: id
  };
  var r = confirm("Confirma eliminar El registro de falta?");
  if (r == true) {
    console.log(data);
    $.post("/C.S.J.O.bo/RRHH/personal/faltas/delete", data, function(
      data,
      textStatus,
      jqXHR
    ) {
      if (data == "success") {
        notif("1", "Falta, eliminada");
        listFaltas();
      } else {
        notif("2", "Error. Vuelva a intentarlo");
      }
    });
  }
}
// *......... JS CAMBIO DE TURNO
function SMCambioTurno(param) {
  $("#md-cambioTurno1").modal("show");
  $("#formCreateCambioTurno").trigger("reset");
}
function CamTurnCreate() {
  console.log("hola");
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    cod_usu: $("#codUsu1").val(),
    cod_usu2: $("#CTremplazo").val(),
    uct_codDoc: $("#CTcodRespaldoDoc").val(),
    uct_motivo: $("#CTmotivo").val(),
    uct_fecha: $("#CTfechaPermiso").val(),
    uct_horario: $("#CThorario").val()
  };
  $.post("/C.S.J.O.bo/RRHH/personal/cambioTurno/create", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    console.log(data);
    if (data == "success") {
      listCambioTurno();
      document.getElementById("btn-md-cambturno1").click();
      notif("1", "Registrado exitosamente");
    } else {
      notif("2", "Error, Vuela a intentarlo");
    }
  });
}

function showModalCambioturno(id) {
  var dat = { id: id };
  $.get("/C.S.J.O.bo/RRHH/personal/cambioTurno/edit", dat, function(
    data,
    textStatus,
    jqXHR
  ) {
    $("#CodCambTurnUp").val(data.id);
    $("#ctmotivoUp").val(data.uct_motivo);
    $("#ctremplazoUp").val(data.cod_usu2);
    $("#ctfechaPermisoUp").val(data.uct_fecha);
    $("#ctcodRespaldoDocUp").val(data.uct_codDoc);
    $("#CThorarioUp").val(data.uct_horario);
    $("#md-cambioTurno2").modal("show");
  });
}

function updateCambTurno(param) {
  var data = {
    _token: $("meta[name=csrf-token]").attr("content"),
    id: $("#CodCambTurnUp").val(),
    uct_motivo: $("#ctmotivoUp").val(),
    cod_usu2: $("#ctremplazoUp").val(),
    uct_fecha: $("#ctfechaPermisoUp").val(),
    uct_codDoc: $("#ctcodRespaldoDocUp").val(),
    uct_horario: $("#CThorarioUp").val()
  };
  $.post("/C.S.J.O.bo/RRHH/personal/cambioTurno/update", data, function(
    data,
    textStatus,
    jqXHR
  ) {
    if (data) {
      notif("1", "Actualizado");
      listCambioTurno();
      document.getElementById("btn-md-cambturno2").click();
    } else {
      notif("2", "Error!, vuelva a intentarlo");
    }
  });
}
function deleteCambTurn(id) {
  var r = confirm("Eliminar registro?");
  if (r == true) {
    var data = {
      _token: $("meta[name=csrf-token]").attr("content"),
      id: id
    };
    $.post("/C.S.J.O.bo/RRHH/personal/cambioTurno/delete", data, function(
      data,
      textStatus,
      jqXHR
    ) {
      if (data == "success") {
        notif("1", "Registro, eliminado");
        listCambioTurno();
      } else {
        notif("2", "Error. Vuelva a intentarlo");
      }
    });
  }
}

// document.onkeypress=function (e) {
//   e = e || window.event;
//   var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
//   alert("Character typed: " + String.fromCharCode(charCode));
//   if (charCode) {
//   }
//  }
//  $(window).on('keypress', function(e) {

//   var code = (e.keyCode ? e.keyCode : e.which);
//   var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
// alert("Character typed: " + String.fromCharCode(charCode));
//   console.log(String.fromCharCode(charCode));
//   if(code == 13) {

// }

// });
