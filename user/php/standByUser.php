<?php
	
	if($_POST){

		//	print_r($_POST);
		//	die();
		//	Array ( [idUser] => gwlbrn )

		require_once '../../../private/conec_identidad_secont.php';
		require_once '../../../private/encriptador.php';
		//require_once '../../../private/bitacora.php';

		$idUser = desencriptaID($_POST["idUser"]);

		$sql = "UPDATE `usr_secont`
					SET `STATUS` = '2'
				WHERE `ID_USR_SECONT` = '$idUser'	
			";

		if( $result = mysqli_query($conexion_identidad,$sql) ){

			if( mysqli_affected_rows($conexion_identidad) != 0 ){

				session_start();
				$IDoper = $_SESSION["USR_ID"];
				//guardaBitacoraOPER($conexion,$idUser,$IDoper,"ELIMINA USUARIO",NULL);

				echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
							<strong>¡El usuario ha sido eliminado!</strong>
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>";

				echo "	<script>
							setTimeout(function(){
								$('#modalStandByUser').modal('hide');
								cargaTablaUsuarios();
							},3000);
						</script>	";

			}


		}
			



	}	//	FIN DE... 	if

