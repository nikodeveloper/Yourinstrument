<html lang="en">
  <head>
    <?php
      include("conexion.php");
      include ("modals.php");
    ?>
    <meta charset="utf-8">
    <title>YourInstrument</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Web de YourInstrument">
    <meta name="author" content="Yourinstrument">

    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-bottom: 40px;
        }
        .brand
        {
          height: 10px; 
          width: 200px;
        }    
      </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-static">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="brand" href="index.php"> <img src="img/logorender.png" alt="YourInstrument"> </a>          
          
          <div class="nav-collapse">                                      
            <ul class="nav pull-right" style="margin-top: 4px">
              <div class="control-group">
                <?php
                  ini_set('error_reporting',E_ALL & ~E_NOTICE);
                  session_start(); 
                  if ($_SESSION["usuario"]!='')
                  {    
                    $usu = "".$_SESSION['usuario']; 
                    $idusu = "".$_SESSION['id_usu'];
                    echo "<a href='Perfil.php'><button type='button' class='btn btn-primary'> $usu</button> </a>";
                    echo "&nbsp&nbsp<a href='log_out.php'><button type='submit' class='btn'> Cerrar Sesion </button></a>";                       
                  }
                  else
                  {
                    echo '<a class="btn" data-toggle="modal" href="#login">Login </a>&nbsp&nbsp';
                    echo '<a class="btn" data-toggle="modal" href="#registro" >Registro</a>';
                  }
                ?>
              </div>                
            </ul> 
          </div>
          <div class="nav-collapse collapse">
            <!--<form class="navbar-search" action="">
          <input type="text" class="search-query span4" placeholder="Buscar">
          </form>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Termino barra menu -->
    
    <div class="container">
      <div class= "row-fluid">      
        <div class="well span3">
          <form action="Perfil.php" name="perfil" method="POST">
             <ul class="nav nav-list">
                <li class="nav-header"><h4>Mi Perfil</h4></li>
                <li class="divider"></li>
                <?php

                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Videos=True' name ='Videos'>Videos</a></li>";
                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Tablaturas=True' name ='Tablaturas'>Tablaturas</a></li>";
                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Lecciones=True' name ='Lecciones'>Lecciones</a></li>";
                echo "<li class='divider'></li>";
                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Subir_Video=True' name ='Subir_Video'>Subir Video</a></li>";
                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Subir_Leccion=True' name ='Subir_Leccion'>Subir Leccion</a></li>";
                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Subir_Tablatura=True' name ='Subir_Tablatura'>Subir Tablatura</a></li>";
                echo "<li class='divider'></li>";                
                echo "<li><a href='Perfil.php?idusu=$Usersid&name=$Usersnames&Configuraciones=True' name ='Configuraciones'>Configuraciones</a></li>";
              ?>
              
              </ul>
            </form>
          
          </div><!-- Fin menu lateral-->
       
        <?php
          
        if( isset( $_GET['Videos'] ))
        { 
        
        echo"<div class='span9 well' style='background-color:#F2F2F2'>";
        echo"<center><h4>Mis Videos</h4></center>";
         
            $variable = "SELECT usu.id_usuario
            FROM tbl_user usu, tbl_cancion canc
            WHERE usu.tx_username = '$usu'
            and usu.id_usuario = canc.can_usu_id
            ";
            $resultado1 = mysql_query($variable, $conexion);
            if ($resultado1) {
              // Recorre todas las filas de la tabla y carga la información en la página web
              while ($fila = mysql_fetch_array($resultado1)) {
              error_reporting(E_ALL ^ E_NOTICE);
              $id_usu = $fila["id_usuario"];
                                                              }
                              }
            $sentencia = "SELECT CAN_TITULO, CAN_ARTISTA , CAN_FILE, CAN_USU_ID FROM tbl_cancion WHERE CAN_USU_ID =  $id_usu LIMIT 0, 3" ;
            $resultado = mysql_query($sentencia, $conexion);
            
            
             if ($resultado) {
              // Recorre todas las filas de la tabla y carga la información en la página web
              while ($fila = mysql_fetch_array($resultado)) {
              $ruta = $fila["CAN_FILE"];
              $artista = $fila["CAN_ARTISTA"];
              $titulo = $fila["CAN_TITULO"];
              $visitas = $fila["CAN_VISITAS"];
              echo "<iframe width='230' height='180' src= ". $ruta . " frameborder='0' allowfullscreen></iframe>";
              echo "           ";
                                                            }
                              }
        
        echo"</div>";  
        echo"</div>";//fin div 9
      }

       if( isset( $_GET['Tablaturas'] ))
        { 
        
        echo"<div class='span9 well' style='background-color:#F2F2F2'>";
        echo"<h4><center>Mis Tablaturas</center></h4>";
    
      $variable = "SELECT usu.id_usuario
      FROM tbl_user usu, tbl_tablaturas tabs
      WHERE usu.tx_username = '$usu'
      and usu.id_usuario = tabs.tab_usu_id
      ";
      $resultado1 = mysql_query($variable, $conexion);
      if ($resultado1) {
      // Recorre todas las filas de la tabla y carga la información en la página web
      while ($fila = mysql_fetch_array($resultado1)) {
      error_reporting(E_ALL ^ E_NOTICE);
      $id_usu = $fila["id_usuario"];
                                                      }
                        }
      $sentencia = "SELECT TAB_FILE, TAB_TITULO , TAB_TIPO FROM tbl_tablaturas WHERE tab_usu_id = $id_usu ";
      $resultado = mysql_query($sentencia, $conexion);
      if ($resultado) {
      // Recorre todas las filas de la tabla y carga la información en la página web
      while ($fila = mysql_fetch_array($resultado)) {
      $ruta = $fila["TAB_FILE"];
      $comentario = $fila["TAB_TITULO"];
      $tipo = $fila["TAB_TIPO"];
      echo "<a href=" . $ruta . "> Descargar   </a>" . $tipo  . "     " . $comentario  . "<br>";
                                                    }
                      }
    
        
        echo"</div>";  
        echo"</div>";//fin div 9
      }

      if( isset( $_GET['Lecciones'] ))
        { 
        
        echo"<div class='span9 well' style='background-color:#F2F2F2'>";
        echo"<h4><center>Mis Lecciones</center></h4>";
         
      $variable = "SELECT usu.id_usuario
      FROM tbl_user usu, tbl_leccion lecc
      WHERE usu.tx_username = '$usu'
      and usu.id_usuario = lecc.lec_usu_id
      ";

      $resultado1 = mysql_query($variable, $conexion);
      if ($resultado1) {
                          // Recorre todas las filas de la tabla y carga la información en la página web
                          while ($fila = mysql_fetch_array($resultado1)) 
                          {
                          error_reporting(E_ALL ^ E_NOTICE);
                          $id_usu = $fila["id_usuario"];
                          }
                        }
      $sentencia = "SELECT LEC_TITULO , LEC_VIDEO, LEC_USU_ID FROM tbl_leccion WHERE LEC_USU_ID =  $id_usu LIMIT 0, 6 ";
      $resultado = mysql_query($sentencia, $conexion);
      if ($resultado){
                      while ($fila = mysql_fetch_array($resultado))
                        {
                          $ruta = $fila["LEC_VIDEO"];
                          $titulo = $fila["LEC_TITULO"];
                          echo "<iframe width='230' height='180' src= ". $ruta ." frameborder='0' allowfullscreen></iframe>";
                          echo "           ";
                        }
                      }
        echo"</div>";  
        echo"</div>";//fin div 9
      }


      if( isset( $_GET['Subir_Video'] ))
        {
          ?>
           <div class="span9 well" style="background-color:#F2F2F2">         
           <form action="enviarvideo.php" enctype="multipart/form-data" method="post">
            <h4><center>Subir Video</center></h4>
              <table>
                  <tr>
                    <th>Artista</th>
                    <th>Nombre Cancion</th>
                  </tr>
                  <tr>
                    <th><input name="nartista" type="text" required="required" /></th>
                    <td><input name="ncancion" type="text" required="required"/></td>
                  </tr>
                  <tr>
                    <th>URL Video</th>
                    <th>Seleccione Instrumento</th>
                  </tr>
                  <tr>
                    <th><input name="link" type="text" required="required"/></th>
                    <th><select name="instrumento">
                        <option value="">Seleccione</option>
                        <option value="guitarra">Guitarra</option>
                        <option value="bajo">Bajo</option>
                        <option value="bateria">Bateria</option>  
                        <option value="piano">Piano</option>
                        <option value="saxofon">Saxofon</option>
                        </select></th>
                  </tr>
                  <tr>
                    <td><font color="red">http://www.youtube.com/watch?v=xIH3pbKH9fg</font><td>   
                  </tr>
                     <th>Descripcion</th>
                  <tr>
                      <th><textarea rows="5" cols="70" name="descripcion" required="required"></textarea></th>
                      <th><input type="submit" value="Enviar"></th>
                  </tr> 
                   
               </table>
            </form> 
         
        </div>
      
      <?php
      }
      if( isset( $_GET['Subir_Leccion'] ))
        { 
        ?>
        <div class="span9 well" style="background-color:#F2F2F2" >
          <form action="enviarleccion.php" enctype="multipart/form-data" method="post">
            <h4><center>Subir Leccion</center></h4>
              <table>
                  <tr>
                    <th>Nombre Leccion</th>
                    <th>Seleccione Instrumento</th>
                  </tr>
                  <tr>
                    <th><input name="nombrelec" type="text" required="required"/></th>
                    <th><select name="instrumento" required="required">
                        <option value="">Seleccione</option>
                        <option value="guitarra">Guitarra</option>
                        <option value="bajo">Bajo</option>
                        <option value="bateria">Bateria</option>  
                        <option value="piano">Piano</option>
                        <option value="saxofon">Saxofon</option>
                        </select></th>
                  </tr>
                  <tr>
                    <th>Url Video</th>
                  </tr>
                  <tr>
                    <th><input name="link" type="text" required="required"/></th>
                     <th><input type="submit" value="Enviar"></th>
                  </tr>  
                  <tr>  
                    <td><font color="red">http://www.youtube.com/watch?v=xIH3pbKH9fg</font><td>   
                  </tr>
                 
                   
              </table>
          </form> 
        </div>
      <?php
      }

      if( isset( $_GET['Subir_Tablatura'] ))
            { 
            ?>
         <div class="span9 well" style="background-color:#F2F2F2" align="centers">
           <form action="enviartab.php" enctype="multipart/form-data" method="post">
              <h4><center>Subir Tablatura</center></h4><p>
                <table>
                  <tbody>
                  <tr>
                    <td>Tablatura:</td>
                    <td><input name="fichero" type="file" required="required"/></td>
                  </tr>
                  <tr>
                    <td>Cancion:</td>
                    <td><input name="comentario" type="text" required="required"/></td>
                  </tr>
                  <tr>
                    <td>Artista:</td>
                    <td>
                    <input name="artista" type="text" required="required"/></td>
                  </tr>
                  <tr>
                    <td>Instrumento:</td>
                    <td>
                    <select name="instrumento" required="required">
                                              <option value="">Seleccione</option>
                                              <option value="guitarra">Guitarra</option>
                                              <option value="bajo">Bajo</option>
                                              <option value="bateria">Bateria</option>  
                                              <option value="piano">Piano</option>
                                              </select></td>
                  </tr>
                  <tr>
                    <td><input type="submit" value="Enviar" /></td>
                  </tr>
                  </tbody>
                </table>
          </form>
        </div>

      <?php
      }
     

     if( isset( $_GET['Configuraciones'] ))
            { 
            ?>
    <div class="span9 well" style="background-color:#F2F2F2" align="centers">        
      <form action="enviarimagen.php" enctype="multipart/form-data" method="post">
          <h4><center>Perfil de <?php echo $usu; ?></center></h4><p><p>
        <table>
          <tbody>
              <tr>
                <td>Seleccione Imagen :</td><p>
                <td></td>
              </tr><tr> <td> </td></tr>
              <tr>  
                <th><input type="file" name="imagen" id="imagen"/></th>
              </tr>
              <tr>
                <td><input type="submit" value="Enviar" /></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      
      <div class="span9 well" style="background-color:#F2F2F2" align="center">        
      <?php 
        echo '<div class="row">';
         echo '<div class = "span8 offset2">';
            echo '<ul class="thumbnails">';
             echo '<div class="row">';

                include("conexion.php");


                $query = "SELECT id_imagen FROM tbl_imagenes where id_usuario = $idusu";
                $consulta = mysql_query($query);                
               //VERIFICAR DEMOSTRACION DE IMAGEN

                while($row = mysql_fetch_array($consulta))
                {
                  $imagen = $row['id_imagen'];                        
                
                ?>
                <li class="span2,5" align="left">
                    <img src="mostrarimagenes.php? id=<?php echo $imagen ?>" width="200" height="100"  class="img-circle"/>
                  
                </li>
                
                <?php                
                }
               //VERIFICAR!!!
                echo '</div>';
              echo '</ul>';            
          echo '</div>';
        echo '</div>';

        mysql_close($conexion);

        ?>          
      </div>
      <?php
      }
     ?>
    </div><!-- FIN row-fluid-->
  </div><!-- FIN CONTAINER-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>   
    <script src="js/holder.js"></script>

  </body>
</html>