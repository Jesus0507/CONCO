<?php

class Enfermos_Class extends Modelo
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

    public function Consultar_enfermedades()
    {

        $tabla            = "SELECT * FROM enfermedades WHERE estado=1";
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


    public function get_enfermos()
    {

        $tabla            = "SELECT DISTINCT PE.cedula_persona, P.* FROM personas_enfermedades PE, personas P WHERE PE.cedula_persona=P.cedula_persona AND P.estado=1";
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

    public function get_enfermedades()
    {

        $tabla            = "SELECT E.*,PE.cedula_persona,PE.medicamentos, PE.id_persona_enfermedad FROM enfermedades E, personas_enfermedades PE WHERE PE.id_enfermedad=E.id_enfermedad AND E.estado=1";
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




    public function registrar_enfermedad_persona($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas_enfermedades (
                cedula_persona,
                id_enfermedad,
                medicamentos       
                ) VALUES (
                :cedula_persona,
                :id_enfermedad,
                :medicamentos  
            )');

            $datos->execute([
                'cedula_persona' =>  $data['cedula_persona'],
                'id_enfermedad'  =>  $data['id_enfermedad'],
                'medicamentos'   =>  $data['medicamentos']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }


}
?>