<?php
include "../private/conec_tableroCumplimiento.php";

if(isset($_POST['guardarActividad'])){

    //Las variables son los nombres de los campos del modal_nuevaActividad.php
    //Por ejemplo, NewActivity es el nombre del campo en el modal_nuevaActividad.php

    $DESCRIPCION_ACTIVIDAD = $_POST['NewActivity'];
    $DOCUMENTO_ACCION = $_POST['actividadArea'];
    $FECHA_LIMITE_CUMPLIMIENTO = $_POST['fechaCumplimiento'];
    $FECHA_LIMITE_ENTREGA_SECONT = $_POST['fechaEntrega'];
    $PUNTO_MAXIMOS = $_POST['NewPuntos'];
    

    $query = "INSERT INTO `actividad_cumplimiento` (`DESCRIPCION_ACTIVIDAD`, `DOCUMENTO_ACCION`, `FECHA_LIMITE_CUMPLIMIENTO`, `FECHA_LIMITE_ENTREGA_SECONT`, `PUNTO_MAXIMOS`) VALUES ('$DESCRIPCION_ACTIVIDAD', '$DOCUMENTO_ACCION', '$FECHA_LIMITE_CUMPLIMIENTO ', '$FECHA_LIMITE_ENTREGA_SECONT', '$PUNTO_MAXIMOS')";

    $resultado = mysqli_query($conexion_tablero, $query);
    if ($resultado) {
        echo "Actividad guardada correctamente.";
        header("Location:../tableroCumplimiento.php");
    } else {
       echo "Error al guardar la actividad: " . mysqli_error($conexion_tablero);
        header("Location:../tableroCumplimiento.php");
    }

}

?>

