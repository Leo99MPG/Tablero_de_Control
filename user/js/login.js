$(document).ready(function(){

	$("#btn-ingresar").click(function(){

		//alert("entro!");

		$("#Respuesta").hide();
		

		$.post(		
			'user/php/loginUser.php',
			{
				Usuario: $("#usuario-input").val(),
				Contra: $("#contrasena-input").val()
			}, 
			function (output){
				$('#Respuesta').html(output).fadeIn(1000);
			}
		);	

	});

});
