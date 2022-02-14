<?php include (call."Inicio.php"); ?>
    <!-- Contenido de la pagina -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Generar Constancias</h1> </div>
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
                    <h3 class="card-title">Lista de Constancias</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <form action="<?php echo constant('URL'); ?>Calles/Nueva_Calle" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 mt-2">
                                    <label for="tablas"> Seleccionar Censo</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="tablas" name="datos[tablas]">
                                            <option value='0'>-Seleccione-</option>
                                            <option value='Nucleo familiar'>Nucleo Familiar</option>
                                          
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                <label for="cedula_propietario">
                                    Familia
                                </label>
                                <div class="input-group">
                                    <input list="cedula" id="cedula_propietario" name="datos[cedula_propietario]"
                                        class="form-control " placeholder="Cedula" />
                                    <datalist id="cedula">
                                        <?php foreach($this->personas as $persona){   ?>
                                        <option value="<?php echo $persona["cedula_persona"];?>">
                                            <?php echo $persona["primer_nombre"]." ".$persona["primer_apellido"];?>
                                        </option>
                                    <?php  }   ?>
                                    </datalist>
                                    
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn  btn-success m-r-10" name="" id="imprimir" value="Imprimir">
                        </div>
                    </div>
                </div>
                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
        
        
        <section class="content">
    <!-- Default box -->
    <div class="card">
        <!-- card-body -->
        <div class="card-body">
   <center>      
   <div id='censo_nucleo_familiar' style='width:90%; display:none'>
       <table style='width:100%;color:red !important;font-size:13px'>
        <tr>
            <td style='text-align:left'><img style='width:200px' src="<?php echo constant('URL');?>config/img/web/cintillo_vzla.png"></td>
            <td>Vicepresidencia para el <b>Area Social, Sistema Nacional de Misiones y Grandes Misiones</b></td>
            <td>Campaña Nacional Erradicación de la Pobreza Estado Lara</td>
        </tr>
       </table>
       <div style='width:100%;background: red;color:white'><center><b>INSTRUMENTO DE DIAGNOSTICO DE MISIONES<br>I-.Ubicación geográfica</b></center></div>
       <table style='width:100%;color:red !important;font-size:13px'>
           <tr><td>Nº Codificación:_____________</td><td>Vivienda Nº:_____________</td><td>Hogar Nº:_____________</td><td>Fecha:_____________</td></tr>
           <tr>
            <td colspan='2'><br>Estado: <b>LARA</b> </td><td colspan='2'><br>Parroquia: <b>Guerrera Ana Soto</b></td></tr>
            <tr>
                <td colspan='2'><br>Sector o Barrio: <b>III</b></td><td><br>Calle: <b><span id='calle_censo'></span></b></td><td><br>Nombre o Nº Casa: <b><span id='nro_casa_censo'></span></td>
            </tr>
            <tr>
                <td colspan='2'><br>Consejo Comunal: <b>Prados de Occidente Sector III</b></td><td><br>Comuna:___________</td>
            </tr>
            <tr>
                <td><br>
                    Tipo de población
                </td>
                <td><br>Urbana</td>
                <td><br>Rural</td>
            </tr>
       </table>
       <div style='width:100%;background: red;color:white'><center><b>II. Condiciones de la vivienda</b></center></div>
        <table style='width:100%;color:red !important;font-size:13px'>
            <tr>
                <td >
                    1- Tipo de vivienda<br>
                    <table>
                        <tr><td>Casa de vecindad</td><td><span id='casa_vecindad'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td></td><td>Rancho</td><td><span id='rancho'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr>
                        <tr><td>Casa</td><td><span id='casa'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td></td><td>Refugio</td><td><span id='refugio'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr>
                        <tr><td>Otra</td><td><span id='casa_vecindad'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td></td><td>Especifique</td><td><span id='especifico_tipo_casa'>______________</span></td></tr>
                    </table>
                </td>

                 <td >
                    2-.Condiciones de la vivienda<br>
                    <table>
                        <tr><td>Buena</td><td><span id='buena'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr><tr><td>Mala</td><td><span id='Mala'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr>
                        <tr><td>Regular</td><td><span id='regular'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr>
                    </table>
                </td><td >
                    3- Condición de ocupación<br>
                    <table>
                        <tr>
                            <td>Propia pagada</td>
                            <td><span id='propia_pagada'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td></td><td>Alquilada</td><td><span id='alquilada'><div style='border-style:solid;height: 20px;width:20px'></div></span></td>
                        <td>Prestada</td><td><span id='prestada'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr><tr><td></td><td>Propia pagándose</td><td><span id='propia_pagandose'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td>Adjudicada</td><td><span id='adjudicada'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td>Invadida</td><td><span id='invadida'><div style='border-style:solid;height: 20px;width:20px'></div></span></td></tr>
                        <tr><td>Otro</td><td><span id='otro_cond_ocupacion'><div style='border-style:solid;height: 20px;width:20px'></div></span></td><td></td><td>Especifique</td><td><span id='especifico_cond_ocupacion'>______________</span></td></tr>
                    </table>
                </td>
            </tr>
        </table>
   </div>
</center>



        </div>
    </div>
        <!-- /.card-body -->
    </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include (call."Fin.php"); ?>
<script type="text/javascript">
    document.getElementById('imprimir').onclick=function(){
        var myWindow=window.open("","","");
        myWindow.open();
        myWindow.document.write(document.getElementById("censo_nucleo_familiar").innerHTML);
        myWindow.print();
        myWindow.close();
    }
</script>
