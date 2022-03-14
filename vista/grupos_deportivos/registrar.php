<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Grupos Deportivos</h1>
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
            <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-6 mt-2">
                                <label for="id_deporte">
                                    Deporte
                                </label>
                                <div class="input-group">
                                    <input list="tipo_I" id="id_deporte" name="datos[id_deporte]" class="form-control no-simbolos solo-letras "
                                        placeholder="Deporte" oninput="Limitar(this,25)"/>
                                    <datalist id="tipo_I">
                                        <?php foreach($this->deportes as $deporte){   ?>
                                        <option value="<?php echo $deporte["nombre_deporte"];?>">
                                        </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="nombre_grupo_deportivo">
                                    Nombre del Grupo Deportivo
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10" id="nombre_grupo_deportivo"
                                        name="datos[nombre_grupo_deportivo]" placeholder="Nombre de Grupo"
                                        type="text" oninput="Limitar(this,50)"/>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="descripcion">
                                    Descripcion
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10" id="descripcion" name="datos[descripcion]"
                                        placeholder="Nombre de Grupo" type="text" />
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="">
                                    Integrantes
                                </label>
                                <table class="table table-bordered" id="tabla">
                                    <tr>
                                        <td class="col-6">
                                            <input list="cedula_p" id="cedula" type="number" name="cedula[]" placeholder="Cedula"
                                                class="form-control " oninput="Limitar(this,15)"/>
                                            <datalist id="cedula_p">
                                                <?php foreach($this->personas as $persona){   ?>
                                                <option value="<?php echo $persona["cedula_persona"];?>">
                                                    <?php echo $persona["primer_nombre"]." ".$persona["primer_apellido"];?>
                                                </option>
                                                <?php  }   ?>
                                            </datalist>
                                        </td>
                                        <td class="col-6">
                                            <input type="text" name="" placeholder="Nombre y Apellido"
                                                class="form-control no-simbolos nombre_apellido" />
                                        </td>
                                        <td>
                                            <button type="button" name="agregar" id="agregar"
                                                class="btn btn-success">Agregar</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn  btn-success m-r-10" name="" id="guardar" value="Guardar">
                            
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
$(document).ready(function() {
    var i = 1;
    $('#agregar').click(function() {
        i++;
        var html =
            '<tr id="row' + i + '" >' +
            '<td class="col-6">' +
            '<input list="cedula_p"  type="number" name="cedula[]" placeholder="Cedula" class="form-control no-simbolos cedula" /><datalist id="cedula_p"><?php foreach($this->personas as $persona){   ?><option value="<?php echo $persona["cedula_persona"];?>"><?php echo $persona["primer_nombre"]." ".$persona["primer_apellido"];?></option><?php  }   ?></datalist>' +
            '</td>' +
            '<td class="col-6">' +
            '<input type="text" name="" placeholder="Nombre y Apellido"     class="form-control no-simbolos nombre_apellido" />' +
            '</td>' +
            '<td>' +
            '<button type="button" name="eliminar" id="' + i +
            '" class="btn btn-danger eliminar">X</button>' +
            '</td>' +
            '</tr>';

        $('#tabla').append(html);
    });

    $(document).on('click', '.eliminar', function() {
        var boton = $(this).attr("id");
        $('#row' + boton + '').remove();
    });

    /* $("#cedula").keyup(function () {
        var cedula = $("#cedula").val();

        $.ajax({
            type: "POST",
            url: BASE_URL + "Grupo_Deportivo/Consultas_Grupo_Deportivo_Persona",
            data: {
                cedula: cedula,
            },
        })
            .done(function (datos) {
                alert(datos)
                if (datos != "vacio") {
                    document.getElementById("id_parroquia").selectedIndex = datos;
                } else {
                    console.log("vacio");
                }
            })
            .fail(function () {
                alert("error");
            });
    }); */


    $(document).on('click', '#guardar', function() {
        var id_deporte = $('#id_deporte').val();
        var nombre_grupo_deportivo = $('#nombre_grupo_deportivo').val();
        var descripcion = $('#descripcion').val();

        var datos = [id_deporte, nombre_grupo_deportivo, descripcion];

        var todos_inputs = $('#tabla :input');
        var cedulas = [];

        for (var i = 0; i < todos_inputs.length; i++) {
            if (todos_inputs[i].type == 'number') {
                cedulas.push(todos_inputs[i].value);
            }
        }

        $.ajax({
            type: 'POST',
            url: BASE_URL + 'Grupos_Deportivos/Nuevo_Grupo_Deportivo',
            data: {
                'datos': datos
            }
        }).done(function(datos) {

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'Grupos_Deportivos/Registrar_Personas_Grupos',
                data: {
                    'cedula': cedulas
                }
            }).done(function(datos) {
                swal({
                            title: "Exito!",
                            text: datos,
                            type: "success",
                            showConfirmButton: true
                        }, function(isConfirm) {
                            if (isConfirm) {

                                setTimeout(
                                    function() {
                                        location.href=BASE_URL + 'Grupos_Deportivos/Consultas';
                                    }, 0000);
                            }
                        });

            }).fail(function() {
                alert("error")
            })

        }).fail(function() {
            alert("error")
        })

    });


});
</script>

<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>