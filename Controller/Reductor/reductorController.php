<?php
    include_once '../Model/Reductor/ReductorModel.php';
    class ReductorController{
        public function getCreate() {
            $model = new reductorModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
              
                
            include_once '../View/reductor/createReductor.php';

        }
    }
?>