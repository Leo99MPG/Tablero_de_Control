<!DOCTYPE html>
<html lang="en">

<head>
    
</head>

<body>

    <div class="col col-3 text-end ">
        <!--########################### BOTON DE NUEVA EVALUACION ############################-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EvaluacionModal">
            Crear Nueva Evaluación
        </button>

        <!--################################# MODAL DE NUEVA EVALUACION ############################### -->
        <div class="modal fade" id="EvaluacionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="row">

                                <div class="col-5 text-left">
                                    <label for="disabledSelect" class="form-label">Entidad u Organismo</label>
                                </div>

                                <div class="col-5 text-center">
                                    <label for="disabledSelect" class="form-label">Ente Público</label>
                                </div>

                            </div>


                            <div class="row">
                                <form action="funciones_fetch/fetch.php" method="post">
                                    <div>
                                        <select id="tipo_dependencia" name="tipo_dependencia" onChange="getfetch(this.value);" class="col-sm-6 left-alligned">
                                            <option selected>Elija una opción</option>
                                            <?php $sql = "SELECT * FROM cat_tipo_dependencia";
                                            $result = mysqli_query($conexion_identidad, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <option value="<?php echo $row['ID_TIPO_DEPENDENCIA'] ?>"><?php echo $row['DESC_TIPO_DEPENDENCIA'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div>
                                        <select name="dependencia" id="dependencia" class="col-sm-6 right-alligned">
                                            <option value="">Elija una opción</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn-btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


</body>

</html>