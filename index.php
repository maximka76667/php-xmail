<?php 
session_start(); // Iniciamos sesión o  bien la continuamos recuperando los datos guardados en la sesión ($_SESSION)
 if (isset($_SESSION['email'])){ // La presencia del email indica USUARIO LOGUEADO
  header("location:entrada.php");  // Bandeja de entrada
  die(); // Finaliza es script, pues tras la redirección continuaría.
 }
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>XMail</title>
	<link rel="stylesheet" href="css/estilos.css" />
	<meta charset="utf-8">
</head>
<body>

<div id="principal">
	<h1>Xmail</h1> 
	
	<p class="error">
	  <?php  
	      if ( isset($_SESSION['error_login']) ) {
	      	 echo $_SESSION['error_login'];
	      	 unset($_SESSION['error_login']); // Una vez mostrado, eliminamos de la sesión el error, para no volver a mostrarlo.
	       } 
	    ?>
	
	</p>

	<form id="formulario" method="POST" action="autentificacion.php" >
		<p>Correo electrónico</p>
		<div><input type="text" name="correo"></div>
		<p>Contraseña</p>
		<div><input type="password" name="clave"></div>
		<div><input type="submit" value="Entrar"></div>
		<a href="alta.php">Crear cuenta</a>
	</form>
</div>

</body>
</html>