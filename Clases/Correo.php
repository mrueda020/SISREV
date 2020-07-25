<?php

error_reporting(E_ALL ^ E_NOTICE);
class Correo {
	private $texto;
	private $destinatario;
	private $asunto;
	private $headers;
	
	function __construct(){
		$this->$texto="Bienvenido a SISREV";
		$this->$texto.="Tu cuenta ha sido creada exitosamente";
		$this->$asunto="Confirmacion de cuenta SISREV";
		$this->$headers=array("Enviado por SISREV@mailto.com","Favor de no contestar");
		
	}
	
	function Correo1($texto,$destinatario,$asunto,$headers){
		$this->$texto = $texto;
		$this->$destinatario = $destinatario;
		$this->$asunto = $asunto;
		$this->$headers = $headers;
	}
	
	
	function enviarCorreo($destinatario){
		$this->$destinatario = $destinatario;
		echo $destinatario;
		echo $headers[0];
		mail($destinatario,$asunto,$tsexto,$headers);
		include 'Fallos/Formulario.php';
	}
	
	
}
?>
