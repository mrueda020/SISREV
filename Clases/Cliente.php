<?php
include_once 'Usuario.php';


Class Cliente extends Usuario{
	private $nombre;
	private $apellidoPaterno;
	private $apellidoMaterno;
	private $noTarjeta;
	
	
	function __construct($cuenta,$password,$tipo,$nombre,$apellidoPaterno,$apellidoMaterno,$noTarjeta){
		$this->nombre=$nombre;
		$this->apellidoPaterno=$apellidoPaterno;
		$this->apellidoMaterno=$apellidoMaterno;
		$this->email=$email;
		$this->noTarjeta=$noTarjeta;
		parent::__construct($cuenta,$password,$tipo);	
	}
	
	function setTarjeta($noTarjeta){
		$this->noTarjeta=$noTarjeta;
	}
	
	function getNombre(){
		return $this->nombre;
		
	}
	
	function mostrarHistorial(){
		
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "SELECT * from usuario where correo =". "'".$_SESSION["correo"]."'"."and password = "."'".$_SESSION["psw"]."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION["idUsuario"]=$row["idUsuario"];
			}
		} 
		else {
			// echo "0 results";
		}

		$sql = "select  * from usuario u, ticket t ,vuelo v , aerolinea a, destino d, ciudad c, pais p  where u.idUsuario = t.idUsuario and t.idvuelo = v.idvuelo and v.idAerolinea = a.idAerolinea and v.idDestino = d.idDestino and d.idCiudad = c.idCiudad and c.idPais=p.idPais and u.correo ="."'".$_SESSION['correo']."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			
			echo '<table ><caption>Vuelos Adquiridos</caption><thead><th>Aerolinea</th><th>Pais</th><th>Ciudad</th><th>Fecha de salida</th><th>Hora de salida</th><th>Precio</th><th>Estatus</th></thead>';
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["nombreAerolinea"]."</td><td>".$row["nombre"]."</td><td>".$row["nombreCiudad"]."</td><td>".$row["fecha"]."</td><td>".$row["salida"]."</td><td>".$row["precio"]."</td><td>".$row["estatus"].  "</td></tr>";
			}
			echo '</table>';
			
		} 
		else {
			echo "<h2> No has reservado ningun vuelo</h2>";
		}
	}
	
	function mostrarVuelosPendientes(){
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "SELECT * from usuario where correo =". "'".$_SESSION["correo"]."'"."and password = "."'".$_SESSION["contraseĂ±a"]."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION["idUsuario"]=$row["idUsuario"];
			}
		} 
		else {
			// echo "0 results";
		}

		$sql = "select  * from usuario u, ticket t ,vuelo v , aerolinea a, destino d, ciudad c, pais p  where u.idUsuario = t.idUsuario and t.idvuelo = v.idvuelo and v.idAerolinea = a.idAerolinea and v.idDestino = d.idDestino and d.idCiudad = c.idCiudad and c.idPais=p.idPais and u.correo ="."'".$_SESSION['correo']."'"."and t.estatus='pendiente'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<form method = post action = ".'"CancelarVuelo.php"'.">";
			echo '<table ><caption>Vuelos pendientes</caption><thead><th>Aerolinea</th><th>Pais</th><th>Ciudad</th><th>Fecha de salida</th><th>Hora de salida</th><th>Precio</th><th></th></thead>';
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["nombreAerolinea"]."</td><td>".$row["nombre"]."</td><td>".$row["nombreCiudad"]."</td><td>".$row["fecha"]."</td><td>".$row["salida"]."</td><td>".$row["precio"]."</td><td><button type =".'"submit"'." value =".'"'.$row["idvuelo"].'"'."name = ".'"vuelo"'." class =".'"button"'." >Cancelar</button>    </tr>";
			}
			echo '</table>';
			echo"</form>";
		} 
		else {
			echo "<h2> No has reservado ningun vuelo</h2>";
		}	
	}
	function comprarVuelo(){
	    $con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();

		$sql = "select idUsuario from usuario  where correo  = "."'".$_SESSION["correo"]."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			
			$_SESSION["idUsuario"] = $row["idUsuario"];
			
		}


		$sql = "select * from tarjeta where idTarjeta = "."'".$_SESSION["idUsuario"]."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$tarjeta = $row["noTarjeta"];
			
		}

		if ($tarjeta!=""){
			echo $_SESSION["idUsuario"];
			$sql = "select * from ticket where idvuelo = "."'".$_SESSION["idVuelo"]."'"."and idUsuario = "."'".$_SESSION["idUsuario"]."'"."and estatus ='pendiente'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo"<script>"; 
				echo "alert('Ya has comprado este vuelo');";
				echo	"window.location='Menu.php';";
				echo "</script>";
				echo "Ya has comprado este vuelo";
			}
			else{
				$sql = "insert into ticket (idUsuario,idvuelo,estatus) values ("."'".$_SESSION["idUsuario"]."'".","."'".$_SESSION["idVuelo"]."'".","."'"."pendiente"."'".")";
				$result = $conn->query($sql);
				
				echo"<script>"; 
				echo "alert('Compra Exitosa');";
				echo "window.location='Cuenta.php';";
				echo "</script>";
			}
		}
		else{
			echo"<script>"; 
			echo "alert('Debe registrar una tarjeta de credito');";
			echo	"window.location='Menu.php';";
			echo "</script>";
			echo "Debe registrar una tarjeta de credito";
		}		 
	}
	
	function actualizarInformacion(){
			$con = new Conexion("localhost","root","","sisrev");
		    $conn = $con -> crearConexion();
			if($_SESSION["mail"]!=""){
			$sql = "SELECT correo from usuario where correo =". "'".$_SESSION["mail"]."'";
			$result = $conn->query($sql);
			if ($result->num_rows == 1) {
				 // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
				 // echo '<h3 class ='.'"'.'error'.'"'.'>Este correo ya fue registrado anteriormente por favor intente con otro </h3>';
				 // echo '</div>'; 
				 echo"<script>"; 
				 echo   "alert('Este correo ya fue registrado anteriormente por favor intente con otro ');";
				 echo	"window.location='Cuenta.php';";
				 echo "</script>";
					
			}
				
			else if (!filter_var($_SESSION["mail"], FILTER_VALIDATE_EMAIL)) {
			  // echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
			  // echo '<h3 class ='.'"'.'error'.'"'.'>Este correo no es valido por favor intente otro </h3>';
			  // echo '</div>'; 
			     echo"<script>"; 
				 echo   "alert('Este correo no es valido por favor intente otro');";
				 echo	"window.location='Cuenta.php';";
				 echo "</script>";
			}
			else{
				$sql = "update usuario set correo ="."'".$_SESSION["mail"]."'"." where correo = "."'".$_SESSION['correo']."'";
				if ($conn->query($sql) === TRUE) {
					   echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					   echo '<h3 class ='.'"'.'green'.'"'.'>Su correo fue actualizado </h3>';
					   echo '</div>'; 
					   $_SESSION['correo']=	$_SESSION["mail"];
						echo"<script>";
						echo    "alert('Su correo fue actualizado  ');";	
						echo	"window.location='Cuenta.php';";
						echo "</script>";	
				} 
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			
			}
			
		 }
		 
		if($_SESSION["pswm"] !=""){
			 if(strlen($_SESSION["pswm"])<8){
				// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:108px 16px'.'"'.' >';
				// echo '<h3 class ='.'"'.'error'.'"'.'>La contraseña tiene que ser minimo de 8 caracteres  </h3>';
				// echo '</div>';
				 echo"<script>"; 
				 echo   "alert('La contraseña tiene que ser minimo de 8 caracteres');";
				 echo	"window.location='Cuenta.php';";
				 echo "</script>";	
			}
			else{
				$sql = "update usuario set password ="."'".$_SESSION["pswm"]."'"." where correo = "."'".$_SESSION['correo']."'";
				$conn->query($sql);
				echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				echo '<h3 class ='.'"'.'green'.'"'.'>Su contraseña fue actualizada </h3>';
				echo '</div>'; 
				echo"<script>"; 
				echo    "alert('Su contraseña fue actualizada ');";
				echo	"window.location='Cuenta.php';";
				echo "</script>";
			}	
		}
		
		$nombretValido = false;
		$tarjetaValida=false;
		$codigoValido=true;
		
		// $nombreTarjeta = $_POST["nombret"];
		// $tarjeta = $_POST["tarjeta"];
		// $codigo = $_POST["codigo"];
		if($_SESSION["tarjeta"]!=""){
			if(strlen($_SESSION["tarjeta"])!= 16){
				// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				// echo '<h3 class ='.'"'.'error'.'"'.'>Incluye datos de la tarjeta validos o hazlo despues </h3>';
				// echo '</div>';
				echo"<script>"; 
				 echo   "alert('Incluye datos de la tarjeta validos ');";
				 echo	"window.location='Cuenta.php';";
				 echo "</script>";
				$tarjetaValida=false;
			}
			else{
				for($i=0;$i<16;$i++){
					if(($_SESSION["tarjeta"][$i]=="1")||($_SESSION["tarjeta"][$i]=="2")||($_SESSION["tarjeta"][$i]=="3")||($_SESSION["tarjeta"][$i]=="4")||($_SESSION["tarjeta"][$i]=="5")||($_SESSION["tarjeta"][$i]=="6")||($_SESSION["tarjeta"][$i]=="7")||($_SESSION["tarjeta"][$i]=="8")||($_SESSION["tarjeta"][$i]=="9")||($_SESSION["tarjeta"][$i]=="0")){
						
						$tarjetaValida=true;
		
					}
					else{
						
						// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
						// echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa 16 digitos de la tarjeta </h3>';
						// echo '</div>';
						echo"<script>"; 
						echo   "alert('Ingresa 16 digitos de la tarjeta ');";
						echo	"window.location='Cuenta.php';";
						echo "</script>";
						$tarjetaValida=false;
						break;
						
					}	
				}	
			}		
		}
		
		if ($_SESSION["nombret"] !=""){
			if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["nombret"])) {
				// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				// echo '<h3 class ='.'"'.'error'.'"'.'>Incluye un nombre valido para la tarjeta </h3>';
				// echo '</div>';
				echo"<script>"; 
				echo   "alert('Incluye un nombre valido para la tarjeta');";
				echo	"window.location='Cuenta.php';";
				echo "</script>";
				$nombretValido = false;
			}
			else {
				if(($_SESSION["tarjeta"]=="")||(strlen($_SESSION["tarjeta"])!=16)){
					// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
					// echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa 16 digitos de la tarjeta </h3>';
					// echo '</div>';
			    echo"<script>"; 
				echo   "alert('Ingresa 16 digitos de la tarjeta');";
				echo	"window.location='Cuenta.php';";
				echo "</script>";
					$nombretValido = false;
				}
				else{
					$nombretValido = true;
				}
				
			}	
		}
		
		if($_SESSION["codigo"]!=""){
			if(strlen($_SESSION["codigo"])!= 3){
				// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
				// echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa el codigo de seguridad correcto </h3>';
				// echo '</div>';
				echo"<script>"; 
				echo   "alert('Ingresa el codigo de seguridad correcto');";
				echo	"window.location='Cuenta.php';";
				echo "</script>";
				$codigoValido=false;
			}
			else{
				for($i=0;$i<3;$i++){
					if(($_SESSION["codigo"][$i]=="1")||($_SESSION["codigo"][$i]=="2")||($_SESSION["codigo"][$i]=="3")||($_SESSION["codigo"][$i]=="4")||($_SESSION["codigo"][$i]=="5")||($_SESSION["codigo"][$i]=="6")||($_SESSION["codigo"][$i]=="7")||($_SESSION["codigo"][$i]=="8")||($_SESSION["codigo"][$i]=="9")||($_SESSION["codigo"][$i]=="0")){
						
						$codigoValido=true;
		
					}
					else{
						
						// echo  '<div class='.'"'.'w3-container'.' '.'w3-padding-64'.' ' .'w3-center'.'"'.'style ='.'"'.'padding:128px 16px'.'"'.' >';
						// echo '<h3 class ='.'"'.'error'.'"'.'>Ingresa el codigo de seguridad correcto </h3>';
						// echo '</div>';
						echo"<script>"; 
						echo   "alert('Ingresa el codigo de seguridad correcto');";
						echo	"window.location='Cuenta.php';";
						echo "</script>";
						$codigoValido=false;
						break;
						
					}	
				}	
			}		
		}
		if($nombretValido==true&&$tarjetaValida==true&&$codigoValido==true){
			$sql = "select idTarjeta from usuario where correo = "."'".$_SESSION['correo']."'";
			$result=$conn->query($sql);
			$id;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$id= $row["idTarjeta"];
					
				}
			} 
			$sql = $sql = "update tarjeta set noTarjeta ="."'".$_SESSION["tarjeta"]."'"." ,cseguridad="."'".$_SESSION["codigo"]."'".",saldo = 10000, vencimiento ="."'".$_SESSION["fecha"]."'" ."  WHERE idTarjeta = "."'". $id."';";
			$conn->query($sql);
			echo"<script>"; 
			echo    "alert('Su tarjeta fua actualizada ');";
			echo	"window.location='Cuenta.php';";
			echo "</script>";
		}
		else{
			echo"<script>"; 
			echo    "alert('No deje los campo vacios de su tarjeta vacios');";
			echo	"window.location='Cuenta.php';";
			echo "</script>";	
		}
	}

	function cancelarVuelo(){
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "select idUsuario from usuario  where correo  = "."'".$_SESSION["correo"]."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$_SESSION["idUsuario"] = $row["idUsuario"];
			
		}
		 echo $sql = "update ticket set estatus = 'cancelado' where idUsuario = "."'".$_SESSION["idUsuario"]."'"." and idvuelo = "."'".$_POST["vuelo"]."'";
		 $result = $conn->query($sql);
		 echo"<script>"; 
		 echo "alert('Vuelo cancelado');";
		 echo	"window.location='Cuenta.php';";
		 echo "</script>";
		
		
	}
	
}
?>