<?php 
	require_once("componentes/componentes.php");
	require_once("bd/operaciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="content" >
	<title>Libreria Don-Luis</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- estilos -->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
	
	<main>
		<div class="container text-center">
			<h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-swatchbook"></i> Libreria</h1>
			<div class="d-flex justify-content-center">
				<form action="" method="post" accept-charset="utf-8" class="w-50">
					<div class="pt-2">
						<?php inputElementos("<i class='fa fa-id-badge'></i>", "ID","Id_libro", ""); ?>
					</div>
					<div class="pt-2">
						<?php inputElementos("<i class='fa fa-book'></i>", "Nombre del Libro","nombre_libro", ""); ?>
					</div>
					<div class="row pt-2">
						<div class="col">
							<?php inputElementos("<i class='fa fa-people-carry'></i>", "Editorial","editorial_libro", ""); ?>
						</div>
						<div class="col">
							<?php inputElementos("<i class='fa fa-dollar-sign'></i>", "Precio","precio_libro", ""); ?>
						</div>
					</div>
					<div class="d-flex justify-content-center">
						<?php buttonElementos("btn-create", "btn btn-success", "<i class='fa fa-plus'></i>", "crear", "data-toggle='tooltip' data-placement='bottom' title='Crear'"); ?>
						<?php buttonElementos("btn-read", "btn btn-primary", "<i class='fa fa-sync'></i>", "leer", "data-toggle='tooltip' data-placement='bottom' title='leer'"); ?>
						<?php buttonElementos("btn-update", "btn btn-light border", "<i class='fa fa-pen-alt'></i>", "editar", "data-toggle='tooltip' data-placement='bottom' title='Editar'"); ?>
						<?php buttonElementos("btn-delete", "btn btn-danger", "<i class='fa fa-trash-alt'></i>", "eliminar", "data-toggle='tooltip' data-placement='bottom' title='Eliminar'"); ?>
					</div>
				</form>
			</div>
			<div class="d-flex table-data">
				<table class="table table-striped table-dark">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Nombre del Libro</th>
							<th>Editorial</th>
							<th>Precio</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody id="tbody">
						<?php 

						//boton leer libro al hacer click
						if(isset($_POST['leer'])){
							$resultado = getDatos();

							if ($resultado) {
								
								while ($row = mysqli_fetch_assoc($resultado)) {
						?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['nombre_libro']; ?></td>
							<td><?php echo $row['editorial']; ?></td>
							<td><?php echo $row['precio']; ?></td>
							<td><i class="fa fa-edit btnedit"></i></td>
						</tr>
						<?php
									}
							} else {
								# code...
							}
							
						}
						 ?>
						
					</tbody>
				</table>
			</div>

		</div>
	</main>

	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>