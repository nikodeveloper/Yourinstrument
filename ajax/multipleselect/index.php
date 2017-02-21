<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select encadenados</title>
	<script type="text/javascript">
	function selectanidados(str){
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
		conexion.open("GET","db.php?c="+str,true);
		conexion.send();
	}
	</script>
</head>
<body>
	<form>
		<select name="clientes" onchange="selectanidados(this.value)">
			<?php include("poblartipos.php");?>
		</select>
	</form>
	<div id="cliente">
		<select name="2">
			
		</select>
		
	</div>
	
</body>
</html>