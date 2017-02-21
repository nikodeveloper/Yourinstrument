<?php 
include("conexion.php");
$con = mysql_connect($host,$user,"")
or die("problemas con el server");
mysql_select_db($db,$con)
or die("problemas al conectar base de datos");
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$pass = $_POST["pass"];
//mysql_query("UPDATE FROM user SET name = '$name' WHERE name= '$_SESSION[name]' ",$con) or die("problemas con el server");
mysql_query("UPDATE user SET lastname = '$lastname' WHERE lastname = '$_SESSION[lastname]' ",$con) or die("Apellido");
mysql_query("UPDATE user SET name = '$name' WHERE name = '$_SESSION[name]' ",$con) or die("Nombre");
mysql_query("UPDATE user SET pass = '$pass' WHERE pass = '$_SESSION[pass]' ",$con) or die("Password");
$_SESSION["name"] = $name;
$_SESSION["lastname"] = $lastname;
$_SESSION["pass"] = $pass;
echo "<meta http-equiv='refresh' content='0; url=mostrarusuario.php'>";
//mysql_query("UPDATE user SET lastname = '$lastname' WHERE lastname = '$_SESSION[lastname]' ",$con) or die("problemas con el server");
?>