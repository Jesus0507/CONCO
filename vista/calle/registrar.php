<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Calles</h1>
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
                <h3 class="card-title">Formulario de Registro</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="<?php echo constant('URL'); ?>Calles/Nueva_Calle" enctype="multipart/form-data" id="formulario"
                method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">
                            
                            <div class="col-md-12 mt-2">
                                <label for="nombre_calle">
                                    Nombre de Calle
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="nombre_calle" name="datos[nombre_calle]"
                                        placeholder="Nombre de Calle" type="text" />
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                            <label for="condicion_calle">
                                    Condicion de calle
                                </label>
                                <textarea class="form-control" cols="5" id="condicion_calle" name="datos[condicion_calle]"
                                    rows="5" placeholder="Condicion de la Calle"></textarea>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                            <input type="button" class="btn btn-danger" id="" name="" value="Limpiar">
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
