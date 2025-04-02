<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <div class="container">
        <div class="modal fade" id="deleteTablero" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Evaluación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="funciones_fetch/fetch_eliminarTablero.php" method="post">
                            <input type="hidden" name="delete_actividad" , id="delete_actividad" value="<?php echo $row['ID_ACTIVIDAD_CUMP'] ?>">
                            <h4>¿Esta seguro que desea eliminar esta actividad?</h4>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <!-- Boton de eliminar datos, se encuentra del dentro del modal -->
                                <button type="submit" name="deleteActividad" class="btn btn-primary">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>