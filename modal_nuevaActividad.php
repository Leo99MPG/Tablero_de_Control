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
        <div class="modal fade" id="modalActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
                <div class="modal-content bg-info-subtle">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-left" id="exampleModalLabel" style="margin-bottom: 1px black-solid;">Nueva Actividad</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div classaveActivity
                            <form id="form_actividad" method="post" action="fetch_nuevaActividad.php">
                            
                                <div id='advertencia'></div>

                                <div class="row form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text col-md-4 bg-info-subtle" id="basic-addon1">Actividad:</span>
                                        <input type="text" id='NewActivity' name='NewActivity' class="form-control" placeholder="Teclee Actividad..." aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <p>Documento/Acción:</p>
                                    <textarea name="" id="actividadArea" name="actividadArea" placeholder="Teclee Documento o Accion" style="height: 100px;" required></textarea>
                                </div>

                                <div class='row'>
                                    <p class="col-md-6 justify-content-left"> Fecha limite de Cumplimiento</p>
                                    <p class="col-md-6 justify-content-right"> Fecha limite de Entrega a SECONT</p>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input type="date" id='fechaCumplimiento' name='fechaCumplimiento' class="form-control" placeholder="Fecha Limite de Cumplimiento" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" id='fechaEntrega' name='fechaEntrega' class="form-control" placeholder="Fecha Limite de Entrega a SECONT" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div> 
                                </div>

                                <div class='row form-group' style="padding-top: 10px;">
                                    <div class="input-group-sm mb-3">
                                        <span class="input-group-text col-md-4 bg-info-subtle" id="basic-addon1">Máximo de Puntos:</span>
                                        <input type="number" id='NewPuntos' name='NewPuntos' class="form-control" placeholder="Puntos..." aria-label="Username" aria-describedby="basic-addon1" size="4", maxlength="4">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="saveActivity" name="saveActivity">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>