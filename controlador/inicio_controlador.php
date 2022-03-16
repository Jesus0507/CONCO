<?php

class Inicio extends Controlador 
{ 
    public function __construct()
    {
        parent::__construct();
      //  $this->Cargar_Modelo("inicio");
    }

    public function Establecer_Consultas() 
    {
        $viviendas = $this->Consultar_Tabla("vivienda", 1, "id_vivienda");
        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");
        $calles = $this->Consultar_Tabla("calles", 1, "nombre_calle"); 
        $miembros_consejo=$this->Consultar_Tabla_sin_estado("comite_persona",1,"cedula_persona");

        $adulto_mayor=0;
        $menores_edad=0;
        $votantes=0;
        
        foreach($personas as $p){
            $anio = explode('-', $p["fecha_nacimiento"]);
            $edad = date("Y") - $anio[0];

            $centro_votante=$this->Consultar_Columna("votantes_centro_votacion","cedula_votante",$p['cedula_persona']);

            if ($edad <= 17) {
                $menores_edad++;
            }

            if ($edad > 55) {
                $adulto_mayor++;
            }

            if(count($centro_votante)!=0){
                $votantes++;
            }

        }

        $this->vista->viviendas = $viviendas;
        $this->viviendas = $viviendas; 
        
        $this->vista->personas = $personas;
        $this->personas = $personas; 

        $this->vista->calles = $calles;
        $this->calles = $calles; 

        $cantidad_viviendas = count($viviendas);
        $cantidad_personas = count($personas);
        $cantidad_calles = count($calles);
        $cantidad_miembros=count($miembros_consejo);

        $this->vista->cantidad_viviendas = $cantidad_viviendas;
        $this->vista->cantidad_personas = $cantidad_personas;
        $this->vista->cantidad_calles = $cantidad_calles;
        $this->vista->cantidad_miembros=$cantidad_miembros;
        $this->vista->menores_edad=$menores_edad;
        $this->vista->adulto_mayor=$adulto_mayor;
        $this->vista->votantes=$votantes;
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('inicio/index'); 
    }   

    public function Inicio()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('inicio/index'); 
    }  

}
?> 