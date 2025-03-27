<?php

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		//	Array ( [user] => gwlbrn )

		//require_once 'private/conec_const_inhabilitacion.php';

		$idUser = $_POST["user"];


		echo "	<div class='modal' id='modalResetPassword' tabindex='-1' role='dialog'>
					<div class='modal-dialog modal-dialog-centered' role='document'>
						<div class='modal-content'>
							<div class='modal-header alert-info border-info'>
								<h5 class='modal-title'>Reestablecer Contraseña</h5>
								<button type='button' class='btn-close text-info' data-bs-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body alert-info'>
								<input type='hidden' id='user' value='$idUser'>
								<div class='row justify-content-center my-2' id='answerModal'></div>
								<p>Esta opción asignará una contraseña de forma aleatoría la cual será enviada al usuario vía correo electrónico.</p>
								<p><strong>¿Esta seguro que desea reestablecer la contraseña?</strong></p>
								<hr>
								<div class='row justify-content-end mx-2'>
									<button type='button' class='col-3 btn btn-secondary mx-1 text-center' data-bs-dismiss='modal'><strong>Cancelar</strong></button>
									<button type='button' class='col-4 btn btn-outline-success mx-1 text-center' id='btnReestablecerPassword'><strong>Reestablecer</strong></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			";

		echo "	<script>

					/*====================================================================
					=            EVENTO CLICK BOTÓN 'btnReestablecerPassword'            =
					====================================================================*/
					
						$('#btnReestablecerPassword').click(function(){
							
							var msj  = 	'	<div class=\'col-10 alert alert-success alert-dismissible fade show\' role=\'alert\'>';
								msj += 	'		<strong>¡Estamos procesando su solicitud!</strong> Por favor espere...';
								msj += 	'		<button type=\'button\' class=\'btn-close\' data-bs-dismiss=\'alert\' aria-label=\'Close\'>';
								msj +=  '			<span aria-hidden=\'true\'>&times;</span>';
								msj += 	'		</button>';
								msj += 	'	</div>';

							$('#answerModal').html(msj);

							$.post(
								'php/resetPassword.php',
								{
									idUser: $('#user').val(),
								},
								function(output){
									$('#answerModal').html(output);
								}

							);

						});
					
						/*=====  End of EVENTO CLICK BOTÓN 'btnReestablecerPassword'  ======*/
					

					$('#modalResetPassword').modal('show');

				</script>	";



	}