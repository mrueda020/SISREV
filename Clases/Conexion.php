<?php
error_reporting(E_ALL ^ E_NOTICE);
class Conexion {
	
		private $servername;
		private $username;
		private $password;
		private $dbname;
		
		function __construct($servername,$username,$password,$dbname){
			$this->servername=$servername;
			$this->username=$username;
			$this->password=$password;
			$this->dbname=$dbname;
		
	    }
		
		function getDbname(){
			return $this->dbname;
		}
		
        function crearConexion(){	
			$conn = new mysqli($this->servername,$this->username,$this->password, $this->dbname);
			// Check connection
			if ($conn->connect_error) {
				return die("Connection failed: " . $conn->connect_error);
			}
			else{
				return $conn;
			}
			
		}
}
?>	