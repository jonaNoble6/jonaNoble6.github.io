<?php
    session_start();
    $auth = $_SESSION['login'] ?? false;
    $rol = $_SESSION['role_id'];

    if(!$auth or $rol < 2){
        header('Location: /');
    }
    require '../includes/funciones.php';
    incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Administrador de ABMODEL</h1>

    <a href="/index.php" class="boton">INICIO</a>
    <a href="/admin/propiedades/actualizar.php" class="boton">Actualizar</a>
    <a href="/admin/propiedades/eliminar.php" class="boton">Eliminar</a>
</main>