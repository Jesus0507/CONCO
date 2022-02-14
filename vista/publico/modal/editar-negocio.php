<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Datos de Negocio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
            <form action="<?php echo constant('URL'); ?>Negocios/Nuevo_Negocio" enctype="multipart/form-data"
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
                                    <select class="custom-select" id="calle2" name="">
                                        <option value='0'>
                                           Seleccione ...
                                        </option>
                                    <?php foreach($this->calle as $calles){   ?>
                                        <option  value="<?php echo $calles["id_calle"];?>" >
                                            <?php echo $calles["nombre_calle"];?>
                                        </option>
                                    <?php  }   ?>
                                    </select>
                                </div>
                            </div>

                           
                            <div class="col-md-6 mt-2">
                                <label for="direccion_negocio2">
                                    Direccion de Negocio
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="direccion_negocio2" name="datos[direccion_negocio]"
                                        placeholder="Direccion de Negocio" type="text" />
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="nombre_negocio2">
                                    Nombre de Negocio
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="nombre_negocio2" name="datos[nombre_negocio]"
                                        placeholder="Nombre de Negocio" type="text" />
                                </div>
                            </div>
                            
                            <div class="col-md-6 mt-2">
                                <label for="cedula_propietario2">
                                    Cedula de Propietario
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="cedula_propietario2" name="datos[cedula_propietario]"
                                        placeholder="Cedula de Propietario" type="text" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="rif_negocio2">
                                    Rif del Negocio
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10" id="rif_negocio2" name="datos[rif_negocio]"
                                        placeholder="Rif del Negocio" type="text" />
                                </div>
                            </div>
                
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
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