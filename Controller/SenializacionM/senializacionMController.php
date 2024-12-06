<?php
    include_once '../Model/SenializacionM/senializacionMModel.php';
    class SenializacionMController{

        public function getCreate() {
            $model = new senializacionMModel();
            $sql = "SELECT * FROM orientacion_senializacion";
            $orientacion =$model->consult($sql);
            $sql2="SELECT * FROM categoria_senializacion";
            $cat_sen =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_senializacion";
            $tipo_sen =$model->consult($sql3);
            $sql4="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql4);
            $sql5="SELECT * FROM danio";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/senializacionM/createSenializacionM.php';

        }
        public function postCreate() {
            $obj = new senializacionMModel();

            $sen_tipo_senializacion=$_POST['cat_senializacion'];
            $sen_fecha=$_POST['date'];
            $sen_cat_senializacion=$_POST['cat_sen'];
            $sen_t_sen=$_POST['t_sen'];
            $sen_via=$_POST['tipo_via'];
            $sen_numvia=$_POST['numVia'];
            $sen_letra= $_POST['letra'];
            $sen_com= $_POST['complemento'];
            $sen_num= $_POST['num'];
            $sen_letra2= $_POST['letra2'];
            $sen_com2= $_POST['complemento2'];
            $sen_comentario=$_POST['comentario'];
            $sen_tipo_via=$_POST['tipo_via'];

            $dire=$sen_numvia.' '.$sen_letra.' '.$sen_com.' '.$sen_num.' '.$sen_letra2.' '.$sen_com2;
            
            $validacion = true; 

            if (empty($sen_numvia)) {
                $_SESSION['errores'][] = "El campo numero via es requerido";
                $validacion = false;
            }
            if (empty($sen_letra)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($sen_com)) {
                $_SESSION['errores'][] = "El campo complemento via es requerido";
                $validacion = false;
            }
            if (empty($sen_num)) {
                $_SESSION['errores'][] = "El campo numero es requerido";
                $validacion = false;
            }
            if (empty($sen_letra2)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($sen_com2)) {
                $_SESSION['errores'][] = "El campo complemento es requerido";
                $validacion = false;
            }
            if (empty($sen_tipo_via)) {
                $_SESSION['errores'][] = "El campo tipo via es requerido";
                $validacion = false;
            }

            if ($validacion) {
                $id = $obj->autoIncrement("senializacion_vial_nueva");
                $sql = "INSERT INTO senializacion_vial_nueva VALUES ($id, $sen_tipo_senializacion, $sen_cat_senializacion, $sen_t_sen, '$sen_comentario', '$acc_comentario', ,'$dire', 3)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("SenializacionM", "SenializacionM", "getCreate"));
            }
        }
}
?>