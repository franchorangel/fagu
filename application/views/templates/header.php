<!DOCTYPE html>
<html>
<head>
  <title>Fagu - <?php echo $title ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('css/main.css') ?>">
</head>
<body>
  <header>
    <div id="logo">fagu</div>
    <div id="perfil">
      <p><?php echo $user_name ?></p>
    </div>
    <a href="<?php echo site_url('auth/logout') ?>">Cerrar Sesión</a>
  </header>
