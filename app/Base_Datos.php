<?php

ini_set("max_execution_time", "0");
error_reporting(E_ERROR);

use PDO as pdo;

class BASE_DATOS extends PDO 
{

    private $servidor = SERVIDOR;
    private $host    = HOST;
    private $bd      = BD;

    private $port_mysql     = PORT_MYSQL;
    private $user_mysql     = USER_MYSQL;
    private $password_mysql = PASSWORD_MYSQL;

    public $error_conexion;

    public function __construct()
   {
        $DNS = "{$this->servidor}:host={$this->host};dbname={$this->bd};";

        $opciones = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            #Reporte de errores (Lanza exceptions)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            #Establece el modo de recuperación predeterminado
            PDO::ATTR_PERSISTENT         => true,
            #utiliza conexiones persistentes
            PDO::ATTR_EMULATE_PREPARES   => false,
            #Habilita o deshabilita la emulación de declaraciones preparadas.
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'',
            #Comando a ejecutar cuando se conecta al servidor MySQL
        );

        try
        {
            $conexion = parent::__construct($DNS, $this->user_mysql, $this->password_mysql, $opciones);

            $this->error_conexion   = "No se han encontrado errores.";
            $this->comprobar        = 1;

            return $conexion;

        } catch (PDOException $e) 
        {
            $this->Establecer_Errores($e);
            return false;
        }
    }

    public function Probar_Conexion()
    {return $this->comprobar;}

    public function Error_Conexion()
    {return $this->error_conexion;}

    public function Establecer_Errores($e)
    {
        switch ($e->getCode()) {
                case '1049':
                    $tipo = "Acceso denegado,  Nombre de la Base de Datos Incorrecto.";
                    break;
                case '2002':
                    $tipo = "Acceso denegado,  Host desconocido o MSQL esta Apagado.";
                    break;
                case '1044':
                    $tipo = "Acceso denegado,  Usuario de MSQL Incorrecto.";
                    break;
                case '1045':
                    $tipo = "Acceso denegado,  Contraseña de MSQL Incorrecta.";
                    break;                
                default:
                    $tipo = "Sin Definicion.";
                    break;
            }

            $this->error_conexion = 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: </br>'.
            "[ Archivo ] => ".$e->getFile()."</br>".
            "[ Linea ]   => (".$e->getLine().")</br>".
            "[ Codigo ]   => (".$e->getCode().")</br>".
            "[ Tipo Error ]   => ".$tipo."</br>".
            "[ Error PHP]   => (".$e->getMessage().")</br>";
            $this->comprobar      = 0;
    }


}
?>