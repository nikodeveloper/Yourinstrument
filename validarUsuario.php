<?php
    //conectar BD
    include("conexion.php");

    $conexion = mysql_connect("$host_db","$user_db","$pw_db")
    or die("problemas con el server");
    mysql_select_db($db,$conexion)
    or die("problemas al conectar base de datos");
        
    $mail = $_POST['mail'];
    $pw = $_POST['pass'];
    //Obtengo la version encriptada del password
    $pw_enc = md5($pw);

    $qry=mysql_query("SELECT id_usuario FROM tbl_user WHERE tx_correo = '".$_POST["mail"]."'");      

        while ($row = mysql_fetch_array($qry)) 
        {
        
        $id_usu = $row['id_usuario'];

        }

     
   $result = mysql_query("SELECT tx_username FROM tbl_user
            INNER JOIN tbl_pass
            ON tbl_user.id_usuario = tbl_pass.id_usuario
            WHERE tx_correo = '".$_POST["mail"]."'
            AND tx_password = '".$pw_enc."'"); 

    //Si existe al menos una fila
    if( $fila=mysql_fetch_array($result) )
    {       
        
        $nick = $fila['tx_username'];
        
        session_start();
        $_SESSION['usuario']            = $nick; 
        $_SESSION['id_usu'] = $id_usu;

        ?>
        <script>                    
            location.href='index.php';          
        </script>
         <?php
    }
   // }
    else
    {
        echo "problema en validar usuario";
    }
     mysql_close($conexion);
    ?>
<script type="text/javascript"> 
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>                     