<?php 
  session_start();


  $auth = $_SESSION['login'] ?? false;
  $email =  $_SESSION['usuario'];
  $rol = $_SESSION['role_id'];
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preload" href="/css/normalize.css" as="styles">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="/css/stylesHome.css" as="styles">
    <link rel="preload" href="/css/styles.css" as="styles">
    <link rel="preload" href="/css/admin.css" as="styles">
    <link rel="preload" href="/css/buttons.css" as="styles">
    <link rel="stylesheet" href="/css/buttons.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/stylesHome.css">
    <link rel="stylesheet" href="/css/admin.css">
  </head>

  <body>
    <header >
    <?php
            // Verificar si $error tiene contenido
            ?>
              <?php if ($auth): ?>
                <div class=" etiqueta error">
                <p>¡Bienvenido!: <?php echo  $email; ?></p>  
              </div>
              <?php endif; ?>
              
            <?php
            
            ?>
      <h1 class="titulo">ABMODEL <span>Freelancers</span></h1>
    </header>

    <div class="nav-bg">
      <nav class="nav-principal contenedor">
        <a href="/list.php">Ejemplos</a>

        <?php if (!$auth): ?>
          <a href="/register.php">Registrate</a>
        <?php endif; ?>

        <?php if (!$auth): ?>
          <a href="/login.php">Iniciar Sesion</a>
        <?php endif; ?>

        <a href="">Contacto</a>
        
        <?php if ($auth and $rol > 1): ?>
          <a href="/admin">Administrador</a>
          <?php endif; ?>
        <?php if ($auth): ?>
          <a href="cerrar-sesion.php">Cerrar Sesion</a>
          <?php endif; ?>
      </nav>
    </div>
    

