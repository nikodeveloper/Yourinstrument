<?php

$conexion = mysql_connect("localhost","wainerock","wainerock");

mysql_select_db("clientes", $conexion);

 $consulta ="SELECT * FROM clientes ";
echo "<table border=1 width=100%>
				<tr>
					<td>Nombre</td>
					<td>Direccion</td>
					<td>telefono</td>
					<td>Codigo postal</td>
					<td>Poblacion</td>
					<td>Pais</td>					
				</tr>";
$resultado = mysql_query($consulta, $conexion);
while ($fila = mysql_fetch_array($resultado)) {

	if ($fila['nombre'] == $_GET['variable']) {
		echo "<tr><td>".$fila['nombre']."</td><td>".$fila['direccion']."</td><td>".$fila['telefono']."</td><td>".$fila['codigo_postal']."</td><td>".$fila['poblacion']."</td><td>".$fila['pais']."</td></tr>";
	}
}
echo "</table>";
mysql_close($conexion);
?>