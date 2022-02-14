<?php

class Login_Class extends Modelo
{

    public function __construct() 
    {
        parent::__construct();
    } 

    public function Usuario_Existe($cedula, $contrasenia)
    {

        try {
            $query = $this->conexion->prepare('SELECT * FROM usuario WHERE cedula = :cedula AND contrasenia = :contrasenia');
            $query->execute(['cedula' => $cedula, 'contrasenia' => $contrasenia]);

            return $query->rowCount();
        } catch (PDOException $e) {
            return false;
        }

    }

    public function Cerrar_Session()
    {
        session_unset();
        session_start();
        session_destroy();
        session_regenerate_id(true);
    }

}
?>