<?php

require_once 'private/config_identidad_secont.php';

session_start();

//if( !$_SESSION['USR_ID'] ){
if (!isset($_SESSION[PRIVILEGIO_APP])) {

    header('Location: login.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLERO DE EVALUACIÓN</title>

    <!-- 	FONTAWESOME		-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/datatable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>

<body>


    <?php
    include "menu_nav.php";
    ?>


    <div class="container" style="padding-top: 100px;">

        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h3>Tablero de Control de Cumplimiento</h3>
            </div>
        </div>

        <div class="row justify-content-center" style="padding-bottom: 20px;">
            <div class="col-md-2">
                <h4>Periodo:</h4>
            </div>

            <div class="col-md-5" >
                <select class="form-select" id="tableroPeriodo">
                    <option value="0">Elija Periodo</option>
                    <?php
                    include "private/conec_tableroCumplimiento.php";
                    $query = "SELECT * FROM periodo_tablero_cumplimiento";
                    $result = mysqli_query($conexion_tablero, $query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['ID_PERIODO_TABLERO_CUMP'] ?>"><?php echo $row['PERIODO'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-success" id="btnPeriodo">Nuevo Periodo</button>
                <button class="btn btn-primary" id="btnActividad">Agregar Actividad</button>
            </div>

        </div>


        <?php include "modal_tableroCumplimiento.php"; ?>
        <?php include "modal_editarTablero.php"; ?>
        <?php include "modal_eliminarTablero.php"; ?>
        <?php include "modal_nuevaActividad.php"; ?>



        <div class= 'tableroCum'>

            <div class="row justify-content-center">
                <div class="col">
                    <!-- TABLA -->
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Actividad</th>
                                <th>Documento/Acción</th>
                                <th>Fecha Limite de Cumplimiento</th>
                                <th>Fecha limite de Entrega a SECONT</th>
                                <th>Máximo de puntos</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT ID_ACTIVIDAD_CUMP, DESCRIPCION_ACTIVIDAD,
                                DOCUMENTO_ACCION, FECHA_LIMITE_CUMPLIMIENTO,
                                FECHA_LIMITE_ENTREGA_SECONT, PUNTO_MAXIMOS FROM `actividad_cumplimiento`";
                            $result = mysqli_query($conexion_tablero, $sql);
                            if ($result) {
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
                                            <a href="#" class="btn_editTab" ><i class="fas fa-edit mx-1 text-primary"></i></a>
                                            <a href="#" class="eliminarTab"><i class="fas fa-trash mx-1 text-danger"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>



        <!-- 	JQUERY	-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <!-- BOOTSTRAP	-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


        <!--	REPOSITORIOS PROPIOS -->
        <script src="js/repositorio_inicio.js"></script>


        <script src="js/datatables.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


        <!--====  End of LIBRERIAS JS PARA AGREAR BOTONES A DATATABLE  ====-->
    </div>
    <script src="js/tableroCumplimiento.js"></script>
</body>

</html>