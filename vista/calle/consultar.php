<?php include (call."Inicio.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Calles </h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consulta y Exportacion de Datos de Calles</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th>Nombre de Calle</th>
                            <th>Condicion</th>
                            <th style="width: 115px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>
                        $(function() {
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL + 'Calles/Consultas_Calles_Ajax'
                            }).done(function(datos) {
                                var data = JSON.parse(datos);
                                var tabla = $("#example1").DataTable({
                                    "data": data,
                                    "columns": [{
                                            "data": "nombre_calle"
                                        },
                                        {
                                            "data": "condicion_calle"
                                        },
                                        {
                                            "data": function(data) {
                                                return '<td class="text-center">' +
                                                    '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info ver-popup" title="Ver" type="button" data-toggle="modal" data-target="#ver">' +
                                                    '<i class="fa fa-eye"></i>' +
                                                    '</a>' +

                                                    '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' +
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
                                    "lengthMenu": [5, 10, 20, 30, 40, 50, 100]
                                }).buttons().container().appendTo(
                                    '#example1_wrapper .col-md-6:eq(0)');

                                /* OPCION ELIMINAR */

                                $(document).on("click", ".mensaje-eliminar", function() {

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
                                                    "Calles/Eliminar_Calle",
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
                                                        location
                                                        .reload();
                                                    }, 3000);
                                                    
                                                    // tabla.ajax.reload(null, false);
                                                }
                                            })
                                        } else {
                                            swal("Cancelado",
                                                "La accion fue cancelada, la informacion esta segura.",
                                                "error");

                                        }
                                    });

                                });



                                $(document).on('click', '.ver-popup', function() {

                                    fila = $(this).closest("tr");
                                    nombre = fila.find('td:eq(0)').text();
                                    condicion = fila.find('td:eq(1)').text();
                                    $('#nombre').val(nombre);
                                    $('#condicion').val(condicion);
                                });

                                $(document).on('click', '.btnEditar', function() {

                                    fila = $(this).closest("tr");
                                    nombre = fila.find('td:eq(0)').text();
                                    condicion = fila.find('td:eq(1)').text();
                                    $('#nombre2').val(nombre);
                                    $('#condicion2').val(condicion);

                                });

                            }).fail(function() {
                                alert("error")
                            })


                        });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre de Calle</th>
                            <th>Condicion</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<?php include modal."ver-calle.php"; ?>
<?php include modal."editar-calle.php"; ?>

<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>