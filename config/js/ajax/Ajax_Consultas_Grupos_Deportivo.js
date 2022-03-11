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
                    return '<td class="text-center">' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info ver-popup" title="Ver" type="button" data-toggle="modal" data-target="#ver">' + '<i class="fa fa-eye"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_grupo_deportivo + '</p>' + '</td>';
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
        $(document).on('click', '.btnEditar', function() {
            fila = $(this).closest("tr");
            nombre_grupo = fila.find('td:eq(0)').text();
            deporte = fila.find('td:eq(1)').text();
            descripcion = fila.find('td:eq(2)').text();
            id = fila.find('td:eq(3)').text();
            $('#nombre_grupo2').val(nombre_grupo);
            $('#id_deporte2').val(deporte);
            $('#descripcion2').val(descripcion);
            /* $.ajax({
                                        type: "POST",
                                        url: BASE_URL +
                                            "Grupos_Deportivos/Consultas_Grupo_Deportivo_Persona",
                                        data: {
                                            "id": id
                                        }
                                    }).done(function(result) {

                                        var result = JSON.parse(result);

                                        td = "";
                                        for (var i = 0; i < result.length; i++) {
                                            td += "<tr><td>" + result[i][
                                                "cedula_persona"
                                            ] + "</td><td>" + result[i][
                                                "primer_nombre"
                                            ] + "</td><td>" + result[i][
                                                "primer_apellido"
                                            ] + "</td></tr>";

                                        }
                                        $('#tabla').html(td);
                                    }); */
            $(document).on("click", "#enviar", function() {
                var datos = [
                    document.getElementById("nombre_grupo2").value,
                    document.getElementById("id_deporte2").value,
                    document.getElementById("descripcion2").value,
                    id
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