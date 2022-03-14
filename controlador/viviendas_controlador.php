<?php

class Viviendas extends Controlador
{
    public function __construct()
    {
        parent::__construct(); 
    //    $this->Cargar_Modelo("viviendas");
    }  

    public function Establecer_Consultas()
    {

        $tipo_vivienda  = $this->Consultar_Tabla("tipo_vivienda", 1, "nombre_tipo_vivienda");
        
        $vivienda = $this->modelo->Consultar();
        $calle  =  $this->Consultar_Tabla("calles", 1, "nombre_calle");

        $tipo_techo = $this->Consultar_Tabla("tipo_techo", 1, "techo");
        $tipo_pared = $this->Consultar_Tabla("tipo_pared", 1, "pared");         
        $tipo_piso = $this->Consultar_Tabla("tipo_piso", 1, "piso"); 

        $servicios_gas=$this->Consultar_Tabla("servicio_gas",1,"nombre_servicio_gas");
        $this->vista->servicios_gas=$servicios_gas;
        $this->servicios_gas=$servicios_gas;


        $electrodomesticos=$this->Consultar_Tabla("electrodomesticos",1,"id_electrodomestico");
        $this->vista->electrodomesticos=$electrodomesticos;
        $this->electrodomesticos=$electrodomesticos;

        $this->vista->tipo_vivienda = $tipo_vivienda; 
        $this->tipo_vivienda = $tipo_vivienda;

        $this->vista->vivienda = $vivienda; 
        $this->vivienda = $vivienda;

        $this->vista->calle = $calle; 
        $this->calle = $calle;

        $this->vista->tipo_techo = $tipo_techo; 
        $this->tipo_techo = $tipo_techo;

        $this->vista->tipo_pared = $tipo_pared; 
        $this->tipo_pared = $tipo_pared;

        $this->vista->tipo_piso = $tipo_piso; 
        $this->tipo_piso = $tipo_piso;
    }

    public function Consultas_Viviendas_Ajax()
    {
        $this->Establecer_Consultas();
        $tabla =[];

        
        
        foreach ($this->vivienda as $value) {

         $gas = $this->modelo->get_gas_vivienda($value['id_vivienda']);
         $electrodomesticos = $this->modelo->get_electrodomesticos_vivienda($value['id_vivienda']);
          $techos = $this->modelo->get_techos_vivienda($value['id_vivienda']);
          $pisos = $this->modelo->get_pisos_vivienda($value['id_vivienda']);
          $paredes = $this->modelo->get_paredes_vivienda($value['id_vivienda']);
          $familia=$this->modelo->get_familia($value['id_vivienda']);

               foreach ($familia as $v) {
                   $family=$v['nombre_familia'];
               }
                 
          $value['familia']=$family;


          $tabla[]=[
            "nombre_calle" => $value["nombre_calle"],
            "nombre_tipo_vivienda" => $value["nombre_tipo_vivienda"],
            "condicion_vivienda" => $value["condicion_vivienda"],
            "direccion_vivienda" => $value["direccion_vivienda"],
            "numero_casa" => $value["numero_casa"],
            "cantidad_habitaciones" => $value["cantidad_habitaciones"],
            "espacio_siembra" => $value["espacio_siembra"],
            "hacinamiento" => $value["hacinamiento"],
            "banio_sanitario" => $value["banio_sanitario"],
            "condicion" => $value["condicion"],
            "animales_domesticos" => $value["animales_domesticos"],
            "insectos_roedores" => $value["insectos_roedores"],
            "agua_consumo" => $value["agua_consumo"],
            "aguas_negras" => $value["aguas_negras"],
            "residuos_solidos" => $value["residuos_solidos"],
            "cable_telefonico" => $value["cable_telefonico"],
            "internet" => $value["internet"],
            "servicio_electrico" => $value["servicio_electrico"],

            "ver" => "<a href='javascript:void(0)' class='btn bg-info ver-popup' title='Ver' type='button' onclick='Ver(`".json_encode($value)."`,`".json_encode($techos)."`,`".json_encode($paredes)."`,`".json_encode($pisos)."`,`".json_encode($gas)."`,`".json_encode($electrodomesticos)."`);'>
            <i class='fa fa-eye'></i>
            </a>",

            "editar" => "<a href='javascript:void(0)' class='btn bg-success btnEditar'  title='Actualizar' type='button' data-toggle='modal' data-target='#actualizar' onclick='Modificar(".json_encode($value["id_vivienda"]).",`".json_encode($value)."`,`".json_encode($techos)."`,`".json_encode($paredes)."`,`".json_encode($pisos)."`,`".json_encode($gas)."`,`".json_encode($electrodomesticos)."`)'>
            <i class='fa fa-edit' style='color: white;'></i>
            </a>",

            "eliminar" => ' <a href="javascript:void(0)" style="margin-right: 5px;" class="btn bg-danger mensaje-eliminar" title="Eliminar" onclick="Eliminar('.json_encode($value["id_vivienda"]).','.$value['id_servicio'].')">
            <i class="fa fa-trash"></i>
            </a>',


        ];

    }

    $this->Escribir_JSON($tabla);
}


    //=====================================================================

public function Cargar_Vistas()
{
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('vivienda/index'); 
}   
public function Viviendas()
{
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('vivienda/index'); 
}  

public function Registros()
{
    $this->Seguridad_de_Session();
    $this->Establecer_Consultas();
    $this->vista->Cargar_Vistas('vivienda/registrar');
}

public function Consultas() 
{
    $this->Seguridad_de_Session();
    $this->Establecer_Consultas();
    $this->vista->Cargar_Vistas('vivienda/consultar');
}

    // ==============================CRUD=====================================
public function Nueva_Vivienda()
{
    $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

    $this->Datos_Vivienda($datos);

    if ($this->modelo->Registrar(
        [
            'id_calle' => $datos['id_calle'],
            'id_tipo_vivienda' => $this->id_datos['id_tipo_vivienda'],
            'id_servicio' => $_POST['id_servicio'],
            'direccion_vivienda' => $datos['direccion_vivienda'],
            'numero_casa' => $datos['numero_casa'],
            'cantidad_habitaciones' => $datos['cantidad_habitaciones'],
            'espacio_siembra' => $datos['espacio_siembra'],
            'hacinamiento' => $datos['hacinamiento'],
            'banio_sanitario' => $datos['banio_sanitario'],
            'condicion' => $datos['condicion'],
            'descripcion' => $datos['descripcion'],
            'animales_domesticos' => $datos['animales_domesticos'],
            'insectos_roedores' => $datos['insectos_roedores'],
            'estado'   => 1,
        ]
    )
) {
        $this->mensaje = 1;
    } else {
        $this->mensaje = 0;
    }
    echo $this->mensaje;

        #header('location:' . constant('URL') . "Viviendas/Consultas");
    exit();
    return false;
}

public function Nueva_Vivienda_Habitante()
{
    $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

    $this->Datos_Vivienda($datos);

    if ($this->modelo->Registrar(
        [
            'id_calle' => $datos['id_calle'],
            'id_tipo_vivienda' => $this->id_datos['id_tipo_vivienda'],
            'id_servicio' => $_POST['id_servicio'],
            'direccion_vivienda' => $datos['direccion_vivienda'],
            'numero_casa' => $datos['numero_casa'],
            'cantidad_habitaciones' => $datos['cantidad_habitaciones'],
            'espacio_siembra' => $datos['espacio_siembra'],
            'hacinamiento' => $datos['hacinamiento'],
            'banio_sanitario' => $datos['banio_sanitario'],
            'condicion' => $datos['condicion'],
            'descripcion' => $datos['descripcion'],
            'animales_domesticos' => $datos['animales_domesticos'],
            'insectos_roedores' => $datos['insectos_roedores'],
            'estado'   => 2,
        ]
    )
) {
        $this->mensaje = 1;
    } else {
        $this->mensaje = 0;
    }
    echo $this->mensaje;

        #header('location:' . constant('URL') . "Viviendas/Consultas");
    exit();
    return false;
}










public function Asignar_Servicios()
{
    $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;     

    if ($this->modelo->Registrar_Servicios(
        [
            'agua_consumo' => $datos['agua_consumo'],
            'aguas_negras' => $datos['aguas_negras'],
            'residuos_solidos' => $datos['residuos_solidos'],
            'cable_telefonico' => $datos['cable_telefonico'],
            'internet' => $datos['internet'],
            'servicio_electrico' => $datos['servicio_electrico'],
            'estado'   => 1
        ]
    )
){
        $this->mensaje = 1;
    } else {
        $this->mensaje = 0;
    }

    $id= $this->Ultimo_Ingresado("servicios","id_servicio");
    foreach ($id as $i) {
        $id_servicio = $i['MAX(id_servicio)'];
    }

    echo $id_servicio;
    exit();
    return false;
}

public function Datos_Vivienda($datos)
{
    $this->Establecer_Consultas();

    foreach ($this->tipo_vivienda as $key => $value) {
     if ($datos["id_tipo_vivienda"] == $value["nombre_tipo_vivienda"]) {
         $id_tipo_vivienda = $value["id_tipo_vivienda"];
     }
 }

 foreach ($this->condicion_ocupacion as $key => $value) {
    if ($datos["id_condicion_ocupacion"] == $value["condicion_vivienda"]) {
        $id_condicion_ocupacion = $value["id_condicion_ocupacion"];
    }
}


$id_datos = [
    'id_tipo_vivienda' => $id_tipo_vivienda, 
    'id_condicion_ocupacion' => $id_condicion_ocupacion
];
$this->id_datos = $id_datos;
}

public function Registrar_Servicos_Vivienda()
{
    $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;

    $this->Datos_Vivienda($datos);

    if ($this->modelo->Registrar_Servicios(
        [
            'id_agua_consumo' => $datos['id_agua_consumo'],
            'id_aguas_negras' => $datos['id_aguas_negras'],
            'id_residuos_solidos' => $datos['id_residuos_solidos'],
            'id_television' => $datos['id_television'],
            'cable_telefonico' => $datos['cable_telefonico'],
            'internet' => $datos['internet'],
            'servicio_electrico' => $datos['servicio_electrico'],
            'estado'   => 1
        ]
    )
) {
        $this->vista->mensaje = 'Servicio Registrad exitosamente!.';
    } else {
        $this->vista->mensaje = 'Ha ocurrido un error.';
    }

        #header('location:' . constant('URL') . "Viviendas/Consultas");
    exit();
    return false;
}

public function Techo_Pared_Piso()
{
    $this->Establecer_Consultas();

    $id= $this->Ultimo_Ingresado("vivienda","id_vivienda");
    foreach ($id as $i) {
        $id_vivienda = $i['MAX(id_vivienda)'];
    }

    $tipo_techo = ($_POST['tipo_techo'] !== "") ? $_POST['tipo_techo'] : null;
    $tipo_pared = ($_POST['tipo_pared'] !== "") ? $_POST['tipo_pared'] : null;
    $tipo_piso = ($_POST['tipo_piso'] !== "") ? $_POST['tipo_piso'] : null;


    foreach ($this->tipo_techo as $techo) {
        foreach ($tipo_techo as $tipo) {
            if ($techo["techo"] == $tipo) {
                $id_tipo_techo[] = $techo["id_tipo_techo"];
            }
        }
    }

    foreach ($this->tipo_pared as $pared) {
        foreach ($tipo_pared as $tipo) {
            if ($pared["pared"] == $tipo) {
                $id_tipo_pared[] = $pared["id_tipo_pared"];
            }
        }
    }

    foreach ($this->tipo_piso as $piso) {
        foreach ($tipo_piso as $tipo) {
            if ($piso["piso"] == $tipo) {
                $id_tipo_piso[] = $piso["id_tipo_piso"];
            }
        }
    }

    if (isset($id_tipo_techo)) {
        for ($i=0; $i <count($id_tipo_techo) ; $i++) { 
            if ($this->modelo->Registrar_Techos(
                [
                    'id_tipo_techo' => $id_tipo_techo[$i],
                    'id_vivienda' => $id_vivienda,
                    'estado'   => 1
                ]
            )
        ){
                $this->mensaje = 1;
            } else {
                $this->mensaje = 0;
            }
        }
    }

    if (isset($id_tipo_pared)) {
        for ($i=0; $i <count($id_tipo_pared) ; $i++) { 
            if ($this->modelo->Registrar_Paredes(
                [
                    'id_tipo_pared' => $id_tipo_pared[$i],
                    'id_vivienda' => $id_vivienda,
                    'estado'   => 1
                ]
            )
        ){
                $this->mensaje = 1;
            } else {
                $this->mensaje = 0;
            }
        }
    }

    if (isset($id_tipo_piso)) {
        for ($i=0; $i <count($id_tipo_piso) ; $i++) {
            if ($this->modelo->Registrar_Pisos(
                [
                    'id_tipo_piso' => $id_tipo_piso[$i],
                    'id_vivienda' => $id_vivienda,
                    'estado'   => 1
                ]
            )
        ){
                $this->mensaje = 1;
            } else {
                $this->mensaje = 0;
            }
        }
    }

    echo $this->mensaje;

    exit();
    return false;
}

public function Eliminar_Vivienda() 
{

    if ($this->modelo->Eliminar($_POST['id'])) { 
        $this->mensaje = 'Vvienda Eliminada Exitosamente';
    } else {
        $this->mensaje = 0;
    }

    echo $this->mensaje;
    return false;
} 



public function Electrodomesticos_Gases()
{

    $id= $this->Ultimo_Ingresado("vivienda","id_vivienda");

    $gas=$_POST['gases'];
    $electrodomesticos=$_POST['electrodomesticos'];


    foreach ($id as $i) {

        $id_vivienda=$i['MAX(id_vivienda)'];
    }



    for($i=0;$i<count($gas);$i++){
      if($gas[$i]['nuevo']=='0'){
        echo    $this->modelo->registrar_vivienda_gas([
         "id_servicio_gas"   =>   $gas[$i]['servicio_gas'],
         "id_vivienda"       =>   $id_vivienda,
         "tipo_bombona"      =>   $gas[$i]['tipo_bombona'],
         "dias_duracion"     =>   $gas[$i]['tiempo_duracion']
     ]);
    }
    else{
       $this->Registrar_Tablas('servicio_gas','nombre_servicio_gas',$gas[$i]['servicio_gas']);
       $id_gas=$this->Ultimo_Ingresado("servicio_gas","id_servicio_gas");

       foreach ($id_gas as $ig) {

           echo    $this->modelo->registrar_vivienda_gas([
             "id_servicio_gas"   =>   $ig['MAX(id_servicio_gas)'],
             "id_vivienda"       =>   $id_vivienda,
             "tipo_bombona"      =>   $gas[$i]['tipo_bombona'],
             "dias_duracion"     =>   $gas[$i]['tiempo_duracion']
         ]);
       }

   }
}





for($i=0;$i<count($electrodomesticos);$i++){
  if($electrodomesticos[$i]['nuevo']=='0'){
   echo   $this->modelo->registrar_vivienda_electrodomesticos([
     "id_electrodomestico"   =>   $electrodomesticos[$i]['electrodomestico'],
     "id_vivienda"       =>   $id_vivienda,
     "cantidad"      =>   $electrodomesticos[$i]['cantidad'],
 ]);
}
else{
   $this->Registrar_Tablas('electrodomesticos','nombre_electrodomestico',$electrodomesticos[$i]['electrodomestico']);
   $id_elect=$this->Ultimo_Ingresado("electrodomesticos","id_electrodomestico");

   foreach ($id_elect as $ie) {

      echo   $this->modelo->registrar_vivienda_electrodomesticos([
         "id_electrodomestico"   =>   $ie['MAX(id_electrodomestico)'],
         "id_vivienda"       =>   $id_vivienda,
         "cantidad"      =>   $electrodomesticos[$i]['cantidad'],
     ]);
  }

}
}

}


public function eliminacion_logica(){

 echo $this->Desactivar("vivienda","id_vivienda",$_POST['id_vivienda']);


}

public function eliminacion_vivienda(){
    $ids=explode("-",$_POST['id']);


    echo $this->modelo->Eliminar($ids[0],$ids[1]);
   
   
   }


   public function activar_vivienda(){
    $ids=explode("-",$_POST['id_vivienda']);


    echo $this->Activar("vivienda","id_vivienda",$ids[0]);
   
   
   }

   public function get_techos(){
       $techos_vivienda=$this->modelo->get_techos_vivienda($_POST['id_vivienda']);
       echo json_encode($techos_vivienda);
   }

   public function get_pisos(){
    $pisos_vivienda=$this->modelo->get_pisos_vivienda($_POST['id_vivienda']);
    echo json_encode($pisos_vivienda);
}

   public function get_paredes(){
    $paredes_vivienda=$this->modelo->get_paredes_vivienda($_POST['id_vivienda']);
    echo json_encode($paredes_vivienda);
}

   public function borrar_techo(){
       echo $this->Eliminar_Tablas("vivienda_tipo_techo","id_vivienda_tipo_techo",$_POST['id']);
   }

   public function borrar_pared(){
    echo $this->Eliminar_Tablas("vivienda_tipo_pared","id_vivienda_tipo_pared",$_POST['id']);
}

public function borrar_piso(){
    echo $this->Eliminar_Tablas("vivienda_tipo_piso","id_vivienda_tipo_piso",$_POST['id']);
}

   public function add_techo(){
       $id_vivienda=$_POST['id'];
       $id_techo=$_POST['id_techo'];
       $retornar=1;
       $tipos_techos=$this->Consultar_Columna("vivienda_tipo_techo","id_vivienda",$id_vivienda);
       foreach($tipos_techos as $tp){
           if($tp['id_tipo_techo']==$id_techo){
               $retornar=0;
           }
       }

       if($retornar!=0){
           $this->modelo->Registrar_Techos([
               "id_tipo_techo"=>$id_techo,
               "id_vivienda"=>$id_vivienda,
               "estado"=>1
           ]);
       }
       
       echo $retornar;
   }


   public function add_pared(){
    $id_vivienda=$_POST['id'];
    $id_pared=$_POST['id_pared'];
    $retornar=1;
    $tipos_paredes=$this->Consultar_Columna("vivienda_tipo_pared","id_vivienda",$id_vivienda);
    foreach($tipos_paredes as $tp){
        if($tp['id_tipo_pared']==$id_pared){
            $retornar=0;
        }
    }

    if($retornar!=0){
        $this->modelo->Registrar_Paredes([
            "id_tipo_pared"=>$id_pared,
            "id_vivienda"=>$id_vivienda,
            "estado"=>1
        ]);
    }
    
    echo $retornar;
}

public function add_piso(){
    $id_vivienda=$_POST['id'];
    $id_piso=$_POST['id_piso'];
    $retornar=1;
    $tipos_pisos=$this->Consultar_Columna("vivienda_tipo_piso","id_vivienda",$id_vivienda);
    foreach($tipos_pisos as $tp){
        if($tp['id_tipo_piso']==$id_piso){
            $retornar=0;
        }
    }

    if($retornar!=0){
        $this->modelo->Registrar_Pisos([
            "id_tipo_piso"=>$id_piso,
            "id_vivienda"=>$id_vivienda,
            "estado"=>1
        ]);
    }
    
    echo $retornar;
}

}
?> 