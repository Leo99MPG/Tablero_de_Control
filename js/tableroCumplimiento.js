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


    //MOSTRAR MODAL DE NUEVA EVALACION AL PRESIONAR EL BOTON DE NUEVA EVALUACION
    $("#btnActividad").on('click', function () {
        $("#modalActividad").modal('show');
    });

    $("#btnActividad").attr('hidden', true);
});