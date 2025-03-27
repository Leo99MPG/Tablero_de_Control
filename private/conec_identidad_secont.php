<?php

    //require_once("config_db_pae.php");
    /*
	define("HOST_DB_IDENTIDAD_MYSQL","172.19.2.49:3306");
    define("NAME_DB_IDENTIDAD_MYSQL","secont_identidad");
    define("USER_DB_IDENTIDAD_MYSQL","root");
    define("PASSWORD_DB_IDENTIDAD_MYSQL","53cont2021");
    */

    //      CONFIGURACIÓN LOCAL
    
    define("HOST_DB_IDENTIDAD_MYSQL","localhost");
    define("NAME_DB_IDENTIDAD_MYSQL","secont_identidad");
    define("USER_DB_IDENTIDAD_MYSQL","root");
    define("PASSWORD_DB_IDENTIDAD_MYSQL","");

    //      CONFIGURACIÓN SERVIDOR DISTRIBUCIÓN
    /*
    define("HOST_DB_IDENTIDAD_MYSQL","172.19.2.49:3306");
    define("NAME_DB_IDENTIDAD_MYSQL","secont_identidad");
    define("USER_DB_IDENTIDAD_MYSQL","root");
    define("PASSWORD_DB_IDENTIDAD_MYSQL","53cont2021");
    */

    $conexion_identidad = mysqli_connect( HOST_DB_IDENTIDAD_MYSQL, USER_DB_IDENTIDAD_MYSQL, PASSWORD_DB_IDENTIDAD_MYSQL ) or 
							die ("No se ha podido conectar al servidor de Base de datos");
		
	$db_mysql_identidad = mysqli_select_db( $conexion_identidad, NAME_DB_IDENTIDAD_MYSQL ) or 
							die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

	//mysqli_set_charset($conexion,"latin1");

    