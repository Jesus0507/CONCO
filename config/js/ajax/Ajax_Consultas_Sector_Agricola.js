$(function() {
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'Sector_Agricola/Consultas_Sector_Agricola_Ajax'
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
                "data": "area_produccion"
            }, {
                "data": "anios_experiencia"
            }, {
                "data": function(data) {
                    return '<td class="text-center">' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info ver-popup" title="Ver" type="button" data-toggle="modal" data-target="#ver">' + '<i class="fa fa-eye"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>' + '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_sector_agricola + '</p>' + '</td>';
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
                        url: BASE_URL + "Sector_Agricola/Eliminar_Sector_Agricola",
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
                                showConfirmButton: false
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
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
            cedula_persona = fila.find('td:eq(0)').text();
            nombre_apellido = fila.find('td:eq(1)').text();
            area_produccion = fila.find('td:eq(2)').text();
            anios_experiencia = fila.find('td:eq(3)').text();
            id = fila.find('td:eq(4)').text();
            $('#cedula_persona').val(cedula_persona);
            $('#nombre_apellido').val(nombre_apellido);
            $('#area_produccion').val(area_produccion);
            $('#anios_experiencia').val(anios_experiencia);
            $.ajax({
                type: "POST",
                url: BASE_URL + "Sector_Agricola/Consultas_Sector_Agricola_Persona",
                data: {
                    "id": id
                }
            }).done(function(result) {
                var result = JSON.parse(result);
                $('#rubro_principal').val(result[0]["rubro_principal"]);
                $('#rubro_alternativo').val(result[0]["rubro_alternativo"]);
                $('#financiado').val(result[0]["financiado"]);
                $('#org_agricola').val(result[0]["org_agricola"]);
                document.getElementById("registro_INTI").selectedIndex = result[0]["registro_INTI"];
                document.getElementById("constancia_productor").selectedIndex = result[0]["constancia_productor"];
                document.getElementById("senial_hierro").selectedIndex = result[0]["senial_hierro"];
                document.getElementById("agua_riego").selectedIndex = result[0]["agua_riego"];
                document.getElementById("produccion_actual").selectedIndex = result[0]["produccion_actual"];
            });
        });
        $(document).on('click', '.btnEditar', function() {
            fila = $(this).closest("tr");
            cedula_persona = fila.find('td:eq(0)').text();
            nombre_apellido = fila.find('td:eq(1)').text();
            area_produccion = fila.find('td:eq(2)').text();
            anios_experiencia = fila.find('td:eq(3)').text();
            id = fila.find('td:eq(4)').text();
            $('#cedula_persona2').val(cedula_persona);
            $('#nombre_apellido2').val(nombre_apellido);
            $('#area_produccion2').val(area_produccion);
            $('#anios_experiencia2').val(anios_experiencia);
            $.ajax({
                type: "POST",
                url: BASE_URL + "Sector_Agricola/Consultas_Sector_Agricola_Persona",
                data: {
                    "id": id
                }
            }).done(function(result) {
                var result = JSON.parse(result);
                $('#rubro_principal2').val(result[0]["rubro_principal"]);
                $('#rubro_alternativo2').val(result[0]["rubro_alternativo"]);
                $('#financiado2').val(result[0]["financiado"]);
                $('#org_agricola2').val(result[0]["org_agricola"]);
                document.getElementById("registro_INTI2").selectedIndex = result[0]["registro_INTI"];
                document.getElementById("constancia_productor2").selectedIndex = result[0]["constancia_productor"];
                document.getElementById("senial_hierro2").selectedIndex = result[0]["senial_hierro"];
                document.getElementById("agua_riego2").selectedIndex = result[0]["agua_riego"];
                document.getElementById("produccion_actual2").selectedIndex = result[0]["produccion_actual"];
            });
            $(document).on("click", "#enviar", function() {
                var datos = [
                    document.getElementById("cedula_persona2").value,
                    document.getElementById("area_produccion2").value,
                    document.getElementById("anios_experiencia2").value,
                    document.getElementById("rubro_principal2").value,
                    document.getElementById("rubro_alternativo2").value,
                    document.getElementById("registro_INTI2").selectedIndex,
                    document.getElementById("constancia_productor2").selectedIndex,
                    document.getElementById("senial_hierro2").selectedIndex,
                    document.getElementById("financiado2").value,
                    document.getElementById("agua_riego2").selectedIndex,
                    document.getElementById("produccion_actual2").selectedIndex,
                    document.getElementById("org_agricola2").value,
                    id
                ];
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "Sector_Agricola/Editar_Sector_Agricola",
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