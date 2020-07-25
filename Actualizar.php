<?php
	include 'Clases/Conexion.php';
	include 'Clases/Cliente.php';
    session_start();
	$_SESSION["mail"] = $_POST['email'];
	$_SESSION["pswm"] = $_POST['psw'];
	$_SESSION["tarjeta"]= $_POST["tarjeta"];
	$_SESSION["nombret"] = $_POST["nombret"];
	$_SESSION["codigo"] = $_POST["codigo"];
	$_SESSION["fecha"] = $_POST['mes'];
	$_SESSION["fecha"].="/";
	$_SESSION["fecha"].=$_POST['anio'];
	$_SESSION["cliente"]->actualizarInformacion();
	
	
	
	
	
	
	
?>