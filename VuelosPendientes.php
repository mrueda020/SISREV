<?php
	include 'Clases/Conexion.php';
	include 'Clases/Cliente.php';
    session_start();
	$_SESSION["cliente"]->mostrarVuelosPendientes();
?>
	
	
