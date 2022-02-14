<?php

class Sector_Agricola extends Controlador
{
    public function __construct()
    {
        parent::__construct();
   //     $this->Cargar_Modelo("sector_agricola");
    }
    public function Establecer_Consultas()
    {
        $sector_agricola = $this->modelo->Consultar();
        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");
        

        $this->vista->sector_agricola = $sector_agricola; //datos para mandar a la vista
        $this->datos_sector_agricola = $sector_agricola;

        $this->vista->personas = $personas;
        $this->datos_personas = $personas;

    }
    
// ==============================VISTAS=====================================
    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('inicio/index');
    }
    public function Registros()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('sector_agricola/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('sector_agricola/consultar');
    }
    // ==============================CRUD=====================================

    public function Consultas_Sector_Agricola_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_sector_agricola);
    }

    public function Consultas_Sector_Agricola_Persona()
    {
        $sector = $this->Consultar_Columna("sector_agricola","id_sector_agricola",$_POST["id"]);
        $this->Escribir_JSON($sector);
    }

    public function Nuevo_Sector_Agricola()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar(
            [
                'cedula_persona' => $datos['cedula_persona'],
                'area_produccion' => $datos['area_produccion'],
                'anios_experiencia' => $datos['anios_experiencia'],
                'rubro_principal' => $datos['rubro_principal'],
                'rubro_alternativo' => $datos['rubro_alternativo'],
                'registro_INTI' => $datos['registro_INTI'],
                'constancia_productor' => $datos['constancia_productor'],
                'senial_hierro' => $datos['senial_hierro'],
                'financiado' => $datos['financiado'],
                'agua_riego' => $datos['agua_riego'],
                'produccion_actual' => $datos['produccion_actual'],
                'org_agricola' => $datos['org_agricola'],
                'estado' => 1
            ])
        ) {
            $this->mensaje = 'Sector Agricola Registrado exitosamente!.';
            $this->Accion($this->mensaje);
        } else {
            $this->mensaje = $this->ERROR();
        }
    
        header('location:' . constant('URL') . "Sector_Agricola/Consultas");
        exit();
        return false;
    }

    public function Editar_Sector_Agricola()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        
        if ($this->modelo->Actualizar(
            [
                'id_sector_agricola' => $datos[12],
                'cedula_persona' => $datos[0],
                'area_produccion' => $datos[1],
                'anios_experiencia' => $datos[2],
                'rubro_principal' => $datos[3],
                'rubro_alternativo' => $datos[4],
                'registro_INTI' => $datos[5],
                'constancia_productor' => $datos[6],
                'senial_hierro' => $datos[7],
                'financiado' => $datos[8],
                'agua_riego' => $datos[9],
                'produccion_actual' => $datos[10],
                'org_agricola' => $datos[11],
                'estado' => 1
            ])
        ) {
            $this->mensaje = 'Agricola Actualizado exitosamente!.';
            $this->Accion($this->mensaje);
        } else {
            $this->mensaje = $this->ERROR();
        }
        
        echo $this->mensaje; 
    }

    public function Eliminar_Sector_Agricola()
    {

        if ($this->Desactivar("sector_agricola", "id_sector_agricola", $_POST['id'])) {
            $this->mensaje = 'Sector Agriola Eliminado Exitosamente';
            $this->Accion($this->mensaje);
        } else {
            $this->mensaje = $this->ERROR();
        }

        echo $this->mensaje;
        return false;
    }

}
