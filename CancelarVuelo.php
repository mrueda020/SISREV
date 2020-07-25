<?php

include 'Clases/Conexion.php';
session_start();
$con = new Conexion("localhost","root","","sisrev");
$conn = $con -> crearConexion();




$sql = "select idUsuario from usuario  where correo  = "."'".$_SESSION["correo"]."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	
	$_SESSION["idUsuario"] = $row["idUsuario"];
	
}

 $sql = "update ticket set estatus = 'cancelado' where idUsuario = "."'".$_SESSION["idUsuario"]."'"." and idvuelo = "."'".$_POST["vuelo"]."'";
 $result = $conn->query($sql);
 echo"<script>"; 
 echo "alert('Vuelo cancelado');";
 echo	"window.location='Cuenta.php';";
 echo "</script>";
		// echo "Ya has comprado este vuelo";
// while($row = $result->fetch_assoc()) {
	// $tarjeta = $row["noTarjeta"];
	
// }

// if ($tarjeta!=""){
	// echo $_SESSION["idUsuario"];
	// $sql = "select * from ticket where idvuelo = "."'".$_POST["vuelo"]."'"."and idUsuario = "."'".$_SESSION["idUsuario"]."'";
	// $result = $conn->query($sql);
	// if ($result->num_rows > 0) {
		// echo"<script>"; 
		// echo "alert('Ya has comprado este vuelo');";
	    // echo	"window.location='Menu.php';";
	    // echo "</script>";
		// echo "Ya has comprado este vuelo";
	// }
	// else{
		// $sql = "insert into ticket (idUsuario,idvuelo,estatus) values ("."'".$_SESSION["idUsuario"]."'".","."'".$_POST["vuelo"]."'".","."'"."pendiente"."'".")";
		// $result = $conn->query($sql);
		
		// echo"<script>"; 
		// echo "alert('Compra Exitosa');";
	    // echo "window.location='Cuenta.php';";
	    // echo "</script>";
	// }
// }
// else{
	// echo"<script>"; 
	// echo "alert('Debe registrar una tarjeta de credito');";
	// echo	"window.location='Menu.php';";
	// echo "</script>";
	// echo "Debe registrar una tarjeta de credito";
// }
?>