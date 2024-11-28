<?php
include_once '../Model/Solicitudes/pqrsModel.php';

class pqrsController{
    public function getPQRS(){
        $obj = new pqrsModel();
        $sql = "SELECT * FROM pqrs";
        $pqrs = $obj->consult($sql);
    
        // include_once '../View/Solicitudes/consultPQRS.php';
    }
    
    public function getCreate(){
        $obj = new pqrsModel();
        $sql = "SELECT * FROM categoria_pqrs;";
        $cat_pqrs = $obj->consult($sql);
    
        include_once '../View/Solicitudes/createPQRS.php';
    }
}

    

?>