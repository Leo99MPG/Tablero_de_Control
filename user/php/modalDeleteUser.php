<?php

	if( $_POST ){

		//	print_r($_POST);
		//	die();
		//	Array ( [user] => gwlbrn )

		//require_once 'private/conec_const_inhabilitacion.php';

		$idUser = $_POST["user"];


		echo "	<div class='modal' id='modalDeleteUser' tabindex='-1' role='dialog'>
					<div class='modal-dialog modal-dialog-centered' role='document'>
						<div class='modal-content'>
							<div class='modal-header alert-danger border-danger'>
								<h5 class='modal-title'>Eliminar Usuario</h5> Usuario</h5>
								<button type='button' class='btn-close text-danger' data-bs-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
								</button>
							</div>
							<div class='modal-body alert-danger'>
								<input type='hidden' id='user' value='$idUser'>
								<div class='row justify-content-center my-2' id='answerModal'></div>
								<p>Esta opción eliminará al usuario de forma definitiva del sistema.</p>
								<p><strong>¿Esta seguro que desea ELIMINAR al usuario?</strong></p>

								<hr>
								<div class='row justify-content-end mx-2'>
								<button type='button' class='col-2 btn btn-secondary mx-1' data-bs-dismiss='modal'><strong>Cerrar</strong></button>
									<button type='button' class='col-3 btn btn-outline-danger mx-1' id='btnDeleteUser'><strong>Eliminar</strong></button>
								</div>
							</div>
						</div>
					</div>
				</div>";

		echo "	<script>

					/*==========================================================
					=            EVENTO CLICK BOTÓN 'btnDeleteUser'            =
					==========================================================*/
					
						$('#btnDeleteUser').click(function(){
							
							//alert('entro');

							$.post(
								'php/deleteUser.php',
								{
									idUser: $('#user').val(),
								},
								function(output){
									$('#answerModal').html(output);
								}

							);

						});
					
						/*=====  End of EVENTO CLICK BOTÓN 'btnDeleteUser'  ======*/
					

					$('#modalDeleteUser').modal('show');

				</script>	";



	}