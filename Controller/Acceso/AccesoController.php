<?php 

include_once '../Model/Acceso/AccesoModel.php'; 

class AccesoController {
 

    public function login(){
        $conn = pg_connect("host=localhost dbname=geovisor user=postgres password=Valen123");
        
        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM usuarios WHERE numero_documento=$user";

        $params = array($user);

        $usuario = $obj -> consult($sql);


        if (pg_query_params($conn, $sql, $params)>0){
            foreach($usuario as $usu){
                if(password_verify($pass, $usu['contrasenia'])){
                    $_SESSION['documento'] = $usu['numero_documento'];
                    $_SESSION['nombre1'] = $usu['primer_nombre'];
                    $_SESSION['nombre2'] = $usu['segundo_nombre'];
                    $_SESSION['apellido1'] = $usu['primer_apellido'];
                    $_SESSION['apellido2']=$usu['segundo_apellido'];
                    $_SESSION['email']=$usu['correo'];
                    $_SESSION['telefono']=$usu['telefono'];
                    $_SESSION['nacimiento']=$usu['fecha_nacimiento'];
                    

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