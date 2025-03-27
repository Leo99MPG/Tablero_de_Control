$(document).ready(function(){


	/*==============================================================
	=            EVENTO CHANGE INPUT 'inputPasswordOld'            =
	==============================================================*/
	
		$("#inputPasswordOld").change(function(){

			habilitaBoton();

		});
	
		/*=====  End of EVENTO CHANGE INPUT 'inputPasswordOld'  ======*/

	/*==============================================================
	=            EVENTO CHANGE INPUT 'inputPasswordNew'            =
	==============================================================*/
	
		$("#inputPasswordNew").change(function(){

			habilitaBoton();
			
		});
	
		/*=====  End of EVENTO CHANGE INPUT 'inputPasswordNew'  ======*/

	/*==============================================================
	=            EVENTO CHANGE INPUT 'inputPasswordNew2'            =
	==============================================================*/
	
		$("#inputPasswordNew2").change(function(){

			habilitaBoton();
			
		});
	
		/*=====  End of EVENTO CHANGE INPUT 'inputPasswordNew2'  ======*/
	
	/*===============================================================
	=            EVENTO CLICK BUTTON 'btnChangePassword'            =
	===============================================================*/
		
		$("#btnChangePassword").click(function(){

			var msj  = 	'	<div class=\'col-10 alert alert-info alert-dismissible fade show\' role=\'alert\'>';
				msj += 	'		<strong>¡Estamos procesando su solicitud!</strong> Por favor espere...';
				msj += 	'		<button type=\'button\' class=\'btn-close\' data-bs-dismiss=\'alert\' aria-label=\'Close\'>';
				msj +=  '			<span aria-hidden=\'true\'>&times;</span>';
				msj += 	'		</button>';
				msj += 	'	</div>';

			$('#answer').html(msj);


			$.post(
				'php/personalizaPassword.php',
				{
					now: $("#inputPasswordOld").val(),
					future: $("#inputPasswordNew").val(),
					future2: $("#inputPasswordNew2").val(),
				},
				function(output){
					$("#answer").html(output);
				}
			);

		});
	
	
		/*=====  End of EVENTO CLICK BUTTON 'btnChangePassword'  ======*/
	


});

	/*================================================
	=            FUNCTION 'habilitaBoton'            =
	================================================*/

		function habilitaBoton(){

			$('#answer').html("");

			$("#btnChangePassword").attr('disabled',true);

			if( $("#inputPasswordOld").val() == "" )	return false;
			else if( $("#inputPasswordNew").val() == "" )	return false;
			else if( $("#inputPasswordNew2").val() == "" )	return false;

			if( $("#inputPasswordNew").val().length < 6 ){

				var msj  = 	'	<div class=\'col-10 alert alert-danger alert-dismissible fade show\' role=\'alert\'>';
					msj += 	'		<strong>¡La Contraseña debe contener al menos 6 caracteres!</strong>';
					msj += 	'		<button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'>';
					msj +=  '			<span aria-hidden=\'true\'>&times;</span>';
					msj += 	'		</button>';
					msj += 	'	</div>';

				$('#answer').html(msj);

				return false;

			}
			else if( $("#inputPasswordNew").val() != $("#inputPasswordNew2").val() ){

				var msj  = 	'	<div class=\'col-10 alert alert-danger alert-dismissible fade show\' role=\'alert\'>';
					msj += 	'		<strong>¡La "Nueva Contraseña" y la "Confirmación de la Nueva Contraseña" no concuerdan!</strong>';
					msj += 	'		<button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'>';
					msj +=  '			<span aria-hidden=\'true\'>&times;</span>';
					msj += 	'		</button>';
					msj += 	'	</div>';

				$('#answer').html(msj);

				return false;

			}
			else if( $("#inputPasswordNew").val() == $("#inputPasswordOld").val() ){

				var msj  = 	'	<div class=\'col-10 alert alert-danger alert-dismissible fade show\' role=\'alert\'>';
					msj += 	'		<strong>¡La "Nueva Contraseña" y la "Actual Contraseña" no pueden ser iguales!</strong>';
					msj += 	'		<button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'>';
					msj +=  '			<span aria-hidden=\'true\'>&times;</span>';
					msj += 	'		</button>';
					msj += 	'	</div>';

				$('#answer').html(msj);

				return false;

			}

			$("#btnChangePassword").removeAttr('disabled');

		}


		/*=====  End of FUNCTION 'habilitaBoton'  ======*/
