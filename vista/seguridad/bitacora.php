<?php include call . "Inicio.php";?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Bitacora </h1>
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
                <h3 class="card-title">Consulta y Exportacion de Datos de Bitacora</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th>
                                Usuario
                            </th>
                            <th data-toggle="true">
                                Inicio de sesión
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Última sesión
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <script>
                        $(function() {
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL + 'Bitacora/Consultas_Bitacora_Ajax'
                            }).done(function(datos) {
                                var data = JSON.parse(datos);
                                $("#example1").DataTable({
                                    "data": data,
                                    "columns": [{
                                            "data": "usuario"
                                        },
                                        {
                                            "data": "hora_inicio"
                                        },
                                        {
                                            "data": "fecha"
                                        },
                                        {
                                            "data": "hora_fin"
                                        },
                                        {
                                            "data":"acciones"
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
                            <th>
                                Usuario
                            </th>
                            <th>
                                Inicio de sesión
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Última sesión
                            </th>
                            <th>
                                Acciones
                            </th>
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
<?php include modal . "ver-calle.php";?>
<!-- /.content-wrapper -->
<?php include call . "Fin.php";?>
