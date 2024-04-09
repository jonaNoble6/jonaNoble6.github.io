<?php
// Conexión a la base de datos y demás configuraciones necesarias

require '../../includes/config/database.php';

$db = conectarDB();

// Obtener el ID del usuario enviado desde el formulario
$idUsuario = $_POST['id'];

// Consulta para obtener los datos del usuario
$consulta = "SELECT * FROM USUARIOS WHERE id = '$idUsuario'";
$resultado = mysqli_query($db, $consulta);
$datosUsuario = mysqli_fetch_assoc($resultado);

// Devolver los datos del usuario como respuesta en formato JSON
echo json_encode($datosUsuario);

