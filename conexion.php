<?php
    $host_db = "localhost";
    $user_db = "root";
    $pw_db = "Yy123456";
    $db = "yourinstrument"; 

    $conexion = mysql_connect($host_db,$user_db,$pw_db)
    or die("problemas con el server");
    mysql_select_db($db,$conexion)
    or die("problemas al conectar base de datos");
?>