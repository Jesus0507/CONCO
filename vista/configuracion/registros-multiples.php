<!-- ============================================================================================ -->
<!-- Aguas Negras-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Aguas Negras</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Aguas_Negras_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_aguas_negras"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_aguas_negras + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Aguas Negras</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Aguas_Negras" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_aguas_negras"> Nombre de Aguas Negras </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_aguas_negras" name="datos[nombre_aguas_negras]" placeholder="Nombre de Aguas Negras" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- AGUAS CONSUMO -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Aguas de Consumo</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Agua_Consumo_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_agua_consumo"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_agua_consumo + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Aguas de Consumo</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Agua_Consumo" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_agua_consumo"> Nombre de Aguas de Consumo </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_agua_consumo" name="datos[nombre_agua_consumo]" placeholder="Nombre de Aguas de Consumo" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- BONOS -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Bonos</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Bonos_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_bono"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_bono + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Bonos</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Bono" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12">
                                    <label for="nombre_bono"> Nombre de Bonos </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_bono" name="datos[nombre_bono]" placeholder="Nombre de Bonos" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- ============================================================================================ -->
<!-- Comite -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Comites</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 60%;">Nombre</th>
                                        <th style="width: 20%;">Cantida de Personas</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Comites_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_comite"
                                                }, {
                                                    "data": "cantidad_personas"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_comite + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad de Personas</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Comites</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Comite" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_comite"> Nombre de Comite </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_comite" name="datos[nombre_comite]" placeholder="Nombre de Comite" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- COMPAÑIA DE GAS -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Compañia de Gas</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Nombre</th>
                                        <th style="width: 20%;">Descripcion</th>
                                        <th style="width: 10%;">Telefono</th>
                                        <th style="width: 5%;">Editar</th>
                                        <th style="width: 5%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Compañia_Gas_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_compania"
                                                }, {
                                                    "data": "descripcion"
                                                }, {
                                                    "data": "telefono"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_compania_gas + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Telefono</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Compañia de Gas</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Compania_Gas" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 mt-2">
                                    <label for="nombre_compania "> Nombre de Compañia </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_compania   " name="datos[nombre_compania]" placeholder="Nombre de Comite" type="text" /> </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="telefono    "> Telefono </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="telefono  " name="datos[telefono]" placeholder="Numero de Telefono" type="text" /> </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="descripcion"> Descripcion </label>
                                    <textarea class="form-control" cols="5" id="descripcion" name="datos[descripcion]" rows="5" placeholder="Descripcion"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- Municipios -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Municipios</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Municipios_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_municipio"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_municipio + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Municipios</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Municipios" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_municipio"> Nombre de Municipio </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_municipio" name="datos[nombre_municipio]" placeholder="Nombre de Municipio" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- MISIONES -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Misiones</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Misiones_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_mision"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_mision + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Misiones</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Mision" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_mision"> Nombre de Mision </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_mision" name="datos[nombre_mision]" placeholder="Nombre de Mision" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- PARROQUIAS -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Parroquias</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Nombre</th>
                                        <th style="width: 30%;">Municipio</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Parroquias_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_parroquia"
                                                }, {
                                                    "data": "nombre_municipio"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_parroquia + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Municipio</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Parroquias</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Parroquia" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 mt-2">
                                    <label for="nombre_parroquia"> Nombre de Parroquia </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_parroquia" name="datos[nombre_parroquia]" placeholder="Nombre de Parroquia" type="text" /> </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="id_municipio"> Municipio </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="id_municipio" name="datos[id_municipio]">
                                            <option> ... </option>
                                            <?php foreach($this->municipios as $municipio){   ?>
                                                <option value="<?php echo $municipio[" id_municipio "];?>">
                                                    <?php echo $municipio["nombre_municipio"];?>
                                                </option>
                                                <?php  }   ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- ORGANIZACION POLITICA -->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Organizacion Politica</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Organizacion_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_org"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_org_politica + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Organizacion Politica</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Organizacion_Politica" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_org"> Nombre de Organizacion Politica </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_org" name="datos[nombre_org]" placeholder="Nombre de Organizacion" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- RESIDUOS SOLIDOS-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Residuos Solidos</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Residuos_Solidos_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_residuos"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_residuos_solidos + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Residuos Solidos</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Residuos_Solidos" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_residuos"> Nombre de Residuos Solidos </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_residuos" name="datos[nombre_residuos]" placeholder="Nombre de Residuos" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- TIPO INMUEBLE-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Tipo Inmueble</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Tipo_Inmueble_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_tipo"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_tipo_inmueble + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Tipo Inmueble</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Tipo_Inmueble" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_tipo"> Nombre de Tipo Inmueble </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_tipo" name="datos[nombre_tipo]" placeholder="Nombre de Tipo Inmueble" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- TIPO VIVIENDA-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Tipo Vivienda</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Tipo_Vivienda_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_tipo_vivienda"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_tipo_vivienda + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Tipo Vivienda</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Tipo_Vivienda" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_tipo_vivienda"> Nombre de Tipo Vivienda </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_tipo_vivienda" name="datos[nombre_tipo_vivienda]" placeholder="Nombre de Tipo Vivienda" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- PROYECTOS-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Proyectos</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Nombre</th>
                                        <th style="width: 20%;">Area</th>
                                        <th style="width: 20%;">Estado</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Proyectos_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_proyecto"
                                                }, {
                                                    "data": "area_proyecto"
                                                }, {
                                                    "data": "estado_proyecto"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_proyecto + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Area</th>
                                        <th>Estado</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Proyectos</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Proyecto" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_proyecto"> Nombre de Proyectos </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_proyecto" name="datos[nombre_proyecto]" placeholder="Nombre de Proyectos" type="text" /> </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="area_proyectO"> Area del Proyecto </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="area_proyecto " name="datos[area_proyecto]" placeholder="Area del Proyecto" type="text" /> </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="estado_proyecto"> Estado del Proyecto </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="estado_proyecto" name="datos[estado_proyecto]" placeholder="Estado del Proyecto" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- CONDICION OCUPACIONS-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Condicion de Ocupacion</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Condicion_Ocupacion_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "condicion_vivienda"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_condicion_ocupacion + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Condicion de Ocupacion</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Condicion_Ocupacion" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="condicion_vivienda"> Nombre de Condicion de Ocupacion </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="condicion_vivienda" name="datos[condicion_vivienda]" placeholder="Nombre de Condicion de Ocupacion" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- COMUNIDAD INDIGENA-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Comunidad Indigena</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 80%;">Nombre</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Comunidad_Indigena_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_comunidad"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_comunidad_indigena + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Comunidad Indigena</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nueva_Comunidad_Indigena" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_comunidad"> Nombre de Comunidad Indigena </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_comunidad" name="datos[nombre_comunidad]" placeholder="Nombre de Comunidad Indigena" type="text" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->
<!-- ============================================================================================ -->
<!-- CENTRO DE VOTACION-->
<section class="content">
    <!-- Default box -->
    <div class="card card-outline card-primary ">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link active" id="login" data-toggle="pill" href="#login2" role="tab" aria-controls="login2" aria-selected="true">Consultar Datos</a> </li>
                <li class="nav-item" style="width: 50%;text-align: center;"> <a class="nav-link" id="constancia" data-toggle="pill" href="#constancia2" role="tab" aria-controls="constancia2" aria-selected="false">Registrar Datos</a> </li>
            </ul>
        </div>
        <!-- card-body -->
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">
                    <div class="card-block">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <h3 style="text-align: center;">Centro de Votacion</h3> </div>
                        <center>
                            <table id="example1" class="table table-bordered  table-hover" style="width: 90%;">
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Nombre</th>
                                        <th style="width: 30%;">Parroquia</th>
                                        <th style="width: 10%;">Editar</th>
                                        <th style="width: 10%;">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                    $(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Configuracion/Consultas_Centro_Votacion_Ajax'
                                        }).done(function(datos) {
                                            var data = JSON.parse(datos);
                                            var tabla = $("#example1").DataTable({
                                                "data": data,
                                                "columns": [{
                                                    "data": "nombre_centro"
                                                }, {
                                                    "data": "nombre_parroquia"
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-success btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + '</a>';
                                                    }
                                                }, {
                                                    "data": function(data) {
                                                        return '<a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + '</a>' + '<p style="display: none;">' + data.id_centro_votacion + '</p>' + '</td>';
                                                    }
                                                }, ],
                                                "responsive": true,
                                                "autoWidth": false,
                                                "ordering": true,
                                                "info": false,
                                                "processing": true,
                                                "searching": false,
                                                "paging": false
                                            });
                                        }).fail(function() {
                                            alert("error")
                                        })
                                    });
                                    </script>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Parroquia</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="constancia2" role="tabpanel" aria-labelledby="constancia">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <h3 style="text-align: center;">Centro de Votacion</h3> </div>
                    <form action="<?php echo constant('URL'); ?>Configuracion/Nuevo_Centro_Votacion" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 mt-2">
                                    <label for="nombre_centro"> Nombre de Centro de Votacion </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_centro" name="datos[nombre_centro]" placeholder="Nombre de Centro de Votacion" type="text" /> </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="id_parroquia"> Parroquia </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="id_parroquia" name="datos[id_parroquia]">
                                            <option> ... </option>
                                            <?php foreach($this->parroquias as $parroquia){   ?>
                                                <option value="<?php echo $parroquia[" id_parroquia "];?>">
                                                    <?php echo $parroquia["nombre_parroquia"];?>
                                                </option>
                                                <?php  }   ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="submit" class="btn  btn-success m-r-10" name="" id="" value="Guardar">
                                <input type="button" class="btn btn-danger" id="" name="" value="Limpiar"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</section>
<!-- /.content -->