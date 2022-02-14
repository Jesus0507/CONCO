<?php

class Consejo_Comunal_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }  
    
    public function Consultas()
    {

        $tabla            = "SELECT id_comite_persona, c.nombre_comite, cc.cedula_persona, p.primer_nombre, p.primer_apellido, cargo_persona, cc.fecha_ingreso, cc.fecha_salida FROM comite_persona cc INNER JOIN personas p, comite c WHERE cc.id_comite = c.id_comite AND cc.cedula_persona = p.cedula_persona ORDER BY `cc`.`cedula_persona` ASC";
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
    // public function Personas()
    // {

    //     $tabla            = "SELECT * FROM personas where estado=1 ORDER BY cedula_persona ASC";
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

    // public function Comites()
    // {

    //     $tabla            = "SELECT * FROM comite where estado=1 ORDER BY nombre_comite ASC";
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

    public function Registrar($data) 
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO comite_persona (
                id_comite,
                cedula_persona,
                cargo_persona,
                fecha_ingreso,
                fecha_salida
                ) VALUES (
                    :id_comite, 
                    :cedula_persona,
                    :cargo_persona,
                    :fecha_ingreso,
                    :fecha_salida
                )');

            $datos->execute([
                'id_comite'      => $data['id_comite'],
                'cedula_persona'   => $data['cedula_persona'],
                'cargo_persona'   => $data['cargo_persona'],
                'fecha_ingreso'   => $data['fecha_ingreso'],
                'fecha_salida'   => $data['fecha_salida']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    } 

    // public function Nuevo_Comite($data)
    // {

    //     try {
    //         $datos = $this->conexion->prepare('INSERT INTO comite (
    //             nombre_comite,
    //             cantidad_personas,
    //             estado
    //             ) VALUES (
    //                 :nombre_comite,
    //                 :cantidad_personas,
    //                 :estado
    //             )');

    //         $datos->execute([
    //             'nombre_comite' => $data['nombre_comite'],
    //             'cantidad_personas' => $data['cantidad_personas'],
    //             'estado' => $data['estado'],
    //         ]);

    //         return true;

    //     } catch (PDOException $e) {
    //         $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
    //         return false;
    //     }
    // }

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE comite_persona  SET
                id_comite     =   :id_comite,
                cedula_persona     =   :cedula_persona,
                cargo_persona     =   :cargo_persona,
                fecha_ingreso     =   :fecha_ingreso,
                fecha_salida     =   :fecha_salida
                WHERE id_comite_persona =:id_comite_persona"
            );

            $query->execute([
                'id_comite_persona'      => $data['id_comite_persona'],
                'id_comite'      => $data['id_comite'],
                'cedula_persona'   => $data['cedula_persona'],
                'cargo_persona'   => $data['cargo_persona'],
                'fecha_ingreso'   => $data['fecha_ingreso'],
                'fecha_salida'   => $data['fecha_salida']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    // public function Eliminar($param)
    // {
    //     try {

    //         $query = $this->conexion->prepare('DELETE FROM consejo_comunal WHERE id_consejo_comunal = :id_consejo_comunal');
    //         $query->execute(['id_consejo_comunal' => $param]);

    //         return true;

    //     } catch (PDOException $e) {

    //         echo $e->getMessage();
    //         return false;
    //     }
    // }


}
?>