<?php
  // bases de datos

  require '../../includes/config/database.php';

 $db = conectarDB();
  //FIN BD

// arreglo con mensajes de errores

$errores = [];


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


  if (!$id) {
    $errorID = 'El ID no puede estar vacio.';
   }


 $nombreRegex = '/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/u';
    if (preg_match($nombreRegex, $nombre)) {
      
    }else{
      $errorNombre = 'El nombre no puede estar vacio y  solo puede contener letras y espacios.';
    }

  $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
  if (preg_match($emailRegex, $email)) {
  
  }else{
      $errorEmail = "Por favor, ingrese un correo electrónico válido.";
  }

  $passwordRegex = '/^(?=.*[^\w\s]).{8,}$/';
  if (preg_match($passwordRegex, $contrasena)) {
    
  }else{
    $errorContrasena = "La contraseña debe tener al menos 8 caracteres y contener al menos un caracter especial.";
  }

  if (!$rol) {
    $errorRol = 'El Rol no puede estar vacio.';
   }

  if (!$enabled) {
  $errorEnabled = 'El estado del usuario no puede estar vacio.';
  } 

// echo"<pre>";
// var_dump($errores);
// echo"</pre>";

// exit;

//revisar el array errores tiene que estar vacio

  if(empty($errores)) {
    //actualizar en la bd
    $query = "UPDATE USUARIOS SET fullname = '$nombre', email = '$email', password = '$contrasena', updated_at = NOW(), role_id = '$rol', enabled = '$enabled' WHERE id = '$id' ";
    $result = mysqli_query($db, $query);
    if($result){
        echo "Insertado Correctamente";
    }
    echo $query;
  }

}
    require '../../includes/funciones.php';
    incluirTemplate('header');


// HTML 
?>
<p>Admin:</p>
<main class="contenedor seccion sombra">
    <img src="img/185038_home_house_icon(1).png" alt="">
    <h2>Actualizar</h2>
    <p> Completa el formulario para actualizar el usuario:</p>

    <?php foreach($errores as $error):?>
      <div class="alerta error">
        <?php echo $error;?>
      </div>
    <?php endforeach;?>

      <form id="registroForm" method="post" action="/admin/propiedades/actualizar.php">
        <fieldset>
          <legend>Información general</legend>
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="numeric" id="id" name="id" placeholder="Ej: 1" >
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
          <br>

          <div class="form-group buscar">
            <input class="boton" type="submit" name="buscar_usuario" value="Buscar usuario"></button>
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
          <br>
          <div class="form-group enviar">
            <input class="boton" type="submit" value="Actualizar usuario"></button>
          </div>
        </fieldset>
      </form>
</main>