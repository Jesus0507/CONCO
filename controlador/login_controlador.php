<?php

class Login extends Controlador 
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = ""; 
     //   $this->Cargar_Modelo("login");
    }

    public function Cargar_Vistas()
    {
        $this->vista->Cargar_Vistas('login/index');
    }

    public function Ingresar()
    {
        if (isset($_POST['datos']) && $_POST['captcha'] !== "") {

            session_start();
            
            $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
            $captcha = $_POST['captcha'];

            $contrasenia = $this->Codificar($datos['password']);

            $fecha = date("Y") . "-" . date("m") . "-" . date("d");
            $hora_inicio = date("h") . ":" . date("i") . ":" . date("s") . " " . date("A");

            switch (date("l")) {
                case "Monday":$dia = "Lunes";
                    break;
                case "Thuesday":$dia = "Martes";
                    break;
                case "Wednesday":$dia = "Miercoles";
                    break;
                case "Thursday":$dia = "Jueves";
                    break;
                case "Friday":$dia = "Viernes";
                    break;
                case "Saturday":$dia = "Sábado";
                    break;
                default:$dia = "Domingo";
                    break;
            }

            $acciones = "";
            $hora_fin = "Activo";

            $this->Cargar_Modelo("personas");
            $datos_u = $this->modelo->Consultar(); 

            
            foreach ($datos_u as $tabla_usuario) {
                if ($tabla_usuario['cedula_persona'] == $_POST['cedula_usuario'] && $tabla_usuario['contrasenia'] == $contrasenia) {
                    
                        $this->Cargar_Modelo("bitacora");
                        if ($this->modelo->Registro_De_Inicio(
                            [
                                'cedula_usuario' => $_POST['cedula_usuario'],
                                'fecha' => $fecha,
                                'dia' => $dia,
                                'hora_inicio' => $hora_inicio,
                                'acciones' => $acciones,
                                'hora_fin' => $hora_fin,
                            ]
                        )) {
                            echo '';

                        } else {
                            echo '';
                        }

                        $this->set_Usuario_Actual(
                            $tabla_usuario['cedula_persona'], 
                            $tabla_usuario['primer_nombre'], 
                            $tabla_usuario['primer_apellido'], 
                            $tabla_usuario['correo'],
                            $tabla_usuario['estado'], 
                            $tabla_usuario['rol_inicio']
                        );

                        if($tabla_usuario['rol_inicio']!='Habitante'){
                                header('location:' . constant('URL') . "inicio/");
                        }
                        else{
                        header('location:' . constant('URL') . "habitante/");
                    }
                        exit();

                }
            }

        } else {
            $this->vista->mensaje = "";
            session_start();
            session_destroy();
            $this->vista->Cargar_Vistas('login/index');
        }

    }

    public function Salir()
    {

        session_start();
        session_destroy();

        $hora_fin = date("h") . ":" . date("i") . ":" . date("s") . " " . date("A");

        $this->Cargar_Modelo("bitacora");
        foreach ($this->modelo->Consultar_Bitacora() as $key => $value) { 
            $id_bitacora = $value['id_bitacora'];
        }

        if ($this->modelo->Registro_De_Salida(
            [
                'hora_fin' => $hora_fin,
                'id_bitacora' => $id_bitacora,
            ]
        )) {
            echo '';
        } else {
            echo '';
        }

        $this->vista->Cargar_Vistas('login/index');

    }

    public function Verificar_Usuario($cedula, $contrasenia)
    {

        if ($this->modelo->Usuario_Existe($cedula, $contrasenia)) {
            $this->mensaje = 'Correcto.';
            return true;
        } else {
            $this->mensaje = 'Datos incorrectos.';
            header('location:' . constant('URL') . "login/");
            return false;
        }
    }

    public function consultar_recuperar(){
        $cedula=$_POST['cedula'];
        $resultado=$this->Consultar_Columna("personas","cedula_persona",$cedula);
        if($resultado[0]['preguntas_seguridad']!='' || $resultado[0]['preguntas_seguridad']!=null){
            $resultado[0]['preguntas_seguridad']=$this->Decodificar($resultado[0]['preguntas_seguridad']);
        }
        echo json_encode($resultado);
    }

    public function set_Usuario_Actual($cedula, $nombre, $apellido, $correo, $estado, $rol_inicio)
    {
        $_SESSION['cedula_usuario'] = $cedula;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['correo'] = $correo;
        $_SESSION['estado'] = $estado;
        $_SESSION['rol_inicio'] = $rol_inicio;
        $_SESSION['modulo_actual']="Inicio";
         
        $this->Cargar_Modelo("seguridad");
        $permisos=$this->modelo->get_permisos_rol($rol_inicio);

        $_SESSION['Solicitudes']=$permisos[0];
        $_SESSION['Personas']=$permisos[1];
        $_SESSION['Agenda']=$permisos[2];
        $_SESSION['Comite']=$permisos[3];
        $_SESSION['Grupos deportivos']=$permisos[4];
        $_SESSION['Parto humanizado']=$permisos[5];
        $_SESSION['Enfermos']=$permisos[6];
        $_SESSION['Negocios']=$permisos[7];
        $_SESSION['Nucleo familiar']=$permisos[8];
        $_SESSION['Sector agricola']=$permisos[9];
        $_SESSION['Centros votacion']=$permisos[10];
        $_SESSION['Viviendas']=$permisos[11];
        $_SESSION['Inmuebles']=$permisos[12];
        $_SESSION['Discapacitados']=$permisos[13];
        $_SESSION['Vacunados COVID']=$permisos[14];
        $_SESSION['Seguridad']=$permisos[15];



    }

}
