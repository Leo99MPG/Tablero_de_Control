<?php
include_once "../private/conec_tableroCumplimiento.php";

//EDITAR LA DATA DE UNA ACTIVIDAD
if (isset($_POST['editTablero'])) {

//El post de los variable son los nombres de los campos del select en el modal_editarTablero.php
//Por ejemplo, editActividad es el nombre del campo en el modal_editarTablero.php
    $id = $_POST['updateID'];
    $actividad = $_POST['editActividad'];
    $accion = $_POST['editDocumento'];
    $fechaLimite = $_POST['editFecha'];
    $limiteSecont = $_POST['editSecont'];
    $puntos = $_POST['editPuntos'];



    $query = "UPDATE `actividad_cumplimiento` SET DESCRIPCION_ACTIVIDAD='$actividad', DOCUMENTO_ACCION='$accion', FECHA_LIMITE_CUMPLIMIENTO='$fechaLimite', FECHA_LIMITE_ENTREGA_SECONT='$limiteSecont', PUNTO_MAXIMOS='$puntos' WHERE ID_ACTIVIDAD_CUMP='$id'  ";

    $resultado = mysqli_query($conexion_tablero, $query);

    if ($resultado) {
        echo '<script> alert("Evaluación editada con exito"); </script>';
        header("Location:../tableroCumplimiento.php");
    } else {
        echo '<script> alert("Evaluación no se pudo editar"); </script>';
        header("Location:../tableroCumplimiento.php");
    }
}
?>