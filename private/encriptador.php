<?php

	/*===============================================
	=             FUNCION 'php_encriptaID'              =
	===============================================*/

		function php_encriptaID($num){

			$num = rand(0,9).$num;

			$valores = array( 	0 => "aqi",		1 => "brn",		2 => "csj",		
								3 => "dto",		4 => "euk",		5 => "fvp",
								6 => "gwl",		7 => "hxq",		8 => "iym",		
								9 => "jzr"	);

			$cadena = "";

			for( $i = 0 ; $i < strlen($num) ; $i++ ){

				$valor = $num[$i];
				$cadena .= $valores[$valor]; 

			}

			return $cadena;

		}

		/*=====  End of... FUNCION 'php_encriptaID'  ======*/
	
	/*===============================================
	=             FUNCION 'encriptaID'              =
	===============================================*/

		function JS_encriptaID($num){

			$num = rand(0,9).$num;

			$valores = array( 	0 => "aqi",		1 => "brn",		2 => "csj",		
								3 => "dto",		4 => "euk",		5 => "fvp",
								6 => "gwl",		7 => "hxq",		8 => "iym",		
								9 => "jzr"	);

			$cadena = "";

			for( $i = 0 ; $i < strlen($num) ; $i++ ){

				$valor = $num[$i];
				$cadena .= $valores[$valor]; 

			}

			return '`'.$cadena.'`';

		}

		/*=====  End of... FUNCION 'encriptaID'  ======*/




	/*==================================================
	=             FUNCION 'desencriptaID'              =
	==================================================*/

		function desencriptaID($cad_num){

			if( !ctype_alpha($cad_num) )	return 0;

			$sizeString = 3;

			$valores = array( 	'aqi' => 0,  	'brn' => 1,		'csj' => 2,		
								'dto' => 3,		'euk' => 4 ,	'fvp' => 5,
								'gwl' => 6,		'hxq' => 7,		'iym' => 8,		
								'jzr' => 9	);

			$cadena = '';

			for( $i = $sizeString ; $i < strlen($cad_num) ; $i+=$sizeString ){

				$valor = "";
				$k = $i;

				for( $j = 0 ; $j < $sizeString ; $j++ )
					$valor .= $cad_num[$k++];

				if( isset( $valores[$valor] ) )		$cadena .= $valores[$valor];
				else 	return 0;

			}

			return $cadena;

		}

		/*=====  End of... FUNCION 'desencriptaID'  ======*/
	
?>