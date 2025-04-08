<?php

include "../private/conec_tableroCumplimiento.php";

if (isset($_POST['request'])) {
    $periodo = $_POST['request'];
    $query = "SELECT * FROM actividad_cumplimiento WHERE ID_PERIODO_TABLERO_CUMP='$periodo'";
    $result = mysqli_query($conexion_tablero, $query);
    $col = mysqli_num_rows($result);
?>


    <table id="myTable" clas="display">
        <?php
        if ($col) {
        ?>
            <thead>
                <tr>
                    <th>Actividad</th>
                    <th>Responsable</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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




    </table>

<?php
}


?>