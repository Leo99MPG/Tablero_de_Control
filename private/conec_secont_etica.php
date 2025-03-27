<?php
		
		require_once 'config_app_etica.php';
		
		$conexion_etica = mysqli_connect( MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD ) or 
							die ("No se ha podido conectar al servidor de Base de datos");
		
		$db_etica = mysqli_select_db( $conexion_etica, MYSQL_DB ) or 
							die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

