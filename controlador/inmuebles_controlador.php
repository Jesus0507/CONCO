<?php

class Inmuebles extends Controlador    
{
    public function __construct()
    { 
        parent::__construct();
      //  $this->Cargar_Modelo("inmuebles");
    }

    public function Cargar_Vistas()
    { 
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inmueble/index');  
    }   

    public function Establecer_Consultas()
    {
        $tipo_inmueble = $this->Consultar_Tabla("tipo_inmueble", 1, "nombre_tipo");
        $inmueble = $this->modelo->Consultar();
        $calle  = $this->Consultar_Tabla("calles", 1, "nombre_calle");  

        $this->vista->tipo_inmueble = $tipo_inmueble; 
        $this->tipo_inmueble = $tipo_inmueble;

        $this->vista->inmueble = $inmueble; //datos para mandar a la vista
        $this->datos_inmueble = $inmueble; //datos para usar en el controlador

        $this->vista->calle = $calle; //datos para mandar a la vista
        $this->calle = $calle;
    }
// ==============================VISTAS=====================================
    public function Inmuebles() 
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inmueble/index'); 
    }  

    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('inmueble/registrar');
    }

    public function Consultas()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('inmueble/consultar');
    }

    public function Administracion()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('inmueble/administrar');
    }

    // ==============================CRUD=====================================

    public function Consultas_Inmuebles_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_inmueble);
    }

    
    public function Nuevo_Inmueble()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $this->Establecer_Consultas();

        $cont = 0;
        foreach ($this->tipo_inmueble as $datos_t) {
            
            if ($datos_t["nombre_tipo"] == $datos['tipo_inmueble']) {
                if ($this->modelo->Registrar(
                     [
                         'id_calle'   => $datos['id_calle'],
                         'nombre_inmueble'      => $datos['nombre_inmueble'],
                         'direccion_inmueble'   => $datos['direccion_inmueble'],
                         'id_tipo_inmueble'   =>   $datos_t['id_tipo_inmueble'],
                         'estado'   => 1,
                     ]
                 )
                 ) {
                     $this->mensaje = 1;
                     $this->Accion("Registro de Inmueble: ".$datos['nombre_inmueble']." \\Exitosamente.");
                 } else {
                     $this->mensaje = 0;
                 }
                echo $this->mensaje;
                 $cont++;
            }
        }

        if($cont==0){
            if($this->Registrar_Tablas("tipo_inmueble", "nombre_tipo", $datos['tipo_inmueble'])){
                $id= $this->Ultimo_Ingresado("tipo_inmueble","id_tipo_inmueble");

                foreach ($id as $i) {
                    if ($this->modelo->Registrar(
                     [
                         'id_calle'   => $datos['id_calle'],
                         'nombre_inmueble'      => $datos['nombre_inmueble'],
                         'direccion_inmueble'   => $datos['direccion_inmueble'],
                         'id_tipo_inmueble'   =>   $i['MAX(id_tipo_inmueble)'],
                         'estado'   => 1,
                     ]
                 )
                 ) {
                     $this->mensaje = 1;
                     $this->Accion("Registro de Inmueble: ".$datos['nombre_inmueble']." \\Exitosamente.");
                 } else {
                     $this->mensaje = 0;
                 }
                echo $this->mensaje;
                }
            }
        }

        exit();
        return false;
    }

    public function Consultas_Calle() 
    {
        $this->Establecer_Consultas();

        foreach ($this->calle as $key => $value) {
            if ($value["nombre_calle"] == $_POST['calle']) {
                $id = $value["id_calle"];
            }
        }
        
        echo  $id;
        
    } 

    public function Eliminar_Inmueble() 
    {

        if ($this->Desactivar("inmuebles","id_inmueble",$_POST['id'])) { 
            $this->mensaje = 'Inmueble Eliminado Exitosamente';
            $this->Accion("Inmueble: ".$_POST['nombre_inmueble']." Eliminado \\Exitosamente.");
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    } 
    
    public function Editar_Inmueble(){
        
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $this->Establecer_Consultas();

        foreach ($this->tipo_inmueble as $datos_t) {
            if ($datos_t["nombre_tipo"] == $datos[3]) {
                $datos[3] = $datos_t["id_tipo_inmueble"];
            }

        }

        if($this->modelo->Actualizar(
            [
                'id_inmueble'=>$datos[4],
                'id_calle'   => $datos[0],
                'nombre_inmueble'      => $datos[1],
                'direccion_inmueble'   => $datos[2],
                'id_tipo_inmueble'   =>   $datos[3],
                'estado'   => 1
            ]
        )){
            $this->mensaje = 1;
        }else{
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
        
    }
}
?>