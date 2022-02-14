<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestion de Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo constant('URL');?>Inicio/">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fa fa-plus-circle"></i>
                    </span>

                    <div class="info-box-content">
                        <a href="<?php echo constant('URL'); ?>Usuario/Registros/">
                            <span class="info-box-text">
                                <h3>Registar</h3>
                            </span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-list"></i></span>

                    <div class="info-box-content">
                        <a href="<?php echo constant('URL'); ?>Usuario/Consultas/">
                            <span class="info-box-text">
                                <h3>Consultar</h3>
                            </span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-edit"
                            style="color: white;"></i></span>

                    <div class="info-box-content">
                        <a href="<?php echo constant('URL'); ?>Usuario/">
                            <span class="info-box-text">
                                <h3>Actualizar</h3>
                            </span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-trash"></i></span>

                    <div class="info-box-content">
                        <a href="<?php echo constant('URL'); ?>Usuario/">
                            <span class="info-box-text">
                                <h3>Eliminar</h3>
                            </span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tipo de Usuario</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th style="width: 40px">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>26142326</td>
                                    <td>nombre</td>
                                    <td> apellido </td>
                                    <td><span class="badge bg-success">Administrador</span></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>22334665</td>
                                    <td>nombre</td>
                                    <td>apellido</td>
                                    <td><span class="badge bg-info">Usuario</span></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>27321652</td>
                                    <td>nombre</td>
                                    <td>apellido</td>
                                    <td><span class="badge bg-danger">Operador</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios Registrados</span>
                        <span class="info-box-number">100</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fa fa-check-circle"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios Activos</span>
                        <span class="info-box-number">50</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-teal ">
                    <span class="info-box-icon"><i class="fa fa-times-circle"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios Inactivos</span>
                        <span class="info-box-number">30</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-danger">
                    <span class="info-box-icon"><i class="fa fa-trash"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios Eliminados</span>
                        <span class="info-box-number">20</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>