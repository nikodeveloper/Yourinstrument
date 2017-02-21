<?php
$conexion = mysql_connect("localhost","wainerock","wainerock");
mysql_select_db("clientes",$conexion);
$consulta = "SELECT * FROM anivegemine WHERE tipo = '".$_GET['c']."' ";
$resultado = mysql_query($consulta, $conexion);
echo '<select name="clientes">';
while($fila = mysql_fetch_array($resultado)){
	
		echo "<option value=".$fila['elemento'].">".$fila['elemento']."</<option>";
	

}
echo '</select>';
mysql_close($conexion);
?>