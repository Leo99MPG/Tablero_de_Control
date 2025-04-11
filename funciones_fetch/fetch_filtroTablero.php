<?php

include "../private/conec_tableroCumplimiento.php";

if (isset($_POST['request'])) {
    //request se localiza dentro del tableroCumplimiento.js, este hace referencia al ajax su parametro data, que es el valor de 
    //el select de la variable tableroPeriodo, que es el id del periodo seleccionado en el tableroCumplimiento.php
    //en este caso el valor de la variable $periodo es el id del periodo seleccionado en el select del tableroCumplimiento.php
    $periodo = $_POST['request'];
    //Query para haceer el filtro
    $query = "SELECT * FROM actividad_cumplimiento WHERE ID_PERIODO_TABLERO_CUMP='$periodo'";
    //Query para contar el numero de filas que tiene la consulta, si no hay filas entonces no se ejecuta el resto del codigo
    $result = mysqli_query($conexion_tablero, $query);
    $col = mysqli_num_rows($result);
?>


   <!--  Este segmento es casi el mismo que el segmento de la tabla de dataTable en el tableroCumpimiento.php, solo se añade la el ciclo if de la varable $col -->
        <div class="justify-content-center">
            <?php
            if ($col) {
            ?>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Actividad</th>
                        <th>Documento/Acción</th>
                        <th>Fecha Limite de Cumplimiento</th>
                        <th>Fecha Limite de Entrega a SECONT</th>
                        <th>Máximo Puntos</th>
                        <th>Opciones</th>
                    </tr>
                <?php
            } else {
                echo "No hay registros del presente periodo";
            }
                ?>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['ID_ACTIVIDAD_CUMP'] ?></td>
                            <td><?php echo $row['DESCRIPCION_ACTIVIDAD'] ?></td>
                            <td><?php echo $row['DOCUMENTO_ACCION'] ?></td>
                            <td><?php echo $row['FECHA_LIMITE_CUMPLIMIENTO'] ?></td>
                            <td><?php echo $row['FECHA_LIMITE_ENTREGA_SECONT'] ?></td>
                            <td><?php echo $row['PUNTO_MAXIMOS'] ?></td>
                            <td>
                                <a href=""><i class="fas fa-tasks mx-1 text-dark"></i></a>
                                <a href="#" class="btn_editTab"><i class="fas fa-edit mx-1 text-primary"></i></a>
                                <a href="#" class="eliminarTab"><i class="fas fa-trash mx-1 text-danger"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
        </div>


    

<?php
}


?>