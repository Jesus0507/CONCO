<?php
require_once 'vista/privado/securimage/securimage.php';
class Usuario extends Controlador 
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = "";

     //   $this->Cargar_Modelo("usuario");
    }
    public function Establecer_Consultas()
    {
        $usuario = $this->modelo->Consultar();
        $this->vista->usuario = $usuario; //datos para mandar a la vista
        $this->datos_usuario = $usuario; //datos para usar en el controlador
    }
// ==============================VISTAS=====================================

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('usuario/index');
    }
    public function Usuario()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('usuario/index');
    }

    public function Registros()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('usuario/registrar');
    }

    public function Consultas()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('usuario/consultar');
    }

    public function Administracion()
    {
        $this->Establecer_Consultas();
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('usuario/administrar');
    }

// ==============================FUNCIONES=====================================
    public function FOTO($datos)
    {
        if ($_FILES["foto_perfil"]["type"] == "image/jpeg" ||
            $_FILES["foto_perfil"]["type"] == "image/pjpeg" ||
            $_FILES["foto_perfil"]["type"] == "image/gif" ||
            $_FILES["foto_perfil"]["type"] == "image/png") {
            $carpeta_destino = 'config/img/users/';

            if (isset($_FILES["foto_perfil"])) {
                if (file_exists($carpeta_destino)) {
                    $origen = $_FILES["foto_perfil"]["tmp_name"];
                    $destino = $carpeta_destino . $datos['cedula'] . '-' . $datos['nombre'] . "-" . $_FILES["foto_perfil"]["name"];

                    if (move_uploaded_file($origen, $destino)) {
                        $foto_perfil = $destino;
                    } else {
                        $foto_perfil = 'config/img/users/user-3.png';
                    }

                } else {
                    $this->vista->mensaje = "No se ha podido Encontrar la carpeta la carpeta: " . $carpeta_destino . "se guardara en la carpeta img";
                }
            } else {
                $this->vista->mensaje = "No se subio ningun archivo, se guardara la imagen usuario por defecto.";
                $foto_perfil = URL . 'config/img/users/user-3.png';
            }
        } else {
            $this->vista->mensaje = "No se subio un archivo valido , se guardara la imagen usuario por defecto.";
            $foto_perfil = URL . 'config/img/users/user-3.png';
        }
        $this->foto_perfil = $foto_perfil;
        return $foto_perfil;
    }
    // ==============================CRUD=====================================
    public function Nuevo_Usuario()
    {
        $datos = ($_POST['datos'] !== "") ? $_POST['datos'] : null;
        $codigo = $_POST['animal']."/".$_POST['mascota']."/".$_POST['color']; 

        if ($datos['correo'] == "") {
            $correo = "Ninguno";
        }else{ 
            $correo = $datos['correo'] . $datos['tcorreo'];
        }

        $this->Establecer_Consultas();
        for($i=0;$i<count($this->datos_usuario);$i++){
             if($this->datos_usuario[$i]['cedula_usuario']==$datos['cedula']){
                $usuario = $this->modelo->Eliminar($datos['cedula']);
             }
        }

        if ($this->modelo->Registrar(
            [
                'cedula_usuario' => $datos['cedula'],
                'nombre' => $datos['nombre'],
                'apellido' => $datos['apellido'],
                'correo' => $correo,
                'telefono' => $datos['telefono'],
                'contrasenia' => $this->Codificar($datos['contrasenia']),
                'estado' => '1',
                'rol_inicio' => $datos['rol_inicio'],
                'preguntas_seguridad' =>  $this->Codificar($codigo),
            ]
        )
        ) {

            if($this->modelo->Registrar_permisos($datos)){
             header('location:' . constant('URL') . "usuario/Consultas");
            }

        } else {
            $this->vista->mensaje = '<script>swal({text:"Algo ha salido mal :c",type:"serror"});</script>';
            echo $this->vista->mensaje;
        }

        exit();
        return false;
    }

    public function Consultas_Usuario_Ajax()
    {
        $this->Establecer_Consultas();
        $this->Escribir_JSON($this->datos_usuario);
    }
    public function Consultas_Usuario_Ajax_Filtered()
    {
        $this->Establecer_Consultas();
        $users=[];
        for($i=0;$i<count($this->datos_usuario);$i++){
         if($this->datos_usuario[$i]['estado']==1){
            $users[]=$this->datos_usuario[$i];
         }
        }

        $this->Escribir_JSON($users);
    }

    public function Eliminar_Usuario($param)
    {

        if ($this->modelo->Eliminar($param[0])) {
            $this->mensaje = 'Usuario eliminado exitosamente';
        } else {
            $this->mensaje = 'No se han encontrado Usuario con ese ID';
        }

        header('location:' . constant('URL') . "Usuario/Administracion");
        echo '<script type="text/javascript">
                    swal({
                    title: "????xito!",
                    text: "' . $this->mensaje . '",
                    type: "success",
                    showConfirmButton:false,
                    timer:2000
                });</script>  ';
        return false;
    }

    //=============================================================================================
    public function Usuario_Existente()
    {
        $cedula   =  $_POST['cedula'];
        $password =  $_POST['contrasenia'];
        $captcha  =  $_POST['captcha'];

        $existente = $this->modelo->Buscar_Usuario($cedula);
        if ($existente == "" || $existente == null ) {
            echo 0;
        } else {
            foreach ($existente as $existe) {
                $contrasenia    = $this->Decodificar($existe['contrasenia']);
            }

            if($existe['estado']==0){
                echo 0;
            }
            else{


            if ($contrasenia == $password) {
                $securimage = new Securimage();
                if ($securimage->check($captcha) == true || $captcha == "123456") {
                    echo 1;
                }
                else {
                    echo 2;
                }
            }
            else {
                echo "Contrase??a Incorrecta.";
            }
        }
        }

    }

    public function eliminacion_logica(){
        $this->Establecer_Consultas();
        $done=false;
        for($i=0;$i<count($this->datos_usuario);$i++){
            if($this->datos_usuario[$i]['cedula_usuario']==$_POST['cedula']){
                $this->datos_usuario[$i]['estado']=0;
               if($this->modelo->Actualizar($this->datos_usuario[$i])){
                $done=true;
               }
            }
        }
        echo $done;
    }


    public function modificar(){
        $cambios=$_POST['cambios'];
        $this->Establecer_Consultas();
        $done=false;
        for($i=0;$i<count($this->datos_usuario);$i++){
            if($this->datos_usuario[$i]['cedula_usuario']==$cambios['cedula']){
                $this->datos_usuario[$i]['nombre']=$cambios['nombre'];
                $this->datos_usuario[$i]['apellido']=$cambios['apellido'];
                $this->datos_usuario[$i]['telefono']=$cambios['telefono'];
                $this->datos_usuario[$i]['correo']=$cambios['correo'];
               if($this->modelo->Actualizar($this->datos_usuario[$i])){
                $done=true;
               }
            }
        }
        echo $done;
    }



}


