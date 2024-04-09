<?php
  // bases de datos
  session_start();
  $auth = $_SESSION['login'] ?? false;
  $rol = $_SESSION['role_id'];

  if(!$auth or $rol < 2){
      header('Location: /');
  }
  require '../../includes/config/database.php';

 $db = conectarDB();
  //FIN BD
//Consulta para obtener usuarios
$consulta = "SELECT * FROM USUARIOS ";
$resultado = mysqli_query($db, $consulta);




// arreglo con mensajes de errores

$errores = [];


    
    $nombre = $propiedad['fullname'];
    $email =  $propiedad['email'];
    $contrasena = $propiedad['password'];
    $rol = $propiedad['role_id'];
    $enabled = $propiedad['enabled'];

// ejecutar codigo despues de enviar el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];
    $enabled = $_POST["enabled"];

  //validaciones

  // if (!$id|| !$nombre|| !$email || !$contrasena || !$rol) {
  //   $errores[] = 'Todos los campos son obligatorios. Por favor, complete todos los campos.';
  // }


  //VARIABLES
  $errorID = "";
  $errorNombre = "";
  $errorEmail = "";
  $errorContrasena = "";
  $errorRol = "";
  $errorEnabled = "";


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

if (!$rol) {
  $errorRol = 'El Rol no puede estar vacio.';
  $validacionExitosa = false;
}

if (!$enabled) {
  $errorEnabled = 'El estado del usuario no puede estar vacio.';
  $validacionExitosa = false;
}

// Si alguna validación falla, cancelamos la ejecución del query
if ($validacionExitosa) {
  // Si todas las validaciones son exitosas y no hay errores, ejecutamos el query en la base de datos
  $query = "UPDATE USUARIOS SET fullname = '$nombre', email = '$email', password = '$contrasena', updated_at = NOW(), role_id = '$rol', enabled = '$enabled' WHERE id = '$id' ";
  $result = mysqli_query($db, $query);
  if($result){
      echo "Actualizado Correctamente";
      //redireccionar al usuario
      header('Location: /admin');
  } else {
      // Manejar el error en caso de que la actualización falle
      echo "Error al actualizar en la base de datos: " . mysqli_error($db);
  }
} else {
  // Si alguna validación falla o hay errores, puedes mostrar un mensaje al usuario o manejar la situación según lo necesites.
  // Por ejemplo:
  // echo "Error en los datos ingresados. Por favor, revise nuevamente.";
}


}
    require '../../includes/funciones.php';
    incluirTemplate('header');


// HTML 
?>
<main class="contenedor seccion sombra">
    <img src="img/185038_home_house_icon(1).png" alt="">
    <h2>Actualizar</h2>
    <p> Completa el formulario para actualizar el usuario:</p>

      <form id="registroForm" method="post" action="/admin/propiedades/actualizar.php">
        <fieldset>
          <legend>Información general</legend>
          <div class="selectorID">
            <label for="id">Seleccionar usuario:</label>
            <select name="correo">
              <option value="">>-- Seleccione --<</option>
              <?php while ($id = mysqli_fetch_assoc($resultado)) :?>
              <option  placeholder="Ej: 1" value="<?php echo $id['id']; ?>">
              <?php echo $id ['fullname'] . " -- " . $id['email']; ?> </option>
              <?php endwhile?>
            </select>
            <?php
            // Verificar si $error tiene contenido
            if (!empty($errorID)) {
            ?>
              <div class="alerta error">
                <?php echo $errorID; ?>
              </div>
            <?php
            }
            ?>
          </div>

          <div>
            <input class="buscar" type="submit" name="buscar_usuario" value="Buscar usuario"></button>
          </div>
          <br>

          <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            
            <input type="email" id="email" name="email" placeholder="Correo Electrónico" >
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
          <br>

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
          <br>
          <div class="form-group">
            <label for="rol">Número de Rol:</label>
            <input type="number" id="rol" name="rol" placeholder="Ej: 1" min="1" max="3" >
            <?php
            // Verificar si $error tiene contenido
            if (!empty($errorRol)) {
            ?>
              <div class="alerta error">
                <?php echo $errorRol; ?>
              </div>
            <?php
            }
            ?>
          </div>
          <br>
          <div class="form-group">
            <label for="enabled">Estado del usuario</label>
            <input type="number" id="enabled" name="enabled" placeholder="Ej: 1 para activo, 2 para inactivo" min="1" max="2" >
            <?php
            // Verificar si $error tiene contenido
            if (!empty($errorEnabled)) {
            ?>
              <div class="alerta error">
                <?php echo $errorEnabled; ?>
              </div>
            <?php
            }
            ?>
          </div>
          
          <div>
            <input class="actualizar" type="submit" value="Actualizar usuario"></button>
          </div>
          <br>
        </fieldset>
      </form>
</main>