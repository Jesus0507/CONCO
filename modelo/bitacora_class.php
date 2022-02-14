<?php

class Bitacora_Class extends Modelo
{

    private $id_bitacora; 
    private $cedula;
    private $fecha;
    private $dia;
    private $hora_inicio;
    private $acciones;
    private $hora_fin; 

    public function __construct() 
    {
        parent::__construct();
    }
    public function set_Inicio_Sesion($cedula, $fecha, $dia, $hora_inicio, $acciones, $hora_fin)
    {

        $this->cedula       = $cedula;
        $this->fecha        = $fecha;
        $this->dia          = $dia;
        $this->hora_inicio  = $hora_inicio;
        $this->acciones     = $acciones;
        $this->hora_fin  = $hora_fin; 
    }

    public function Consultar_Bitacora() 
    {

        $tabla = "SELECT B.*,P.* FROM bitacoras B, personas P WHERE P.cedula_persona = B.cedula_usuario";

        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }



    public function Registro_De_Inicio($data)
    { 

        $sql     = 'INSERT INTO bitacoras (cedula_usuario, fecha, dia, hora_inicio, acciones, hora_fin) VALUES (:cedula_usuario, :fecha, :dia, :hora_inicio, :acciones, :hora_fin)'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'cedula_usuario'          => $data['cedula_usuario'],
                'fecha'           => $data['fecha'],
                'dia'             => $data['dia'],
                'hora_inicio'     => $data['hora_inicio'],
                'acciones'        => $data['acciones'],
                'hora_fin'       => $data['hora_fin'],
             ]);

            return true;

        } catch (PDOExection $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }

    public function Registro_De_Salida($data)
    { 

        $sql     = 'UPDATE bitacoras SET hora_fin =:hora_fin WHERE id_bitacora = :id_bitacora'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'hora_fin'     => $data['hora_fin'],
                'id_bitacora'     => $data['id_bitacora'],
             ]);

            return true;

        } catch (PDOExection $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }

        public function Nueva_Accion($data) 
    { 

        $sql     = 'UPDATE bitacoras SET acciones =:acciones WHERE id_bitacora = :id_bitacora'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'acciones'     => $data['acciones'],
                'id_bitacora'     => $data['id_bitacora'],
             ]);

            return true;

        } catch (PDOExection $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }



    public function Consultar_Bitacora_ID($id) 
    {

        $tabla = "SELECT * FROM bitacoras WHERE id_bitacora=$id";

        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    } 

}
?>