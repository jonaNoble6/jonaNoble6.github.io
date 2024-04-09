<?php
  // bases de datos

  require 'includes/config/database.php';

 $db = conectarDB();
  //FIN BD
  


  // VARIABLES 
  $errorID = "";
  $errorNombre = "";
  $errorEmail = "";
  $errorContrasena = "";
  $errorConfirmContrasena = "";

  $succes = "¡Se ha creado exitosamente tu usuario, ya puedes Iniciar Sesion!";
  // arreglo con mensajes de errores
  $errores = [];


  $id = "";
  $nombre = "";
  $email = "";
  $contrasena = "";
  $confirmcontrasena = "";
  // FIN VARIABLES ******************************************************************
  
 
   
  // FIN VALIDACIONES ***********************************************
// ejecutar codigo despues de enviar el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $confirmcontrasena = $_POST["confirmcontrasena"];

    // Inicializamos la variable booleana
$validacionExitosa = true;

// Validaciones

if (!$id) {
  $errorID = 'El ID no puede estar vacio.';
  $validacionExitosa = false;
}

$nombreRegex = '/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/u';
if (preg_match($nombreRegex, $nombre)) {
  
}else{
  $errorNombre = 'El nombre no puede estar vacio y  solo puede contener letras y espacios.';
  $validacionExitosa = false;
}

$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
if (preg_match($emailRegex, $email)) {

}else{
  $errorEmail = "Por favor, ingrese un correo electrónico válido.";
  $validacionExitosa = false;
}

$passwordRegex = '/^(?=.*[^\w\s]).{8,}$/';
if (preg_match($passwordRegex, $contrasena)) {
  
}else{
  $errorContrasena = "La contraseña debe tener al menos 8 caracteres y contener al menos un caracter especial.";
  $validacionExitosa = false;
}

if ($confirmcontrasena === $contrasena) {
   $passwordHash = password_hash($confirmcontrasena, PASSWORD_DEFAULT);
}else{
  $errorConfirmContrasena = "Las contraseñas no coinciden";
  $validacionExitosa = false;
}


// Si alguna validación falló, cancelamos la ejecución del query
if ($validacionExitosa = true) {
  // Si todas las validaciones son exitosas y no hay errores, ejecutamos el query en la base de datos
  $query = "INSERT INTO USUARIOS (fullname,email,password,created_at,updated_at,role_id,enabled) VALUES ('$nombre','$email','$passwordHash',NOW(),NOW(),'1',1)";
  $result = mysqli_query($db, $query);
  if($result){
      echo "¡Se ha creado exitosamente tu usuario, ya puedes Iniciar Sesion!";
      echo $result;
      
  } else {
      // Manejar el error en caso de que la inserción falle
      echo "Error al insertar en la base de datos: " . mysqli_error($db);
  }
}
}
  // if (!$id|| !$nombre|| !$email || !$contrasena || !$rol) {
  //   $errores[] = 'Todos los campos son obligatorios. Por favor, complete todos los campos.';
  // }

// echo"<pre>";
// var_dump($errores);
// echo"</pre>";

// exit;

//revisar el array errores tiene que estar vacio

    require 'includes/funciones.php';
    incluirTemplate('header');


// HTML 
?>
<main class="contenedor seccion sombra">
    <img src="img/185038_home_house_icon(1).png" alt="">
    <h2>Registrarse</h2>
    <p> Completa el formulario para poder registrarte:</p>

      <form class="formRegistro" id="registroForm" method="post" action="register.php">
        <fieldset>
          <legend>Información general</legend>
          <div class="cont-campos">
            <div class="form-group">
              <label for="nombre">Nombre Completo:</label>
              <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo" value="<?php echo $nombre; ?>">
              <?php
              // Verificar si $error tiene contenido
              if (!empty($errorNombre)) {
              ?>
                <div class="alerta error">
                  <?php echo $errorNombre; ?>
                </div>
              <?php
              }
              ?>
            </div>
            

            <div class="form-group">
              <label for="email">Correo Electrónico:</label>
              <input type="email" id="email" name="email" placeholder="Correo Electrónico" value="<?php echo $email; ?>">
              <?php
              // Verificar si $error tiene contenido
              if (!empty($errorEmail)) {
              ?>
                <div class="alerta error">
                  <?php echo $errorEmail; ?>
                </div>
              <?php
              }
              ?>
            </div>
            

            <div class="form-group">
              <label for="contrasena">Contraseña:</label>
              <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" >
              <?php
              // Verificar si $error tiene contenido
              if (!empty($errorContrasena)) {
              ?>
                <div class="alerta error">
                  <?php echo $errorContrasena; ?>
                </div>
              <?php
              }
              ?>
            </div>
            

            <div class="form-group">
              <label for="confirmcontrasena">Confirmar contraseña:</label>
              <input type="password" id="confirmcontrasena" name="confirmcontrasena" placeholder="Contraseña" >
              <?php
              // Verificar si $error tiene contenido
              if (!empty($errorConfirmContrasena)) {
              ?>
                <div class="alerta error">
                  <?php echo $errorConfirmContrasena; ?>
                </div>
              <?php
              }
              ?>
            </div>
            
          </div>
          <div class="enviar">
            <input class="boton" type="submit" value="Registrarse"></button>
          </div>
        </fieldset>
      </form>
</main>