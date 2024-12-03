<?php 

include_once '../Model/Acceso/AccesoModel.php'; 

class AccesoController {
 

    public function getCreate(){
        $conn = pg_connect("host=localhost dbname=geovisor user=postgres password=Valen123");
        
        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM usuarios WHERE numero_documento=$user";

        $params = array($user);

        $usuario = $obj -> consult($sql);

        
        if (!empty($usuario)){
            foreach($usuario as $usu){
                if(password_verify($pass, $usu['contrasenia'])){
                    $_SESSION['id_usu'] = $usu['id_usuario'];
                    $_SESSION['documento'] = $usu['numero_documento'];
                    $_SESSION['nombre1'] = $usu['primer_nombre'];
                    $_SESSION['nombre2'] = $usu['segundo_nombre'];
                    $_SESSION['apellido1'] = $usu['primer_apellido'];
                    $_SESSION['apellido2']=$usu['segundo_apellido'];
                    $_SESSION['email']=$usu['correo'];
                    $_SESSION['telefono']=$usu['telefono'];
                    $_SESSION['direccion_residencia']=$usu[''];
                    $_SESSION['nacimiento']=$usu['direccion_residencia'];
                    $_SESSION['rol']=$usu['id_rol'];
                    $_SESSION['estado']=$usu['id_estado'];
                    

                    $_SESSION['auth'] = "ok";
                    redirect("index.php");
                } else {
                    $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                    redirect("login.php");
                    
                }
            }    

        } else {
            $_SESSION['error'] []= "Usuario y/o contrasenia incorrecto";
            
            redirect("login.php");
        }
    }

    public function logout(){
        session_destroy();
       redirect("login.php");

    }
}

?>