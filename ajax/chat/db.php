<?php
$conexion = mysql_connect("localhost","wainerock","wainerock");
mysql_select_db("clientes", $conexion);
$consulta = "SELECT * FROM mensajes ORDER BY utc ";
$resultado = mysql_query($consulta, $conexion);
echo "<table border=1 width=100%>
				<tr>
					<td>Tiempo</td>
					<td>Autor</td>
					<td>Mensaje</td>					
				</tr>";
while($fila = mysql_fetch_array($resultado)){
	echo "<tr><td>".$fila['utc']."</td><td>".$fila['autor']."</td><td>".$fila['mensaje']."</td></tr>";

}
echo "</table>";
mysql_close($conexion);
?>