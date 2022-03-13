<?php

class Discapacitados extends Controlador
{
    public function __construct()
    {
        parent::__construct();
     //  $this->Cargar_Modelo("discapacitados");
    }


    public function Registros()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $discapacidades=$this->modelo->Consultar_discapacidades();
        $this->vista->discapacidades=$discapacidades;
        $this->vista->Cargar_Vistas('discapacitados/registrar');
    }

    public function Consultas()
    {
        $this->Seguridad_de_Session();

        $discapacidades=$this->modelo->Consultar_discapacidades();
        $this->vista->discapacidades=$discapacidades;
        $this->vista->Cargar_Vistas('discapacitados/consultar');
    }




    public function nuevas_discapacidades(){


     for($i=0;$i<count($_POST['discapacidades']);$i++){
       if($_POST['discapacidades'][$i]['nuevo']=='0'){
           echo $this->modelo->registrar_discapacidad_persona([
            "cedula_persona" => $_POST['cedula'],
            "id_discapacidad"  => $_POST['discapacidades'][$i]['discapacidad'],
            "necesidades"   => $_POST['discapacidades'][$i]['necesidades'],
            "observaciones" => $_POST['discapacidades'][$i]['observaciones'],
            "en_cama"  =>$_POST['discapacidades'][$i]['en_cama']
        ]);
       }

       else{
        if($this->Registrar_Tablas("discapacidad","nombre_discapacidad",$_POST['discapacidades'][$i]['discapacidad'])){

            $id=$this->Ultimo_Ingresado("discapacidad","id_discapacidad");

            foreach ($id as $id_e) {
                echo $this->modelo->registrar_discapacidad_persona([
                    "cedula_persona" => $_POST['cedula'],
                    "id_discapacidad"  => $id_e['MAX(id_discapacidad)'],
                    "necesidades"   => $_POST['discapacidades'][$i]['necesidades'],
                    "observaciones" => $_POST['discapacidades'][$i]['observaciones'],
                    "en_cama"  =>$_POST['discapacidades'][$i]['en_cama']
                ]);
            }

        }

    }
}



}


public function consultar_info_discapacitados(){
     $discapacitados=$this->modelo->get_discapacitados();
     $discapacidades=$this->modelo->get_discapacidades();
     $retornar=[];

     foreach ($discapacitados as $d) { 

        $discapacidades_p='<table style="width:100%">';
        $id_discapacidad_p=[];
        
         foreach ($discapacidades as $dis) {
            if($dis['cedula_persona']==$d['cedula_persona']){
                
                $en_cama_valor="";

                $dis['en_cama']=='1'?$en_cama_valor='Si':$en_cama_valor='No';



                $discapacidades_p.="<tr><td>".$dis['nombre_discapacidad']."</td><td>".$en_cama_valor."</td><td>".$dis['necesidades_discapacidad']."</td><td>".$dis['observacion_discapacidad']."</td></tr>";
                $id_discapacidad_p[]=$dis['id_discapacidad_persona']."/";
            }
         }


         $discapacidades_p="<div style='overflow-y:scroll;width:100%;height:100px;background:#B4DFDE;'>".$discapacidades_p."</div></table>";
 


         $retornar[]=[
                "cedula" => $d['cedula_persona'],
                "nombre" => $d['primer_nombre']." ".$d['primer_apellido'],
                "discapacidades" => $discapacidades_p,
                "editar" => "<button type='button' class='btn btn-success editar' onclick='editar(`".$d['cedula_persona']."`)' data-toggle='modal' data-target='#actualizar'><em class='fa fa-edit'></em></button>", 
                "eliminar" =>"<button class='btn btn-danger' onclick='eliminar(`".json_encode($id_discapacidad_p)."`)' type='button'><em class='fa fa-trash'></em></button>"
         ];
     }

      


     $this->Escribir_JSON($retornar);
}


public function eliminar_logica(){
  echo $this->Eliminar_Tablas("discapacidad_persona","id_discapacidad_persona",$_POST['id']);
}

public function consultar_discapacitados_datos(){
     
     $discapacidades=$this->modelo->get_discapacidades_persona($_POST['cedula']);
    

     $this->Escribir_JSON($discapacidades);
}

public function eliminar_discapacidad(){
  $retornar=0;
  
  if($this->Eliminar_Tablas("discapacidad_persona","id_discapacidad_persona",$_POST['id_discapacidad_persona'])){
    $discapacidades=$this->Consultar_Columna("discapacidad_persona","cedula_persona",$_POST['cedula_persona']);
    if(count($discapacidades)!=0){
      $retornar=[];
      for($i=0;$i<count($discapacidades);$i++){
         $enfer=$this->Consultar_Columna("discapacidades","id_enfermedad",$discapacidades[$i]['id_enfermedad']);
         $retornar[]=[
           "nombre_discapacidad"=>$enfer[0]['nombre_discapacidad'],
           "id_discapacidad_persona"=>$discapacidades[$i]['id_discapacidad_persona']
         ];
      }
    }
  }

  echo json_encode($retornar);

}


}

?> 