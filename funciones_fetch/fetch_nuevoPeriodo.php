<?php

include "../private/conec_tableroCumplimiento.php";

if(isset($_POST['nuevoPeriodo'])){
    $periodo = $_POST['nuevoPeriodo'];
    $query = "INSERT INTO periodo_tablero_cumplimiento (PERIODO) VALUES ('$periodo')";
    $result = mysqli_query($conexion_tablero, $query);
    if($result){
        echo '<script>alert("Periodo agregado con exito");</script>';
        header("location:../tableroCumplimiento.php");
    }else{
        echo '<script>alert("El periodo no pudo ser agregado ");</script>';
    }
}

?>