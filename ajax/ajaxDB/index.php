<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Aax con bases de datos</title>
	<script type="text/javascript">
	function muestraclientes(str){
		var conexion;
		if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		if (window.XMLHttpRequest) {
			conexion = new XMLHttpRequest();
		}
		else{
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}
		conexion.onreadystatechange = function(){
			if (conexion.readyState == 4 && conexion.status == 200) {
				document.getElementById("cliente").innerHTML = conexion.responseText;
			}
		}
		conexion.open("GET","db.php?variable="+str,true);
		conexion.send();
	}
	</script>
</head>
<body>
	<form>
		<select name="clientes" onchange="muestraclientes(this.value)">
			<option value="">Seleccione un cliente</option>
			<option value="jhon">Jhon</option>
			<option value="george">George</option>
			<option value="paul">Paul</option>
			<option value="ringo">Ringo</option>
		</select>
	</form>
	<div id="cliente">La informacion del cliente aparecera aqui</div>
</body>
</html>
