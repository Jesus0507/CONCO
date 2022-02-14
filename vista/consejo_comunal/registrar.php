<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <h1 class="m-0">Asinar Mienbros del Consejo Comunar</h1>
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
            <form action="<?php echo constant('URL'); ?>Consejo_Comunal/Asignar_Consejo_Comunal" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-4 mt-2">
                                <label for="cedula_persona">
                                    Cedula de Persona
                                </label>
                                <div class="input-group">
                                    <input list="cedula_p" id="cedula_persona" name="datos[cedula_persona]"
                                        class="form-control " placeholder="Cedula de Persona"/>
                                    <datalist id="cedula_p">
                                        <?php foreach($this->personas as $vocero){   ?>
                                        <option value="<?php echo $vocero["cedula_persona"];?>">
                                            <?php echo $vocero["primer_nombre"]." ".$vocero["primer_apellido"];?>
                                        </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="nombre_comite">
                                    Comite
                                </label>
                                <div class="input-group">
                                    <input list="comite" id="nombre_comite" name="datos[nombre_comite]" class="form-control " placeholder="Comite"/>
                                    <datalist id="comite">
                                        <?php foreach($this->comite as $comites){   ?>
                                        <option value="<?php echo $comites["nombre_comite"];?>">
                                        </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="cargo_persona">
                                    Cargo de Vocero
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="cargo_persona" name="datos[cargo_persona]">
                                        <option>
                                            Seleccione ...
                                        </option>
                                        <option value="Vocero Principal"> 
                                            Vocero Principal
                                        </option>
                                        <option value="Vocero Suplente">
                                            Vocero Suplente
                                        </option>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-6 mt-2">
                    <label for="fecha_ingreso">
                        Fecha de Ingreso
                    </label>
                    <div class="input-group">
                        <input class="form-control mb-10" id="fecha_ingreso" name="datos[fecha_ingreso]"
                            placeholder="letras" type="date" />
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <label for="fecha_salida">
                        Fecha de Salida
                    </label>
                    <div class="input-group">
                        <input class="form-control mb-10" id="fecha_salida" name="datos[fecha_salida]"
                            placeholder="letras" type="date" />
                    </div>
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