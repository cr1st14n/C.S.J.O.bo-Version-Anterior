console.log("hola");
function showListEmp() {

}
function listTodosEmp() {
    console.log("listara los empleados");
    $.get('/C.S.J.O.bo/RRHH/personal/showEmpTodos').done(function (data) {
        console.log(data);
        var html=data.map(function (elem) {
            return(`<tr>
                    <td>${elem.usu_ci}</td>
                    <td valign="left">${elem.usu_appaterno} ${elem.usu_apmaterno}, ${elem.usu_nombre}</td>
                    <td>${veriNull(elem.usu_especialidad)}</td>
                    <td>${elem.usu_cargo}</td>
                    <td>${elem.usu_area}</td>
                    <td>
                        <span class="tooltip-area">
                        <a class="btn btn-default btn-sm" title="Faltas Permisos" onclick="showUserFalPerm(${elem.id})"><i class="fa fa-exclamation"></i></a>
                        <a class="btn btn-default btn-sm" title="Vacaciones" onclick="showUserVacaciones(${elem.id})"><i class="fa fa-tag"></i></a>
                        <a class="btn btn-default btn-sm" title="Editar" onclick="showDatosEmp(${elem.id})"><i class="fa fa-user"></i></a>
                        <a class="btn btn-default btn-sm" title="Doc presentados" onclick="showDocUser()"><i class="fa fa-archive"></i></a>
                        <a class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                    </tr>`);
        }).join(" ");
        document.getElementById('tableUser').innerHTML=html;
    }).fail(function () {
        notif('1','ERROR SERVER LTE');
    });
}
function showDatosEmp(id) {
    console.log(id);
    $.get('/C.S.J.O.bo/RRHH/personal/showDatosEmp/'+id+'').done(function (elem) {
        console.log(elem.id);
        var datosEMP=`CI: <strong>${elem.usu_ci}</strong><br>
                  Nombre: <strong>${elem.usu_nombre} </strong><br>
                  Apellidos: <strong>${elem.usu_appaterno} ${elem.usu_apmaterno}</strong> <br>
                  Sexo: <strong>${elem.usu_sexo}</strong><br>
                  Fecha de nacimiento: <strong>08-12-1988</strong><br>
                  Lugar de Nacimiento: <strong>La paz - Bolivia</strong><br>
                  Tipo de sangre: <strong>O+</strong><br><hr>
                  Lugar de trabajo: <strong>CENTRO DE SALUD JESUS OBRERO</strong><br><hr>
                  Email: <strong>${elem.email}</strong><br>
                  Estado Civil: <strong>${elem.usu_estadocivil}</strong><br>
                  Telf/Cel: <strong>${elem.usu_telf}</strong><br>
                  Telf/Cel referencia: <strong>${elem.usu_telfref}</strong> <br>
                  Zona: <strong>${elem.usu_zona}</strong><br>
                  Domicilio: <strong>${elem.usu_domicilio}</strong><br><hr>
                  Lugar donde Sufragia: <strong>La paz el alto</strong>
                  `;
        document.getElementById('datosEmp').innerHTML=datosEMP;
        var html2=`
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
        document.getElementById('datosInst').innerHTML=html2;

        $('#md-stack1').addClass("md-flipHor").modal('show');

    }).fail(function () {
        notif('2','ERROR SERVER');
    });

}
function showDatos() {
    $('#md-stack2').addClass('md-flipHor').modal('show');
}
function showEditDat1User() {
    $('#md-editDatUser').addClass('md-flipHor').modal('show');
}
function showEditDat2User() {
    $('#md-editDatInstUser').addClass('md-flipHor').modal('show');
}
function showDocUser() {
    $('#md-DocUser').addClass('md-flipHor').modal('show');
}
function showUserVacaciones() {
    $('#md-UserVacaciones').addClass('md-flipHor').modal('show');
}
function showUserFalPerm() {
    document.getElementById('listFaltasPermisos').innerHTML="";
    document.getElementById('sectorBottonFaltasPermisos').innerHTML="";
    $('#md-UserFalPer').addClass('md-flipHor').modal('show');
}
function listFaltas() {
  var boton=`<button class="btn btn-theme" id="btnRegisFalta">Registrar Falta</button>`;
  var html=`<tr>
                <td>17-05-2018</td>
                <td>1</td>
                <td>Falta</td>
                <td>No se presento a su turno</td>
                <td></td>
            </tr>`;
  document.getElementById('listFaltasPermisos').innerHTML=html;
  document.getElementById('sectorBottonFaltasPermisos').innerHTML=boton;
}
function listPermisos() {
  var boton=`<button class="btn btn-theme" id="btnRegisPerm">Registrar Permiso</button>`;
  var html=`<tr>
                <td>12-06-2018 // 20-06-2018</td>
                <td>8</td> 
                <td>Permiso</td>
                <td>Solicitud de falta</td>
                <td></td>
            </tr>`;
  document.getElementById('listFaltasPermisos').innerHTML=html;
  document.getElementById('sectorBottonFaltasPermisos').innerHTML=boton;
}
function listCambioTurno() {
  var boton=`<button class="btn btn-theme" id="">Registrar Cambio de turno</button>`;
  var html=`<tr>
                <td>12-06-2018 // 20-06-2018</td>
                <td>8</td> 
                <td>Permiso</td>
                <td>Solicitud de falta</td>
                <td></td>
            </tr>`;
  document.getElementById('listFaltasPermisos').innerHTML=html;
  document.getElementById('sectorBottonFaltasPermisos').innerHTML=boton;
}
/* funciones para crud usuarios*/
function showModalCreateUser() {
    $('#md-createUser').addClass('md-flipHor').modal('show');
    $('#formuladio1').trigger("reset");
}
function showModalCreateUser2() {
    $('#formulario2').trigger("reset");
    $('#md-createUser2').addClass('md-flipHor').modal('show');
}
function createUser(tip) {
    switch (tip) {
        case 1 :
            var form= document.getElementById('formuladio1');
            // prubb();
            if (form.checkValidity()){
                showModalCreateUser2();
            } else{
                notif('2','Complete los datos con * !')
            }
        break;
        case 2:
            var form2=document.getElementById('formulario2');
            if (form2.checkValidity()){
                var data=createUser2();
                $.post('/C.S.J.O.bo/RRHH/personal/createUser',data).done(function (rest) {
                    console.log(rest);
                    if (rest==1){
                        notif('1','Usuario registrado!');
                    } else {
                        notif('2','Erro. Vuelva a intentarlo!');
                    }
                }).fail(function () {
                    notif(2,'Error. Reinicie actividad');
                });

            } else{
                notif('2','Completa los campos con *');
            }
        break;
    }
}
function createUser2() {
    var data= { '_token': $('meta[name=csrf-token]').attr('content'),
                'ci':$('#createUserCi').val(),
                'nombre':$('#nombre').val(),
                'apellido1':$('#apellido1').val(),
                'apellido2':$('#apellido2').val(),
                'fechaNacimiento':$('#fechaNacimiento').val(),
                'lugarNacimiento':$('#lugarNacimiento').val(),
                'tipoSangre':$('#tipoSangre').val(),
                'sexo':"MyF",
                'estadoCivil':$('#estadoCivil').val(),
                'telf':$('#telf').val(),
                'telfRef':$('#telfRef').val(),
                'zona':$('#zona').val(),
                'domicilio':$('#domicilio').val(),
        /*datos2*/
                'fechaContratacion':$('#fechaContratacion').val(),
                'tituloOb':$('#tituloOb').val(),
                'profecionOb':$('#profecionOb').val(),
                'areaDesignada':$('#areaDesignada').val(),
                'cargo':$('#cargo').val(),
                'contrato':$('#contrato').val(),
                'accesoSistema':"SyN",
                'seguroNombreInstitucion':$('#seguroNombreInstitucion').val(),
                'numNua':$('#numNua').val(),
                'numCNS':$('#numCNS').val()
    };
    return data;
}
function prubb() {
    $.get('/C.S.J.O.bo/RRHH/personal/22').done(function (data) {
        console.log(data);
    }).fail(function (data) {
        console.log(data);
    })
}