<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fagu - <?php echo $title ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('css/main.css') ?>">
</head>
<body>
  <header>
    <div>
      <div id="logo">fagu</div>
      <div id="perfil">
        <p><?php echo $user_name ?></p>
        <a href="<?php echo site_url('auth/logout') ?>" class="col-md-2"><button class="btn btn-default">Cerrar Sesión</button></a>
      </div>
    </div>
  </header>
  <div class="container">
