

function Eliminar(id){
	swal({
		type:"warning",
		title:"Atención",
		text:"Estás por eliminar esta vivienda, ¿Deseas continuar?",
		showCancelButton:true,
		cancelButtonText:"No",
		confirmButtonText:"Si",
	},function(isConfirm){
          
           if(isConfirm){
           	$.ajax({
                  type:"POST",
                  url:BASE_URL+"Viviendas/eliminacion_logica",
                  data:{"id_vivienda":id}
           	}).done(function(result){
           		console.log(result);
                   if(result){
                   	swal({
                   		type:"success",
                   		title:"Enhorabuena",
                        text:"Se ha eliminado la vivienda",
                        timer:2000,
                        showConfirmButton:false
                   	});

                   	setTimeout(function(){location.reload();},1000);
                   }
           	});
           }



	});
}



function Ver(valores,techos,pisos,paredes,gas,electrodomesticos){

//	console.log(gas);
//	console.log(electrodomesticos);
	
var values=JSON.parse(valores);
var tipo_techos=JSON.parse(techos);
var tipo_pisos=JSON.parse(pisos);
var tipo_paredes=JSON.parse(paredes);
var gas_v=JSON.parse(gas);
var electrodomestico_v=JSON.parse(electrodomesticos);



var texto_tabla="<center><em style='font-size:60px' class='fa fa-home'></em><br><br>";
texto_tabla+="<table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
texto_tabla+="<td style='width:25%'>Calle</td><td style='width:25%'>Dirección</td><td style='width:25%'>Tipo de vivienda</td><td style='width:25%'>Familia</td></tr>";

texto_tabla+="<tr><td style='width:25%'><em class='fa fa-road'></em> "+values['nombre_calle']+"</td><td style='width:25%'><em class='fa fa-map-marker'></em> "+values['direccion_vivienda']+"</td>";
texto_tabla+="<td style='width:25%'><em class='fa fa-home'></em> "+values['nombre_tipo_vivienda']+"</td><td style='width:25%'><em class='fa fa-users'></em> "+values['familia']+"</td></tr>";
texto_tabla+="</table>";


texto_tabla+="<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
texto_tabla+="<td style='width:25%'>Espacio de Siembra</td><td style='width:25%'>Hacinamiento</td><td style='width:25%'>Baño sanitario</td><td style='width:25%'>Condición</td></tr>";

texto_tabla+="<tr><td style='width:25%'><em class='fa fa-tree'></em> "+get_letras(values['espacio_siembra'])+"</td><td style='width:25%'><em class='fa fa-users'></em> "+get_letras(values['hacinamiento'])+"</td>";
texto_tabla+="<td style='width:25%'><em class='fa fa-bath'></em> "+get_letras(values['banio_sanitario'])+"</td><td style='width:25%'><em class='fa fa-check-square'></em> "+values['condicion']+"</td></tr>";
texto_tabla+="</table>";


texto_tabla+="<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
texto_tabla+="<td style='width:25%'>Descripción de condición</td><td style='width:25%'>Cantidad habitaciones</td><td style='width:25%'>Animales domésticos</td><td style='width:25%'>Insectos o roedores</td></tr>";

texto_tabla+="<tr><td style='width:25%'><em class='fa fa-comment'></em> "+values['descripcion']+"</td><td style='width:25%'><em class='fa fa-bed'></em> "+values['cantidad_habitaciones']+"</td>";
texto_tabla+="<td style='width:25%'><em class='fa fa-paw'></em> "+get_letras(values['animales_domesticos'])+"</td><td style='width:25%'><em class='fa fa-bug'></em> "+get_letras(values['insectos_roedores'])+"</td></tr>";
texto_tabla+="</table>";


texto_tabla+="<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
texto_tabla+="<td style='width:33%'>Servicios</td><td style='width:33%'>Techo</td><td style='width:33%'>Pared</td></tr>";

texto_tabla+="<tr><td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
texto_tabla+="<em class='fa fa-tint'></em> Agua consumo: "+values['agua_consumo']+"<br><hr>";
texto_tabla+="<em class='fa fa-trash'></em> Residuos sólidos: "+values["residuos_solidos"]+"<br><hr>";
texto_tabla+="<em class='fa fa-tint'></em> Aguas negras: "+values['aguas_negras']+"<br><hr>";
texto_tabla+="<em class='fa fa-phone'></em> Cable telefónico: "+get_letras(values['cable_telefonico'])+"<br><hr>";
texto_tabla+="<em class='fa fa-wifi'></em> Internet: "+get_letras(values['internet'])+"<br><hr>";
texto_tabla+="<em class='fa fa-plug'></em> Servicio eléctrico: "+get_letras(values['servicio_electrico'])+"</div></td>";

texto_tabla+="<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
for(var i=0;i<tipo_techos.length;i++){
  texto_tabla+="<em class='fa fa-hand-pointer-o'></em>"+tipo_techos[i]['techo']+"<br><hr>";
}
texto_tabla+="</div></td>";


texto_tabla+="<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
for(var i=0;i<tipo_pisos.length;i++){
  texto_tabla+="<em class='fa fa-hand-stop-o'></em>"+tipo_pisos[i]['pared']+"<br><hr>";
}
texto_tabla+="</div></td></tr>";


texto_tabla+="</table>";

texto_tabla+="<br><table style='width:98%' border='1'><tr style='background:#057E9F;color:white;'>";
texto_tabla+="<td style='width:33%'>Piso</td><td style='width:33%'>Gas</td><td style='width:33%'>Electrodomésticos</td></tr>";

texto_tabla+="<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
for(var i=0;i<tipo_paredes.length;i++){
  texto_tabla+="<em class='fa fa-hand-o-down'></em> "+tipo_paredes[i]['piso']+"<br><hr>";
}
texto_tabla+="</div></td>";


texto_tabla+="<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
for(var i=0;i<gas_v.length;i++){
  texto_tabla+="<em class='fa fa-fire'></em> "+gas_v[i]['nombre_servicio_gas']+"<br><hr>";
}
texto_tabla+="</div></td>";

texto_tabla+="<td style='width:33%'><div style='width:100%;overflow-y:scroll;height:100px;background:#CFF3C5;'>";
for(var i=0;i<electrodomestico_v.length;i++){
  texto_tabla+="<em class='fa fa-cogs'></em> "+electrodomestico_v[i]['nombre_electrodomestico']+"<br><hr>";
}
texto_tabla+="</div></td></tr></table>";


texto_tabla="<div style='overflow-y:scroll;width:100%;height:400px;'>"+texto_tabla+"</div>";


	swal({
		title:"Casa Nro "+values['numero_casa'],
		text:texto_tabla,
		html:true,
		customClass:"bigSwalV2"
	});
 }


function get_letras(dato){
   
   if(parseInt(dato)==0){
    return "No";
   }
   else{
    return "Si";
   }

}

