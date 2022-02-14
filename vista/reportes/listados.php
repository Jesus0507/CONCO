<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Generar Listados</h1>
                </div>
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
                <h3 class="card-title">Lista de Reportes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i
                            class="fas fa-minus"></i> </button>
                </div>
            </div>
            <form action="<?php echo constant('URL'); ?>Calles/Nueva_Calle" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-12 mt-2">
                                <label for="listados"> Seleccionar Reporte</label>
                                <div class="input-group">
                                    <select class="custom-select" id="listados" name="listados">
                                        <option> ... </option>

                                        <option value="1">
                                            Listado de Grupos Deportivos
                                        </option>

                                        <option value="2">
                                            Listado de Milicianos
                                        </option>

                                        <option value="3">
                                            Listado de Jefes de Familia
                                        </option>

                                        <option value="4">
                                            Listado de Personas con Discapacidad
                                        </option>

                                        <option value="5">
                                            Listado de Estructura del Consejo Comunal
                                        </option>

                                        <option value="6">
                                            Listado de Embarazadas
                                        </option>

                                        <option value="7">
                                            Listado de Nivel Educativo de Personas
                                        </option>

                                        <option value="8">
                                            Listado de Personas con Carnet
                                        </option>

                                        <option value="9">
                                            Listado de Negocios
                                        </option>

                                        <option value="10">
                                            Listado de Inmuebles
                                        </option>

                                        <option value="11">
                                            Listado de Viviendas
                                        </option>

                                        <option value="12">
                                            Listado de Personas Enfermedades
                                        </option>

                                        <option value="13">
                                            Listado de Votantes
                                        </option>

                                        <option value="14">
                                            Listado de Poblacion Edades
                                        </option>

                                        <option value="15">
                                            Listado de Personas de Sexo Diverso
                                        </option>

                                        
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
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
</div>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<script>
    
/* $(document).on("change", "#listados", function () {

    var listado = document.getElementById("listados").value;

    $.ajax({
        type: 'POST',
        url: BASE_URL + 'Reportes/Consultas_Listados',
        data: {
            'listado': listado,          
        }
        }).done(function(datos) {
            var data = JSON.parse(datos);
            var tabla ="<tr>";
            for ( i = 0; i < data.length; i++) {
                tabla+= data[i];
                
            }
            $("#datos").html(tabla);
        }).fail(function() {
        alert("error")
        })
}); */
</script>