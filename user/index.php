<?php

	//require_once '../../config_pae.php';
	require_once '../private/config_identidad_secont.php';

	session_start();

	if( !$_SESSION[PRIVILEGIO_APP] ){

		header('Location: ../index.php');
	}
	else if ( $_SESSION[PRIVILEGIO_APP] < PRIVILEGIO_ADMINISTRADOR )
        die("<script> history.back(); </script>");

	/*
	else{
		//header('Location: ../SECONT/');
		echo "<script> history.go(-1); </script>";
		die();
	}
	*/

?>

<!DOCTYPE html>
<html lang="ES">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>:: Usuarios :: Identidad SECONT ::</title>

		<!-- Bootstrap 5 CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
		<!-- fontawesome 5.6.3 CSS    --> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
				integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!-- datatables 1.11.3 CSS -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

		<style>
			
			.opcion :hover{
				font-weight: bold;
			}

		</style>

	</head>
	<body>

		<div class="container my-4" style="padding-top: 30px;">

			<?php require_once('../menu_nav_modulos.php'); ?>

			<div class="row justify-content-center">
				<div class="col text-center"><h3>Usuarios</h3></div>
			</div>

			<div class='row justify-content-center>'>
				<div class='col text-success text-end my-3 text-right'>
					<!--<div class="spinner-grow text-success " style="font-size:10px;" role="status">
						<span class="sr-only">Loading...</span>
					</div>-->
					<strong class='mb-2'>Agregar Usuario
						<button id='btnNewUser' class='btn btn-outline-success ml-2'>
							<i class='fa fa-user' style='font-size:22px;'></i>
						</button>
					</strong>
				</div>
			</div>

			<div class="row justify-content-center my-3" id="answer"></div>

			<div class="row justify-content-center mt-2" id="tblUsuarios"></div>
	
		</div>

		<!-- 	jQuery	-->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<!--
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		-->
		
		<!-- boostrap 5 JS	-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
		<!-- datatable 1.11.3 JS    -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
		
		<script src="js/repositorio_usuarios.js"></script>
		<!--==================================================================
		=            LIBRERIAS JS PARA AGREAR BOTONES A DATATABLE            =
		===================================================================-->

		<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
		<!--
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
		-->
		
		<!--====  End of LIBRERIAS JS PARA AGREAR BOTONES A DATATABLE  ====-->
		
	</body>

</html>
