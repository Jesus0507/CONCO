<?php

class Grupos_Deportivos extends Controlador 
{ 
    public function __construct()
    {
        parent::__construct();
     //   $this->Cargar_Modelo("grupos_deportivos");
    } 

    public function Establecer_Consultas() 
    { 
        $deportes = $this->Consultar_Tabla("deportes", 1, "nombre_deporte");
        $grupos_deportivos = $this->modelo->Consultar();
        $integrantes = $this->modelo->Grupo_Deportivo_Persona();

        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");

        $this->vista->deportes = $deportes;
        $this->deportes = $deportes;

        $this->vista->grupos_deportivos = $grupos_deportivos;
        $this->grupos_deportivos = $grupos_deportivos;

        $this->vista->personas = $personas; 
        $this->personas = $personas; 

        $this->vista->integrantes = $integrantes; 
        $this->integrantes = $integrantes; 
    }

    public function Consultas_Grupo_Deportivo_Persona()
    {
        $this->Establecer_Consultas(); 
        
            foreach ($this->integrantes as $integrante) {
                if ($_POST["id"] == $integrante["id_grupo_deportivo"]) {
                    $integrantes[]= $integrante;
                }
            }
        
        $this->Escribir_JSON($integrantes);
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('grupos_deportivos/index'); 
    }   
    
    public function Registros()  
    {
        $this->Establecer_Consultas(); 
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('grupos_deportivos/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas(); 
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('grupos_deportivos/consultar');
    }

// ==============================CRUD=====================================

    public function Consultas_Deportes_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->deportes);
    }

    public function Consultas_Grupo_Deportivo_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->grupos_deportivos);
    }

    public function Nuevo_Grupo_Deportivo()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $this->Establecer_Consultas();

        foreach ($this->deportes as $key => $value) {
            if ($value["nombre_deporte"] == $datos[0]) {
                $id_deporte = $value["id_deporte"];
            }
        }
        if ($this->modelo->Registrar(
            [
                'id_deporte'      => $id_deporte,
                'nombre_grupo_deportivo'   => $datos[1],
                'descripcion'   => $datos[2],
                'estado'   => 1
            ]
        )
        ) {
            $this->mensaje = 'Grupo Deportivo Registrado exitosamente!.';
        } else {
            $this->mensaje = $this->ERROR();
        }
        
        echo  $this->mensaje;
        #header('location:' . constant('URL') . "Calles/Consultas");
        exit();
        return false;
    }

    public function Editar_Grupo_Deportivo()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $this->Establecer_Consultas();

        foreach ($this->deportes as $key => $value) {
            if ($value["nombre_deporte"] == $datos[1]) {
                $id_deporte = $value["id_deporte"];
            }
        }
        if ($this->modelo->Actualizar(
            [
                'id_grupo_deportivo'      => $datos[3],
                'id_deporte'      => $id_deporte,
                'nombre_grupo_deportivo'   => $datos[0],
                'descripcion'   => $datos[2],
                'estado'   => 1
            ]
        )
        ) {
            $this->mensaje = 'Grupo Deportivo Actualizado exitosamente!.';
        } else {
            $this->mensaje = $this->ERROR();
        }
        
        echo  $this->mensaje;
        #header('location:' . constant('URL') . "Calles/Consultas");
        exit();
        return false;
    }

    public function Registrar_Personas_Grupos()
    {
        $id= $this->Ultimo_Ingresado("grupo_deportivo","id_grupo_deportivo");

        foreach ($id as $key => $value) {
            $id_grupo_deportivo =$value["MAX(id_grupo_deportivo)"];
        }
        
         $cedula = ($_POST['cedula'] !== "") ? $_POST['cedula'] : null;
        
        for ($i=0; $i < count($cedula) ; $i++) { 

            if ($this->modelo->Registrar_Personas_Grupo_Deportivo(
            [
                'cedula_persona'      => $cedula[$i],
                'id_grupo_deportivo'   => $id_grupo_deportivo,
                'estado'   => 1
            ]
        )
        ) {
            $this->mensaje = 'Personas Grupo Deportivo Registrado exitosamente!.';
            } else {
            $this->mensaje = $this->ERROR();
            }
        }
        echo  $this->mensaje;   
        #header('location:' . constant('URL') . "Grupos_Deportivos/Consultas");
        
        exit();
        return false;
    }

    public function Eliminar_Grupo_Deportivo() 
    {

        if ($this->Desactivar("grupo_deportivo","id_grupo_deportivo",$_POST['id'])) { 
            $this->mensaje = 'Calle Eliminada Exitosamente';
            echo $this->Desactivar("personas_grupo_deportivo","id_grupo_deportivo",$_POST['id']);
            $this->Accion("Grupo Deportivo ".$_POST['nombre_grupo_deportivo']." Eliminado Exitosamente.");
        } else {
            $this->mensaje = $this->ERROR();
        }

        echo $this->mensaje;
        return false;
    } 
}
?> 