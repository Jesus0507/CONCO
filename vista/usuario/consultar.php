<?php include (call."Inicio.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Usuarios </h1>
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
                <h3 class="card-title">Consulta y Exportacion de Datos de Usuarios</h3>
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
                            <th style="width: 20px;">Ver</th>
                            <th style="width: 20px;">Editar</th>
                            <th style="width: 20px;">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>
                        $(function() {
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL + 'Usuario/Consultas_Usuario_Ajax_Filtered'
                            }).done(function(datos) {
                                var data = JSON.parse(datos);
                                $("#example1").DataTable({
                                    "data": data,
                                    "columns": [{
                                            "data": "cedula_usuario"
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
                                                    '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-info" title="Ver" type="button" data-toggle="modal" data-target="#ver">' +
                                                    '<i class="fa fa-eye" onmouseover="prueba('+data["cedula_usuario"]+');"></i>' +
                                                    '</a>' +
                                                    '</td>';
                                            }
                                        },
                                        {
                                            "data": function(data) {
                                                return '<td class="text-center">' +
                                                    '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success" title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar" onclick="verEditar('+data["cedula_usuario"]+');">' +
                                                    '<i class="fa fa-edit" style="color: white;"></i>' +
                                                    '</a>' +
                                                    '</td>';
                                            }
                                        },
                                        {
                                            "data": function(data) {
                                                return '<td class="text-center">' +
                                                    '<a href="javascript:void(0)"  style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" onclick="eliminar('+data["cedula_usuario"]+');" title="Eliminar">' +
                                                    '<i class="fa fa-trash"></i>' +
                                                    '</a>' +
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
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
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
<?php include modal."ver-usuario.php"; ?>
<?php include modal."editar-usuario.php"; ?>

<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>

<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/consultar-usuarios.js"></script>