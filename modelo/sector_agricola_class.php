<?php

class Sector_Agricola_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO sector_agricola (
                cedula_persona,
                area_produccion,
                anios_experiencia,
                rubro_principal,
                rubro_alternativo,
                registro_INTI,
                constancia_productor,
                senial_hierro,
                financiado,
                agua_riego,
                produccion_actual,
                org_agricola,
                estado
                ) VALUES (
                :cedula_persona,
                :area_produccion,
                :anios_experiencia,
                :rubro_principal,
                :rubro_alternativo,
                :registro_INTI,
                :constancia_productor,
                :senial_hierro,
                :financiado,
                :agua_riego,
                :produccion_actual,
                :org_agricola,
                :estado
                )');

            $datos->execute([
                'cedula_persona' => $data['cedula_persona'],
                'area_produccion' => $data['area_produccion'],
                'anios_experiencia' => $data['anios_experiencia'],
                'rubro_principal' => $data['rubro_principal'],
                'rubro_alternativo' => $data['rubro_alternativo'],
                'registro_INTI' => $data['registro_INTI'],
                'constancia_productor' => $data['constancia_productor'],
                'senial_hierro' => $data['senial_hierro'],
                'financiado' => $data['financiado'],
                'agua_riego' => $data['agua_riego'],
                'produccion_actual' => $data['produccion_actual'],
                'org_agricola' => $data['org_agricola'],
                'estado' => $data['estado'],
            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: </br>' . $e->getMessage();
            return false;
        }
    }

    public function Consultar()
    {

        $tabla = "SELECT id_sector_agricola, s.cedula_persona, p.primer_nombre, p.primer_apellido, area_produccion, anios_experiencia, rubro_principal, rubro_alternativo, registro_INTI, constancia_productor, senial_hierro, financiado, agua_riego, produccion_actual, org_agricola FROM sector_agricola s, personas p WHERE s.estado =1 and s.cedula_persona = p.cedula_persona AND p.estado = 1 ORDER BY `p`.`primer_nombre` ASC";
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
            $query = $this->conexion->prepare("UPDATE sector_agricola  SET
                cedula_persona = :cedula_persona,
                area_produccion = :area_produccion,
                anios_experiencia = :anios_experiencia,
                rubro_principal = :rubro_principal,
                rubro_alternativo = :rubro_alternativo,
                registro_INTI = :registro_INTI,
                constancia_productor = :constancia_productor,
                senial_hierro = :senial_hierro,
                financiado = :financiado,
                agua_riego = :agua_riego,
                produccion_actual = :produccion_actual,
                org_agricola = :org_agricola,
                estado = :estado

                WHERE id_sector_agricola =:id_sector_agricola"
            );

            $query->execute([
                'id_sector_agricola' => $data['id_sector_agricola'],
                'cedula_persona' => $data['cedula_persona'],
                'area_produccion' => $data['area_produccion'],
                'anios_experiencia' => $data['anios_experiencia'],
                'rubro_principal' => $data['rubro_principal'],
                'rubro_alternativo' => $data['rubro_alternativo'],
                'registro_INTI' => $data['registro_INTI'],
                'constancia_productor' => $data['constancia_productor'],
                'senial_hierro' => $data['senial_hierro'],
                'financiado' => $data['financiado'],
                'agua_riego' => $data['agua_riego'],
                'produccion_actual' => $data['produccion_actual'],
                'org_agricola' => $data['org_agricola'],
                'estado' => $data['estado']

            ]);

            return true;

        } catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: </br>' . $e->getMessage();
            return false;
        }
    }

}
