<?php
session_start();
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html>
<title>Reserva vuelos al mejor precio con SISREV</title>>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="Estilos/CSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="loginStyle.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee,.fa-plane {font-size:200px}

	input[type=text], input[type=password] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  display: inline-block;
	  border: none;
	  background: #f1f1f1;
	}

	
	select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
	
	
	
	input[type=text]:focus, input[type=password]:focus {
	  background-color: #ddd;
	  outline: none;
	}

	hr {
	  border: 1px solid #f1f1f1;
	  margin-bottom: 25px;
	}


	button {
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	  opacity: 0.9;
	}

	button:hover {
	  opacity:1;
	}

	
	.cancelbtn {
	  padding: 14px 20px;
	  background-color: #f44336;
	}

	
	.cancelbtn, .signupbtn {
	  float: left;
	  width: 50%;
	}

	
	.container {
	  padding: 16px;
	}


	.clearfix::after {
	  content: "";
	  clear: both;
	  display: table;
	}

	
	@media screen and (max-width: 300px) {
	  .cancelbtn, .signupbtn {
		width: 100%;
	  }
	}
	
	.error {
	  color: #FF0000;
	}
	
	.green {
		color:green;
	}
	
	


</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Buscar</a>
    <a href="Login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Entra</a>
    <a href="Registro.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Registrate</a>
    <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a> -->
    <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a> -->
  </div>

 
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
     <a href="Login.php" class="w3-bar-item w3-button w3-padding-large w3-white">Entra</a>
	 <a href="Registro.php" class="w3-bar-item w3-button w3-padding-large w3-white">Registrate</a>
	 <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-white">Buscar</a>
  </div>
</div>
<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Bienvenido a SISREV</h1>
  <!-- <a href="docs/proyectov1.02.pdf" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Descarga aqui la documentación completa</a> -->
</header>

 <?php
	include 'Clases/Conexion.php';
	include 'Clases/Correo.php';
	error_reporting(E_ALL ^ E_NOTICE);
	$password = "";
	$con = new Conexion("localhost","root",$password,"sisrev");
	$conn = $con -> crearConexion();
	$nombretValido = true;
	$mailr=false;
	$tarjetaValida=true;
	$codigoValido=true;
	
	
	
	
	
	if($_POST['email']==""){
		
	}
	else {	
		if($_POST['psw'] != $_POST['psw-repeat']){
			 echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
			 echo '<h3 class ='.'"'.'error'.'"'.'>La contraseña no coincide  </h3>';
			 echo '</div>'; 
			
		}
		else if(strlen($_POST['psw'])<8){
			echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
			echo '<h3 class ='.'"'.'error'.'"'.'>La contraseña tiene que ser minimo de 8 caracteres  </h3>';
			echo '</div>'; 
		}
		else{
			$sql = "SELECT correo from usuario where correo =". "'".$_POST['email']."'";
			$result = $conn->query($sql);
			$nombre = $_POST["nombre"];
			$apellidos = $_POST["apellidos"];
			$nombreTarjeta = $_POST["nombret"];
			$tarjeta = $_POST["tarjeta"];
			$codigo = $_POST["codigo"];
			if ($result->num_rows == 1) {
				 echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
				 echo '<h3 class ='.'"'.'error'.'"'.'>Este correo ya fue registrado anteriormente por favor intente con otro </h3>';
				// echo '<a  href='.'"'.'Registro.php'.'"'.'class ='.'"'.'w3-button'.' '.'w3-green'.' '.'w3-padding-large'.' '.'w3-large'.' '.'w3-margin-top'.' '.'w3-bar-item'.'"'.'>Regresar al menu anterior</a>';
				 echo '</div>'; 
				$_POST['email']="";
				$mailr = true;
			}
			
			else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				  echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				  echo '<h3 class ='.'"'.'error'.'"'.'>Este correo no es valido por favor intente otro </h3>';
				  //echo '<a  href='.'"'.'Registro.php'.'"'.'class ='.'"'.'w3-button'.' '.'w3-green'.' '.'w3-padding-large'.' '.'w3-large'.' '.'w3-margin-top'.' '.'w3-bar-item'.'"'.'>Regresar al menu anterior</a>';
				  echo '</div>'; 
				  $_POST['email']="";
				  $mailr = true;
			}
			
			
			// checa si el nombre tiene letras y espacios
			 if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
				echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			    echo '<h3 class ='.'"'.'error'.'"'.'>Incluye solo letras y espacios en el nombre </h3>';
				echo '</div>';
				$mailr=true;
			}
			
			
			// checa si el nombre tiene letras y espacios
			 if (!preg_match("/^[a-zA-Z ]*$/",$apellidos)) {
				echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			    echo '<h3 class ='.'"'.'error'.'"'.'>Incluye solo letras y espacios en los apellidos </h3>';
				echo '</div>';
				$mailr=true;
			}
			
			 if($tarjeta!=""){
				if(strlen($tarjeta)!= 16){
					echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					echo '<h3 class ='.'"'.'error'.'"'.'>Incluye datos de la tarjeta validos o hazlo despues </h3>';
					echo '</div>';
					$tarjetaValida=false;
				}
				else{
					for($i=0;$i<16;$i++){
						if(($tarjeta[$i]=="1")||($tarjeta[$i]=="2")||($tarjeta[$i]=="3")||($tarjeta[$i]=="4")||($tarjeta[$i]=="5")||($tarjeta[$i]=="6")||($tarjeta[$i]=="7")||($tarjeta[$i]=="8")||($tarjeta[$i]=="9")||($tarjeta[$i]=="0")){
							
							$tarjetaValida=true;
			
						}
						else{
							
							echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
							echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa 16 digitos de la tarjeta </h3>';
							echo '</div>';
							$tarjetaValida=false;
							break;
							
						}	
					}	
				}		
			}
			
			if ($nombreTarjeta !=""){
				if (!preg_match("/^[a-zA-Z ]*$/",$nombreTarjeta)) {
					echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					echo '<h3 class ='.'"'.'error'.'"'.'>Incluye un nombre valido para la tarjeta </h3>';
					echo '</div>';
					$nombretValido = false;
				}
				else {
					if(($tarjeta=="")||(strlen($tarjeta)!=16)){
						echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
						echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa 16 digitos de la tarjeta </h3>';
						echo '</div>';
						$nombretValido = false;
					}
					else{
						$nombretValido = true;
					}
					
				}	
			}
			
			if($codigo!=""){
				if(strlen($codigo)!= 3){
					echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa el codigo de seguridad correcto </h3>';
					echo '</div>';
					$codigoValido=false;
				}
				else{
					for($i=0;$i<3;$i++){
						if(($codigo[$i]=="1")||($codigo[$i]=="2")||($codigo[$i]=="3")||($codigo[$i]=="4")||($codigo[$i]=="5")||($codigo[$i]=="6")||($codigo[$i]=="7")||($codigo[$i]=="8")||($codigo[$i]=="9")||($codigo[$i]=="0")){
							
							$codigoValido=true;
			
						}
						else{
							
							echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
							echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa el codigo de seguridad correcto </h3>';
							echo '</div>';
							$codigoValido=false;
							break;
							
						}	
					}	
				}		
			}
				
			if($nombretValido==true&&$mailr==false&&$tarjetaValida==true&&$codigoValido==true){
				$apellidoP = $apellidoM ="";
				$Apellidos = $_POST['apellidos'];
				for($i=0;$i<strlen($Apellidos);$i++){
					if($Apellidos[$i] == " "){
						$i++;
						break;
					}
					$apellidoP[$i] = $Apellidos[$i];	
				}
				$k=0;
				for($j=$i;$j<strlen($Apellidos);$j++){
					
					$apellidoM[$k]=  $Apellidos[$j];	
					$k++;
				}
				
				$sql = "select count(*) from tarjeta";
				$result = $conn->query($sql);;
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$idsTarjetas= $row["count(*)"];
						$idsTarjetas++;
					}
				} 
				else {
					$idsTarjetas=0;
				}
				
				$sql = "insert into tarjeta (idTarjeta) values("."'".$idsTarjetas."'".")";
				//echo $sql;
				$conn->query($sql);
				$sql = "insert into usuario(nombre,paterno,materno,correo,password,tipoUsuario,idtarjeta) values("."'".$_POST['nombre']."'".","."'".$apellidoP."'".","."'".$apellidoM."'".","."'".$_POST['email']."'".","."'".$_POST['psw']."'".",'cliente',"."'".$idsTarjetas."'".") ";
				if ($conn->query($sql) === TRUE) {
				   echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					echo '<h3 class ='.'"'.'green'.'"'.'>Su cuenta fue creada exitosamente </h3>';
					
					echo '</div>'; 
					 // $correo = new Correo();
					 // $correo->enviarCorreo($_GET['email']);
					 // $_GET['email']="";
					
					
					
				} 
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				if ($tarjeta!=""&&$codigo!=""){
					$fecha = $_POST['mes'];
					$fecha.="/";
					$fecha.=$_POST['anio'];
					$sql = "update tarjeta set noTarjeta ="."'".$tarjeta."'"." ,cseguridad="."'".$codigo."'".",saldo = 10000, vencimiento ="."'".$fecha."'" ."  WHERE idTarjeta = "."'". $idsTarjetas."';";
					$conn->query($sql);
					
				}
				
				$conn->close();
				
			}
		}	
	}	
?> 





<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">

  <div class="w3-content">
    <div class="w3-twothird">
      <form action="Registro.php" method = "post" style="border:1px solid #ccc" autocomplete="on">
		  <div class="container">
			<h1>Registro</h1>
			<p>Llena los siguientes campos.</p>
			<hr>
            <label for="nombre"><b>Nombre</b></label>
			<input type="text" placeholder="Nombre" name="nombre" required>
			
			<label for="apellidos"><b>Apellidos</b></label>
			<input type="text" placeholder="Apellidos" name="apellidos" required>
			
			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Email" name="email" required>

			<label for="psw"><b>Contraseña</b></label>
			<input type="password" placeholder="Contraseña" name="psw" required>

			<label for="psw-repeat"><b>Repite tu contraseña</b></label>
			<input type="password" placeholder="Contraseña" name="psw-repeat" required>
			
			
			<label for="tarjeta"><b>Tarjeta de credito </b></label>
			<input type="text" placeholder="16 digitos (opcional)" name="tarjeta" >
			
			<label for="nombret"><b>Nombre del Titular</b></label>
			<input type="text" placeholder="Nombre del titular (opcional)" name="nombret">
			
			<label for="codigo"><b>Codigo de seguridad</b></label>
			<input type="text" placeholder="CVC (opcional)" name="codigo">
			
			
			<!-- <input type="text" placeholder="Nombre" name="fechaEx" required> -->
			<div class="w3-row-padding">
			    
				 <div class="w3-third">
				    <label for = "mes"><b>Fecha de expiración</b>
					<select class = "w3-input w3-border" name = "mes">
					 <option value = "1">01</option>
					 <option value = "2">02</option> 
					 <option value = "3">03</option> 
					 <option value = "4">04</option> 	
					 <option value = "5">05</option> 
					 <option value = "6">06</option>
					 <option value = "7">07</option>
					 <option value = "8">08</option> 
					 <option value = "9">09</option> 
					 <option value = "10">10</option> 	
					 <option value = "11">11</option> 
					 <option value = "12">12</option> 	
					</select> 
				</div>
				<br>
				<div class="w3-third">
					<select class = "w3-input w3-border" name = "anio">
					 <option value = "2018">2018</option>
					 <option value = "2019">2019</option>
					 <option value = "2020">2020</option>
					 <option value = "2021">2021</option> 
					 <option value = "2022">2022</option>
					 <option value = "2023">2023</option>  	
					</select> 
				</div>
				
			</div>
			<br>
			<label>
			  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Recordar usuario
			</label>
			<div class="clearfix">
			  <button type="submit" class="registerbtn">Registrarse</button>
			  
			</div>
		  </div>
      </form>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-plane w3-padding-64 w3-text-red"></i>
	  
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1>Acerca de nosotros</h1>
      <h5 class="w3-padding-32"> SISREV es un sistema que plantea la idea de hacer posible la consulta de varios vuelos brindados por las aerolíneas comerciales hacia el público general y no únicamente al alcance de agencias de viajes, todo lo anterior con el fin de agilizar y mejorar la planeación de viajes considerando distintas aerolíneas.</h5>
	  <h1>Objetivos</h1> 	
      <p class="w3-text-grey">Permitir  al cliente realizar consultas, reservaciones de vuelos, además de comprar de forma remota sin tener que recurrir a un agente de viajes.
		El cliente tendrá la facilidad de administrar las diferentes aerolíneas con las que trabajará, además de poder agregar nuevos destinos para sus vuelos.
       </p>
    </div>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Analisis y diseño orientado a objetos</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>

</footer>

<script>

function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>