<?php
include ("conexion.php");
// Recoge el comentario del formulario
$nombrelec = $_REQUEST["nombrelec"];
$link = $_REQUEST["link"];
$instrumento = $_REQUEST["instrumento"];

$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
$nombrelec = str_replace($exp_reg,"\\ ", $nombrelec);

$exp_reg = array(",","}","{","-","|","!","#","$","%","&","(",")","¡","*","]","[",":", "<",">",";","+","\\","body","html");
$link = str_replace($exp_reg,"\\ ", $link);

$url = explode("=", $link);
$embed = "//www.youtube.com/embed/";
$link2 = $embed.$url[1];


	ini_set('error_reporting',E_ALL & ~E_NOTICE);
	session_start(); 
	  	if ($_SESSION["id_usu"]!='')
	  	{    
	    $usu = "".$_SESSION['id_usu'];
		$sentencia = "INSERT INTO tbl_leccion (LEC_TITULO, LEC_CATEGORIA, LEC_USU_ID, LEC_VIDEO) 
						VALUES ('" . $nombrelec . "','" . $instrumento ."','" . $usu ."','" . $link2 ."')";
		$resultado = mysql_query($sentencia, $conexion);
		}

			if ($resultado) {
							header ("Location: http://localhost/lecciones.php");
							}
		else {
				echo "Se ha producido un error al subir la leccion\n";
					}
?>