<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Usuarios</h1>
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
            <form action="<?php echo constant('URL'); ?>Usuario/Nuevo_Usuario" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">

                        <div class="row text-center">
                            <div class="col-md-12 ">
                                <div id="preview">
                                    <img src="<?php echo constant('URL')?>config/img/users/user-3.png"
                                        class="img-circle" width="100" />
                                </div>
                            </div>
                        </div>
                        <!--  <div class="card-block">
                            <label for="foto">
                                Foto de Perfil
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto_perfil">
                                <label class="custom-file-label" for="foto">Subir Archivo</label>
                            </div>
                        </div> -->
                        <div class="form-group row justify-content-center">

                            <!-- <div class="col-md-1 mt-2">
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
                            </div> -->

                            <div class="col-md-12 mt-2">
                                <label for="cedula">
                                    Cedula
                                </label>
                                <div class="input-group">
                                    <input maxlength="9" class="form-control validar input-numero" id="cedula" name="datos[cedula]"
                                        placeholder="Cedula de identidad" type="text" />
                                </div>
                                <div id="mensaje-cedula" style="color:red;"></div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="nombre">
                                    Nombre
                                </label>
                                <div class="input-group">
                                    <input class="form-control validar mb-10 solo-letras" id="nombre" name="datos[nombre]"
                                        placeholder="Primer Nombre" type="text" />
                                </div>
                                <div id="mensaje-nombre" style="color:red;"></div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="apellido">
                                    Apellido
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10 solo-letras" id="apellido" name="datos[apellido]"
                                        placeholder="Primer Apellido" type="text" />
                                </div>
                                <div id="mensaje-apellido" style="color:red;"></div>
                            </div>

                            <div class="col-md-6 mt-2">
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
                                    <div id="mensaje-correo" style="color:red;"></div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="telefono">
                                    Telefono
                                </label>
                                <div class="input-group">
                                    <input class="form-control" id="telefono" name="datos[telefono]" type="text" placeholder="Número de teléfono">
                                </div>
                                <div id="mensaje-telefono" style="color:red;"></div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="contrasenia">
                                    Contraseña
                                </label>
                                <div class="input-group mb-3">
                        <input type="password" class="form-control contraseña" placeholder="Contraseña" id="contrasenia"
                            name="datos[contrasenia]">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a href="javascript:void(0);" type="button" class="btn"
                                    style="margin: 0px;padding: 0px;" id="mostrar">
                                    <span id="spanIcon" class="fas fa-eye"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                                <div id="mensaje-contrasenia" style="color:red;"></div>
                                <div class="mt-2">
                                    <label for="confirmar">
                                        Confirmar
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="confirmar" name="datos[confirmar]"
                                            placeholder="Confirmar " type="text">
                                        </input>
                                    </div>
                                    <div id="mensaje-confirmar" style="color:red;"></div>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div id="pswd_info">
                                    <h4>La contraseña debería cumplir con los siguientes requerimientos:</h4>
                                    <ul>
                                       
                                        <li id="letra">
                                            Al menos debería tener <strong>una letra</strong>
                                        </li>
                                         <li id="mayuscula">
                                            Al menos debería tener <strong>una letra en mayúsculas</strong>
                                        </li>
                                        <li id="numero">
                                            Al menos debería tener <strong>un número</strong>
                                        </li>
                                        <li id="simbolo">
                                            Al menos debería tener <strong>un carácter especial</strong>
                                        </li>
                                        <li id="comparar">
                                            Las contraseñas deben ser <strong>iguales</strong>
                                        </li>
                                        <li id="length">
                                            Debería tener <strong>8 carácteres</strong> como mínimo
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            <div class="col-md-12 ">
                                <label class="text-themecolor" for="rol">
                                    Rol de Usuario
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="rol" name="datos[rol_inicio]"
                                        style="width: 100%;">
                                        <option value="0">
                                            Seleccione...
                                        </option>

                                        <option value="Super Usuario">
                                            Super Usuario
                                        </option>
                                        <option value="Administrador">
                                            Administrador
                                        </option>

                                    </select>
                                </div>
                                <div id="mensaje-rol" style="color:red;"></div>
                            </div>

                            <div class="col-md-12 mt-2 ">
                                <label for="preguntasSeguridad">
                                    Preguntas de seguridad
                                </label>
                                <table style='width:100%'>
                                    <tr>
                                        <td> <input name='animal' id='animal' placeholder="Escriba su animal favorito"
                                                class='form-control solo-letras'>
                                        </td>
                                        <td> <input class="form-control solo-letras" id="mascota" name="mascota"
                                                placeholder="Nombre de la primera mascota " type="text">
                                            </input></td>
                                        <td> <input name='color' id='color' placeholder="Escriba su color favorito"
                                                class='form-control solo-letras'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;color:red;font-weight: bold" id="mensaje-seguridad" colspan="3"></td>
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
                            <input type="button" class="btn  btn-success m-r-10" name="" id="enviar" value="Guardar">
                            <input type="button" class="btn btn-danger" id="enviar" name="" value="Limpiar">
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
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/validacion_usuarios.js"></script>
