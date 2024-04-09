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
  
  // VARIABLES 
  $errorID = "";
  $errorNombre = "";
  $errorEmail = "";

  // arreglo con mensajes de errores
  $errores = [];

  // FIN VARIABLES ******************************************************************
  
 
   
  // FIN VALIDACIONES ***********************************************
// ejecutar codigo despues de enviar el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    //validaciones

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

    if(empty($errores)) {
        //actualizar en la bd
        $query = "DELETE FROM USUARIOS WHERE id = '$id' ";
        $result = mysqli_query($db, $query);
        if($result){
            echo "El usuario se ha eliminado Correctamente";
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

  

    require '../../includes/funciones.php';
    incluirTemplate('header');


// HTML 
  ?>

<main class="contenedor seccion sombra">
    <img src="img/185038_home_house_icon(1).png" alt="">
    <h2>Eliminar</h2>
    <p> Completa el formulario para eliminar al usuario:</p>

    <?php foreach($errores as $error):?>
      <div class="alerta error">
        <?php echo $error;?>
      </div>
    <?php endforeach;?>

      <form id="registroForm" method="post" action="/admin/propiedades/eliminar.php">
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
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo" >
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

          <div>
            <input class="eliminar" type="submit" value="Eliminar usuario"></button>
          </div>
          <br>
        </fieldset>
      </form>
</main>