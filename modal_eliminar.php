<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <div class="container">
        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Evaluación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="funciones_fetch/fetch_eliminar.php" method="post">
                            <input type="hidden" name="delete_id" , id="delete_id" value="<?php echo $row['id'] ?>">
                            <h4>¿Esta seguro que desea eliminar este registro?</h4>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <!-- Boton de eliminar datos, se encuentra del dentro del modal -->
                                <button type="submit" name="deletedata" class="btn btn-primary">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>