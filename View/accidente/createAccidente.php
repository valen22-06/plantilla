<?php include_once '../Lib/helpers.php'; ?>

<div class="container mt-5">
    <div class="text-center">
        <h3 class="display-4">Registrar Accidente</h3>
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

    <form action="<?php echo getUrl("Accidente", "Accidente", "postCreate"); ?>" method="post" class="mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="cat_accidente" class="form-label">Tipo de accidente</label>
                <select class="form-select" name="cat_accidente" id="cat_accidente">
                    <option disabled selected>Seleccione tipo de accidente</option>
                    <?php
                      foreach ($choque as $cho) {
                          echo "<option value='" .$cho['id_choque_detalle']. "'>" .$cho['nombre_choque_detalle']."</option>";
                      }
                  ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Fecha del accidente</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="choque" class="form-label">Tipo de daño</label>
                <select class="form-select" name="choque" id="choque">
                    <option disabled selected>Seleccione tipo de daño</option>
                    <?php
                      foreach ($tipo_choque as $cho) {
                          echo "<option value='" .$cho['id_choque']. "'>" .$cho['descripcion']."</option>";
                      }
                  ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="vehiculo" class="form-label">Tipo de vehículo</label>
                <select class="form-select" name="vehiculo" id="vehiculo">
                    <option disabled selected>Seleccione tipo de vehículo</option>
                    <?php
                      foreach ($tipo_vehiculo  as $vehiculo) {
                          echo "<option value='" .$vehiculo['id_tipo_vehiculo']. "'>" .$vehiculo['nombre_tipo_vehiculo']."</option>";
                      }
                  ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="lesionados" class="form-label">¿Lesionados?</label>
                <select class="form-select" id="lesionados" name="lesionados">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tipo_via" class="form-label">Tipo de vía</label>
                <select class="form-select" name="tipo_via" id="tipo_via">
                    <option disabled selected>Seleccione un tipo de vía</option>
                    <?php
                      foreach ($tipo_via as $tipo) {
                          echo "<option value='" .$tipo['id_tipo_via']. "'>" .$tipo['nombre_via']."</option>";
                      }
                  ?>
                    
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" class="form-control" id="numVia" placeholder="Número de la vía" name="numVia">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="letra" placeholder="Letra" name="letra">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="complemento" placeholder="Complemento" name="complemento">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="num" placeholder="Número" name="num">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" class="form-control" id="letra2" placeholder="Letra" name="letra2">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="complemento2" placeholder="Complemento" name="complemento2">
            </div>
        </div>

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribe un comentario"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>