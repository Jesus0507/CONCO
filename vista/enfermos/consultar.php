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
                                console.log(data);
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

                                
                            }).fail(function() {
                                alert("error")
                            })

                        });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                           <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Enfermedades</th>
                            <th>Medicamentos</th>
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
<?php include modal."ver-usuario.php"; ?> 
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (call."style-agenda.php"); ?>
<script type="text/javascript" >
    

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
</script>
