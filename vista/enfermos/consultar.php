<?php include (call."Inicio.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Personas Enfermas</h1>
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
                <h3 class="card-title">Consulta y Exportacion de Datos de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Enfermedades</th>
                            <th>Medicamentos</th>

                            <!-- <th style="width: 20px;">Ver</th> -->

                            <?php if($_SESSION['Enfermos']['modificar']){ ?>
                                <th style="width: 20px;">Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Enfermos']['eliminar']){ ?>
                                <th style="width: 20px;">Eliminar</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <script>
                            $(function() {
                                $.ajax({
                                    type: 'POST',
                                    url: BASE_URL + 'Enfermos/consultar_info_enfermos'
                                }).done(function(datos) {
                                    var data = JSON.parse(datos);
                                    var enfermedades = [];
                                    var btn_nueva_enfermedad=document.getElementById("btn_nueva_enfermedad");
                                    
                                    $("#example1").DataTable({
                                        "data": data,
                                        "columns": [{
                                            "data": "cedula"
                                        },
                                        {
                                            "data": "nombre"
                                        },
                                        {
                                            "data": "enfermedades"
                                        },
                                        {
                                            "data":"medicamentos"
                                        },
                                        
                                        // {
                                        //     "data": "ver"
                                        // },

                                        <?php if($_SESSION['Enfermos']['modificar']){ ?>
                                            {
                                                "data": "editar"
                                            },
                                        <?php } ?>
                                        <?php if($_SESSION['Enfermos']['eliminar']){ ?>  
                                            {
                                                "data": "eliminar"
                                            }
                                        <?php } ?>
                                        ],
                                        "responsive": true,
                                        "autoWidth": false,
                                        "ordering": true,
                                        "info": true,
                                        "processing": true,
                                        "pageLength": 10,
                                        "lengthMenu": [5, 10, 20, 30, 40, 50, 100]
                                    }).buttons().container().appendTo(
                                    '#example1_wrapper .col-md-6:eq(0)');

                                    $(document).on('click', '.editar', function() {
                                        fila = $(this).closest("tr");
                                        cedula = fila.find('td:eq(0)').text();
                                        nombre = fila.find('td:eq(1)').text();

                                        $('#cedula').val(cedula);
                                        $('#nombre').val(nombre);


                                    });     

                                    $(document).on('click', '#agregar', function() {
                                        var enfermedad_input=document.getElementById("enfermedad_input");
                                        var valid_enfermedad=document.getElementById("valid_enfermedad");
                                        var div_enfermedaedes=document.getElementById("enfermedades_agregadas"); 
                                        
                                        if((enfermedad_input.style.display!='none' && enfermedad_input.value=='') ||  (enfermedad_input.style.display=='none' && enfermedad_select.value=='vacio')){
                                            valid_enfermedad.innerHTML='Ingrese la enfermedad';
                                            enfermedad_input.style.borderColor='red';
                                            enfermedad_input.focus();
                                        }
                                        else{
                                        valid_enfermedad.innerHTML='';
                                        enfermedad_input.style.borderColor='';


                                        var enfer= new Object();
                                        var textoEnfermedad="";
                                        var textoMedicamento=medicamentos.value;

                                        enfermedad_input.style.display!='none'?enfer['enfermedad']=enfermedad_input.value:enfer['enfermedad']=enfermedad_select.value;

                                        enfermedad_input.style.display!='none'?textoEnfermedad=enfermedad_input.value:textoEnfermedad=enfermedad_select.options[enfermedad_select.selectedIndex].text;

                                        enfermedad_input.style.display!='none'?enfer['nuevo']='1':enfer['nuevo']='0';


                                        textoMedicamento==''?enfer['medicamentos']="No posee":enfer['medicamentos']=textoMedicamento;

                                        var div=document.createElement("div");
                                        var table=document.createElement("table");
                                        table.style.width='100%';
                                        var tr=document.createElement("tr");
                                        var td1=document.createElement("td");
                                        var td2=document.createElement("td");
                                        var td3=document.createElement("td");

                                        td3.style.textAlign='right';

                                        td1.innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -"+textoEnfermedad;
                                        td2.innerHTML=medicamentos.value;
                                        medicamentos.value='';
                                        enfermedad_select.value='vacio';
                                        enfermedad_input.value='';
                                        var button=document.createElement("input");
                                        button.type='button';
                                        button.value='X';
                                        button.className='btn btn-danger';
                                        td3.appendChild(button);

                                        tr.appendChild(td1);
                                        tr.appendChild(td2);
                                        tr.appendChild(td3);

                                        table.appendChild(tr);
                                        div.appendChild(table);
                                        var hr=document.createElement("hr");
                                        enfermedades.push(enfer);
                                        div.appendChild(hr);
                                        div_enfermedaedes.appendChild(div);
                                        console.log(enfermedades);
                                        button.onclick=function(){
                                            div_enfermedaedes.removeChild(div);
                                            enfermedades.splice(enfermedades.indexOf(enfer),1);
                                            console.log(enfermedades);
                                        }
                                    }
                                    }); 

                                    $(document).on('click', '#btn_nueva_enfermedad', function() {
                                        var enfermedad_input=document.getElementById("enfermedad_input");
                                        var valid_enfermedad=document.getElementById("valid_enfermedad");
                                        if(enfermedad_input.style.display=='none'){
                                            valid_enfermedad.innerHTML='';
                                            enfermedad_input.style.display='';
                                            enfermedad_select.style.display='none';
                                            enfermedad_select.value='vacio';
                                            enfermedad_input.focus();
                                            btn_nueva_enfermedad.innerHTML='Atrás';
                                        }
                                        else{
                                            valid_enfermedad.innerHTML='';
                                            enfermedad_input.style.display='none';
                                            enfermedad_select.style.display='';
                                            enfermedad_input.value='';
                                            enfermedad_select.focus();  
                                            btn_nueva_enfermedad.innerHTML='Nueva enfermedad';
                                        }
                                    }); 

                                    $(document).on('click', '#enviar', function() {
                                        $.ajax({
                                            type:"POST",
                                            url:BASE_URL+"Enfermos/nuevas_enfermedades",
                                            data:{"cedula":$('#cedula').val(),"enfermedades":enfermedades}
                                        }).done(function(result){
                                            swal({
                                                type:"success",
                                                title:"Enhorabuena",
                                                text:"Se ha registrado las enfermedades de forma exitosa",
                                                timer:2000,
                                                showConfirmButton:false
                                            });

                                            setTimeout(function(){location.href=BASE_URL+"Enfermos/Consultas"},2000);
                                        });
                                    });   




                                }).fail(function() {
                                    alert("error")
                                })

                            });


function eliminar(id){ 


    swal({
     type:"warning",
     title:"Atención",
     text:"Estás por eliminar esta información, ¿deseas continuar?",
     showCancelButton:true,
     cancelButtonText:"No",
     confirmButtonText:"Si"
 },function(isConfirm){
     if(isConfirm){

        var ids=JSON.parse(id);

        for(var i=0;i<ids.length;i++){
         $.ajax({
             type:"POST",
             url:BASE_URL+"Enfermos/eliminar_logica",
             data:{'id':ids[i]}
         }).done(function(result){
             console.log(result);
         });
     }

     setTimeout(function(){
      swal({
          type:"success", 
          title:"Éxito",
          text:"Se ha eliminado exitosamente esta información",
          timer:2000,
          showConfirmButton:false
      });

      setTimeout(function(){location.reload();},1000);
  },500);


 }
})
}

function editar(cedula){ 
            // $('#cedula').val(cedula);
            
            $.ajax({
             type:"POST",
             url:BASE_URL+"Enfermos/consultar_enfermos_datos",
             data:{'cedula':cedula}
         }).done(function(datos){
             var data = JSON.parse(datos);
             var enfermedades = document.getElementById('enfermedades_agregadas');
             if (data.length == 0) {
                enfermedades.innerHTML = "No aplica";
            } else {
                enfermedades.innerHTML = "";
                for (var i = 0; i < data.length; i++) {
                  var tabl=
                  enfermedades.innerHTML += " <table style='width:95%'><tr><hr><td>-" + data[i]["nombre_enfermedad"] + "</td><td style='text-align:right'><span onclick='borrar_enfermedad("+data[i]['id_persona_enfermedad']+","+ data[i]["cedula_persona"]+")' class='iconDelete fa fa-times-circle' title='Eliminar Enfermedad' style='font-size:22px'></span></td></tr></table><br><hr>";
              }
          }

      }); 
     }

     function borrar_enfermedad(id,cedula_param){
        swal({
          type:"warning",
          title:"¿Está seguro?",
          text:"Está por eliminar esta Enfermedad relacionado con la persona, ¿desea continuar?",
          showCancelButton:true,
          confirmButtonText:"Si, continuar",
          cancelButtonText:"No"
      },function(isConfirm){
          if(isConfirm){
            $.ajax({
              type:"POST",
              url:BASE_URL+"Enfermos/eliminar_enfermedad",
              data:{"id_persona_enfermedad":id,"cedula_persona":cedula_param}
          }).done(function(result){
              result=JSON.parse(result);
              actualizar_enfermedad(result,cedula_param);
              editar(cedula_param);
          })
      }
  });
    }


    function actualizar_enfermedad(result,cedula_param){

      var enfermedades = document.getElementById('enfermedades_agregadas'); 
      if(result!=0){
        enfermedades.innerHTML = "";
        for (var i = 0; i < result.length; i++) {
          enfermedades.innerHTML += " <table style='width:95%'><tr><td>- " + result[i]["nombre_enfermedad"] + "</td><td style='text-align:right'><span onclick='borrar_enfermedad("+result[i]['id_persona_enfermedad']+",`"+cedula_param+"`)' class='iconDelete fa fa-times-circle' title='Eliminar bono' style='font-size:22px'></span></td></tr></table><br><hr>";
      }
  }
  
}

</script>
</tbody>
<tfoot>
    <tr>
     <th>Cedula</th>
     <th>Nombre</th>
     <th>Enfermedades</th>
     <th>Medicamentos</th>
     <!-- <th style="width: 20px;">Ver</th> -->
     <?php if($_SESSION['Enfermos']['modificar']){ ?>
        <th style="width: 20px;">Editar</th>
    <?php } ?>
    <?php if($_SESSION['Enfermos']['eliminar']){ ?>
        <th style="width: 20px;">Eliminar</th>
    <?php } ?>
</tr>
</tfoot>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
<!-- /.content -->
</div>
<?php include modal."editar-enfermos.php"; ?> 
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (call."style-agenda.php"); ?>



