<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax con XML</title>
	<script type="text/javascript">
	function cargaXML(){
		var conexion;
		var txt,x,i;
		 if (window.XMLHttpRequest) {
		 	conexion = new XMLHttpRequest;
		 }
		 else{
		 	conexion = new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 conexion.onreadystatechange = function(){
		 	if (conexion.readyState == 4 && conexion.status == 200) {
		 		xmlDoc = conexion.responseXML;	
		 		txt = "<table border=1 width=100% ><tr><td>Titulo</td><td>Artista</td><td>Pais</td><td>Sello</td><td>Precio</td><td>Anio</td></tr>";

		 		x 		= xmlDoc.getElementsByTagName("titulo");
		 		artista = xmlDoc.getElementsByTagName("artista");
		 		pais 	= xmlDoc.getElementsByTagName("pais");
		 		firma	= xmlDoc.getElementsByTagName("firma");
		 		precio	= xmlDoc.getElementsByTagName("precio");
		 		anio	= xmlDoc.getElementsByTagName("anio");
				 		for(i=0; i< x.length;i++){
				 			txt = txt +"<tr><td>"+
				 			x[i].childNodes[0].nodeValue+"</td><td>"+
				 			artista[i].childNodes[0].nodeValue+"</td><td>"+
				 			pais[i].childNodes[0].nodeValue+"</td><td>"+
				 			firma[i].childNodes[0].nodeValue+"</td><td>"+
				 			precio[i].childNodes[0].nodeValue+"</td><td>"+
				 			anio[i].childNodes[0].nodeValue+"</td></tr>";				 							 			
				 		}
			document.getElementById("midiv").innerHTML = txt;
			}
		}
	conexion.open("GET","discoteca.xml",true);	
	conexion.send();
	}
	</script>
</head>
<body><di>
	<h2>Mi coleccion</h2>
	<div id="midiv"></div>
	<button type="button" onclick="cargaXML()">Ver mi coleccion</button>	
</body>
</html>
