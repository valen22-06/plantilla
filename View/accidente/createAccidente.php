<?php
include_once '../Lib/helpers.php'; 

?>

<div class="mt-5">
    <h3 class ="display-4">Registrar Accidente</h3>
</div>

<div class="mt-5">
    <div class='alert alert-danger d-none' role='alert' id='error'>

    </div>

    <?php
        if(isset($_SESSION['errores'])){
            echo "<div class = 'alert alert-danger' role='alert'>";
            foreach ($_SESSION['errores'] as $error) {
                echo $error;
                echo "<br>";
            }
            echo "</div>";
            unset($_SESSION['errores']);
        }
    ?>
    <form action="<?php echo getUrl("Accidente","Accidente","postCreate"); ?> " method="post">
    <div class="row mt-5">
    <select class="form-control" aria-label="Small select example" name="cat_pqrs" id="cat_pqrs">
                    <option disablet>Seleccione...</option>
                    <!-- <?php
                    
                        // foreach ($cat_pqrs as $cat) {
                        //     echo "<option value='".$cat['id_categoria_pqrs']."'>".$cat['nombre_categoria_pqrs']. "</option>";
                        // }
                    
                    ?> -->
                    </select>
                    
    <div class ="col-md-4">

    </div>

    </div>


    </form>

</div>