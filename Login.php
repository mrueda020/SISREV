<?php
session_start();
session_unset();
session_destroy();
echo $_SERVER['DOCUMENT_ROOT'];
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
.fa-anchor,.fa-coffee , .fa-plane {font-size:200px}

input[type=text], input[type=date],input[type=password],select {
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
	  float:left;
   }
   
	   
	.cancelbtn {
	  padding: 14px 20px;
	  background-color: #f44336;
	}

	
	.cancelbtn, .signupbtn {
	  
	  width: 50%;
	}

	.clearfix::after {
      content: "";
      clear: both;
      display: table;
	  
    }
	.container {
	  padding: 16px;
	} 
	
	form {
		border: 3px solid #f1f1f1; 
	    justify-content:center;
		text-align: center;
		left:30%;
	}
	
</style>
<body>
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Buscar</a>
    <a href="Login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Entra</a>
    <a href="Registro.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Registrate</a>
  </div>

 
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
	 <a href="Login.php" class="w3-bar-item w3-button w3-padding-large w3-white">Entra</a>
	 <a href="Registro.php" class="w3-bar-item w3-button w3-padding-large w3-white">Registrate</a>
	 <a href="SISREV.php" class="w3-bar-item w3-button w3-padding-large w3-white">Buscar</a>
  </div>
</div>


<header class="w3-container w3-red w3-center" style="padding:128px 16px">
   <h1 class="w3-margin w3-jumbo">Bienvenido a SISREV</h1>
  
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
	   <p class= "w3-margin w3-jumbo">Ingresa a tu cuenta </p>
      <form action="InicioSesion.php" method ="post">
		  <div class="imgcontainer">
			<img src="imagenes/login.png" width = 256 height = 256 alt="Avatar" class="avatar">
		  </div>

		  <div class="container">
			<label for="mailr"><b>Email</b></label>
			<input type="text" placeholder="Email" name="mailr" required>
			<label for="pswr"><b>Contraseña</b></label>
			<input type="password" placeholder="Contraseña" name="pswr" required>
			<button type="submit" align = left>Ingresar</button>
			<button type="button" class="cancelbtn">Cancelar</button>
			<br>
		   </div>
		  <div class="container">
			   <br>
			   <label>
				  <input type="checkbox" checked="checked" name="recordarU"> Recordar usuario
				</label>
				<br>
				<span class="psw">Olvidaste tu <a href="#">contraseña?</a></span>
				<br>	
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
<!--Solo sirve para hacerlo responsivo-->
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