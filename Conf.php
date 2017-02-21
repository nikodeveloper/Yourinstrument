<html lang="en">
  <head>
    <?php
      include("conexion.php");
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
                    echo "<a href='perfil.php'> $usu </a>";
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

    <br>
    <div class="container">
      
      <div class="well span2">
        <ul class="nav nav-list">
          <li class="nav-header"><h4><center>Mi Perfil</center></h4></li>
          <li class="divider"></li>
          <li><a href="ChanelVideos.php">Videos</a></li>
          <li><a href="tablaturas.php">Tablaturas</a></li>
          <li><a href="lecciones.php">Lecciones </a></li>
          <li class="divider"></li>
          <li><a href="UploadVideo.php">Subir Video</a></li>
          <li><a href="subirlecciones.php">Subir Leccion</a></li>
          <li><a href="subirtablaturas.php">Subir Tablatura</a></li>
          <li class="divider"></li>
          <li  class="active"><a href="Conf.php">Configuraciones</a></li>
        </ul>
      </div>
      <!-- Fin menu lateral-->

      <div class="span8 well" style="background-color:#F2F2F2" align="centers">        
        <form action="enviarimagen.php" enctype="multipart/form-data" method="post">
          <h4>Perfil de <?php echo $usu; ?></h4><p><p>
          <table>
            <tbody>
              <tr>
                <td>Seleccione Imagen :</td>
                <td></td>
              </tr>
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
      
      <div class="span8 well" style="background-color:#F2F2F2" align="center">        
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
                <li class="span2,5" align="center">
                  <a href="#" class="thumbnail">
                    <img src="mostrarimagenes.php? id=<?php echo $imagen ?>" width="200" height="100"  class="img-circle"/>
                  </a>
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
    </div>
  </body>
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
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>    
    <script>
     $('#login').modal({
      keyboard: true
      backdrop:false
    })
    </script>
    <script>
     $('#registro').modal({
      keyboard: true
      backdrop:false
      })
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script src="js/holder.js"></script>
</html>