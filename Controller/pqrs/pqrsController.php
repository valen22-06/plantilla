<?php
include_once '../Model/Pqrs/pqrsModel.php';

class pqrsController{
    public function getPQRS(){
        $obj = new pqrsModel();
        $sql = "SELECT p.*,c.nombre_categoria_pqrs as nom_cat, e.nombre_estado as nom_est FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs order by id_pqrs ASC";
        $pqrs = $obj->consult($sql);
    
        include_once '../View/pqrs/consultPqrs.php';
    }
    
    public function getCreatePQRS(){
        $obj = new pqrsModel();
        $sql = "SELECT * FROM categoria_pqrs";
        $cat_pqrs = $obj->consult($sql);

         if(!empty($cat_pqrs)){
            include_once '../View/pqrs/createPQRS.php';
             
         } else {
             echo "no trae nada";
        }
    
        
    }

    public function postCreatePQRS(){
        $obj = new pqrsModel();
        $id = $obj->autoIncrement("pqrs", "id_pqrs");
        $id_cat = $_POST['cat_pqrs'];
        $comentario = $_POST['comentario'];
        $validacion = true;

        if ($validacion) {

            $sql = "INSERT INTO pqrs VALUES ($id, $id_cat, '$comentario', 3)";
    
            if ($obj->insert($sql)) {
                redirect("index.php");
            } else {
                echo "Se ha producido un error al insertar";
            }

        } else {
            redirect(getUrl("pqrs", "pqrs", "getCreate"));
        }
    }

    public function postUpdateStatus(){
        $obj = new pqrsModel();
        $id_pqrs=$_POST['user'];
        $est_id = $_POST['id'];
    
        if ($est_id==3) {
            $statusToModify = 4;
        } elseif ($est_id==4) {
            $statusToModify = 3;
        }
    
        $sql = "UPDATE pqrs SET estado_pqrs = $statusToModify WHERE id_pqrs=$id_pqrs";
    
        $ejecutar = $obj->update($sql);
    
        if($ejecutar!=0){
            $sql="SELECT p.*,c.nombre_categoria_pqrs as nom_cat,e.nombre_estado as nom_est FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs";
            $usuarios = $obj->consult($sql);
            include_once '../View/pqrs/consultPqrs.php';
        } else {
            echo "No se pudo actualizar";
        }
        
    }

}

    

?>