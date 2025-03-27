<?php
require_once '../private/conec_identidad_secont.php';

/* Dentro del $_POST se encuentra el nombre del boton de eliminar datos dentro del moda */
if(isset($_POST['deletedata'])){
   /* delete_id corresponde al form dentro del modal */
   $id = $_POST['delete_id'];
   $query = "DELETE FROM evaluaciones WHERE id='$id'";
   $result = mysqli_query($conexion_identidad, $query);
   if($result){
      echo '<script>alert("Registro Eliminado con exito");</script>';
      header("location:../index.php");
   }else{
      echo '<script>alert("El registro no pudo ser eliminado ");</script>';
   }
}
?>