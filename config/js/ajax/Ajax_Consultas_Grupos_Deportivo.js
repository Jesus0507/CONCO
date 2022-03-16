 var integrantes_input=document.getElementById("integrantes_grupo_input");
var integrantes=[];
var valid_integrantes=document.getElementById("valid_5");
var div_integrantes=document.getElementById("integrantes_agregados");
var id_grupo_deportivo_global="";

$(function() { 
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'Grupos_Deportivos/Consultas_Grupo_Deportivo_Ajax'
    }).done(function(datos) {
        var data = JSON.parse(datos);
        var tabla = $("#example1").DataTable({ 
            "data": data,
            "columns": [{
                "data": "nombre_grupo_deportivo"
            }, {
                "data": "nombre_deporte"
            }, {
                "data": "descripcion"
            }, {
                "data": function(data) {
                    return '<td class="text-center">' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info ver-popup" title="Ver" type="button" data-toggle="modal" data-target="#ver">' + '<i class="fa fa-eye"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar" onclick="editar('+data.id_grupo_deportivo+','+data.cedula_persona+')">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_grupo_deportivo + '</p>' + '</td>';
                }
            }, ],
            "responsive": true,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "pageLength": 10,
            "lengthMenu": [5, 10, 20, 30, 40, 50, 100]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $(document).on("click", ".mensaje-eliminar", function() {
            fila = $(this).closest("tr");
            id = fila.find('td:eq(3)').text();
            swal({
                title: "¿Desea Eliminar este Elemento?",
                text: "El elemento seleccionado sera eliminado de manera permanente!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Eliminar!",
                cancelButtonText: "No, Cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: BASE_URL + "Grupos_Deportivos/Eliminar_Grupo_Deportivo",
                        type: "POST",
                        data: {
                            'id': id,
                            'nombre_calle': fila.find('td:eq(0)').text()
                        }
                    }).done(function(result) {
                        if (result != 0) {
                            swal({
                                title: "Eliminado!",
                                text: "El elemento fue eliminado con exito.",
                                type: "success",
                                showConfirmButton: true
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                            // tabla.ajax.reload(null, false);
                        }
                    })
                } else {
                    swal("Cancelado", "La accion fue cancelada, la informacion esta segura.", "error");
                }
            });
        });
        $(document).on('click', '.ver-popup', function() {
            fila = $(this).closest("tr");
            nombre_grupo = fila.find('td:eq(0)').text();
            deporte = fila.find('td:eq(1)').text();
            descripcion = fila.find('td:eq(2)').text();
            id = fila.find('td:eq(3)').text();
            $('#nombre_grupo').val(nombre_grupo);
            $('#id_deporte').val(deporte);
            $('#descripcion').val(descripcion);
            $.ajax({
                type: "POST",
                url: BASE_URL + "Grupos_Deportivos/Consultas_Grupo_Deportivo_Persona",
                data: {
                    "id": id
                }
            }).done(function(result) {
                var result = JSON.parse(result);
                td = "";
                for (var i = 0; i < result.length; i++) {
                    td += "<tr><td>" + result[i]["cedula_persona"] + "</td><td>" + result[i]["primer_nombre"] + "</td><td>" + result[i]["primer_apellido"] + "</td></tr>";
                }
                $('#tabla').html(td);
            });
        });


        integrantes_input.onkeyup=function(){
            if(integrantes_input.value!=""){
                valid_integrantes.innerHTML="";
            }
        }

        $(document).on('click', '#btn_agregar', function() {

                                    if(integrantes_input.value==""){
                                        integrantes_input.focus();
                                        valid_integrantes.innerHTML='Debe ingresar la cédula o el nombre de una persona';
                                    }
                                    else{
                                        valid_integrantes.innerHTML="";
                                           $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Grupos_Deportivos/add_integrante',
                                            data:{'cedula':integrantes_input.value,"grupo_deportivo":id_grupo_deportivo_global}
                                        })
                                           .done(function (datos) {
                                        if(datos==1){
                                            actualizar_integrantes(id_grupo_deportivo_global);
                                        }
                                        else{
                                        swal({
                                            type:"error",
                                            title:"Error",
                                            text:"Esta persona ya se encuentra registrada en el grupo deportivo",
                                            timer:2000,
                                            showConfirmButton:false
                                        });
                                
                                        }
                                      integrantes_input.value="";
                                    });

                                       
                                   }
                               });


        $(document).on('click', '.btnEditar', function() {
            fila = $(this).closest("tr");
            nombre_grupo = fila.find('td:eq(0)').text();
            deporte = fila.find('td:eq(1)').text();
            descripcion = fila.find('td:eq(2)').text();
            id = fila.find('td:eq(3)').text();
            $('#nombre_grupo2').val(nombre_grupo);
            $('#id_deporte2').val(deporte);
            $('#descripcion2').val(descripcion);
           
            $(document).on("click", "#enviar", function() {
                var datos = [
                    document.getElementById("nombre_grupo2").value,
                    document.getElementById("id_deporte2").value,
                    document.getElementById("descripcion2").value,
                    id,
                    integrantes,
                ];
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "Grupos_Deportivos/Editar_Grupo_Deportivo",
                    data: {
                        datos: datos,
                    },
                }).done(function(datos) {
                    if (datos != 0) {
                        swal({
                            title: "Actualizado!",
                            text: "El elemento fue actualizado con exito.",
                            type: "success",
                            showConfirmButton: false
                        });
                        console.log(datos)
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                }).fail(function() {
                    alert("error");
                });
            });
        });
    }).fail(function() {
        alert("error")
    })
});

function editar(id_grupo_deportivo,cedula_persona){
id_grupo_deportivo_global=id_grupo_deportivo;
     $.ajax({
         type:"POST",
         url:BASE_URL+"Grupos_Deportivos/consultar_grupos_datos",
         data:{'id_grupo_deportivo':id_grupo_deportivo, 'cedula_persona':cedula_persona}
     }).done(function(datos){
         var data = JSON.parse(datos);
        var grupos = document.getElementById('integrantes_agregados');
         
         if (data.length == 0) {
            grupos.innerHTML = "No aplica";
        } else {
            grupos.innerHTML = "";
            for (var i = 0; i < data.length; i++) {
                var inte = JSON.parse(data[i]['integrantes']);

                for (var j = 0; j < inte.length; j++) {
                    var tabl=
                    grupos.innerHTML += " <table style='width:95%'><tr><hr><td>-" + inte[j]["primer_nombre"]+" " +inte[j]["primer_apellido"]+ "</td><td style='text-align:right'><span onclick='borrar_integrante("+data[i]['id_grupo_deportivo']+","+inte[j]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar Familia' style='font-size:22px;cursor:pointer'></span></td></tr></table><br><hr>";
                }
                
            }
        }

    });
 }

 function borrar_integrante(id,cedula_param){
    swal({
      type:"warning",
      title:"¿Está seguro?",
      text:"Está por eliminar este integrantes , ¿desea continuar?",
      showCancelButton:true,
      confirmButtonText:"Si, continuar",
      cancelButtonText:"No"
  },function(isConfirm){
      if(isConfirm){
        $.ajax({
          type:"POST",
          url:BASE_URL+"Grupos_Deportivos/eliminar_integrantes",
          data:{"id_grupo_deportivo":id,"cedula_persona":cedula_param}
      }).done(function(result){
          result=JSON.parse(result);
          actualizar_integrantes(id);
          editar(id);
          console.log(result)
      })
  }
});
}

function actualizar_integrantes(id){
    $.ajax({
        type:"POST",
        url:BASE_URL+"Grupos_Deportivos/get_integrantes",
        data:{"id":id}
    }).done(function(result){
        var integrantes = document.getElementById('integrantes_agregados'); 
        integrantes.innerHTML = "";    
        result=JSON.parse(result);     
          for (var i = 0; i < result.length; i++) {
            integrantes.innerHTML += "<table style='width:95%'><tr><hr><td>-" + result[i]["primer_nombre"]+" " +result[i]["primer_apellido"]+ "</td><td style='text-align:right'><span onclick='borrar_integrante("+id+","+result[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar Familia' style='font-size:22px;cursor:pointer'></span></td></tr></table><br><hr>";
        }    
    })
  
  }

  
function valid_integrantes_agregados(){
    var validar=true;
    for(var i=0;i<integrantes.length;i++){
        if(integrantes[i]==integrantes_input.value){
            validar=false;
        }
    }

    if(!validar){
        valid_integrantes.innerHTML='Ya esta persona fue agregada';
    }

    return validar;
}