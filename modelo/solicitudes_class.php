<?php

class Solicitudes_Class extends Modelo 
{

    public function __construct()
    {   
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO solicitudes (
                cedula_persona, 
                tipo_constancia, 
                procesada, 
                motivo_constancia,
                observaciones
                ) VALUES (
                :cedula_persona,
                :tipo_constancia, 
                :procesada, 
                :motivo_constancia,
                :observaciones
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'tipo_constancia'    => $data['tipo_constancia'],
                'procesada'      => 0,
                'motivo_constancia'     => $data['motivo_constancia'],
                'observaciones'    => $data['observaciones']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return $this->error;
        }
    }


    public function Consultar()
      {

        $tabla            = "SELECT S.*, P.* FROM solicitudes S, personas P WHERE S.procesada = 0 AND P.cedula_persona = S.cedula_persona AND P.estado=1";
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

    public function Consultar_all()
      {

        $tabla            = "SELECT S.*, P.* FROM solicitudes S, personas P WHERE  P.cedula_persona = S.cedula_persona AND P.estado=1";
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


    public function get_solicitud_vivienda($id)
      {

        $tabla  = "SELECT S.*, V.*, P.*, C.*, TV.*, SE.* FROM solicitudes S, personas P, vivienda V, calles C, tipo_vivienda TV, servicios SE 
        WHERE  P.cedula_persona = S.cedula_persona AND S.id_solicitud='$id' AND C.id_calle=V.id_calle 
        AND TV.id_tipo_vivienda=V.id_tipo_vivienda AND V.id_servicio=SE.id_servicio";
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

        $sql     = 'UPDATE solicitudes SET procesada =:procesada, observaciones=:observaciones WHERE id_solicitud = :id_solicitud'; 
        $arreglo = '';

        try {

            $datos = $this->conexion->prepare($sql);

            $datos->execute([
                'procesada'     => $data['procesada'],
                'id_solicitud'     => $data['id_solicitud'],
                'observaciones'=>$data['observaciones']
             ]);

            return true;

        } catch (PDOException $e) {

            $error = ['estatus' => false];

            $error += ['info' => "error de sql:{$e}"];
            return $error;
        }
    }



    //=======================================================================


}
