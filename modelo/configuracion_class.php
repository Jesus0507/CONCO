<?php
 
class Configuracion_Class extends Modelo
{ 

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrar_Compania($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO compania_gas (
                nombre_compania,
                descripcion,
                telefono,
                estado            
                ) VALUES (
                    :nombre_compania, 
                    :descripcion,
                    :telefono,
                    :estado
                )');

            $datos->execute([
                'nombre_compania'      => $data['nombre_compania'],
                'descripcion'   => $data['descripcion'], 
                'telefono'   => $data['telefono'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }

    public function Actualizar_Compania($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE compania_gas  SET
                nombre_compania     =   :nombre_compania,
                descripcion  =   :descripcion,
                telefono  =   :telefono
                WHERE id_compania_gas =:id_compania_gas"
            );

            $query->execute([
                'nombre_compania'      => $data['nombre_compania'],
                'descripcion'   => $data['descripcion'], 
                'telefono'   => $data['telefono']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }


    public function Actualizar_Mision($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE compania_gas  SET
                nombre_mision     =   :nombre_mision,
                descripcion_mision  =   :descripcion_mision
                WHERE id_mision =:id_mision"
            );

            $query->execute([
                'nombre_mision'      => $data['nombre_mision'],
                'descripcion_mision'   => $data['descripcion_mision']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function Registrar_Parroquia($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO parroquias (
                id_municipio,
                nombre_parroquia,
                estado            
                ) VALUES (
                    :id_municipio, 
                    :nombre_parroquia,
                    :estado
                )');

            $datos->execute([
                'id_municipio'      => $data['id_municipio'],
                'nombre_parroquia'   => $data['nombre_parroquia'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }

    public function Actualizar_Parroquia($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE parroquias  SET
                id_municipio     =   :id_municipio,
                nombre_parroquia  =   :nombre_parroquia
                WHERE id_parroquia =:id_parroquia"
            );

            $query->execute([
                'id_municipio'      => $data['id_municipio'],
                'nombre_parroquia'   => $data['nombre_parroquia']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function Registrar_Proyectos($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO proyecto (
                nombre_proyecto,
                area_proyecto,
                estado_proyecto,
                estado            
                ) VALUES (
                    :nombre_proyecto, 
                    :area_proyecto,
                    :estado_proyecto,
                    :estado
                )');

            $datos->execute([
                'nombre_proyecto'      => $data['nombre_proyecto'],
                'area_proyecto'   => $data['area_proyecto'], 
                'estado_proyecto'   => $data['estado_proyecto'], 
                'estado'   => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            return false;
        }
    }

    public function Actualizar_Proyectos($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE compania_gas  SET
                nombre_proyecto     =   :nombre_proyecto,
                area_proyecto  =   :area_proyecto,
                estado_proyecto  =   :estado_proyecto
                WHERE id_proyecto =:id_proyecto"
            );

            $query->execute([
                'nombre_proyecto'      => $data['nombre_proyecto'],
                'area_proyecto'   => $data['area_proyecto'], 
                'estado_proyecto'   => $data['estado_proyecto']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

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
            return false;
        }
    }

    public function Actualizar_Centro_Votacion($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE centros_votacion  SET
                id_parroquia     =   :id_parroquia,
                nombre_centro  =   :nombre_centro
                WHERE id_proyecto =:id_proyecto"
            );

            $query->execute([
                'id_parroquia'      => $data['id_parroquia'],
                'nombre_centro'   => $data['nombre_centro']
            ]);

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function Parroquias()
    {

        $tabla = "SELECT id_parroquia, nombre_parroquia, m.id_municipio, m.nombre_municipio, p.estado FROM parroquias p INNER JOIN municipios m WHERE p.estado = 1 AND p.id_municipio = m.id_municipio";
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
}
