<?php

	if ($_POST)
	{
		
		//	print_r($_POST);
		//	die();
		/*	Array ( 	[Usuario] => gdzib@live.com.mx 
						[Contra] => Abc123 		)		*/

		//echo __DIR__."<br>";
		//die();

		require_once '../../private/conec_identidad_secont.php';
		require_once '../../private/config_identidad_secont.php';
		
		//require_once '../../../config_app.php';
		//require_once '../../../private/bitacora.php';

		//require_once '../../../private/conec_revisiones_coic.php';
		//require_once '../../../private/bitacora.php';

		$usuario = trim($_POST['Usuario']);
		$contrasena = trim($_POST['Contra']);

		$password = md5($contrasena,false);

		if( !filter_var($usuario, FILTER_VALIDATE_EMAIL) ){

			echo "	<div class='col-lg-9 alert alert-danger alert-dismissible fade show mx-3 mx-lg-0' role='alert'>
						<strong>¡Usuario con formato incorrecto!</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			die();
			//return false; 
			
		}
		
		// Check if the table 'asignaciones' exists
		$table_check_query = "SHOW TABLES LIKE 'asignaciones'";
		$table_check_result = mysqli_query($conexion_identidad, $table_check_query);

		if (mysqli_num_rows($table_check_result) == 0) {
			echo "	<div class='col-9 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡Error!</strong> La tabla 'asignaciones' no existe en la base de datos.
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
			die();
		}

		$sql = "SELECT U.`ID_USR_SECONT`, U.`NOMBRE`, U.`A_PATERNO`, U.`A_MATERNO`, U.`EMAIL`, U.`PASSWORD`, 
					UD.`ID_DEPTO`, CD.`NOMBRE_DEPTO`, A.`ID_APLICACION`, A.`ID_PRIVILEGIO`, U.`STATUS` 

				FROM `usr_secont` U

				LEFT JOIN `asignaciones` A
					ON A.`ID_USR_SECONT` = U.`ID_USR_SECONT`

				LEFT JOIN `usr_departamento` UD
					ON UD.`ID_USR_SECONT` = U.`ID_USR_SECONT`

				LEFT JOIN `cat_departamento` CD
					ON UD.`ID_DEPTO` = CD.`ID_DEPTO` 

				WHERE U.`EMAIL` = '$usuario'
					AND U.`PASSWORD` = '$password'
					AND A.`ID_APLICACION` IN ('255', '".ID_APLICACION."') 
					AND A.`ACTIVO` = '1'
					AND U.`STATUS` = '1'
					AND A.`ID_PRIVILEGIO` <> '0'
			";


		//echo "$sql<br>";
		//die();

		if( $result = mysqli_query($conexion_identidad,$sql) ){

			if(mysqli_num_rows($result) != 0)
			{
			
				if( $row = mysqli_fetch_assoc($result) ){
			
					session_start();
						
					$_SESSION['USR_NOMBRE'] = $row['NOMBRE']." ".$row['A_PATERNO']." ".$row['A_MATERNO'];
					$_SESSION['USR_EMAIL'] = $usuario;
					$_SESSION['USR_ID'] = $row['ID_USR_SECONT'];
					$_SESSION['USR_ID_DEPTO'] = $row["ID_DEPTO"];

					$_SESSION['USR_DEPTO'] = $row["NOMBRE_DEPTO"];

					/*	
					Array $_SESSION
						(
							[USR_NOMBRE] => ADMINISTRADOR SISTEMA 
							[USR_EMAIL] => admin@gdzib.net
							[USR_ID] => 1
							[USR_ID_DEPTO] => 3
							[USR_DEPTO] => TECNÓLOGIAS DE LA INFORMACIÓN Y ESTADÍSTICA
							[USR_PRIVILEGIO] => 9
						)
					*/
					
					//saveBitacora($conexion,$_SESSION['USR_ID'],NULL,"5","LOGIN SISTEMA");
					
					if ( $row['ID_PRIVILEGIO'] != 0 ){
						
						//$_SESSION['USR_PRIVILEGIO'] = $row['ID_PRIVILEGIO'];
						//	PRIVILEGIO_APP
						
						//guardaBitacoraOPER($conexion_identidad,0,$row['ID_USR_SECONT'],"LOGIN USUARIO",NULL);

						$_SESSION[PRIVILEGIO_APP] = $row['ID_PRIVILEGIO'];

						echo "<body>
								<script type='text/javascript'>
									window.location.href='index.php';
								</script>
							</body>";

						
					}
					
				}	

			}
			else{
				echo "	<div class='col-lg-9 alert alert-danger alert-dismissible fade show mx-3 mx-lg-0' role='alert'>
							<strong>¡Usuario o Contraseña Incorrectos!</strong> Intente de nuevo.
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						</div>";

				//CorreoError("Login",mysqli_info($conexion),$sql);
			}

		}
		else{
			echo "	<div class='col-9 alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>¡Error al intentar conectar con la Base de Datos!</strong> Pongase en contacto con el Administrador.<br>
						Mensaje de Error: '".mysqli_error($conexion_identidad)."'
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";

			//CorreoError("Login",mysqli_error($conexion),$sql);
		}

	}

?>