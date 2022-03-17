<?php

class Centro_Votacion_Class extends Modelo
{ 

    public function __construct()
    {
        parent::__construct();
    } 

    public function Centro_Votacion()
    {

        $tabla = "SELECT id_centro_votacion, nombre_centro, p.id_parroquia, p.nombre_parroquia, c.estado FROM parroquias p INNER JOIN centros_votacion c WHERE c.estado = 1 AND c.id_parroquia = p.id_parroquia";
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

    public function Persona_Centro_Votacion()
    { 

        $tabla = "SELECT v.id_votante_centro_votacion, p.cedula_persona, p.primer_nombre, p.primer_apellido, c.id_centro_votacion, c.nombre_centro, par.id_parroquia, par.nombre_parroquia, v.estado FROM votantes_centro_votacion v INNER JOIN centros_votacion c, parroquias par, personas p WHERE v.estado = 1 AND v.id_centro_votacion = c.id_centro_votacion AND c.id_parroquia = par.id_parroquia AND v.cedula_votante = p.cedula_persona ORDER BY `c`.`nombre_centro` ASC";
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

    

    public function Registrar_Votantes($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO votantes_centro_votacion (
                id_centro_votacion,
                cedula_votante,
                estado            
                ) VALUES (
                    :id_centro_votacion, 
                    :cedula_votante,
                    :estado
                )');

            $datos->execute([
                'id_centro_votacion'      => $data['id_centro_votacion'],
                'cedula_votante'   => $data['cedula_votante'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }

    public function Registrar_Centro_Votacion($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO centros_votacion (
                id_parroquia,
                nombre_centro,
                estado            
                ) VALUES (
                    :id_parroquia, 
                    :nombre_centro,
                    :estado
                )');

            $datos->execute([
                'id_parroquia'      => $data['id_parroquia'],
                'nombre_centro'   => $data['nombre_centro'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return $this->error;
        }
    }

    public function Actualizar_Votantes($data)
    {

        try {
            $datos = $this->conexion->prepare("UPDATE votantes_centro_votacion  SET
                id_centro_votacion            =   :id_centro_votacion,
                cedula_votante     =   :cedula_votante,
                estado              =   :estado

                WHERE id_votante_centro_votacion =:id_votante_centro_votacion");

            $datos->execute([
                'id_votante_centro_votacion'      => $data['id_votante_centro_votacion'],
                'id_centro_votacion'      => $data['id_centro_votacion'],
                'cedula_votante'   => $data['cedula_votante'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }


}
?>