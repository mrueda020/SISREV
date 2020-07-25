<?php
	include 'Clases/Conexion.php';
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
	
	
   .button {
      background-color: #A5ACAF;
      color: white;
      padding: 14px 50px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width:auto;
	 
   }
	
	/* form { */
		/* border: 3px solid #f1f1f1;  */
	    /* justify-content:center; */
		/* text-align: center; */
		/* left:30%; */
	/* } */
	
	
	
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
		  text-align:center;
		  padding: 8px;
		  border-spacing:0px;
		  font-size:18px; 
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
		  font-size:20px; 	
		  border-top-right-radius: 10px;
		  border-top-left-radius: 10px;
		  background-color:#A5ACAF;
		  margin:auto;
		  width:208px;
		  border: 4px;
		  color:white;
		}	 
	
	
	
	

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
  <!-- // <img class = "w3-opacity" src="imagenes/logoipn.png "> -->
  <!-- // <img class= "w3-opacity"src="imagenes/logoescom.png "> -->
  <?php
		echo '<h1 class="w3-margin w3-jumbo">Bienvenido '.$_SESSION['nombre']."</h1>";
    ?>
  <!-- <h1 class="w3-margin w3-jumbo">Vuelos encontrados</h1> -->
 
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
	  
	   
		<?php
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$destino = $_POST["destino"];
		$sql= "select * from vuelo v, ciudad c,pais p ,destino d ,aerolinea a where v.idAerolinea = a.idAerolinea and v.idDestino = d.idDestino and d.idCiudad = c.idCiudad and c.idPais=p.idPais and v.disponibilidad= '1' and c.nombreCiudad ="."'".$destino."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<form method = post action = ".'"Compra.php"'."  >";
			echo '<table><caption>Vuelos encontrados</caption><thead><th>Aerolinea</th><th>Pais</th><th>Ciudad</th><th>Fecha de salida</th><th>Hora de salida</th><th>Precio</th><th>Compra o reserva</th></thead>';
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["nombreAerolinea"]."</td><td>".$row["nombre"]."</td><td>".$row["nombreCiudad"]."</td><td>".$row["fecha"]."</td><td>".$row["salida"]."</td><td>$".$row["precio"]."</td><td><button type =".'"submit"'." value =".'"'.$row["idvuelo"].'"'."name = ".'"vuelo"'." class =".'"button"'." >Comprar</button></td></tr>";
			}
			echo '</table>';
			echo "</form>";
		} 
		else {
			echo "<h2>Lo sentimos no hay vuelos disponibles</h2>";
		}
		
		?>	
    </div>
    <div class=" w3-right">
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
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
