<?php
    include_once '../Model/Senializacion/senializacionModel.php';
    class SenializacionController{

        public function getCreate() {
            $model = new senializacionModel();
            $sql = "SELECT * FROM tipo_danio";
            $tipo_danio =$model->consult($sql);
            $sql2="SELECT * FROM choque_detalle";
            $choque =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
              
                
            include_once '../View/senializacion/createSenializacion.php';

        }
}
?>