$(function() {
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'Parto_Humanizado/Consultas_Parto_Humanizado_Ajax'
    }).done(function(datos) {
        var data = JSON.parse(datos);
        var tabla = $("#example1").DataTable({
            "data": data,
            "columns": [{
                "data": "cedula_persona"
            }, {
                "data": function(data) {
                    return data.primer_nombre + " " + data.primer_apellido;
                },
            }, {
                "data": "tiempo_gestacion"
            }, {
                "data": function(data) {
                    if (data.fecha_aprox_parto != "0000-00-00") {
                        return data.fecha_aprox_parto;
                    } else {
                        return "Sin Especificar";
                    }
                },
            }, {
                "data": function(data) {
                    return '<td class="text-center">' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info ver-popup" title="Ver" type="button" data-toggle="modal" data-target="#ver">' + '<i class="fa fa-eye"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_parto_humanizado + '</p>' + '</td>';
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
        /* OPCION ELIMINAR */
        $(document).on("click", ".mensaje-eliminar", function() {
            fila = $(this).closest("tr");
            id = fila.find('td:eq(4)').text();
            swal({
                title: "??Desea Eliminar este Elemento?",
                text: "El elemento seleccionado sera eliminado",
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
                        url: BASE_URL + "Parto_Humanizado/Eliminar_Parto_Humanizado",
                        type: "POST",
                        data: {
                            'id': id
                        }
                    }).done(function(result) {
                        if (result != 0) {
                            swal({
                                title: "Eliminado!",
                                text: "El elemento fue eliminado con exito.",
                                type: "success",
                                showConfirmButton: true
                            }, function(isConfirm) {
                                if (isConfirm) {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 0000);
                                }
                            });
                        }
                    })
                } else {
                    swal("Cancelado", "La accion fue cancelada, la informacion esta segura.", "error");
                }
            });
        });
        $(document).on('click', '.ver-popup', function() {
            fila = $(this).closest("tr");
            id = fila.find('td:eq(4)').text();
            nombre = fila.find('td:eq(1)').text();
            $('#nombre_apellido').val(nombre);
            $.ajax({
                type: "POST",
                url: BASE_URL + "Parto_Humanizado/Consultas_Parto_Humanizado_Persona",
                data: {
                    "id": id
                }
            }).done(function(result) {
                var result = JSON.parse(result);
                $('#cedula_persona').val(result[0]["cedula_persona"]);
                $('#recibe_micronutrientes').val(result[0]["recibe_micronutrientes"]);
                $('#tiempo_gestacion').val(result[0]["tiempo_gestacion"]);
                $('#fecha_aprox_parto').val(result[0]["fecha_aprox_parto"]);
            });
        });
        $(document).on('click', '.btnEditar', function() {
            fila = $(this).closest("tr");
            id = fila.find('td:eq(4)').text();
            $.ajax({
                type: "POST",
                url: BASE_URL + "Parto_Humanizado/Consultas_Parto_Humanizado_Persona",
                data: {
                    "id": id
                }
            }).done(function(result) {
                var result = JSON.parse(result);
                $('#cedula_persona2').val(result[0]["cedula_persona"]);
                $('#recibe_micronutrientes2').val(result[0]["recibe_micronutrientes"]);
                $('#tiempo_gestacion2').val(result[0]["tiempo_gestacion"]);
                $('#fecha_aprox_parto2').val(result[0]["fecha_aprox_parto"]);
            });
            $(document).on("click", "#enviar", function() {
                var datos = [
                    document.getElementById("cedula_persona2").value,
                    document.getElementById("recibe_micronutrientes2").selectedIndex,
                    document.getElementById("tiempo_gestacion2").value,
                    document.getElementById("fecha_aprox_parto2").value,
                    id
                ];
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "Parto_Humanizado/Editar_Parto_Humanizado",
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