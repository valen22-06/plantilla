<?php
    include_once '../Model/Accidente/accidenteModel.php';
    class AccidenteController{
        public function getAccidente(){
            $obj = new accidenteModel();
            $sql="";
            $accidente = $obj->consult($sql);

            include_once '../View/accidente/consultAccidente.php';
        }

        public function getCreate() {
            $model = new accidenteModel();
            $sql = "SELECT * FROM tipo_danio";
            $tipo_danio =$model->consult($sql);
            $sql2="SELECT * FROM choque_detalle";
            $choque =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
              
                
            include_once '../View/accidente/createAccidente.php';

        }
        public function postCreate() {
            $obj = new accidenteModel();

            $acc_tipo_acc=$_POST['cat_accidente'];
        }
    }
?>