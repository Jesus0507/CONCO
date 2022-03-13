<?php

class Enfermos extends Controlador
{
    public function __construct()
    {
        parent::__construct();
     //   $this->Cargar_Modelo("enfermos");
    } 


    public function Registros()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $enfermedades=$this->modelo->Consultar_enfermedades();
        $this->vista->enfermedades=$enfermedades;
        $this->vista->Cargar_Vistas('enfermos/registrar');
    }

    public function Consultas()
    {
        $this->Seguridad_de_Session();
        $enfermedades=$this->modelo->Consultar_enfermedades();
        $this->vista->enfermedades=$enfermedades;
        $this->vista->Cargar_Vistas('enfermos/consultar');
    }




    public function nuevas_enfermedades(){

     for($i=0;$i<count($_POST['enfermedades']);$i++){
       if($_POST['enfermedades'][$i]['nuevo']=='0'){
           echo $this->modelo->registrar_enfermedad_persona([
            "cedula_persona" => $_POST['cedula'],
            "id_enfermedad"  => $_POST['enfermedades'][$i]['enfermedad'],
            "medicamentos"   => $_POST['enfermedades'][$i]['medicamentos']
        ]);
       }

       else{
        if($this->Registrar_Tablas("enfermedades","nombre_enfermedad",$_POST['enfermedades'][$i]['enfermedad'])){

            $id=$this->Ultimo_Ingresado("enfermedades","id_enfermedad");

            foreach ($id as $id_e) {
                echo $this->modelo->registrar_enfermedad_persona([
                    "cedula_persona" => $_POST['cedula'],
                    "id_enfermedad"  => $id_e['MAX(id_enfermedad)'],
                    "medicamentos"   => $_POST['enfermedades'][$i]['medicamentos']
                ]);
            }

        }

    }
}



}


public function consultar_info_enfermos(){
     $enfermos=$this->modelo->get_enfermos();
     $enfermedades=$this->modelo->get_enfermedades();
     $retornar=[];

     foreach ($enfermos as $e) {

        $enfermedades_p='';
        $medicamentos_p='';
        $id_enfermedad_p=[];
        
         foreach ($enfermedades as $en) {
            if($en['cedula_persona']==$e['cedula_persona']){
                $enfermedades_p.=$en['nombre_enfermedad']."<hr>";
                $medicamentos_p=$en['medicamentos'];
                $id_enfermedad_p[]=$en['id_persona_enfermedad']."/";
            }
         }


         $enfermedades_p="<div style='overflow-y:scroll;width:100%;height:100px;background:#B4DFDE;'>".$enfermedades_p."</div>";
 


         $retornar[]=[
                "cedula" => $e['cedula_persona'],
                "nombre" => $e['primer_nombre']." ".$e['primer_apellido'],
                "enfermedades" => $enfermedades_p,
                "medicamentos" => $medicamentos_p,
                "ver" => "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#ver_enfermos'><em class='fa fa-eye'></em></button>",
                "editar" => "<button type='button' class='btn btn-success editar' data-toggle='modal' data-target='#actualizar'  onclick='editar(`".$e['cedula_persona']."`)'><em class='fa fa-edit'></em></button>", 
                "eliminar" =>"<button class='btn btn-danger' onclick='eliminar(`".json_encode($id_enfermedad_p)."`)' type='button'><em class='fa fa-trash'></em></button>"
         ];
     }

      


     $this->Escribir_JSON($retornar);
}

public function consultar_enfermos_datos(){
     
     $enfermedades=$this->modelo->get_enfermedades_personas($_POST['cedula']);
    

     $this->Escribir_JSON($enfermedades);
}


public function eliminar_logica(){
  echo $this->Eliminar_Tablas("personas_enfermedades","id_persona_enfermedad",$_POST['id']);
}

public function eliminar_enfermedad(){
  $retornar=0;
  
  if($this->Eliminar_Tablas("personas_enfermedades","id_persona_enfermedad",$_POST['id_persona_enfermedad'])){
    $enfermedades=$this->Consultar_Columna("personas_enfermedades","cedula_persona",$_POST['cedula_persona']);
    if(count($enfermedades)!=0){
      $retornar=[];
      for($i=0;$i<count($enfermedades);$i++){
         $enfer=$this->Consultar_Columna("enfermedades","id_enfermedad",$enfermedades[$i]['id_enfermedad']);
         $retornar[]=[
           "nombre_enfermedad"=>$enfer[0]['nombre_enfermedad'],
           "id_persona_enfermedad"=>$enfermedades[$i]['id_persona_enfermedad']
         ];
      }
    }
  }

  echo json_encode($retornar);

}


}

?> 