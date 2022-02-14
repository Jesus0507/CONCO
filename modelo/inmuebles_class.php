<?php

class Inmuebles_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    // public function Calles()  
    // { 

    //     $tabla = "SELECT * FROM calles where estado=1 ORDER BY nombre_calle ASC";
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

    // public function Tipos_Inmuebles()
    // {

    //     $tabla = "SELECT * FROM tipo_inmueble where estado=1 ORDER BY nombre_tipo ASC ";
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

    public function Consultar()
    {

        $tabla = "SELECT id_inmueble, nombre_inmueble, direccion_inmueble, c.id_calle, c.nombre_calle, t.id_tipo_inmueble, t.nombre_tipo, i.estado FROM inmuebles i INNER JOIN calles c, tipo_inmueble t WHERE i.estado = 1 AND i.id_calle = c.id_calle AND i.id_tipo_inmueble = t.id_tipo_inmueble";
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
            $datos = $this->conexion->prepare('INSERT INTO inmuebles (
                id_calle,
                nombre_inmueble,
                direccion_inmueble ,
                id_tipo_inmueble,
                estado
                ) VALUES (
                    :id_calle,
                    :nombre_inmueble,
                    :direccion_inmueble,
                    :id_tipo_inmueble,
                    :estado
                )');

            $datos->execute([
                'id_calle' => $data['id_calle'],
                'nombre_inmueble' => $data['nombre_inmueble'],
                'direccion_inmueble' => $data['direccion_inmueble'],
                'id_tipo_inmueble' => $data['id_tipo_inmueble'],
                'estado' => $data['estado'],
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }


    // public function Eliminar($param)
    // {
    //     try {

    //         $query = $this->conexion->prepare('DELETE FROM inmuebles WHERE id_inmueble = :id_inmueble');
    //         $query->execute(['id_inmueble' => $param]);

    //         return true;

    //     } catch (PDOException $e) {

    //         echo $e->getMessage();
    //         return false;
    //     }
    // }


    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE inmuebles  SET
                id_calle            =   :id_calle,
                nombre_inmueble     =   :nombre_inmueble,
                direccion_inmueble  =   :direccion_inmueble,
                id_tipo_inmueble    =   :id_tipo_inmueble,
                estado              =   :estado

                WHERE id_inmueble =:id_inmueble"
            );

            $query->execute([
                'id_inmueble' => $data['id_inmueble'],
                'id_calle' => $data['id_calle'],
                'nombre_inmueble' => $data['nombre_inmueble'],
                'direccion_inmueble' => $data['direccion_inmueble'],
                'id_tipo_inmueble' => $data['id_tipo_inmueble'],
                'estado' => $data['estado']

            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }


}
