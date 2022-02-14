<?php

class Reportes_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }  

     public function Familia_Vivienda($id_familia)
     {

         $tabla            = "SELECT * FROM familia f, vivienda v, calles c, tipo_vivienda t, servicios s WHERE f.id_familia = $id_familia and v.id_calle = c.id_calle AND v.id_tipo_vivienda = t.id_tipo_vivienda AND v.id_vivienda = s.id_servicio";
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

     public function Techo($id)
     {

         $tabla            = "SELECT * FROM vivienda_tipo_techo v, tipo_techo t WHERE v.id_vivienda =$id AND v.estado =1 AND v.id_tipo_techo = t.id_tipo_techo";
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

public function Pared($id)
     {

         $tabla            = "SELECT * FROM vivienda_tipo_pared v, tipo_pared t WHERE v.id_vivienda =$id AND v.estado =1 AND v.id_tipo_pared = t.id_tipo_pared";
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

     public function Piso($id)
     {

         $tabla            = "SELECT * FROM vivienda_tipo_piso v, tipo_piso t WHERE v.id_vivienda =$id AND v.estado =1 AND v.id_tipo_piso = t.id_tipo_piso";
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

     public function GAS($id)
     {

         $tabla            = "SELECT * FROM vivienda_servicio_gas v, servicio_gas s WHERE v.id_vivienda = $id AND v.id_servicio_gas =s.id_servicio_gas AND v.estado=1";
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

     public function Integranres($id)
     {

         $tabla            = "SELECT * FROM familia_personas f, personas p WHERE f.id_familia = $id AND p.estado =1 AND f.cedula_persona =p.cedula_persona
";
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

     public function Personas_Proyecto($id)
     {

         $tabla            = "SELECT * FROM persona_proyecto pp, proyecto p WHERE pp.cedula_persona = $id AND pp.id_proyecto = p.id_proyecto";
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
?>