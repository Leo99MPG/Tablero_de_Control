<?php

/* Se incluye la conexion a la base de datos, para poder eliminar el registro de la tabla evaluaciones */
require_once '../private/conec_tableroCumplimiento.php';

/* Dentro del $_POST se encuentra el nombre del boton de eliminar datos dentro del moda */
if(isset($_POST['deleteActividad'])){
   /* delete_id corresponde al form dentro del modal */
   $ID_ACTIVIDAD_CUMP = $_POST['delete_actividad'];
   $query = "DELETE FROM `actividad_cumplimiento` WHERE ID_ACTIVIDAD_CUMP='$ID_ACTIVIDAD_CUMP'";
   $result = mysqli_query($conexion_tablero, $query);
   if($result){
      echo '<script>alert("Registro Eliminado con exito");</script>';
      header("location:../tableroCumplimiento.php");
   }else{
      echo '<script>alert("El registro no pudo ser eliminado ");</script>';
   }
}
?>