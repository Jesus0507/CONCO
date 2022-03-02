<?php

class Personas extends Controlador 
{
  public function __construct()
  {
    parent::__construct();
   //     $this->Cargar_Modelo("personas");
  }

  public function Cargar_Vistas()
  {
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('personas/index'); 
  }   

  public function Establecer_Consultas()
  {
    $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");

    $vacunas =  $this->Consultar_Tabla("vacuna_covid", 1, "id_vacuna_covid");
    $perso_vacuna = $this->modelo->Consultar_Vacuna(); 

    $this->vista->personas = $personas; 
    $this->personas = $personas; 

    $this->vista->vacunas = $vacunas; 
    $this->vacunas = $vacunas; 

    $this->vista->perso_vacuna = $perso_vacuna; 
    $this->perso_vacuna = $perso_vacuna; 
  }

  public function Asignar_Vacunas()
  {
    $dosis = ($_POST['dosis'] !== "") ? $_POST['dosis'] : null;
    $fecha = ($_POST['fecha'] !== "") ? $_POST['fecha'] : null;

    for ($i = 0; $i < count($fecha); $i++) {
      if ($this->modelo->Registrar_Vacuna(
        [
          'cedula_persona' => $_POST['cedula_persona'],
          'dosis' => $dosis[$i],
          'fecha_vacuna' => $fecha[$i],
          'estado' => 1,
        ]
      )
    ) {

        $this->mensaje = 'Vacuna Registrada exitosamente!.';
      } else {
        $this->mensaje = $this->ERROR();
      }
    }
    $this->Accion($this->mensaje);
    header('location:' . constant('URL') . "Personas/Vacunados");

    return false;
  }
  public function Consultas_Vacunas_Ajax()
  {
    $this->Establecer_Consultas();

    foreach ($this->perso_vacuna as $persona) {

      $dosis="";
      $fecha="";
      foreach ($this->vacunas as $key => $vacunado) {
       if ($persona["cedula_persona"] == $vacunado["cedula_persona"]) {
        $dosis .= $vacunado["dosis"]."</br>";

        $fecha .= $vacunado["fecha_vacuna"]."</br>";
      }
    }

    $datos[] = [
      "cedula_persona" => $persona["cedula_persona"],
      "nombre_apellido" => $persona["primer_nombre"]." ".$persona["primer_apellido"],
      "dosis" => $dosis,
      "fecha_vacuna" => $fecha,
    ];
  }

  $this->Escribir_JSON($datos);
}

public function Eliminar_Vacunados() 
{

  if ($this->Desactivar("vacuna_covid","cedula_persona",$_POST['cedula_persona'])) { 
    $this->mensaje = 'Vacunado Eliminado Exitosamente';
    $this->Accion("Vacunado: ".$_POST['cedula_persona']." Eliminado Exitosamente.");
  } else {
    $this->mensaje = 0;
  }
  echo $this->mensaje;
  return false;
} 

public function Vacuna()
{
 $this->Establecer_Consultas(); 
 $this->Seguridad_de_Session();
 $this->vista->Cargar_Vistas('vacuna/registrar');
}

public function Vacunados()
{
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('vacuna/consultar');
}
// ==============================VISTAS=====================================
public function Personas()
{
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/index'); 
}  

public function consulta_vacunado(){
  $this->Establecer_Consultas(); 
  $existe=true;
  foreach($this->vacunas as $v){
    if($v['cedula_persona']==$_POST['cedula']){
      $existe=false;
    }
  }

  echo $existe;
}

public function Registros()
{
  $this->Seguridad_de_Session();
  $this->vista->transportes=$this->modelo->get_transportes();
  $this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  //      $this->vista->centros_votacion=$this->modelo->get_centros();
  //      $this->vista->parroquias=$this->modelo->get_parroquias();
  $this->vista->bonos=$this->modelo->get_bonos();
  //      $this->vista->enfermedades=$this->modelo->get_enfermedades();
  //      $this->vista->discapacidades=$this->modelo->get_discapacidad();
  $this->vista->misiones=$this->modelo->get_misiones();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->proyectos=$this->modelo->get_proyectos();
  $this->vista->Cargar_Vistas('personas/registrar');
}

public function Registros_habitante()
{
  $this->Seguridad_de_Session();
  $this->vista->transportes=$this->modelo->get_transportes();
  $this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  //      $this->vista->centros_votacion=$this->modelo->get_centros();
  //      $this->vista->parroquias=$this->modelo->get_parroquias();
  $this->vista->bonos=$this->modelo->get_bonos();
  //      $this->vista->enfermedades=$this->modelo->get_enfermedades();
  //      $this->vista->discapacidades=$this->modelo->get_discapacidad();
  $this->vista->misiones=$this->modelo->get_misiones();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->proyectos=$this->modelo->get_proyectos();
  $this->vista->Cargar_Vistas('habitante/registrar_personas');
}

public function Consultas()
{
  /* $this->Establecer_Consultas(); */
  $this->vista->transportes=$this->modelo->get_transportes();
  $this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/consultar');
}

public function consultar_informacion_persona(){
  $info_completa=[];
  $personas=$this->modelo->Consultar();
  
  foreach ($personas as $p) {
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($p['cedula_persona']));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($p['cedula_persona']));
   $transporte=json_encode($this->modelo->get_transporte_persona($p['cedula_persona']));
   $bonos=json_encode($this->modelo->get_bonos_persona($p['cedula_persona']));
   $misiones=json_encode($this->modelo->get_misiones_persona($p['cedula_persona']));
   $proyectos=json_encode($this->modelo->get_proyectos_persona($p['cedula_persona']));
   $comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($p['cedula_persona']));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($p['cedula_persona']));
   $persona=json_encode($p);
   $p['genero']=='M'?$genero="Masculino":$genero='Femenino';

   $info_completa[]=[
    "cedula"    =>    $p['cedula_persona'],
    "primer_nombre"  =>$p['primer_nombre'],
    "primer_apellido" =>$p['primer_apellido'],
    "telefono"        =>$p['telefono'],
    "genero"          =>$genero,
    "ver"             =>"<button class='btn btn-primary' type='button' title='Ver información de la persona' onclick='ver_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$proyectos."`,`".$comunidad_i."`,`".$org_politica."`)'><span class='fa fa-eye'></span></button>",

    "editar"             =>"<button class='btn btn-success' type='button' title='Editar información de la persona' onclick='editar_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$proyectos."`,`".$comunidad_i."`,`".$org_politica."`)'><span class='fa fa-edit'></span></button>",

    "eliminar"             => "<button class='btn btn-danger' type='button' title='Eliminar persona' onclick='eliminar_datos(`".$p['cedula_persona']."`)'><span class='fa fa-trash'></span></button>",
  ];


}

$this->Escribir_JSON($info_completa);
}

public function Consultas_cedula()
{

 $persona=$this->modelo->Buscar_Persona($_POST['cedula']);

 if(count($persona)==0){
   echo 0;
 }
 else{
   $this->Escribir_JSON($persona);
 }

}

public function Consultas_cedulaV2()
{

 $persona=$this->Consultar_Columna("personas","cedula_persona",$_POST['cedula']);

 if(count($persona)==0){
   echo 0;
 }
 else{
  if($persona[0]['estado'] == 0){
    echo 2;
  }
  else{
    echo 1;
  }
 }

}

public function Consultas_cedulaV3()
{

 $persona=$this->Consultar_Columna("personas","cedula_persona",$_POST['cedula']);

 if(count($persona)==0){
   echo 0;
 }
 else{
  if($persona[0]['estado'] == 0){
    echo 2;
  }
  else{
    echo json_encode($persona);
  }
 }

}

public function Administracion()
{
  $this->Establecer_Consultas();
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/administrar');
}


public function registrar_persona(){

  $datos=$_POST['datos'];
  $datos['contrasenia']=$this->Codificar($datos['contrasenia']);
  $datos['preguntas_seguridad']=$this->Codificar($datos['preguntas_seguridad']);
  $datos['estado']=1;
  echo $this->modelo->Registrar($datos);

      // echo json_encode($datos);


}

public function registrar_persona_habitante(){

  $datos=$_POST['datos'];
  $datos['contrasenia']=$this->Codificar($datos['contrasenia']);
  $datos['preguntas_seguridad']=$this->Codificar($datos['preguntas_seguridad']);
  $datos['estado']=2;
  echo $this->modelo->Registrar($datos);

      // echo json_encode($datos);


}

public function registrar_transporte(){

  $datos=[
    "cedula_propietario" =>  $_POST['cedula_propietario'],
    "descripcion_transporte" =>$_POST['descripcion_transporte']
  ];

  $this->modelo->Registrar_transporte($datos);



}

public function registrar_ocupacion(){

  $ocupaciones=$this->modelo->get_ocupaciones();
  $cont=0;

  $ocupacion_dato=$_POST['ocupacion'];

  if($ocupacion_dato['nueva']=='0'){
   $this->modelo->Registrar_persona_ocupacion([
    "cedula_persona"   =>     $_POST['cedula_persona'],
    "id_ocupacion"     =>     $ocupacion_dato['ocupacion']
  ]);
 }
 else{

  if($this->Registrar_Tablas("ocupacion","nombre_ocupacion",$ocupacion_dato['ocupacion'])){
    $id=$this->Ultimo_Ingresado("ocupacion","id_ocupacion");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_ocupacion([
        "cedula_persona"   =>     $_POST['cedula_persona'],
        "id_ocupacion"     =>     $i['MAX(id_ocupacion)']
      ]);
    }
  }

}

}


public function registrar_condicion_laboral(){
  $datos=$_POST['datos'];
  if($this->modelo->Registrar_cond_laboral($datos)){
    echo 1;
  }
}

public function registrar_comunidad_indigena(){
 $comunidades=$this->modelo->get_comunidades();
 $datos=$_POST['datos'];
 $cont=0;

 foreach ($comunidades as $c) {
   if(strtolower($c['nombre_comunidad'])==strtolower($datos['comunidad'])){
     $this->modelo->Registrar_persona_comunidad([
      "cedula_persona"   =>     $datos['cedula_persona'],
      "id_comunidad_indigena"     =>     $c['id_comunidad_indigena']
    ]);

     $cont++;
   }
 }


 if($cont==0){


  if($this->Registrar_Tablas("comunidad_indigena","nombre_comunidad",$datos['comunidad'])){
    $id=$this->Ultimo_Ingresado("comunidad_indigena","id_comunidad_indigena");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_comunidad([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_comunidad_indigena"     =>     $i['MAX(id_comunidad_indigena)']
      ]);
    }



  }
}

}


public function registrar_org_politica(){
 $organizaciones=$this->modelo->get_organizaciones();
 $datos=$_POST['datos'];


 if($datos['nuevo']=='0'){
   $this->modelo->Registrar_persona_organizacion([
    "cedula_persona"   =>     $datos['cedula_persona'],
    "id_org_politica"     =>     $datos['organizacion']
  ]);

 }

 else{
  if($this->Registrar_Tablas("org_politica","nombre_org",$datos['organizacion'])){
    $id=$this->Ultimo_Ingresado("org_politica","id_org_politica");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_organizacion([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_org_politica"     =>     $i['MAX(id_org_politica)']
      ]);
    }


  }
}








}



public function registrar_bonos(){
 $bonos=$this->modelo->get_bonos();
 $datos=$_POST['datos'];


 if($datos['bono']['nuevo']=='0'){
   $this->modelo->Registrar_persona_bono([
    "cedula_persona"   =>     $datos['cedula_persona'],
    "id_bono"     =>     $datos['bono']['bono']
  ]);

 }

 else{

  if($this->Registrar_Tablas("bonos","nombre_bono",$datos['bono']['bono'])){
    $id=$this->Ultimo_Ingresado("bonos","id_bono");

    foreach ($id as $i) {
      echo  $this->modelo->Registrar_persona_bono([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_bono"     =>     $i['MAX(id_bono)']
      ]);
    }
  }
}

}



public function registrar_proyectos(){
 $proyectos=$this->modelo->get_proyectos();
 $datos=$_POST['datos'];
 $cont=0;

 foreach ($proyectos as $pro) {
   if($pro['id_proyecto']==$datos['proyecto']){
     $this->modelo->Registrar_persona_proyecto([
      "cedula_persona"   =>   $datos['cedula_persona'],
      "id_proyecto"     =>     $pro['id_proyecto']
    ]);

     $cont++;
   }
 }


 if($cont==0){


  if($this->modelo->Registrar_proyecto($datos['proyecto'])){
    $id=$this->Ultimo_Ingresado("proyecto","id_proyecto");

    foreach ($id as $i) {
      echo  $this->modelo->Registrar_persona_proyecto([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_proyecto"     =>     $i['MAX(id_proyecto)']
      ]);
    }



  }
}

}

public function registrar_carnet(){

  echo $this->modelo->registrar_carnet([
    "cedula_persona"   =>  $_POST['cedula'],
    "serial_carnet"    =>  $_POST['carnet']['serial'],
    "codigo_carnet"    =>  $_POST['carnet']['codigo'],
    "tipo_carnet"      =>  $_POST['tipo']
  ]);


}


public function registrar_misiones(){
 $misiones=$this->modelo->get_misiones();
 $datos=$_POST['datos'];



 if($datos['mision']['nuevo']=='0'){
   $this->modelo->Registrar_persona_mision([
    "cedula_persona"   =>   $datos['cedula_persona'],
    "id_mision"     =>     $datos['mision']['nombre_mision'],
    "recibe_actualmente"  =>  $datos['mision']['recibe_actualmente'],
    "fecha"              =>  $datos['mision']['fecha']
  ]);

 }
 else{

  if($this->Registrar_Tablas("misiones","nombre_mision",$datos['mision']['nombre_mision'])){
    $id=$this->Ultimo_Ingresado("misiones","id_mision");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_mision([
        "cedula_persona"   =>   $datos['cedula_persona'],
        "id_mision"     =>     $i['MAX(id_mision)'],
        "recibe_actualmente"  =>  $datos['mision']['recibe_actualmente'],
        "fecha"              =>  $datos['mision']['fecha']
      ]);
    }



  }

}







}


public function eliminacion_logica(){

  $cedula=$_POST['cedula_persona'];

  if($this->Desactivar("personas","cedula_persona",$cedula)){
    echo 1;
  }



}


public function get_serial_carnet(){
  $serial=$_POST['serial_carnet'];
  $tipo=$_POST['tipo_carnet'];


  $result=$this->modelo->get_serial_carnet($serial,$tipo);


  echo count($result);
}


public function get_codigo_carnet(){
  $codigo=$_POST['codigo_carnet'];
  $tipo=$_POST['tipo_carnet'];


  $result=$this->modelo->get_codigo_carnet($codigo,$tipo);


  echo count($result);
}


public function get_info_habitante(){
  $cedula=$_POST['cedula_persona'];
  $info_completa=[];
  $personas=$this->modelo->Consultar();
  
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($cedula));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($cedula));
   $transporte=json_encode($this->modelo->get_transporte_persona($cedula));
   $bonos=json_encode($this->modelo->get_bonos_persona($cedula));
   $misiones=json_encode($this->modelo->get_misiones_persona($cedula));
   $proyectos=json_encode($this->modelo->get_proyectos_persona($cedula));
   $comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($cedula));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($cedula));
   
  echo  json_encode([
                   "ocupacion"=>$ocupacion,    
                   "condicion_lab"=>$condicion_lab,    
                   "transporte"=>$transporte,    
                   "bonos"=>$bonos,    
                   "misiones"=>$misiones,    
                   "proyectos"=>$proyectos,    
                   "comunidad_i"=>$comunidad_i,      
                   "org_politica"=>$org_politica         
  ]);



}


public function modificar_persona(){
  $datos_persona=$_POST["datos_persona"];
  $editado=$this->modelo->Actualizar($datos_persona);

  if($editado){
  $this->editar_comunidad_indigena($datos_persona);
  $this->editar_ocupacion($datos_persona);
  }
}






public function editar_comunidad_indigena($datos_persona){
  $comunidades_persona=$this->Consultar_Columna("comunidad_indigena_personas","cedula_persona",$datos_persona['cedula_persona']);
   
  if($datos_persona['comunidad_indigena']=='No posee'){
       if(count($comunidades_persona)!=0){
          foreach($comunidades_persona as $cp){
            $this->Eliminar_Tablas("comunidad_indigena_personas","id_comunidad_persona",$cp['id_comunidad_persona']);
          }
       } 
  }
  else{
    $comunidades_indigenas=$this->Consultar_Tabla("comunidad_indigena",1,"id_comunidad_indigena");
    $existe=false;
    foreach($comunidades_indigenas as $ci){
      if(strtolower($ci['nombre_comunidad'])==strtolower($datos_persona['comunidad_indigena'])){
        $existe=$ci['id_comunidad_indigena'];
      }
    }

    if($existe==false){
      $this->Registrar_Tablas("comunidad_indigena","nombre_comunidad",$datos_persona['comunidad_indigena']);
      $id=$this->Ultimo_Ingresado("comunidad_indigena","id_comunidad_indigena");
      $id=$id[0]['MAX(id_comunidad_indigena)'];
      $existe=$id;
    }

     if(count($comunidades_persona)==0){
       $this->modelo->Registrar_persona_comunidad([
                  "cedula_persona"         =>$datos_persona['cedula_persona'],
                  "id_comunidad_indigena"  =>$existe
       ]);
     }
     else{
       $this->Actualizar_Tablas("comunidad_indigena_personas","id_comunidad_indigena","id_comunidad_persona",$existe,$comunidades_persona[0]['id_comunidad_persona']);
     }


  }
}


public function editar_ocupacion($datos_persona){
  $ocupacion_persona=$this->Consultar_Columna("ocupacion_persona","cedula_persona",$datos_persona['cedula_persona']);
  if($datos_persona['ocupacion']=='No posee'){
    if(count($ocupacion_persona)!=0){
       foreach($ocupacion_persona as $op){
         $this->Eliminar_Tablas("ocupacion_persona","id_ocupacion_persona",$op['id_ocupacion_persona']);
       }
    } 
}
else{
  $ocupaciones=$this->Consultar_Tabla("ocupacion",1,"id_ocupacion");
  $existe=false;
  foreach($ocupaciones as $o){
    if($o['id_ocupacion']==$datos_persona['ocupacion']){
      $existe=$o['id_ocupacion'];
    }
  }

  if($existe==false){
    $this->Registrar_Tablas("ocupacion","nombre_ocupacion",$datos_persona['ocupacion']);
    $id=$this->Ultimo_Ingresado("ocupacion","id_ocupacion");
    $id=$id[0]['MAX(id_ocupacion)'];
    $existe=$id;
  }

   if(count($ocupacion_persona)==0){
     $this->modelo->Registrar_persona_ocupacion([
                "cedula_persona"         =>$datos_persona['cedula_persona'],
                "id_ocupacion"  =>$existe
     ]);
   }
   else{
     $this->Actualizar_Tablas("ocupacion_persona","id_ocupacion","id_ocupacion_persona",$existe,$ocupacion_persona[0]['id_ocupacion_persona']);
   }


}
}

}
