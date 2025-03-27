<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="modalPeriodo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-left" id="exampleModalLabel">Nuevo Periodo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="modalPeriodo" id="modal_nuevoPeriodo">
                            <option value="0">Seleccione un periodo</option>
                            <?php
                            include "private/conec_tableroCumplimiento.php";
                            $query = "SELECT * FROM periodo_tablero_cumplimiento";
                            $result = mysqli_query($conexion_tablero, $query);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['ID_PERIODO_TABLERO_CUMP'] ?>"><?php echo $row['PERIODO'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn-Guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>