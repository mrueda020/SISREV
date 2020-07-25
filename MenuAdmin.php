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

input[type=text], input[type=date],select,input[type=time] {
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
	
	.form {
		border: 3px solid #f1f1f1; 
	    justify-content:center;
		text-align: center;
		left:30%;
	}
	
    header img[src^="imagenes/logo"] {
      height:328px; 
    }
    header  img:first-child {
      width:214.3px;
      float:left;			 
    }
    header img:nth-child(2) {
      width:350px;
      float:right;
    }
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		
    }
	.menu li button {
		display: block;
		color: white;
		padding: 8px 16px;
		text-decoration: none;
		margin-bottom: 7px;
		box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
		background-color: #A9162D;
		text-align:center;
		transition: all 0.5s;
		cursor: pointer;
   }

  .menu li button.active {
		background-color: #4CAF50;
		color: white;
		text-align:center;
   }

   .menu li button:hover:not(.active) {
		background-color: #092067;;
		color: white	
  }
	
	
	@media only screen and (min-width: 600px) {
    /* For tablets: */
    .col-s-1 {width: 8.33%;}
    .col-s-2 {width: 16.66%;}
    .col-s-3 {width: 25%;}
    .col-s-4 {width: 33.33%;}
    .col-s-5 {width: 41.66%;}
    .col-s-6 {width: 50%;}
    .col-s-7 {width: 58.33%;}
    .col-s-8 {width: 66.66%;}
    .col-s-9 {width: 75%;}
    .col-s-10 {width: 83.33%;}
    .col-s-11 {width: 91.66%;}
    .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}		
}

    table {
		 margin: auto; 
		 border-collapse:collapse; 
		 width: auto;  
	   }

	   th, td {
		  text-align:center;
		  padding: 8px;
		  border-spacing:0px;
		  font-size:17px;
	   }

	   tr:nth-child(even){
		   color:white;
		   background-color:#000000;
		}
		
	   tbody tr:nth-child(odd){
		   background-color: #F0AE00;
		}
		
		thead {
		   background-color:   #C8032B;	
		}

		th:first-child{
			border-top-left-radius: 15px;
			
		}
		
		th:last-child{
			border-top-right-radius: 15px;
			
		}
		
		tr:last-child td:first-child{
		   border-bottom-left-radius: 15px;
		}
		
		tr:last-child td:last-child{
		   border-bottom-right-radius: 15px;
		}
		
		
		
		caption{
		  border-top-right-radius: 10px;
		  border-top-left-radius: 10px;
		  background-color:#A5ACAF;
		  margin:auto;
		  width:208px;
		  border: 4px;
		  color:white;
		  font-size:20px;
		}
	
	
	
	input[type=text], input[type=password] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  display: inline-block;
	  border: none;
	  background: #f1f1f1;
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
		margin : auto;
		color:green;
	}
	
	
	.button {
      background-color: #A5ACAF;
      color: white;
      padding: 14px 50px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width:auto;
	 
   
   }
	</style>
	<script>
	function agregarVuelos(){ 
		var xhttp;   
		var datos  = document.getElementById("info");
		datos.innerHTML = 
		'<br>'+
		'<h1 class="green"> Agregar nuevos vuelos</h1>'+
		'<form class ="form" action="Agregar.php" method = "post" style="border:1px solid #ccc" autocomplete="on">'+	
		'<div class="container">'+
		'<label><b>Aerolinea </b></label>'+
		'<input type="text" placeholder="Nombre" name="aerolinea" required >'+
		'<label><b>Destino</b></label>'+
		'<input type="text" placeholder="Destino" name="destino" required>'+
		'<label><b>Pais</b></label>'+
		'<input type="text" placeholder="Pais" name="pais" required>'+
		'<label><b>Precio</b></label>'+
		'<input type="text" placeholder="Precio" name="precio" required>'+			
	    '<label><b>Fecha de salida</b></label>'+
		'<input type="date" placeholder="Salida" name ="fecha" required>'+
		'<label><b>Hora de salida</b></label>'+
		'<input type="time" placeholder="Hora" name = "hora" required>'+
		'<div class="clearfix">'+
		'<button type="submit" class="registerbtn">Agregar vuelo</button>'+
		'</div>'+	
		'</div>'+
		'</form>';
	}
	
	
	function modificarVuelos(){ 
		//document.getElementById("fa").innerHTML = '<i aria-hidden="true" class="fa fa-credit-card-alt  w3-text-red w3-right"></i> ';
		var xhttp;   
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  document.getElementById("info").innerHTML = this.responseText;
			}
		  };
		  xhttp.open("GET", "Modificar.php", true);
		  xhttp.send();
		  
	}
	

	function cerrarSesion(){
		alert('Se ha cerrado la sesión');
		window.location='Login.php';
   }
	
	
	
	</script>







<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a class="w3-bar-item w3-button w3-padding-large w3-hover-white " onclick="modificarVuelos()"  >Modificar Vuelos</a>
	<a  class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="agregarVuelos()">Agregar Vuelos</a>
	<a href="SISREV.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="javascript:void(0);" onclick="cerrarSesion()">Salir</a>
  </div>
  
   <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
     <a href="Cuenta1.php" class="w3-bar-item w3-button w3-padding-large w3-white" onclick = "modificarVuelos()">Modificar Vuelos</a>
	  <a href="Cuenta1.php" class="w3-bar-item w3-button w3-padding-large w3-white" onclick="agregarVuelos()">>Agregar Vuelos</a>
	 <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-white" onclick="cerrarSesion()">Salir</a>
  </div>
  
</div>
  
  
  


<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">SISREV</h1>
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
		
		
			
	  ?>	 
    </div>
	<div  id = "info"  >
		<h3 class="w3-margin ">En esta sección  podras modificar los vuelos , agregar vuelos </h1>
        <i class="fa fa-plane w3-right w3-text-red"></i>
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