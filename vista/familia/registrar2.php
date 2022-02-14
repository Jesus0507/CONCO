<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Familia</h1>
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
            <form action="<?php echo constant('URL'); ?>Familias/Nuevo_Familia" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-12 text-center">
                                <h2>
                                    Jefe de Familia
                                </h2>
                            </div>
                            <div class="col-md-1 mt-2">
                                <label for="tcedula">
                                    Tipo
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="tcedula" name="datos[tcedula]">
                                        <option selected="" value="V">
                                            V
                                        </option>
                                        <option value="E">
                                            E
                                        </option>
                                        <option value="R">
                                            R
                                        </option>
                                        <option value="P">
                                            P
                                        </option>
                                        <option value="J">
                                            J
                                        </option>
                                        <option value="G">
                                            G
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-11 mt-2">
                                <label for="cedula">
                                    Cedula
                                </label>
                                <div class="input-group">
                                    <input class="form-control input-numero" id="cedula" name="datos[cedula]"
                                        placeholder="Cedula de identidad" type="text-center" />
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="primer_nombre">
                                    Primer Nombre
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="primer_nombre" name="datos[primer_nombre]"
                                        placeholder="Primer Nombre" type="text" />
                                </div>

                            </div>

                            <div class="col-md-6 mt-4">
                                <label for="segundo_nombre">
                                    Segundo Nombre
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="segundo_nombre" name="datos[segundo_nombre]"
                                        placeholder="Segundo Nombre" type="text" />
                                </div>

                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="primer_apellido">
                                    Primer Apellido
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="primer_apellido" name="datos[primer_apellido]"
                                        placeholder="Primer Apellido" type="text" />
                                </div>

                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="segundo_apellido">
                                    Segundo Apellido
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="segundo_apellido"
                                        name="datos[segundo_apellido]" placeholder="Segundo Apellido" type="text" />
                                </div>

                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="tipo_persona">
                                    Tipo Persona
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="tipo_persona" name="datos[tipo_persona]">
                                        <option value="Padre">
                                            Padre
                                        </option>
                                        <option value="Madre" selected="">
                                            Madre
                                        </option>
                                        <option value="Hijo">
                                            Hijo
                                        </option>
                                        <option value="Hija">
                                            Hija
                                        </option>
                                        <option value="Hacinamiento">
                                            Hacinamiento
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">
                                        Fecha De Nacimiento
                                    </label>
                                    <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                        type="date">
                                    </input>
                                </div>

                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="genero">
                                    Genero
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="genero" name="datos[genero]">
                                        <option selected="" value="0">
                                            ...
                                        </option>
                                        <option value="Masculino">
                                            Masculino
                                        </option>
                                        <option value="Femenino">
                                            Femenino
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- ===============================================================================================  -->
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="correo">
                                        Correo Electronico
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="correo" name="datos[correo]"
                                            placeholder="Correo" type="text">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <select class="custom-select" id="tcorreo" name="datos[tcorreo]">
                                            <option selected="" value="@gmail.com">
                                                gmail.com
                                            </option>
                                            <option value="@hotmail.com">
                                                hotmail.com
                                            </option>
                                            <option value="@yahoo.com">
                                                yahoo.com
                                            </option>
                                            <option value="@yahoo.es">
                                                yahoo.es
                                            </option>
                                            <option value="@outlok.com">
                                                outlok.com
                                            </option>
                                        </select>
                                        </input>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-5 mt-2">
                                <label for="telefono_personal">
                                    Telefono Personal
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="telefono_personal"
                                        name="datos[telefono_personal]" placeholder="0000-000-0000" type="text" />
                                </div>

                            </div>
                            <div class="col-md-1 mt-2">
                                <label for="telefono_personal">
                                    <i class="fa fa-whatsapp" style="font-size: 15px;"></i> WhatsApp
                                </label>
                                <div class="input-group">
                                    <div class="form-check mr-2 mt-2">
                                        <input class="form-check-input" type="radio" name="data[wathsapp]" id="no">
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="data[wathsapp]" id="si"
                                            checked>
                                        <label class="form-check-label" for="si">Si</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="telefono_casa">
                                    Telefono de Casa
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="telefono_casa" name="datos[telefono_casa]"
                                        placeholder="0000-000-0000" type="text" />
                                </div>

                            </div>
                            <!-- ===============================================================================================  -->
                            <div class="col-md-6 mt-4">
                                <label for=""> Carnet de la Patria</label>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for=""> Carnet de el PSUV (opcional)</label>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="serial_patria">
                                    Serial Patria
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="serial_patria" name="datos[serial_patria]"
                                        placeholder="Serial" type="text" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="serial_psuv">
                                    Serial PSUV
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="serial_psuv" name="datos[serial_psuv]"
                                        placeholder="Serial" type="text" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="codigo_patria">
                                    Codigo Patria
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="codigo_patria" name="datos[codigo_patria]"
                                        placeholder="Codigo" type="text" />
                                </div>

                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="codigo_psuv">
                                    Codigo PSUV
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="codigo_psuv" name="datos[codigo_psuv]"
                                        placeholder="Codigo" type="text" />
                                </div>

                            </div>
                            <div class="col-md-12 text-center mt-4">
                                <h3>
                                    documentos
                                </h3>
                                
                                <div class="col-md-12 mt-5">
                                                <a href="javascript:void(0)" class="btn btn-success"
                                                    title="Subir Cedula" type="button" id="subir_cedula">
                                                    <i class="fa fa-id-card-o" style="color: white;"></i>
                                                    Subir Foto de Cedula
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-info" title="Subir Carnet"
                                                    type="button" id="subir_patria">
                                                    <i class="fa fa-id-card-o" style="color: white;"></i>
                                                    Subir Foto de Carnet de Patria
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger" title="Subir Carnet"
                                                    type="button" id="subir_psuv">
                                                    <i class="fa fa-id-card-o" style="color: white;"></i>
                                                    Subir Foto de Carnetd de Psuv
                                                </a>
                                            </div>
                                            <div class="col-md-4 mt-4" id="contenido_cedula" style="display: none;">
                                                <center>
                                                    <div id="mostrar">
                                                        <img src="<?php echo constant('URL')?>config/img/users/id-card-4.png"
                                                            class="img-responsive" width="200" />
                                                    </div>
                                                </center>

                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="foto_cedula"
                                                        name="foto_cedula">
                                                    <label class="custom-file-label" for="foto_cedula">Subir
                                                        Cedula</label>
                                                </div>
                                                <a id="cancelar" href="javascript:void(0)" class="btn bg-danger mt-2"
                                                    title="Cancelar" type="button">
                                                    <i class="fa fa-times" style="color: white;"></i>
                                                    Cancelar
                                                </a>
                                            </div>
                                            <div class="col-md-4 mt-4" id="contenido_patria" style="display: none;">
                                                <center>
                                                    <div id="mostrar2">
                                                        <img src="<?php echo constant('URL')?>config/img/users/id-card-4.png"
                                                            class="img-responsive" width="200" />
                                                    </div>
                                                </center>

                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="foto_patria"
                                                        name="foto_patria">
                                                    <label class="custom-file-label" for="foto_patria">Subir
                                                        Carnet de la Patria</label>
                                                </div>
                                                <a id="cancelar2" href="javascript:void(0)" class="btn bg-danger mt-2"
                                                    title="Cancelar" type="button">
                                                    <i class="fa fa-times" style="color: white;"></i>
                                                    Cancelar
                                                </a>

                                            </div>
                                            <div class="col-md-4 mt-4" id="contenido_psuv" style="display: none;">
                                                <center>
                                                    <div id="mostrar3">
                                                        <img src="<?php echo constant('URL')?>config/img/users/id-card-4.png"
                                                            class="img-responsive img-limpia" width="200" />
                                                    </div>
                                                </center>

                                                <div class="custom-file mt-2">
                                                    <input type="file" class="custom-file-input" id="foto_psuv"
                                                        name="foto_psuv">
                                                    <label class="custom-file-label" for="foto_psuv">Subir
                                                        Carnet del Psuv</label>
                                                </div>
                                                <a id="cancelar3" href="javascript:void(0)" class="btn bg-danger mt-2"
                                                    title="Cancelar" type="button">
                                                    <i class="fa fa-times" style="color: white;"></i>
                                                    Cancelar
                                                </a>
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
<?php include (call."Style-seguridad.php"); ?>

<script>
$(document).ready(function() {
    $('#subir_cedula').click(function() {
        $("#contenido_cedula").show();
        $('#cancelar').click(function() {
            $("#contenido_cedula").fadeOut();
            $("#mostrar").html('<img  class="" width="200"  src="' +
                BASE_URL + 'config/img/users/id-card-4.png" >');
            $('#foto_cedula').val("");
        });

        document.getElementById("foto_cedula").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);
            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('mostrar'),
                    image = document.createElement('img');
                image.src = reader.result;
                $("#mostrar").html(
                    '<img  class="img-thumbnail" width="300" style="height: 200px;"  src="' +
                    image.src + '" >');
            };
        }
    });

    $('#subir_patria').click(function() {
        $("#contenido_patria").show();
        $('#cancelar2').click(function() {
            $("#contenido_patria").fadeOut();
            $("#mostrar2").html('<img  class="" width="200"  src="' +
                BASE_URL + 'config/img/users/id-card-4.png" >');
            $('#foto_patria').val("");
        });

        document.getElementById("foto_patria").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);
            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('mostrar2'),
                    image = document.createElement('img');
                image.src = reader.result;
                $("#mostrar2").html(
                    '<img  class="img-thumbnail" width="300" style="height: 200px;" src="' +
                    image.src + '" >');
            };
        }
    });

    $('#subir_psuv').click(function() {
        $("#contenido_psuv").show();
        $('#cancelar3').click(function() {
            $("#contenido_psuv").fadeOut();
            $("#mostrar3").html('<img  class="" width="200"  src="' +
                BASE_URL + 'config/img/users/id-card-4.png" >');
            $('#foto_psuv').val("");
        });

        document.getElementById("foto_psuv").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);
            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('mostrar3'),
                    image = document.createElement('img');
                image.src = reader.result;
                $("#mostrar3").html(
                    '<img  class="img-thumbnail" width="300" style="height: 200px;" src="' +
                    image.src + '" >');
            };
        }
    });

});
</script>