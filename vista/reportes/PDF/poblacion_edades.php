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

<title>Poblacion de Edades</title>

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
                                <u>
                                    <h4>Listado des Edades</h4>
                                </u>
                            </center>
                        </td>
                        <td style="width: 10%;"></td>
                    </tr>
                    
                    
                     <?php foreach ($this->poblacion_edades as $value): ?>
                         <?php if ($value["edad"] <= 12): ?>
                            <tr>
                        <td style="width: 10%;"></td>
                        <td style="width: 80%;">
                            <br>
                            <div style='width:100%;text-align:justify'>
                                <table class="datos">
                                    <tr>
                                        <td colspan="6">
                                            <center>
                                                Edad de 12 a 17
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Cedula
                                        </td>
                                        <td>
                                            Nombres
                                        </td>
                                        <td>
                                            Apellidos
                                        </td>

                                        <td>
                                            Edad
                                        </td>
                                        <td>
                                            Sexo
                                        </td>
                                        <td>
                                            Calle
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
                                        <tr>
                                            <td>
                                                Total:
                                            </td>
                                            <td colspan="5">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td style="width: 10%;"></td>
                    </tr>

                         <?php endif ?>

                         <?php if ($value["edad"] > 12 && $value["edad"] <= 17): ?>
                            <tr>
                        <td style="width: 10%;"></td>
                        <td style="width: 80%;">
                            <br>
                            <div style='width:100%;text-align:justify'>
                                <table class="datos">
                                    <tr>
                                        <td colspan="6">
                                            <center>
                                                Mayores de 18
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Cedula
                                        </td>
                                        <td>
                                            Nombres
                                        </td>
                                        <td>
                                            Apellidos
                                        </td>

                                        <td>
                                            Edad
                                        </td>
                                        <td>
                                            Sexo
                                        </td>
                                        <td>
                                            Calle
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
                                        <tr>
                                            <td>
                                                Total:
                                            </td>
                                            <td colspan="5">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td style="width: 10%;"></td>
                    </tr>
                         <?php endif ?>

                         <?php if ($value["edad"] >= 18 && $value["edad"] < 55): ?>
                             
                         <?php endif ?>

                          <?php if ($value["edad"] >= 55): ?>
                             
                         <?php endif ?>
                     <?php endforeach ?>
                    
                   
                   
                   

                    <tr>
                        <td style="width: 10%;"></td>
                        <td style="width: 80%;">
                            <br>
                            <div style='width:100%;text-align:justify'>
                                <table class="datos">
                                    <tr>
                                        <td colspan="6">
                                            <center>
                                                Mayores de 55
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Cedula
                                        </td>
                                        <td>
                                            Nombres
                                        </td>
                                        <td>
                                            Apellidos
                                        </td>

                                        <td>
                                            Edad
                                        </td>
                                        <td>
                                            Sexo
                                        </td>
                                        <td>
                                            Calle
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
                                        <tr>
                                            <td>
                                                Total:
                                            </td>
                                            <td colspan="5">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td style="width: 10%;"></td>
                    </tr>
                    
                </table>

            </div>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
</div>