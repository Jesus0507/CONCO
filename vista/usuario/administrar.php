<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administracion de Usuarios</h1> 
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo constant('URL');?>Inicio/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo constant('URL');?>Usuario/">Usuario</a></li>
                        <li class="breadcrumb-item active">Administracion</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consulta y Administracion de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nommbre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>
                        $(function() {
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL + 'Usuario/Consultas_Usuario_Ajax'
                            }).done(function(datos) {
                                var data = JSON.parse(datos);
                                $("#example1").DataTable({
                                    "data": data,
                                    "columns": [{
                                            "data": "cedula"
                                        },
                                        {
                                            "data": "nombre"
                                        },
                                        {
                                            "data": "apellido"
                                        },
                                        {
                                            "data": "correo"
                                        },
                                        {
                                            "data": "rol_inicio"
                                        },
                                        {
                                            "data": function(data) {
                                                return '<td class="text-center">' +
                                                    '<a style="margin-right: 5px;" class="btn bg-info" title="Ver" type="button" data-toggle="modal" data-target="#ver">' +
                                                    '<i class="fa fa-eye"></i>' +
                                                    '</a>' +
                                                    '<a style="margin-right: 5px;" class="btn bg-success" title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' +
                                                    '<i class="fa fa-edit" style="color: white;"></i>' +
                                                    '</a>' +
                                                    '<a style="margin-right: 5px;" class="btn bg-danger" title="Eliminar">' +
                                                    '<i class="fa fa-trash"></i>' +
                                                    '</a>' +
                                                    '</td>';
                                            }
                                        }
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
                            }).fail(function() {
                                alert("error")
                            })

                        });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cedula</th>
                            <th>Nommbre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Opciones</th>
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
<?php include modal."editar-usuario.php"; ?>
<?php include modal."ver-usuario.php"; ?>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>