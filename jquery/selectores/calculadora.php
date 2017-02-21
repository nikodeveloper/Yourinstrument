<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Load con  Ajax y Jquery</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/calculadora.js"></script>

</head>
<body>
	Ingrese un numero para multiplicarlo
	<form action="calcular.php" method="post">
		<input type="text" id="numero" name="numero">
		<input type="submit" id="enviar" value="Enviar">	
	</form>
	<div id="resultado"></div>
</body>
</html>