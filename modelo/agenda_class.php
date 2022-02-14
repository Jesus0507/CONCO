<?php

class Agenda_Class extends Modelo 
{

    public function __construct()
    {   
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO agenda (
                tipo_evento,
                fecha, 
                creador, 
                ubicacion,
                horas,
                detalle

                ) VALUES (
                    :tipo_evento, 
                    :fecha, 
                    :creador, 
                    :ubicacion,
                    :horas,
                    :detalle
                )');

            $datos->execute([
                'tipo_evento'  => $data['tipo_evento'],
                'fecha'        => $data['fecha'],
                'creador'      => $data['creador'],
                'ubicacion'    =>$data['ubicacion'],
                'horas'        =>$data['horas'],
                'detalle'      => $data['detalle']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }


    public function Consultar()
    {
 
        $tabla            = "SELECT A.*,P.* FROM agenda A, personas P WHERE A.creador = P.cedula_persona AND P.estado=1 ORDER BY id_agenda DESC";
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



    public function get_calles()
    {
 
        $tabla            = "SELECT nombre_calle FROM calles WHERE estado=1 ORDER BY id_calle ASC";
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

    public function get_inmuebles()
    {
 
        $tabla            = "SELECT nombre_inmueble FROM inmuebles WHERE estado=1 ORDER BY id_inmueble ASC";
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

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE agenda  SET
                tipo_evento     =   :tipo_evento,
                fecha           =   :fecha,
                creador         =   :creador,
                ubicacion       =   :ubicacion,
                horas           =   :horas,
                detalle         =   :detalle

                WHERE id_agenda =:id_agenda"
            );

            $query->execute([
                'tipo_evento' => $data['tipo_evento'],
                'fecha'       => $data['fecha'],
                'creador'     => $data['creador'],
                'ubicacion'   =>$data['ubicacion'],
                'horas'       =>$data['horas'],
                'detalle'     => $data['detalle'],
                'id_agenda'   => $data['id_agenda']

            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function Eliminar($param)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM agenda WHERE id_agenda = :id_agenda');
            $query->execute(['id_agenda' => $param]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }
    //=======================================================================


}
?>