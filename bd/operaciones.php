<?php 
	
	require_once("bd.php");

	$con = Creardb();

	//boton crear libro al hacer click
	if(isset($_POST['crear'])){
		crearDatos();
		//echo "click en el boton crear";
	}

	//boton editar datos
	if (isset($_POST['editar'])) {
		actualizarDatos();
	}
	


	//funcion de creacion de libros en la base de datos
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

	function actualizarDatos(){
		$libroid = inputValue("Id_libro");
		$libronombre = inputValue("nombre_libro");
		$editorial = inputValue("editorial_libro");
		$precio = inputValue("precio_libro");

		if ($libronombre && $editorial && $precio) {
			$sql = "UPDATE libros set nombre_libro = '$libronombre', editorial = '$editorial', precio ='$precio' where id = '$libroid' ";

			if (mysqli_query($GLOBALS['con'], $sql)) {
				mensajes("success", "Datos Actualizado con exito en la base de datos");
			} else {
				mensajes("error", mysqli_error($GLOBALS['con']));
			}
			
		}else{
			mensajes("error", "Selecioines un dato usando el icono de editar en el listado de la tabla");
		}
		
	}

	//borrar datos
	function borrarDatos(){
		
	}

?>