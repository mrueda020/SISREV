<?php
	//!isset($_SESSION['started'])
    include 'Clases/Conexion.php';
	include 'Clases/Cliente.php';
    session_start();
	
?>
<!DOCTYPE html>
<html>
<title>SISREV</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Estilos/CSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee ,.fa-plane{font-size:200px}

input[type=text], input[type=date],select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
	
	button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 50%;
	 
   }
	
	form {
		border: 3px solid #f1f1f1; 
	    justify-content:center;
		text-align: center;
		left:30%;
	}
	
	.error {
	  color: #FF0000;
	}
	
	<script>
		
	</script>


</style>




<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="Menu.php" class="w3-bar-item w3-button w3-padding-large w3-white">Buscar Vuelos</a>
	<a href="Cuenta.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Cuenta</a>
	<a href="SISREV.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="javascript:void(0);" onclick="cerrarSesion()">Salir</a>
  </div>
  
   <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
     <a href="Cuenta.php" class="w3-bar-item w3-button w3-padding-large w3-white">Cuenta</a>
	 <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-white" onclick="cerrarSesion()">Salir</a>
  </div>
  
</div>
  
  
  


<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Busca vuelos a los mejores precios</h1>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
	  <?php
		error_reporting(E_ALL ^ E_NOTICE);
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "SELECT * from usuario where correo =". "'".$_SESSION["correo"]."'"."and password = "."'".$_SESSION["psw"]."'";
		$result = $conn->query($sql);
		if ($result->num_rows >0){
			 
			 while($row = $result->fetch_assoc()) {
				  $_SESSION["nombre"] = $row["nombre"];
				  $_SESSION["apellidos"] = $row["paterno"];
				  $_SESSION["apellidos"] .= " ";
				  $_SESSION["apellidos"] .= $row["materno"];
				  $_SESSION['iniciada']= true;
			 }	 
		}
		else if(($_SESSION['iniciada']==false) &&($result->num_rows ==0)){
			echo '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
			echo '<h3 class ='.'"'.'error'.'"'.'>No existe la cuenta  </h3>';
			echo '</div>';
			echo"<script>"; 
			echo    "alert('No exite la cuenta vuelve a intenarlo');";
			echo	"window.location='Login.php';";
			echo "</script>";
			
		}		
		if ( $_SESSION["nombre"]==""){
			echo '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
			echo '<h3 class ='.'"'.'error'.'"'.'>No existe la cuenta  </h3>';
			echo '</div>';	
		}
		
		else {
			echo'<h5 class="w3-margin w3-jumbo">Bienvenido '.$_SESSION["nombre"].'</h5>';
				echo '<form action="VuelosR.php" method = "post">
					   <div class="w3-row-padding">
						   <div class="w3-third">
								<label for = "origen"><h3>Origen</h3></label>
								<input class="w3-input w3-border" type="text" name="origen" placeholder="Ciudad o Aeropuerto" required>
						   </div>
						   <div class="w3-third">
								<h3>Destino</h3>
								<input class="w3-input w3-border" name ="destino" type="text" placeholder="Ciudad o Aeropuerto" required>
						   </div>
					   </div>
					   <br>
					   <div class="w3-row-padding">
						   <div class="w3-third">
								<h3>Fecha salida</h3>
								<input class="w3-input w3-border" type="date" placeholder="Salida" required>
						   </div>
						   <div class="w3-third">
								<h3>Fecha regreso</h3>
								<input class="w3-input w3-border" type="date" placeholder="Regreso" required>
						   </div>  
					   </div>
					   <br>
					   
					   <div class="w3-row-padding">
						   <div class="w3-third">
							 <h3>Clase</h3>
							 <select class = "w3-input w3-border" name = "clase">
								 <option value = "turista">Turista</option>
								 <option value = "primeraClase">Primera Clase</option>
							  </select>
							</div>
							<div class="w3-third">
							   <h3>Pasajeros</h3>	
							  <select class = "w3-input w3-border" name = "pasajeros">
								 <option value = "uno">1</option>
								 <option value = "dos">2</option>
							  </select> 
							</div>  
						</div> 
						   <br>
						   <br>
						   <div> 
							  <button type="submit" class="cancelbtn">Buscar vuelos</button>
						   </div>	
					   </div>
				   </form>';
		}	
	  ?>	 
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




<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-opacity">  
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
	alert(x.className.indexOf("w3-show"));
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function cerrarSesion(){
	alert('Se ha cerrado la sesión');
	window.location='Login.php';
}

</script>

</body>
</html>