var title = document.getElementById("title-solicitud");
var id = document.getElementById("id_solicitud");
var persona = document.getElementById("persona");
var date = document.getElementById("fecha_solicitud");
var aprobar = document.getElementById("aprobar");
var rechazar = document.getElementById("rechazar");
var id_familia = document.getElementById("id_familia");
var solicitante= new Object();
solicitante['correo']=document.getElementById("correo_solicitante").value;

rechazar.onclick = function () {
  var textoSwal =
    "Está por rechazar la solicitud de un registro de familia ¿desea continuar?<br><br>";
  textoSwal +=
    "<textArea class='form-control' placeholder='Motivo de rechazo' id='text-area'></textArea><br>";
  textoSwal += "<div style='color:red' id='valid-text-area'></div>";

  swal(
    {
      title: "Atención",
      type: "warning",
      text: textoSwal,
      showCancelButton: true,
      confirmButtonText: "Si, rechazar",
      cancelButtonText: "No, cancelar",
      closeOnConfirm: false,
      html: true,
    },
    function (isConfirm) {
      if (isConfirm) {
        //eliminarSolicitud();
        if (document.getElementById("text-area").value == "") {
          document.getElementById("text-area").focus();
          document.getElementById("text-area").style.borderColor = "red";
          document.getElementById("valid-text-area").innerHTML =
            "Debe ingresar el motivo del rechazo de la solicitud";
        } else {
          var motivo_rechazo = document.getElementById("text-area").value;
          document.getElementById("valid-text-area").innerHTML = "";
          document.getElementById("text-area").style.borderColor = "";
          document.getElementById("text-area").blur();
          rechazoSolicitud(document.getElementById("text-area").value,id_familia.value);
          var datos_notificacion = new Object();
          datos_notificacion["tipo_notificacion"] = 5;
          datos_notificacion["usuario_receptor"] =
            document.getElementById("cedula_solicitante").value;
          datos_notificacion["accion"] =
            "Rechazó su solicitud para registro de familia debido a ``" +
            document.getElementById("text-area").value +
            "´´.";

          console.log(datos_notificacion);
          nueva_notificacion(datos_notificacion);
          swal({
            title: "Exito",
            text: "La solicitud ha sido rechazada",
            type: "success",
            showConfirmButton: false,
            timer: 2000,
          });

          solicitante["asunto"] = "Se ha rechazado su solicitud";
          solicitante["mensaje"] =
            "Su solicitud para registro de familia ha sido rechazada. El motivo del rechazo es: " +
            motivo_rechazo;

          if (solicitante['correo']!= "No posee") {
            document.getElementById("btn_correo").click();
          }
          else{
            setTimeout(function(){location.href=BASE_URL+"Solicitudes/"},1000);
          }

        }
      }
    }
  );
};

aprobar.onclick = function () {
  var fecha_actual = new Date();
  fecha_actual =
    fecha_actual.getDate() +
    "-" +
    (fecha_actual.getMonth() + 1) +
    "-" +
    fecha_actual.getFullYear();

        $.ajax({
          type: "POST",
          url: BASE_URL + "Solicitudes/Set_status",
          data: {
            id: id.value,
            procesada: 1,
            observaciones: "Aprobada el " + fecha_actual,
          },
        }).done(function(){
          $.ajax({
            type: "POST",
            url: BASE_URL + "Familias/activar_familia",
            data: {
              "id_familia": id_familia.value,
            },
          }).done(function(result){
          })   
        });

        swal({
          title: "Exito",
          text: "La solicitud ha sido aprobada",
          type: "success",
          showConfirmButton: false,
          timer: 2000,
        });

        var datos_notificacion = new Object();
        datos_notificacion["tipo_notificacion"] = 4;
        datos_notificacion["usuario_receptor"] =  document.getElementById("cedula_solicitante").value;
        datos_notificacion["accion"] =
          "Aprobó su solicitud para registro de familia.";

        console.log(datos_notificacion);

        solicitante["asunto"] = "Se ha aprobado su solicitud";
        solicitante["mensaje"] =
          "Su solicitud para registro de familia ha sido aprobada.";

          nueva_notificacion(datos_notificacion);

        if (solicitante["correo"] != "No posee") {
          document.getElementById("btn_correo").click();
        }{
          setTimeout(function(){location.href=BASE_URL+"Solicitudes/"},1000);
        }


        // setTimeout(function(){

        //   print_pdf();
        //   window.open(BASE_URL+"Solicitudes/");

        // },1000);
      }

function rechazoSolicitud(motivo) {
  var fecha_actual = new Date();
  fecha_actual =
    fecha_actual.getDate() +
    "-" +
    (fecha_actual.getMonth() + 1) +
    "-" +
    fecha_actual.getFullYear();

  $.ajax({
    type: "POST",
    url: BASE_URL + "Solicitudes/Set_status",
    data: {
      id: id.value,
      procesada: 2,
      observaciones: "Rechazada el " + fecha_actual + "/" + motivo,
    },
  }).done(function(){
    $.ajax({
      type: "POST",
      url: BASE_URL + "Familias/eliminar_familia",
      data: {
        "id": id_familia.value
      },
    });
  });
}


function getMes(mesNro) {
  var mesRetornar = "";

  switch (mesNro) {
    case 1:
      mesRetornar = "Enero";
      break;
    case 2:
      mesRetornar = "Febrero";
      break;
    case 3:
      mesRetornar = "Marzo";
      break;
    case 4:
      mesRetornar = "Abril";
      break;
    case 5:
      mesRetornar = "Mayo";
      break;
    case 6:
      mesRetornar = "Junio";
      break;
    case 7:
      mesRetornar = "Julio";
      break;
    case 8:
      mesRetornar = "Agosto";
      break;
    case 9:
      mesRetornar = "Septiembre";
      break;
    case 10:
      mesRetornar = "Octubre";
      break;
    case 11:
      mesRetornar = "Noviembre";
      break;
    default:
      mesRetornar = "Diciembre";
      break;
  }

  return mesRetornar;
}

function getAntiguedad(anios) {
  var tiempo = new Date(anios);
  tiempo = new Date().getFullYear() - tiempo.getFullYear();

  return tiempo;
}

(function () {
  emailjs.init("user_HmtuJhVZ1daCClSuC185g");
})();
const vue = new Vue({
  el: "#app",
  data() {
    return {
      from_name: "",
      from_email: "",
      message: "",
      subject: "",
    };
  },
  methods: {
    enviar() {
      let data = {
        from_name: "C.C Prados de Occidente",
        from_email: solicitante["correo"],
        message: solicitante["mensaje"],
        subject: solicitante["sujeto"],
      };

      emailjs.send("service_rbn54tj", "template_vqh9lqb", data).then(
        function (response) {
          if (response.text === "OK") {
            location.href = BASE_URL + "Solicitudes/";
          }
          console.log(
            "Exito. status=%d, text=%s",
            response.status,
            response.text
          );
        },
        function (err) {
          console.log("Fallo. error=", err);
          location.href = BASE_URL + "Solicitudes/";
        }
      );
    },
  },
});
