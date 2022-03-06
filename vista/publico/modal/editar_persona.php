<div class="modal fade" id="edit_persona">
  <div class="modal-dialog" style='min-width: 98%'>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id='modal-title'>Editar persona</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <center>
          <div style='width:98%;overflow-y: scroll;height:400px'>
            <table style='width:98%;' border='1'>

              <tr style='background:#057E9F;color:white;'>
                <td style='width:25%'>Primer Nombre</td>
                <td style='width:25%'>Segundo Nombre</td>
                <td style='width:25%'>Primer Apellido</td>
                <td style='width:25%'>Segundo Apellido</td>
              </tr>
              <tr>
                <td style='width:25%'><input type="text" id='n1' class='form-control' placeholder="Primer nombre"></td>
                <td style='width:25%'><input type="text" id='n2' class='form-control' placeholder="Segundo Nombre"></td>
                <td style='width:25%'><input type="text" id='a1' class='form-control' placeholder="Primer Apellido"></td>
                <td style='width:25%'><input type="text" id='a2' class='form-control' placeholder="Segundo Apellido"></td>
              </tr>
            </table>

            <br>

            <table style='width:98%;' border='1'>

              <tr style='background:#057E9F;color:white;'>
                <td style='width:25%'>Nacionalidad</td>
                <td style='width:25%'>Teléfono</td>
                <td style='width:25%'>WhatsApp</td>
                <td style='width:25%'>Correo</td>
              </tr>
              <tr>
                <td style='width:25%'><input type="text" id='nac' class='form-control' placeholder="Nacionalidad"></td>
                <td style='width:25%'><input type="text" id='tlf' class='form-control' placeholder="Teléfono"></td>
                <td style='width:25%'>
                  <select class='form-control' id='ws'>
                    <option value='0'>No</option>
                    <option value='1'>Si</option>
                  </select>
                </td>
                <td style='width:25%'><input type="text" id='cor' class='form-control' placeholder="Correo"></td>
              </tr>
            </table>


            <br>

            <table style='width:98%;' border='1'>

              <tr style='background:#057E9F;color:white;'>
                <td style='width:25%'>Fecha de nacimiento</td>
                <td style='width:25%'>Género</td>
                <td style='width:25%'>Orientación Sexual</td>
                <td style='width:25%'>Estado Civil</td>
              </tr>
              <tr>
                <td style='width:25%'><input type="date" id='fnac' class='form-control'></td>
                <td style='width:25%'>
                  <select class='form-control' id='gen'>
                    <option value='M'>Masculino</option>
                    <option value='F'>Femenino</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='orsex'>
                    <option value='Heterosexual'>Heterosexual</option>
                    <option value='Homosexual'>Homosexual</option>
                    <option value='Bisexual'>Bisexual</option>
                    <option value='Otro'>Otro</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='edoc'>
                    <option value='Soltero(a)'>Soltero(a)</option>
                    <option value='Casado(a)'>Casado(a)</option>
                    <option value='Viudo(a)'>Viudo(a)</option>
                  </select>
                </td>
              </tr>
            </table>

            <br>

            <table style='width:98%;' border='1'>

              <tr style='background:#057E9F;color:white;'>
                <td style='width:25%'>Nivel educativo</td>
                <td style='width:25%'>Antigüedad comunidad</td>
                <td style='width:25%'>Miliciano</td>
                <td style='width:25%'>Jefe de familia</td>
              </tr>
              <tr>
                <td style='width:25%'><input type="text" id='nedu' class='form-control' placeholder="Nivel educativo"></td>
                <td style='width:25%'>
                <input type="date" id='antcom' class='form-control'>
              </td>
                <td style='width:25%'>
                  <select class='form-control' id='mili'>
                    <option value="1">Si</option>
                    <option value='0'>No</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='jeffam'>
                    <option value="1">Si</option>
                    <option value='0'>No</option>
                  </select>
                </td>
              </tr>
            </table>

            <br>

            <table style='width:98%;' border='1'>

              <tr style='background:#057E9F;color:white;'>
                <td style='width:25%'>Propietario vivienda</td>
                <td style='width:25%'>Jefe de calle</td>
                <td style='width:25%'>Privado de libertad</td>
                <td style='width:25%'>Afrodescendencia</td>
              </tr>
              <tr>
                <td style='width:25%'>
                  <select class='form-control' id='propv'>
                    <option value="1">Si</option>
                    <option value='0'>No</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='jefcas'>
                    <option value="1">Si</option>
                    <option value='0'>No</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='privlib'>
                    <option value="1">Si</option>
                    <option value='0'>No</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='afro'>
                    <option value="1">Si</option>
                    <option value='0'>No</option>
                  </select>
                </td>
              </tr>
            </table>

            <br>

            <table style='width:98%;' border='1'>

              <tr style='background:#057E9F;color:white;'>
                <td style='width:25%'>Comunidad indígena</td>
                <td style='width:25%'>Ocupación</td>
              </tr>
              <tr>
                <td style='width:25%'>
                  <table style='width:100%'>
                    <tr>
                      <td style='width:40%' id='vercomindi'>
                        <select class='form-control' id='comindi'>
                          <option value="0">No</option>
                          <option value='1'>Si</option>
                        </select>
                      </td>
                      <td style='width:60%' id='vervalcomindi'>
                        <input type="text" id='valcomindi' class="form-control" list='comunidades_indigenas'>
                        <datalist id='comunidades_indigenas'>
                          <?php foreach ($this->comunidades as $cm) { ?>
                            <option value="<?php echo $cm['nombre_comunidad']; ?>"></option>
                          <?php } ?>
                        </datalist>
                      </td>
                    </tr>
                  </table>
                </td>
                <td style='width:25%'>
                  <table style='width:100%'>
                    <tr>
                      <td id='verocup'>
                        <select class='form-control' id='ocup'>
                          <option value='0'>Sin ocupación</option>
                          <?php foreach ($this->ocupaciones as $o) { ?>
                            <option value='<?php echo $o["id_ocupacion"] ?>'><?php echo $o["nombre_ocupacion"]; ?></option>
                          <?php  } ?>
                        </select>
                        <input type="text" class='form-control' placeholder="Ocupación" id='ocupinput' style='display:none' name="">
                      </td>
                      <td></td>
                      <td>
                        <span class='fa fa-plus-square' id='spannewocup' style='font-size:25px;cursor:pointer'></span>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <br>




            <table style='width:98%' border='1'>

              <tr style='background:#057E9F;color:white;'>

                <td style='width:25%'>Condición laboral</td>
                <td style='width:25%'>Organización política</td>
                <td style='width:25%'>Transporte</td>

              </tr>

              <tr>

                <td style='width:25%'>

                  <table style='width:100%'>
                    <tr>
                      <td>
                        <select class='form-control' id='condlab'>

                          <option value='0'>Desempleado</option>

                          <?php foreach ($this->condiciones as $cond) { ?>

                            <option value='<?php echo $cond["id_cond_laboral"]; ?>'><?php echo $cond['nombre_cond_laboral']; ?></option>

                          <?php      } ?>
                        </select>

                        <input style="display:none" type="text" placeholder="Nombre condición" class="form-control" id='nomcondlab' name="">

                      </td>
                      <td>
                        <select style='display: none' title="Sector laboral" class='form-control' id='sectlab'>
                          <option value='0'>-Seleccione-</option>
                          <option value='1'>Formal</option>
                          <option value='2'>Público</option>
                        </select>
                      </td>
                      <td>
                        <select style="display: none" title="Tipo de sector formal" class='form-control' id='tipsectlab'>
                          <option value='0'>-Seleccione-</option>
                          <option value='1'>Informal</option>
                          <option value='2'>Privado</option>
                        </select>
                      </td>
                      <td>
                        <span class='fa fa-plus-square' id='spannewcondlab' style='font-size:25px;cursor:pointer'></span>
                      </td>

                  </table>

                </td>
                <td style='width:25%'>
                  <table style='width:100%'>
                    <tr>
                      <td id='verocup'>
                        <select class='form-control' id='orgpol'>
                          <option value='0'>Ninguna</option>
                          <?php foreach ($this->organizaciones as $o) { ?>
                            <option value='<?php echo $o["id_org_politica"] ?>'><?php echo $o["nombre_org"]; ?></option>
                          <?php  } ?>
                        </select>
                        <input type="text" placeholder="Org política" class='form-control' id='orgpolinput' style='display:none' name="">
                      </td>
                      <td></td>
                      <td>
                        <span class='fa fa-plus-square' id='spanneworgpol' style='font-size:25px;cursor:pointer'></span>
                      </td>
                    </tr>
                  </table>
                </td>
                <td style='width:25%'>
                  <table style="width:100%">
                    <tr>
                      <td>
                        <select class="custom-select" id="transp" name="transporte">
                          <option value="0">
                            Público
                          </option>
                          <option value="privado">
                            Privado
                          </option>

                        </select>
                      </td>
                      <td style='display:none' id='tiptransp'>

                        <input type="text" id='tiptransinput' name="tipo_transporte" placeholder="Indique el tipo de transporte" class="form-control" list='transportes_regitrados'>

                        <datalist id='transportes_regitrados'>
                          <?php foreach ($this->transportes as $tr) { ?>
                            <option value="<?php echo $tr['descripcion_transporte']; ?>"></option>
                          <?php } ?>
                        </datalist>

                      </td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>

            <br>

            <table style='width:98%' border='1'>

              <tr style='background:#057E9F;color:white;'>

                <td style='width:50%'>Bonos</td>
                <td style='width:50%'>Misiones</td>

              </tr>

              <tr>

              <td style='width:50%'>
              <div style='width:100%;overflow-y:scroll;background:#C5E6EF;border-radius:6px;height:100px;' id='bonos'>
              sdfsff
            </div>
              </td>
              <td style='width:50%'>
              <div style='width:100%;overflow-y:scroll;background:#C5E6EF;border-radius:6px;height:100px;' id='misiones'>
            sdfdfsd  
            </div>
              </td>
              </tr>
            </table>

            
            <br>

            <table style='width:98%' border='1'>

              <tr style='background:#057E9F;color:white;'>

                <td style='width:50%' class='text-center'>Proyectos</td>

              </tr>

              <tr>

              <td style='width:100%'>
              <div style='width:100%;overflow-y:scroll;background:#C5E6EF;border-radius:6px;height:100px;' id='proyectos'>
              sdfsff
            </div>
              </td>
              </tr>
            </table>


          </div>
        </center>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='guardar_cambios'>Guardar cambios</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->