<?php
	 include 'Clases/Conexion.php';
	 include 'Clases/Administrador.php';
     session_start();
     $_SESSION["admin"]->modificarVuelos();
	
?>