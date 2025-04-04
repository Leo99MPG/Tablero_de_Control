    <nav class="navbar navbar-reverse navbar-expand-sm bg-light navbar-light fixed-top">

        <div class="navbar-brand mt-0">
            <!--<img src="../img/secont-nav.png" alt="" width="100" height="50" class="d-inline-block align-text-top">
            <?php echo "<p>".$_SESSION['USR_NOMBRE']."</p>"; ?>-->
            <div class="navbar-brand" style="font-size:15px"><strong><?php echo $_SESSION['USR_NOMBRE']; ?></strong></div>
            <!--<div class="navbar-brand" style="font-size:15px"><strong><?php //echo "ADMIN<br>ADMIN"; ?></strong></div>-->
        </div>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#contenedor-navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="contenedor-navbar"> 

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>

                <li>
                    <a class="nav-link active" aria-current="page" href="tableroCumplimiento.php">Tablero Cumplimiento</a>
                </li>

                <!--    Si es un ADMINISTRADOR podra observar el Menú AGREGAR   -->  
                <?php 
                    if( false && $_SESSION[PRIVILEGIO_APP] > PRIVILEGIO_CAPTURISTA ){
                    
                        echo "  <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle ml-2' href='#' id='navbardrop' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                        Administrar</a>
                                    <div class='dropdown-menu'>
                                        <!-- <a class='dropdown-item' href='user/'>Usuarios</a> -->
                                        <!--<a class='dropdown-item' href='getDependencias.php'>Actualizar Dependencia</a>-->
                                        <a class='dropdown-item' href='cargarPAF/'>Cargar PAF</a>
                                    </div>
                                </li>
                            ";
                            
                    }   //  FIN de IF para el Menú AGREGAR
                
                ?>

                <!--    Menú MI CUENTA, disponible para todos   -->
                    <!--
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ml-2" href="#" id="navbardrop" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                        Mi cuenta</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="user/updatePassw.php">Cambiar Contraseña</a>
                    </div>
                </li>
                -->

                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php"><strong><i class="fas fa-sign-out-alt mr-1"></i>Salir</strong></a>
                </li>  

            </ul>
        </div>
    </nav>
