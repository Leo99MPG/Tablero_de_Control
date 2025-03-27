<?php
	
	if($_POST){

		//echo "<pre>"; print_r($_POST); echo "</pre>";
		//die();
		/*	
			Array
			(
				[nombre] => GUILLERMO 
				[aPaterno] => DZIB
				[aMaterno] => QUEB
				[email] => gdzib@live.com.mx
				[depto] => gwlcsj
				[perfil] => gwldto
			)	
		*/


		require_once '../../../private/conec_identidad_secont.php';
		require_once '../../../private/encriptador.php';
		require_once 'plantillas_mail_usuario.php';

		require_once '../../../private/conec_pae.php';
		require_once '../../../private/bitacora.php';
		require_once '../../../config_pae.php';

		//$idUser = desencriptaID($_POST["idUser"]);

		$guardar = true;

		if( !cadenaValida($_POST["nombre"]) ){

			echo "	<div class='col-10 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡El campo 'Nombre' contiene caracteres invalidos!</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			$guardar = false;

		}

		if( !cadenaValida($_POST["aPaterno"]) ){

			echo "	<div class='col-10 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡El campo 'Apellido Paterno' contiene caracteres invalidos!</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			$guardar = false;

		}

		if( !cadenaValida($_POST["aMaterno"]) ){

			echo "	<div class='col-10 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡El campo 'Apellido Materno' contiene caracteres invalidos!</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			$guardar = false;

		}

		if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){

			echo "	<div class='col-10 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡El campo 'Correo Electrónico' contiene caracteres invalidos!</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			$guardar = false;

		}
		else if( correoEstaRegistrado($conexion_identidad,$_POST["email"]) ){

			echo "	<div class='col-10 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡El correo electrónico proporcionado ya fue usado por otro usuario!</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			$guardar = false;

		}
		
		if( !$guardar ) 	die();

		$nombre = $_POST["nombre"];
		$aPaterno = $_POST["aPaterno"];
		$aMaterno = $_POST["aMaterno"];
		$email = $_POST["email"];
		$perfil = desencriptaID($_POST["perfil"]);

		$depto = desencriptaID($_POST["depto"]);
		$privilegio = desencriptaID($_POST["perfil"]);

		$newPassword = generaPassword();
		$newPassword_enc = md5($newPassword,false);

		//die($newPassword." - ".$newPassword_enc);

		/*
		$sql = "INSERT INTO `usr_secont`(`ID_USR_SECONT`,`NOMBRE`,`A_PATERNO`,`A_MATERNO`,`EMAIL`,`PASSWORD`,`ID_DEPARTAMENTO`,`PRIVILEGIO`,`STATUS`,`FECHA_REGISTRO`)
					VALUE(NULL,'$nombre','$aPaterno','$aMaterno','$email','$newPassword_enc','2','$perfil','1',CURRENT_TIMESTAMP);	";
		*/

		$sql = "INSERT INTO `usr_secont`(`ID_USR_SECONT`,`NOMBRE`,`A_PATERNO`,`A_MATERNO`,`EMAIL`,`PASSWORD`,`STATUS`,`FECHA_REGISTRO`)
					VALUE(NULL,'$nombre','$aPaterno','$aMaterno','$email','$newPassword_enc','1',CURRENT_TIMESTAMP);	";

		//echo $sql."<br>";

		if( $result = mysqli_query($conexion_identidad,$sql) ){

			if( mysqli_affected_rows($conexion_identidad) != 0 ){

				$idUser = mysqli_insert_id($conexion_identidad);

				session_start();
				$IDoper = $_SESSION["USR_ID"];
				
				//	Guardar Departamento y Asignacion de Perfil
				if( guardarDepartamento($conexion_identidad,$idUser,$depto) && guardaAsignacion($conexion_identidad,$idUser,ID_APLICACION,$privilegio) ){
					
					//guardaBitacoraOPER($conexion,$idUser,$IDoper,"NUEVO USUARIO",NULL);
					saveBitacora($conexion,$IDoper,$idUser,"1","CREA USUARIO");

					echo "	<div class='col-10 alert alert-success alert-dismissible fade show' role='alert'>
								<strong>¡Se ha creado exitosamente el Usuario!</strong> Enviando correo de notificación...
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							</div>";
	
					//	envia correo de notificación
					if( correoNuevoUsuario($conexion_identidad,$nombre,$email,$newPassword) ){

						saveBitacora($conexion,$idUser,NULL,"3","NOTIFICACIÓN EMAIL");

						echo "	<div class='col-10 alert alert-success alert-dismissible fade show' role='alert'>
								<strong>¡El correo ha sido enviado correctamente!</strong>
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							</div>";


						//	CÓDIGO JS

						echo "	<script>
							setTimeout(function(){
								$('#modalNewUser').modal('hide');
								cargaTablaUsuarios();
							},3000);
						</script>	";	

					}
					else{

						saveBitacora($conexion,$idUser,NULL,"4","FALLO NOTIFICACIÓN EMAIL");

						echo "	<div class='col-10 alert alert-success alert-dismissible fade show' role='alert'>
								<strong>¡Hubo un problema al enviar el correo electrónico!</strong> La contraseña asignada es <strong>$newPassword</strong>...
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							</div>";
					
					}
				
				}
				//Si NO se guarda el Departamento o el perfil
				else{

					// Elimina Usuario

					// Msj de Notificación de error de creación de Usuario.

				}


			
			}

		}
		
	}	//	FIN DE... 	if



	/*=================================================
	=          FUNCTION 'guardaAsignacion'            =
	=================================================*/

		function guardaAsignacion($conexion,$idUser,$id_aplicacion,$privilegio){

			$sql = "INSERT INTO `asignaciones`(`ID_ASIGNACION`, `ID_USR_SECONT`, `ID_APLICACION`, `ID_PRIVILEGIO`) 
						VALUES (NULL,'$idUser','$id_aplicacion','$privilegio') ";
			
			if( $result = mysqli_query($conexion,$sql) ){

				if( mysqli_affected_rows($conexion) == 1 ){

					return true;

				}

			}

			return false;

		}

	/*=================================================
	=      	FUNCTION 'guardarDepartamento'            =
	=================================================*/

		function guardarDepartamento($conexion,$idUser,$depto){

			$sql = "INSERT INTO `usr_departamento`(`ID_USR_DEPTO`, `ID_USR_SECONT`, `ID_DEPTO`, `ACTIVO`) 
						VALUES (NULL,'$idUser','$depto','1')";

			if( $result = mysqli_query($conexion,$sql) ){

				if( mysqli_affected_rows($conexion) == 1 ){

					return true;

				}

			}

			return false;

		}

		/*=====  End of FUNCTION 'correoRepetido'  ======*/


	/*=================================================
	=            FUNCTION 'correoRepetido'            =
	=================================================*/
	
		function correoEstaRegistrado($conexion,$email){

			$sql = "SELECT * 
					FROM `usr_secont`
					WHERE `EMAIL` = '$email'
				";

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
	