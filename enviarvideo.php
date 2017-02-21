<?php
include ("conexion.php");
// Recoge el comentario del formulario
$nvideo = $_REQUEST["ncancion"];
$nartista = $_REQUEST["nartista"];
$link = $_REQUEST["link"];
$instrumento = $_REQUEST["instrumento"];
$descripcion = $_REQUEST["descripcion"];

$exp_reg4 = array(",","}","{","|","!","#","$","%","&","(",")","=","¡","*","]","[",":", "<",">",";","+","\\","body","html");
$link = str_replace($exp_reg4,"\\ ", $link);

$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[",":",";","+","\\","body","html");
$nartista = str_replace($exp_reg,"\\ ", $nartista);

$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[",":",";","+","\\","body","html");
$nvideo = str_replace($exp_reg,"\\ ", $nvideo);

$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[",":",";","+","\\","body","html");
$descripcion = str_replace($exp_reg,"\\ ", $descripcion);


$url = explode("=", $link);
$embed = "//www.youtube.com/embed/";
$showinfo = "?showinfo=0";
$link2 = $embed . $url[1] . "$showinfo";

ini_set('error_reporting',E_ALL & ~E_NOTICE);
                    session_start(); 
                      if ($_SESSION["id_usu"]!='')
                      {    
                        $usu = "".$_SESSION['id_usu'];

$sentencia = "INSERT INTO tbl_cancion (CAN_TITULO, CAN_ARTISTA, CAN_FILE, CAN_CATEGORIA, CAN_DESCRIPCION, CAN_USU_ID) VALUES ('" . $nvideo . "','" . $nartista ."','" . $link2 ."','" . $instrumento ."','" . $descripcion ."','" . $usu ."')";
$resultado = mysql_query($sentencia, $conexion);
}
 if ($resultado) {
header ("Location: http://localhost/ChanelVideos.php");
 }
else {
echo "Se ha producido un error al subir el video\n";
}
?>