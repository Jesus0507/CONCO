<?php

class Calles_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    } 

    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO calles (
                nombre_calle,
                condicion_calle,
                estado            
                ) VALUES (
                    :nombre_calle, 
                    :condicion_calle,
                    :estado
                )');

            $datos->execute([
                'nombre_calle'      => $data['nombre_calle'],
                'condicion_calle'   => $data['condicion_calle'], 
                'estado'   => $data['estado'],
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }

    // public function Consultar()
    // {

    //     $tabla            = "SELECT * FROM calles ORDER BY nombre_calle ASC";
    //     $respuesta_arreglo = '';
    //     try {
    //         $datos = $this->conexion->prepare($tabla);
    //         $datos->execute();
    //         $datos->setFetchMode(PDO::FETCH_ASSOC);
    //         $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
    //         return $respuesta_arreglo;
    //     } catch (PDOException $e) {

    //         $errorReturn = ['estatus' => false];
    //         $errorReturn += ['info' => "error sql:{$e}"];
    //         return $errorReturn;
    //     }
    // }

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE calles  SET
                nombre_calle     =   :nombre_calle,
                condicion_calle  =   :condicion_calle
                WHERE id_calle =:id_calle"
            );

            $query->execute([
                'nombre_calle'      => $data['nombre_calle'],
                'condicion_calle'   => $data['condicion_calle'],
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

            $query = $this->conexion->prepare('DELETE FROM calles WHERE id_calle = :id_calle');
            $query->execute(['id_calle' => $param]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }
    //=======================================================================

}
?>