<?php
	include 'Clases/Conexion.php';
    session_start();
	session_unset();
	session_destroy();


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
	
	
	 table {
		 margin: auto; 
		 border-collapse:collapse; 
		 width: auto;  
	   }

	   th, td {
		  font-size:20px; 
		  text-align:center;
		  padding: 8px;
		  border-spacing:0px;
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
		}	 
	
		
		.green {
			color:green;
		}
		
		.error {
			font-size:20px; 
			color: #FF0000;
		}

</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-white">Buscar</a>
    <a href="Login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Entra</a>
    <a href="Registro.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Registrate</a>
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
  <!-- // <img class = "w3-opacity" src="imagenes/logoipn.png "> -->
	<!-- // <img class= "w3-opacity"src="imagenes/logoescom.png "> -->
   <h1 class="w3-margin w3-jumbo">Bienvenido a SISREV</h1>
  
  <!-- <a href="docs/proyectov1.02.pdf" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Descarga aqui la documentación completa</a> -->
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
	  <p class="error">Debes iniciar sesión para poder reservar algun vuelo </p>
	  <a href="Registro.php" style = "font-size:20px" class ="green"><p>No tienes cuenta con nostros crea una <p></a>
	   <h1 class="w3-margin ">Vuelos encontrados</h1>
		<?php
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$destino = $_POST["destino"];
		$sql= "select * from vuelo v, ciudad c,pais p ,destino d ,aerolinea a where v.idAerolinea = a.idAerolinea and v.idDestino = d.idDestino and d.idCiudad = c.idCiudad and c.idPais=p.idPais and v.disponibilidad= '1' and c.nombreCiudad ="."'".$destino."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			
			echo '<table ><thead><th>Aerolinea</th><th>Pais</th><th>Ciudad</th><th>Fecha de salida</th><th>Hora de salida</th><th>Precio</th></thead>';
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["nombreAerolinea"]."</td><td>".$row["nombre"]."</td><td>".$row["nombreCiudad"]."</td><td>".$row["fecha"]."</td><td>".$row["salida"]."</td><td>$".$row["precio"]."</td></tr>";
			}
			echo '</table>';
			
		} 
		else {
			echo "<h2>Lo sentimos no hay vuelos disponibles</h2>";
		}
		
		?>	
    </div>
	<br>

    <div class="w3-right">
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
    <a href="https://www.facebook.com/"> <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
<!-- // <img class = "w3-opacity" src="imagenes/logoipn.png "> -->
	<!-- // <img class= "w3-opacity"src="imagenes/logoescom.png "> -->
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
