<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sugerencias con ajax</title>
	<script type="text/javascript">
	function sugerencias(str){// esta vez la funcion va con un parametro (str)
		var conexion;

		if (str.length == 0) {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}

		if (window.XMLHttpRequest) {
			conexion = new XMLHttpRequest;
		}
		else{
			conexion = new ActiveXObject("MicrosoftXMLHTTP");
		}

	conexion.onreadystatechange = function (){
		if (conexion.readyState == 4 && conexion.status == 200) {
		document.getElementById("txtHint").innerHTML = conexion.responseText;
		}
	}

	conexion.open("GET","sugerencias.php?q="+str,true);// str: variable que exista en el campo del formulario .. "Q" fue reemplazada por VARIABLE
	conexion.send();

	}
	</script>
</head>
<body>
	<h2>Sugerencias</h2>
	<p>Introduce un nombre en la casilla</p>
	<form >
		Primer nombre: <input type="text" id="txt1" onkeyup="sugerencias(this.value)"> <!-- este campo debe comunicarse con javasript mediante la funcion ONKEYUP ejecutar la funcion sugerencias con el valor que contenga el formualrio -->
		<p>Sugerencias: <span id="txtHint"></span></p> <!-- se devolveran las sugerencias opfrecidas en el campo span con id= hint -->
	</form>
</body>
</html>