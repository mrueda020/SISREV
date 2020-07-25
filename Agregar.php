<?php
	include 'Clases/Conexion.php';
	include 'Clases/Administrador.php';
    session_start();
	$_SESSION["admin"]->comprarVuelo($_POST["aerolinea"],$_POST["destino"],$_POST["pais"],$_POST["precio"],$_POST["fecha"],$_POST["hora"]);
?>	