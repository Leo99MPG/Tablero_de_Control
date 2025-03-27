
/* ESTE CODIGO JS CONTINE LOS SCRIPTS DE LOS MODALES DE ELIMINAR Y MODIFICAR DATOS
 */

/* EL AJAX DENTRO DEL SCRIPT SE UTILIZA PARA FUNCIONAR EL MODAL_DROPDOWN */
function getfetch(val) {
    $.ajax({
        type: "POST",
        url: "funciones_fetch/fetch.php",
        data: 'dep_id=' + val,
        success: function(data) {
            $("#dependencia").html(data);
        }
    });
}


$(document).ready(function() {

    /* ######SCRIPT PARA RELACIONAR LOS DOS DROPDOWNS DENTRO DEL MODAL_DROPDOWN##### */
    $('#EvaluacionModal').on('shown.bs.modal', function() {
        let selectedValue = $('#tipo_dependencia').val();
        if (selectedValue) {
            getfetch(selectedValue);
        }
    });

    /* ######SCRIPT QUE CONTIENE EL CÓDIGO DEL MODAL DE ELIMINAR DATOS####### */
    /* deletebtn hace referencia a la clase del icono de eliminar registros */
    $('.deletebtn').on('click', function() {
        $('#DeleteModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        /* La id delete_id corresponde a la id del form en el modal de eliminar datos */
        $('#delete_id').val(data[0]);
    });


    /* ######SCRIPT QUE CONTIENE EL CÓDIGO DEL MODAL DE MODIFICACIÓN DE DATOS DATOS####### */
    /* editbtn hace referencia a la clase del icono de modificar registros */
    $('.editbtn').on('click', function() {
        $('#EditModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        /* La id update_id corresponde a la input dentro del form del modal de modificar_datos */
        $('#update_id').val(data[0]);
        $('#edit_entidad').val(data[1]);
        $('#edit_periodo').val(data[2]);
        $('#edit_presidente').val(data[3]);
        $('#edit_cumplimiento').val(data[4]);
        $('#edit_desempeño').val(data[5]);
        $('#edit_calificacion').val(data[6]);

    })

});