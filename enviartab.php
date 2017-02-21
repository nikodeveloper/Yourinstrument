<?php
// Recoge el comentario del formulario
$comentario = $_REQUEST["comentario"];
// Recoge el nombre del fichero que se habrá indicado en el formulario
$fichero = $_FILES["fichero"]["name"];
// Recoge la ubicación temporal del fichero en el servidor
$tipo = "Tablatura";
$fichero_tmp = $_FILES["fichero"]["tmp_name"];
$instrumento = $_REQUEST["instrumento"];
$artista = $_REQUEST["artista"];
 
$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
$comentario = str_replace($exp_reg,"\\ ", $comentario);
$exp_reg = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡","*","]","[","_",":",";","+","\\","body","html");
$artista = str_replace($exp_reg,"\\ ", $artista);


// Comprueba que se ha indicado un fichero en el formulario
if ($fichero == "") {
echo "¡Error! No se ha especificado ningún fichero\n";
}
 
// Ruta completa (incluido el nombre del fichero)
$destino = "./archivossubidos/" . $fichero;
 
// Copia el fichero al directorio de nuestro servidor, cogiéndolo de la ubicación temporal
if (move_uploaded_file($fichero_tmp, $destino)) {
// Conecta con la Base de Datos e inserta la información de la ruta y comentario del fichero
$conexion = mysql_connect("localhost", "root", "Yy123456");
mysql_select_db("yourinstrument", $conexion);

                    session_start(); 
                      if ($_SESSION["id_usu"]!='')
                      {    
                        $usu = "".$_SESSION['id_usu'];
$sentencia = "INSERT INTO tbl_tablaturas (TAB_FILE, TAB_TITULO, TAB_TIPO, TAB_USU_ID, TAB_CATEGORIA, TAB_ARTISTA) VALUES ('" . $destino . "','" . $comentario . "','" . $tipo ."','" . $usu ."','" . $instrumento ."','" . $artista ."')";
$resultado = mysql_query($sentencia, $conexion);
 if ($resultado) {

header ("Location: http://localhost/tablaturas.php");

 }
}
else {
echo "Se ha producido un error al subir el fichero\n";
}
}
?>