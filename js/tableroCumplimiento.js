
$(document).ready(function () {

    //////////////////////ESCONDER LOS BOTONES DE ACTIVIDAD Y PERIODO//////////////////////
    $("#tableroPeriodo").on('change', function () {
        if ($(this).val() == "0")
            $("#btnActividad").attr('hidden', true),
                $("#btnPeriodo").attr('hidden', false)
        else
            $("#btnPeriodo").attr('hidden', true),
                $("#btnActividad").attr('hidden', false)
    });

    //////////////////////MOSTRAR MODAL AL PRESIONAR NUEVO PERIODO//////////////////////
    $("#btnPeriodo").on('click', function () {
        $("#modalPeriodo").modal('show');
    });

    
    //////////////////////MOSTRAR MODAL PARA EDITAR LOS DATOS DE UNA ACTIVIDAD//////////////////////
    $('.btn_editTab').click(function (e) {
        e.preventDefault();
        $('#modal_editTablero').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        /* La id update_id corresponde a la input dentro del form del modal de modificar_datos */
        $('#updateID').val(data[0]);
        $('#editActividad').val(data[1]);
        $('#editDocumento').val(data[2]);
        $('#editFecha').val(data[3]);
        $('#editSecont').val(data[4]);
        $('#editPuntos').val(data[5]);
    });



    //////////////////////MOSTRAR MODAL PARA ELIMINAR TABLERO//////////////////////
    $('.eliminarTab').click(function () {
        
        $('#deleteTablero').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        /* La id delete_id corresponde a la input dentro del form del modal de modificar_datos */
        $('#delete_actividad').val(data[0]);
    });
    
    



    ////////////////////////REALIZAR EL CAMBIO DE PERIODO MEDIANTE EL BOTON NUEVO PERIODO//////////////////////
    $('#btn-Guardar').on('click', function () {
        var periodo = $('#modal_nuevoPeriodo').val();
        $('#modalPeriodo').modal('hide');
        $('#tableroPeriodo').val(periodo);
        $('#btnActividad').attr('hidden', false);
        $('#btnPeriodo').attr('hidden', true);

    });

    ////////////////////////USAR EL DROPDOWN COMO UN FILTRO//////////////////////
    $('#tableroPeriodo').on('change', function () {
        // Obtener el valor seleccionado del dropdown
        var value = $(this).val();
        // Realizar una solicitud AJAX para obtener los datos filtrados
        $.ajax({
            url: 'funciones_fetch/fetch_filtroTablero.php',
            type: 'POST',
            data: 'request=' + value,
            success: function (data) {
                $('#myTable').html(data);
            },
        });
    });

   
    
    //////////////////////MOSTRAR EL MODAL DE NUEVA ACTIVIDAD//////////////////////
    $("#btnActividad").on('click', function () {
        $("#modalActividad").modal('show');
        $('#form_actividad').trigger("reset"); // Resetear el formulario
        $('#advertencia').text("").removeClass("justify-content-center text-center bg-danger-subtle bg-success-subtle");
    });



    //////////////////////INSERTAR NUEVA ACTIVIDAD EN LA BASE DE DATOS//////////////////////
    $('#saveActivity').on('click', function () {
        var ID_PERIODO_TABLERO_CUMP = $('#tableroPeriodo').val();
        var DESCRIPCION_ACTIVIDAD = $('#NewActivity').val();
        var DOCUMENTO_ACCION = $('#actividadArea').val();
        var FECHA_LIMITE_CUMPLIMIENTO = $('#fechaCumplimiento').val();
        var FECHA_LIMITE_ENTREGA_SECONT = $('#fechaEntrega').val();
        var PUNTO_MAXIMOS = $('#NewPuntos').val();
        var data_form = "request=" + ID_PERIODO_TABLERO_CUMP + "&DESCRIPCION_ACTIVIDAD=" + DESCRIPCION_ACTIVIDAD + "&DOCUMENTO_ACCION=" + DOCUMENTO_ACCION + "&FECHA_LIMITE_CUMPLIMIENTO=" + FECHA_LIMITE_CUMPLIMIENTO + "&FECHA_LIMITE_ENTREGA_SECONT=" + FECHA_LIMITE_ENTREGA_SECONT + "&PUNTO_MAXIMOS=" + PUNTO_MAXIMOS;

        $.ajax({
            type: 'POST',
            url: 'funciones_fetch/fetch_nuevaActividad.php',
            data: data_form,
            success: function () {
                // Aquí puedes manejar la respuesta del servidor
                // Por ejemplo, puedes mostrar un mensaje de éxito o error
                // dependiendo del valor de response
                // Puedes usar una alerta o mostrar un mensaje en el modal 
                $('#advertencia').text("Actividad registrada correctamente").addClass("justify-content-center text-center bg-success-subtle").removeClass("bg-danger-subtle");
                    setTimeout(function () {
                        $('#modalActividad').modal('hide');
                        $('#advertencia').text("").removeClass("justify-content-center text-center bg-danger-subtle bg-success-subtle");
                    }, 2000);
            },
            error: function(){
                
                $('#advertencia').text("Error al registrar la actividad").addClass("justify-content-center text-center bg-danger-subtle").removeClass("bg-success-subtle");
                setTimeout(function () {
                    
                    $('#modalActividad').modal('hide');
                    $('#advertencia').text("").removeClass("justify-content-center text-center bg-danger-subtle bg-success-subtle");
                }, 2000);
            }
        });
    });

    
    
    
    ////////////////////////ESCONDER EL BOTON DE NUEVA ACTIVIDAD//////////////////////
    $("#btnActividad").attr('hidden', true);

});


