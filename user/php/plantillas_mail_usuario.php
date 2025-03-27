<?php

	/*=====================================================
	=            FUNCTION 'correoNuevoUsuario'            =
	=====================================================*/
	
		function correoNuevoUsuario($conexion,$nombreUsuario,$email,$password){

		
			//require("../private/encriptador.php");

			//$id_const_enc = str_replace('"','',encriptaID($id_const));

			//if( !$CorreoHabilitado )
			//	return true;
			require '../../../private/phpmailer/class.phpmailer.php';
			require '../../../private/phpmailer/class.smtp.php';

			//require '../../private/config_constancias.php';
			//require '../../private/func_constanciaPDF_kiosco.php';

			require '../../../private/config_mail.php';
			//require '../../private/encriptador.php';

			/*$TituloCorreo = "Usuario Constancia en Linea SECONT";

			$nombreTabla = "Registro Usuario Constancia en Línea";
			$msj_nombre = "¡Hola ".$nombreUsuario."!";
			$msj_usuario = "Usuario: ".$email;
			$msj_password = "Contraseña: ".$contra;
			$msj_linkSistema = "Ingresar al módulo de administración";*/
			

			$mail = new PHPMailer();
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			
			$mail->Mailer = TYPE_MAIL;
			
			//$mail->Helo = $url;
			$mail->Helo = URL;
			
			$mail->IsSMTP();
			$mail->SMTPDebug = SMTP_DEBUG;
			
			$mail->SMTPAuth = SMTP_AUTH;
			
			$mail->SMTPSecure = SMTP_SEGURIDAD; 
			$mail->Host = HOST_SMTP;
			$mail->Port = PUERTO_SMTP;
			$mail->addBCC(MAIL_CCO);
			$mail->Username = CORREO_SALIENTE;
			$mail->SetFrom(CORREO_SALIENTE,NOMBRE);
			$mail->Password = PASSWORD;
			$mail->Subject = TITLE_MAIL_NEW_USER;

			$mail->AddAddress($email,$nombre);
			
			/* 		Mensaje Aprobación Solicitud	*/	

			//if( $status == $_STATUS_COMPLETADO ){
			if( true ){

				$msj_fix = MSJ_NEW_USER;

				//$msj_fix = str_replace("%name%",htmlentities($nombreUsuario,ENT_QUOTES,'UTF-8'),$msj_fix);
				$msj_fix = str_replace("%user%",$email,$msj_fix);
				$msj_fix = str_replace("%passw%",$password,$msj_fix);

				$mail->Body = $msj_fix;

			}
			

			$mail->IsHTML(true);
			
			//$PDF = getConstanciaPDF($conexion,$folioSeguimiento,$link_valida_constancia,"../".$carpeta_temporal);

			//$mail->AddAttachment($PDF,$_NAME_PDF_CONSTANCIA);
			//$mail->AddAttachment("../../../img/header-mail.png", IMG_CORREO);
			$mail->AddAttachment(PATH_IMG_HEADER, IMG_HEADER_CORREO);

			if ( !$mail->Send() ) {
		  		echo "<br>Mailer Error: ".$mail->ErrorInfo."\n";
		  		//$mail = NULL;
				return false;
			} 
			else {
		  		//$mail = NULL;
		  		return true;
			}

		}

		/*=====  End of FUNCTION 'correoNuevoUsuario'  ======*/


	/*======================================================
	=            FUNCTION 'correoResetPassword'            =
	======================================================*/
	
		function correoResetPassword($conexion,$nombreUsuario,$email,$password){

		
			//require("../private/encriptador.php");

			//$id_const_enc = str_replace('"','',encriptaID($id_const));

			//if( !$CorreoHabilitado )
			//	return true;
			require '../../../private/phpmailer/class.phpmailer.php';
			require '../../../private/phpmailer/class.smtp.php';

			//require '../../private/config_constancias.php';
			//require '../../private/func_constanciaPDF_kiosco.php';

			require '../../../private/config_mail.php';
			//require '../../private/encriptador.php';

			/*$TituloCorreo = "Constancia en Linea SECONT";

			$nombreTabla = "Credenciales de Usuario";
			$msj_nombre = "¡Hola ".$nombreUsuario."!";
			$msj_usuario = "Usuario: ".$email;
			$msj_password = "Contraseña: ".$contra;
			$msj_linkSistema = "Ingresar al módulo de administración";

			$color = "#008000";*/
			

			$mail = new PHPMailer();
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			
			$mail->Mailer = "smtp";
			
			//$mail->Helo = $url;
			$mail->Helo = "constancias.campeche.gob.mx";
			
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			
			$mail->SMTPAuth = true;
				
			$mail->SMTPSecure = SMTP_SEGURIDAD; 
			$mail->Host = HOST_SMTP;
			$mail->Port = PUERTO_SMTP;
			$mail->addBCC(MAIL_CCO);
			$mail->Username = CORREO_SALIENTE;
			$mail->SetFrom(CORREO_SALIENTE,NOMBRE);
			$mail->Password = PASSWORD;
			$mail->Subject = TITLE_MAIL_RESET_PASSWORD;

			$mail->AddAddress($email,$nombreUsuario);
			
			/* 		Mensaje Aprobación Solicitud	*/	

			//if( $status == $_STATUS_COMPLETADO ){
			if( true ){
				//$mail->Body = MSJ_RESET_PASSWORD;

				$msj_fix = MSJ_RESET_PASSWORD;

				$msj_fix = str_replace("%name%",$nombreUsuario,$msj_fix);
				$msj_fix = str_replace("%user%",$email,$msj_fix);
				$msj_fix = str_replace("%passw%",$password,$msj_fix);

				$mail->Body = $msj_fix;

			}
			

			$mail->IsHTML(true);
			
			//$PDF = getConstanciaPDF($conexion,$folioSeguimiento,$link_valida_constancia,"../".$carpeta_temporal);

			//$mail->AddAttachment($PDF,$_NAME_PDF_CONSTANCIA);
			//$mail->AddAttachment("../../../img/header-mail.png", IMG_CORREO);
			$mail->AddAttachment(PATH_IMG_HEADER, IMG_HEADER_CORREO);

			if ( !$mail->Send() ) {
		  		echo "<br>Mailer Error: ".$mail->ErrorInfo."\n";
		  		//$mail = NULL;
				return false;
			} 
			else {
		  		//$mail = NULL;
		  		return true;
			}

		}

		/*=====  End of FUNCTION 'correoResetPassword'  ======*/
	

?>