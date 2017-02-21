<?php
	
  include("Perfil.php");
  include("conexion.php");
  include ("Zebra_Pagination.php");

  //comprobamos si ha ocurrido un error.
  if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
  {
    echo "ha ocurrido un error";
  } 
  else 
  {
    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
    //y que el tamano del archivo no exceda los 16MB
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

      $query1 = mysql_query("SELECT ifnull(COUNT( * ),0) contador FROM tbl_imagenes WHERE id_usuario = $idusu");

      if(mysql_fetch_array($query1) > 0)
      {
        $resultado = mysql_query("UPDATE tbl_imagenes 
                                     SET tx_imagen = '$data'
                                        ,tx_tipoimagen = '$tipo'
                                   WHERE id_usuario = $idusu
                                ");
      }
      else
      {
        $resultado = mysql_query("INSERT INTO tbl_imagenes (id_usuario
                                                              ,tx_imagen
                                                              ,tx_tipoimagen) 
                                                      VALUES ('$idusu'
                                                             ,'$data'
                                                             ,'$tipo')
                                ") ; 
      }         
      if ($resultado)
      {
        echo "el archivo ha sido copiado exitosamente";
        ?>
          <script>              
            location.href='Perfil.php';      
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