<?php

class Consejo_Comunal extends Controlador 
{ 
    public function __construct()
    {
        parent::__construct();
     //   $this->Cargar_Modelo("consejo_comunal");
    } 
 
    public function Establecer_Consultas()
    {
        $consejo_comunal = $this->modelo->Consultas();
        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");
        $comite = $this->Consultar_Tabla("comite", 1, "nombre_comite");

        $this->vista->consejo_comunal = $consejo_comunal; //datos para mandar a la vista
        $this->datos_consejo_comunal = $consejo_comunal;

        $this->vista->personas = $personas; //datos para mandar a la vista
        $this->datos_personas = $personas;  ///datos para usar en el controlador

        $this->vista->comite = $comite; //datos para mandar a la vista
        $this->datos_comite = $comite; 

        
    }
// ==============================VISTAS=====================================

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('consejo_comunal/index'); 
    }   
    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('consejo_comunal/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas(); 
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('consejo_comunal/consultar');
    } 

     // ==============================CRUD=====================================

    public function Consultas_Consejo_Comunal_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_consejo_comunal);
    }
    
    public function Asignar_Consejo_Comunal()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $this->Establecer_Consultas();

        foreach ($this->datos_comite as $tabla_comite) { 
            if ($tabla_comite["nombre_comite"] == $datos['nombre_comite']) {
                $id_comite =$tabla_comite["id_comite"];
            }
        }

        if ($this->modelo->Registrar(
            [
                'id_comite'      => $id_comite,
                'cedula_persona'   => $datos['cedula_persona'],
                'cargo_persona'   => $datos['cargo_persona'],
                'fecha_ingreso'   => $datos['fecha_ingreso'],
                'fecha_salida'   => $datos['fecha_salida']
            ]
        )
        ) {
            $this->mensaje = 1;
            $this->Accion("El portador de la cedula ".$datos['cedula_persona']." fue registrado como vocero \\Exitosamente.");
        } else {
            $this->mensaje = 0;
        }   
        echo $this->mensaje;
            // header('location:' . constant('URL') . "Consejo_Comunal/Consultas");
        exit();
        return false;
    }

    public function Nuevo_Comite()
    {   
        if ($this->Registrar_Tablas("comite", "nombre_comite", $_POST['comite'])){
           $this->vista->mensaje = 'Comite Registrado exitosamente!.';
       } else {
           $this->vista->mensaje = 'Ha ocurrido un error.';
       }
        return false;       
    }

    public function Eliminar_Consejo_Comunal() 
    {

        if ($this->Eliminar_Tablas("comite_persona", "id_comite_persona", $_POST['id'])) {
            $this->mensaje = 'Consejo Comunal Eliminado Exitosamente';
            $this->Accion("El Vocero fue Eliminado Exitosamente.");
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    } 

    public function Editar_Consejo_Comunal(){

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        $this->Establecer_Consultas();

        foreach ($this->datos_comite as $tabla_comite) { 
            if ($tabla_comite["nombre_comite"] == $datos[2]) {
                $id_comite =$tabla_comite["id_comite"];
            }
        }


        if ($this->Eliminar_Tablas("comite_persona", "id_comite_persona", $datos[6])) {

            if ($this->modelo->Registrar(
                [
                    'id_comite'      => $id_comite,
                    'cedula_persona'   => $datos[0],
                    'cargo_persona'   => $datos[3],
                    'fecha_ingreso'   => $datos[4],
                    'fecha_salida'   => $datos[5]
                ]
            )
        ) {
                $this->mensaje = 1;
                $this->Accion("El portador de la cedula ".$datos['cedula_persona']." fue Actualizado como vocero \\Exitosamente.");
            } else {
                $this->mensaje = 'Ha ocurrido un error.';
            }

        } else {
            $this->mensaje = 0;
        }

        // if($this->modelo->Actualizar(
        //     [
        //         'id_comite_persona'      => $datos[6],
        //         'id_comite'      => $id_comite,
        //         'cedula_persona'   => $datos[0],
        //         'cargo_persona'   => $cargo_persona,
        //         'fecha_ingreso'   => $datos[4],
        //         'fecha_salida'   => $datos[5]
        //     ]
        // )){         
        //    $this->mensaje = 1;
        // }else{
        //     $this->mensaje = 0;
        // }
        echo $this->mensaje;
        return false;
    }


}
?>