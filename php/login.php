<?php
session_start();
include("conexion.php");
$con = mysql_connect($host,$user,"")
or die("problemas con el server");
mysql_select_db($db,$con)
or die("problemas al conectar base de datos");
$email = $_POST["email"];
$pass = $_POST["pass"];

$consulta = mysql_query("SELECT * FROM USUARIOS WHERE USU_MAIL='".$email."' AND USU_PASSWORD='".$pass."'");
$array_consulta = mysql_fetch_array($consulta);
	if($array_consulta==false)
	{
	 echo "Usuario o contraseña incorrecta";
	}
	else
	{
	  $_SESSION["id"] = $array_consulta["USU_ID"];
      $_SESSION["name"] = $array_consulta["USU_NOMBRE"];
      $_SESSION["email"] = $array_consulta["USU_EMAIL"];
      $_SESSION["pass"] = $array_consulta["USU_PASSWORD"];
      $_SESSION["imagen"] = $array_consulta["USU_IMG"];
	  header("Location:index.php");//
	 			//session_register('$nick');
			//echo "'.$nick.'";
	}
?>