<?php
require_once '../private/conec_identidad_secont.php';



//EDITAR LA DATA DE UNA EVALUACION
if(isset($_POST['editdata']))
{   
    $id = $_POST['update_id'];
    
    $entidad= $_POST['edit_entidad'];
    $periodo = $_POST['edit_periodo'];
    $presidente = $_POST['edit_presidente'];
    $cumplimiento = $_POST['edit_cumplimiento'];
    $desempeño = $_POST['edit_desempeño'];
    $calificacion = $_POST['edit_calificacion'];


    $query = "UPDATE evaluaciones SET Entidad='$entidad', Periodos='$periodo', Presidente='$presidente', Cumplimiento='$cumplimiento', Desempeño='$desempeño', Calificacion='$calificacion' WHERE id='$id'  ";
    
    $resultado = mysqli_query($conexion_identidad, $query);

    if($resultado)
    {
        echo '<script> alert("Evaluación editada con exito"); </script>';
        header("Location:../index.php");
    }
    else
    {
        echo '<script> alert("Evaluación no se pudo editar"); </script>';
    }
}


?>