 var integrantes_input=document.getElementById("integrantes_grupo_input");
var integrantes=[];
var valid_integrantes=document.getElementById("valid_5");
var div_integrantes=document.getElementById("integrantes_agregados");

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

        $(document).on('click', '#btn_agregar', function() {

                                    if(integrantes_input.value==""){
                                        integrantes_input.focus();
                                        valid_integrantes.innerHTML='Debe ingresar la cédula o el nombre de una persona';
                                    }
                                    else{
                                        valid_integrantes.innerHTML="";

                                        if(valid_integrantes_agregados()){
                                           valid_integrantes.innerHTML="";
                                           $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Personas/Consultas_cedula',
                                            data:{'cedula':integrantes_input.value}
                                        })
                                           .done(function (datos) {


                                            if(datos!=0){

                                                var result=JSON.parse(datos);
                                                integrantes.push(result[0]['cedula_persona']);
                                                integrantes_input.value='';
                                                var div=document.createElement("div");
                                                div.style.width='100%';
                                                var tabla=document.createElement("table");
                                                tabla.style.width='100%';
                                                var tr=document.createElement("tr");
                                                var td1=document.createElement("td");
                                                var td2=document.createElement("td");
                                                td1.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-"+result[0]['primer_nombre']+" "+result[0]['primer_apellido'];
                                                var btn=document.createElement("input");
                                                btn.type="button";
                                                btn.className="btn btn-danger";
                                                btn.value="X";
                                                td2.style.textAlign="right";
                                                td2.appendChild(btn);
                                                tr.appendChild(td1);
                                                tr.appendChild(td2);
                                                tabla.appendChild(tr);
                                                div.appendChild(tabla);
                                                var hr=document.createElement("hr");
                                                div.appendChild(tabla);
                                                div.appendChild(hr);
                                                div_integrantes.appendChild(div);
                                                btn.onclick=function(){
                                                 div_integrantes.removeChild(div);
                                                 integrantes.splice(integrantes.indexOf(result[0]['cedula_persona']),1);
                                                 console.log(integrantes);
                                             }
                                             console.log(integrantes);
                                         }
                                         else{
                                            valid_integrantes.innerHTML="Esta persona no está registrada";
                                        }

                                    });

                                       }
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
                            text: "El elemento fue ctualizado con exito.",
                            type: "success",
                            showConfirmButton: false
                        });
                        console.log(datos)
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 2000);
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
                    grupos.innerHTML += " <table style='width:95%'><tr><hr><td>-" + inte[j]["primer_nombre"]+" " +inte[j]["primer_apellido"]+ "</td><td style='text-align:right'><span onclick='borrar_integrante("+data[i]['id_grupo_deportivo']+","+inte[j]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar Familia' style='font-size:22px'></span></td></tr></table><br><hr>";
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
          actualizar_integrantes(result,cedula_param);
          editar(id);
          console.log(result)
      })
  }
});
}

function actualizar_integrantes(result,cedula_param){

    var integrantes = document.getElementById('integrantes_agregados'); 
    if(result!=0){
      integrantes.innerHTML = "";
      for (var i = 0; i < result.length; i++) {
        integrantes.innerHTML += " <table style='width:95%'><tr><td>- " + result[i]["cedula_persona"] + "</td><td style='text-align:right'><span onclick='borrar_familia("+result[i]['id_familia_persona']+","+result[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar' style='font-size:22px'></span></td></tr></table><br><hr>";
    }
  }
  
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