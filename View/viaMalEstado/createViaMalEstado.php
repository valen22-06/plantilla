
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="card shadow-lg" id="card_red_man">
    <div class="card-header bg-dark text-white text-center">
        <h3 class="display-6 mb-0">Señalizacion en mal estado</h3>
    </div>

    <div class="card-body">
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
        
<form action="<?php echo getUrl("viaMalEstado", "viaMalEstado", "postCreate"); ?> " method="post" id="form">
    <div class="row mt-5">
        

        <div class ="col-md-4">
        <label for="VMEdescipcion">Descripcion</label>
            <input type="text" name="VMEdescripcion" id="desc" class="form-control" placeholder="Descripcion">
        </div>

        <div class ="col-md-4">
            <label for="cat_pqrs">Seleccionar daño:</label>
    
            
                    <select class="form-control" aria-label="Small select example" name="id_danio" id="id_danio">
                    <option disablet>Seleccione...</option>
                    <?php
                    
                        foreach ($via_danio as $via) {
                            echo "<option value='".$via['id_danio']."'>".$via['nombre_danio']. "</option>";
                        }
                    
                    ?>
                    </select>

        <div class ="col-md-4">
        <label for="VMEdireccion">Direccion</label>
            <input type="text" name="VMEdireccion" id="direccion" class="form-control" placeholder="Direccion">
        </div>

        
         
        

        
    </div>
        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
         
</form>

                    </div>