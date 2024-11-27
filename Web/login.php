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
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
  </head>
  <?php
  include_once '../view/partials/head.php';
  include_once '../lib/helpers.php';
  ?>

  <style>
    body {
      background: #1A2D42;
      justify-content: center;
    }

    button {
      width: 200px;
    }

    .row {
      width: 40%;
      margin-top: 30px;
      padding: 0%;
      border-radius: 14px;
      height: auto;
      background: #3e545b;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .boton {
      display: flex;
      justify-content: center;
      margin-bottom: 18px;
    }
  </style>

  <body>
    <?php
    if (isset($_SESSION['errores'])) {
        echo "<div class='alert alert-danger' role='alert'>";
        foreach ($_SESSION['errores'] as $error) {
            echo $error."<br>";
        }
        echo "</div>";
        unset($_SESSION['errores']);
    }
    ?>
    <br><br>

    <div class="container">
      <div class="row">
        <div class="text-center">
          <h1>👋</h1>
          <h2>Bienvenido</h2>
        </div>
        <form class="mt-4" action="<?php echo getUrl("Acceso","Acceso", "login"); ?>" method="post" id="form">
          <div class="mb-4 col-lg-align-items-md-center mx-auto text-center">
            <label for="emailAddress" class="form-label fw-semibold">Documento de identidad:</label>
            <input type="number" class="form-control" name="user" id="documento" placeholder="Tu Documento">
          </div>
          <div class="mb-4 col-lg-align-items-md-center mx-auto text-center">
            <label for="password" class="form-label fw-semibold">Contraseña:</label>
            <input type="password" class="form-control" name="pass" id="clave" placeholder="Tu Contraseña">
          </div>
          <br>
          <div class="boton">
            <button type="submit" id="btn-iniciar" class="btn btn-dark btn-lg" >Iniciar</button>
          </div>

        </form>

        <div class="boton">
            <button type="button" id="btn-registrar" class="btn btn-dark btn-lg">Registrar</button>
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
          window.location.href = "../View/Usuarios/signup.php";
        });

      });
    </script>
  </body>
</html>
