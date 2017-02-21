<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>YourInstrument</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Web de YourInstrument">
    <meta name="author" content="Yourinstrument">

    <link href="css/bootstrap.css" rel="stylesheet">

  </head>

  <body>
     
    
        <?php
	     include("conexion.php");
	
		 
		 mysql_query("SET NAMES 'utf8'");
		 function limpiarCadena($valor)
    {
	     $valor = str_ireplace("SELECT","",$valor);
	     $valor = str_ireplace("COPY","",$valor);
	     $valor = str_ireplace("DELETE","",$valor);
	     $valor = str_ireplace("DROP","",$valor);
	     $valor = str_ireplace("DUMP","",$valor);
	     $valor = str_ireplace(" OR ","",$valor);
	     $valor = str_ireplace("%","",$valor);
	     $valor = str_ireplace("LIKE","",$valor);
	     $valor = str_ireplace("--","",$valor);
	     $valor = str_ireplace("^","",$valor);
	     $valor = str_ireplace("[","",$valor);
	     $valor = str_ireplace("]","",$valor);
	     $valor = str_ireplace("\\","",$valor);
	     $valor = str_ireplace("!","",$valor);
	     $valor = str_ireplace("¡","",$valor);
	      $valor = str_ireplace("?","",$valor);
	      $valor = str_ireplace("=","",$valor);
	      $valor = str_ireplace("&","",$valor);
	      return $valor;
    }
		 // selecciona la edicion 
		 
		 $f_nom=addslashes(limpiarCadena($_POST['f_nom']));
		 $f_mail=addslashes(limpiarCadena($_POST['f_mail']));
		 $f_asunto=addslashes(limpiarCadena($_POST['f_asunto']));
		 $f_mensaje=addslashes(limpiarCadena($_POST['f_mensaje']));
	     
		 // envia mail
	
	     $destinatario = "yourinstrument1@gmail.com"; 
         $asunto = "Contacto comercial "; 
         $cuerpo = "Nombre: ".$f_nom."<br> Mail: ".$f_mail." <br>Asunto: ".$f_asunto."<br> Mensaje: ".$f_mensaje;
	
	     $headers = "MIME-Version: 1.0\r\n"; 
         $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

         //Dirección del remitente 
         $headers .= "From: YourInstrument <yourinstrument1@gmail.com>\r\n"; 

         //Dirección de respuesta (Puede ser una diferente a la de pepito@mydomain.com)
         $headers .= "Reply-To: n.celis@hotmail.com\r\n"; 

         //direcciones que recibián copia 
         $headers .= "Cc: soul.of.fallen@gmail.com,n.celis@hotmail.com \r\n"; 


 
	
	      mail($destinatario,$asunto,$cuerpo,$headers); 
		  
		  
	
	 
	 ?>
   
       <script language="JavaScript" type="text/javascript">

            var pagina="http://localhost/index.php"
            function redireccionar() {
              location.href=pagina
            } 
            setTimeout ("redireccionar()", 100);

       </script>      
              


  </body>
</html>
