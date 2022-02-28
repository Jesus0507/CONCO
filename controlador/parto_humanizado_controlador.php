<?php

class Parto_Humanizado extends Controlador 
{  
    public function __construct()
    {
        parent::__construct();
   //    $this->Cargar_Modelo("parto_humanizado");
    }
 
    public function Establecer_Consultas()
    {
        $parto_humanizado = $this->modelo->Consultar();
        $personas =$this->Consultar_Tabla("personas", 1, "cedula_persona");
        
        $this->vista->parto_humanizado = $parto_humanizado; //datos para mandar a la vista
        $this->datos_parto_humanizado = $parto_humanizado;

        $this->vista->personas = $personas; //datos para mandar a la vista
        $this->datos_personas = $personas;  ///datos para usar en el controlador

        
    }

    public function Consultas_Parto_Humanizado_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_parto_humanizado);
    }
    public function Consultas_Parto_Humanizado_Persona()
    {
        $parto = $this->Consultar_Columna("parto_humanizado","id_parto_humanizado",$_POST["id"]);
        $this->Escribir_JSON($parto);
    }
    /* ==================================================== */

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inicio/index'); 
    }   
    public function Inicio()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inicio/index'); 
    } 
    
    public function Registros()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('parto_humanizado/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('parto_humanizado/consultar');
    }

     // ==============================CRUD=====================================

    public function Nuevo_Parto_Humanizado()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $datos['estado']=1;

        if ($this->modelo->Registrar($datos)
        ) {
            $this->mensaje = 'Embarazada Registrada exitosamente!.';
            $this->Accion($this->mensaje);
        } else {
            $this->mensaje = $this->ERROR();
        }
        
        header('location:' . constant('URL') . "Parto_Humanizado/Consultas");
        exit();
        return false;
    }

    public function Editar_Parto_Humanizado()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Actualizar(
            [
                'id_parto_humanizado'      => $datos[4],
                'cedula_persona'      => $datos[0],
                'recibe_micronutrientes'      => $datos[1],
                'tiempo_gestacion'   => $datos[2], 
                'fecha_aprox_parto'   => $datos[3],
                'estado'   => 1
            ]
        )
        ) {
            $this->mensaje = 'Embarazada Actualizada exitosamente!.';
            $this->Accion($this->mensaje);
        } else {
            $this->mensaje = $this->ERROR();
        }
        echo $this->mensaje;
        #header('location:' . constant('URL') . "Parto_Humanizado/Consultas");
        exit();
        return false;
    }

    public function Eliminar_Parto_Humanizado() 
    {

        if ($this->Desactivar("parto_humanizado","id_parto_humanizado",$_POST['id'])) { 
            $this->mensaje = 'Embarazada Eliminada Exitosamente';
            $this->Accion($this->mensaje);
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    } 


    public function consulta_parto_ajax(){
        $cedula=$_POST['cedula'];
        $consulta=$this->Consultar_Columna("personas","cedula_persona",$cedula);
        $respuesta="";

        if(count($consulta)==0 || $consulta[0]['estado']==0 || $consulta[0]['estado']==2){
            $respuesta="Esta persona no se encuentra registrada";
        }
        else{
        if($consulta[0]['genero']=='M'){
            $respuesta="Esta cédula no es válida, su propietario es masculino.";
        }
        else{
         $respuesta=1;
        }
    }


    echo $respuesta;

    }

}
?>