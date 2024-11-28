
<script src = "js/jquery.js"></script>
<script src = "js/global.js"></script>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Login Form</title>
    <link rel="icon" type="image/x-icon" href="/form-icon.png" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="assets/css/login.css" />
       
</head>
<?php

include_once '../Lib/helpers.php';

?>


<body>
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
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h2>Bienvenido</h2>
            </div>
            <form class="mt-4"action="<?php echo getUrl('Acceso','Acceso','getCreate', false, 'ajax' ); ?>" method="post">
                <?php $_SESSION['form-ant'] = "iniciar";?>
                <div class="cont1">
                    <label for="emailAddress" class="form-label">Documento de identidad:</label>
                    <input
                        type="number"
                        class="form-control"
                        name="user"
                        id="documento"
                        placeholder="Tu Documento" required/>
                </div>
                <div class="cont2">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input
                        type="password"
                        class="form-control"
                        name="pass"
                        id="clave"
                        placeholder="Tu Contraseña" required/>
                </div>
                <br />
                <div class="botonIni">
                    <button type="submit" id="btn-iniciar">Iniciar</button>
                </div>
            </form>
            
            
            <div class="botonReg">
                
                <a href="<?php echo getUrl('Usuarios', 'Usuarios', 'getCreate', false, "ajax")?>"><?php $_SESSION['form-ant'] = "reg";?><button type="submit" id="btn-form">Registrar</button></a>
            </div>
            

        </div>
    </div>

    
</body>

</html>