<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8" />
    <title>Iniciar Sesión</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	 <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- fontawesome    --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
                integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
</head>

<body>
    
   	<div class="container">

        <div class="row justify-content-center my-5">

            <div class="col text-center">
                <img src="img/logo_secont.png" class="img-fluid" alt="...">
            </div>

        </div>

        <div class="row justify-content-center" id="Respuesta"></div>

        <div class="row justify-content-center">
            <!--
            <div class="col-11 col-md-7 col-lg-4">
                <label class="sr-only" for="usuario-input">Usuario</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><spam class="fas fa-user"></spam></div>
                    </div>
                    <input type="text" class="form-control" id="usuario-input" placeholder="Usuario" autocomplete="false">
                </div>
            </div>
            -->
            <!--<div class="col-11 col-md-7 col-lg-4">-->
            <div class="col col-lg-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="usuario-input" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!--
            <div class="col-11 col-md-7 col-lg-4">
                <label class="sr-only" for="contrasena-input">Contraseña</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><spam class="fas fa-lock"></spam></div>
                    </div>
                    <input type="password" class="form-control" id="contrasena-input" placeholder="Contraseña" autocomplete="false">
                </div>
            </div>
            -->
            <div class="col col-lg-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="contrasena-input" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon2">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

                <button id="btn-ingresar" class="btn btn-outline-success col-9 col-md-4 col-lg-2 my-3">
                        <strong>Ingresar<spam class="fas fa-sign-in-alt mx-2"></spam></strong></button>

        </div>

    </div>
    
    <!--    Boostrap JS    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <!--    jQuery      -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    
    <script src="user/js/login.js"></script>
	
</body>
</html>