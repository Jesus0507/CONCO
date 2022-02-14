<?php

class Calles extends Controlador 
{
    public function __construct()
    {
        parent::__construct();
     //   $this->Cargar_Modelo("calles");
        
    }
    public function Establecer_Consultas() 
    {
        $calles = $this->Consultar_Tabla("calles", 1, "nombre_calle");
        $this->vista->calles = $calles; //datos para mandar a la vista
        $this->datos_calles = $calles; //datos para usar en el controlador 
    }
// ==============================VISTAS=====================================

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('calle/index'); 
    }   
    public function Calle()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('calle/index'); 
    }
    
    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('calle/registrar');
    }

    public function Consultas()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('calle/consultar');
    }

    

    // ==============================CRUD=====================================
    public function Nueva_Calle()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar(
            [
                'nombre_calle'      => $datos['nombre_calle'],
                'condicion_calle'   => $datos['condicion_calle'],
                'estado'   => 1,
            ]
        )
        ) {
            $this->vista->mensaje = 'Calle Registrada exitosamente!.';
            $this->Accion("Registro la Calle ".$datos['nombre_calle']." Exitosamente.");
        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }

        header('location:' . constant('URL') . "Calles/Consultas");
        exit();
        return false;
    }

    public function Consultas_Calles_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_calles);
    }
    
    public function Eliminar_Calle() 
    {

        if ($this->Desactivar("calles","id_calle",$_POST['id'])) { 
            $this->mensaje = 'Calle Eliminada Exitosamente';
            $this->Accion("Calle ".$_POST['nombre_calle']." Eliminada Exitosamente.");
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    } 

    public function Editar_Calle(){
        $id=$_POST['id'];
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        if($this->model->Actualizar(
            [
                'id_calle'=>$id,
                'nombre_calle'=>$datos['nombre_calle'],
                'condicion_calle'=>$datos['condicion_calle'],
            ]
        )){         
           $this->mensaje = 'Calle Actualizada Exitosamente';
           $this->Accion("Calle ".$_POST['nombre_calle']." Actualizada Exitosamente.");
        }else{
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }
}
?> 