<?php 
	function inputElementos($icono, $placeholder, $name, $value){
		$elementos = "<div class=\"input-group mb-2\">
							<div class=\"input-group-prepend\">
								<div class=\"input-group-text bg-warning\">$icono</div>
							</div>
							<input type=\"text\" autocomplete=\"off\" class=\"form-control\" name='$name' id=\"idnombre\" placeholder='$placeholder' value='$value'>
						</div>";
						echo $elementos;
	}

	function buttonElementos($idBoton, $estiloBoton, $texto, $name, $atributos){
		$botones = "
			<button name='$name' '$atributos' class='$estiloBoton' id='$idBoton'>$texto</button>
		";
		echo $botones;
	}

?>