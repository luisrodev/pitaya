<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />

    <!-- Custom styles for this template -->
    <!-- <link href="signin.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url("assets/js/login.js"); ?>"></script> -->
  </head>

  <body class="text-center">
    <form method="post" class="form-signin" action="<?php echo base_url('Login/logIn')?>">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Autentificar</h1>
      <label for="inputEmail" class="sr-only">Nombre Usuario</label>
      <input name="username" style="margin-bottom: 5px;" type="text" id="inputUsername" class="form-control" placeholder="Nombre Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Contraeña</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button  class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
  </body>
</html>