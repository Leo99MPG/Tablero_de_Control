$(document).ready(function(){

    $('#myTable').DataTable();

    consultarEntes();

    //alert("habilitado jquery 2");
    $("#btnNuevoEval").click(function(){
        //alert("click al boton Nueva evaluación");
        $.post(
            'php/modalNuevaEvaluacion.php',
            {
                token1: "token_tres",
                token2: "token_cuatro"
            },
            function(output){
                $("#answer").html(output);
            }
        );
    });

});

//----------------------------------------------

    function consultarEntes(){

        $.post(
            'php/muestraEntesPublicos.php',
            {
                token: "asdad"
            },
            function(output){
                $("#selectEntePublico").html(output)
            }
        )

    }

