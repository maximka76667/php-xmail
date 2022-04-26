<?php
 session_start(); // Iniciamos o continuamos sesión.

  extract($_POST); // Obtenemos los valores del formulario de login.
  if (!isset($correo) || $correo==null || !isset($clave) || $clave==null) { 
     $_SESSION['error_login']='Debe introducir correo electrónico y contraseña';
   }
   else{ // Han introducido email y contraseña
     		// Como mejora, se podrían añadir aquí validaciones de datos en $correo y $clave, librando así al servidor de recibir consultas inncesarias.
     		$servidor="localhost";
     		$usuario="root";
     		$clave_mysql="root";
     		$base_datos="xmail";
     		$conexion=mysqli_connect($servidor,$usuario,$clave_mysql,$base_datos)  or die( "ERROR: Al conectar con el servidor ". 
                                                                                                  mysqli_connect_error() );
     
         // Comprobamos si el usuario existe.		
     		$consulta_login="SELECT * FROM `usuarios` WHERE `correo`='$correo' and clave=md5('$clave')";
     		$resultado=mysqli_query($conexion,$consulta_login);
     		if ($resultado && mysqli_num_rows($resultado)==1){ // El usuario existe
      		

      		$_SESSION['email']=$correo; // La presencia de este dato, será la marca de USUARIO LOGUEADO
      		$fila = mysqli_fetch_array($resultado);
      		$_SESSION['nombre']= $fila['nombre'];
			
			 header("location:entrada.php");  // Bandeja de entrada
			 die(); // Finaliza es script, pues tras la redirección continuaría.
      
      	  
     		}
     		else {
      		 $_SESSION['error_login']='El usuario no existe. Por favor, inténtelo otra vez';
     		}
   }


   header("location:index.php");  // Se vuelve con un mensaje de error en la sesión.
 
?>