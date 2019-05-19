<?php 
	function Creardb(){
		$servidor = "localhost";
		$nombreusuario = "root";
		$puerto = "3307";
		$clave = "";
		$nombredb = "libreria";

		//creando la conexion a la base de datos
		$con = mysqli_connect($servidor.":".$puerto, $nombreusuario, $clave);

		//verificando la conexion
		if(!$con){
			die("conexion ha fallado : " . mysqli_connect_error());
		}
		
		//creando la base de datos
		$sql =" create database if not exists $nombredb";

		if (mysqli_query($con, $sql)) {
			$con = mysqli_connect($servidor.":".$puerto, $nombreusuario, $clave, $nombredb);
			$sql=" 
				create table if not exists libros(
					id int not null auto_increment primary key,
					nombre_libro varchar(25) not null,
					editorial varchar(20),
					precio float
				);
			";
			if (mysqli_query($con, $sql)) {
				//echo "Tablas creadas con Exito";
			} else {
				echo "Error al Crear tablas en la base de datos ".mysqli_error($con);
			}
			
		} else {
			echo "Error mientras se creaba la base de datos".mysqli_error($con);
		}

}
	

 ?>