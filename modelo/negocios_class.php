<?php

class Negocios_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }
 
    public function Consultar()  
    {

        $tabla = "SELECT id_negocio, nombre_negocio, direccion_negocio, cedula_propietario, rif_negocio, c.id_calle, c.nombre_calle, n.estado FROM negocios n INNER JOIN calles c WHERE n.estado = 1 AND n.id_calle = c.id_calle";
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

    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO negocios (
                id_calle,
                nombre_negocio,
                direccion_negocio ,
                cedula_propietario,
                rif_negocio,
                estado
                ) VALUES (
                    :id_calle,
                    :nombre_negocio,
                    :direccion_negocio,
                    :cedula_propietario,
                    :rif_negocio,
                    :estado
                )');

            $datos->execute([
                'id_calle' => $data['id_calle'],
                'nombre_negocio' => $data['nombre_negocio'],
                'direccion_negocio' => $data['direccion_negocio'],
                'cedula_propietario' => $data['cedula_propietario'],
                'rif_negocio' => $data['rif_negocio'],
                'estado' => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }

    /* public function Eliminar($param)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM negocios WHERE id_negocio = :id_negocio');
            $query->execute(['id_negocio' => $param]);

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    } */

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE negocios  SET
                id_calle            =   :id_calle,
                nombre_negocio     =   :nombre_negocio,
                direccion_negocio  =   :direccion_negocio,
                cedula_propietario    =   :cedula_propietario,
                rif_negocio    =   :rif_negocio,
                estado              =   :estado

                WHERE id_negocio =:id_negocio"
            );

            $query->execute([
                'id_negocio' => $data['id_negocio'],
                'id_calle' => $data['id_calle'],
                'nombre_negocio' => $data['nombre_negocio'],
                'direccion_negocio' => $data['direccion_negocio'],
                'cedula_propietario' => $data['cedula_propietario'],
                'rif_negocio' => $data['rif_negocio'],
                'estado' => $data['estado']
                
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    /* public function Calles()
    {

        $tabla = "SELECT * FROM calles where estado=1 ORDER BY nombre_calle ASC";
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
    } */

   /*  public function Personas()
    {

        $tabla = "SELECT * FROM personas where estado=1 ORDER BY cedula_persona ASC";
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
    } */

}
