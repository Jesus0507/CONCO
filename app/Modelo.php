<?php
use BASE_DATOS as BASE_DATOS;
// =============MODELO==============
class Modelo 
{
    public function __construct()
    {
        $this->Conectar_BD();
    }
    public function Conectar_BD()
    {
        $this->conexion = new BASE_DATOS();
        return $this->conexion;
    }
    public function Desconectar_BD()
    {
        return $this->conexion->close();
    }
}
?>