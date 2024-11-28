<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
include_once '../Lib/helpers.php'; 

?>



<div class="mt-5">
    <h3 class ="display-4">Registrar PQRS</h3>
</div>

<div class="mt-5">
    <div class='alert alert-danger d-none' role='alert' id='error'>

    </div>

    <!-- <?php
        // if(isset($_SESSION['errores'])){
        //     echo "<div class = 'alert alert-danger' role='alert'>";
        //     foreach ($_SESSION['errores'] as $error) {
        //         echo $error;
        //         echo "<br>";
        //     }
        //     echo "</div>";
        //     unset($_SESSION['errores']);
        // }
    ?> -->
        
<form action="<?php echo getUrl("Solicitudes","pqrs","postCreate"); ?> " method="post" id="form">
    <div class="row mt-5">

        <div class ="col-md-4">
            <label for="cat_pqrs">Seleccionar categoria PQRS:</label>
    
            
                    <select class="form-control" aria-label="Small select example">
                    <option selected>Seleccione...</option>
                    <?php
                    if (!isset($cat_pqrs) && is_array($cat_pqrs)) {
                        foreach ($cat_pqrs as $cat) {
                            echo "<option value='".$cat['id_categoria_pqrs']."'>".$cat['nombre_categoria_pqrs']. "</option>";
                        }
                    } else {
                        echo "<option disabled>No hay categorias disponibles</option>";
                    }
                    ?>
                    </select>


                    <div class ="col-md-4">
                        <label for="comentario">Cometario</label>
                        <input type="textarea" name="comentario" id="coment" class="form-control" placeholder="Comentario">
                    </div>
         
        </div>

        
    </div>
        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
         
</form>

</div>

