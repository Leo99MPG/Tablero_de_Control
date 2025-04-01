$(document).ready(function () {

    $('#btn_editTab').click(function () {
        $('#modal_editTablero').modal('show');
        $trT = $(this).closest('tr#tableroRow');
        var dataT = $trT.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(dataT);
        /* La id update_id corresponde a la input dentro del form del modal de modificar_datos */
        $('#updateID').val(dataT[0]);
        $('#editActividad').val(dataT[1]);
        $('#editDocumento').val(dataT[2]);
        $('#editFecha').val(dataT[3]);
        $('#editSecont').val(dataT[4]);
        $('#editPuntos').val(dataT[5]);
    });


    //ESCONDER LOS BOTONES DE ACTIVIDAD Y PERIODO
    $("#tableroPeriodo").on('change', function () {
        if ($(this).val() == "0")
            $("#btnActividad").attr('hidden', true),
                $("#btnPeriodo").attr('hidden', false)
        else
            $("#btnPeriodo").attr('hidden', true),
                $("#btnActividad").attr('hidden', false)
    });

    //MOSTRAR MODAL AL PRESIONAR NUEVO PERIODO
    $("#btnPeriodo").on('click', function () {
        $("#modalPeriodo").modal('show');
    });



    //MOSTRAR EL MODAL DE NUEVA ACTIVIDAD
    $("#btnActividad").on('click', function () {
        $("#modalActividad").modal('show');
        $('#form_actividad').trigger("reset"); // Resetear el formulario
        $('#advertencia').text("").removeClass("justify-content-center text-center bg-danger-subtle bg-success-subtle");
    });





    //Realizar el envio del formulario de nueva actividad a la base de datos
    $('#btn-guardarActividad').on('click', function () {
        var DESCRIPCION_ACTIVIDAD = $('#NewActivity').val();
        var DOCUMENTO_ACCION = $('#actividadArea').val();
        var FECHA_LIMITE_CUMPLIMIENTO = $('#fechaCumplimiento').val();
        var FECHA_LIMITE_ENTREGA_SECONT = $('#fechaEntrega').val();
        var PUNTO_MAXIMOS = $('#NewPuntos').val();
        

        $.ajax({
            url: 'funciones_fetch/fetch_nuevaActividad.php',
            type: 'POST',
            data: {
                DESCRIPCION_ACTIVIDAD: DESCRIPCION_ACTIVIDAD,
                DOCUMENTO_ACCION: DOCUMENTO_ACCION,
                FECHA_LIMITE_CUMPLIMIENTO: FECHA_LIMITE_CUMPLIMIENTO,
                FECHA_LIMITE_ENTREGA_SECONT: FECHA_LIMITE_ENTREGA_SECONT,
                PUNTO_MAXIMOS: PUNTO_MAXIMOS
            },
            success: function (response) {
                console.log(response.status);
                // Aquí puedes manejar la respuesta del servidor
                // Por ejemplo, puedes mostrar un mensaje de éxito o error
                // dependiendo del valor de response
                // Puedes usar una alerta o mostrar un mensaje en el modal 
                if (response == 200) {
                    $('#advertencia').text("Actividad registrada correctamente").addClass("justify-content-center text-center bg-success-subtle").removeClass("bg-danger-subtle");
                    setTimeout(function () {
                        $('#modalActividad').modal('hide');
                        $('#advertencia').text("").removeClass("justify-content-center text-center bg-danger-subtle bg-success-subtle");
                    }, 2000);
                } else {
                    $('#advertencia').text("Error al registrar la actividad").addClass("justify-content-center text-center bg-danger-subtle").removeClass("bg-success-subtle");
                }
            },
        });
    });


    $("#btnActividad").attr('hidden', true);

});




