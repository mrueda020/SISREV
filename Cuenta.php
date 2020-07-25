<!-- ALTER TABLE usuario AUTO_INCREMENT=1 -->
<?php
    session_start();
	if ($_SESSION['correo']==""){
		echo"<script>"; 
		echo    "alert('No exite la cuenta vuelve a intenarlo');";
		echo	"window.location='Login.php';";
		echo "</script>";	
	}
?>
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
.fa-address-card-o,.fa-anchor,.fa-coffee ,.fa-plane,.fa-credit-card-alt {font-size:200px}

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
	function mostrarVuelos(){ 
		document.getElementById("fa").innerHTML = '<i class="fa fa-plane  w3-text-red w3-right"></i> ';
		var xhttp;   
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  document.getElementById("info").innerHTML = this.responseText;
			}
		  };
		  xhttp.open("GET", "VuelosPendientes.php", true);
		  xhttp.send();
		  
	}
	
	function mostrarHistorial(){ 
		document.getElementById("fa").innerHTML = '<i aria-hidden="true" class="fa fa-credit-card-alt  w3-text-red w3-right"></i> ';
		var xhttp;   
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  document.getElementById("info").innerHTML = this.responseText;
			}
		  };
		  xhttp.open("GET", "Historial.php", true);
		  xhttp.send();
		  
	}
	
	function modificarDatos(){ 
		var xhttp;   
		var datos  = document.getElementById("info");
		
		datos.innerHTML = '<h1 class="error">Modifica tu información</h1>'+'<h1 class="green"> Cambiar correo</h1>'+
		'<form class ="form" action="Actualizar.php" method = "post" style="border:1px solid #ccc margin:auto" autocomplete="on">'+
		'<div class="container">'+
	    '<label for="email"><b>Ingresa tu nuevo email </b></label>'+
		'<input type="text" placeholder="Email" name="email" required>'+
		'<div class="clearfix">'+
		'<button type="submit" class="registerbtn">Actualizar correo</button>'+
		'</div>'+
		'</div>'+
		'</form>'+
		'<br>'+
		'<h1 class="green"> Cambiar contraseña</h1>'+
		'<form class ="form" action="Actualizar.php" method = "post" style="border:1px solid #ccc" autocomplete="on">'+
		'<div class="container">'+
	    '<label for="email"><b>Ingresa tu nueva contraseña  </b></label>'+
		'<input type="password" placeholder="contraseña" name="psw" required>'+
		'<div class="clearfix">'+
		'<button type="submit" class="registerbtn">Actualizar contraseña</button>'+
		'</div>'+
		'</div>'+
		'</form>'+
		'<br>'+
		'<h1 class="green"> Cambiar /o agregar tarjeta de credito</h1>'+
		'<form class ="form" action="Actualizar.php" method = "post" style="border:1px solid #ccc" autocomplete="on">'+	
		'<div class="container">'+
		'<label for="tarjeta"><b>Tarjeta de credito </b></label>'+
		'<input type="text" placeholder="16 digitos" name="tarjeta" required >'+
		'<label for="nombret"><b>Nombre del Titular</b></label>'+
		'<input type="text" placeholder="Nombre del titular " name="nombret" required>'+
		'<label for="codigo"><b>Codigo de seguridad</b></label>'+
		'<input type="text" placeholder="CVC" name="codigo" required>'+			
	    '<div class="w3-row-padding">'+
		'<div class="w3-third">'+
        '<label for = "mes"><b>Fecha de expiración</b>'+
			'<select class = "w3-input w3-border" name = "mes">'+
			' <option value = "1">01</option>'+
			 '<option value = "2">02</option> '+
			' <option value = "3">03</option>'+ 
			 '<option value = "4">04</option> 	'+
			' <option value = "5">05</option> '+
			' <option value = "6">06</option>'+
			' <option value = "7">07</option>'+
			' <option value = "8">08</option> '+
			' <option value = "9">09</option> '+
			' <option value = "10">10</option> 	'+
			' <option value = "11">11</option> '+
			 '<option value = "12">12</option> 	'+
			'</select>'+ 
			'</div>'+
			'<br>'+
			'<div class="w3-third">'+
			'<select class = "w3-input w3-border" name = "anio">'+
			'<option value = "2018">2018</option>'+
			'<option value = "2019">2019</option>'+
			' <option value = "2020">2020</option>'+
			' <option value = "2021">2021</option>'+ 
			' <option value = "2022">2022</option>'+
			'<option value = "2023">2023</option> '+ 	
			'</select> '+
		    '</div>'+
			'<div class="clearfix">'+
			'<button type="submit" class="registerbtn">Actualizar tarjeta</button>'+
			'</div>'+	
			'</div>'+
			'</div>'+
			'</form>';	
			document.getElementById("fa").innerHTML = '<i class="fa fa-address-card-o  w3-text-red w3-right"></i> ';
	}
	
	
	function cerrarSesion(){
		alert('Se ha cerrado la sesión');
		window.location='Login.php';
   }
	
	
	</script>




<body>

<!-- Navbar -->
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="Menu.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Buscar Vuelos</a>
	<a href="Cuenta.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Cuenta</a>
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
  
  <!-- <a href="docs/proyectov1.02.pdf" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Descarga aqui la documentación completa</a> -->
</header>



<div class="w3-bar w3-black w3-card w3-left-align w3-large"> 	
	<a class="w3-bar-item w3-button w3-padding-large w3-hover-white"id="vuelos" onclick ="mostrarVuelos()">Vuelos por tomar</a>	
	<a class="w3-bar-item w3-button w3-padding-large w3-hover-white" id = "datos" onclick = "modificarDatos()">Modificar datos</a>
	<a class="w3-bar-item w3-button w3-padding-large w3-hover-white" onclick ="mostrarHistorial()">Historial de compra</a>
	<a class="w3-bar-item w3-button w3-padding-large w3-hover-white">Eliminar cuenta</a>
</div>
<br>
<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
	<?php
	 // include 'Clases/Conexion.php';
	 // $con = new Conexion("localhost","root","","sisrev");
	 // $conn = $con -> crearConexion();
	 
	// // if($_POST['email']!=""){
		// // $sql = "SELECT correo from usuario where correo =". "'".$_POST['email']."'";
		// // $result = $conn->query($sql);
		// // if ($result->num_rows == 1) {
			 // // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
			 // // echo '<h3 class ='.'"'.'error'.'"'.'>Este correo ya fue registrado anteriormente por favor intente con otro </h3>';
			 // // echo '</div>'; 
				
		// // }
			
		// // else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		  // // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
		  // // echo '<h3 class ='.'"'.'error'.'"'.'>Este correo no es valido por favor intente otro </h3>';
		  // // echo '</div>'; 
		  
		// // }
		// // else{
			// // $sql = "update usuario set correo ="."'".$_POST['email']."'"." where correo = "."'".$_SESSION['correo']."'";
			// // if ($conn->query($sql) === TRUE) {
				   // // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				   // // echo '<h3 class ='.'"'.'green'.'"'.'>Su correo fue actualizado </h3>';
				   // // echo '</div>'; 
					 // // // $correo = new Correo();
					 // // // $correo->enviarCorreo($_GET['email']);
					 // // // $_GET['email']="";	
					 // // $_SESSION['correo']=	$_POST['email'];
					// // echo"<script>";
					// // echo    "alert('Su correo fue actualizado  ');";	
					// // echo	"window.location='Cuenta.php';";
					// // echo "</script>";	
			// // } 
			// // else {
				// // echo "Error: " . $sql . "<br>" . $conn->error;
			// // }
		
		// // }
		
	 // // }
	 
	// // if($_POST['psw'] !=""){
		 // // if(strlen($_POST['psw'])<8){
			// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
			// // echo '<h3 class ='.'"'.'error'.'"'.'>La contraseña tiene que ser minimo de 8 caracteres  </h3>';
			// // echo '</div>'; 
		// // }
		// // else{
			// // $sql = "update usuario set password ="."'".$_POST['psw']."'"." where correo = "."'".$_SESSION['correo']."'";
			// // $conn->query($sql);
			// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			// // echo '<h3 class ='.'"'.'green'.'"'.'>Su contraseña fue actualizada </h3>';
		    // // echo '</div>'; 
			// // echo"<script>"; 
			// // echo    "alert('Su contraseña fue actualizada ');";
			// // echo	"window.location='Cuenta.php';";
			// // echo "</script>";
		// // }	
	// // }
	
	// // $nombretValido = false;
	// // $tarjetaValida=false;
	// // $codigoValido=true;
	
	// // $nombreTarjeta = $_POST["nombret"];
	// // $tarjeta = $_POST["tarjeta"];
	// // $codigo = $_POST["codigo"];
	// // if($tarjeta!=""){
		// // if(strlen($tarjeta)!= 16){
			// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			// // echo '<h3 class ='.'"'.'error'.'"'.'>Incluye datos de la tarjeta validos o hazlo despues </h3>';
			// // echo '</div>';
			// // $tarjetaValida=false;
		// // }
		// // else{
			// // for($i=0;$i<16;$i++){
				// // if(($tarjeta[$i]=="1")||($tarjeta[$i]=="2")||($tarjeta[$i]=="3")||($tarjeta[$i]=="4")||($tarjeta[$i]=="5")||($tarjeta[$i]=="6")||($tarjeta[$i]=="7")||($tarjeta[$i]=="8")||($tarjeta[$i]=="9")||($tarjeta[$i]=="0")){
					
					// // $tarjetaValida=true;
	
				// // }
				// // else{
					
					// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					// // echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa 16 digitos de la tarjeta </h3>';
					// // echo '</div>';
					// // $tarjetaValida=false;
					// // break;
					
				// // }	
			// // }	
		// // }		
	// // }
	
	// // if ($nombreTarjeta !=""){
		// // if (!preg_match("/^[a-zA-Z ]*$/",$nombreTarjeta)) {
			// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			// // echo '<h3 class ='.'"'.'error'.'"'.'>Incluye un nombre valido para la tarjeta </h3>';
			// // echo '</div>';
			// // $nombretValido = false;
		// // }
		// // else {
			// // if(($tarjeta=="")||(strlen($tarjeta)!=16)){
				// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				// // echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa 16 digitos de la tarjeta </h3>';
				// // echo '</div>';
				// // $nombretValido = false;
			// // }
			// // else{
				// // $nombretValido = true;
			// // }
			
		// // }	
	// // }
	
	// // if($codigo!=""){
		// // if(strlen($codigo)!= 3){
			// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			// // echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa el codigo de seguridad correcto </h3>';
			// // echo '</div>';
			// // $codigoValido=false;
		// // }
		// // else{
			// // for($i=0;$i<3;$i++){
				// // if(($codigo[$i]=="1")||($codigo[$i]=="2")||($codigo[$i]=="3")||($codigo[$i]=="4")||($codigo[$i]=="5")||($codigo[$i]=="6")||($codigo[$i]=="7")||($codigo[$i]=="8")||($codigo[$i]=="9")||($codigo[$i]=="0")){
					
					// // $codigoValido=true;
	
				// // }
				// // else{
					
					// // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					// // echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa el codigo de seguridad correcto </h3>';
					// // echo '</div>';
					// // $codigoValido=false;
					// // break;
					
				// // }	
			// // }	
		// // }		
	// // }
	// // if($nombretValido==true&&$tarjetaValida==true&&$codigoValido==true){
		// // $sql = "select idTarjeta from usuario where correo = "."'".$_SESSION['correo']."'";
		// // $result=$conn->query($sql);
		// // $id;
		// // if ($result->num_rows > 0) {
			// // // output data of each row
			// // while($row = $result->fetch_assoc()) {
				// // $id= $row["idTarjeta"];
				
			// // }
		// // } 
		// // $fecha = $_POST['mes'];
		// // $fecha.="/";
		// // $fecha.=$_POST['anio'];
		// // $sql = $sql = "update tarjeta set noTarjeta ="."'".$tarjeta."'"." ,cseguridad="."'".$codigo."'".",saldo = 10000, vencimiento ="."'".$fecha."'" ."  WHERE idTarjeta = "."'". $id."';";
		// // $conn->query($sql);
		// // echo"<script>"; 
		// // echo    "alert('Su tarjeta fua actualizada ');";
		// // echo	"window.location='Cuenta.php';";
		// // echo "</script>";
	
	// // }
	// 
	?>
	
	
	
		<div  id = "info"  >
		 <h3 class="w3-margin ">En esta sección  podras modificar tu informacion personal ya sea cambiar tu contraseña o tu e-mail asi tambien como actualizar tu tarjeta de credito, administar tus vuelos </h1>
		</div>
	</div>
	<div id= "fa" class="w3-third w3-center">
		 <i class="fa fa-address-card-o  w3-text-red w3-right"></i> 
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