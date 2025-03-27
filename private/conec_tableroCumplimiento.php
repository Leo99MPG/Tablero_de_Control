<?php

//CONFIGURACION LOCAL
define("HOST_DB_IDENTIDAD_MYSQL","localhost");
define("NAME_DB_IDENTIDAD_MYSQL","secont_cumplimiento");
define("USER_DB_IDENTIDAD_MYSQL","root");
define("PASSWORD_DB_IDENTIDAD_MYSQL","");


//CONFIGURACION SERVIDOR DISTRIBUCION

$conexion_tablero = mysqli_connect( HOST_DB_IDENTIDAD_MYSQL, USER_DB_IDENTIDAD_MYSQL, PASSWORD_DB_IDENTIDAD_MYSQL ) or 
                            die ("No se ha podido conectar al servidor de Base de datos");

$db_mysql_tablero = mysqli_select_db( $conexion_tablero, NAME_DB_IDENTIDAD_MYSQL ) or 
                            die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

?>