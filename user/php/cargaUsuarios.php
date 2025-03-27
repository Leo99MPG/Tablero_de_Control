<?php
	
	require_once '../../private/conec_identidad_secont.php';
	require_once '../../private/encriptador.php';

	require_once '../../private/config_identidad_secont.php';
	
	//require_once '../../../config_pae.php';

	//require_once '../../../private/config_constancias.php';

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		//	Array ( [option] => all )

		
		session_start();

		//$privilegio_oper = $_SESSION["const_Priv"];

		/*
		$sql = "SELECT * 
				FROM `usr_secont`
				WHERE `STATUS` <> 0 	 
					--AND `PRIVILEGIO` <='$privilegio_oper'
				ORDER BY `NOMBRE` DESC ";
		*/

		if( $_SESSION[PRIVILEGIO_APP] == PRIVILEGIO_SUPER_ADMIN )
			$sql = "SELECT *

					FROM `usr_secont` US

					LEFT JOIN `asignaciones` A
						ON A.`ID_USR_SECONT` = US.`ID_USR_SECONT`

					LEFT JOIN `usr_departamento` UD
						ON UD.`ID_USR_SECONT` = US.`ID_USR_SECONT`

					WHERE US.`STATUS` <> 0 
						AND ( UD.`ID_DEPTO` = '".ID_DEPARTAMENTO."' 
							OR A.`ID_APLICACION` IN ('255','".ID_APLICACION."') )

					ORDER BY US.`NOMBRE` DESC ";

		else if( $_SESSION[PRIVILEGIO_APP] == PRIVILEGIO_ADMINISTRADOR )
			$sql = "SELECT *

					FROM `usr_secont` US

					LEFT JOIN `asignaciones` A
						ON A.`ID_USR_SECONT` = US.`ID_USR_SECONT`

					LEFT JOIN `usr_departamento` UD
						ON UD.`ID_USR_SECONT` = US.`ID_USR_SECONT`

					WHERE US.`STATUS` <> 0 
						AND UD.`ID_DEPTO` = '".ID_DEPARTAMENTO."' 
						AND A.`ID_APLICACION` IN ('255','".ID_APLICACION."') 

					ORDER BY US.`NOMBRE` DESC ";


		//echo $sql."<br>";

		if( $result = mysqli_query($conexion_identidad,$sql) ){

			echo "<table id='tblUsers' class='display mx-2' style='width:100%'>
					<thead>
						<tr>
							<th><div class='text-center'>#</div></th>
							<th><div class='text-center'>Nombre</div></th>
							<th><div class='text-center'>Apellido Paterno</div></th>
							<th><div class='text-center'>Apellido Materno</div></th>
							<th><div class='text-center'>Correo Electrónico</div></th>
							<th><div class='text-center'>Privilegio</div></th>
							<th><div class='text-center'>Status</div></th>
							<th><div class='text-center'>Acciones</div></th>
						</tr>
					</thead>
					<tbody>";

			if( mysqli_num_rows($result) !=0 ){

				$contador = 1;

				while( $row = mysqli_fetch_assoc($result) ){

					$id_enc = JS_encriptaID($row['ID_USR_SECONT']);

					$nombre = $row["NOMBRE"];
					$aPaterno = $row["A_PATERNO"];
					$aMaterno = $row["A_MATERNO"];

					$eMail = $row["EMAIL"];

					$privilegios = muestraPrivilegios($row["ID_PRIVILEGIO"]);

					$status = muestraStatus($row["STATUS"]);

					$link = muestraOpciones($id_enc,$row["STATUS"],$row["ID_PRIVILEGIO"]);

					//$link_opciones = "<a href='#' title='Simular Pago'><i class='fas fa-dollar-sign text-danger'></i></a>";
					

					echo "	<tr>";
					echo "		<td align='center'>".$contador++."</td>";
					echo "		<td align='center'>$nombre</td>";
					echo "		<td align='center'>$aPaterno</td>"; 
					echo "		<td align='center'>$aMaterno</td>";
					echo "		<td align='center'>$eMail </td>";
					echo "		<td align='center'>$privilegios</td>";
					echo "		<td align='center'>$status</td>";
					echo "		<td align='center'>$link</td>";
					echo "	</tr>";


				}

			}

			echo "	</tbody>
				</table>\n
				</div>";

			//****************************************************************************
			//		SE PONE NUEVAMENTE EL CODIGO JS PARA QUE SE MUESTREN LOS CONTROLES.			
		    //****************************************************************************

			echo "<script>
				var t = $('#tblUsers').DataTable({

					//responsive: true,

					'order': [[ 1, 'asc']],

					//dom: 'Bfrtip',
					
        			//	buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        			//	buttons: ['print','excel', 'pdf'],

					/*buttons:[
						{
							extend: 'print',
							messageTop: 'This print was produced using the Print button for DataTables'
						}, 'excel','pdf'],*/

					columnDefs: [
						{ width: 200, targets: [1] },
						{ width: 100, targets: [2] },
						{ width: 100, targets: [3] },
						{ width: 250, targets: [4] }

					],
					
					'language': {
						
						'lengthMenu': 'Mostrar _MENU_ registros por página',
						'zeroRecords': 'No se Encontrarón Registros',
						'info': 'Página _PAGE_ de _PAGES_',
						'infoEmpty': 'Sin Registros Encontrados',
						'infoFiltered': '(filtrado de _MAX_ registros en total)',
						'paginate': {
							'first': 'Primero',
							'last': 'Último',
							'next': 'Siguiente',
							'previous': 'Anterior'
						},
						'decimal':        '.',
						'emptyTable':     'Sin Registros para Mostrar',
						'infoPostFix':    '',
						'thousands':      ',',
						'loadingRecords': 'CARGANDO REGISTROS...',
						'processing':     'PROCESANDO...',
						'search':         'Filtar:'

					}

				});

				t.on( 'order.dt search.dt', function () {
					t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					} );
				} ).draw();



			</script>";


		}

	}

	/*================================================
	=            FUNCTION 'muestraStatus'            =
	================================================*/
	
		function muestraStatus($status){

			if( $status == 0 )	return "<a href='#' class='text-danger' title='Eliminado'><strong>ELIMINADO</strong></div>";
			if( $status == 1 )	return "<a href='#' class='text-success' title='Activo'><strong>ACTIVO</strong></div>";
			if( $status == 2 )	return "<a href='#' class='text-info'title='Suspendido'><strong>SUSPENDIDO</strong></div>";

		}
	
	
	/*=====  End of FUNCTION 'muestraStatus'  ======*/
	


	/*=====================================================
	=            FUNCTION 'muestraPrivilegios'            =
	=====================================================*/
		
		function muestraPrivilegios($priv){

			if( $priv == 3 )			return "<h8 class='text-dark justify-content-center'  title='Capturista'><strong>CAPTURISTA</strong></h8>";
			else if( $priv == 6 )		return "<h8 class='text-success justify-content-center'  title='Administrador'><strong>ADMINISTRADOR</strong></h8>";
			else if( $priv == 9 ) 	return "<h8 class='text-danger justify-content-center' title='Super Admin'><strong>SU-ADMIN</strong></h8>";
			else return "FAIL";

		}
		
		/*=====  End of FUNCTION 'muestraPrivilegios'  ======*/


	/*==================================================
	=            FUNCTION 'muestraOpciones'            =
	==================================================*/
	
		function muestraOpciones($id_enc,$status,$priv){

			$answer = "";

			//	BORRADO LÓGICO
			if( $status == 0 ){
				//	ACTIVAR USUARIO
				//$answer .= "<i class='fa fa-check mx-2' aria-hidden='true'></i>";

			}
			//	ACTIVO
			else if( $status == 1 ){
				//	BORRAR USUARIO, SUSPENDER USUARIO
				//	CAMBIAR CONTRASEÑA, 
				$answer .= "<a href='#' title='Resetear Contraseña' class='text-info' onClick='editPassword($id_enc);'><i class='fa fa-key mx-1' aria-hidden='true'></i></a>";
				$answer .= "<a href='#' title='Suspender' class='text-warning' onClick='standByUser($id_enc);'><i class='fa fa-times mx-1' aria-hidden='true'></i></a>";
				$answer .= "<a href='#' title='Eliminar' class='text-danger' onClick='deleteUser($id_enc);'><i class='fa fa-trash mx-1' aria-hidden='true'></i></a>";


			}
			//	SUSPENDIDO
			else if( $status == 2 ){
				//	Activar
				$answer .= "<a href='#' title='Activar Usuario' class='text-success' onClick='activateUser($id_enc);'><i class='fa fa-check mx-2' aria-hidden='true'></i></a>";
			}

			return $answer;

		}
	
		/*=====  End of FUNCTION 'muestraOpciones'  ======*/
	
	
	

?>