?>


<?php
include_once '../Model/viaMalEstado/viaMalEstadoModel.php';

Class ViaMalEstadoController{

    public function getViaMalEstado(){
        $obj = new viaMalEstadoModel();
        $sql="SELECT  v.*, d.nombre_danio, e.estado as Edescripcion FROM via_mal_estado v, danio d, estado e WHERE d.id_danio=v.id_danio AND v.id_estado = e.id_estado ORDER BY v.id_via_mal_estado ASC";
        $via_mal_estado = $obj->consult($sql);

        include_once '../View/ViaMalEstado/viaMalEstadoConsult.php';
}


public function getCreate() {
    $model = new viaMalEstadoModel();
$sql = "SELECT * FROM danio";
$tip_danio = $model->consult($sql);

if(!empty($tip_danio)){
    include_once '../View/viaMalEstado/createViaMalEstado.php';
     
 } else {
     echo "no trae nada";
}
}


public function postCreate() {

    $obj = new viaMalEstadoModel();

    $via_desc = $_POST['descripcion'];
    $via_danio = $_POST['id_danio'];
    $via_direcc = $_POST['direccion'];
    $via_usu = $_SESSION['id_usuario'];
   

    $validacion = true;

    if (empty($via_desc)) {
        $_SESSION['errores'][] = "El campo descripcion es requerido";
        $validacion = false;
    }
    if (empty($via_danio)) {
        $_SESSION['errores'][] = "El campo daño es requerido";
        $validacion = false;
    }
    if (empty($via_direcc)) {
        $_SESSION['errores'][] = "El campo direccion es requerido";
        $validacion = false;
    }
    

    if ($validacion) {

        $id = $obj->autoIncrement("via_mal_estado", "id_via_mal_estado");

        $sql = "INSERT INTO via_mal_estado (id_via_mal_estado, descripcion, id_danio, direccion, id_usuario, id_estado) 
                VALUES ($id, '$via_desc',$via_danio,'$via_direcc', $via_usu , 3,)";

        if ($obj->insert($sql)) {
            redirect("index.php");
        } else {
            echo "Se ha producido un error al insertar";
        }
    } else {
        redirect(getUrl("Usuario", "Usuario", "getCreate"));
    }
}
}
?>