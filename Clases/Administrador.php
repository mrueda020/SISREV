<?php
include_once 'Usuario.php';

Class Administrador extends Usuario{
	private $nombre;
	private $apellidoPaterno;
	private $apellidoMaterno;
	function __construct($cuenta,$password,$tipo,$nombre,$apellidoPaterno,$apellidoMaterno){
		$this->nombre=$nombre;
		$this->apellidoPaterno=$apellidoPaterno;
		$this->apellidoMaterno=$apellidoMaterno;
		$this->email=$email;
		parent::__construct($cuenta,$password,$tipo);	
	}
	
	function comprarVuelo($aerolinea,$destino,$pais,$precio,$fecha,$hora){
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "select * from pais where nombre = "."'".$pais."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $idPais = $row["idPais"];
			}
		}
		else{
			$sql = "insert into pais (nombre) values ("."'".$pais."'".")";
			$conn->query($sql);
			$sql = "select * from pais where nombre = "."'".$pais."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$idPais = $row["idPais"];
				}
			}
			
		}
		echo $idPais;
		$sql = "select * from ciudad where nombreCiudad = "."'".$destino."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $idCiudad = $row["idCiudad"];
				
			}
		}
		else{
			$sql = "select count(*) from ciudad";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$idCiudad= $row["count(*)"];
					$idCiudad++;
				}
			} 
		    $sql = "insert into ciudad (idCiudad,nombreCiudad,idPais) values ("."'".$idCiudad."'".","."'".$destino."'".","."'".$idPais."'".")";
			$result = $conn->query($sql);
		}
		
		$sql = "insert into destino (idCiudad) values ("."'".$idCiudad."'".")";
		$conn->query($sql);
		$sql = "select * from destino where idCiudad = "."'".$idCiudad."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $idDestino = $row["idDestino"];
			}
		}
		
		
		$sql = "select * from aerolinea where nombreAerolinea = "."'".$aerolinea."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $idAerolinea = $row["idAerolinea"];
			}
		}
		else{
			 
		    $sql = "insert into aerolinea (nombreAerolinea) values ("."'".$aerolinea."'".")";
			$conn->query($sql);
			
			$sql = "select * from aerolinea nombreAerolinea = "."'".$aerolinea."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$idAerolinea = $row["idAerolinea"];
				}
			}
			
		}
		
		$sql = "select count(*) from vuelo ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $idVuelo = $row["count(*)"];
				 $idVuelo++;
			}
		}
		else{
			$idVuelo = 1;
		}
		$sql = "insert into vuelo (idvuelo,precio,salida,fecha,idAerolinea,idDestino,disponibilidad) values ("."'".$idVuelo."'".","."'".$precio."'".","."'".$hora."'".","."'".$fecha."'".","."'".$idAerolinea."'".","."'".$idDestino."'".","."'1')";
		$result = $conn->query($sql);
		echo"<script>"; 
		echo    "alert('Vuelo agregado');";
		echo	"window.location='MenuAdmin.php';";
		echo "</script>";	
	}
	
	function modificarVuelos(){
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "select  * from vuelo v , aerolinea a, destino d, ciudad c, pais p  where   v.idAerolinea = a.idAerolinea and v.idDestino = d.idDestino and d.idCiudad = c.idCiudad and c.idPais=p.idPais and v.disponibilidad='1'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<form method = post action = ".'"Cancelacion.php"'.">";
			echo '<table ><caption>Vuelos </caption><thead><th>Aerolinea</th><th>Pais</th><th>Ciudad</th><th>Fecha de salida</th><th>Hora de salida</th><th>Precio</th><th></th></thead>';
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["nombreAerolinea"]."</td><td>".$row["nombre"]."</td><td>".$row["nombreCiudad"]."</td><td>".$row["fecha"]."</td><td>".$row["salida"]."</td><td>".$row["precio"]."</td><td><button type =".'"submit"'." value =".'"'.$row["idvuelo"].'"'."name = ".'"vuelo"'." class =".'"button"'." >Cancelar</button>    </tr>";
			}
			echo '</table>';
			echo"</form>";
		} 	
	}
	
	function cancelarVuelos($vuelo){
		$con = new Conexion("localhost","root","","sisrev");
		$conn = $con -> crearConexion();
		$sql = "update vuelo set disponibilidad = '0' where  idvuelo = "."'".$vuelo."'";
		$result = $conn->query($sql);
		echo"<script>"; 
		echo "alert('Vuelo cancelado');";
		echo	"window.location='MenuAdmin.php';";
		echo "</script>";
	}
	
}
?>