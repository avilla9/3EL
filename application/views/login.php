<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html" ; charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootswatch.css">
  <link src="<?php echo base_url(); ?>/assets/css/bootswatch.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
  <title>TRES EN LINEA | Ingresar</title>
  <script>
    $(document).ready(function() {
      $("form").submit(function(e) {
        e.preventDefault();
        $.post(
          "LoginController/getForm",
          $(this).serialize(),
          function(data) {
            if (data == 0) {
              swal("Error al iniciar sesión", "Error desconocido", "warning");
            } else {
              url = "<?php echo base_url(); ?>Tictactoe/index/0/" + data;
              $(location).attr("href", url);
            }
          }
        );
      });
    });
  </script>
</head>

<body>
  <div class="row">
    <div class="col-lg-4 col-lg-4">
      <!--  -->
    </div>
    <div class="col-lg-4 col-lg-4">
      <div class="row">
        <div class="col-lg-12 col-lg-6">
          <form style="padding-top: 175px;">
            <center>
              <h1 style="color:white">TRES EN LÍNEA</h1>
            </center>
            <div class="form-group">
              <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Correo">
            </div>
            <div class="form-group">
              <input name="password" type="password" class="form-control" placeholder="Contraseña">
            </div>
            <center><button type="submit" class="btn btn-primary-btn-sm">
                <h4>Iniciar Sesión</h4>
              </button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-lg-4">
    </div>
  </div>
</body>

</html>