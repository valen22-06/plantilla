<?php
    include_once '../Model/SenializacionM/senializacionMModel.php';
    class SenializacionMController{
        public function getSenializacionM(){
            $obj = new senializacionMModel();
            $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion, d.nombre_danio as nombre_d FROM senializacion_vial_malestado s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t, danio d  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion AND d.id_danio=s.id_danio ORDER BY s.id_senializacion_vial_malestado ASC";
            $senializacion = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/senializacionM/consultSenializacionM.php';
        }

        public function getCreateSenializacionM() {
            $model = new senializacionMModel();
            $sql = "SELECT * FROM orientacion_senializacion";
            $orientacion =$model->consult($sql);
            $sql2="SELECT * FROM categoria_senializacion";
            $cat_sen =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_senializacion";
            $tipo_sen =$model->consult($sql3);
            $sql4="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql4);
            $sql5="SELECT * FROM danio where id_tipo_danio=2";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/senializacionM/createSenializacionM.php';

        }
        public function postCreateSenializacionM() {
            $obj = new senializacionMModel();

            $sen_tipo_senializacion=$_POST['cat_senializacion'];
            // $sen_fecha=$_POST['date'];
            $sen_cat_senializacion=$_POST['cat_sen'];
            $sen_t_sen=$_POST['t_sen'];
            $sen_danio=$_POST['tipo_danio'];
            $sen_via=$_POST['tipo_via'];
            $sen_numvia=$_POST['numVia'];
            $sen_letra= $_POST['letra'];
            $sen_com= $_POST['complemento'];
            $sen_num= $_POST['num'];
            $sen_letra2= $_POST['letra2'];
            $sen_com2= $_POST['complemento2'];
            $sen_comentario=$_POST['comentario'];
            $sen_tipo_via=$_POST['tipo_via'];
            $id_usu = $_SESSION ['id_usu'];

            $dire=$sen_via.' '.$sen_numvia.' '.$sen_letra.' '.$sen_com.' '.$sen_num.' '.$sen_letra2.' '.$sen_com2;
            
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
                $id = $obj->autoIncrement("senializacion_vial_malEstado");
                $sql = "INSERT INTO senializacion_vial_malestado VALUES ($id, '$sen_comentario','$dire',$sen_tipo_senializacion, $sen_cat_senializacion,  $sen_t_sen,$sen_danio ,$id_usu, 3)";
        
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