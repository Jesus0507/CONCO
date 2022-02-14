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
                "editar" => "<button type='button' class='btn btn-success'><em class='fa fa-edit'></em></button>",
                "eliminar" =>"<button class='btn btn-danger' onclick='eliminar(`".json_encode($id_enfermedad_p)."`)' type='button'><em class='fa fa-trash'></em></button>"
         ];
     }

      


     $this->Escribir_JSON($retornar);
}


public function eliminar_logica(){
  echo $this->Eliminar_Tablas("personas_enfermedades","id_persona_enfermedad",$_POST['id']);
}


}

?> 