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
                                        class="form-control no-simbolos " placeholder="Cedula de Persona"/>
                                    <datalist id="cedula_p">
                                        <?php foreach($this->personas as $vocero){   ?>
                                        <option value="<?php echo $vocero["cedula_persona"];?>">
                                            <?php echo $vocero["primer_nombre"]." ".$vocero["primer_apellido"];?>
                                        </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                                <span id="mensaje_1"></span>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="nombre_comite">
                                    Comite
                                </label>
                                <div class="input-group">
                                    <input list="comite" id="nombre_comite" name="datos[nombre_comite]" class="form-control no-simbolos " placeholder="Comite"/>
                                    <datalist id="comite">
                                        <?php foreach($this->comite as $comites){   ?>
                                        <option value="<?php echo $comites["nombre_comite"];?>">
                                        </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                                <span id="mensaje_2"></span>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="cargo_persona">
                                    Cargo de Vocero
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="cargo_persona" name="datos[cargo_persona]">
                                        <option value="0">
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
                                <span id="mensaje_3"></span>
                            </div> 

                            <div class="col-md-6 mt-2">
                    <label for="fecha_ingreso">
                        Fecha de Ingreso
                    </label>
                    <div class="input-group">
                        <input class="form-control  mb-10" id="fecha_ingreso" name="datos[fecha_ingreso]"
                            placeholder="letras" type="date" />
                    </div>
                    <span id="mensaje_4"></span>
                </div>

                <div class="col-md-6 mt-2">
                    <label for="fecha_salida">
                        Fecha de Salida
                    </label>
                    <div class="input-group">
                        <input class="form-control  mb-10" id="fecha_salida" name="datos[fecha_salida]"
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

<script type="text/javascript">
    $(document).ready(function() {
    $("#enviar").on("click", function() {
        var form = $("#formulario");

        var cedula_persona = document.getElementById("cedula_persona");
        var nombre_comite = document.getElementById("nombre_comite");
        var cargo_persona = document.getElementById("cargo_persona");
        var fecha_ingreso = document.getElementById("fecha_ingreso");
        var fecha_salida = document.getElementById("fecha_salida");


        var mensaje_1 = document.getElementById("mensaje_1");
        var mensaje_2 = document.getElementById("mensaje_2");
        var mensaje_3 = document.getElementById("mensaje_3");
        var mensaje_4 = document.getElementById("mensaje_4");

       
        
        var retornar = false;
        if (cedula_persona.value == '' || cedula_persona.value == null) {
            mensaje_1.innerHTML = 'Debe escribir una cedula ';
            cedula_persona.style.borderColor = 'red';
            mensaje_1.style.color = 'red';
            cedula_persona.focus();
        } else {
            mensaje_1.innerHTML = '';
            cedula_persona.style.borderColor = '';
            if (nombre_comite.value == '' || nombre_comite.value == null) {
                mensaje_2.innerHTML = 'el campo nombre no puede estar vacio';
                nombre_comite.style.borderColor = 'red';
                mensaje_2.style.color = 'red';
                nombre_comite.focus();
            } else {
                mensaje_2.innerHTML = '';
            nombre_comite.style.borderColor = '';
            if (cargo_persona.value == '0' ) {
                mensaje_3.innerHTML = 'el campo cargo  no puede estar vacio';
                cargo_persona.style.borderColor = 'red';
                mensaje_3.style.color = 'red';
                cargo_persona.focus();
            } else {
                 mensaje_3.innerHTML = '';
            cargo_persona.style.borderColor = '';
               if (fecha_ingreso.value == '' || fecha_ingreso.value == null) {
                mensaje_4.innerHTML = 'el campo fecha de ingreso no puede estar vacio';
                fecha_ingreso.style.borderColor = 'red';
                mensaje_4.style.color = 'red';
                fecha_ingreso.focus();
            } else {
                mensaje_4.innerHTML = '';
            fecha_ingreso.style.borderColor = '';
 var datos = {
                                cedula_persona: $("#cedula_persona").val(),
                                nombre_comite: $("#nombre_comite").val(),
                                cargo_persona: $("#cargo_persona").val(),
                                fecha_ingreso: $("#fecha_ingreso").val(),
                                fecha_ingreso: $("#fecha_salida").val(),
                                
                            };
                            
            $.ajax({
                                        type: 'POST',
                                        url: BASE_URL + 'Consejo_Comunal/Asignar_Consejo_Comunal',
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
                                                    location.href = BASE_URL + 'Consejo_Comunal/Consultas';
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