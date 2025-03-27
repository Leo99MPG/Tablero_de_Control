<?php

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		/*	Array ( 	[now] => aaaaa 
						[future] => bbbbbb 
						[future2] => bbbbbb 	)		*/

		require_once '../../../private/conec_identidad_secont.php';
		require_once '../../../private/conec_pae.php';
		require_once '../../../private/bitacora.php';	
		require_once 'plantillas_mail_usuario.php';


		$actualPass = $_POST["now"];
		$nuevoPass = $_POST["future"];
		$copy_nuevoPass = $_POST["future2"];

		$arr_numero = array("0","1","2","3","4","5","6","7","8","9");
		$nuevoPass_sinNum = str_replace($arr_numero,"", $nuevoPass);

		$guardar = true;

		if( strlen($nuevoPass) < 6 ){

			echo "	<div class='col-11 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡La Contraseña debe contener al menos 6 caracteres!</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";

			$guardar = false;

		}
		else if( $nuevoPass != $copy_nuevoPass ){

			echo "	<div class='col-11 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡La 'Nueva Contraseña' y la 'Confirmación de la Nueva Contraseña' no concuerdan!</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";

			$guardar = false;

		}
		else if( $actualPass == $nuevoPass ){

			echo "	<div class='col-11 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡La 'Nueva Contraseña' y la 'Actual Contraseña' no pueden ser iguales!</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";

			$guardar = false;

		}
		else if( $nuevoPass == strtolower($nuevoPass) || $nuevoPass == strtoupper($nuevoPass) || $nuevoPass == $nuevoPass_sinNum ){

			echo "	<div class='col-11 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡La contraseña porporcionada no cumple con los parametros establecidos!</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";

			$guardar = false;

		}


		if( $guardar ){

			session_start();

			$idUser = $_SESSION["USR_ID"];
			$email = $_SESSION["USR_EMAIL"];
			$nombre = $_SESSION["USR_NOMBRE"];

			$nuevoPass_enc = md5($nuevoPass,false);
			$actualPass_enc = md5($actualPass,false);

			$sql = "UPDATE `usr_secont`
						SET `PASSWORD` = '$nuevoPass_enc'
					WHERE `ID_USR_SECONT` = '$idUser'
						AND `PASSWORD` = '$actualPass_enc';";


			//echo $nuevoPass."<br>".$sql."<br>";
			//die();

			if( $result = mysqli_query($conexion_identidad,$sql) ){

				if( mysqli_affected_rows($conexion_identidad) != 0 ){

					saveBitacora($conexion,$idUser,NULL,"2","PERSONALIZA PASSWORD");

					//guardaBitacoraOPER($conexion,$idUser,0,"CHANGE PASSWORD",NULL);

					echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
								<strong>¡Su contraseña ha sido modificada exitosamente!</strong> Se está enviado un correo electrónico para futuras referencias...
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
							</div>";

					if( correoResetPassword($conexion_identidad,$nombre,$email,$nuevoPass) ){

						saveBitacora($conexion,$idUser,NULL,"3","NOTIFICACIÓN EMAIL");

						/*echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
								<strong>¡El correo ha sido enviado correctamente!</strong>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
							</div>";*/

					}
					else
						echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
								<strong>¡Hubo un problema al enviar el correo electrónico!</strong> Le recordamos su contrasña: <strong>$nuevoPass</strong>...
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
							</div>";


					echo "	<script>
								
								setTimeout(function(){
									window.history.back();	},5000);

							</script>";

				}
				else{

					echo "	<div class='col-11 alert alert-danger alert-dismissible fade show' role='alert'>
								<strong>¡Ocurrio un error al actualizar su contraseña! Por favor, intente nuevamente.</strong>
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
							</div>";


				}


			}



		}


	}
