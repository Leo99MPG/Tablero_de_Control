<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <div class="container">
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Evaluación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="funciones_fetch/fetch_editar.php" method="post">
                            <input type="hidden" id="update_id" name="update_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label for="">Entidad</label>
                                <input type="text" id="edit_entidad" name="edit_entidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Periodo</label>
                                <input type="text" id="edit_periodo" name="edit_periodo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Presidente</label>
                                <input type="text" id="edit_presidente" name="edit_presidente" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cumplimiento</label>
                                <input type="text" id="edit_cumplimiento" name="edit_cumplimiento" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Desempeño</label>
                                <input type="text" id="edit_desempeño" name="edit_desempeño" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Calificación Anual</label>
                                <input type="text" id="edit_calificacion" name="edit_calificacion" class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <!-- Boton de eliminar datos, se encuentra del dentro del modal -->
                                <button type="submit" name="editdata" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>