var cedula=document.getElementById("cedula_persona");
var t_gestacion=document.getElementById("tiempo_gestacion");
var f_parto=document.getElementById("fecha_aprox_parto");
var boton=document.getElementById("boton");
var formulario=document.getElementById("formulario");


boton.onclick=function(){
if(cedula.value==""){
    cedula.style.borderColor="red";
    cedula.focus();
}
else{
    $.ajax({
        type:"POST",
        url:BASE_URL+"Parto_Humanizado/consulta_parto_ajax",
        data:{"cedula":cedula.value}
    }).done(function(respuesta){
            if(respuesta!=1){
                cedula.focus();
                cedula.style.borderColor='red';
                swal({
                    type:"error",
                    title:"Error",
                    text:respuesta,
                    timer:2000,
                    showConfirmButton:false
                });
            }
            else{
                cedula.style.borderColor='';

                if(t_gestacion.value==""){
                t_gestacion.focus();
                t_gestacion.style.borderColor='red';
                }
                else{
                    t_gestacion.style.borderColor='';

                    if(f_parto.value==""){
                        f_parto.style.borderColor="red";
                        f_parto.focus();
                    }
                    else{
                        f_parto.style.borderColor="";
                        swal({
                            type:"success",
                            title:"Éxito",
                            text:"Se ha realizado el registro exitosamente",
                            showConfirmButton:false,
                            timer:2000
                        });

                        setTimeout(function(){formulario.submit();},1000);
                    }
                }
            }
    });
}
}

