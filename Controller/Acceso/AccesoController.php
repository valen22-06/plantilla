<?php 

include_once '../Model/Acceso/AccesoModel.php'; 
class AccesoController {
    public function login(){

        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM personas WHERE documento_persona='$user'";

        $usuario = $obj -> consult($sql);

        $hash = password_hash($pass, PASSWORD_DEFAULT);


        if (pg_num_rows($usuario)>0){
            foreach($usuario as $usu){
                if(password_verify($pass, $usu['contrasenia_persona'])){
                    $_SESSION['documento'] = $usu['documento_persona'];
                    $_SESSION['nombre1'] = $usu['primer_nombre_persona'];
                    $_SESSION['nombre2'] = $usu['segundo_nombre_persona'];
                    $_SESSION['apellido1'] = $usu['primer_apellido_persona'];
                    $_SESSION['apellido2']=$usu['segundo_apellido_persona'];
                    $_SESSION['email']=$usu['email_persona'];
                    $_SESSION['telefono']=$usu['telefono_persona'];
                    $_SESSION['nacimiento']=$usu['fecha_nacimiento_persona'];
                    

                    $_SESSION['auth'] = "ok";
                    redirect("index.php");
                } else {
                    $_SESSION['error'][] = "Usuario y/o contrasenia incorrecto";
                    
                    
                }
            }    

        } else {

            $_SESSION['error'] []= "Usuario y/o contrasenia incorrecto";
            
            
        }
    }

    public function logout(){
        session_destroy();
        redirect("login.php");

    }
}

?>