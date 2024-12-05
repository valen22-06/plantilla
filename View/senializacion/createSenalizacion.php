<?php include_once '../Lib/helpers.php'; ?>

<div class="container mt-5">
    <div class="text-center">
        <h3 class="display-4">Registrar Señalizacion Nueva</h3>
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

<form action="<?php echo getUrl("Senializacion", "Senializacion", "postCreate"); ?>" method="post" class="mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="cat_senializacion" class="form-label">Tipo de Señalizacion</label>
                <select class="form-select" name="cat_senializacion" id="cat_senializacion">
                    <option disabled selected>Seleccione tipo de Señalizacion</option>
                    <!-- Opciones dinámicas aquí -->
                </select>
            </div>