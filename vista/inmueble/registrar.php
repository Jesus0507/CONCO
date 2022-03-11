<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Inmuebles</h1>
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
            <form action="<?php echo constant('URL'); ?>Inmuebles/Nuevo_Inmueble" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-6 mt-2">
                                <label for="id_calle">
                                    Calle
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="id_calle" name="datos[id_calle]">
                                        <option value="0">
                                           Seleccione ...
                                        </option>
                                    <?php foreach($this->calle as $calles){   ?>
                                        <option value="<?php echo $calles["id_calle"];?>">
                                            <?php echo $calles["nombre_calle"];?>
                                        </option>
                                    <?php  }   ?>
                                    </select>
                                </div>
                                <span id="mensaje_1"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="nombre_inmueble">
                                    Nombre de Inmueble
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10" id="nombre_inmueble" name="datos[nombre_inmueble]"
                                        placeholder="Nombre de Inmueble" type="text" />
                                </div>
                                <span id="mensaje_2"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="direccion">
                                    Direccion
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10" id="direccion" name="datos[direccion_inmueble]"
                                        placeholder="Direccion" type="text" />
                                </div>
                                <span id="mensaje_3"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="tipo_inmueble">
                                    Tipo Inmueble
                                </label>
                                <div class="input-group">
                                    <input list="tipo_I" id="tipo_inmueble" name="datos[tipo_inmueble]" class="form-control no-simbolos " placeholder="Tipo de Inmueble" />
                                    <datalist id="tipo_I">
                                        <?php foreach($this->tipo_inmueble as $t_inmueble){   ?>
                                        <option value="<?php echo $t_inmueble["nombre_tipo"];?>">
                                        </option>
                                    <?php  }   ?>
                                    </datalist>
                                    
                                </div>
                                <span id="mensaje_4"></span>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn  btn-success m-r-10" name="" id="enviar" value="Guardar">
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

<script type="text/javascript">
    $(document).ready(function() {
    $("#enviar").on("click", function() {
        var form = $("#formulario");

        var id_calle = document.getElementById("id_calle");
        var nombre_inmueble = document.getElementById("nombre_inmueble");
        var direccion = document.getElementById("direccion");
        var tipo_inmueble = document.getElementById("tipo_inmueble");


        var mensaje_1 = document.getElementById("mensaje_1");
        var mensaje_2 = document.getElementById("mensaje_2");
        var mensaje_3 = document.getElementById("mensaje_3");
        var mensaje_4 = document.getElementById("mensaje_4");

        var datos = {
                                id_calle: $("#id_calle").val(),
                                nombre_inmueble: $("#nombre_inmueble").val(),
                                direccion_inmueble: $("#direccion").val(),
                                tipo_inmueble: $("#tipo_inmueble").val(),
                                
                            };
                            
        
        var retornar = false;
        if (id_calle.value == 0) {
            mensaje_1.innerHTML = 'Debe seleccionar una Calle';
            id_calle.style.borderColor = 'red';
            mensaje_1.style.color = 'red';
            id_calle.focus();
        } else {
            mensaje_1.innerHTML = '';
            id_calle.style.borderColor = '';
            if (nombre_inmueble.value == '' || nombre_inmueble.value == null) {
                mensaje_2.innerHTML = 'el campo nombre no puede estar vacio';
                nombre_inmueble.style.borderColor = 'red';
                mensaje_2.style.color = 'red';
                nombre_inmueble.focus();
            } else {
                mensaje_2.innerHTML = '';
            nombre_inmueble.style.borderColor = '';
            if (direccion.value == '' || direccion.value == null) {
                mensaje_3.innerHTML = 'el campo direccion no puede estar vacio';
                direccion.style.borderColor = 'red';
                mensaje_3.style.color = 'red';
                direccion.focus();
            } else {
                 mensaje_3.innerHTML = '';
            direccion.style.borderColor = '';
               if (tipo_inmueble.value == '' || tipo_inmueble.value == null) {
                mensaje_4.innerHTML = 'el campo tipo de inmueble no puede estar vacio';
                tipo_inmueble.style.borderColor = 'red';
                mensaje_4.style.color = 'red';
                tipo_inmueble.focus();
            } else {
                mensaje_4.innerHTML = '';
            tipo_inmueble.style.borderColor = '';

            $.ajax({
                                        type: 'POST',
                                        url: BASE_URL + 'Inmuebles/Nuevo_Inmueble',
                                        data: {
                                            'datos': datos,
                                        },
                                        success: function(respuesta) {
                                            if (respuesta != 0) {
                                                swal({
                                                    title: "Exito!",
                                                    text: "Se ha registrado de forma exitosa",
                                                    type: "success",
                                                    showConfirmButton: false,
                                                });
                                                setTimeout(function() {
                                                    location.href = BASE_URL + 'Inmuebles/Consultas';
                                                }, 2000);
                                            }else{
                                                alert("error")
                                            }
                                        },
                                        error: function(respuesta) {
                                            alert("Error al enviar Controlador")
                                        }
                                    });
            } 
            }
            }
        }
    });
    document.onkeypress = function(e) {
        if (e.which == 13 || e.keyCode == 13) {
            envioFormulario();
            return false;
        } else {
            return true;
        }
    }
});


    
</script>