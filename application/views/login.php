<?php
// here goes the css files


defined('BASEPATH') or exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html" ; charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootswatch.css">
    <link src="<?php echo base_url(); ?>/assets/css/bootswatch.css">
    <title>TRES EN LINEA | Ingresar</title>
</head>

<body>
    <div class="login">
        <h1>TRES EN LÍNEA</h1>
        <h1>Ingresar</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('LoginController/checkLogin'); ?>
        <form method="post">
            <input type="text" name="" placeholder="Username" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <center><button type="submit" class="btn btn-primary">Acceder</button></center>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="js/index.js"></script>

</body>

</html>