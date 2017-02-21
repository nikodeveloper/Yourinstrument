<?php
$conexion = mysql_connect("localhost","wainerock","wainerock");
mysql_select_db("clientes", $conexion);
$consulta = "INSERT INTO mensajes VALUES('".date('U')."','wainerock','".$_GET['mensaje']."') ";
$resultado = mysql_query($consulta, $conexion);

mysql_close($conexion);
echo '
		<meta http-equiv="REFRESH" content="0;url=index.php">
	';
?>