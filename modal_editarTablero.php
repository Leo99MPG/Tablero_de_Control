<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container">
        <div class="modal fade" id="modal_editTablero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bs-success-bg-subtle">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tablero</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="funciones_fetch/fetch_editarTablero.php" method="post">
                            <input type="hidden" id="updateID" name="updateID" value="<?php echo $row['ID_ACTIVIDAD_CUMP'] ?>">
                            <div class="form-group">
                                <label for="editActividad">Actividad</label>
                                <input type="text" id="editActividad" name="editActividad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="editDocumento">Documento/Acción</label>
                                <input type="text" id="editDocumento" name="editDocumento" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="editFecha">Fecha Limite de Cumplimiento</label>
                                <input type="date" id="editFecha" name="editFecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="editSecont">Fecha Limite de Entrega a SECONT</label>
                                <input type="date" id="editSecont" name="editSecont" class="form-control">
                            </div>
 
                            <div class="form-group">
                                <label for="editPuntos">Máximo Puntos</label>
                                <input type="text" id="editPuntos" name="editPuntos" class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <!-- Boton de eliminar datos, se encuentra del dentro del modal -->
                                <button type="submit" name="editTablero" id="btn_editTablero" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>