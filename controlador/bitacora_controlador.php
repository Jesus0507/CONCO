<?php

class Bitacora extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";
     // $this->Cargar_Modelo("bitacora");
    }

    public function Establecer_Consultas()
    {
        $bitacoras = $this->modelo->Consultar_Bitacora();
        $this->vista->bitacoras = $bitacoras;//datos para mandar a la vista
        $this->datos_bitacoras = $bitacoras; //datos para usar en el controlador
    }

    public function Cargar_Vistas()
    {
    	$this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('seguridad/bitacora'); 
    }

    public function Consulta()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('seguridad/bitacora'); 
    }  

    public function Consultas_Bitacora_Ajax()
    {
        $this->Establecer_Consultas();

        for($i=0;$i<count($this->datos_bitacoras);$i++){
            $acciones="";
            $separado=explode("/",$this->datos_bitacoras[$i]['acciones']);
            $usuario="";
            $acciones_Ver="";

            for($j=0;$j<(count($separado)-1);$j++){
                $acciones_Ver.="-".$separado[$j]."<br><br><hr>";
            }

            $usuario=$this->datos_bitacoras[$i]['primer_nombre']." ".$this->datos_bitacoras[$i]['primer_apellido'];

            $acciones="<button class='btn btn-info' onclick='mostrar_acciones(`$acciones_Ver`,`$usuario`)'><em class='fas fa-eye'></em></button>";


            $this->datos_bitacoras[$i]['acciones']=$acciones;
            $this->datos_bitacoras[$i]['usuario']=$usuario;

        }


        $this->Escribir_JSON($this->datos_bitacoras);
    }

    public function Nueva_Accion()
    {
        $bitacora_actual=$this->modelo->Consultar_Bitacora();


        foreach ($bitacora_actual as $b) {
           if($b['cedula_usuario']==$_SESSION['cedula_usuario'] && $b['hora_fin']=="Activo"){
                $b['acciones']=$b['acciones'].$_POST['nueva_accion']."/";

                if($_POST['tipo']!=1){
                    $_SESSION['modulo_actual']=$_POST['tipo'];
                }
                
               $this->modelo->Nueva_Accion($b); 
                 
               
              

           }
        }

    }





}
?>