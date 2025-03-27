<?php

	

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		//	Array ( [option] => newUser )

		require_once '../../private/encriptador.php';
		require_once '../../private/conec_identidad_secont.php';
		require_once '../../private/config_identidad_secont.php';
		

		echo "	<div class='modal fade' id='modalNewUser' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog modal-lg' role='document'>
						<div class='modal-content'>
							<div class='modal-header'>
								<h5 class='modal-title' id='exampleModalLabel'>Nuevo Usuario</h5>
								<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
							</div>
							<div class='modal-body'>
								<div class='row justify-content-center' id='answerModal'></div>
								<div class='form-group row my-2'>
									<label for='inputNombre' class='col-sm-3 col-form-label text-right text-end'>Nombre(s):</label>
									<div class='col-sm-8'>
										<input type='text' class='form-control' id='inputNombre' placeholder='Nombre(s)' autocomplete='off'>
									</div>
								</div>
								<div class='form-group row my-2'>
									<label for='inputAPaterno' class='col-sm-3 col-form-label text-end'>Apellido Paterno:</label>
									<div class='col-sm-8'>
										<input type='text' class='form-control' id='inputAPaterno' placeholder='Apellido Paterno' autocomplete='off'>
									</div>
								</div>
								<div class='form-group row my-2'>
									<label for='inputAMaterno' class='col-sm-3 col-form-label text-end'>Apellido Materno:</label>
									<div class='col-sm-8'>
										<input type='text' class='form-control' id='inputAMaterno' placeholder='Apellido Materno' autocomplete='off'>
									</div>
								</div>
								<div class='form-group row my-2'>
									<label for='inputEmail' class='col-sm-3 col-form-label text-end'>Correo Electrónico:</label>
									<div class='col-sm-8'>
										<input type='email' class='form-control' id='inputEmail' placeholder='Correo Electrónico' autocomplete='off'>
									</div>
								</div>
								<div class='form-group row my-2'>
									<label for='selectDepto' class='col-sm-3 col-form-label text-end'>Departamento:</label>
									<div class='col-sm-8'>
										<select class='form-control' id='selectDepto'>
											".showDepartamentos($conexion_identidad,ID_DEPARTAMENTO)."
										</select>
									</div>
								</div>
								<div class='form-group row my-2'>
									<label for='selectPerfil' class='col-sm-3 col-form-label text-end'>Perfil:</label>
									<div class='col-sm-8'>
										<select class='form-control' id='selectPerfil'>
											<option value='".php_encriptaID(PRIVILEGIO_CAPTURISTA)."' selected>CAPTURISTA</option>
											<option value='".php_encriptaID(PRIVILEGIO_ADMINISTRADOR)."'>ADMINISTRADOR</option>
										</select>
									</div>
								</div>
							</div>
							<div class='modal-footer'>
								<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'><strong>Cancelar</stromg></button>
								<button type='button' class='btn btn-outline-success' id='btnAddUser' disabled><strong>Agregar Usuarios</strong></button>
							</div>
						</div>
					</div>
				</div>";

		echo "	<script>

					/*========================================================
					=            EVENTO CHANGE SELECT 'selectDepto'            =
					========================================================*/
					
						$('#selectDepto').change(function(){

							enabledBtnAddUser();

						});
					
						/*=====  End of EVENTO KEYUP INPUT 'selectDepto'  ======*/	

					/*========================================================
					=            EVENTO CHANGE SELECT 'selectPerfil'            =
					========================================================*/
					
						$('#selectPerfil').change(function(){

							enabledBtnAddUser();

						});
					
						/*=====  End of EVENTO KEYUP INPUT 'selectPerfil'  ======*/	

					/*========================================================
					=            function 'enabledBtnAddUser'          		=
					========================================================*/
					
						function enabledBtnAddUser(){

							$('#btnAddUser').attr('disabled',true);

							if( $('#inputNombre').val() == '' || $('#inputNombre').val().length < 3 )		return false;
							if( $('#inputAPaterno').val().length < 3 )		return false;
							if( $('#inputAMaterno').val().length < 3 )		return false;
							if( $('#inputEmail').val().length < 3 )		return false;

							if( $('#selectDepto').val() == '' )		return false;
							if( $('#selectPerfil').val() == '' )		return false;

							$('#btnAddUser').removeAttr('disabled');

						}
					
						/*=====  End of EVENTO KEYUP INPUT 'enabledBtnAddUser'  ======*/	

					/*========================================================
					=            EVENTO KEYUP INPUT 'inputNombre'            =
					========================================================*/
					
						$('#inputNombre').keyup(function(){
							
							var cadena = $(this).val();
							$(this).val(cadena.toUpperCase());

							enabledBtnAddUser();

						});
					
						/*=====  End of EVENTO KEYUP INPUT 'inputNombre'  ======*/	
					
					/*==========================================================
					=            EVENTO KEYUP INPUT 'inputAPaterno'            =
					==========================================================*/
					
						$('#inputAPaterno').keyup(function(){
							
							var cadena = $(this).val();
							$(this).val(cadena.toUpperCase());

							enabledBtnAddUser();

						});
					
						/*=====  End of EVENTO KEYUP INPUT 'inputAPaterno'  ======*/	

					/*==========================================================
					=            EVENTO KEYUP INPUT 'inputAMaterno'            =
					==========================================================*/
					
						$('#inputAMaterno').keyup(function(){
							
							var cadena = $(this).val();
							$(this).val(cadena.toUpperCase());

							enabledBtnAddUser();

						});
					
						/*=====  End of EVENTO KEYUP INPUT 'inputAMaterno'  ======*/

					/*=======================================================
					=            EVENTO KEYUP INPUT 'inputEmail'            =
					=======================================================*/
					
						$('#inputEmail').keyup(function(){
							
							var cadena = $(this).val();
							$(this).val(cadena.toLowerCase());

							enabledBtnAddUser();

						});
					
						/*=====  End of EVENTO KEYUP INPUT 'inputEmail'  ======*/
					

					/*========================================================
					=            EVENTO CLICK BUTTON 'btnAddUser'            =
					========================================================*/
					
						$('#btnAddUser').click(function(){
							
							var msj  = 	'	<div class=\'col-10 alert alert-success alert-dismissible fade show\' role=\'alert\'>';
								msj += 	'		<strong>¡Estamos procesando su solicitud!</strong> Por favor espere...';
								msj += 	'		<button type=\'button\' class=\'btn-close\' data-bs-dismiss=\'alert\' aria-label=\'Close\'>';
								msj +=  '			<span aria-hidden=\'true\'>&times;</span>';
								msj += 	'		</button>';
								msj += 	'	</div>';

							$('#answerModal').html(msj);

							$.post(
								'php/newUser.php',
								{
									nombre: $('#inputNombre').val(),
									aPaterno: $('#inputAPaterno').val(),
									aMaterno: $('#inputAMaterno').val(),
									email: $('#inputEmail').val(),
									depto: $('#selectDepto').val(),
									perfil: $('#selectPerfil').val()
								},
								function(output){
									$('#answerModal').html(output);
								}

							);

						});
					
						/*=====  End of EVENTO CLICK BUTTON 'btnAddUser'  ======*/
					
					
					$('#modalNewUser').modal('show');

				</script>";

	}

	//-------------------------------------------------------------------

	function showDepartamentos($conexion,$idDepto){

		if( $idDepto == "0" )
			$sql = "SELECT * 
				FROM `cat_departamento` 
				WHERE `ACTIVO` = '1'";

		else
			$sql = "SELECT * 
					FROM `cat_departamento` 
					WHERE `ID_DEPTO` IN ($idDepto)
						AND `ACTIVO` = '1'
				"; 

		//return $sql;

		$answer = "";

		if( $result = mysqli_query($conexion,$sql) ){

			if( mysqli_num_rows($result) != 0 ){

				if( mysqli_num_rows($result) != 1 )
					$answer .= "<option value=''>Selecciona Departamento...</option>\n";

				while( $row = mysqli_fetch_assoc($result) )
					$answer .= "<option value='".php_encriptaID($row["ID_DEPTO"])."'>".$row["NOMBRE_DEPTO"]."</option>\n";

			}
		
		}

		return $answer;

	}