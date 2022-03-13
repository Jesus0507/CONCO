<?php

class Discapacitados_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }





    public function Consultar_personas()
    {

        $tabla            = "SELECT * FROM personas WHERE estado=1";
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

    public function Consultar_discapacidades()
    {

        $tabla            = "SELECT * FROM discapacidad WHERE estado=1";
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


    public function get_discapacitados()
    {

        $tabla            = "SELECT DISTINCT DP.cedula_persona, P.* FROM discapacidad_persona DP, personas P WHERE DP.cedula_persona=P.cedula_persona AND P.estado=1";
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

    public function get_discapacidades()
    {

        $tabla            = "SELECT D.*,DP.* FROM discapacidad D, discapacidad_persona DP WHERE DP.id_discapacidad=D.id_discapacidad AND D.estado=1";
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


    public function get_discapacidades_persona($cedula)
    {

        $tabla            = "SELECT D.*,DP.* FROM discapacidad D, discapacidad_persona DP WHERE  DP.id_discapacidad=D.id_discapacidad AND D.estado=1 AND DP.cedula_persona= $cedula";
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




    public function registrar_discapacidad_persona($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO discapacidad_persona (
                cedula_persona,
                id_discapacidad,
                necesidades_discapacidad,
                observacion_discapacidad,
                en_cama 
                ) VALUES (
                :cedula_persona,
                :id_discapacidad,
                :necesidades_discapacidad,
                :observacion_discapacidad,
                :en_cama  
            )');

            $datos->execute([
                'cedula_persona'             => $data["cedula_persona"],
                'id_discapacidad'            => $data["id_discapacidad"],
                'necesidades_discapacidad'   => $data["necesidades"],
                'observacion_discapacidad'   => $data["observaciones"],
                'en_cama'                    => $data["en_cama"]
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return $this->error;
        }
    }


}
?>