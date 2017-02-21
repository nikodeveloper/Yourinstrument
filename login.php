<?php 
include("conexion.php");
if (isset($_POST["pass"]) && isset($_POST["mail"])) 
{
  $conexion = mysql_connect("$host_db","$user_db","$pw_db"); 
  $bd = mysql_select_db("$db",$conexion);
  $consulta = mysql_query("SELECT Us_Email, Us_pass FROM tbl_user WHERE Us_Email='".$_POST["mail"]."' AND Us_pass='".$_POST["pass"]."'");
  $name = mysql_query("SELECT Us_Nombre FROM tbl_user WHERE Us_Email='".$_POST["mail"]."' AND Us_pass='".$_POST["pass"]."'");
    if (mysql_num_rows($consulta)>0) 
    {
        session_start();
        $_SESSION['usuario']=$_POST['mail'];
        header('Location: index.php');   
    }
    else
    {        
    ?>
   	<script>	      			
  			location.href='index.php';  		
  			alert('Datos de Acceso incorrectos, por favor verifique sus datos');
  	</script>
    <?php
    }
} 
?> 