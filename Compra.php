<?php
	include 'Clases/Conexion.php';
	include 'Clases/Cliente.php';
    session_start();
	$_SESSION["idVuelo"]=$_POST["vuelo"];
	$_SESSION["cliente"]->comprarVuelo();
?>	