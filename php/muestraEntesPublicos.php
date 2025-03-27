<?php
require_once '../private/conec_identidad_secont.php';
if ($_POST) {

    //echo "<pre>"; print_r($_POST); echo "</pre>";
    //die();



    $sql = "SELECT `ID_DEPENDENCIA`, `NOMBRE_DEPENDENCIA`, `SIGLAS`
                FROM `cat_dependencias` ";

    if ($result = mysqli_query($conexion_identidad, $sql)) {

        if (mysqli_num_rows($result) != 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<option value='" . $row["ID_DEPENDENCIA"] . "'>" . $row["NOMBRE_DEPENDENCIA"] . " (" . $row["SIGLAS"] . ")</options>";
            }
        } else
            echo "sin registros";
    } else
        echo "fallo consulta";
}
