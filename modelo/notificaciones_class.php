<?php

class Notificaciones_Class extends Modelo 
{

    public function __construct()
    {   
        parent::__construct();
    }

    public function Registrar($data)
    {

        $accion=$data['tipo_notificacion']."/".$_SESSION['nombre']." ".$_SESSION['apellido']." ".$data['accion'];

        try {
            $datos = $this->conexion->prepare('INSERT INTO notificaciones (
                usuario_emisor,
                usuario_receptor, 
                accion, 
                leido
                ) VALUES (
                :usuario_emisor,
                :usuario_receptor, 
                :accion, 
                :leido
                )');

            $datos->execute([
                'usuario_emisor'      => $_SESSION['cedula_usuario'],
                'usuario_receptor'      => $data['usuario_receptor'],
                'accion'      => $accion,
                'leido'     => 0
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }


    public function Consultar($cedula_receptor)
      {

        $tabla            = "SELECT * FROM notificaciones WHERE usuario_receptor = $cedula_receptor ORDER BY id_notificacion DESC";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }

    }


        public function get_receptores_1()
      {

        $tabla            = "SELECT * FROM personas  WHERE estado=1";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }

    }

      public function get_receptores_2()
      {

        $tabla            = "SELECT * FROM usuarios  WHERE estado=1";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }

    }

     public function setStatus($data)
    { 

        $sql     = 'UPDATE notificaciones SET leido =:leido WHERE id_notificacion = :id_notificacion'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'leido'     => $data['leido'],
                'id_notificacion'     => $data['id_notificacion'],
             ]);

            return true;

        } catch (PDOExection $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }



    public function Eliminar($param)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM notificaciones WHERE id_notificacion = :id_notificacion');
            $query->execute(['id_notificacion' => $param]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }
    //=======================================================================


}
?>