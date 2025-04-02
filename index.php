<?php

require_once 'private/config_identidad_secont.php';

session_start();

//if( !$_SESSION['USR_ID'] ){
if (!isset($_SESSION[PRIVILEGIO_APP])) {

	header('Location: login.php');
	die();
}
?>

<!DOCTYPE html>
<html lang="ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SICOSA</title>

	<!-- 	FONTAWESOME		-->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="css/datatable.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

	<?php
	include "menu_nav.php";

	?>


	<div class="container" style="padding-top:100px;">
		<div class="row justify-content-center">
			<div class="col-lg-9 text-center">
				<h3>Módulo de Evaluación de Comités de Etica</h3>
			</div>
		</div>

		<div class="row justify-content-center" id="answer"></div>

		<div class="row justify-content-end mt-3">
			<div class="col-2 text-end  p-2">
				<label for="disabledSelect" class="form-label">Ente Público:</label>
			</div>

			<div class="col-5 text-center">
				<!-- BARRA DE SELECCIÓN (Se utiliza el código php para colocar todas las entidades
					en la barra de selección) -->
				<select id="selectEntePublico" class="form-select">
					<option value="0">Seleccione una dependencia</option>
					<?php
					include 'private/conec_identidad_secont.php';
					$query = 'SELECT * FROM cat_dependencias';
					$dependencias = mysqli_query($conexion_identidad, $query);
					while ($dep = mysqli_fetch_assoc($dependencias)) { ?>
						<option value="<?php echo $dep['ID_DEPENDENCIA'] ?>"><?php echo $dep['NOMBRE_DEPENDENCIA'] ?></option>
					<?php } ?>



				</select>
			</div>

			<?php include "modal_dropdown.php"; ?>

			<!-- ####################MODAL QUE CONTIENE LA CONFIRMACIÓN PARA ELIMINAR UN REGISTRO ######################-->

			<?php include 'modal_eliminar.php'; ?>

			<!--################## NODAL PARA EDITAR O MODIFICAR LOS DATOS DE UN REGISTRO ####################-->

			<?php include 'modal_editar.php'; ?>


			<!-- TABLA QUE SE MUESTRA EN LA PAGINA WEB -->
			<div class="container">
				<div class="row justify-content-center">
					<div class="col">
						<!-- TABLA -->
						<table id="myTable" class="display">
							<thead>
								<tr>
									<th>C</th>
									<th>Entidad</th>
									<th>Periodo</th>
									<th>Presidente</th>
									<th>Cumplimiento</th>
									<th>Desempeño</th>
									<th>Calficación Anual</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM `evaluaciones`";
								$result = mysqli_query($conexion_identidad, $sql);
								if ($result) {
									while ($row = mysqli_fetch_array($result)) {
								?>
										<tr>
											<td><?php echo $row['id'] ?></td>
											<td><?php echo $row['Entidad'] ?></td>
											<td><?php echo $row['Periodos'] ?></td>
											<td><?php echo $row['Presidente'] ?></td>
											<td><?php echo $row['Cumplimiento'] ?></td>
											<td><?php echo $row['Desempeño'] ?></td>
											<td><?php echo $row['Calificacion'] ?></td>
											<td>
												<a href=""><i class="fas fa-tasks mx-1 text-dark"></i></a>
												<a href="#" class="editbtn" class="mx-1"><i class="fas fa-edit mx-1 text-primary"></i></a>
												<a href="#" class="deletebtn"><i class="fas fa-trash mx-1 text-danger"></i></a>
											</td>
										</tr>
								<?php
									}
								} ?>
							</tbody>

						</table>

					</div>
				</div>

			</div>


			<!-- 	JQUERY	-->
			<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

			<!-- BOOTSTRAP	-->
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
				integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
				integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


			<!--	REPOSITORIOS PROPIOS -->
			<script src="js/repositorio_inicio.js"></script>


			<script src="js/datatables.js"></script>
			<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


		</div> <!--====  End of LIBRERIAS JS PARA AGREAR BOTONES A DATATABLE  ====-->
	</div>
	<!-- SCRIPT CON LAS FUNCIONES PARA LOS MODALES EN JS Y JQUERY -->
	<script src="js/index.js"></script>
</body>

</html>