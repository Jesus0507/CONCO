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
         $resultado = $this->modelo->Actualizar(
            [
                'id_grupo_deportivo'      => $datos[3],
                'id_deporte'      => $id_deporte,
                'nombre_grupo_deportivo'   => $datos[0],
                'descripcion'   => $datos[2],
                'estado'   => 1
            ]
            );

            if($resultado){
                $id=$this->Ultimo_Ingresado("grupo_deportivo","id_grupo_deportivo");
                foreach ($id as  $i) {
                 foreach ($datos[4] as $inte) {
                  $this->modelo->Registrar_Personas_Grupo_Deportivo([
                     "cedula_persona"         =>  $inte,
                     "id_grupo_deportivo"            =>   $i['MAX(id_grupo_deportivo)'],
                     'estado'   => 1
                 ]);
              }
          }
      }
     echo $datos;
        
     
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

    public function consultar_grupos_datos(){
     
     $grupos_deportivos=$this->modelo->Consultar();
     $retornar=[];

     foreach ($grupos_deportivos as $gp) {
        
        if ($gp['id_grupo_deportivo'] == $_POST['id_grupo_deportivo']) {
            
            $integrantes=$this->modelo->Grupo_Deportivo_Persona_Datos($_POST['id_grupo_deportivo']);

         $retornar[]=[
                "id_grupo_deportivo" => $gp['id_grupo_deportivo'],
                "nombre_deporte" => $gp['nombre_deporte'],
                "nombre_grupo_deportivo" => $gp['nombre_grupo_deportivo'],
                "descripcion" => $gp['descripcion'],
                "integrantes"  => json_encode($integrantes),
         ];
        }
     }

      


     $this->Escribir_JSON($retornar);
}


public function add_integrante(){
    $id=$_POST['grupo_deportivo'];
    $integrantes=$this->Consultar_Columna("personas_grupo_deportivo","id_grupo_deportivo",$id);
    $retornar=1;
    $cedula=$_POST['cedula'];
    foreach($integrantes as $i){
        if($i['cedula_persona']==$cedula){
            $retornar=0;
        }
    }

    if($retornar==1){
        $this->modelo->Registrar_Personas_Grupo_Deportivo([
            "cedula_persona"         =>  $cedula,
            "id_grupo_deportivo"            =>   $id,
            'estado'   => 1
        ]);
    }

    echo $retornar;

}

public function get_integrantes(){
    $id=$_POST['id'];
    $integrantes=$this->Consultar_Columna("personas_grupo_deportivo","id_grupo_deportivo",$id);
    $result=[];
    foreach($integrantes as $i){
        $persona=$this->Consultar_Columna("personas","cedula_persona",$i['cedula_persona']);
        $result[]=$persona[0];
    }

    echo json_encode($result);
    
}

public function eliminar_integrantes(){
    $retornar=0;
    
    if($this->Eliminar_Tablas("personas_grupo_deportivo","cedula_persona",$_POST['cedula_persona'])){
      $integrantes=$this->Consultar_Columna("personas_grupo_deportivo","cedula_persona",$_POST['cedula_persona']);
      if(count($integrantes)!=0){
        $retornar=[];
        for($i=0;$i<count($integrantes);$i++){
  
           $retornar[]=[
             "cedula_persona"=>$integrantes[0]['cedula_persona'],
             "id_familia_persona"=>$integrantes[$i]['id_familia_persona']
           ];
        }
      }
    }
  
    echo json_encode($retornar);
  
  }
}
?> 