<?php

    //echo __DIR__."<br>";

    //require_once '../private/conec_pae.php';
    //require_once '../private/bitacora.php';

    session_start();

    //saveBitacora($conexion,$_SESSION['USR_ID'],NULL,"6","LOG-OUT SISTEMA");

    session_destroy();

    header('Location: login.php');