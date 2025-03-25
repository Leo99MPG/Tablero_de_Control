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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="css/datatable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



    //SCRIPT PARA EL FUNCIONAMIENTO DE LOS MODALES Y BOTONES
    <script>
        $(document).ready(function() {
            $("#tableroPeriodo").on('change', function() {
                if ($(this).val() == "0")
                    $("#btnEvaluacion").attr('hidden', true),
                    $("#btnPeriodo").attr('hidden', false)
                else
                    $("#btnPeriodo").attr('hidden', true),
                    $("#btnEvaluacion").attr('hidden', false)
            });

            $("#btnPeriodo").on('click', function() {
                $("#modalPeriodo").modal('show');
            });



        });
    </script>

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

        <div class="row justify-content-center">
            <div class="col-md-2">
                <h4>Periodo:</h4>
            </div>

            <div class=col-md-5>
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
                <button class="btn btn-primary" id="btnEvaluacion">Agregar Actividad</button>
            </div>

        </div>

        <?php include "modal_tableroCumplimiento.php"; ?>



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

</body>

</html>