<?php
    include_once '../Model/ReductorM/ReductorMModel.php';
    class ReductorMController{
        public function getCreate() {
            $model = new reductorMModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql5="SELECT * FROM danio";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/reductorM/createReductorM.php';

        }
    }
?>