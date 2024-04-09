<?php
  // bases de datos

  require 'includes/config/database.php';

 $db = conectarDB();
  //FIN BD
  


  // VARIABLES 
 
 
  $errorEmail = "";
  $errorContrasena = "";

  // arreglo con mensajes de errores
  $errores = [];


  $email = "";
  $contrasena = "";
  // FIN VARIABLES ******************************************************************
  
 
   
  // FIN VALIDACIONES ***********************************************
// ejecutar codigo despues de enviar el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    
    //validaciones
    $email = mysqli_real_escape_string($db, filter_var($email, FILTER_VALIDATE_EMAIL));
    
    $contrasena = mysqli_real_escape_string($db, $_POST['contrasena']);


    $validacionExitosa = true;
  
    if (!$email) {
      $errorEmail = "El email es obligatorio o no es valido";
      $validacionExitosa = false;
    }

    
     if (!$contrasena) {
       $errorContrasena = 'La contraseña es obligatoria';
       $validacionExitosa = false;
    }

    
    if($validacionExitosa == true) {
      //actualizar en la bd
      $query = "SELECT * FROM USUARIOS WHERE EMAIL = '{$email}'";
      $result = mysqli_query($db, $query);
      if($result->num_rows ) {
        $usuario = mysqli_fetch_assoc($result);
        $contrasena_almacenada = $usuario['password'];
        if(password_verify($contrasena, $contrasena_almacenada)) {
          // el usuario es correcto
          session_start();
          //llenar el array de la sesion
          $_SESSION['usuario'] = $usuario['email'];
          $_SESSION['role_id'] = $usuario['role_id'];
          $_SESSION['login'] = true;
          $rol = $_SESSION['role_id'];
          // $auth = $_SESSION['login'];
          // $rol = $_SESSION['role_id'];
          
          if($rol >= 2){
              header('Location: /admin');
             exit;
          }else{
            header('Location: /');
          }
        }else{
          
          $errorauthpass = 'la contraseña es incorrecta o no existe.';
        }
      }else{
        $errorauthuser = 'El usuario es incorrecto o no existe.';
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
<body>
  <div class="login-container sombra">
    <img src="img/185038_home_house_icon(1).png" alt="">
    <h2>¡Bienvenido!</h2>
    <p> Ingresa ahora:</p>
      <form id="loginForm" method="post" action="login.php">
          <div class="form-group">
            <label  for="email">Correo Electrónico:</label>
            <input  type="email" id="email" name="email" placeholder="Correo Electrónico">
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
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
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
            <button  class="boton" type="submit">Iniciar Sesión</button>
          </div>
      </form>
  </div>
</body>
</html>
