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
    <script src="<?php echo base_url(); ?>/assets/js/login.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <title>TRES EN LINEA | Ingresar</title>
</head>

<body>
    <div class="login">
        <h1>TRES EN LÍNEA</h1>
        <h1>Ingresar</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('LoginController/verifyUser'); ?>
        <form method="post">
            <input id="user" type="text" name="" placeholder="Username" required="required" />
            <input id="pass" type="password" name="p" placeholder="Password" required="required" />
            <center><a href="<?php echo base_url(); ?>tictactoe/index/0" id="verify" type="button" class="btn">Acceder</a></center>
        </form>
    </div>
</body>

</html>