



function ver_datos(persona,ocupacion,condicion_lab,transporte,bonos,misiones,proyectos,comunidad_i,org_politica){
 var persona_info=JSON.parse(persona);
 var ocupacion_info=JSON.parse(ocupacion);
 var condicion_lab_info=JSON.parse(condicion_lab);
 var transporte_info=JSON.parse(transporte);
 var bonos_info=JSON.parse(bonos);
 var misiones_info=JSON.parse(misiones);
 var proyectos_info=JSON.parse(proyectos);
 var comunidad_i_info=JSON.parse(comunidad_i);
 var org_politica_info=JSON.parse(org_politica);

 var tabla="<div style='height:380px;overflow-y:scroll;'><em class='fa fa-user' style='font-size:60px'></em>";
 tabla+="<br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td style='width:25%'>Cédula</td><td style='width:25%'>Nacionalidad</td><td style='width:25%'>Teléfono</td><td style='width:25%'>WhatsApp</td></tr>";
 tabla+="<tr><td style='width:25%'><em class='fa fa-drivers-license-o'></em> "+persona_info["cedula_persona"];
 tabla+="</td><td style='width:25%'><em class='fa fa-globe'></em> "+persona_info['nacionalidad']+"</td><td style='width:25%'><em class='fa fa-phone'></em> "+persona_info['telefono']+"</td><td style='width:25%'><em class='fa fa-whatsapp'></em> "+get_letras(persona_info['whatsapp'])+"</td></tr></table>";


 var tabla2="<br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td style='width:25%'>Correo</td><td style='width:25%'>Fecha de nacimiento</td><td style='width:25%'>Género</td><td style='width:25%'>Orientación sexual</td></tr>";
 tabla2+="<tr><td style='width:25%'><em class='fa fa-envelope'></em> "+persona_info["correo"];
 var gen;
 persona_info['genero']=="M"?gen="mars":gen='venus';
 tabla2+="</td><td style='width:25%'><em class='fa fa-birthday-cake'></em> "+persona_info['fecha_nacimiento']+"</td><td style='width:25%'><em class='fa fa-"+gen+"'></em> "+persona_info['genero']+"</td><td style='width:25%'><em class='fa fa-intersex'></em> "+persona_info['sexualidad']+"</td></tr></table>";


 var tabla3="<br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td style='width:25%'>Estado civil</td><td style='width:25%'>Nivel educativo</td><td style='width:25%'>Antigüedad comunidad</td><td style='width:25%'>Miliciano</td></tr>";
 tabla3+="<tr><td style='width:25%'><em class='fa fa-address-card'></em> "+persona_info["estado_civil"];
 tabla3+="</td><td style='width:25%'><em class='fa fa-mortar-board'></em> "+persona_info['nivel_educativo']+"</td><td style='width:25%'><em class='fa fa-calendar'></em> "+persona_info['antiguedad_comunidad']+"</td><td style='width:25%'><em class='fa fa-vcard'></em> "+get_letras(persona_info['miliciano'])+"</td></tr></table>";


 var tabla4="<br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td style='width:25%'>Jefe de familia</td><td style='width:25%'>Propietario de vivienda</td><td style='width:25%'>Jefe de calle</td><td style='width:25%'>Privado de libertad</td></tr>";
 tabla4+="<tr><td style='width:25%'><em class='fa fa-users'></em> "+get_letras(persona_info["jefe_familia"]);
 tabla4+="</td><td style='width:25%'><em class='fa fa-home'></em> "+get_letras(persona_info['propietario_vivienda'])+"</td><td style='width:25%'><em class='fa fa-road'></em> "+get_letras(persona_info['jefe_calle'])+"</td><td style='width:25%'><em class='fa fa-balance-scale'></em> "+get_letras(persona_info['privado_libertad'])+"</td></tr></table>";

 var tabla5="<br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td style='width:25%'>Afrodescendencia</td><td style='width:25%'>Comunidad indígena</td><td style='width:25%'>Ocupación</td><td style='width:25%'>Condición laboral</td></tr>";
 tabla5+="<tr><td style='width:25%'><em class='fa fa-universal-access'></em> "+get_letras(persona_info["afrodescendencia"]);
 var comunidad_i;
 var ocup;
 var cond;
 ocupacion_info.length==0? ocup="No posee":ocup=ocupacion_info[0]['nombre_ocupacion'];
 condicion_lab_info.length==0? cond="No posee":cond=condicion_lab_info[0]['nombre_cond_laboral'];
 comunidad_i_info.length==0? comunidad_i="No":comunidad_i=comunidad_i_info[0]['nombre_comunidad'];  

 tabla5+="</td><td style='width:25%'><em class='fa fa-street-view'></em> "+comunidad_i+"</td><td style='width:25%'><em class='fa fa-briefcase'></em> "+ocup+"</td><td style='width:25%'><em class='fa fa-industry'></em> "+cond+"</td></tr></table>";

 var tabla6="<br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td style='width:25%'>Organización política</td><td style='width:25%'>Transporte</td><td style='width:25%'>Bonos</td><td style='width:25%'>Misiones</td></tr>";
 var org;
 org_politica_info.length==0? org="No":org=org_politica_info[0]['nombre_org'];  

 var transp;

 transporte_info.length==0? transp="Público":transp=transporte_info[0]['descripcion_transporte'];  

 tabla6+="<tr><td style='width:25%'><em class='fa fa-puzzle-piece'></em> "+org+"</td>";

 tabla6+="<td style='width:25%'><em class='fa fa-car'></em> "+transp+"</td>";

 if(bonos_info.length==0){
  tabla6+="<td style='width:25%'>No aplica</td>";
}
else{
  var texto="";
  for(var i=0;i<bonos_info.length;i++){
   texto+=" - "+bonos_info[i]['nombre_bono']+"<br><hr>";

 }

 tabla6+="<td ><div style='width:100%;overflow-y:scroll;background:#C5E6EF;border-radius:6px'><center>"+texto;
 tabla6+="</center></div></td>";
}


if(misiones_info.length==0){
  tabla6+="<td style='width:25%'>No aplica</td></tr></table>";
}
else{
  var texto="";
  for(var i=0;i<misiones_info.length;i++){
   texto+=" - "+misiones_info[i]['nombre_mision']+"<br><hr>";

 }

 tabla6+="<td ><div style='width:100%;overflow-y:scroll;background:#C5E6EF;border-radius:6px'><center>"+texto;
 tabla6+="</center></div></td></tr><table>";
}







tabla+="<br>"+tabla2+"<br>"+tabla3+"<br>"+tabla4+"<br>"+tabla5+"<br>"+tabla6;

tabla+="<br><br><table style='width:100%' border='1'><tr  style='background:#057E9F;color:white;'><td colspan='4'>Proyectos en los que labora</td></tr>";



if(proyectos_info.length==0){
  tabla+="<tr><td colspan='4'>No aplica</td></tr></table>";
}
else{
  var texto="";
  for(var i=0;i<proyectos_info.length;i++){
    texto+="<table style='width:100%' border='1'><tr><td style='width:25%'>Nombre</td><td style='width:25%'>Área</td><td style='width:25%'>Estado</td></tr>";
    texto+="<tr><td style='width:25%'>"+proyectos_info[i]['nombre_proyecto']+"</td><td style='width:25%'>"+proyectos_info[i]['area_proyecto']+"</td>";
    texto+="<td style='width:25%'>"+proyectos_info[i]['estado_proyecto']+"</td></tr></table> <br>";
  }

  tabla+="<tr><td colspan='4'><div style='width:100%;overflow-y:scroll;background:#C5E6EF;border-radius:6px'><center>"+texto;
  tabla+="</center></div></td></tr></table>";
}


swal({
  title:persona_info['primer_nombre']+" "+persona_info['segundo_nombre']+" "+persona_info['primer_apellido']+" "+persona_info['segundo_apellido'],
  text:tabla,
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

function eliminar_datos(cedula){

 swal({
  title:"Atención",
  text:"Estás por eliminar la persona con cédula "+cedula+", si lo haces será sacado del sistema, ¿Desea continuar?",
  type:"warning",
  showCancelButton:true,
  cancelButtonText:"No",
  confirmButtonText:"Si"
},function(isConfirm){
 if(isConfirm){
   $.ajax({
    type:"POST",
    url:BASE_URL+"Personas/eliminacion_logica",
    data:{"cedula_persona":cedula}
  }).done(function(result){

    if(result==1){
      setTimeout(function(){
        swal({
          title:"Éxtito",
          text:"La persona ha sido removida del sistema satisfactoriamente",
          type:"success",
          showConfirmButton:false,
          timer:2000
        });

        setTimeout(function(){location.reload();},1000);
      },500);
    }
  });
}
});


}



function editar_datos(persona,ocupacion,condicion_lab,transporte,bonos,misiones,proyectos,comunidad_i,org_politica){
  var persona_info=JSON.parse(persona);
  var ocupacion_info=JSON.parse(ocupacion);
  var condicion_lab_info=JSON.parse(condicion_lab);
  var transporte_info=JSON.parse(transporte);
  var bonos_info=JSON.parse(bonos);
  var misiones_info=JSON.parse(misiones);
  var proyectos_info=JSON.parse(proyectos);
  var comunidad_i_info=JSON.parse(comunidad_i);
  var org_politica_info=JSON.parse(org_politica);


  var modal_title=document.getElementById('modal-title');
  var vn1=document.getElementById("n1");
  var vn2=document.getElementById("n2");
  var va1=document.getElementById("a1");
  var va2=document.getElementById("a2");
  var vnac=document.getElementById("nac");
  var vtlf=document.getElementById("tlf");
  var vws=document.getElementById("ws");
  var vcor=document.getElementById("cor");
  var vfnac=document.getElementById("fnac");
  var vgen=document.getElementById("gen");
  var vorsex=document.getElementById("orsex");
  var vedoc=document.getElementById("edoc");
  var vnedu=document.getElementById("nedu");
  var vantcom=document.getElementById("antcom");
  var vmili=document.getElementById("mili");
  var vjeffam=document.getElementById("jeffam");
  var vpropv=document.getElementById("propv");
  var vjefcas=document.getElementById("jefcas");
  var vprivlib=document.getElementById("privlib");
  var vafro=document.getElementById("afro");
  var vcomindi=document.getElementById("comindi");
  var vvercomindi=document.getElementById("vercomindi");
  var vvalcomindi=document.getElementById("valcomindi");
  var vvervalcomindi=document.getElementById("vervalcomindi");
  var vocup=document.getElementById("ocup");
  var vverocup=document.getElementById("verocup");
  var vocupinput=document.getElementById("ocupinput");
  var spanocup=document.getElementById("spannewocup");
  var vcondlab=document.getElementById("condlab");
  var vnomcondlab=document.getElementById("nomcondlab");
  var vsectlab=document.getElementById("sectlab");
  var vtipsectlab=document.getElementById("tipsectlab");
  var spancondlab=document.getElementById("spanenwcondlab");
  var vorgpol=document.getElementById("orgpol");
  var vorgpolinput=document.getElementById("orgpolinput");
  var spanorgpol=document.getElementById("spanneworgpol");
  var vtransp=document.getElementById("transp");
  var vtranspinput=document.getElementById("tiptransinput");
  var vvertiptrans=document.getElementById("tiptransp");



  modal_title.innerHTML='Editar persona: '+persona_info['cedula_persona'];
  vn1.value=persona_info['primer_nombre'];
  vn2.value=persona_info['segundo_nombre'];
  va1.value=persona_info['primer_apellido'];
  va2.value=persona_info['segundo_apellido'];
  vnac.value=persona_info['nacionalidad'];
  vtlf.value=persona_info['telefono'];
  vws.value=persona_info['whatsapp'];
  vcor.value=persona_info['correo'];
  vfnac.value=persona_info['fecha_nacimiento'];
  vgen.value=persona_info['genero'];
  vorsex.value=persona_info['sexualidad'];
  vedoc.value=persona_info['estado_civil'];
  vnedu.value=persona_info['nivel_educativo'];
  vantcom.value=persona_info['antiguedad_comunidad'];
  vmili.value=persona_info['miliciano'];
  vjeffam.value=persona_info['jefe_familia'];
  vpropv.value=persona_info['propietario_vivienda'];
  vjefcas.value=persona_info['jefe_calle'];
  vprivlib.value=persona_info['privado_libertad'];
  vafro.value=persona_info['afrodescendencia'];

  if(comunidad_i_info.length==0){
      vvervalcomindi.style.display='none';
      vcomindi.value=0;
      vvalcomindi.value='';
  }
  else{
    vvervalcomindi.style.display='';
    vcomindi.value=1;
    vvalcomindi.value=comunidad_i_info[0]["nombre_comunidad"];
  }



  if(ocupacion_info.length==0){
    vocup.value=0;
  }
  else{
    vocup.value=ocupacion_info[0]["id_ocupacion"];
  }

  if(condicion_lab_info.length==0){
    vcondlab.value=0;
  }
  else{
    vcondlab.value=condicion_lab_info[0]['id_cond_laboral'];
  }

  if(org_politica_info.length==0){
    vorgpol.value=0;
  }
  else{
    vorgpol.value=org_politica_info[0]['id_org_politica'];
  }


   if(transporte_info.length==0){
    vtransp.value=0;
    vvertiptrans.style.display='none';
    vtranspinput.value="";
  }
  else{
    vtransp.value="privado";
    vvertiptrans.style.display='';
    vtranspinput.value=transporte_info[0]['descripcion_transporte'];

  }

  $("#edit_persona").modal().show();
}