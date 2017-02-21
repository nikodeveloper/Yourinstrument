<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reloj con ajax</title>
	<script type="text/javascript">
		function refresca(){
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
					document.getElementById("reloj").innerHTML = conexion.responseText;
					setTimeout('refresca()',1000);
					}
			}
			conexion.open("GET","reloj.php"+"?t="+timestamp,true);
			conexion.send(null);
		}
		window.onload =function startrefresh(){
			setTimeout('refresca()',1000);
		}		
	</script>
</head>
<body>
<div id="reloj">
	<script type="text/javascript">
		refresca();
	</script>
</div>
	
</body>
</html>