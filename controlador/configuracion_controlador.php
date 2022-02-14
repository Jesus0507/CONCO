<?php

class Configuracion extends Controlador
{
    public function __construct()
    {
        parent::__construct();
     //   $this->Cargar_Modelo("configuracion");
    } 

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('configuracion/index');
    }
    public function Configuracion()
    {
        $this->Seguridad_de_Session();
        $this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('configuracion/index');

    }

    public function Establecer_Consultas()
    {
        
        $aguas_negras = $this->Consultar_Tabla("aguas_negras", 1, "nombre_aguas_negras");
        $agua_consumo = $this->Consultar_Tabla("agua_consumo", 1, "nombre_agua_consumo");
        $bonos = $this->Consultar_Tabla("bonos", 1, "nombre_bono");
        $comite = $this->Consultar_Tabla("comite", 1, "nombre_comite");
        $compania_gas = $this->Consultar_Tabla("compania_gas", 1, "nombre_compania");
        $misiones = $this->Consultar_Tabla("misiones", 1, "nombre_mision");
        $municipios = $this->Consultar_Tabla("municipios", 1, "nombre_municipio");
        $parroquias = $this->Consultar_Tabla("parroquias", 1, "nombre_parroquia");
        $org_politica = $this->Consultar_Tabla("org_politica", 1, "nombre_org");
        $residuos_solidos = $this->Consultar_Tabla("residuos_solidos", 1, "nombre_residuos");
        $tipo_inmueble = $this->Consultar_Tabla("tipo_inmueble", 1, "nombre_tipo");
        $tipo_vivienda = $this->Consultar_Tabla("tipo_vivienda", 1, "nombre_tipo_vivienda");
        $proyecto = $this->Consultar_Tabla("proyecto", 1, "nombre_proyecto");
        $condicion_ocupacion = $this->Consultar_Tabla("condicion_ocupacion", 1, "condicion_vivienda");
        $comunidad_indigena = $this->Consultar_Tabla("comunidad_indigena", 1, "nombre_comunidad");
        $this->parroquia_municipio = $this->modelo->Parroquias(); 
        $this->centros_votacion = $this->modelo->Centro_Votacion(); 

        $this->vista->aguas_negras = $aguas_negras;
        $this->aguas_negras = $aguas_negras;

        $this->vista->agua_consumo = $agua_consumo;
        $this->agua_consumo = $agua_consumo;

        $this->vista->bonos = $bonos;
        $this->bonos = $bonos;

        $this->vista->comite = $comite;
        $this->comite = $comite;

        $this->vista->compania_gas = $compania_gas;
        $this->compania_gas = $compania_gas;

        $this->vista->misiones = $misiones; 
        $this->misiones = $misiones;

        $this->vista->municipios = $municipios; 
        $this->municipios = $municipios; 

        $this->vista->parroquias = $parroquias; 
        $this->parroquias = $parroquias;

        $this->vista->org_politica = $org_politica; 
        $this->org_politica = $org_politica;

        $this->vista->residuos_solidos = $residuos_solidos; 
        $this->residuos_solidos = $residuos_solidos;

        $this->vista->tipo_inmueble = $tipo_inmueble; 
        $this->tipo_inmueble = $tipo_inmueble;

        $this->vista->tipo_vivienda = $tipo_vivienda; 
        $this->tipo_vivienda = $tipo_vivienda;

        $this->vista->proyecto = $proyecto; 
        $this->proyecto = $proyecto;

        $this->vista->condicion_ocupacion = $condicion_ocupacion; 
        $this->condicion_ocupacion = $condicion_ocupacion;

        $this->vista->comunidad_indigena = $comunidad_indigena; 
        $this->comunidad_indigena = $comunidad_indigena;
    }

    public function Consultas_Aguas_Negras_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->aguas_negras);
    }

    public function Consultas_Agua_Consumo_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->agua_consumo);
    }

    public function Consultas_Bonos_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->bonos);
    }
    public function Consultas_Comites_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->comite);
    }
    public function Consultas_Compañia_Gas_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->compania_gas);
    }
    public function Consultas_Municipios_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->municipios);
    }
    public function Consultas_Misiones_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->misiones);
    }
    public function Consultas_Parroquias_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->parroquia_municipio);
    }

    public function Consultas_Organizacion_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->org_politica);
    } 
    public function Consultas_Residuos_Solidos_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->residuos_solidos);
    } 
    public function Consultas_Tipo_Inmueble_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->tipo_inmueble);
    } 

    public function Consultas_Tipo_Vivienda_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->tipo_vivienda);
    } 

    public function Consultas_Proyectos_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->proyecto);
    } 

    public function Consultas_Condicion_Ocupacion_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->condicion_ocupacion);
    } 

    public function Consultas_Comunidad_Indigena_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->comunidad_indigena);
    } 

    public function Consultas_Centro_Votacion_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->centros_votacion);
    } 

//===========================AGUAS NEGRAS============================================
    public function Nueva_Aguas_Negras()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("aguas_negras", "nombre_aguas_negras", $datos['nombre_aguas_negras'])
        ) {
            $this->vista->mensaje = 'Aguas Negras Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Aguas_Negras()
    {

        if ($this->Eliminar_Tablas("aguas_negras", "id_aguas_negras", $_POST['id'])) {
            $this->mensaje = 'Aguas Negras Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Aguas_Negras()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("aguas_negras", "nombre_aguas_negras", "id_aguas_negras", $datos['nombre_aguas_negras'], $_POST['id'])) {
            $this->mensaje = 'Aguas Negras Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================AGUAS COMSUMO============================================

    public function Nueva_Agua_Consumo()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("agua_consumo", "nombre_agua_consumo", $datos['nombre_agua_consumo'])
        ) {
            $this->vista->mensaje = 'Aguas de Consumo Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Agua_Consumo()
    {

        if ($this->Eliminar_Tablas("agua_consumo", "id_agua_consumo", $_POST['id'])) {
            $this->mensaje = 'Aguas de Consumo Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Agua_Consumo()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("agua_consumo", "nombre_agua_consumo", "id_agua_consumo", $datos['nombre_agua_consumo'], $_POST['id'])) {
            $this->mensaje = 'Aguas de Consumo Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }
    //===========================BONOS============================================

    public function Nuevo_Bono()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("bonos", "nombre_bono", $datos['nombre_bono'])
        ) {
            $this->vista->mensaje = 'Bono Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Bono()
    {

        if ($this->Eliminar_Tablas("bonos", "id_bono", $_POST['id'])) {
            $this->mensaje = 'Bono Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Bono()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("bonos", "nombre_bono", "id_bono", $datos['nombre_bono'], $_POST['id'])) {
            $this->mensaje = 'Bono Actualizado Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================COMITE============================================

    public function Nuevo_Comite()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("comite", "nombre_comite", $datos['nombre_comite'])
        ) {
            $this->vista->mensaje = 'Comite Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Comite()
    {

        if ($this->Eliminar_Tablas("comite", "id_comite", $_POST['id'])) {
            $this->mensaje = 'Comite Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Comite()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("comite", "nombre_comite", "id_comite", $datos['nombre_comite'], $_POST['id'])) {
            $this->mensaje = 'Comite Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================COMPAÑIA GAS============================================

    public function Nueva_Compania_Gas()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar_Compania(
            [
                'nombre_compania' => $datos['nombre_compania'],
                'descripcion' => $datos['descripcion'],
                'telefono' => $datos['telefono'],
                'estado' => 1,
            ]
        )
        ) {
            $this->vista->mensaje = 'Compañia de Gas Registrada exitosamente!.';
        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }

        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Compania_Gas()
    {

        if ($this->Eliminar_Tablas("compania_gas", "id_compania_gas", $_POST['id'])) {
            $this->mensaje = 'Compañia de Gas Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Compania_Gas()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->model->Actualizar_Compania(
            [
                'id_compania_gas' => $_POST['id'],
                'nombre_compania' => $datos['nombre_compania'],
                'descripcion' => $datos['descripcion'],
                'telefono' => $datos['telefono'],
            ]
        )) {
            $this->mensaje = 'Compañia de Gas Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================MUNICIPIOS============================================

    public function Nuevo_Municipios()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("municipios", "nombre_municipio", $datos['nombre_municipio'])
        ) {
            $this->vista->mensaje = 'Municipio Registrado exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Municipios()
    {

        if ($this->Eliminar_Tablas("municipios", "id_municipio", $_POST['id'])) {
            $this->mensaje = 'Municipio Eliminado Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Municipios()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("municipios", "nombre_municipio", "id_municipio", $datos['nombre_municipio'], $_POST['id'])) {
            $this->mensaje = 'Municipio Actualizado Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================Misiones============================================

    public function Nueva_Mision()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ( $this->Registrar_Tablas("misiones", "nombre_mision", $datos['nombre_mision'])
        ) {
            $this->vista->mensaje = 'Mision Registrada exitosamente!.';
        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }

        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Mision()
    {

        if ($this->Eliminar_Tablas("compania_gas", "id_compania_gas", $_POST['id'])) {
            $this->mensaje = 'Mision Eliminado Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Mision()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->model->Actualizar_Compania(
            [
                'id_mision' => $_POST['id'],
                'nombre_mision' => $datos['nombre_mision'],
                'descripcion_mision' => $datos['descripcion_mision'],
            ]
        )) {
            $this->mensaje = 'Mision Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================Parroquias============================================

    public function Nueva_Parroquia()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar_Parroquia(
            [
                'id_municipio' => $datos['id_municipio'],
                'nombre_parroquia' => $datos['nombre_parroquia'],
                'estado' => 1,
            ]
        )
        ) {
            $this->vista->mensaje = 'Parroquia Registrada exitosamente!.';
        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }

        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Parroquia()
    {

        if ($this->Eliminar_Tablas("parroquias", "id_parroquia", $_POST['id'])) {
            $this->mensaje = 'Parroquia Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Parroquia()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->model->Actualizar_Compania(
            [
                'id_parroquia' => $_POST['id'],
                'id_municipio' => $datos['id_municipio'],
                'nombre_parroquia' => $datos['nombre_parroquia'],
            ]
        )) {
            $this->mensaje = 'Parroquia Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }
    //===========================ORGANIZACION POLITICA============================================

    public function Nuevo_Organizacion_Politica()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("org_politica", "nombre_org", $datos['nombre_org'])
        ) {
            $this->vista->mensaje = 'Organizacion Politica Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Organizacion_Politica()
    {

        if ($this->Eliminar_Tablas("org_politica", "id_org_politica", $_POST['id'])) {
            $this->mensaje = 'Organizacion Politica Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Organizacion_Politica()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("org_politica", "nombre_org", "id_org_politica", $datos['nombre_org'], $_POST['id'])) {
            $this->mensaje = 'Organizacion Politica Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================RESIDUOS SOLIDOS============================================

    public function Nuevo_Residuos_Solidos()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("residuos_solidos", "nombre_residuos", $datos['nombre_residuos'])
        ) {
            $this->vista->mensaje = 'Residuos Solidos Registrado exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Residuos_Solidos()
    {

        if ($this->Eliminar_Tablas("residuos_solidos", "id_residuos_solidos", $_POST['id'])) {
            $this->mensaje = 'Residuos Solidos Eliminado Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Residuos_Solidos()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("residuos_solidos", "nombre_residuos", "id_residuos_solidos", $datos['nombre_residuos'], $_POST['id'])) {
            $this->mensaje = 'Residuos Solidos Actualizado Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================TIPO INMUEBLE============================================

    public function Nuevo_Tipo_Inmueble()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("tipo_inmueble", "nombre_tipo", $datos['nombre_tipo'])
        ) {
            $this->vista->mensaje = 'Tipo de Inmnueble Registrado exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Tipo_Inmueble()
    {

        if ($this->Eliminar_Tablas("tipo_inmueble", "id_tipo_inmueble", $_POST['id'])) {
            $this->mensaje = 'Tipo de Inmnueble Eliminado Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Tipo_Inmueble()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("tipo_inmueble", "nombre_tipo", "id_tipo_inmueble", $datos['nombre_tipo'], $_POST['id'])) {
            $this->mensaje = 'Tipo de Inmnueble Actualizado Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================TIPO VIVIENDA============================================

    public function Nuevo_Tipo_Vivienda()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("tipo_vivienda", "nombre_tipo_vivienda", $datos['nombre_tipo_vivienda'])
        ) {
            $this->vista->mensaje = 'Tipo de Vivienda Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Tipo_Vivienda()
    {

        if ($this->Eliminar_Tablas("tipo_vivienda", "id_tipo_vivienda", $_POST['id'])) {
            $this->mensaje = 'Tipo de Vivienda Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Tipo_Vivienda()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("tipo_vivienda", "nombre_tipo_vivienda", "id_tipo_vivienda", $datos['nombre_tipo_vivienda'], $_POST['id'])) {
            $this->mensaje = 'Tipo de Vivienda Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================PROYECTO============================================

    public function Nuevo_Proyecto()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar_Proyectos(
            [
                'nombre_proyecto' => $datos['nombre_proyecto'],
                'area_proyecto' => $datos['area_proyecto'],
                'estado_proyecto' => $datos['estado_proyecto'],
                'estado' => 1,
            ]
        )
        ) {
            $this->vista->mensaje = 'Proyecto Registrado exitosamente!.';
        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }

        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Proyecto()
    {

        if ($this->Eliminar_Tablas("proyecto", "id_proyecto", $_POST['id'])) {
            $this->mensaje = 'Proyecto Eliminado Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Proyecto()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->model->Actualizar_Proyectos(
            [
                'id_proyecto' => $_POST['id'],
                'nombre_proyecto' => $datos['nombre_proyecto'],
                'area_proyecto' => $datos['area_proyecto'],
                'estado_proyecto' => $datos['estado_proyecto'],
            ]
        )) {
            $this->mensaje = 'Proyecto Actualizado Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================CONDICION OCUPACION============================================

    public function Nueva_Condicion_Ocupacion()
    
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("condicion_ocupacion", "condicion_vivienda", $datos['condicion_vivienda'])
        ) {
            $this->vista->mensaje = 'Condicion de Ocupacion Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Condicion_Ocupacion()
    {

        if ($this->Eliminar_Tablas("condicion_ocupacion", "id_condicion_ocupacion", $_POST['id'])) 
        {
            $this->mensaje = 'Condicion de Ocupacion Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Condicion_Ocupacion()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("condicion_ocupacion", "condicion_vivienda", "id_condicion_ocupacion", $datos['condicion_vivienda'], $_POST['id'])) {
            $this->mensaje = 'Condicion de Ocupacion Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================COMUNIDAD INDIGENA============================================

    public function Nueva_Comunidad_Indigena()    
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Registrar_Tablas("comunidad_indigena", "nombre_comunidad", $datos['nombre_comunidad'])
        ) {
            $this->vista->mensaje = 'Comunidad Indigena Registrada exitosamente!.';

        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }
        echo $this->vista->mensaje;

        exit();
        return false;
    }

    public function Eliminar_Comunidad_Indigena()
    {

        if ($this->Eliminar_Tablas("comunidad_indigena", "id_comunidad_indigena", $_POST['id'])) 
        {
            $this->mensaje = 'Comunidad Indigena Eliminada Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Comunidad_Indigena()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->Actualizar_Tablas("comunidad_indigena", "nombre_comunidad", "id_comunidad_indigena", $datos['nombre_comunidad'], $_POST['id'])) {
            $this->mensaje = 'Comunidad Indigena Actualizada Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }

    //===========================CENTRO DE Votacion============================================

    public function Nuevo_Centro_Votacion()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->modelo->Registrar_Centro_Votacion(
            [
                'id_parroquia' => $datos['id_parroquia'],
                'nombre_centro' => $datos['nombre_centro'],
                'estado' => 1
            ]
        )
        ) {
            $this->vista->mensaje = 'Centro de Votacion Registrado exitosamente!.'; 
        } else {
            $this->vista->mensaje = 'Ha ocurrido un error.';
        }

        echo $this->vista->mensaje;
        exit();
        return false;
    }

    public function Eliminar_Centro_Votacion()
    {

        if ($this->Eliminar_Tablas("centros_votacion", "id_centro_votacion", $_POST['id'])) {
            $this->mensaje = 'Centro de Votacion Eliminado Exitosamente';
        } else {
            $this->mensaje = 0;
        }

        echo $this->mensaje;
        return false;
    }

    public function Editar_Centro_Votacion()
    {

        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

        if ($this->model->Actualizar_Centro_Votacion(
            [
                'id_centro_votacion' => $_POST['id'],
                'id_parroquia' => $datos['id_parroquia'],
                'nombre_centro' => $datos['nombre_centro']
            ]
        )) {
            $this->mensaje = 'Centro de Votacion Actualizado Exitosamente';
        } else {
            $this->mensaje = 0;
        }
        echo $this->mensaje;
        return false;
    }


}
