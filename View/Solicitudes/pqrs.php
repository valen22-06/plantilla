<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php
include_once '../Lib/helpers.php'; 

?>


<div class="mt-5">
    <h3 class ="display-4">Registrar PQRS</h3>
</div>

<div class="row">

<div class="col-md-3 mt-4">
<div class='alert alert-danger d-none' role='alert' id='error'>

</div>
<?phpP
if(isset($_SESSION['errores'])){
    echo "<div class='alert alert-danger' role='alert'>";
    foreach($_SESSION['errores'] as $error){
        echo $error."<br>";
    }
    echo "</div>";
    unset($_SESSION['errores']);
}
?>

<form action="<?php echo getUrl("Usuarios","Usuario","postCreate");?>" method="post" id='form'>
    <div class="row mt-5">
    <div class="contM">
            <div class="cont1">
              <div class="form-group">
              <select class="form-control" aria-label="Small select example">
    <option selected>Tipo de documento</option>
    <?php
    if (isset($tipo_documento) && is_array($tipo_documento)) {
        foreach ($tipo_documento as $tipo) {
            echo "<option value='".$tipo['id_tipo_documento']."'>".$tipo['nombre_tipo_documento']. "</option>";
        }
    } else {
        echo "<option disabled>No hay tipos de documentos disponibles</option>";
    }
    ?>
</select>


              </div>

            <div class="col-md-4">
                <label for="usuarioNombre">Nombre</label>
                <input type="text" name="usuarioNombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>

    </div>
</form>

</div>

</div>