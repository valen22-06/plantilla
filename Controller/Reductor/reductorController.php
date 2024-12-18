<?php
    include_once '../Model/Reductor/ReductorModel.php';
    class ReductorController{

        public function getReductor(){
            $obj = new reductorModel();
            $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t FROM reductores_nuevo r, estado e, categoria_reductores c, tipo_reductor t  WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor ORDER BY r.id_reductores_nuevo ASC";
            $redu = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/reductor/consultReductor.php';
        }
        public function getCreateReductor() {
            $model = new reductorModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
              
                
            include_once '../View/reductor/createReductor.php';

        }
        public function postCreateReductor(){
            $obj = new reductorModel();

            $redu_cat_redu=$_POST['cat_reductor'];
            // $redu_fecha=$_POST['date'];
            $redu_tipo=$_POST['tipo_reductor'];
            $redu_via=$_POST['tipo_via'];
            $redu_numvia=$_POST['numVia'];
            $redu_letra= $_POST['letra'];
            $redu_com= $_POST['complemento'];
            $redu_num= $_POST['num'];
            $redu_letra2= $_POST['letra2'];
            $redu_com2= $_POST['complemento2'];
            $redu_comentario=$_POST['comentario'];
            $id_usu = $_SESSION ['id_usu'];


            $dire= $redu_via.' '.$redu_numvia.' '.$redu_letra.' '.$redu_com.' '.$redu_num.' '.$redu_letra2.' '.$redu_com2;
            $validacion = true; 
            
            if (empty($redu_cat_redu)) {
                $_SESSION['errores'][] = "El campo ctegoria es requerido";
                $validacion = false;
            }
            // if (empty($redu_fecha)) {
            //     $_SESSION['errores'][] = "El campo fecha es requerido";
            //     $validacion = false;
            // }
            if (empty($redu_tipo)) {
                $_SESSION['errores'][] = "El campo tipo es requerido";
                $validacion = false;
            }
            if (empty($redu_via)) {
                $_SESSION['errores'][] = "El campo tipo via es requerido";
                $validacion = false;
            }
            if (empty($redu_numvia)) {
                $_SESSION['errores'][] = "El campo numero via es requerido";
                $validacion = false;
            }
            if (empty($redu_letra)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($redu_com)) {
                $_SESSION['errores'][] = "El campo complemento via es requerido";
                $validacion = false;
            }
            if (empty($redu_num)) {
                $_SESSION['errores'][] = "El campo numero es requerido";
                $validacion = false;
            }
            if (empty($redu_letra2)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($redu_com2)) {
                $_SESSION['errores'][] = "El campo complemento es requerido";
                $validacion = false;
            }
            

            if ($validacion) {
                $id = $obj->autoIncrement("reductores_nuevo");
                $sql = "INSERT INTO reductores_nuevo (id_reductores_nuevo, descripcion, direccion, id_categoria_reductor, id_tipo_reductor, id_usuario, id_estado) VALUES ($id,'$redu_comentario', '$dire',$redu_cat_redu,$redu_tipo,$id_usu,3 )";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("Reductor", "Reductor", "getCreate"));
            }


        }
    }
?>