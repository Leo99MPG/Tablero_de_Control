<?php

	//require_once 'config_constancias.php';

	define("SMTP_DEBUG",0);		// Distribución
	//define("SMTP_DEBUG",3);	// Test

	define("SMTP_AUTH",true);
	define("TYPE_MAIL","smtp");
	define("FORMAT_HTML",true);

	define("PATH_IMG_HEADER","../../images/header-mail.png");
	
	define("IMG_HEADER_CORREO","header-mail.png");

	define("PATH_IMG_INICIAL","../../images/inicial.png");
	define("PATH_IMG_CONCLUSION","../../images/conclusion.png");

	define("IMG_CORREO","information.png");
	//$img_correo = "header-mail.png";
	
	define("CORREO_HABILITADO",true);
	//$CorreoHabilitado = true;

	//define("CORREO_SALIENTE","guillermo.dzib@campeche.gob.mx");
	define("CORREO_SALIENTE","declaracionespatrimoniales@campeche.gob.mx");
	//$correo_saliente = "webmaster@campeche.gob.mx";
	
	define("PASSWORD","hlnfslxtjzseejhi");
	//define("PASSWORD","Declarapat01");
	//$password="SEcoc219";

	define("NOMBRE","DECLARANET SECONT");
	//$nombre = "Constancia en Linea SECONT";

	define("URL","declaranet.campeche.gob.mx");
	//$url = "constancias.campeche.gob.mx";

	define("PUERTO_SMTP",587);
	//$puertoSMTP = 587;

	//define("HOST_SMTP","smtp.office365.com");
	define("HOST_SMTP","smtp.gmail.com");
	//$HostSMTP = "smtp.office365.com";

	define("SMTP_SEGURIDAD","tls");
	//$SMTPseguridad = "tls";

	//	Correo del que recibira  mensaje de error
	define("CORREO_ERROR","secont_log_mail@yahoo.com");
	//$correoError = "admin@gdzib.net";

	//$_MAIL_RESPONSABLE = "abraham.canetas@campeche.gob.mx";
	define("MAIL_RESPONSABLE","declaracionespatrimoniales@campeche.gob.mx");
	//$_MAIL_RESPONSABLE = "secocamuj@campeche.gob.mx";

	//	Copia oculta a algún para verificar la correcta configuración
	//		Opcional, si no poner ""
	//define("MAIL_CCO","admin@gdzib.net");
	define("MAIL_CCO","secont_log_mail@yahoo.com");
	//$mailCCO = "admin@gdzib.net";
		
	define("URL_PORTAL","http://declaranet.campeche.gob.mx/");
	//$_URL_PORTAL = "http://declaranet.campeche.gob.mx/";

	
	
	//!		MSJ INVITACIÓN CONCLUSIÓN

	define("TITLE_MAIL","Se le invita al cumplimiento de su obligacion");

	//!		MSJ_INICIO

	/*define("MSJ_INICIO","	<html>
								<head>
									<style type='text/css'>
										.center {
											display: block;
											margin-left: auto;
											margin-right: auto;
											margin-button: 10px;
											width: 50%;
										}
									</style>
								</head>
								<body>
									<img src='".IMG_HEADER_CORREO."' class='center'>
									<p></p>
									<img src='".IMG_CORREO."' class='center'>
								</body>
							</html>");*/


	/*define("MSJ_INICIO","<html>
								<img src='".IMG_CORREO."'>
								<h4>".htmlentities("Recordatorio Declaración Inicio",ENT_QUOTES,'UTF-8')."</h4>
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum, fugiat cupiditate dolorem at reiciendis aliquid iste doloribus et incidunt. Qui.</p>
							</html>");*/

	//!		MSJ_CONCLUSION

	define("MSJ_CONCLUSION","<html>
								<head>
									<style type='text/css'>
										.center {
											display: block;
											margin-left: auto;
											margin-right: auto;
											margin-button: 10px;
											width: 50%;
										}
									</style>
								</head>
								<body>
									<img src='".IMG_HEADER_CORREO."' class='center'>
									<p></p>
									<img src='".IMG_CORREO."' class='center'>
								</body>
							</html>");
	
	/*
	define("MSJ_CONCLUSION","<html>
								<img src='".IMG_CORREO."'>
								<h3>".htmlentities("Asunto: Se le invita al cumplimiento de su obligación.",ENT_QUOTES,'UTF-8')."</h3>
								<p>".htmlentities("Con fundamento en el artículo 33 fracción III de la Ley General de Responsabilidades Administrativas, el cual señala que la <strong>declaración de conclusión</strong> del encargo se presentará <strong>dentro de los sesenta días naturales</strong> siguientes a la conclusión del empleo, cargo o comisión; debido a lo anterior, la Secretaría de la Contraloría del Poder Ejecutivo del Estado de Campeche le hace una cordial invitación al cumplimiento en tiempo y forma de esta obligación, ya que, de acuerdo a nuestros registros, causó <strong>BAJA</strong> en el servicio público. Cabe mencionar que, en caso de omisión, sin causa justificada, podría ser sujeto a una presunta responsabilidad por la comisión de las faltas administrativas correspondientes.",ENT_QUOTES,'UTF-8')."</p>
								<p>".htmlentities("Si la Declaración de Conclusión <strong>ya fue presentada</strong> al momento de recibir este correo, favor de hacer caso omiso al mismo. Por otro lado, <strong>en caso de cambio de dependencia o entidad</strong> en el mismo orden de gobierno dentro de los sesenta días naturales de la conclusión de su último encargo, únicamente se dará aviso de dicha situación mediante <strong>el sistema DeclaraNET</strong>, en la opción de AVISO por cambio.",ENT_QUOTES,'UTF-8')."</p>
							</html>");*/


	


	/*======================================================================
	=            MENSAJES PARA CORREO DE APROBACIÓN DE SOLICITUD           =
	======================================================================*/
	
		/*
		$msj_aprobacion_1 = "Su solicitud de Constancia de No Inhabilitación ha sido";
		$msj_aprobacion_2 = " A P R O B A D A ";
		$msj_aprobacion_3 = "Su Constancia se encuentra adjunta en este correo";
		//$msj_aprobacion_4 = "Para realizar el pago accese desde el siguiente enlace:";
		$msj_aprobacion_4 = "";
		$link_descarga = $_URL_PORTAL."download.php?token=";
	
		/*=====  End of MENSAJES PARA CORREO DE APROBACIÓN DE SOLICITUD ======*/


	/*====================================================================
	=            MENSAJE PARA CORREO DE NEGATIVA DE SOLICITUD            =
	====================================================================*/

		/*
		$msj_rechazo_1 = "Su solicitud de Constancia de Inhabilitación ha sido";
		$msj_rechazo_2 = " R E C H A Z A D A ";
		$msj_rechazo_3 = "A continuación se informa cual es el motivo de rechazo:";
		$link_correccion = $_URL_PORTAL."solicitudInformacion.php?token=";
		
		/*=====  End of MENSAJE PARA CORREO DE NEGATIVA DE SOLICITUD  ======*/
	
	
	
?>