<?php 
session_start(); // Iniciamos sesión o  bien la continuamos recuperando los datos guardados en la sesión ($_SESSION)
 if (!isset($_SESSION['email'])){ // Usuario NO logueado, intentan visualizar la bandeja de entrada sin haber iniciado sesión
  header("location:index.php"); 
  die();
 }
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>XMail - Badeja de Entrada</title>
	<link rel="stylesheet" href="estilos.css" />
	<meta charset="utf-8">
</head>
<body>
<div id="principal">
	<h1>Xmail</h1>
	<div>Bandeja de entrada de <strong> <?php echo $_SESSION['nombre']; ?> </strong>
			<form style="display:inline" method="POST" action="cerrar_sesion.php">
			  <input type="submit" value="Cerrar sesión">
			 </form>
	</div>
	<h2>
	 Sus emails:
	</h2>

	
</div>
</body>
</html>