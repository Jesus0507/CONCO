<?php include(call . "Inicio.php"); ?>


<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <input type="hidden" id="id_solicitud" value="<?php echo $_GET['id'] ?>">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0" id="title-solicitud">Consejo Comunal Prados de Occidente</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div id="app" style="padding-top: 8rem;display:none">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Nombre:
                    </label>
                    <input class="form-control" id='email_name' type="text" v-model="from_name">
                    </input>
                </div>
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Asunto:
                    </label>
                    <input class="form-control" type="text" v-model="subject" id='email_subject'>
                    </input>
                </div>
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Correo:
                    </label>
                    <input class="form-control" type="email" v-model="from_email" id='email_email'>
                    </input>
                </div>
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Mensaje:
                    </label>
                    <textarea class="form-control" v-model="message" id='email_message'>
                        </textarea>
                </div>
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <button @click="enviar" class="btn btn-success" id='btn_correo'>
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <center>
            <div style="width:95%;background: white;height: 100vh;border-radius: 30px;">
                <div style="width:90%;text-align: justify; ">

                    <br>
                    <div style="width:100%;background: #DEEEE2;padding-left: 6%;padding-right: 6%;border-radius: 30px">
                        <br>
                        <div style="width:100%;text-align: right;font-size:24px"><em class="fa fa-clock-o"></em> <span id="fecha_solicitud">Fecha</span></div>
                        <center>
                            <br>
                            <span style="font-size:80px" class="fa fa-user-o"></span>
                            <h4 id="persona">Pruieba</h4>
                        </center>
                        <br>
                        <center>
                        <table style='width:98%;'>
                         <tr>
                         <td class='text-center' style='width:35%'>
                             <span class='fa fa-road'></span>
                              Calle:<br>
                              <span id='calle'>Calle</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                             <span class='fa fa-location-arrow'></span>
                              Dirección de vivienda:<br>
                              <span id='direccion'>Direccion</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                             <span class='fa fa-map-signs'></span>
                              Número de vivienda:<br>
                              <span id='direccion'>Direccion</span>

                        </td>
                    </tr>
                    <tr>
                         <td class='text-center' style='width:35%'>
                         <br>    
                         <span class='fa fa-bed'></span>
                              Cantidad de habitaciones:<br>
                              <span id='habitaciones'>habitaciones</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                        <br>     
                        <span class='fa fa-home'></span>
                              Tipo de vivienda:<br>
                              <span id='tipo_vivienda'>tipo vivienda</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                        <br>     
                        <span class='fa fa-signal'></span>
                              Condición de vivienda:<br>
                              <span id='condicion'>condicion</span>

                        </td>
                    </tr>
                    <tr>
                         <td class='text-center' style='width:35%'>
                         <br>    
                         <span class='fa fa-users'></span>
                              Hacinamiento:<br>
                              <span id='hacinamiento'>hacinamiento</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                        <br>     
                        <span class='fa fa-tree'></span>
                              Espacio de siembra:<br>
                              <span id='espacio_siembra'>espacio_siembra</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                        <br>     
                        <span class='fa fa-bath'></span>
                              Baño sanitario:<br>
                              <span id='sanitario'>sanitario</span>

                        </td>
                    </tr>
                    <tr>
                         <td class='text-center' style='width:35%'>
                         <br>    
                         <span class='fa fa-shower'></span>
                              Agua de consumo:<br>
                              <span id='agua_consumo'>agua_consumo</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                        <br>     
                        <span class='fa fa-tint'></span>
                              Aguas negras:<br>
                              <span id='cableado_telefonico'>aguas negras</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                        <br>     
                        <span class='fa fa-trash'></span>
                              Residuos sólidos:<br>
                              <span id='residuos_solidos'>residuos_solidos</span>

                        </td>
                       </tr>
                       <tr>
                         <td class='text-center' style='width:35%'>
                         <br>    
                         <span class='fa fa-plug'></span>
                              Cableado eléctrico:<br>
                              <span id='cableado_electrico'>cableado_electrico</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                        <br>     
                        <span class='fa fa-phone'></span>
                              Cableado telefónico:<br>
                              <span id='cableado_telefonico'>cableado_telefonico</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                        <br>     
                        <span class='fa fa-wifi'></span>
                              Servicio de internet:<br>
                              <span id='internet'>internet</span>

                        </td>
                       </tr>
                       <tr>
                         <td class='text-center' style='width:35%'>
                         <br>    
                         <span class='fa fa-fire'></span>
                              Gas doméstico:<br>
                              <span id='gas'>gas</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                        <br>     
                        <span class='fa fa-paw'></span>
                              Animales domésticos:<br>
                              <span id='animales'>animales</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                        <br>     
                        <span class='fa fa-bug'></span>
                              Plagas:<br>
                              <span id='plagas'>plagas</span>

                        </td>
                       </tr>
                       <tr>
                         <td class='text-center' colspan='3'>
                         <br>    
                         <span class='fa fa-commenting-o'></span>
                              Descripción de la vivienda:<br>
                              <span id='descripcion'>descripcion</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                       </tr>
                       <tr>
                         <td class='text-center' style='width:35%'>
                         <br>    
                         <span class='fa fa-arrow-up'></span>
                              Tipo(s) de techo:<br>
                              <span id='tipo_techo'>tipo_techo</span>

                        </td>
                        <td class='text-center' style='width:30%'>
                        <br>     
                        <span class='fa fa-square'></span>
                              Tipo(s) de pared:<br>
                              <span id='tipo_pared'>tipo_pared</span>

                        </td>
                        <td class='text-center' style='width:35%'>
                        <br>     
                        <span class='fa fa-arrow-down'></span>
                              Tipo(s) de piso:<br>
                              <span id='tipo_piso'>tipo_piso</span>

                        </td>
                       </tr>
                        </table>
                        </center>
                            <br><br>
                            <center><button type="button" class="btn btn-primary" id="aprobar">Aprobar</button> <button type="button" class="btn btn-danger" id="rechazar">Rechazar</button></center>
                            <br><br>

                    </div>
                </div>
            </div>
        </center>
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include(call . "Fin.php"); ?>
<?php include(call . "style-agenda.php"); ?>
<script src="<?php echo constant('URL') ?>config/js/vue.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL') ?>config/js/email.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL') ?>config/js/news/solicitudes-consulta-vivienda.js"></script>