$(document).ready(function(){

	//alert("entro");

	/*========================================================
	=            EVENTO CLICK BUTTON 'btnNewUser'            =
	========================================================*/
	
		$('#btnNewUser').click(function(){

			$.post(
				'php/modalNewUser.php',
				{
					option: "newUser",
				},
				function(output){
					$("#answer").html(output);
				}
			);

		})
	
		/*=====  End of EVENTO CLICK BUTTON 'btnNewUser'  ======*/

	cargaTablaUsuarios();


});		//	FIN DE... $(document).ready()

/*===============================================
=            FUNCTION 'deleteUser'            =
===============================================*/

	function deleteUser(idUser){

		$.post(
			'php/modalDeleteUser.php',
			{
				user: idUser,
			},
			function(output){
				$("#answer").html(output);
			}
		);

	}

	/*=====  End of FUNCTION 'deleteUser'  ======*/

/*===============================================
=            FUNCTION 'activateUser'            =
===============================================*/

	function activateUser(idUser){

		$.post(
			'php/modalActivateUser.php',
			{
				user: idUser,
			},
			function(output){
				$("#answer").html(output);
			}
		);

	}

	/*=====  End of FUNCTION 'activateUser'  ======*/


/*===============================================
=            FUNCTION 'editPassword'            =
===============================================*/

	function standByUser(idUser){

		$.post(
			'php/modalStandByUser.php',
			{
				user: idUser,
			},
			function(output){
				$("#answer").html(output);
			}
		);

	}

	/*=====  End of FUNCTION 'editPassword'  ======*/


/*===============================================
=            FUNCTION 'editPassword'            =
===============================================*/

	function editPassword(idUser){

		$.post(
			'php/modalEditPassword.php',
			{
				user: idUser,
			},
			function(output){
				$("#answer").html(output);
			}
		);

	}

	/*=====  End of FUNCTION 'editPassword'  ======*/



/*=====================================================
=            FUNCTION 'cargaTablaUsuarios'            =
=====================================================*/

	function cargaTablaUsuarios(){
		$.post(
			'php/cargaUsuarios.php',
			{
				option: "all",
			},
			function(output){
				$("#tblUsuarios").html(output);
			}
		);

	}

	/*=====  End of FUNCTION 'cargaTablaUsuarios'  ======*/

