<style>
.datos {
    border-collapse: collapse !important;
    width: 100%;
}

.datos th,
.datos td {
    border: 1px solid black !important;
}
</style>

<title>Listado de Jefes de Familia</title>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script>
    /* window.blur();
             window.print();
             window.close(); */
    </script>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <!-- card-body -->
            <div class="card-body">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 10%;"></td>
                        <td style="width: 80%;">
                            <center>
                                <h5>
                                    REPUBLICA BOLIVARIANA DE VENEZUELA<br />
                                    CONSEJO COMUNAL<br />
                                    PRADOS DE OCCIDENTE SECTOR III<br />
                                    RIF. J-30725585 CODIGO 13-03-04-608-0002<br />
                                    Barquisimeto Municipio Iribarren<br />
                                    Parroquia Guerrera Ana Soto Estado Lara<br />
                                    <br />
                                </h5>
                            </center>
                            <table class="datos">
                                <tr>
                                    <td>Direccion</td>
                                    <td>Calle 15</td>
                                    <td> Fecha: <?php echo $GLOBALS["fecha_corta"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Consejo Comunal</td>
                                    <td colspan="2">Prados de Occidente Sector III</td>
                                </tr>   
                                <tr>
                                    <td>Jefe de Calle</td>
                                    <td>NOMBRE APELLID</td>
                                    <td>Cedula:</td>
                                    
                                </tr>
                            </table>
                            <br>
                        </td>
                        <td style="width: 10%;"></td>
                    </tr>

                    <tr>
                        <td style="width: 10%;"></td>
                        <td style="width: 80%;">
                            <div style='width:100%;text-align:justify'>
                                <table class="datos">
                                    <tr>
                                        <td colspan="6" ><center>Canditad Por Calle</center></td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            Jefe de Cas
                                        </td>
                                        <td>
                                            C.I
                                        </td>
                                        <td>
                                            N° de Personas
                                        </td>

                                        <td>
                                            N° de Casa
                                        </td>
                                        <td>
                                            Firma
                                        </td>
                                    </tr>
                                    <tbody id="datos">
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td style="width: 10%;"></td>
                    <tr>
                        <td style="width: 10%;"></td>
                        <td style="width: 80%;"></td>
                        <td style="width: 10%;"></td>
                    </tr>
                    </tr>
                </table>

            </div>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
</div>