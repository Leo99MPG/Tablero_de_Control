<?php

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		//	Array ( [user] => gwlbrn )

		//require_once 'private/conec_const_inhabilitacion.php';

		$idUser = $_POST["user"];

		echo "	<div class='modal' id='modalActivateUser' tabindex='-1' role='dialog'>
					<div class='modal-dialog modal-dialog-centered' role='document'>
						<div class='modal-content'>
							<div class='modal-header alert-success border-success'>
								<h5 class='modal-title'>Activar Usuario</h5>
								<button type='button' class='btn-close text-success' data-bs-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body alert-success'>
								<input type='hidden' id='user' value='$idUser'>
								<div class='row justify-content-center my-2' id='answerModal'></div>
								<p><strong>¿Esta seguro que desea activar al usuario?</strong></p>

								<hr>
								<div class='row justify-content-end mx-2'>
									<button type='button' class='col-2 btn btn-secondary mx-1' data-bs-dismiss='modal'><strong>Cerrar</strong></button>
									<button type='button' class='col-4 btn btn-outline-success mx-1' id='btnActivateUser'><strong>Activar Usuario</strong></button>
								</div>
							</div>
						</div>
					</div>
				</div>";

		echo "	<script>

					/*====================================================================
					=            EVENTO CLICK BOTÓN 'btnReestablecerPassword'            =
					====================================================================*/
					
						$('#btnActivateUser').click(function(){
							
							//alert('entro');

							$.post(
								'php/activateUser.php',
								{
									idUser: $('#user').val(),
								},
								function(output){
									$('#answerModal').html(output);
								}

							);

						});
					
						/*=====  End of EVENTO CLICK BOTÓN 'btnReestablecerPassword'  ======*/
					

					$('#modalActivateUser').modal('show');

				</script>	";



	}