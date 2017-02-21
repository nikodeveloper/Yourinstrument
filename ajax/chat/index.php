<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ventana chat</title>
	<script type="text/javascript">
		function ventanachat(){
			var conexion;
			if (window.XMLHttpRequest) {
				conexion = new XMLHttpRequest();
			}
			else{
				conexion = new ActiveXObject("Microsoft.XMLHTTP");
			}
			var fetch_unix_timestamp = "";
			fetch_unix_timestamp = function(){
				return parseInt(new Date().getTime().toString().substring(0,10));
			}
			var timestamp = fetch_unix_timestamp();
			conexion.onreadystatechange = function(){
				if (conexion.readyState == 4) {
					document.getElementById("ventanachat").innerHTML = conexion.responseText;					
					setTimeout('ventanachat()',1000);
					}
			}
			conexion.open("GET","db.php"+"?t="+timestamp,true);
			conexion.send(null);
		}
		window.onload = function startrefresh(){
			setTimeout('ventanachat()', 1000);
		}
	</script>
</head>
<body>
	<form action="insertar.php" method="get">
		<input type="text" name="mensaje" id="enviachat">
		<input type="submit" value="Enviar">
	</form>
	<div id="ventanachat" style="width:100%;
								height: 500px;
								border: 1px solid black;
								overflow: hiddeen;
								">
		<script type="text/javascript">
			ventanachat();
		</script>		
	</div>	
</body>
</html>