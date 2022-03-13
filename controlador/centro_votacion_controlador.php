<?php

class Centro_Votacion extends Controlador 
{  
    public function __construct()
    {
        parent::__construct();
     //  $this->Cargar_Modelo("centro_votacion");
    }

    public function Establecer_Consultas() 
    {
        $centros_votacion = $this->modelo->Centro_Votacion();
        $persona_centro_votacion = $this->modelo->Persona_Centro_Votacion();
        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");
        $parroquias = $this->Consultar_Tabla("parroquias", 1, "id_parroquia");

        $this->vista->centros_votacion = $centros_votacion;
        $this->centros_votacion = $centros_votacion;

        $this->vista->persona_centro_votacion = $persona_centro_votacion;
        $this->persona_centro_votacion = $persona_centro_votacion;

        $this->vista->personas = $personas; 
        $this->personas = $personas;  

        $this->vista->parroquias = $parroquias; 
        $this->parroquias = $parroquias;
    }   

    public function Consultas_Centro_Votacion_Personas_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->persona_centro_votacion);
    } 

    public function Consultas_Centro_Votacion()
    {
        $this->Establecer_Consultas();
        $nombre_centro = ($_POST['nombre_centro'] !== "") ? $_POST['nombre_centro'] : null;

        $cont=0;

        foreach ($this->centros_votacion as $cv) {
            if ($cv["nombre_centro"] == $nombre_centro) {
                $parroquia = $cv["id_parroquia"];
                $cont++;
            }
            
        }
        if($cont==0){$parroquia="vacio";}
        echo $parroquia;
        
    } 
    // =================================================

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inicio/index'); 
    }   
    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas(); 
        $this->vista->Cargar_Vistas('centro_votacion/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas(); 
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('centro_votacion/consultar');
    }

    // ==============================CRUD=====================================
    // public function Asignar_Centro_Votacion()
    // {
    //     $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
    //     $this->Establecer_Consultas();

    //     foreach ($this->centros_votacion as $key => $value) {
    //          if ($value["nombre_centro"] == $datos["nombre_centro"]) {
    //               $id_centro_votacion = $value["id_centro_votacion"];
    //          }
    //      } 
        
    //     if ($this->modelo->Registrar_Votantes(
    //         [
    //             'id_centro_votacion' => $id_centro_votacion,
    //             'cedula_votante' => $datos['cedula_persona'],
    //             'estado' => 1
    //         ]
    //     )
    //     ) {
    //         $this->mensaje = ' Registrada exitosamente!.';
    //         $this->Accion("El portador de la cedula ".$datos["cedula_persona"]." fue asignado \\exitosamente.");
    //     } else {
    //         $this->mensaje = 'Ha ocurrido un error.';
    //     }
    //     echo $this->mensaje;
    //     #header('location:' . constant('URL') . "Centro_Votacion/Consultas");
    //     exit();
    //     return false;
    // }

    // public function Nuevo_Centro_Votacion()
    // {
        
    //     if ($this->modelo->Registrar_Centro_Votacion(
    //         [
    //             'id_parroquia' => $_POST['id_parroquia'],
    //             'nombre_centro' => $_POST['nombre_centro'],
    //             'estado' => 1
    //         ]
    //     )
    //     ) {
    //         $this->mensaje = 1; 
    //     } else {
    //         $this->mensaje = 0;
    //     }

    //     echo $this->mensaje;
    //     exit();
    //     return false;
    // }


    public function Registrar_Asigar_Centro_Votacion()
    {
        
        $cont=0;
        $this->Establecer_Consultas();
       
        foreach ($this->centros_votacion as $cv) {
            if(strtolower($cv['nombre_centro'])==strtolower($_POST['nombre_centro'])){
           $this->modelo->Registrar_Votantes(
            [
                'id_centro_votacion' => $cv["id_centro_votacion"],
                'cedula_votante' => $_POST['cedula_persona'],
                'estado' => 1
            ]);
           $cont++;
           $this->mensaje =1;
            }else {
                $this->mensaje =0;
            }
        }

        if($cont==0){
            if($this->modelo->Registrar_Centro_Votacion(
            [
                'id_parroquia' => $_POST['id_parroquia'],
                'nombre_centro' => $_POST['nombre_centro'],
                'estado' => 1
            ]
            )){
                $id= $this->Ultimo_Ingresado("centros_votacion","id_centro_votacion");

                foreach ($id as $i) {
                    echo $this->modelo->Registrar_Votantes(
                    [
                        'id_centro_votacion' => $i['MAX(id_centro_votacion)'],
                        'cedula_votante' => $_POST['cedula_persona'],
                        'estado' => 1
                    ]);
                }
                $this->mensaje =1;
            }{
                $this->mensaje =0;
            }
        }

        echo $this->mensaje;
    }


    public function Editar_Asigar_Centro_Votacion()
    {
        
        $cont=0;
        $this->Establecer_Consultas();
       
        foreach ($this->centros_votacion as $cv) {
            if(strtolower($cv['nombre_centro'])==strtolower($_POST['nombre_centro'])){
           $this->modelo->Registrar_Votantes(
            [
                'id_centro_votacion' => $cv["id_centro_votacion"],
                'cedula_votante' => $_POST['cedula_persona'],
                'estado' => 1
            ]);
           $cont++;
            }
        }

        if($cont==0){
            if($this->modelo->Registrar_Centro_Votacion(
            [
                'id_parroquia' => $_POST['id_parroquia'],
                'nombre_centro' => $_POST['nombre_centro'],
                'estado' => 1
            ]
            )){
                $id= $this->Ultimo_Ingresado("centros_votacion","id_centro_votacion");

                foreach ($id as $i) {
                    echo $this->modelo->Actualizar_Votantes(
            [
                'id_votante_centro_votacion' => $_POST['id'],
                'id_centro_votacion' => $i['MAX(id_centro_votacion)'],
                'cedula_votante' => $_POST['cedula_persona'],
                'estado' => 1
            ]);
                }
            }
        }

        echo 1;

        return false;
        
    }

    public function Eliminar_Votantes() 
    {

        if ($this->Desactivar("votantes_centro_votacion","id_votante_centro_votacion",$_POST['id'])) { 
            $this->mensaje = 1;
            $this->Accion("Votante Portador de la Cedula: ".$_POST['cedula_persona']." Eliminado \\Exitosamente.");
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    } 

    public function Consultas_Parroquias() 
    {
        $this->Establecer_Consultas();

        foreach ($this->parroquias as $key => $value) {
            if ($value["nombre_parroquia"] == $_POST['id']) {
                $id = $value["id_parroquia"];
            }
        }
        
        echo  $id;
        
    } 
}
?> 