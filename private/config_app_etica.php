<?php
   
    //************************************?/
    //?         MYSQL LOCAL
    //*************************************?/ 
    
    define("MYSQL_HOST","localhost");
    define("MYSQL_DB","secont_etica");
    define("MYSQL_USER","root");
    define("MYSQL_PASSWORD","");
    

    //************************************?/
    //?         MYSQL DISTRIBUCIÓN
    //*************************************?/ 
    /*
    define("MYSQL_HOST","172.19.2.49:3306");
    define("MYSQL_DB","secont_sicosa");
    define("MYSQL_USER","root");
    define("MYSQL_PASSWORD","53cont2021");
    */
    //  Obtener los posibles valores de:
    //      - https://www.php.net/manual/es/timezones.php
    
    define("DEFAULT_TIMEZONE","America/Merida");
    //  *usar en los scripts que así se requieren de la siguiente forma:
    //  date_default_timezone_set(DEFAULT_TIMEZONE);

    define("PATH_FILES","../files/");

    
    //************************************?/
    //?       CONFIGURACIÓN ASPECTO TÍTULAR
    //*************************************?/  */

    define("COLOR_DEFAULT","#393D42");      // GRIS OXFORD
    define("COLOR_MOUSE_OVER","#751F35");   //  ROJO MORENA
    define("BACKGROUND_COLOR","#E2E3E5");   //  GRIS DE 'alert-secondary'
    define("FONT_CSS","30% sans-serif");    //  Arial


    
    

   

?>
