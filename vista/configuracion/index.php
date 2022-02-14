<?php include (call."Inicio.php"); ?>
    <!-- Contenido de la pagina -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Registrar Informacion del Sistema</h1> </div>
                    <!-- /.col -->
                    
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Tablas</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <form action="<?php echo constant('URL'); ?>Calles/Nueva_Calle" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="tablas"> Seleccionar Tabla de Registros </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="tablas" name="datos[tablas]">
                                            <option> ... </option>
                                            <option value="aguas_negras"> Aguas Negras </option>
                                            <option value="agua_consumo"> Comite </option>
                                            <option value="bonos"> Bonos </option>
                                            <option value="comite"> Comite </option>
                                            <option value="compania_gas"> Compañia de Gas </option>
                                            <option value="comunidad_indigena"> Comunidad Indigena </option>
                                            <option value="misiones"> Misiones </option>
                                            <option value="municipios"> Municipios </option>
                                            <option value="org_politica"> Organizacion Politica </option>
                                            <option value="parroquias"> Parroquias </option>
                                            <option value="residuos_solidos"> Residuos Solidos </option>
                                            <option value="tipo_inmueble"> Tipo de Inmueble </option>
                                            <option value="tipo_vivienda"> Tipo de Vivienda </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
        
        
        
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include (call."Fin.php"); ?>