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

        $this->vista->viviendas = $viviendas;
        $this->viviendas = $viviendas; 
        
        $this->vista->personas = $personas;
        $this->personas = $personas; 

        $this->vista->calles = $calles;
        $this->calles = $calles; 

        $cantidad_viviendas = count($viviendas);
        $cantidad_personas = count($personas);
        $cantidad_calles = count($calles);

        $this->vista->cantidad_viviendas = $cantidad_viviendas;
        $this->vista->cantidad_personas = $cantidad_personas;
        $this->vista->cantidad_calles = $cantidad_calles;
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