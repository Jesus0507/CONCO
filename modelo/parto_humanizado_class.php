<?php

class Parto_Humanizado_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Consultar()
    {

        $tabla = "SELECT id_parto_humanizado, par.cedula_persona, per.primer_nombre, per.primer_apellido, recibe_micronutrientes, tiempo_gestacion, fecha_aprox_parto FROM parto_humanizado par, personas per WHERE par.estado = 1 AND par.cedula_persona = per.cedula_persona AND per.estado = 1 ORDER BY `per`.`primer_nombre` ASC";
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
            $datos = $this->conexion->prepare('INSERT INTO parto_humanizado (
                cedula_persona,
                recibe_micronutrientes,
                tiempo_gestacion,
                fecha_aprox_parto,
                estado
                ) VALUES (
                    :cedula_persona ,
                    :recibe_micronutrientes,
                    :tiempo_gestacion,
                    :fecha_aprox_parto,
                    :estado
                )');

            $datos->execute([
                'cedula_persona' => $data['cedula_persona'],
                'recibe_micronutrientes' => $data['recibe_micronutrientes'],
                'tiempo_gestacion' => $data['tiempo_gestacion'],
                'fecha_aprox_parto' => $data['fecha_aprox_parto'],
                'estado' => $data['estado'],
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: </br>' . $e->getMessage();
            return false;
        }
    }

    public function Actualizar($data)
    {

        try {
            $datos = $this->conexion->prepare("UPDATE parto_humanizado  SET
            cedula_persona = :cedula_persona,
            recibe_micronutrientes = :recibe_micronutrientes,
            tiempo_gestacion = :tiempo_gestacion,
            fecha_aprox_parto = :fecha_aprox_parto,
            estado = :estado

            WHERE id_parto_humanizado =:id_parto_humanizado");

            $datos->execute([
                'id_parto_humanizado' => $data['id_parto_humanizado'],
                'cedula_persona' => $data['cedula_persona'],
                'recibe_micronutrientes' => $data['recibe_micronutrientes'],
                'tiempo_gestacion' => $data['tiempo_gestacion'],
                'fecha_aprox_parto' => $data['fecha_aprox_parto'],
                'estado' => $data['estado'],
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: </br>' . $e->getMessage();
            return false;
        }
    }

}
