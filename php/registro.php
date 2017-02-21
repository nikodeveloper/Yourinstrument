<?php
	$name = $_POST['name'];
	$email	  = $_POST['email'];
	$pass	  = $_POST['pass'];
	$rpass	  = $_POST['rpass'];
	$date	  = $_POST['date'];
	$reqlen	  = strlen($name) * strlen($email) * strlen($pass) * strlen($rpass) * strlen($date);
	if($reqlen > 0){
		if ($pass === $rpass)
		{
			include("conexion.php");
			$con = mysql_connect($host,$user,"")
			or die("problemas con el server");

			mysql_select_db($db,$con)
			or die("problemas al conectar base de datos");
			//$pass = md5($pass);
			mysql_query("INSERT INTO USUARIOS VALUES('','$name','$email','$pass','$date','img/predeterminada.jpeg')");
			mysql_close();
			echo "Su registro se a completa con exito";

		}
		else
		{
		echo "Por favor, verifique que las dos contraseñas son correctas.";	
		}
	}
	else{
		echo "Por favor, rellene todos los campos requeridos.";
	}
?>