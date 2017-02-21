<?php
$conexion = mysql_connect("localhost","wainerock","wainerock");
mysql_select_db("clientes", $conexion);
$consulta = "SELECT * FROM usuarios ";
$resultado = mysql_query($consulta, $conexion);

while($fila = mysql_fetch_array($resultado)){
if($fila['usuario'] == $_GET['u']){
		echo '
			<div id="" style="width:180px;
			height:30px;
			background:red;
			border-radius:10px;
			position:absolute;
			-webkit-transform:translate(90px,-40px);
			opacity:0.5;
			z-index:-100;"></div>
		';
	}else{
		echo '
			<div id="" style="width:180px;
			height:30px;
			background:green;
			border-radius:10px;
			position:absolute;
			-webkit-transform:translate(90px,-40px);
			opacity:0.5;
			z-index:-100;"></div>
		';
	}	

}

mysql_close($conexion);
?>