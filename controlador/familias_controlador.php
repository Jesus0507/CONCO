<?php

class Familias extends Controlador
{
    public function __construct()
    {
        parent::__construct();
     //   $this->Cargar_Modelo("familias");
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('familia/index'); 
    }   
    public function Familia()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('familia/index'); 
    }  

    public function Registros()
    {
        $this->Seguridad_de_Session();
        $viviendas=$this->modelo->Consultar_viviendas();
        $this->vista->viviendas=$viviendas;
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $this->vista->Cargar_Vistas('familia/registrar');
    }

    public function Consultas()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('familia/consultar');
    }

    public function Administracion()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('familia/administrar');
    }



    public function registrar_familia(){
        $datos_familia=$_POST['datos'];

        $resultado= $this->modelo->Registrar_Familia($datos_familia);
        
        if($resultado){
           $id=$this->Ultimo_Ingresado("familia","id_familia");
           foreach ($id as  $i) {
            foreach ($datos_familia['integrantes'] as $inte) {
             $this->modelo->Registrar_persona_familia([
                "cedula_persona"         =>  $inte,
                "id_familia"            =>   $i['MAX(id_familia)']
            ]);
         }
     }
 }
echo $resultado;

}


public function consultar_info_familia(){
     $familias=$this->modelo->get_familias();
     $retornar=[];

     foreach ($familias as $f) {
        
        $integrantes=$this->modelo->get_integrantes($f['id_familia']);
 


         $retornar[]=[
                "familia" => $f['nombre_familia'],
                "telefono" => $f['telefono_familia'],
                "direccion" => $f['direccion_vivienda'],
                "Nro Casa" => $f['numero_casa'],
                "ingreso_mensual"=> $f['ingreso_mensual_aprox'],
                "ver"  => "<button class='btn btn-primary' onclick='ver_familia(`".json_encode($integrantes)."`,`".$f['nombre_familia']."`,`".$f['telefono_familia']."`,`".$f['direccion_vivienda']."`,`".$f['numero_casa']."`,`".$f['ingreso_mensual_aprox']."`)' type='button'><em class='fa fa-eye'></em></button>",
                "editar" => "<button type='button' class='btn btn-success'><em class='fa fa-edit'></em></button>",
                "eliminar" =>"<button class='btn btn-danger' onclick='eliminar(`".$f['id_familia']."`)' type='button'><em class='fa fa-trash'></em></button>"
         ];
     }

      


     $this->Escribir_JSON($retornar);
}


public function eliminar_logica(){
  echo $this->Desactivar("familia","id_familia",$_POST['id']);
}

public function eliminar_familia(){
    echo $this->Eliminar_Tablas("familia","id_familia",$_POST['id']);
  }

}

?> 