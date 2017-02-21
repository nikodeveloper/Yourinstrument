<?php
include ("conexion.php");

$instrumento = $_REQUEST["instrumento"];
$descripcion = $_REQUEST["descripcion"];
$ano = $_REQUEST["ano"];
$marca = $_REQUEST["marca"];
$modelo = $_REQUEST["modelo"];
$precio = $_REQUEST["precio"];


 
$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
$descripcion = str_replace($exp_reg,"\\ ", $descripcion);
$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
$marca = str_replace($exp_reg,"\\ ", $marca);
$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
$modelo = str_replace($exp_reg,"\\ ", $modelo);


 if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
  {
    echo "ha ocurrido un error";
  } 
  else 
  	{
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

	    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 102400)
	    {

	      //este es el archivo temporal
	      $imagen_temporal  = $_FILES['imagen']['tmp_name'];
	      //este es el tipo de archivo
	      $tipo = $_FILES['imagen']['type'];

	      //leer el archivo temporal en binario
	      $fp     = fopen($imagen_temporal, 'r+b');
	      $data = fread($fp, filesize($imagen_temporal));
	      fclose($fp);

	      //escapar los caracteres
	      $data =@mysql_escape_string($data);

	      				ini_set('error_reporting',E_ALL & ~E_NOTICE);
	                    session_start(); 

                        if ($_SESSION["id_usu"]!='')
                        {    

	    	                $usu = "".$_SESSION['id_usu'];
					        $resultado = mysql_query("INSERT INTO tbl_feria (FER_IMG
				                                                            ,FER_DESCRIPCION
				                                                            ,FER_INSTRUMENTO
				                                                            ,FER_ANO
				                                                            ,FER_MARCA
				                                                            ,FER_MODELO
				                                                            ,FER_PRECIO
				                                                            ,FER_USU_ID
				                                                            ) 
			                                                        VALUES ('$data'
			                                                               ,'$descripcion'
			                                                               ,'$instrumento'
			                                                               ,'$ano'
			                                                               ,'$marca'
			                                                               ,'$modelo'
			                                                               ,'$precio'
			                                                               ,'$usu'
			                                                               )
						                                ") ; 
						    }         
						      	if ($resultado)
						      	{
						        	echo "Su instrumento ha sido copiado exitosamente";
						        ?>

						          <script>              
						            location.href='feria.php';      
						            alert('Su imagen se a cargado con exito. Gracias por compartir con esta esta gran comunidad');
						          </script>
						        
						        <?php 
						      	} 
						      	else 
						      		{
						        	echo "ocurrio un error al copiar el archivo.";
						      		}           
	    }
	    else 
		    {
		  	    echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
		    }         
    }

?>