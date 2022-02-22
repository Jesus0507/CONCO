<?php

class Negocios extends Controlador   
{ 
    public function __construct()
    { 
        parent::__construct(); 
     //   $this->Cargar_Modelo("negocios");
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('negocios/index');   
    }   

    public function Establecer_Consultas()
    {
        $calle  = $this->Consultar_Tabla("calles", 1, "nombre_calle");
        $negocios = $this->modelo->Consultar();
        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona"); 
        
        $this->vista->negocios = $negocios; //datos para mandar a la vista
        $this->datos_negocios = $negocios; //datos para usar en el controlador

        $this->vista->calle = $calle; //datos para mandar a la vista
        $this->calle = $calle;

        $this->vista->personas = $personas; //datos para mandar a la vista
        $this->personas = $personas;

    }
// ==============================VISTAS=====================================
    public function Negocios()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('negocios/index'); 
    }  

    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('negocios/registrar');
    }

    public function Consultas()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('negocios/consultar');
    }

    public function Administracion()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('negocios/administrar');
    }

    // ==============================CRUD=====================================

    public function Consultas_Negocios_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_negocios);
    }

    public function Negocio_Existente()
    {
        $this->Establecer_Consultas();



        $existente = $this->Consultar_Columna("negocios","rif_negocio",$_POST['rif_negocio']);
        if ($existente == "" || $existente == null ) {
            echo 0;
        } else {
            echo 1;
        }
        
    }

    public function Nuevo_Negocio()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar(
            [
                'id_calle'   => $datos['id_calle'],
                'nombre_negocio'      => $datos['nombre_negocio'],
                'direccion_negocio'   => $datos['direccion_negocio'],
                'cedula_propietario'   =>   $datos['cedula_propietario'],
                'rif_negocio'   =>   $datos['rif_negocio'],
                'estado'   => 1
            ]
        )
        ) {
            $this->mensaje = 1;
            $this->Accion("Registro de Negocio: ".$datos['nombre_negocio']." Exitosamente.");
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        #header('location:' . constant('URL') . "negocios/Consultas");
        exit();
        return false;
    }

    public function Eliminar_Negocio() 
    {

        if ($this->Desactivar("negocios","id_negocio",$_POST['id'])) { 
            $this->mensaje = 'Negocio Eliminado Exitosamente';
            $this->Accion("Negocio: ".$_POST['nombre_negocio']." Eliminado Exitosamente.");
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    } 
    
    public function Editar_Negocio(){

         $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        if ($this->modelo->Actualizar(
            [
                'id_negocio'=>$datos[5],
                'id_calle'   => $datos[0],
                'nombre_negocio'      => $datos[1],
                'direccion_negocio'   => $datos[2],
                'cedula_propietario'   =>   $datos[3],
                'rif_negocio'   =>   $datos[4],
                'estado'   => 1
            ]
        )
    ) {
            $this->mensaje = 1;
            $this->Accion("Negocio: ".$datos['nombre_negocio']." Actualizado Exitosamente.");
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
        
    }
}
?>