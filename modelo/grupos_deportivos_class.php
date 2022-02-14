<?php

class Grupos_Deportivos_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }  

    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO grupo_deportivo (
                id_deporte,
                nombre_grupo_deportivo,
                descripcion,
                estado            
                ) VALUES (
                    :id_deporte, 
                    :nombre_grupo_deportivo,
                    :descripcion,
                    :estado
                )');

            $datos->execute([
                'id_deporte'      => $data['id_deporte'],
                'nombre_grupo_deportivo'   => $data['nombre_grupo_deportivo'],
                'descripcion'   => $data['descripcion'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    } 

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE grupo_deportivo  SET
                id_deporte     =   :id_deporte,
                nombre_grupo_deportivo  =   :nombre_grupo_deportivo,
                descripcion  =   :descripcion,
                estado = :estado
                WHERE id_grupo_deportivo =:id_grupo_deportivo"
            );

            $query->execute([
                'id_grupo_deportivo'      => $data['id_grupo_deportivo'],
                'id_deporte'      => $data['id_deporte'],
                'nombre_grupo_deportivo'   => $data['nombre_grupo_deportivo'],
                'descripcion'   => $data['descripcion'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }


    public function Consultar()
    {

        $tabla            = "SELECT id_grupo_deportivo, g.id_deporte, d.nombre_deporte, g.nombre_grupo_deportivo, g.descripcion, g.estado FROM grupo_deportivo g INNER JOIN deportes d WHERE g.estado = 1 AND g.id_deporte = d.id_deporte";
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

    public function Grupo_Deportivo_Persona()
    {

        $tabla = "SELECT pg.id_persona_grupo_deportivo, pg.id_grupo_deportivo, pg.cedula_persona, p.primer_nombre, p.primer_apellido, gp.id_deporte, d.nombre_deporte FROM personas_grupo_deportivo pg, grupo_deportivo gp, personas p, deportes d WHERE pg.estado = 1 AND pg.cedula_persona = p.cedula_persona AND gp.id_deporte = d.id_deporte AND pg.id_grupo_deportivo = gp.id_grupo_deportivo ORDER BY `p`.`primer_nombre` ASC";
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
    public function Registrar_Personas_Grupo_Deportivo($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas_grupo_deportivo (
                cedula_persona,
                id_grupo_deportivo,
                estado            
                ) VALUES (
                    :cedula_persona , 
                    :id_grupo_deportivo,
                    :estado
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_grupo_deportivo'   => $data['id_grupo_deportivo'],
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