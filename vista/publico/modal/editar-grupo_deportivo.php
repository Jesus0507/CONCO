<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Grupo Deportivo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo constant('URL'); ?>" enctype="multipart/form-data" id="formulario"
                    method="POST" name="formulario">
                    <div class="form-group row justify-content-center">

                        <div class="col-md-6 mt-2">
                            <label for="id_deporte">
                                Deporte
                            </label>
                            <div class="input-group">
                                <input list="tipo_I" id="id_deporte2" name="datos[id_deporte]" class="form-control "
                                    placeholder="Deporte" />
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
                                Nombre Grupo Deportivo
                            </label>
                            <div class="input-group">
                                <input class="form-control mb-10" id="nombre_grupo2"
                                    name="datos[nombre_grupo_deportivo]" placeholder="Nombre de Grupo" type="text" />
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="descripcion">
                                Descripcion
                            </label>
                            <div class="input-group">
                                <input class="form-control mb-10" id="descripcion2" name="datos[descripcion]"
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
                                        <input list="cedula_p" id="cedula" type="number" name="cedula[]"
                                            placeholder="Cedula" class="form-control cedula" />
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
                                            class="form-control nombre_apellido" />
                                    </td>
                                    <td>
                                        <button type="button" name="agregar" id="agregar"
                                            class="btn btn-success">Agregar</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
            <input type="button" class="btn  btn-success m-r-10" name="" id="enviar" value="Guardar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->