<?php
    include_once '../Model/viaMalEstado/viaMalEstadoModel.php';
    class ViaMalEstadoController{

        public function getViaM(){
            $obj = new viaMalEstadoModel();
            $sql="SELECT v.*, e.nombre_estado as Edescripcion, d.nombre_danio as nombre_d FROM via_mal_estado v, estado e, danio d WHERE v.id_estado = e.id_estado AND d.id_danio=v.id_danio ORDER BY v.id_via_mal_estado ASC";
            $viaM = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/viaMalEstado/consultViaMalEstado.php';
        }
        public function getCreateViaM() {
            $model = new viaMalEstadoModel();
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql5="SELECT * FROM danio where id_tipo_danio=1";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/viaMalEstado/createViaMalEstado.php';

        }
        public function postCreateViaM(){
            $obj = new viaMalEstadoModel();

            $via_danio=$_POST['tipo_danio'];
            $via_via=$_POST['tipo_via'];
            $via_numvia=$_POST['numVia'];
            $via_letra= $_POST['letra'];
            $via_com= $_POST['complemento'];
            $via_num= $_POST['num'];
            $via_letra2= $_POST['letra2'];
            $via_com2= $_POST['complemento2'];
            $via_comentario=$_POST['comentario'];
            $id_usu = $_SESSION ['id_usu'];


            $dire=$via_via.' '.$via_numvia.' '.$via_letra.' '.$via_com.' '.$via_num.' '.$via_letra2.' '.$via_com2;
            $validacion = true; 

            if (empty($via_danio)) {
                $_SESSION['errores'][] = "El campo daño es requerido";
                $validacion = false;
            }
            if (empty($via_via)) {
                $_SESSION['errores'][] = "El campo tipo via es requerido";
                $validacion = false;
            }
            if (empty($via_numvia)) {
                $_SESSION['errores'][] = "El campo numero via es requerido";
                $validacion = false;
            }
            if (empty($via_letra)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($via_com)) {
                $_SESSION['errores'][] = "El campo complemento via es requerido";
                $validacion = false;
            }
            if (empty($via_num)) {
                $_SESSION['errores'][] = "El campo numero es requerido";
                $validacion = false;
            }
            if (empty($via_letra2)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($via_com2)) {
                $_SESSION['errores'][] = "El campo complemento es requerido";
                $validacion = false;
            }
            if ($validacion) {
                $id = $obj->autoIncrement("via_mal_estado");
                $sql = "INSERT INTO via_mal_estado (id_via_mal_estado, descripcion, direccion, id_danio, id_usuario, id_estado) VALUES ($id,'$via_comentario', '$dire',$via_danio, $id_usu, 3 )";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("ViaMalEstado", "ViaMalEstado", "getCreate"));
            }
        }
    }
?>