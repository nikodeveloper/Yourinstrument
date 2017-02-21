<?php
	
	$nombre 	= $_POST['nombre'];
	$nick		= $_POST['nick'];
	$email 		= $_POST['email'];	
	$pass 		= $_POST['pass'];
	$cpass 		= $_POST['cpass'];
	$pw_enc 	= md5($pass);

	$str_nombre         =trim($_POST['nombre']);
    $str_correo         =trim($_POST['email']);
    $str_username       =trim($_POST['nick']);
    $str_password       =trim($_POST['pass']);

    $tusername = '';
    $tcorreo = '';
    $tnombre = '';

    $exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
    $nombre = str_replace($exp_reg,"\\ ", $nombre);
    $exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
    $nick = str_replace($exp_reg,"\\ ", $nick);
    $exp_reg = array(",","}","{","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[",":",";","+","\\","body","html");
    $email = str_replace($exp_reg,"\\ ", $email);
    $exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
    $pass = str_replace($exp_reg,"\\ ", $pass);
    $exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
    $cpass = str_replace($exp_reg,"\\ ", $cpass);

    function make_safe($edit)
	{
	$edit = addslashes(trim($edit));
	return $edit ;
	}
	
	

    $str_elNombreCompleto = $str_nombre;
    $valemail = make_safe($_POST['email']);	

	if ($pass == $cpass)
	{
		include("conexion.php");

		$conexion = mysql_connect($host_db,$user_db,$pw_db)
		or die("problemas con el server");
		
		mysql_select_db($db,$conexion)
		or die("problemas al conectar base de datos");

		$result=mysql_query("SELECT IFNULL(max(id_usuario+1),1) as maxid FROM tbl_user");   	    

		while ($row = mysql_fetch_array($result)) 
    	{
            $nextid = $row['maxid'];
	    }	    
	    $result1=mysql_query("SELECT tx_username FROM tbl_user WHERE tx_username = '$nick'");     	
	    $result2=mysql_query("SELECT tx_correo FROM tbl_user WHERE tx_correo = '$email' ");     	
		
			if (mysql_fetch_array($result1) > 0) 
	    	{	        
	        ?>
				<script>                    
			        location.href='index.php';        
			        alert('Nick ya registrado. Favor intente con otro.');			          	
			    </script>
			<?php
			mysql_close();
		    }
			    elseif (mysql_fetch_array($result2) > 0) 
		    	{
		        
		        ?>
					<script>                    
				        location.href='index.php';          
				       	alert('Email ya existe en nuestros registros.');   
				    </script>
				<?php
				mysql_close();
			    }
			    else
	    		{
						mysql_query("INSERT INTO yourinstrument.tbl_user 
						    				(tx_nombre											 
											 ,tx_correo
											 ,tx_username
											 )
									 VALUES ('$nombre'									 		
									 	    ,'$email'
									 	    ,'$nick')
										");

						mysql_query ("INSERT INTO yourinstrument.tbl_pass 
					    				(id_usuario
										 ,tx_password)
								 VALUES ('$nextid'					 	    
								 	    ,'$pw_enc')
									");

				   
					//Envio  un correo electronico  de bienvenida
				    $destinatario = $str_correo;                    //A quien se envia
				    $nomAdmin           = 'Yourinstrument';           //Quien envia
				    $mailAdmin      = 'yourinstrument1@gmail.com';       //Mail de quien envia
				    $urlAccessLogin = 'http://localhost/Proyecto/index.php';       //Url de la pantalla de login
				 
				    $elmensaje = "";
				      ?>
					<script>                    
				        location.href='index.php';          
				       	alert('Gracias por Registrarse');   
				    </script>
				<?php
				 
				    $cuerpomsg ='
				    <h2>.::Registrar usuarios::.</h2>
				    <p>Le damos la mas cordial bienvenida a YourInstrument</p>
				    <table border="0" >
			        <tr>
			            <td colspan="2" align="center" >Sus datos de acceso para <a href="'.$urlAccessLogin.'">YourInstrument</a><br></td>
			        </tr>
			        <tr>
			            <td> Nombre </td>
			            <td> <b>'.$str_elNombreCompleto.'</b> </td>
			        </tr>
			        <tr>
			            <td> Nombre de usuario </td>
			            <td> <b>'.$str_username.'</b> </td>
			        </tr>
			        <tr>
			            <td> Password </td>
			            <td> <b>'.$str_password.'</b> </td>
			        </tr>
			        </table> <br/><br/>
			    	<p><b>Gracias por su preferencia, hasta pronto.</b></p> <br><br>';
				 
				    date_default_timezone_set('America/Santiago');
				 
				    //Establecer cabeceras para la funcion mail()
				    //version MIME
				    $cabeceras = "MIME-Version: 1.0\r\n";
				    //Tipo de info
				    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
				    //direccion del remitente
				    $cabeceras .= "From: ".$nomAdmin." <".$mailAdmin.">";    
				     
				    //Si se envio el email
				    mail($destinatario,$asunto,$cuerpomsg,$cabeceras);
							
					?>
					<script>                    
				        location.href='index.php';          
				       	alert('Gracias por ser parte de yourinstrument');
				    </script>
					<?php
				}
			}
	else
	{
					?>
		<script>                    
	        location.href='index.php';          
	       	alert('Datos de Acceso incorrectos, por favor verifique sus datos');
	    </script>
	<?php
	mysql_close();
}
	?>