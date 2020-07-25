<?php
	session_start();
	include 'Clases/Conexion.php';
	//include 'Clases/Usuario.php';
	include_once 'Clases/Cliente.php';
	include_once 'Clases/Administrador.php';
	
	$_SESSION["correo"]=$_POST['mailr'];
	$_SESSION["psw"]=$_POST['pswr'];
	$con = new Conexion("localhost","root",$password,"sisrev");
	$conn = $con -> crearConexion();
	$sql = "select * from usuario where correo = "."'".$_SESSION["correo"]."'";
	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row["tipoUsuario"] == "cliente"){
		$_SESSION["cliente"]= new Cliente($_POST['email'],$_POST['psw'],"cliente",$row["nombre"],$row["paterno"],$row["materno"],"");
		echo"<script>"; 
		echo	"window.location='Menu.php';";
		echo "</script>";
	}
	else{
		
		$_SESSION["admin"]= new Administrador($_POST['email'],$_POST['psw'],"administrador",$row["nombre"],$row["paterno"],$row["materno"]);
		echo"<script>"; 
		echo	"window.location='MenuAdmin.php';";
		echo "</script>";
		
	}

?>