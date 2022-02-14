<style>
  .datos {
    border-collapse: collapse !important;
    width: 100%;
  }

  .datos th,
  .datos td {
    border: 1px solid red !important;
  }
</style>
<title>Censo Poblacional</title>
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
        <center>
          <div id='censo_nucleo_familiar' style='width:90%; '>
            <table style='width:100%;color:red !important;font-size:13px'>
              <tr>
                <td style='text-align:left'>
                  <img style='width:200px' src="
                                        <?php echo constant('URL');?>config/img/web/cintillo_vzla.png">
                </td>
                <td>Vicepresidencia para el <b>Area Social, Sistema Nacional de Misiones y Grandes Misiones</b>
                </td>
                <td>Campaña Nacional Erradicación de la Pobreza Estado Lara</td>
              </tr>
            </table>
            <div style='width:100%;background: red;color:white'>
              <center>
                <b>INSTRUMENTO DE DIAGNOSTICO DE MISIONES <br>I-.Ubicación geográfica </b>
              </center>
            </div>
            <table style='width:100%;color:red !important;font-size:13px'>
              <tr>
                <td>Nº Codificación:_____________</td>
                <td>Vivienda Nº:_____________</td>
                <td>Hogar Nº:_____________</td>
                <td>Fecha:_____________</td>
              </tr>
              <tr>
                <td colspan='2'>
                  <br>Estado: <b>LARA</b>
                </td>
                <td colspan='2'>
                  <br>Parroquia: <b>Guerrera Ana Soto</b>
                </td>
              </tr>
              <tr>
                <td colspan='2'>
                  <br>Sector o Barrio: <b>III</b>
                </td>
                <td>
                  <br>Calle: <b>
                    <span id='calle_censo'></span>
                  </b>
                </td>
                <td>
                  <br>Nombre o Nº Casa: <b>
                    <span id='nro_casa_censo'></span>
                </td>
              </tr>
              <tr>
                <td colspan='2'>
                  <br>Consejo Comunal: <b>Prados de Occidente Sector III</b>
                </td>
                <td>
                  <br>Comuna:___________
                </td>
              </tr>
              <tr>
                <td>
                  <br> Tipo de población
                </td>
                <td>
                  <br>Urbana
                </td>
                <td>
                  <br>Rural
                </td>
              </tr>
            </table>
            <div style='width:100%;background: red;color:white'>
              <center>
                <b>II. Condiciones de la vivienda</b>
              </center>
            </div>
            <table style='width:100%;color:red !important;font-size:13px'>
              <tr>
                <td> 1- Tipo de vivienda <br>
                  <table>
                    <tr>
                      <td>Casa de vecindad</td>
                      <td>
                        <span id='casa_vecindad'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                      <td></td>
                      <td>Rancho</td>
                      <td>
                        <span id='rancho'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>Casa</td>
                      <td>
                        <span id='casa'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                      <td></td>
                      <td>Refugio</td>
                      <td>
                        <span id='refugio'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>Otra</td>
                      <td>
                        <span id='casa_vecindad'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                      <td></td>
                      <td>Especifique</td>
                      <td>
                        <span id='especifico_tipo_casa'>______________</span>
                      </td>
                    </tr>
                  </table>
                </td>
                <td> 2-.Condiciones de la vivienda <br>
                  <table>
                    <tr>
                      <td>Buena</td>
                      <td>
                        <span id='buena'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>Mala</td>
                      <td>
                        <span id='Mala'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>Regular</td>
                      <td>
                        <span id='regular'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3- Condición de ocupación <br>
                  <table>
                    <tr>
                      <td style="width: 20px;">Propia pagada</td>
                      <td>
                        <span id='propia_pagada'>
                          <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 32px;'></div>
                        </span>
                      </td>
                      <td></td>
                      <td>Alquilada</td>
                      <td>
                        <span id='alquilada'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                      <td>Prestada</td>
                      <td>
                        <span id='prestada'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="position: relative;left: -50px;">Propia pagándose</td>
                      <td>
                        <span id='propia_pagandose'>
                          <div style='position: relative;left: -50px;border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                      <td>Adjudicada</td>
                      <td>
                        <span id='adjudicada'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                      <td>Invadida</td>
                      <td>
                        <span id='invadida'>
                          <div style='border-style:solid;height: 20px;width:20px'></div>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>Otro</td>
                      <td>
                        <span id='otro_cond_ocupacion'>
                          <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 32px;'></div>
                        </span>
                      </td>
                      <td></td>
                      <td>Especifique</td>
                      <td>
                        <span id='especifico_cond_ocupacion'>______________</span>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="position: relative;left: 300px;">4. Materiales Predominantes de la Vivienda </td>
                <table>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 100px;"> 4.1 Techo </td>
                    <td style="position: relative;left: 200px"> 4.2 Paredes </td>
                    <td style="position: relative;left: 450px;"> 4.3 Piso </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 20px;"> Platabanda </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -110px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -180px;"> Laminas Asfalticas </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -160px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"> Bloque Ladrillo o Adobe Frizado </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -70px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: 0px;"> Cemento </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 10px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 20px;"> Tela </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -110px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -180px;"> Asbesto y Similares </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -160px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"> Bloque Ladrillo o Adobe sin Frisar </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -70px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: 0px;"> Tierra </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 10px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left:20px;"> Laminas Metalicas (zinc, aluminio ,similares) </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 58px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: 160px;"> Concreto </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 128px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"></td>
                    <td></td>
                    <td style="position: relative;left: 0px;"> Tierra </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 10px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left:20px;"> Laminas Policluro de Vinilo (pcv) </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 58px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: 60px;"> Laminas Policluro de Vinilo (pcv) </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 128px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"></td>
                    <td></td>
                    <td style="position: relative;left: 0px;"> Ceramica o Similares </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 10px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left:20px;"> Otras Laton o Similares </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 58px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: 60px;"> Tapia o Bahareque </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 128px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"></td>
                    <td></td>
                    <td style="position: relative;left: 0px;"> Otros </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 10px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left:20px;"></td>
                    <td></td>
                    <td>
                    <td style="position: relative;left: 60px;"> Troncos o Piedras </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 128px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"></td>
                    <td></td>
                    <td style="position: relative;left: 0px;"></td>
                    <td></td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left:20px;"></td>
                    <td></td>
                    <td>
                    <td style="position: relative;left: 60px;"> Otras (zinc,carton,tablas) </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: 128px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -100px;"></td>
                    <td></td>
                    <td style="position: relative;left: 0px;"></td>
                    <td></td>
                  </tr>
                </table>
              </tr>
              <tr>
                <div style="position: relative;left: 50px;">
                  <td style="">
                    <p style="position: relative;color:red;font-size: 15px;">5.Servicios con los que cuenta la vivienda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6. Presencia de Vectores &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7. Indicar Cantidad de Habitaciones </p>
                  </td>
                  <td>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: -40px;"> Agua Consumo </td>
                        <td style="position: relative;left: 10px;"> Residuos Solidos </td>
                        <td style="position: relative;left: 50px;"> Aguas Servidas </td>
                        <td style="position: relative;left: 100px;"> Animales Domesticos </td>
                        <td style="position: relative;left: 120px;"> Insectos y <br> Roedores </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: -60px;"> Acueducto </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -80px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -220px;"> Aseo Urbano </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -260px;"> Cloacas </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -250px;"> Pozo Septico </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -250px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -230px;"> Si </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -230px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -180px;"> Si </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -170px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -80px;">
                          <h3>4</h3>
                        </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: -60px;"> Cisterna </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -80px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -220px;"> Quema </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -260px;"> Letrina </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -250px;"> Ninguno </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -250px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -230px;"> No </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -230px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -180px;"> No </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -170px'></div>
                          </span>
                        </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: -60px;"> Pipa Publica </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -80px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -220px;"> Aire Libre </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -260px;"> Alcantarillas </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                          </span>
                        </td>
                      </tr>
                    </table>
                  </td>
                </div>
              </tr>
              <tr>
                <div style="position: relative;left: 60px;">
                  <td style="">
                    <p style="position: relative;color:red;font-size: 15px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8. Gas Domestico &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                  </td>
                  <td>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: -40px;"> Tipo Bombona </td>
                        <td style="position: relative;left: 150px;"> Cuanto Tiempo le dura </td>
                        <td style="position: relative;left: 300px;"> Tipo de Servicio </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: -80px;"> 10kg </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -130px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -290px;"> 18kg </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -290px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -270px;"> 43kg </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -270px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -220px;"> 7d </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -220px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;"> 15d </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -180px;"> 30d </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -180px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -160px;"> PDV Comunal </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -160px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -150px;"> Otro </td>
                        <td>
                          <span id='laminas'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -150px'></div>
                          </span>
                        </td>
                      </tr>
                    </table>
                  </td>
                </div>
              </tr>
              <tr>
                <div style="position: relative;left: 60px;">
                  <td style="">
                    <p style="position: relative;left: -200px; color:red;font-size: 15px;"> 9.Medios de Transporte que utiliza &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="publico">Publico</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="privado">Privado</span>
                    </p>
                  </td>
                  <td>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: -380px;"> Tipo de Transporte: <span id="transporte"></span>
                        </td>
                      </tr>
                    </table>
                  </td>
                </div>
              </tr>
              <tr>
                <br>
                <br>
                <div style='width:100%;background: red;color:white'>
                  <center> III. Jefe (a) del Hogar </center>
                </div>
                <div style="position: relative;left: 60px;">
                  <td>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: -30px;"> Nombre y Apellido </td>
                        <td style="position: relative; left: -50px;"> Cedula </td>
                        <td style="position: relative; left: -130px;"> Sexo </td>
                        <td style="position: relative; left: -200px;"> Edad </td>
                        <td style="position: relative; left: -160px;"> Fecha de Nacimiento </td>
                        <td style="position: relative; left: -160px;"> Estado Civil </td>
                        <td style="position: relative; left: -130px;"> Nivel Educativo </td>
                        <td style="position: relative; left: -120px;"> Ocupacion u Oficio </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: -180px;">
                          <span id="nombre"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: -120px;">
                          <span id="cedula"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: -80px;">
                          <span id="sexo"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: -60px;">
                          <span id="edad"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: -30px;">
                          <span id="fecha"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: 0px;">
                          <span id="estado"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: 30px;">
                          <span id="nivel"></span>
                          <br>
                        </td>
                        <td style="position: relative; left: 50px;">
                          <span id="ocupación"></span>
                          <br>
                        </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <br>
                        <td style="position: relative; left: -40px;"> ¿Cual es la condicion laboral del jefe del hogar? </td>
                        <td style="position: relative; left: 80px;"> si trabaja a que sector empleador pertenece: </td>
                        <td style="position: relative; left: 200px;"> si pertenece al sector formal señale: </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 0px;">
                          <span id="condicion">hola</span>
                        </td>
                        <td style="position: relative;left: 30px;"> Formal </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -60px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -150px;"> Publico </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -150px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -220px;"> Informal </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -230px'></div>
                          </span>
                        </td>
                        <td>
                        <td style="position: relative;left: -200px;"> Publico </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -190px'></div>
                          </span>
                        </td>
                        <td>
                      </tr>
                    </table>
                  </td>
                </div>
              </tr>
              <tr>
                <br>
                <div style='width:100%;background: red;color:white'>
                  <center> IV. Caracterizacion del Nucleo Familiar </center>
                </div>
              </tr>
              <tr>
                <table>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 10px;"> 1. Seleccione el tipo de Familia </td>
                    <td style="position: relative;left: 20px;"> 2.¿La Familia es Afrodescendiente? </td>
                    <td style="position: relative;left: 20px;"> 3.¿Pertenece a alguna comunidad indigena? </td>
                    <td style="position: relative;left: 80px;"> 4.¿Tiene algun familiar de sexo diverso? </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 30px;"> Nuclear </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -40px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -280px;"> Si </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -380px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -280px;"> Si </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -270px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -150px;"> Si </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -140px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 30px;"> Extensa </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -40px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -280px;"> No </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -380px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -280px;"> No </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -270px'></div>
                      </span>
                    </td>
                    <td style="position: relative;left: -150px;"> No </td>
                    <td>
                      <span id='laminas'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -140px'></div>
                      </span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 30px;"> Ampliada </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -40px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -120px"> Indique Cual: <span id="comunidad"></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <br>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 10px;"> 5. ¿Alguna persona del grupo familiar se encuentra privada de libertad? </td>
                    <td style="position: relative;left: 200px;"> 6.¿Existen integrantes del hogar que no pecnotan en el mismo? </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 30px;"> Si </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -130px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -400px;"> Parentesco: </td>
                    <td style="position: relative;left: -250px;"> Si </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -260px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -280px;"> Quien: </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative;left: 30px;"> No </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -130px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -130px;"> No </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -230px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -230px;"> Periodicidad: </td>
                  </tr>
                </table>
              </tr>
              <tr>
                <br>
                <div style='width:100%;background: red;color:white'>
                  <center> V. Productividad </center>
                </div>
              </tr>
              <tr>
                <table>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;"> N° Personas que Trabajan </td>
                    <td style="position: relative; left: 0px;"> Ingreso Mensual Familiar </td>
                    <td style="position: relative; left: 0px;"> Alguno(a) ha participado en proyecto sociotecnologico </td>
                    <td style="position: relative; left: 0px;"> Estado Actual del Proyecto </td>
                    <td style="position: relative; left: 0px;"> Area del Proyecto </td>
                    <td style="position: relative; left: 0px;"> Tiene pensado una idea socioproductiva </td>
                    <td style="position: relative; left: 0px;"> Area del Proyecto </td>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                    <td style="position: relative; left: 0px;">
                      <span id=""></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;"> Areas del Proyecto </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 20px;"> 1.Construccion y Mantenimiento </td>
                    <td style="position: relative; left: 40px;"> 3. Alimentacion </td>
                    <td style="position: relative; left: 60px;"> 5. Textil o Artesanal </td>
                    <td style="position: relative; left: 80px;"> 7. Cultural </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 20px;"> 2.Transporte </td>
                    <td style="position: relative; left: 40px;"> 4. Comunicacion </td>
                    <td style="position: relative; left: 60px;"> 6. Agricola </td>
                    <td style="position: relative; left: 80px;"> 8.Educativo </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="4">
                      <br>
                      <b>En este Hogar</b>¿Cuantas Personas entre 15 y 65 se Encuentran desemplados que puedan trabajar?
                    </td>
                  </tr>
                  <tr>
                    <td style="position: relative; left: 0px;">
                      <span id="cantidad"></span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="4">
                      <b>¿Cuantos niños y niñas y Adolescentes menores de 17 años trabajan?</b>
                    </td>
                  </tr>
                  <tr>
                    <td style="position: relative; left: 0px;">
                      <span id="cantidad"></span>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="4"> Indique cual o cuales son las habilidades u oficios que destacan dentro de su grupo familiar </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 20px;"> 1.Transporte </td>
                    <td style="position: relative; left: 40px;"> 3. Alimentacion </td>
                    <td style="position: relative; left: 60px;"> 5. Comunicacion </td>
                    <td style="position: relative; left: 80px;" colspan="2"> 7. Textil o Artesanal </td>
                    <td style="position: relative; left: 80px;" colspan="2"> 9. Construccion Y Mantenimiento </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 20px;"> 2.Cultural </td>
                    <td style="position: relative; left: 40px;"> 4. Turistico </td>
                    <td style="position: relative; left: 60px;"> 6. Educativo </td>
                    <td style="position: relative; left: 80px;"> 8.Agricola </td>
                    <td style="position: relative; left: 150px;"> 10.Otro </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="4">
                      <b>¿En su vivienda se encuentra, se cuenta con un espacio prara la siembra de alimentos?</b>
                    </td>
                    <td>
                    <td style="position: relative;left: -90px;"> Si </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -230px;"> No </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -220px'></div>
                      </span>
                    </td>
                    <td></td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="4">
                      <b>¿le gustaria participar en el programa de agricultura domestica?</b>
                    </td>
                    <td>
                    <td style="position: relative;left: -90px;"> Si </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                      </span>
                    </td>
                    <td>
                    <td style="position: relative;left: -230px;"> No </td>
                    <td>
                      <span id='platabanda'>
                        <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -220px'></div>
                      </span>
                    </td>
                    <td></td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="8">
                      <center>
                        <b>En caso de que algun mienbro de la familia sea productor agricola, completar el siguiente cuadro</b>
                      </center>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Area de Produccion </td>
                        <td style="position: relative;left: 0px;"> Años de Experiencia </td>
                        <td style="position: relative;left: 0px;"> Rubro Principal </td>
                        <td style="position: relative;left: 0px;"> Tiene Registri INTI </td>
                        <td style="position: relative;left: 0px;"> Tiene constancia de productor </td>
                        <td style="position: relative;left: 0px;"> Tiene señal de hierro </td>
                        <td style="position: relative;left: 0px;"> Ha sido Financiado </td>
                        <td style="position: relative;left: 0px;"> Cuenta con Agua de Riego </td>
                        <td style="position: relative;left: 0px;"> Tiene produccion de alimentos Actual </td>
                      </tr>
                    </table>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                        <td style="position: relative;left: 0px;">
                          <span></span>
                        </td>
                      </tr>
                    </table>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr style="color: red;font-size: 13px;">
                    <td style="position: relative; left: 0px;" colspan="4">
                      <table>
                        <tr>
                          <td>
                            <b style="color: red;font-size: 13px;">Pertenece a alguna organizacion productiva. Indique el nombre</b>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span>nombre</span>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <div style='width:100%;background: red;color:white'>
                      <center> VI. Alimentacion </center>
                    </div>
                  </tr>
                  <tr>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 0px;"> 1. Generalmente ¿con que frecuencia en su comunidad realizan jornadas de alimentos ? <br> (pdval,mercal entre otros) </td>
                        <td style="position: relative; left: 0px;"> 2. Cuantas comidas son consumidas al dia en el hogar </td>
                        <td style="position: relative; left: 0px;"> 3. Tiene acceso a la casa de alimentacion </td>
                        <td style="position: relative; left: 0px;"> 4. Posee la familia los siguientes articulos para el procesamiento de alimentos </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Semanal </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -180px;"> Mensual </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -250px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -400px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -380px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -220px;"> Nevera </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Quincenal </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -180px;"> Ocacional </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -250px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -400px;"> No </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -380px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -220px;"> Cocina </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>
                      </tr>
                    </table>
                  </tr>
                  <tr>
                    <div style='width:100%;background: red;color:white'>
                      <center> VII. Politica y Organizacion Comunal </center>
                    </div>
                  </tr>
                  <tr>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 0px;"> 1.¿todos los mienbros del hogar mayores de 18 años esta inscritos en el registro nacional electoral? </td>
                        <td></td>
                        <td style="position: relative; left: 100px;"> 2.¿todos los miembros del hogar resgistrados votaron en las ultimas elecciones? </td>
                        <td></td>
                        <td style="position: relative; left: 120px;"> 3.¿usted o alguno de los miembros del hogar participa actualmente de manera activa en alguna organizacion del poder popular? </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -180px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -160px;"> No </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -310px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -180px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -400px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -380px;"> No </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -360px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -250px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -80px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -160px;"> No </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -250px'></div>
                          </span>
                        </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 0px;"> Mencione cuantos: </td>
                        <td style="position: relative; left: 0px;"></td>
                        <td style="position: relative; left: 50px;"> Mencione cuantos: </td>
                        <td style="position: relative; left: 0px;"></td>
                        <td style="position: relative; left: 150px;"> Indique cual: <br> Coloque N°: </td>
                        <td style="position: relative; left: 0px;"></td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 0px;"> Opciones pregunta 3: </td>
                        <td style="position: relative; left: 0px;" colspan="2"> 1.Consejo Comunal </td>
                        <td style="position: relative; left: 0px;"> 2.Comuna </td>
                        <td style="position: relative; left: 60px;"> 3.Colectivos </td>
                        <td style="position: relative; left: 0px;"> 4.UBCHE </td>
                      </tr>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 200px;"> 5.Frente Francisco de Miranda </td>
                        <td style="position: relative; left: 300px;"> 6.Otros </td>
                        <td style="position: relative; left: 400px;"> Especifique: </td>
                        <td style="position: relative; left: 0px;"></td>
                      </tr>
                    </table>
                  </tr>
                  <tr>
                    <div style='width:100%;background: red;color:white'>
                      <center> VIII. Cultural y Deporte </center>
                    </div>
                  </tr>
                  <tr>
                    <table>
                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative; left: 0px;"> ¿Cual de las siguientes areas preferirian desarrollar a los habitantes de su hogar? </td>
                        <td style="position: relative; left: 0px;"> ¿Tiene la familia acceso a los siguientes medios masivos de comunicacion? </td>
                        <td style="position: relative; left: 0px;"> ¿Tiene la familia acceso al uso de computadoras y equipos informaticos? </td>
                        <td style="position: relative; left: 0px;"> ¿le gustaria formar parte del movimiento paz y la vida? </td>
                        <td style="position: relative; left: 0px;" colspan="4"> ¿Le gustaria participar en espacios para la defensa y derechos humanos de la mujer? </td>
                      </tr>

                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Culturales </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -100px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;"> Television </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -300px'></div>
                          </span>
                        </td>

                        <td style="position: relative;left: -300px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -300px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>

                        <td style="position: relative;left: -150px;"> Si </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -140px'></div>
                          </span>
                        </td>
                        
                      </tr>

                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Deportivas </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -100px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;"> Radio </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -300px'></div>
                          </span>
                        </td>

                        <td style="position: relative;left: -300px;">No</td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -300px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;">No</td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -200px'></div>
                          </span>
                        </td>

                        <td style="position: relative;left: -150px;">No</td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -140px'></div>
                          </span>
                        </td>
                        
                      </tr>

                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Recreativas </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -100px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;"> Prensa </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -300px'></div>
                          </span>
                        </td>

                        
                        
                      </tr>

                      <tr style="color: red;font-size: 13px;">
                        <td style="position: relative;left: 0px;"> Otras </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -100px'></div>
                          </span>
                        </td>
                        <td style="position: relative;left: -200px;"> Cine </td>
                        <td>
                          <span id='platabanda'>
                            <div style='border-style:solid;height: 20px;width:20px;position: relative;left: -300px'></div>
                          </span>
                        </td>

                        
                        
                      </tr>
                    </table>
                     <tr>
                    <div style='width:100%;background: red;color:white'>
                      <center> IX. Datos de los residentes habituales del hogar </center>
                    </div>
                  </tr>
                  <tr>
                      <table class="datos">
                          <tr style="color:red;">
                              <td>#</td>
                              <td>Nombre y Apellido</td>
                              <td>Edad</td>
                              <td>Cedula</td>
                              <td>Fecha de Nacimiento</td>
                              <td>Grado Intrucciones</td>
                              <td>Estado Civil</td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>

                           <tr style="color:red;">
                            <td></td>
                              <td>Ocupacion u Oficio</td>
                              <td>Condicion Laboral</td>
                              <td>Enfermedad o Factor de Riesgo</td>
                              <td>Mision de la cual recibe beneficio</td>
                              <td colspan="2">Documento que requiere</td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td colspan="2"></td>
                              
                          </tr>
                      </table>

                  </tr>
                  </tr>
                </table>
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