<?php
include_once '../Model/Usuarios/usuariosModel.php';


class UsuariosController{

    public function getUsuarios(){
            $obj = new usuariosModel();
            $sql="SELECT  u.*, r.nombre_rol as Rdescripcion, e.nombre_estado as Edescripcion FROM usuarios u, roles r, estado e WHERE u.id_rol=r.id_rol AND u.id_estado = e.id_estado ORDER BY u.id_usuario ASC";
            $usuarios = $obj->consult($sql);

            include_once '../View/Usuarios/consult.php';
    }


    public function getCreate() {
        $model = new usuariosModel();
        $sql = "SELECT * FROM tipo_documento";
        $tipo_documento = $model->consult($sql);
    
        if (empty($tipo_documento)) {
            $tipo_documento = []; 
        }
    
        include_once '../View/Usuarios/signup.php';
    }
    
    
    
    

    public function postCreate() {
        $obj = new usuariosModel();

        $usu_tipo = $_POST['id_tipo_documento'];
        $usu_documento = $_POST['numero_documento'];
        $usu_nombre1 = $_POST['primer_nombre'];
        $usu_nombre2 = $_POST['segundo_nombre'];
        $usu_apellido1 = $_POST['primer_apellido'];
        $usu_apellido2 = $_POST['segundo_apellido'];
        $usu_correo = $_POST['correo'];
        $usu_clave = $_POST['contrasenia'];
        $usu_telefono = $_POST['telefono'];
        $usu_direccion = $_POST['direccion_residencia'];
        $f_nacimiento = $_POST['fecha_nacimiento'];
    
        $validacion = true;
    
        if (empty($usu_documento)) {
            $_SESSION['errores'][] = "El campo documento es requerido";
            $validacion = false;
        }
        if (empty($usu_nombre1)) {
            $_SESSION['errores'][] = "El campo nombre es requerido";
            $validacion = false;
        }
        if (empty($usu_apellido1)) {
            $_SESSION['errores'][] = "El campo apellido es requerido";
            $validacion = false;
        }
        if (empty($usu_apellido2)) {
            $_SESSION['errores'][] = "El campo segundo apellido es requerido";
            $validacion = false;
        }
        if (empty($usu_correo)) {
            $_SESSION['errores'][] = "El campo correo es requerido";
            $validacion = false;
        }
        if (empty($usu_clave)) {
            $_SESSION['errores'][] = "El campo clave es requerido";
            $validacion = false;
        }
    
        // if (validarCampoLetras($usu_nombre1) == false) {
        //     $_SESSION['errores'][] = "El campo nombre solo debe contener letras";
        //     $validacion = false;
        // }
        // if (validarCampoLetras($usu_nombre2) == false) {
        //     $_SESSION['errores'][] = "El campo nombre solo debe contener letras";
        //     $validacion = false;
        // }
        // if (validarCampoLetras($usu_apellido1) == false) {
        //     $_SESSION['errores'][] = "El campo apellido solo debe contener letras";
        //     $validacion = false;
        // }
        // if (validarCampoLetras($usu_apellido2) == false) {
        //     $_SESSION['errores'][] = "El campo apellido solo debe contener letras";
        //     $validacion = false;
        // }
    
        if (validarCorreo($usu_correo) == false) {
            $_SESSION['errores'][] = "El campo correo no cumple, verifica que coincida con example@gmail.com";
            $validacion = false;
        }
    
        if (validarClave($usu_clave) == false) {
            $_SESSION['errores'][] = "El campo clave debe contener un número, un carácter especial, una mayúscula y ser de más de 8 caracteres";
            $validacion = false;
        }
    
        $hash = password_hash($usu_clave, PASSWORD_DEFAULT);
    
        if ($validacion) {
            $id = $obj->autoIncrement("usuarios", "id_usuario");
            $sql = "INSERT INTO usuarios (id_usuario, id_tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono, correo, direccion_residencia, fecha_nacimiento, contrasenia, id_estado, id_rol) 
                    VALUES ($id, $usu_tipo , '$usu_documento', '$usu_nombre1', '$usu_nombre2', '$usu_apellido1', '$usu_apellido2', $usu_telefono, '$usu_correo', '$usu_direccion', '$f_nacimiento', '$hash', 1, 3)";
    
            if ($obj->insert($sql)) {
                redirect("login.php");
            } else {
                echo "Se ha producido un error al insertar";
            }
        } else {
            redirect(getUrl("Usuarios", "Usuarios", "getCreate"));
        }
    }
    

    public function getUpdate(){
        $obj = new UsuariosModel();

        $usu_id= $_GET['usuarioId'];

        $sql = "SELECT * FROM usuarios WHERE usuarioId = $usu_id";
        $usuarios = $obj->consult($sql);

        include_once '../view/Usuarios/update.php';

    }

    public function postUpdate(){

        $obj = new UsuariosModel();

        $usu_documento=$_POST['documento_persona'];
        $usu_nombre1 = $_POST['primer_nombre_persona'];
        $usu_nombre2 = $_POST['segundo_nombre_persona'];
        $usu_apellido1 = $_POST['primer_apellido_persona'];
        $usu_apellido2 = $_POST['segundo_apellido_persona'];
        $usu_correo = $_POST['email_persona'];
        $usu_clave = $_POST['contrasenia_persona'];
        $usu_telefono=$_POST['telefono_persona'];
        $f_nacimiento=$_POST['fecha_nacimiento_persona'];
        $rol_id = $_POST['rol_persona'];
        

        // if(empty($usu_documento)){
        //     $_SESSION['errores'][]="El campo documento es requerido";
        // }
        // if(empty($usu_nombre1)){
        //     $_SESSION['errores'][]="El campo nombre es requerido";
        //     $validacion = false;
        // }
        
    
        // if(empty($usu_apellido1)){
        //     $_SESSION['errores'][]="El campo apellido es requerido";
        //     $validacion = false;
        // }
        // if(empty($usu_apellido2)){
        //     $_SESSION['errores'][]="El campo nombre es requerido";
        //     $validacion = false;
        // }
    
        // if(empty($usu_correo)){
        //     $_SESSION['errores'][]="El campo correo es requerido";
        //     $validacion = false;
        // }
    
        // if(empty($usu_clave)){
        //     $_SESSION['errores'][]="El campo  clave es requerido";
        //     $validacion = false;
        // }
    
        // // if(empty($rol_id)){
        // //     $_SESSION['errores'][]="El campo rol es requerido";
        // //     $validacion = false;
        // // }
        // if(validarCamponum($usu_documento)==false){
        //     $_SESSION['errores'][]="El campo documento solo admite numeros";
        //     $validacion=false;
        // }
        // if (validarCampoLetras($usu_nombre1) == false) {
        //     $_SESSION['errores'][]="El campo nombre solo debe contener letras";
        //     $validacion = false;
        // }
        // if (validarCampoLetras($usu_nombre2) == false) {
        //     $_SESSION['errores'][]="El campo nombre solo debe contener letras";
        //     $validacion = false;
        // }

    
        // if (validarCampoLetras($usu_apellido1) == false) {
        //     $_SESSION['errores'][]="El campo apellido solo debe contener letras";
        //     $validacion = false;
        // }
        // if (validarCampoLetras($usu_apellido2) == false) {
        //     $_SESSION['errores'][]="El campo apellido solo debe contener letras";
        //     $validacion = false;
        // }
    
        // if(validarCorreo($usu_correo) == false){
        //     $_SESSION['errores'][] = "El campo correo no cumple, verifica que coincida con example@gmail.com";
        //     $validacion = false;
        // }
    
        // if(validarClave($usu_clave)== false){
        //     $_SESSION['errores'][] = "El campo clave debe contener un numero, un caracter especial, una mayuscula y ser de mas de 8 caracteres";
        //     $validacion = false;
        // }


        // $sql = "UPDATE tareas SET tareaNombre = '$usu_nombre1', tareaDescripcion = 'usu_descripcion', usuarioId = $id WHERE tareaId = $usu_id";
        // echo "Usuario ID: " . $usu_id;
        // echo $sql;

        // $ejecutar = $obj->update($sql);
        // echo $sql;

        

        // if($ejecutar){
        //     redirect(getUrl("Tareas","Tareas","getTareas"));
        // }else{
        //     echo "Se ha producido un error al insactualizarertar";
        // }


    }

    public function postDelete(){
        $obj = new UsuariosModel();
    
        $usu_id = $_POST['usuarioId'];
        
        $sql = "DELETE FROM usuarios WHERE usuarioId = $usu_id";
      
    
        $ejecutar = $obj->delete($sql);
        echo $sql;
    
        
    
        if($ejecutar){
            redirect(getUrl("Usuarios","Usuarios","getUsuarios"));
        }else{
            echo "Se ha producido un error al eliminar";
            redirect(getUrl("Usuarios","Usuarios","getUsuarios"));
        }
    }

    public function buscar(){
        $obj = new usuariosModel();
    
        $buscar = $_POST['buscar'];

        $sql = "SELECT  u.*, r.descripcion as Rdescripcion, e.descripcion as Edescripcion FROM usuarios u, rol r, estado e WHERE u.rolId=r.id AND u.estadoId = e.id_estado AND (u.usuarioNombre LIKE '%$buscar%' OR u.usuarioApellido LIKE '%$buscar%' OR usuarioEmail LIKE '%$buscar%') ORDER BY u.usuarioId ASC";

        $usuarios = $obj->consult($sql);

        include_once '../view/usuarios/buscar.php';

    }

    public function getDelete(){
        $obj = new usuariosModel();

        $usu_id= $_GET['usuarioId'];

        $sql = "SELECT * FROM usuarios WHERE usuarioId = $usu_id";
        $usuarios = $obj->consult($sql);

        include_once '../view/Usuarios/delete.php';

    }
    public function postUpdateStatus(){
        $obj = new usuariosModel();
        $usu_id=$_POST['user'];
        $est_id = $_POST['id'];
    
        if ($est_id==1) {
            $statusToModify = 2;
        } elseif ($est_id==2) {
            $statusToModify = 1;
        }
    
        $sql = "UPDATE usuarios SET id_estado = $statusToModify WHERE id_estado=$usu_id";
    
        $ejecutar = $obj->update($sql);
    
        if($ejecutar){
            $sql="SELECT  u.*, r.descripcion as Rdescripcion, e.descripcion as Edescripcion FROM usuarios u, rol r, estado e WHERE u.rolId=r.id AND u.estadoId = e.id_estado ORDER BY u.usuarioId ASC";
            $usuarios = $obj->consult($sql);
            include_once '../View/Usuarios/buscar.php';
        } else {
            echo "No se pudo actualizar";
        }
        
    }
}




?>