<?php 
	
	require_once("bd.php");

	$con = Creardb();

	//boton crear libro al hacer click
	if(isset($_POST['crear'])){
		crearDatos();
		//echo "click en el boton crear";
	}


	//funcion de creacion de libreo en la base de datos
	function crearDatos(){
		$libronombre = $_POST['crear'];
		
	}

?>