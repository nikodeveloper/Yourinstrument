<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curso de Ajax</title>
	<script type="text/javascript">
	function ejecutarajax(){
	var conexion;
	
		if (window.XMLHttpRequest) {
				conexion = new XMLHttpRequest(); // objeto compatible con todos los navegadores de internet, pro no funciona con versiones antiguas de internet explore
		}
		else{
				conexion = new ActiveXObject("Microsoft.XMLHTTP");// si la version es antigua de navegador se ejecutara esta parte del else
		}
	//	
	conexion.onreadystatechange = function(){// nos permite que el servidor nons informe de cuando el estado de estar "ready" preparado de nuevo a cambiado
											 // 
		if (conexion.readyState == 4 && conexion.status == 200) { // si en la conexion, el estado de preparado es iagual a 4 y el estatus es igual a 200
	document.getElementById("midiv").innerHTML = conexion.responseText;
	}
			// ReadyState:
			// 0: la peticion no se ha inicializado 
			// 1: conexion con el servidor establecida
			// 2: peticion recibida
			// 3: procesando la  peticion
			// 4: peticion finalizada y la respuesta esta lista
			
			// Status : 200:OK y el 404: no encontrado
	}
	// una vez eque existe una cnoexion al servidor se prepara una peticion mediante dos metodos (OPEN: que prepara la peticion y el el SEND: que la envia) 
	// la conexion debe ser por lo general asincronica
	conexion.open("GET","ejemplo.php",true);//  (se elige el metodo, el archivo que vamos a abrir y la conexion si es asincronica o sincronica) (TRUE: para elegir una conexion asincornica)
	conexion.send();// con este metodo (SEND) , se ha enviado la peticion al servidor
	} 
	</script>
</head>
<body>
	<div id="midiv"></div>
	<button type="button" onclick="ejecutarajax()">Ejecutar</button>
			hello madafakas!!!!!	
</body>
</html>		