<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php
include_once '../../Lib/helpers.php';

?>
<style>
  body {
    background-image: url("https://propacifico.org/wp-content/uploads/2024/02/adobestock-284418692-scaled.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
  }

  .container {
    display: flex;
    /* flex-direction:row; */
    justify-content: center;
    align-items: center;
  }
  input[type="date"]::placeholder {
      color: black
    }


    input[type="text"]::placeholder {
      color: black;
    }

  .contM {
    display: flex;

    justify-content: space-between;
    align-items: center;

  }

  .cont1 {
    margin-left: 20px;
    justify-content: center;
    align-items: center;
    width: 50%;
  }

  .cont2 {
    margin-right: 20px;
    padding-left: 5px;
    width: 50%;

  }

  .form-control {
    border-collapse: collapse;
    border-bottom: 1px solid black;
    border-radius: 0px;
    background: rgba(255, 255, 255, 0.5);
    font-family: 'Oswald', sans-serif;
    /* display: flex; */

  }

  .form-control::placeholder {
    color: black;
  }

  .enviar {
    border-radius: 20px;
  }



  .row {
    width: 55%;
    margin-top: 80px;
    /* border: 2px solid #434c54; */
    border-radius: 40px;
    /* height: auto; */
    /* background: #5d8d9d; */
    /* background:#AAB7B7; */
    background: rgba(255, 255, 255, 0.4);

  }

  form h2 {
    color: #3b4d54;
    font-size: 40px;
    font: small-caps 350% serif;
    margin: 20px;
  }
  
  /* .form-label{
    
  } */  



  .checkbox {
    float: left;
  }


  button {
    width: 120px;
    height: 35px;
    font-size: 15px;
    background: rgba(255, 255, 255, 0.8);
    margin-top: 15px;
    margin-bottom: 15px;


  }


  @media(max-width:600px) {
    body {
      font-size: 10px;
      /* color: #3b4d54; */

    }

    h2 {
      font-size: 15px;
    }

    input[type=text] {
      font-size: 13px;
      /* color: #3b4d54; */
      border-radius: 30px;

    }

    

    input[type=password] {
      font-size: 13px;

      /* color: #3b4d54; */
    }

    input[type=email] {
      font-size: 13px;
      /* COLOR: #1f272a; */
    }

    button {
      width: 80px;
      height: 30px;
      float: right;
      font-size: 10px;
      margin-bottom: 10px;

    }

    .checkbox {
      display: inline;
      /* color: #3b4d54; */
    }

  }
</style>

<center>

  <body>


    <div class="container">

      <div class="row">

        <form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate","ajax",false); ?> " method="post" class="col-xs-12 col-sm-12 col-md-12" id='form'>
          <h2>Registrar</h2>

          <div class="contM">
            <div class="cont1">
              <div class="form-group">

<select class="form-control" name="tipo_documento" required>
    <option selected disabled>Seleccione un tipo de documento</option>
    <?php
        foreach ($tipo_documento as $tipo) {
            echo "<option value='" . htmlspecialchars($tipo['id_tipo_documento']) . "'>" . htmlspecialchars($tipo['nombre_tipo_documento']) . "</option>";
        }
    ?>
</select>


              </div>



              <div class="form-group">
              <!-- <label class="form-label">Primer nombre:</label> -->
                <input type="text" class="form-control" id="name" placeholder="Primer nombre *" name="name" required>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="apellido" placeholder="Primer apellido *" name="apellido" required>
              </div>

              <div class="form-group">
                <input type="date" class="form-control" id="date" placeholder="Fecha de nacimiento *" name="Rptpwd" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email *" name="email" required>

              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="pwd" placeholder="Password *" name="pwd" required>
              </div>

            </div>

            <div class="cont2">


              <div class="form-group">
                <input type="number" class="form-control" id="documento" placeholder="Documento de identidad *" name="documento" required>
              </div>


              <div class="form-group">
                <input type="text" class="form-control" id="surname" placeholder="Segundo nombre" name="secondName" required>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="segundoApellido" placeholder="Segundo apellido *" name="segundoApellido" required>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="telefono" placeholder="Telefono *" name="telefono" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="direccion_residencia" placeholder="Direccion de residencia *" name="direccion" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="Rtpwd" placeholder="Confirmar password *" name="Rptpwd" required>
              </div>

            </div>
          </div>
          <div class="enviar">
            <button type="submit">Enviar <i class="glyphicon glyphicon-send"></i></button>
          </div>

        </form>

      </div>
    </div>
  </body>
  </form>

</center>