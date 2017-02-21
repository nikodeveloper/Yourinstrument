<?php
 $conexion = mysql_connect("localhost","wainerock","wainerock");
 mysql_select_db("clientes", $conexion);

 $consulta = "SELECT * FROM tipo";
 $resultado = mysql_query($consulta, $conexion);

while ($fila = mysql_fetch_array($resultado)) {
	echo "<option value='".$fila['tipo']."'>".$fila['tipo']."</option>";
}
mysql_close($conexion);
?>