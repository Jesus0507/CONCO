<script>
$(document).ready(function() {
    var tabla = $("#tabla_calle").DataTable({
        "ajax": {
            "url": BASE_URL + 'Calles/Consultas_Calles_Ajax',
            "method": 'GET',
            "dataSrc": ""
        },
        "columns": [{
                "data": "nombre_calle"
            },
            {
                "data": "condicion_calle"
            },
            {
                "data": function(data) {
                    return '<td class="text-center">' +
                        '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info" title="Ver" type="button" data-toggle="modal" data-target="#ver">' +
                        '<i class="fa fa-eye"></i>' +
                        '</a>' +

                        '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success" title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' +
                        '<i class="fa fa-edit" style="color: white;"></i>' +
                        '</a>' +

                        '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' +
                        '<i class="fa fa-trash"></i>' +
                        '</a>' +
                        '<p style="display: none;">' + data
                        .id_calle + '</p>' +
                        '</td>';
                }
            },

        ],
        "responsive": true,
        "autoWidth": false,
        "ordering": true,
        "info": true,
        "processing": true,
        "pageLength": 10,
        "lengthMenu": [5, 10, 20, 30, 40, 50, 100],
        "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo(
                                    '#example1_wrapper .col-md-6:eq(0)');
});

$(document).on("click", ".mensaje-eliminar", function(tabla) {

    fila = $(this).closest("tr");
    id = fila.find('td:eq(2)').text();

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
                url: BASE_URL +
                    "Calles/Eliminar_Calle/" +
                    id,
                type: "POST",
                success: function() {
                    swal("Eliminado!",
                        "El elemento fue eliminado con exito.",
                        "success");
                    /* tabla.row(fila.parents('tr')).remove().draw(); */
                    tabla.ajax.reload();
                }
            });

        } else {
            swal("Cancelado",
                "La accion fue cancelada, la informacion esta segura.",
                "error");
        }
    });


});
</script>