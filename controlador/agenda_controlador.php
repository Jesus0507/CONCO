<?php

class Agenda extends Controlador 
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
    //   $this->Cargar_Modelo("agenda");
    }
    public function Establecer_Consultas()
    {
        $agenda = $this->modelo->Consultar();
        $this->vista->agenda = $agenda; //datos para mandar a la vista
        $this->datos_agenda = $agenda; //datos para usar en el controlador
    }
// ==============================VISTAS=====================================


    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->vista->ubicaciones=$this->get_ubicaciones();
        $this->vista->Cargar_Vistas('agenda/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->ubicaciones=$this->get_ubicaciones();
        $this->vista->Cargar_Vistas('agenda/consultar');
    }

    public function Administracion()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('usuario/administrar');
    }

    public function consultar_evento(){
        $this->Establecer_Consultas();
        $retornar=[];
       
        for($i=0;$i<count($this->datos_agenda);$i++) {
       
          $user=$this->datos_agenda[$i]['primer_nombre']." ".$this->datos_agenda[$i]['primer_apellido'];
          
          $retornar[]=[
             
             "usuario"     =>   $user,
             "id_agenda"   =>$this->datos_agenda[$i]['id_agenda'],
             "tipo_evento" =>$this->datos_agenda[$i]['tipo_evento'],
             "fecha"       =>$this->datos_agenda[$i]['fecha'],
             "creador"     =>$user,
             "ubicacion"   =>$this->datos_agenda[$i]['ubicacion'],
             "horas"       =>$this->datos_agenda[$i]['horas'],
             "detalle"     =>$this->datos_agenda[$i]['detalle'],
            'editar'       =>"<button title='Editar este evento' class='btn btn-success'><em class='fas fa-edit' onclick='editar_evento(`".json_encode($this->datos_agenda[$i])."`,`".json_encode($this->datos_agenda)."`)'></em></button>",
            'eliminar'     =>"<button title='Eliminar este evento' class='btn btn-danger'><em class='fas fa-trash' onclick='eliminar_evento(`".$this->datos_agenda[$i]['id_agenda']."`)'></em></button>",
            'ver'          =>"<button class='btn btn-info' title='Ver este evento' onclick='ver_evento(`".json_encode($this->datos_agenda[$i])."`,`".$user."`)'  ><em class='fas fa-eye'></em></button>"

          ];
        
        }


        $this->Escribir_JSON($retornar);
    }


   public function nuevo_evento(){
    $datos=$_POST['evento'];
    $cont=1;
    
    for($i=0;$i<count($datos['fechas']);$i++){

      $data=[
         "tipo_evento" => $datos['tipo_evento'],
         "fecha"       => $datos['fechas'][$i],
         "creador"     => $_SESSION['cedula_usuario'],
         "ubicacion"   => $datos['ubicacion'],
         "horas"       =>$datos['horas'],
         "detalle"     => $datos['detalle_evento']
      ];
      
      if($this->modelo->Registrar($data)){

      }
      else{
        $cont=0;
      }

    }


    echo $cont;


   }


  public function editar_evento(){
    $datos=$_POST['evento'];
   if($this->modelo->Actualizar($datos)){
    echo 1;
   }
   else{
    echo 0;
   }
  }

  public function eliminar_evento(){
   if($this->modelo->Eliminar($_POST['id'])){
    echo 1;
   }
  }



  public function get_ubicaciones(){

    $ubicaciones=[];

    $calles=$this->modelo->get_calles();
    $inmuebles=$this->modelo->get_inmuebles();

    foreach ($calles as $c) {
    $ubicaciones[]=$c['nombre_calle'];
    }

    foreach ($inmuebles as $i) {
    $ubicaciones[]=$i['nombre_inmueble'];
    }

    return $ubicaciones;


  }






}


