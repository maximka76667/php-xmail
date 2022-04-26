<?php 
session_start(); // Abrimos o recuperamos la sesión abierta.

// Sólo tras session_start(), podemos cerrar la sesión.

  session_unset();   // Borramos las variables en memoria $_SESSION
  session_destroy(); // Borramos la sesión en el servidor

  header("location:index.php"); // Redireccionamos
?>