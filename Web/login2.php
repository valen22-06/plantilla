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
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
</head>
<?php
include_once '../view/partials/head.php';
include_once '../lib/helpers.php';
?>
<style>
    body {
        background-image: url("https://propacifico.org/wp-content/uploads/2024/02/adobestock-284418692-scaled.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .cont1 {
        margin-left: 20px;
        justify-content: center;
        align-items: center;
        width: 88%;
    }

    .cont2 {
        margin-top: 20px;
        margin-left: 20px;
        justify-content: center;
        align-items: center;
        width: 88%;
    }

    .form-control {
        border-collapse: collapse;
        border-bottom: 1px solid black;
        border-radius: 0px;
        background: rgba(255, 255, 255, 0.5);
        font-family: 'Oswald', sans-serif;
    }
    .form-label{
        color: black;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .botonIni {
        display: flex;
        font-size: 20px;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .botonReg {
        display: flex;
        font-size: 20px;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
    }

    .botonIni button {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 150px;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        background-color: 0 0 0;
        color: white;
        cursor: pointer;
        font-size: 18px;
    }

    .botonReg button {
        width: 100%;
        max-width: 150px;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        background-color: 0 0 0;
        color: white;
        cursor: pointer;
        font-size: 18px;
    }

    /* .botonIni button:hover,
    .botonReg button:hover {
      background-color: #0056b3; 
    } */

    .text-center {
        margin-top: 30px;
        color: black;
    }

    .row {
        width: 35%;
        margin-top: 105px;
        border-radius: 40px;
        background: rgba(255, 255, 255, 0.4);
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h2>Bienvenido</h2>
            </div>
            <form
                class="mt-4"
                action="<?php echo getUrl('Acceso', 'Acceso', 'login'); ?>"
                method="post"
                id="form">
                <div class="cont1">
                    <label for="emailAddress" class="form-label">Documento de identidad:</label>
                    <input
                        type="number"
                        class="form-control"
                        name="user"
                        id="documento"
                        placeholder="Tu Documento" />
                </div>
                <div class="cont2">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input
                        type="password"
                        class="form-control"
                        name="pass"
                        id="clave"
                        placeholder="Tu Contraseña" />
                </div>
                <br />
                <div class="botonIni">
                    <button type="submit" id="btn-iniciar">Iniciar</button>
                </div>
            </form>
            <div class="botonReg">
                <button type="button" id="btn-registrar">Registrar</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar el clic del botón "Registrar"
            $('#btn-registrar').click(function(event) {
                // Prevenir comportamiento predeterminado
                event.preventDefault();

                // Redirigir a la página de registro
                window.location.href = '../View/Usuarios/signup.php';
            });
        });
    </script>
</body>

</html>