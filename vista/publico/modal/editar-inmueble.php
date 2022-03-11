<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Datos de Inmueble</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo constant('URL'); ?>Inmuebles/Nuevo_Inmueble" enctype="multipart/form-data" 
                    id="formulario" method="POST" name="formulario">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">

                                <div class="col-md-6 mt-2">
                                    <label for="id_calle2">
                                        Calle
                                    </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="id_calle2" name="datos[id_calle]">
                                        <option>
                                           Seleccione ...
                                        </option>
                                    <?php foreach($this->calle as $calles){   ?>
                                        <option value="<?php echo $calles["id_calle"];?>">
                                            <?php echo $calles["nombre_calle"];?>
                                        </option>
                                    <?php  }   ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="nombre_inmueble2">
                                        Nombre de Inmueble
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="nombre_inmueble2"
                                            name="datos[nombre_inmueble]" placeholder="Nombre de Inmueble"
                                            type="text" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="direccion2">
                                        Direccion
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control mb-10" id="direccion2"
                                            name="datos[direccion_inmueble]" placeholder="Direccion" type="text" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="tipo_inmueble2">
                                        Tipo Inmueble
                                    </label>
                                    <div class="input-group">
                                        <input list="tipo_I" id="tipo_inmueble2" name="datos[tipo_inmueble]" class="form-control " placeholder="Tipo de Inmueble" />
                                    <datalist id="tipo_I">
                                        <?php foreach($this->tipo_inmueble as $t_inmueble){   ?>
                                        <option value="<?php echo $t_inmueble["nombre_tipo"];?>">
                                        </option>
                                    <?php  }   ?>
                                    </datalist>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </form>
            </div>
            <div class="modal-footer ">
                <input type="submit" class="btn  btn-success m-r-10" name="" id="enviar" value="Guardar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->