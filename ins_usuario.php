<?php
  session_start();
  extract($_POST);
  $isError = false;

  if(!isset($correo) || $correo == null 
  || !isset($nombre) || $nombre == null 
  || !isset($apellido1) || $apellido1 == null
  || !isset($clave) || $clave == null) {
    $isError = true;
    die("Rellena todas las filas obligatorias");
  }

  if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $isError = true;
    die("Correo electrónico inválido");
  }

  if($clave !== $repe_clave) {
    $isError = true;
    die("Clave y repetir clave deben ser iguales");
  }

  if(!$isError) {
    $connection = mysqli_connect("localhost", "root", "root", "xmail") or die("Connection error: " . mysqli_connect_error());
    $query = "INSERT INTO `usuarios` VALUES('$correo', '$nombre', '$apellido1', '$apellido2', md5('$clave'))";
    $result = mysqli_query($connection, $query) or die("Query error: " . mysqli_error($connection));;
    $_SESSION['email'] = $correo;
    $_SESSION['nombre'] = $nombre;
    header("location:entrada.php");
  }