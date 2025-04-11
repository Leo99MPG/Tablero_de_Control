<?php
include "../private/conec_tableroCumplimiento.php";



//Las variables son los nombres de los campos del modal_nuevaActividad.php
//Por ejemplo, NewActivity es el nombre del campo en el modal_nuevaActividad.php
if (isset($_POST['saveActivity'])) {
    $ID_PERIODO_TABLERO_CUMP = $_POST['ID_PERIODO_TABLERO_CUMP'];
    $DESCRIPCION_ACTIVIDAD = $_POST['actividadArea'];
    $DOCUMENTO_ACCION = $_POST['fechaCumplimiento'];
    $FECHA_LIMITE_CUMPLIMIENTO = $_POST['fechaEntrega'];
    $FECHA_LIMITE_ENTREGA_SECONT = $_POST['fechaEntrega'];
    $PUNTO_MAXIMOS = $_POST['NewPuntos'];

    $query = "INSERT INTO `actividad_cumplimiento`(`ID_PERIODO_TABLERO_CUMP`, `DESCRIPCION_ACTIVIDAD`, `DOCUMENTO_ACCION`, `FECHA_LIMITE_CUMPLIMIENTO`, `FECHA_LIMITE_ENTREGA_SECONT`, `PUNTO_MAXIMOS`, `FECHA_HORA`, `ACTIVO`)
     VALUES
     ('$ID_PERIODO_TABLERO_CUMP', '$DESCRIPCION_ACTIVIDAD', '$DOCUMENTO_ACCION', '$FECHA_LIMITE_CUMPLIMIENTO ', '$FECHA_LIMITE_ENTREGA_SECONT', '$PUNTO_MAXIMOS', now(), 1)";


    $resultado = mysqli_query($conexion_tablero, $query);
    if ($resultado) {
        echo "Actividad guardada correctamente.";
        header("Location:../tableroCumplimiento.php");
    } else {
        echo "Error al guardar la actividad: " . mysqli_error($conexion_tablero);
        header("Location:../tableroCumplimiento.php");
    }
}
