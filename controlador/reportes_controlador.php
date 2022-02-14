<?php

class Reportes extends Controlador
{
    public function __construct()
    {
        parent::__construct();
   //    $this->Cargar_Modelo("reportes");
    }

    public function Establecer_Consultas()
    {
        $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");
        $parto_humanizado = $this->Consultar_Tabla("parto_humanizado", 1, "cedula_persona");
        $votantes = $this->Consultar_Tabla("votantes_centro_votacion", 1, "cedula_votante");
        $vacunados = $this->Consultar_Tabla("vacuna_covid", 1, "cedula_persona");
        $discapacitados = $this->Consultar_Tabla_sin_estado("discapacidad_persona", 1, "cedula_persona");
        $personas_bonos = $this->Consultar_Tabla_sin_estado("persona_bonos", 1, "cedula_persona");

        $this->vista->personas = $personas; //datos para mandar a la vista
        $this->personas = $personas; ///datos para usar en el 
        
        $this->vista->parto_humanizado = $parto_humanizado; //datos para mandar a la vista
        $this->parto_humanizado = $parto_humanizado; 

        $this->vista->votantes = $votantes; //datos para mandar a la vista
        $this->votantes = $votantes; 

        $this->vista->vacunados = $vacunados; //datos para mandar a la vista
        $this->vacunados = $vacunados; 

         $this->vista->discapacitados = $discapacitados; //datos para mandar a la vista
         $this->discapacitados = $discapacitados; 

        $this->vista->personas_bonos = $personas_bonos; //datos para mandar a la vista
        $this->personas_bonos = $personas_bonos; 

    }

    public function Datos_Poblacional()
    {
        $familia = $this->Consultar_Columna("familia","id_familia",9) ;

        foreach ($familia as $key => $value) {

            $viviendas = $this->Consultar_Columna("vivienda","id_vivienda",$value["id_vivienda"]) ;

            $integrantes = $this->modelo->Integranres($value["id_familia"]) ;

            foreach ($integrantes as $key => $int) {
                $persona_proyecto = $this->modelo->Personas_Proyecto($int["cedula_persona"]) ;
            }

            foreach ($viviendas as $key => $v) {
                $calle = $this->Consultar_Columna("calles","id_calle",$v["id_calle"]) ;
                $tipo_vivienda = $this->Consultar_Columna("tipo_vivienda","id_tipo_vivienda",$v["id_tipo_vivienda"]) ;
                $tipo_techo = $this->modelo->Techo($v["id_vivienda"]);
                $tipo_pared = $this->modelo->Pared($v["id_vivienda"]);
                $tipo_piso = $this->modelo->Piso($v["id_vivienda"]);
                $gas = $this->modelo->GAS($v["id_vivienda"]);
            }
            
        }

        // $tabla[]=[
            //     "id_familia"=> $value["id_familia"],
            //     "id_vivienda"=> $value["id_vivienda"],
            //     "condicion_ocupacion"=> $value["condicion_ocupacion"],
            //     "nombre_familia"=> $value["nombre_familia"],
            // ];
        echo json_encode($persona_proyecto);
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reportes/index');
    } 
    public function Constancias()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reportes/constancias');
    }

    public function Listados()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reportes/listados');
    }

    public function Estadisticas()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();

        $embarazadas = count($this->parto_humanizado);
        $personas = count($this->personas);

//------------------Calculo de edades----------------------------------//

        $menores_edad=0;
        $mayores_edad=0;
        $adulto_mayor=0;

        foreach ($this->personas as $persona) {
            $anio = explode('-', $persona["fecha_nacimiento"]);
            $edad = date("Y") - $anio[0] ;
            
            if($edad <=17){
                $menores_edad++;
            }

            if($edad >=18 && $edad<=55){
              $mayores_edad++;
          }

          if($edad>55){
            $adulto_mayor++;
        }

    }

    $percent_menores= ($menores_edad*100) / count($this->personas);

    $percent_mayores= ($mayores_edad*100) / count($this->personas);

    $percent_adultos= ($adulto_mayor*100) / count($this->personas);


    $datos_edades = array(
        array("label" => "Menores de Edad (".$menores_edad.")", "symbol" => "Menores de 17 ", "y" => $percent_menores),
        array("label" => "Mayores de Edad (".$mayores_edad.")", "symbol" => "Mayores de 18", "y" => $percent_mayores),
        array("label" => "Adulto Mayor (".$adulto_mayor.")", "symbol" => "Mayores de 55", "y" => $percent_adultos)

    );

    $this->vista->datos_edades = $datos_edades;


//---------------------------------Calculo de embarazadas------------------------------------//

    $cant_embarazadas_actual=0;
    $cant_mujeres=0;

    for ($i=0;$i<$embarazadas;$i++) {

      $fecha_actual=strtotime("now");
      $fecha_parto=strtotime($this->parto_humanizado[$i]['fecha_aprox_parto']);

      if($fecha_parto>=$fecha_actual){
         $cant_embarazadas_actual++;
     }


 }

 foreach ($this->personas as $p) {
   if($p['genero']=="F"){
      $cant_mujeres++;
  }
}



$calculo_embarazadas=($cant_embarazadas_actual*100) / $cant_mujeres;
$mujeres=$cant_mujeres-$cant_embarazadas_actual;
$calculo_mujeres=($mujeres*100) / $cant_mujeres;

$datos_embarazadas = array(
    array("label" => "Mujeres Embarazadas (".$cant_embarazadas_actual.")", "symbol" => "Mujeres Embarazadas", "y" => $calculo_embarazadas),
    array("label" => "Mujeres no embarazadas (".$mujeres.")", "symbol" => "Mujeres no embarazadas", "y" => $calculo_mujeres)
);


$this->vista->datos_embarazadas = $datos_embarazadas;

//-----------------------------Población votante------------------------------------//

$cant_votantes_total=$mayores_edad+$adulto_mayor;
$cant_votantes_inscritos=count($this->votantes);
$cant_votantes_sin_inscribir=$cant_votantes_total - $cant_votantes_inscritos;

$calculo_no_inscritos=($cant_votantes_sin_inscribir*100) / $cant_votantes_total;
$calculo_inscritos=($cant_votantes_inscritos*100) / $cant_votantes_total;

$datos_votantes = array(
    array("label" => "Votantes sin inscribir CNE (".$cant_votantes_sin_inscribir.")", "symbol" => "Votantes sin inscribir CNE", "y" => $calculo_no_inscritos),
    array("label" => "Votantes inscritos CNE (".$cant_votantes_inscritos.")", "symbol" => "Votantes inscritos CNE", "y" => $calculo_inscritos)
);


$this->vista->datos_votantes = $datos_votantes;

//_--------------------------Niveles educativos---------------------------------//
$cant_preescolar=0;
$cant_bachiller=0;
$cant_basico=0;
$cant_superior=0;

foreach ($this->personas as $p) {
    switch ($p['nivel_educativo']) {
        case 'Superior':
        $cant_superior++;
        break;

        case 'Medio diversificado':
        $cant_bachiller++;
        break;

        case 'Preescolar':
        $cant_preescolar++;
        break;
        
        default:
        $cant_basico++;
        break;
    }
}


$calculo_superior=($cant_superior*100) / count($this->personas);
$calculo_bachiller=($cant_bachiller*100) / count($this->personas);
$calculo_preescolar=($cant_preescolar*100) / count($this->personas);
$calculo_basico=($cant_basico*100) / count($this->personas);


$datos_educacion = array(
    array("label" => "Superior (".$cant_superior.")", "symbol" => "Superior", "y" => $calculo_superior),
    array("label" => "Medio diversificado (".$cant_bachiller.")", "symbol" => "Medio diversificado", "y" => $calculo_bachiller),
    array("label" => "Preescolar (".$cant_preescolar.")", "symbol" => "Preescolar", "y" => $calculo_preescolar),
    array("label" => "Básico (".$cant_basico.")", "symbol" => "Básico", "y" => $calculo_basico)
);


$this->vista->datos_educacion = $datos_educacion;


//---------------------Población vacunada------------------------------------------------//

$vacunados=[];

foreach ($this->vacunados as $v) {
    if(count($vacunados)==0){
        $vacunados[]=$v['cedula_persona'];
    }
    else{ 

        $existe=false;
        for($i=0;$i<count($vacunados);$i++){
            if($vacunados[$i]==$v['cedula_persona']){
                $existe=true;
            }
        }

        if($existe==false){
            $vacunados[]=$v['cedula_persona'];
        }
    }
}

$cant_vacunados=count($vacunados);
$cant_no_vacunados=count($this->personas) - $cant_vacunados;
$calculo_vacunados=($cant_vacunados*100) / count($this->personas);
$calculo_no_vacunados=($cant_no_vacunados*100) / count($this->personas);


$datos_vacuna = array(
    array("label" => "Vacunados (".$cant_vacunados.")", "symbol" => "Vacunados", "y" => $calculo_vacunados),
    array("label" => "No vacunados (".$cant_no_vacunados.")", "symbol" => "No vacunados", "y" => $calculo_no_vacunados)

);


$this->vista->datos_vacuna = $datos_vacuna;

//------------------Población de discapacitados---------------------------------//

$cantidad_discapacitados_en_cama=[];
$cantidad_discapacitados=[];
$cant_total=[];


foreach ($this->discapacitados as $d) {

  if($d['en_cama']==1){  
    if(count($cantidad_discapacitados_en_cama)==0){
      $cantidad_discapacitados_en_cama[]=$d;
  }
  else{
    $existe=0;
    for($i=0;$i<count($cantidad_discapacitados_en_cama);$i++){
      if($cantidad_discapacitados_en_cama[$i]['cedula_persona']==$d['cedula_persona']){
        $existe++;
    }
}

if($existe==0){
    $cantidad_discapacitados_en_cama[]=$d;
}
}
}
}


foreach ($this->discapacitados as $d) {
    if($d['en_cama']==0){
        $existe=false;
        for($i=0;$i<count($cantidad_discapacitados_en_cama);$i++){
            if($cantidad_discapacitados_en_cama[$i]['cedula_persona']==$d['cedula_persona']){
                $existe=true;
            }
        }


        if($existe==false){

            if(count($cantidad_discapacitados)==0){
                $cantidad_discapacitados[]=$d;
            }
            else{
                $existe2=0;
                for($j=0;$j<count($cantidad_discapacitados);$j++){
                    if($cantidad_discapacitados[$j]['cedula_persona']==$d['cedula_persona']){
                        $existe2++;
                    }
                }

                if($existe2==0){
                    $cantidad_discapacitados[]=$d;
                }
            }

        }


    }
}



foreach ($this->discapacitados as $d) {
    if(count($cant_total)==0){
        $cant_total[]=$d;
    }
    else{
        $existe=false;
        for($i=0;$i<count($cant_total);$i++){
            if($cant_total[$i]['cedula_persona']==$d['cedula_persona']){
                $existe=true;
            }
        }

        if($existe==false){
            $cant_total[]=$d;
        }
    }
}




$cant_en_cama=count($cantidad_discapacitados_en_cama);
$cant_disc=count($cantidad_discapacitados);
$cant_total_discapacitados=count($cant_total);

$calculo_encama=($cant_en_cama*100) / $cant_total_discapacitados;
$calculo_disc=($cant_disc*100) / $cant_total_discapacitados;


$datos_discapacitados = array(
    array("label" => "En cama (".$cant_en_cama.")", "symbol" => "En cama", "y" => $calculo_encama),
    array("label" => "Discapacitados (".$cant_disc.")", "symbol" => "Discapacitados", "y" => $calculo_disc)

);


$this->vista->datos_discapacitados = $datos_discapacitados;


//----------------Personas bonificadas---------------------------------------//

$cant_bonos=[];

foreach ($this->personas_bonos as $pb) {
    if(count($cant_bonos)==0){
        $cant_bonos[]=$pb;
    }
    else{
        $existe=false;
        for($i=0;$i<count($cant_bonos);$i++){
            if($cant_bonos[$i]['cedula_persona']==$pb['cedula_persona']){
                $existe=true;
            }
        }

        if($existe==false){
            $cant_bonos[]=$pb;
        }
    }
}

$cant_bonos_num=count($cant_bonos);
$cant_personas=count($this->personas) - $cant_bonos_num;

$calculo_personas_bonos=($cant_bonos_num*100)/count($this->personas);
$calculo_personas=($cant_personas*100)/count($this->personas);

$datos_bonos = array(
    array("label" => "Personas bonificadas (".$cant_bonos_num.")", "symbol" => "Personas bonificadas", "y" => $calculo_personas_bonos),
    array("label" => "Personas no bonificadas (".$cant_personas.")", "symbol" => "Personas no bonificadas", "y" => $calculo_personas)

);


$this->vista->datos_bonos = $datos_bonos;



$this->vista->Cargar_Vistas('reportes/estadisticas');
}

/* ===============================PDF================================== */

/* LISTADOS */
public function Listados_PDF()
{
    $this->Establecer_Consultas();
    $this->Seguridad_de_Session();

    switch ($_POST["listados"]) {
        case '1':
        $this->vista->Cargar_Vistas('reportes/PDF/grupos_deportivos');
        break;

        case '2':
        $this->vista->Cargar_Vistas('reportes/PDF/miliciano');
        break;

        case '3':
        $this->vista->Cargar_Vistas('reportes/PDF/jefes_familia');
        break;

        case '4':
        $this->vista->Cargar_Vistas('reportes/PDF/personas_discapacidad');
        break;

        case '5':
        $this->vista->Cargar_Vistas('reportes/PDF/consejo_comunal');
        break;

        case '6':
        $this->vista->Cargar_Vistas('reportes/PDF/embarazadas');
        break;

        case '7':
        $this->vista->Cargar_Vistas('reportes/PDF/nivel_educativo');
        break;

        case '8':
        $this->vista->Cargar_Vistas('reportes/PDF/personas_carnet');
        break;

        case '9':
        $this->vista->Cargar_Vistas('reportes/PDF/negocios');
        break;

        case '10':
        $this->vista->Cargar_Vistas('reportes/PDF/inmuebles');
        break;

        case '11':
        $this->vista->Cargar_Vistas('reportes/PDF/viviendas');
        break;

        case '12':
        $this->vista->Cargar_Vistas('reportes/PDF/personas_enfermedades');
        break;

        case '13':
        $this->vista->Cargar_Vistas('reportes/PDF/votantes');
        break;

        case '14':
        $this->vista->Cargar_Vistas('reportes/PDF/poblacion_edades');
        break;

        case '15':
        $this->vista->Cargar_Vistas('reportes/PDF/sexo_diverso');
        break;
        default:
        echo "REPORTE NO ENCONTRADO";
        break;
    }
}

/* CONSTANCIAS */

public function Constancias_PDF()
{
    $this->Establecer_Consultas();
    $this->Seguridad_de_Session();

    switch ($_POST["constancias"]) {
        case '1':
        $this->vista->Cargar_Vistas('reportes/PDF/residencia');
        break;

        case '2':
        $this->Seguridad_de_Session();
        break;

        case '3':
        $this->vista->Cargar_Vistas('reportes/PDF/no_vivienda');
        break;

        default:
        echo "REPORTE NO ENCONTRADO";
        break;
    }
}

public function Reporte_Niños()
{
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('reportes/PDF/censo_niños');
} 

public function Censo_Poblacional()
{
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('reportes/PDF/censo_poblacional');
} 

public function Parto_Humanizado()
{
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('reportes/PDF/parto_humanizado');
} 

public function Historial_Clinico()
{
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('reportes/PDF/historial_clinico');
} 
}
