<?php

	session_start();

	if( !$_SESSION['USR_ID'] ){

		header('Location: ../login.php');
	}
	
	//session_start();

	$email = $_SESSION["USR_EMAIL"];

?>

<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>:: Cambiar ContraseñaS ::</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
		<!-- fontawesome    --> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
				integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

		<!-- <link rel="stylesheet" href="../../css/datatable.css"> -->

		<!--=====================================================
		=            Librerias CSS ara botones exportar            =
		======================================================-->
		
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
		
		<!--====  End of Librerias CSS para botones exportar  ====-->

		<style>
			
			.opcion :hover{
				font-weight: bold;
			}

		</style>

	</head>
	<body>

		<div class="container my-4" style="padding-top: 30px;">

			<?php require_once('../menu_nav_modulos.php'); ?>

			<div class="row justify-content-center mt-5">
				<div class="col text-center"><h3>Cambiar Contraseña</h3></div>
			</div>

			

			<div class="row justify-content-center my-3" id="answer"></div>
				
			<div class="form-group row">
				<label for='inputNombre' class='col-md-4 col-form-label text-right'>Usuario:</label>
				<div class='col-md-6 mt-2'><strong><?php echo $email; ?></strong></div>
			</div>

			<div class="form-group row mb-3">
				<label for='inputNombre' class='col-md-4 mt-1 col-form-label text-right'>Contraseña Actual:</label>
				<div class='col-md-6'>
					<input type='password' class='form-control' id='inputPasswordOld' placeholder='Contraseña Actual'>
				</div>
			</div>
			<hr>
			
			<div class="row justify-content-center">
				<div class="col-md-2"></div>
				<div class="col-md-6 text-left">
					<p>La contraseña que asigne debe de contener al menos:
					<ul>
						<li>6 caracteres,</li>
						<li>Una mayúscula,</li>
						<li>Una minúscula, y</li>
						<li>Un número</li>
					</ul>
				</div>
			</div>

			<div class="form-group row mt-3">
				<label for='inputNombre' class='col-md-4 col-form-label text-right'>Nueva Contraseña:</label>
				<div class='col-md-6'>
					<input type='password' class='form-control' id='inputPasswordNew' placeholder='Contraseña Nueva'>
				</div>
			</div>

			<div class="form-group row">
				<label for='inputNombre' class='col-md-4 col-form-label text-right'>Confirma Nueva Contraseña:</label>
				<div class='col-md-6'>
					<input type='password' class='form-control' id='inputPasswordNew2' placeholder='Confirma Contraseña'>
				</div>
			</div>

			<div class="row justify-content-center mt-5">
				<button class="btn btn-dark mx-1" id="btnCancel" onClick="history.go(-1); return false;"><strong>Cancelar</strong></button>
				<button class="btn btn-outline-success mx-1" id="btnChangePassword" disabled><strong>Cambiar Contraseña</strong></button>
			</div>
	
		</div>


		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<!--    Boostrap JS    -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
		<!--    jQuery      -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script src="js/repositorio_editPassword.js"></script>

		<!--<script src="../../js/datatables.js"></script>-->

		<!--==================================================================
		=            LIBRERIAS JS PARA AGREAR BOTONES A DATATABLE            =
		===================================================================-->

		<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
		<!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>-->
		
		
		<!--====  End of LIBRERIAS JS PARA AGREAR BOTONES A DATATABLE  ====-->
		
	</body>

</html>
