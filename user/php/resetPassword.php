<?php
	
	if($_POST){

		//	print_r($_POST);
		//	die();
		//	Array ( [idUser] => eukcsj )


		require_once '../../../private/conec_identidad_secont.php';
		require_once '../../../private/encriptador.php';
		require_once 'plantillas_mail_usuario.php';

		require_once '../../../private/conec_pae.php';
		require_once '../../../private/bitacora.php';

		$idUser = desencriptaID($_POST["idUser"]);

		$newPassword = generaPassword();
		$newPassword_enc = md5($newPassword,false);

		//die($newPassword." - ".$newPassword_enc);

		/*$sql = "INSERT INTO `usr_const_inhabilitados`(`ID_USR_CONST`,`NOMBRE`,`A_PATERNO`,`A_MATERNO`,`EMAIL`,`PASSWORD`,`PRIVILEGIO`,`STATUS`,`FECHA_REGISTRO`)
					VALUE(NULL,'$nombre','$aPaterno','$aMaterno','$email','$newPassword_enc','$perfil','1',CURRENT_TIMESTAMP);	";*/

		$sql = "UPDATE `usr_secont`
					SET `PASSWORD` = '$newPassword_enc'
				WHERE `ID_USR_SECONT` = '$idUser';	";

		//echo $sql."<br>";

		if( $result = mysqli_query($conexion_identidad,$sql) ){

			if( mysqli_affected_rows($conexion_identidad) != 0 ){

				session_start();
				$idOper = $_SESSION["USR_ID"];
				//guardaBitacoraOPER($conexion,$idUser,$IDoper,"RESET PASSWORD",NULL);

				saveBitacora($conexion,$idOper,$idUser,"2","PERSONALIZA PASSWORD (OPER)");

				echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
							<strong>¡Se ha asignado contraseña exitosamente!</strong> Enviando correo de notificación...
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>";


				$sql2 = "SELECT *
						FROM `usr_secont`
						WHERE `ID_USR_SECONT` = '$idUser'";

				//echo $sql2."<br>";

				if( $result2 = mysqli_query($conexion_identidad,$sql2) ){

					if( mysqli_num_rows($result2) != 0 ){

						if($row2 = mysqli_fetch_assoc($result2) ){

							//print_r($row);
							$nombre = $row2["NOMBRE"];
							$email = $row2["EMAIL"];
						}

					}

				}


				//	envia correo de notificación
				//	cfunction correoNuevoUsuario($conexion,$nombre,$email,$contra){
				if( correoResetPassword($conexion_identidad,$nombre,$email,$newPassword) ){

					saveBitacora($conexion,$idUser,NULL,"3","NOTIFICACIÓN EMAIL");

					echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
							<strong>¡El correo ha sido enviado correctamente!</strong>
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>";

				}
				else{

					saveBitacora($conexion,$idUser,NULL,"4","FALLO NOTIFICACIÓN EMAIL");

					echo "	<div class='col-11 alert alert-success alert-dismissible fade show' role='alert'>
							<strong>¡Hubo un problema al enviar el correo electrónico!</strong> La contraseña asignada es <strong>$newPassword</strong>...
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>";

				}

				//	CÓDIGO JS	

				echo "	<script>
							setTimeout(function(){
								$('#modalResetPassword').modal('hide');
								cargaTablaUsuarios();
							},3000);
						</script>	";	
						
			}

		}

	}	//	FIN DE... 	if


	/*=================================================
	=            FUNCTION 'correoRepetido'            =
	=================================================*/
	
		function correoRepetido($conexion,$email){

			$sql = "SELECT * 
					FROM `usr_const_inhabilitados`
					WHERE `EMAIL` = '$email'	";

			//echo $sql."<br>";

			if( $result = mysqli_query($conexion,$sql) ){

				if( mysqli_num_rows($result) != 0 )		return true;

			}

			return false;

		}
	
		/*=====  End of FUNCTION 'correoRepetido'  ======*/


	/*===============================================
	=            FUNCTION 'cadenaValida'            =
	===============================================*/
	
		function cadenaValida($cadena){

			$arr_buscar = array("Á","É","Í","Ó","Ú","Ñ","'"," ","Ü");

			$cadena = str_replace($arr_buscar, "", $cadena);

			if( ctype_alpha($cadena) )	return true;

			return false;

		}
	
		/*=====  End of FUNCTION 'cadenaValida'  ======*/
	


	/*=================================================
	=            FUNCTION 'generaPassword'            =
	=================================================*/
	
		function generaPassword(){

			$letra1 = chr(rand(65,90));
			$letra2 = chr(rand(65,90));
			$letra3 = chr(rand(65,90));
			$letra4 = chr(rand(65,90));
			$letra5 = chr(rand(65,90));
			$letra6 = chr(rand(65,90));

			$numero1 = rand(0,9);
			$numero2 = rand(0,9);

			return $letra1.$letra2.$letra3.$numero1.$letra4.$letra5.$letra6.$numero2;


		}	
		/*=====  End of FUNCTION 'generaPassword'  ======*/
	