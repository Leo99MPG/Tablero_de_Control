<?php

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		//	Array ( [user] => gwlbrn )

		//require_once 'private/conec_const_inhabilitacion.php';

		$idUser = $_POST["user"];


		echo "	<div class='modal' id='modalStandByUser' tabindex='-1' role='dialog'>
					<div class='modal-dialog modal-dialog-centered' role='document'>
						<div class='modal-content'>
							<div class='modal-header alert-warning border-warning'>
								<h5 class='modal-title'>Suspender Usuario</h5>
								<button type='button' class='btn-close text-warning' data-bs-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body alert-warning'>
								<input type='hidden' id='user' value='$idUser'>
								<div class='row justify-content-center my-2' id='answerModal'></div>
								<p>Esta opción suspenderá al usuario de forma temporal, y se podrá activar cuando así se requiera.</p>
								<p><strong>¿Esta seguro que desea suspender al usuario?</strong></p>

								<hr>
								<div class='row justify-content-end mx-2'>
									<button type='button' class='col-2 btn btn-secondary mx-1' data-bs-dismiss='modal'><strong>Cerrar</strong></button>
									<button type='button' class='col-3 btn btn-outline-danger mx-1' id='btnReestablecerPassword'><strong>Suspender</strong></button>
								</div>
							</div>
						</div>
					</div>
				</div>";

		echo "	<script>

					/*====================================================================
					=            EVENTO CLICK BOTÓN 'btnReestablecerPassword'            =
					====================================================================*/
					
						$('#btnReestablecerPassword').click(function(){
							
							//alert('entro');

							$.post(
								'php/standByUser.php',
								{
									idUser: $('#user').val(),
								},
								function(output){
									$('#answerModal').html(output);
								}

							);

						});
					
						/*=====  End of EVENTO CLICK BOTÓN 'btnReestablecerPassword'  ======*/
					

					$('#modalStandByUser').modal('show');

				</script>	";



	}