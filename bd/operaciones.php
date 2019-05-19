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
		$libronombre = inputValue("nombre_libro");
		$editorial = inputValue("editorial_libro");
		$precio = inputValue("precio_libro");

		if ($libronombre && $editorial && $precio) {
			$sql = "INSERT INTO libros(nombre_libro, editorial, precio)VALUES('$libronombre','$editorial','$precio')";
			if (mysqli_query($GLOBALS['con'], $sql)) {
				mensajes("success", "guardado con exito en la base de datos");
			} else {
				mensajes("error", mysqli_error($GLOBALS['con']));
			}
			
		} else {
			mensajes("error","error en los input o estan vacios");
		}
		
	}

	//funcion para validar los inputs
	function inputValue($value){
		$inputs = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
		if (empty($inputs)) {
			return false;
		} else {
			return $inputs;
		}
	}

	//funcion para mensajes
	function mensajes($clase, $mensaje){
		$mensajes = "<div class='alert $clase'><strong></strong>$mensaje</div>";
		echo $mensajes;
	}

	//funcion para obtener datod de la base de datos
	function getDatos(){
		$sql = "SELECT * FROM libros";

		$resultado = mysqli_query($GLOBALS['con'], $sql);

		if (mysqli_num_rows($resultado)>0) {
			return $resultado;
			/*while ($row = mysqli_fetch_assoc($resultado)) {
				echo "id: ".$row['id']."Nombre Libro: ".$row['nombre_libro'];
			}*/
		}else{
			return "La base de datos esta vacia";
		}
		
	}

?>