<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Sector Agricola</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo constant('URL');?>Inicio/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo constant('URL');?>Personas/">Personas</a></li>
                        <li class="breadcrumb-item active">Sector Agricola</li>
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
                <h3 class="card-title">Formulario de Registro</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="<?php echo constant('URL'); ?>Sector_Agricola/Nuevo_Sector_Agricola" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-12 mt-2">
                                <label for="cedula_persona">
                                    Cedula de Persona
                                </label>
                                <div class="input-group">
                                    <input list="cedula_p" id="cedula_persona" name="datos[cedula_persona]"
                                        class="form-control no-simbolos letras_numeros " placeholder="Cedula de Persona" oninput="Limitar(this,15)"/>
                                    <datalist id="cedula_p">
                                        <?php foreach($this->personas as $persona){   ?>
                                        <option value="<?php echo $persona["cedula_persona"];?>">
                                            <?php echo $persona["primer_nombre"]." ".$persona["primer_apellido"];?>
                                        </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="area_produccion">
                                    Area de Produccion
                                </label>
                                <div class="input-group">
                                    <input class="form-control  no-simbolos mb-10 no-numeros" id="area_produccion" name="datos[area_produccion]"
                                        placeholder="Area de Produccion" type="text" oninput="Limitar(this,25)" />
                                </div>
                            </div>

                           
                            <div class="col-md-6 mt-2">
                                <label for="anios_experiencia">
                                    Años de Experiencia
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10 solo-numeros" id="anios_experiencia" name="datos[anios_experiencia]"
                                        placeholder="Años de Experiencia" type="number" oninput="Limitar(this,2)"/>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mt-2">
                                <label for="org_agricola">
                                    Pertenece a una Organizacion Agricola
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10" id="org_agricola" name="datos[org_agricola]"
                                        placeholder="Organizacion Agricola" type="text" oninput="Limitar(this,25)"/>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="rubro_principal">
                                    Rubro Principal
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10 solo-letras" id="rubro_principal" name="datos[rubro_principal]"
                                        placeholder="Rubro Principal" type="text" oninput="Limitar(this,15)"/>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="rubro_alternativo">
                                    Rubro Alternativo
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10 solo-letras" id="rubro_alternativo" name="datos[rubro_alternativo]"
                                        placeholder=" Rubro Alternativo" type="text" oninput="Limitar(this,15)"/>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="financiado">
                                    Financiamiento
                                </label>
                                <div class="input-group">
                                    <input class="form-control solo-numeros mb-10 dinero" id="financiado" name="datos[financiado]"
                                        placeholder="Financiado" type="text" />
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="registro_INTI">
                                    Posee Registro INTI
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="registro_INTI" name="datos[registro_INTI]">
                                        <option value="1">
                                            Si
                                        </option>
                                        <option value="0" selected>
                                            No
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="constancia_productor">
                                    Posee Constancia de Productor
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="constancia_productor" name="datos[constancia_productor]">
                                        <option value="1">
                                            Si
                                        </option>
                                        <option value="0" selected>
                                            No
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="senial_hierro">
                                    Posee Señal de Hierro
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="senial_hierro" name="datos[senial_hierro]">
                                        <option value="1">
                                            Si
                                        </option>
                                        <option value="0" selected>
                                            No
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="agua_riego">
                                    Posee Agua de Riego
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="agua_riego" name="datos[agua_riego]">
                                        <option value="1">
                                            Si
                                        </option>
                                        <option value="0" selected>
                                            No
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="produccion_actual">
                                    Produce Actulmente
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="produccion_actual" name="datos[produccion_actual]">
                                        <option value="1">
                                            Si
                                        </option>
                                        <option value="0" selected>
                                            No
                                        </option>

                                    </select>
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

<script>
    $(".dinero").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1,$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            });
        }
    });
</script>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>