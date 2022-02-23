<div class="modal fade" id="registrar-persona">
    <div class="modal-dialog modal-xl" style="max-width: 150vh;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar persona</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style='width:100%'>
                    <tr>
                        <td style='width:20%'>
                            <table style='width:100%;margin-top:0;'>
                                <tr>
                                    <td class='btn btn-primary' style='width:100%'>Información Personal</td>
                                </tr>
                                <tr>
                                    <td class='btn btn-default' style='width:100%'>Carnets</td>
                                </tr>
                                <tr>
                                    <td class='btn btn-default' style='width:100%'>Información de contacto</td>
                                </tr>
                                <tr>
                                    <td class='btn btn-default' style='width:100%'>Información Política</td>
                                </tr>
                                <tr>
                                    <td class='btn btn-default' style='width:100%'>Información Laboral</td>
                                </tr>
                                <tr>
                                    <td class='btn btn-default' style='width:100%'>Información de usuario</td>
                                </tr>
                            </table>
                        </td>
                        <td style='width:5%'></td>
                        <td style='width:75%' rowspan='6'>
                            <div id='panel-1' style='height:400px;overflow-y:scroll;display:none'>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2>
                                            Información de Personal
                                        </h2>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label for="cedula">
                                            Documento de identidad </label> <span style='color:red;display:none' id='valid_1'>Ingrese el documento de identidad</span>

                                        <div class="input-group">
                                            <input class="form-control input-numero" id="cedula" name="datos[cedula]" placeholder="Cedula de identidad" type="number" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <label for="primer_nombre">
                                            Primer Nombre
                                        </label>
                                        <span style='display:none;color:red' id='valid_2'>Ingrese el primer nombre</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="primer_nombre" name="datos[primer_nombre]" placeholder="Primer Nombre" type="text" />
                                        </div>

                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <label for="segundo_nombre">
                                            Segundo Nombre
                                        </label>
                                        <span style='display:none;color:red' id='valid_3'>Ingrese el segundo nombre</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="segundo_nombre" name="datos[segundo_nombre]" placeholder="Segundo Nombre" type="text" />
                                        </div>

                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="primer_apellido">
                                            Primer Apellido
                                        </label>
                                        <span style='display:none;color:red' id='valid_4'>Ingrese el primer apellido</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="primer_apellido" name="datos[primer_apellido]" placeholder="Primer Apellido" type="text" />
                                        </div>

                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="segundo_apellido">
                                            Segundo Apellido
                                        </label>
                                        <span style='display:none;color:red' id='valid_5'>Ingrese el segundo apellido</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="segundo_apellido" name="datos[segundo_apellido]" placeholder="Segundo Apellido" type="text" />
                                        </div>

                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">
                                                Fecha De Nacimiento
                                            </label> <span style='display:none;color:red' id='valid_6'>Ingrese la fecha de nacimiento</span>
                                            <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" type="date">
                                            </input>
                                        </div>

                                    </div>



                                    <div class="col-md-6 mt-2">
                                        <label for="estado_civil">
                                            Estado Civil
                                        </label>
                                        <span style='display:none;color:red' id='valid_7'>Ingrese el estado civil </span>
                                        <div class="input-group">
                                            <select class="custom-select" id="estado_civil" name="datos[estado_civil]">
                                                <option selected="" value="vacio">
                                                    -Seleccione-
                                                </option>
                                                <option value="Casado(a)">
                                                    Casado(a)
                                                </option>
                                                <option value="Soltero(a)">
                                                    Soltero(a)
                                                </option>
                                                <option value="Viudo(a)">
                                                    Viudo(a)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="genero">
                                            Genero
                                        </label>
                                        <span style='display:none;color:red' id='valid_8'>Ingrese el género</span>
                                        <div class="input-group">
                                            <select class="custom-select" id="genero" name="datos[genero]">
                                                <option selected="" value="vacio">
                                                    -Seleccione-
                                                </option>
                                                <option value="M">
                                                    Masculino
                                                </option>
                                                <option value="F">
                                                    Femenino
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="sexualidad">
                                            Orientación sexual
                                        </label>
                                        <span style='display:none;color:red' id='valid_9'>Ingresela orientación sexual</span>
                                        <div class="input-group">
                                            <select class="custom-select" id="sexualidad" name="datos[sexualidad]">
                                                <option selected="" value="vacio">
                                                    -Seleccione-
                                                </option>
                                                <option value="Heterosexual">
                                                    Heterosexual
                                                </option>
                                                <option value="Homosexual">
                                                    Homosexual
                                                </option>
                                                <option value="Bisexual">
                                                    Bisexual
                                                </option>
                                                <option value="Otro">
                                                    Otro
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-2">
                                        <label for="nacionalidad">
                                            Nacionalidad
                                        </label>
                                        <span style='display:none;color:red' id='valid_10'>Ingrese la nacionalidad</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="nacionalidad" name="datos[nacionalidad]" placeholder="Nacionalidad" type="text" />
                                        </div>

                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="nivel_educativo">
                                            Nivel Educativo
                                        </label>
                                        <span style='display:none;color:red' id='valid_11'>Ingrese el nivel educativo</span>
                                        <div class="input-group">
                                            <select class='form-control' name="datos[nivel_educativo]" id='nivel_educativo'>
                                                <option value='vacio'>-Seleccione-</option>
                                                <option value='Preescolar'>Preescolar</option>
                                                <option value='Básico'>Básico</option>
                                                <option value='Medio diversificado'>Medio diversificado</option>
                                                <option value='Superior'>Superior</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="afrodescendencia">
                                            Afrodescendencia
                                        </label>
                                        <span style='display:none;color:red' id='valid_12'>Indique si es afrodescendente</span>
                                        <select class="custom-select" id="afrodescendencia" name="afrodescendencia">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="tiempo_comunidad">
                                            Tiempo en la comunidad
                                        </label>
                                        <span style='display:none;color:red' id='valid_13'>Campo vacío</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="tiempo_comunidad" name="datos[tiempo_comunidad]" type="date" />
                                            <button type="button" class="btn btn-default" id='desde_siempre'>Desde siempre</button>
                                        </div>

                                    </div>



                                    <div class="col-md-4 mt-2">
                                        <label for="jefe_familia">
                                            Jefe de familia
                                        </label>
                                        <span style='display:none;color:red' id='valid_14'>Vacío</span>
                                        <select class="custom-select" id="jefe_familia" name="jefe_familia">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="propietario_vivienda">
                                            Propietario de vivienda
                                        </label>
                                        <span style='display:none;color:red' id='valid_15'>Vacío</span>
                                        <select class="custom-select" id="propietario_vivienda" name="propietario_vivienda">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="jefe_calle">
                                            Jefe de calle
                                        </label>
                                        <span style='display:none;color:red' id='valid_16'>Vacío</span>
                                        <select class="custom-select" id="jefe_calle" name="jefe_calle">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>

                                        </select>
                                    </div>



                                    <div class="col-md-6 mt-2">
                                        <label for="miliciano">
                                            Miliciano
                                        </label>
                                        <span style='display:none;color:red' id='valid_17'>Indique si es miliciano</span>
                                        <select class="custom-select" id="miliciano" name="miliciano">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="transporte">
                                            Transporte
                                        </label>
                                        <span style='display:none;color:red' id='valid_18'>Indique el tipo de transporte</span>
                                        <table style="width:100%">
                                            <tr>
                                                <td>
                                                    <select class="custom-select" id="transporte" name="transporte">
                                                        <option selected="" value="vacio">
                                                            -Seleccione-
                                                        </option>
                                                        <option value="0">
                                                            Público
                                                        </option>
                                                        <option value="privado">
                                                            Privado
                                                        </option>

                                                    </select>
                                                </td>
                                                <td style='display:none' id='tipo_transporte_view'>

                                                    <input type="text" id='tipo_transporte' name="tipo_transporte" placeholder="Indique el tipo de transporte" class="form-control" list='transportes_regitrados'>

                                                    <datalist id='transportes_regitrados'>
                                                        <?php foreach ($this->transportes as $tr) { ?>
                                                            <option value="<?php echo $tr['descripcion_transporte']; ?>"></option>
                                                        <?php } ?>
                                                    </datalist>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="col-md-6 mt-2">
                                        <label for="comunidad_indigena">
                                            Comunidad indigena
                                        </label>
                                        <span style='display:none;color:red' id='valid_19'>Campo vacío</span>
                                        <table style="width:100%">
                                            <tr>
                                                <td>
                                                    <select class="custom-select" id="comunidad_indigena" name="comunidad_indigena">
                                                        <option selected="" value="vacio">
                                                            -Seleccione-
                                                        </option>
                                                        <option value="si">
                                                            Si
                                                        </option>
                                                        <option value="0">
                                                            No
                                                        </option>

                                                    </select>
                                                </td>
                                                <td style='display:none' id='comunidad_indigena_view'>

                                                    <input type="text" id='nombre_comunidad' name="nombre_comunidad" placeholder="Nombre de la comunidad indigena" class="form-control" list='comunidades_indigenas'>

                                                    <datalist id='comunidades_indigenas'>
                                                        <?php foreach ($this->comunidades as $cm) { ?>
                                                            <option value="<?php echo $cm['nombre_comunidad']; ?>"></option>
                                                        <?php } ?>
                                                    </datalist>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="privado_libertad">
                                            Privado de libertad
                                        </label>
                                        <span style='display:none;color:red' id='valid_20'>Campo vacío</span>
                                        <select class="custom-select" id="privado_libertad" name="privado_libertad">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>

                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div id='panel-2' style='height:400px;overflow-y:scroll;'>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2>
                                            Documentos
                                        </h2>
                                    </div>



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
                                        <span style='color:red' id='valid_serial_patria'></span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="serial_patria" name="datos[serial_patria]" placeholder="Serial" type="text" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="serial_psuv">
                                            Serial PSUV
                                        </label>
                                        <span style='color:red' id='valid_serial_psuv'></span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="serial_psuv" name="datos[serial_psuv]" placeholder="Serial" type="text" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="codigo_patria">
                                            Codigo Patria
                                        </label>
                                        <span style='color:red' id='valid_codigo_patria'></span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="codigo_patria" name="datos[codigo_patria]" placeholder="Codigo" type="text" />
                                        </div>

                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="codigo_psuv">
                                            Codigo PSUV
                                        </label>
                                        <span style='color:red' id='valid_codigo_psuv'></span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="codigo_psuv" name="datos[codigo_psuv]" placeholder="Codigo" type="text" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-2">
                                        <label for="certificado">
                                            Certificado de discapacidad
                                        </label>
                                        <br>
                                        <label for="serial_discapacidad">
                                            Serial discapacidad
                                        </label>
                                        <span style='color:red' id='valid_serial_discapacidad'></span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="serial_discapacidad" name="datos[serial_discapacidad]" placeholder="Serial" type="text" />
                                        </div>
                                        <label for="codigo_discapacidad">
                                            Código discapacidad
                                        </label>
                                        <span style='color:red' id='valid_codigo_discapacidad'></span>
                                        <div class="input-group">
                                            <input class="form-control mb-10" id="codigo_discapacidad" name="datos[codigo_discapacidad]" placeholder="Codigo" type="text" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id='panel-3'></div>
                            <div id='panel-4'></div>
                            <div id='panel-5'></div>
                            <div id='panel-6'></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->