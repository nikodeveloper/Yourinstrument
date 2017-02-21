<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<script type="text/javascript">
		function sugerencias(str){
			var conexion;
			if(str.length == 0){
				document.getElementById("txtHint").innerHTML = "";
			}
			if(window.XMLHttpRequest){
				conexion = new XMLHttpRequest();
			}
			else{
				conexion = new ActiveXObject("Microsoft.XMLHTTP");
			}
			conexion.onreadystatechange = function(){
				if(conexion.readyState == 4 && conexion.status == 200){
					document.getElementById("txtHint").innerHTML = conexion.responseText;
				}
			}
			conexion.open("GET","validar.php?u="+str,true);
			conexion.send();
		}
	</script>
</head>
<body>
	<h3>Formulario de acceso</h3>
	<form>
		<p>Elije un usuario: <input type="text" id="text" onkeyup="sugerencias(this.value)" style="border :0px solid black;
																										-webkit-box-shadow: 0px 0px 15px rgba(0,0,0,0.5);					
		                                                                                                background : rgba(255,255,255,0.95);
		                                                                                                    ">	
	</form>
	<div id="txtHint">
		
	</div></p>
</body>
</html>