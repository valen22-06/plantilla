<?php
    include_once '../Model/Solicitudes/solicitudesModel.php';
    class SolicitudesController{

        

        public function cargarFormulario(){

            $tipo_soli= $_POST['tipoSolicitud'];

            if ($tipo_soli==1) {
                $this->getCreateAccidente();
            }else if ($tipo_soli==2) {
                $this->getCreateSenializacion();
            } else if ($tipo_soli==3) {
                $this->getCreateSenializacionM();
            } else if ($tipo_soli==4) {
                $this->getCreateReductor();
            } else if ($tipo_soli==5) {
                $this->getCreateReductorM();
            } else if ($tipo_soli==6) {
                $this->getCreateViaM();
            } else if ($tipo_soli==7) {
                $this->getCreatePQRS();
            }

        }

        public function cargarConsult(){

            $tipo_soli= $_POST['tipoSolicitud'];

            if ($tipo_soli==1) {
                $this->getAccidente();
            }else if ($tipo_soli==2) {
                $this->getSenializacion();
            } else if ($tipo_soli==3) {
                $this->getSenializacionM();
            } else if ($tipo_soli==4) {
                $this->getReductor();
            } else if ($tipo_soli==5) {
                $this->getReductorM();
            } else if ($tipo_soli==6) {
                $this->getViaM();
            } else if ($tipo_soli==7) {
                $this->getPQRS();
            }

        }

        public function getSoli(){
        
            include_once '../View/solicitudes/cargarSolicitudes.php';
        }
        public function getSoliConsult(){
        
            include_once '../View/solicitudes/consultSolicitudes.php';
        }

        public function getPQRS(){
            $obj = new solicitudesModel();
            $sql = "SELECT p.*,c.nombre_categoria_pqrs as nom_cat, e.nombre_estado as nom_est FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs order by id_pqrs ASC";
            $pqrs = $obj->consult($sql);
        
            include_once '../View/solicitudes/consultPqrs.php';
        }
        
        public function getCreatePQRS(){
            $obj = new solicitudesModel();
            $sql = "SELECT * FROM categoria_pqrs";
            $cat_pqrs = $obj->consult($sql);
    
             if(!empty($cat_pqrs)){
                include_once '../View/solicitudes/createPQRS.php';
                 
             } else {
                 echo "no trae nada";
            }
        
            
        }
    
        public function postCreatePQRS(){
            $obj = new solicitudesModel();
            $id = $obj->autoIncrement("pqrs", "id_pqrs");
            $id_cat = $_POST['cat_pqrs'];
            $comentario = $_POST['comentario'];
            $validacion = true;
    
            if ($validacion) {
    
                $sql = "INSERT INTO pqrs VALUES ($id, $id_cat, '$comentario', 3)";
        
                if ($obj->insert($sql)) {
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
    
            } else {
                redirect(getUrl("solicitudes", "solicitudes", "getCreatePQRS"));
            }
        }
    
        public function postUpdateStatus(){
            $obj = new solicitudesModel();
            $id_pqrs=$_POST['user'];
            $est_id = $_POST['id'];
        
            if ($est_id==3) {
                $statusToModify = 4;
            } elseif ($est_id==4) {
                $statusToModify = 3;
            }
        
            $sql = "UPDATE pqrs SET estado_pqrs = $statusToModify WHERE id_pqrs=$id_pqrs";
        
            $ejecutar = $obj->update($sql);
        
            if($ejecutar!=0){
                $sql="SELECT p.*,c.nombre_categoria_pqrs as nom_cat,e.nombre_estado as nom_est FROM pqrs p, estado e, categoria_pqrs c WHERE p.estado_pqrs=e.id_estado AND c.id_categoria_pqrs=p.id_categoria_pqrs";
                $usuarios = $obj->consult($sql);
                include_once '../View/solicitudes/consultPqrs.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }

        public function getViaM(){
            $obj = new solicitudesModel();
            $sql="SELECT v.*, e.nombre_estado as Edescripcion, d.nombre_danio as nombre_d FROM via_mal_estado v, estado e, danio d WHERE v.id_estado = e.id_estado AND d.id_danio=v.id_danio ORDER BY v.id_via_mal_estado ASC";
            $viaM = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultViaMalEstado.php';
        }
        public function getCreateViaM() {
            $model = new solicitudesModel();
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql5="SELECT * FROM danio where id_tipo_danio=1";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/solicitudes/createViaMalEstado.php';

        }
        public function postCreateViaM(){
            $obj = new solicitudesModel();

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
                redirect(getUrl("solicitudes", "solicitudes", "getCreateViaM"));
            }
        }

        public function getReductorM(){
            $obj = new solicitudesModel();
            $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t, d.nombre_danio as nombre_d FROM reductores_malestado r, estado e, categoria_reductores c, tipo_reductor t, danio d WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor AND d.id_danio=r.id_danio ORDER BY r.id_reductores_malestado ASC";
            $redu = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultReductorM.php';
        }
        public function getCreateReductorM() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql5="SELECT * FROM danio";
            $danio=$model->consult($sql5);
              
                
            include_once '../View/solicitudes/createReductorM.php';

        }
        public function postCreateReductorM(){
            $obj=new solicitudesModel();

            $redu_cat_redu=$_POST['cat_reductor'];
            // $redu_fecha=$_POST['date'];
            $redu_tipo=$_POST['tipo_reductor'];
            $redu_danio=$_POST['tipo_danio'];
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
                $id = $obj->autoIncrement("reductores_malEstado");
                $sql = "INSERT INTO reductores_malEstado (id_reductores_malEstado, descripcion, direccion, id_categoria_reductor, id_tipo_reductor, id_danio, id_usuario, id_estado) VALUES ($id,'$redu_comentario', '$dire', $redu_cat_redu, $redu_tipo,$redu_danio, $id_usu, 3 )";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("solicitudes", "solicitudes", "getCreateReductorM"));
            }
        }

        public function getReductor(){
            $obj = new solicitudesModel();
            $sql="SELECT r.*, e.nombre_estado as Edescripcion, c.nombre_categoria_reductores as nombre_c, t.nombre_tipo_reductor as nombre_t FROM reductores_nuevo r, estado e, categoria_reductores c, tipo_reductor t  WHERE r.id_estado = e.id_estado AND r.id_categoria_reductor=c.id_categoria_reductores AND r.id_tipo_reductor=t.id_tipo_reductor ORDER BY r.id_reductores_nuevo ASC";
            $redu = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultReductor.php';
        }
        public function getCreateReductor() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM categoria_reductores";
            $cat_reductor =$model->consult($sql);
            $sql2="SELECT * FROM tipo_reductor";
            $tipo_reductor =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
              
                
            include_once '../View/solicitudes/createReductor.php';

        }
        public function postCreateReductor(){
            $obj = new solicitudesModel();

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
                redirect(getUrl("solicitudes", "solicitudes", "getCreateReductor"));
            }


        }

        public function getSenializacionM(){
            $obj = new solicitudesModel();
            $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion, d.nombre_danio as nombre_d FROM senializacion_vial_malestado s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t, danio d  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion AND d.id_danio=s.id_danio ORDER BY s.id_senializacion_vial_malestado ASC";
            $senializacion = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultSenializacionM.php';
        }

        public function getCreateSenializacionM() {
            $model = new solicitudesModel();
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
              
                
            include_once '../View/solicitudes/createSenializacionM.php';

        }
        public function postCreateSenializacionM() {
            $obj = new solicitudesModel();

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
                redirect(getUrl("solicitudes", "solicitudes", "getCreateSenializacionM"));
            }
        }
        public function getAccidente(){
            $obj = new solicitudesModel();
            $sql="SELECT a.*,e.nombre_estado as Edescripcion, c.nombre_choque_detalle as tipo_choque, t.nombre_tipo_vehiculo as tipo_vehiculo FROM registro_accidente a, estado e, choque_detalle c, tipo_vehiculo t WHERE a.id_estado = e.id_estado AND a.id_tipo_choque=c.id_choque_detalle AND a.id_tipo_vehiculo=t.id_tipo_vehiculo ORDER BY a.id_registro_accidente ASC";
            $accidente = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultAccidente.php';
        }

        public function getCreateAccidente() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM tipo_vehiculo";
            $tipo_vehiculo =$model->consult($sql);
            $sql2="SELECT * FROM choque_detalle";
            $choque =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql3);
            $sql4="SELECT * FROM choque";
            $tipo_choque=$model->consult($sql4);

              
                
            include_once '../View/solicitudes/createAccidente.php';

        }
        public function postCreateAccidente() {
            $obj = new solicitudesModel();

            $acc_tipo_acc=$_POST['cat_accidente'];
            // $acc_fecha=$_POST['date'];
            $acc_choque=$_POST['choque'];
            $acc_vehiculo=$_POST['vehiculo'];
            $acc_lesionados=$_POST['lesionados'];
            $acc_tipo_via=$_POST['tipo_via'];
            $acc_numvia=$_POST['numVia'];
            $acc_letra= $_POST['letra'];
            $acc_com= $_POST['complemento'];
            $acc_num= $_POST['num'];
            $acc_letra2= $_POST['letra2'];
            $acc_com2= $_POST['complemento2'];
            $acc_comentario=$_POST['comentario'];
            

            $dire= $acc_tipo_via.' '.$acc_numvia.' '.$acc_letra.' '.$acc_com.' '.$acc_num.' '.$acc_letra2.' '.$acc_com2;
            
            $validacion = true; 
            if (empty($acc_tipo_acc)) {
                $_SESSION['errores'][] = "El campo tipo de accidente es requerido";
                $validacion = false;
            } 
            // if (empty($acc_fecha)) {
            //     $_SESSION['errores'][] = "El campo fecha es requerido";
            //     $validacion = false;
            // }
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
                $sql = "INSERT INTO registro_accidente (id_registro_accidente,lesionados,observacion,direccion,id_estado,id_tipo_vehiculo,id_tipo_choque) VALUES ($id, '$acc_lesionados', '$acc_comentario','$dire',3, $acc_vehiculo, $acc_choque)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("Solicitudes", "Solicitudes", "getCreateAccidente"));
            }

        }
        public function buscarAccidente(){
            $obj = new solicitudesModel();
        
            $buscar = $_POST['buscar'];
    
            $sql = "SELECT a.*,e.nombre_estado as Edescripcion, c.nombre_choque_detalle as tipo_choque, t.nombre_tipo_vehiculo as tipo_vehiculo FROM registro_accidente a, estado e, choque_detalle c, tipo_vehiculo t WHERE a.id_estado = e.id_estado AND a.id_tipo_choque=c.id_choque_detalle AND a.id_tipo_vehiculo=t.id_tipo_vehiculo ORDER BY a.id_registro_accidente ASC";
    
            $accidente = $obj->consult($sql);
    
            include_once '../view/solicitudes/buscarAccidente.php';
    

        }


        public function postUpdateStatusAccidente(){
            $obj = new solicitudesModel();
            $usu_id=$_POST['user'];
            $est_id = $_POST['id'];
        
            
        
            $sql = "UPDATE accidente SET id_estado = $statusToModify WHERE id_usuario=$usu_id";
        
            $ejecutar = $obj->update($sql);
        
            if($ejecutar!=0){
                $sql="SELECT a.*,e.nombre_estado as Edescripcion FROM registro_accidente a, estado e WHERE a.id_estado = e.id_estado ORDER BY a.id_registro_accidente ASC";
                $usuarios = $obj->consult($sql);
                include_once '../View/solicitudes/consultAccidente.php';
            } else {
                echo "No se pudo actualizar";
            }
            
        }
        public function getCreateSenializacion() {
            $model = new solicitudesModel();
            $sql = "SELECT * FROM orientacion_senializacion";
            $orientacion =$model->consult($sql);
            $sql2="SELECT * FROM categoria_senializacion";
            $cat_sen =$model->consult($sql2);
            $sql3="SELECT * FROM tipo_senializacion";
            $tipo_sen =$model->consult($sql3);
            $sql4="SELECT * FROM tipo_via";
            $tipo_via =$model->consult($sql4);
              
                
            include_once '../View/solicitudes/createSenializacion.php';

        }
        public function postCreateSenializacion() {
            $obj = new solicitudesModel();

            $sen_tipo_senializacion=$_POST['cat_senializacion'];
            // $sen_fecha=$_POST['date'];
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
            $id_usu = $_SESSION ['id_usu'];


            $dire=$sen_tipo_via.' '.$sen_numvia.' '.$sen_letra.' '.$sen_com.' '.$sen_num.' '.$sen_letra2.' '.$sen_com2;
            
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
                $sql = "INSERT INTO senializacion_vial_nueva (id_senializacion_vial_nueva, descripcion, direccion, id_orientacion_senializacion, id_cat_senializacion,id_tipo_senializacion, id_usuario,id_estado) VALUES ($id,'$sen_comentario','$dire', $sen_tipo_senializacion, $sen_cat_senializacion, $sen_t_sen, $id_usu , 3)";
        
                $ejecutar = $obj->insert($sql);
                if ($ejecutar) {
    
                    redirect("index.php");
                } else {
                    echo "Se ha producido un error al insertar";
                }
            } else {
                redirect(getUrl("Solicitudes", "Solicitudes", "getCreateSenializacion"));
            }
        }
        public function getSenializacion(){
            $obj = new solicitudesModel();
            $sql="SELECT s.*, e.nombre_estado as Edescripcion, o.nombre_orientacion_senializacion as nombre_o, c.nombre_categoria_senializacion as nombre_c_s, t.nombre_tipo_senializacion as tipo_senializacion  FROM senializacion_vial_nueva s, estado e, orientacion_senializacion o, categoria_senializacion c, tipo_senializacion t  WHERE s.id_estado = e.id_estado  AND e.id_estado=s.id_estado  AND o.id_orientacion_senializacion = s.id_orientacion_senializacion AND c.id_categoria_senializacion=s.id_cat_senializacion AND t.id_tipo_senializacion = s.id_tipo_senializacion ORDER BY s.id_senializacion_vial_nueva ASC";
            $senializacion = $obj->consult($sql);
            $sql2="SELECT * FROM estado WHERE id_tipo_estado=2";
            $estado=$obj->consult($sql2);

            include_once '../View/solicitudes/consultSenializacion.php';
        }

        
    }

    
?>