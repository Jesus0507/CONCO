<?php
require_once 'vista/privado/securimage/securimage.php';
class Solicitudes extends Controlador 
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
     //  $this->Cargar_Modelo("solicitudes");
    }
    public function Establecer_Consultas()
    {
        $solicitudes = $this->modelo->Consultar();
        $this->vista->solicitudes = $solicitudes; //datos para mandar a la vista
        $this->datos_solicitudes = $solicitudes; //datos para usar en el controlador
    }
// ==============================VISTAS=====================================

    public function Cargar_Vistas()
    {   
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('solicitudes/index');
    }
    public function Solicitud()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('solicitudes/consultar');
    }

    public function Solicitud_vivienda()
    {   
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('solicitudes/consultar_vivienda');
    }



    public function Solicitud_viewOnly()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('solicitudes/consultar_only_view');
    }

    public function Print()
    {
        $this->Seguridad_de_Session();
        $solicitudes=$this->modelo->Consultar_all();
        
        foreach ($solicitudes as $s) {
           if($s['id_solicitud']==$_GET['id']){

             $header_constancia="";
             $body_constancia="";
             $footer_constancia="";

             switch($s['tipo_constancia']){
                
                case "Residencia":

                $header_constancia="<table style='width:100%'><tr><td style='width:10%'></td><td style='width:80%'>REPUBLICA BOLIVARIANA DE VENEZUELA<br>CONSEJO COMUNAL<br>PRADOS DE OCCIDENTE SECTOR III<br>RIF. J-30725585 CODIGO 13-03-04-608-0002<br>Barquisimeto Municipio Iribarren<br>Parroquia Guerrera Ana Soto Estado Lara<br><u><h4>CONSTANCIA DE RESIDENCIA</h4></u></td><td style='width:10%'></td></tr></table>";


                break;

                case "Buena conducta":
                break;

                case "No poseer vivienda":
                break;

             }

              



             $this->vista->header_constancia=$header_constancia;
              
             $this->vista->titulo="Constancia de ".$s['tipo_constancia'];
             $this->vista->Cargar_Vistas('solicitudes/constancia_pdf');

           }
        }

    }



    // ==============================CRUD=====================================
    
    public function Nueva_solicitud()
    {
       $datos=$_POST['datos'];
       $datos['observaciones']="";

       echo $this->modelo->Registrar($datos);

    }


    public function Nueva_solicitud_vivienda()
    {
       $datos=$_POST['datos'];
       $ultimo=$this->Ultimo_Ingresado("vivienda","id_vivienda");
       $id='';
       foreach ($ultimo as $i) {
          $id= $i['MAX(id_vivienda)'];
      
      }
      $datos['observaciones']=$id;
       echo $this->modelo->Registrar($datos);

    }


    public function Consultar_solicitudes()
    {
        $this->Establecer_Consultas();
        
        $this->Escribir_JSON($this->datos_solicitudes);
    }

    public function Consultar_solicitudes_vivienda()
    {
        $solicitud=$this->modelo->get_solicitud_vivienda($_POST['id']);
        $solicitud[0]['servicio_gas']=count($this->modelo->get_info_vivienda_gas($solicitud['id_vivienda']));
        
        $this->Escribir_JSON($solicitud);
    }

        public function Consultar_solicitudes_all()
    {
        $solicitudes=$this->modelo->Consultar_all();
        
        $this->Escribir_JSON($solicitudes);
    }


    public function Set_status(){
        $data=[
              "id_solicitud"=>$_POST['id'],
              "procesada"=>$_POST['procesada'],
              "observaciones"=>$_POST['observaciones']
        ];

        $this->modelo->setStatus($data);


    }






}


