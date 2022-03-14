function Eliminar(id, id_servicio) {
  swal(
    {
      type: "warning",
      title: "Atención",
      text: "Estás por eliminar esta vivienda, ¿Deseas continuar?",
      showCancelButton: true,
      cancelButtonText: "No",
      confirmButtonText: "Si",
    },
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          type: "POST",
          url: BASE_URL + "Viviendas/eliminacion_logica",
          data: { id_vivienda: id },
        }).done(function (result) {
          console.log(result);
          if (result) {
            swal({
              type: "success",
              title: "Enhorabuena",
              text: "Se ha eliminado la vivienda",
              timer: 2000,
              showConfirmButton: false,
            });

            setTimeout(function () {
              location.reload();
            }, 1000);
          }
        });
      }
    }
  );
}

function Ver(valores, techos, pisos, paredes, gas, electrodomesticos) {
  //	console.log(gas);
  //	console.log(electrodomesticos);

  var values = JSON.parse(valores);
  var tipo_techos = JSON.parse(techos);
  var tipo_pisos = JSON.parse(pisos);
  var tipo_paredes = JSON.parse(paredes);
  var gas_v = JSON.parse(gas);
  var electrodomestico_v = JSON.parse(electrodomesticos);

  var texto_tabla =
    "<center><em style='font-size:60px' class='fa fa-home'></em><br><br>";
  texto_tabla +=
    "<table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
  texto_tabla +=
    "<td style='width:25%'>Calle</td><td style='width:25%'>Dirección</td><td style='width:25%'>Tipo de vivienda</td><td style='width:25%'>Familia</td></tr>";

  texto_tabla +=
    "<tr><td style='width:25%'><em class='fa fa-road'></em> " +
    values["nombre_calle"] +
    "</td><td style='width:25%'><em class='fa fa-map-marker'></em> " +
    values["direccion_vivienda"] +
    "</td>";
  texto_tabla +=
    "<td style='width:25%'><em class='fa fa-home'></em> " +
    values["nombre_tipo_vivienda"] +
    "</td><td style='width:25%'><em class='fa fa-users'></em> " +
    values["familia"] +
    "</td></tr>";
  texto_tabla += "</table>";

  texto_tabla +=
    "<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
  texto_tabla +=
    "<td style='width:25%'>Espacio de Siembra</td><td style='width:25%'>Hacinamiento</td><td style='width:25%'>Baño sanitario</td><td style='width:25%'>Condición</td></tr>";

  texto_tabla +=
    "<tr><td style='width:25%'><em class='fa fa-tree'></em> " +
    get_letras(values["espacio_siembra"]) +
    "</td><td style='width:25%'><em class='fa fa-users'></em> " +
    get_letras(values["hacinamiento"]) +
    "</td>";
  texto_tabla +=
    "<td style='width:25%'><em class='fa fa-bath'></em> " +
    get_letras(values["banio_sanitario"]) +
    "</td><td style='width:25%'><em class='fa fa-check-square'></em> " +
    values["condicion"] +
    "</td></tr>";
  texto_tabla += "</table>";

  texto_tabla +=
    "<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
  texto_tabla +=
    "<td style='width:25%'>Descripción de condición</td><td style='width:25%'>Cantidad habitaciones</td><td style='width:25%'>Animales domésticos</td><td style='width:25%'>Insectos o roedores</td></tr>";

  texto_tabla +=
    "<tr><td style='width:25%'><em class='fa fa-comment'></em> " +
    values["descripcion"] +
    "</td><td style='width:25%'><em class='fa fa-bed'></em> " +
    values["cantidad_habitaciones"] +
    "</td>";
  texto_tabla +=
    "<td style='width:25%'><em class='fa fa-paw'></em> " +
    get_letras(values["animales_domesticos"]) +
    "</td><td style='width:25%'><em class='fa fa-bug'></em> " +
    get_letras(values["insectos_roedores"]) +
    "</td></tr>";
  texto_tabla += "</table>";

  texto_tabla +=
    "<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
  texto_tabla +=
    "<td style='width:33%'>Servicios</td><td style='width:33%'>Techo</td><td style='width:33%'>Pared</td></tr>";

  texto_tabla +=
    "<tr><td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
  texto_tabla +=
    "<em class='fa fa-tint'></em> Agua consumo: " +
    values["agua_consumo"] +
    "<br><hr>";
  texto_tabla +=
    "<em class='fa fa-trash'></em> Residuos sólidos: " +
    values["residuos_solidos"] +
    "<br><hr>";
  texto_tabla +=
    "<em class='fa fa-tint'></em> Aguas negras: " +
    values["aguas_negras"] +
    "<br><hr>";
  texto_tabla +=
    "<em class='fa fa-phone'></em> Cable telefónico: " +
    get_letras(values["cable_telefonico"]) +
    "<br><hr>";
  texto_tabla +=
    "<em class='fa fa-wifi'></em> Internet: " +
    get_letras(values["internet"]) +
    "<br><hr>";
  texto_tabla +=
    "<em class='fa fa-plug'></em> Servicio eléctrico: " +
    get_letras(values["servicio_electrico"]) +
    "</div></td>";

  texto_tabla +=
    "<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
  for (var i = 0; i < tipo_techos.length; i++) {
    texto_tabla +=
      "<em class='fa fa-hand-pointer-o'></em>" +
      tipo_techos[i]["techo"] +
      "<br><hr>";
  }
  texto_tabla += "</div></td>";

  texto_tabla +=
    "<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
  for (var i = 0; i < tipo_pisos.length; i++) {
    texto_tabla +=
      "<em class='fa fa-hand-stop-o'></em>" +
      tipo_pisos[i]["pared"] +
      "<br><hr>";
  }
  texto_tabla += "</div></td></tr>";

  texto_tabla += "</table>";

  texto_tabla +=
    "<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
  texto_tabla +=
    "<td style='width:33%'>Piso</td><td style='width:33%'>Gas</td><td style='width:33%'>Electrodomésticos</td></tr>";

  texto_tabla +=
    "<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
  for (var i = 0; i < tipo_paredes.length; i++) {
    texto_tabla +=
      "<em class='fa fa-hand-o-down'></em> " +
      tipo_paredes[i]["piso"] +
      "<br><hr>";
  }
  texto_tabla += "</div></td>";

  texto_tabla +=
    "<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
  for (var i = 0; i < gas_v.length; i++) {
    texto_tabla +=
      "<em class='fa fa-fire'></em> " +
      gas_v[i]["nombre_servicio_gas"] +
      "<br><hr>";
  }
  texto_tabla += "</div></td>";

  texto_tabla +=
    "<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
  for (var i = 0; i < electrodomestico_v.length; i++) {
    texto_tabla +=
      "<em class='fa fa-cogs'></em> " +
      electrodomestico_v[i]["nombre_electrodomestico"] +
      "<br><hr>";
  }
  texto_tabla += "</div></td></tr></table>";

  texto_tabla =
    "<div style='overflow-y:scroll;width:100%;height:400px;'>" +
    texto_tabla +
    "</div>";

  swal({
    title: "Casa Nro " + values["numero_casa"],
    text: texto_tabla,
    html: true,
    customClass: "bigSwalV2",
  });
}

function get_letras(dato) {
  if (parseInt(dato) == 0) {
    return "No";
  } else {
    return "Si";
  }
}

var id_vivienda="";
function Modificar(
  id,
  vivienda,
  techos,
  paredes,
  pisos,
  gas,
  electrodomesticos
) {
  vivienda = JSON.parse(vivienda);
  techos = JSON.parse(techos);
  id_vivienda=id;
  gas = JSON.parse(gas);
  document.getElementById("id_calle").value = vivienda["id_calle"];
  document.getElementById("direccion_vivienda").value =
    vivienda["direccion_vivienda"];
  document.getElementById("numero_casa").value = vivienda["numero_casa"];
  document.getElementById("cantidad_habitaciones").value =
    vivienda["cantidad_habitaciones"];
  document.getElementById("id_tipo_vivienda").value =
    vivienda["nombre_tipo_vivienda"];
  document.getElementById("condicion").value = vivienda["condicion"];
  document.getElementById("hacinamiento").value = vivienda["hacinamiento"];
  document.getElementById("espacio_siembra").value =
    vivienda["espacio_siembra"];
  document.getElementById("banio_sanitario").value =
    vivienda["banio_sanitario"];
  document.getElementById("agua_consumo").value = vivienda["agua_consumo"];
  document.getElementById("aguas_negras").value = vivienda["aguas_negras"];
  document.getElementById("residuos_solidos").value =
    vivienda["residuos_solidos"];
  document.getElementById("servicio_electrico").value =
    vivienda["servicio_electrico"];
  document.getElementById("cable_telefonico").value =
    vivienda["cable_telefonico"];
  document.getElementById("internet").value = vivienda["internet"];
  gas.length == 0
    ? (document.getElementById("gas").value = 0)
    : (document.getElementById("gas").value = 1);
  document.getElementById("animales_domesticos").value =
    vivienda["animales_domesticos"];
  document.getElementById("insectos_roedores").value =
    vivienda["insectos_roedores"];
  document.getElementById("descripcion").value = vivienda["descripcion"];
  cargar_techos(id);
  cargar_paredes(id);
  cargar_pisos(id);

  console.log(techos);

  $("#editar_vivienda").modal("show");
}

function cargar_techos(id_vivienda) {
  document.getElementById("tabla_techo").innerHTML = "";
  $.ajax({
    type: "POST",
    url: BASE_URL + "Viviendas/get_techos",
    data: { id_vivienda: id_vivienda },
  }).done(function (result) {
    console.log(result);
    var techos = JSON.parse(result);
    for (var i = 0; i < techos.length; i++) {
      document.getElementById("tabla_techo").innerHTML +=
        "<tr><td><input readOnly='readOnly' type='text' value='" +
        techos[i]["techo"] +
        "' class='form-control' placeholder='Tipo techo'></td><td><button type='button' class='btn btn-danger' onclick='borrar_techo(" +
        techos[i]["id_vivienda_tipo_techo"] +
        ","+id_vivienda+")'>X</button></td></tr>";
    }
  });
}

function borrar_techo(id,id_vivienda){
	swal({
		type:"warning",
		title:"¿Está seguro?",
    text:"Está por eliminar este tipo de techo relacionado con la vivienda, ¿Desea continuar?",
    showCancelButton:true,
    confirmButtonText:"Sí",
    cancelButtonText:"No"
	},function(isConfirm){
         if(isConfirm){
           $.ajax({
             type:"POST",
             url:BASE_URL+"Viviendas/borrar_techo",
             data:{"id":id}
           }).done(function(result){
                 if(result==1){
                   cargar_techos(id_vivienda);
                 }
                 else{
                   console.log(result);
                 }
           });
         }
  });
}


document.getElementById("agregar").onclick=function(){
  if(document.getElementById("tipo_techo").value=="0"){
      swal({
        type:"error",
        title:"Error",
        text:"Debe seleccionar un tipo de techo",
        timer:2000,
        showConfirmButton:false
      });
      document.getElementById("tipo_techo").style.borderColor='red';
  }
  else{
    $.ajax({
      type:"POST",
      url:BASE_URL+"Viviendas/add_techo",
      data:{"id":id_vivienda,"id_techo":document.getElementById("tipo_techo").value}
    }).done(function(result){
      console.log(result);
           if(result==1){
             cargar_techos(id_vivienda);
           }
           else{
             swal({
               type:"error",
               title:"Error",
               text:"Este tipo de techo ya esta asociado a esta vivienda",
               timer:2000,
               showConfirmButton:false
             })
           }

           document.getElementById("tipo_techo").value='0';
    });
  }
}

document.getElementById("tipo_techo").onchange=function(){
  if(document.getElementById("tipo_techo").value!="0"){
    document.getElementById("tipo_techo").style.borderColor="";
  }
}

document.getElementById("tipo_piso").onchange=function(){
  if(document.getElementById("tipo_piso").value!="0"){
    document.getElementById("tipo_piso").style.borderColor="";
  }
}

document.getElementById("tipo_pared").onchange=function(){
  if(document.getElementById("tipo_pared").value!="0"){
    document.getElementById("tipo_pared").style.borderColor="";
  }
}

function cargar_paredes(id_vivienda) {
  document.getElementById("tabla_pared").innerHTML = "";
  $.ajax({
    type: "POST",
    url: BASE_URL + "Viviendas/get_paredes",
    data: { id_vivienda: id_vivienda },
  }).done(function (result) {
    console.log(result);
    var paredes = JSON.parse(result);
    for (var i = 0; i < paredes.length; i++) {
      document.getElementById("tabla_pared").innerHTML +=
        "<tr><td><input readOnly='readOnly' type='text' value='" +
        paredes[i]["pared"] +
        "' class='form-control'></td><td><button type='button' class='btn btn-danger' onclick='borrar_pared(" +
        paredes[i]["id_vivienda_tipo_pared"] +
        ","+id_vivienda+")'>X</button></td></tr>";
    }
  });
}

function borrar_pared(id,id_vivienda){
	swal({
		type:"warning",
		title:"¿Está seguro?",
    text:"Está por eliminar este tipo de pared relacionado con la vivienda, ¿Desea continuar?",
    showCancelButton:true,
    confirmButtonText:"Sí",
    cancelButtonText:"No"
	},function(isConfirm){
         if(isConfirm){
           $.ajax({
             type:"POST",
             url:BASE_URL+"Viviendas/borrar_pared",
             data:{"id":id}
           }).done(function(result){
            console.log(result);
                 if(result==1){
                   cargar_paredes(id_vivienda);
                 }
                 else{
                   console.log(result);
                 }
           });
         }
  });
}



document.getElementById("agregar2").onclick=function(){
  if(document.getElementById("tipo_pared").value=="0"){
      swal({
        type:"error",
        title:"Error",
        text:"Debe seleccionar un tipo de pared",
        timer:2000,
        showConfirmButton:false
      });
      document.getElementById("tipo_pared").style.borderColor='red';
  }
  else{
    $.ajax({
      type:"POST",
      url:BASE_URL+"Viviendas/add_pared",
      data:{"id":id_vivienda,"id_pared":document.getElementById("tipo_pared").value}
    }).done(function(result){
      console.log(result);
           if(result==1){
             cargar_paredes(id_vivienda);
           }
           else{
             swal({
               type:"error",
               title:"Error",
               text:"Este tipo de pared ya esta asociado a esta vivienda",
               timer:2000,
               showConfirmButton:false
             })
           }

           document.getElementById("tipo_pared").value='0';
    });
  }
}


function cargar_pisos(id_vivienda) {
  document.getElementById("tabla_piso").innerHTML = "";
  $.ajax({
    type: "POST",
    url: BASE_URL + "Viviendas/get_pisos",
    data: { id_vivienda: id_vivienda },
  }).done(function (result) {
    console.log(result);
    var pisos = JSON.parse(result);
    for (var i = 0; i < pisos.length; i++) {
      document.getElementById("tabla_piso").innerHTML +=
        "<tr><td><input readOnly='readOnly' type='text' value='" +
        pisos[i]["piso"] +
        "' class='form-control'></td><td><button type='button' class='btn btn-danger' onclick='borrar_piso(" +
        pisos[i]["id_vivienda_tipo_piso"] +
        ","+id_vivienda+")'>X</button></td></tr>";
    }
  });
}

function borrar_piso(id,id_vivienda){
	swal({
		type:"warning",
		title:"¿Está seguro?",
    text:"Está por eliminar este tipo de piso relacionado con la vivienda, ¿Desea continuar?",
    showCancelButton:true,
    confirmButtonText:"Sí",
    cancelButtonText:"No"
	},function(isConfirm){
         if(isConfirm){
           $.ajax({
             type:"POST",
             url:BASE_URL+"Viviendas/borrar_piso",
             data:{"id":id}
           }).done(function(result){
            console.log(result);
                 if(result==1){
                   cargar_pisos(id_vivienda);
                 }
                 else{
                   console.log(result);
                 }
           });
         }
  });
}

document.getElementById("agregar3").onclick=function(){
  if(document.getElementById("tipo_piso").value=="0"){
      swal({
        type:"error",
        title:"Error",
        text:"Debe seleccionar un tipo de piso",
        timer:2000,
        showConfirmButton:false
      });
      document.getElementById("tipo_piso").style.borderColor='red';
  }
  else{
    $.ajax({
      type:"POST",
      url:BASE_URL+"Viviendas/add_piso",
      data:{"id":id_vivienda,"id_piso":document.getElementById("tipo_piso").value}
    }).done(function(result){
      console.log(result);
           if(result==1){
             cargar_pisos(id_vivienda);
           }
           else{
             swal({
               type:"error",
               title:"Error",
               text:"Este tipo de piso ya esta asociado a esta vivienda",
               timer:2000,
               showConfirmButton:false
             })
           }

           document.getElementById("tipo_piso").value='0';
    });
  }
}


document.getElementById("guardar").onclick=function(){

}



function cambio_color(tag,valor){
  if(tag.value!=valor){
    tag.style.borderColor="";
  }
}
