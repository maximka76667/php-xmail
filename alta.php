<?php 
session_start(); // Iniciamos sesión o  bien la continuamos recuperando los datos guardados en la sesión ($_SESSION)
 if (isset($_SESSION['email'])){ // La presencia del email indica USUARIO LOGUEADO
  header("location:entrada.php");  // Bandeja de entrada
  die(); // Finaliza es script, pues tras la redirección continuaría.
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xmail - Nuevo usuario</title>
  <link rel="stylesheet" href="./css/alta.css">
</head>
<body class="alta">
  <form class="alta__form" action="ins_usuario.php" method="POST">
    <h1 class="alta__heading">Crear nueva cuenta</h1>
    <input class="alta__input" name="correo" type="email" required placeholder="Email">
    <input class="alta__input" name="nombre" type="text" required placeholder="Nombre">
    <input class="alta__input" name="apellido1" type="text" required placeholder="Primer apellido">
    <input class="alta__input" name="apellido2" type="text" placeholder="Segundo apellido">
    <input class="alta__input" name="clave" type="password" required placeholder="Clave">
    <input class="alta__input" name="repe_clave" type="password" required placeholder="Repetir clave">
    <button class="alta__submit-button" type="submit">Crear</button>
  </form>
</body>
</html>