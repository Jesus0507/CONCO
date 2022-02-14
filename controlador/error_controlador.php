<?php

class Errores extends Exception { 

    function __construct(){
        $this->vista = new Vista(); 
    }
    public function Error_403()
    {
        $this->vista->mensaje = "No posee los permisos para realizar esta accion.";
        $this->vista->Cargar_Vistas('error/403');
    }  
    public function Error_404($error)
    {
        $this->vista->mensaje = $error;
        $this->vista->Cargar_Vistas('error/404');
    }
    public function Error_409($error)
    {
        $this->vista->mensaje = $error;
        $this->vista->Cargar_Vistas('error/409');
    }
    public function Error_500($error)
    {
        $this->vista->mensaje = $error;
        $this->vista->Cargar_Vistas('error/500');
    }

    
    public function Error_Exception() {
        $error = '           <b> Error en la linea: </b>'
        .$this->getLine().'</br> <b> En el archivo :</b>'
        .$this->getFile() .'</br><b> Error: </b>'
        .$this->getMessage();
        return $error;
    }

    public function Error($error)
    {
        foreach ($error as $key => $value) {
            echo $value."</br>";
        }
    }
    
}
?>