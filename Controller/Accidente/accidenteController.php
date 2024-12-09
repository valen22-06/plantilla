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
            $sql = "SELECT * FROM tipo_vehiculo";
            $tipo_vehiculo =$model->consult($sql);
            $sql2="SELECT * FROM choque_detalle";
            $choque =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql4="SELECT * FROM choque";
            $tipo_choque=$model->consult($sql4);
              
                
            include_once '../View/accidente/createAccidente.php';

        }
        public function postCreate() {
            $obj = new accidenteModel();

            $acc_tipo_acc=$_POST['cat_accidente'];
            $acc_fecha=$_POST['date'];
            $acc_choque=$_POST['choque'];
            $acc_vehiculo=$_POST['vehiculo'];
            $acc_lesionados=$_POST['lesionados'];
            $acc_via=$_POST['tipo_via'];
            $acc_numvia=$_POST['numVia'];
            $acc_letra= $_POST['letra'];
            $acc_com= $_POST['complemento'];
            $acc_num= $_POST['num'];
            $acc_letra2= $_POST['letra2'];
            $acc_com2= $_POST['complemento2'];
            $acc_comentario=$_POST['comentario'];
            $acc_tipo_via=$_POST['tipo_via'];

            $dire=$acc_via.' '.$acc_numvia.' '.$acc_letra.' '.$acc_com.' '.$acc_num.' '.$acc_letra2.' '.$acc_com2;
            
            $validacion = true; 
            if (empty($acc_tipo_acc)) {
                $_SESSION['errores'][] = "El campo tipo de accidente es requerido";
                $validacion = false;
            } 
            if (empty($acc_fecha)) {
                $_SESSION['errores'][] = "El campo fecha es requerido";
                $validacion = false;
            }
            if (empty($acc_choque)) {
                $_SESSION['errores'][] = "El campo tipo de daño es requerido";
                $validacion = false;
            }
            if (empty($acc_vehiculo)) {
                $_SESSION['errores'][] = "El campo tipo de vehiculo es requerido";
                $validacion = false;
            }
            if (empty($acc_lesionados)) {
                $_SESSION['errores'][] = "El campo lesionados es requerido";
                $validacion = false;
            }
            if (empty($acc_numvia)) {
                $_SESSION['errores'][] = "El campo numero via es requerido";
                $validacion = false;
            }
            if (empty($acc_letra)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($acc_com)) {
                $_SESSION['errores'][] = "El campo complemento via es requerido";
                $validacion = false;
            }
            if (empty($acc_num)) {
                $_SESSION['errores'][] = "El campo numero es requerido";
                $validacion = false;
            }
            if (empty($acc_letra2)) {
                $_SESSION['errores'][] = "El campo letra via es requerido";
                $validacion = false;
            }
            if (empty($acc_com2)) {
                $_SESSION['errores'][] = "El campo complemento es requerido";
                $validacion = false;
            }
            if (empty($acc_tipo_via)) {
                $_SESSION['errores'][] = "El campo tipo via es requerido";
                $validacion = false;
            }

            if ($validacion) {
                $id = $obj->autoIncrement("registro_accidente");
                $sql = "INSERT INTO registro_accidente VALUES ($id, '$acc_fecha', '$acc_lesionados', '$acc_comentario','$dire',3 , $acc_vehiculo, $acc_choque)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("Accidente", "Accidente", "getCreate"));
            }

        }
    }
?>