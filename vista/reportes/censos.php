<?php include (call."Inicio.php"); ?>
    <!-- Contenido de la pagina -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Generar Constancias</h1> </div>
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
                    <h3 class="card-title">Lista de Constancias</h3>
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
                                <label for="familia">
                                    Familia 
                                </label>
                                <div class="input-group">
                                    <input list="cedula" id="familia" name="datos[familia]"
                                        class="form-control " placeholder="Nombre Familia" />
                                    <datalist id="cedula">
                                        <?php foreach($this->familia as $familia){   ?>
                                        <option value="<?php echo $familia["nombre_familia"];?>">
                                            <?php echo $familia["nombre_familia"];?>
                                        </option>
                                    <?php  }   ?>
                                    </datalist>
                                    
                                </div>
                                
                            </div>
                            <div class="col-md-6 mt-2">
                                    <label for="organizacion_productiva"> Pertenece a alguna organizacion productiva. Indique el nombre</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="organizacion_productiva" name="" placeholder="Nombre Organizacion">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="alimentos"> Generalmente ¿con que frecuencia en su comunidad realizan jornadas de alimentos? </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="alimentos" name="datos[alimentos]">
                                            <option value='Semanal'>Semanal</option>
                                            <option value='Quincenal'>Quincenal</option>
                                          
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="comidas">Cuantas comidas son consumidas al dia en el hogar </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="comidas" name="datos[comidas]">
                                            <option value='Mensual'>Mensual</option>
                                            <option value='Ocacional'>Ocacional</option>
                                          
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="alimentacion">Tiene acceso a la casa de alimentacion </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="alimentacion" name="datos[alimentacion]">
                                            <option value='Si'>Si</option>
                                            <option value='No'>No</option>
                                          
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-6 mt-2">
                                    <label for="alimentacion">Posee la familia los siguientes articulos para el procesamiento de alimentos </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="alimentacion" name="datos[alimentacion]">
                                            <option value='Nevera'>Nevera</option>
                                            <option value='Cocina'>Cocina</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="alimentacion">Posee la familia los siguientes articulos para el procesamiento de alimentos </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="alimentacion" name="datos[alimentacion]">
                                            <option value='Nevera'>Nevera</option>
                                            <option value='Cocina'>Cocina</option>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn  btn-success m-r-10" name="" id="imprimir" value="Imprimir">
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

