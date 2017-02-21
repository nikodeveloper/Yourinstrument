<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>YourInstrument</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Web de YourInstrument">
    <meta name="author" content="Yourinstrument">

    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-bottom: 40px;
        /*background: url("img/bg2.jpg");*/
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

    <a class="brand" href="index.php"> <img src="img/logorender.png" alt="YourInstrument" title="logotipo"> </a>
          
          <div class="nav-collapse">
                                      
                <ul class="nav pull-right" style="margin-top: 4px">
                  <div class="control-group">
                    <?php
                    ini_set('error_reporting',E_ALL & ~E_NOTICE);
                    session_start(); 
                      if ($_SESSION["usuario"]!='')
                      {    
                        $usu = "".$_SESSION['usuario']; 
                        echo "<a href='Perfil.php'> $usu </a>";
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

<br>
          </div>
        </div>
      </div>
    </div>

      <?php
      $Usersid = "$_GET[userid]";
      $Usersnames = "$_GET[name]";
      ?>
    <div class="container">
      <div class= "row-fluid">      
        <div class="span3">
          <div class="well" style="padding: 8px 0;">
     
            <ul class="nav nav-list">
              <?php echo"<form action='PerfilesUsers.php?userid=$Usersid&name=$Usersnames' name='perfilusers' method='POST'>"; ?>  
                <li class="nav-header"><h4><center>Perfil Usuario</center></h4></li>
                <li class="divider"></li>
                <li><a type='submit' name="Videos_user" value="Videos">Videos</a></li>
                <li><a type='submit' name="Tablaturas" value="Tablaturas">Tablaturas</a></li>
                <li><a type='submit' name="Lecciones" value="Lecciones">Lecciones</a></li>
                <li class="divider"></li>
              </form>
            </ul>
          </div> <!-- /well -->
        </div> <!-- fin span3 -->
   

        <?php
        if( isset( $_POST['Videos_user'] ) && $_POST['Videos_user'] != '' )
        { 
          ?>
 
         <div class="span8" style="background-color:#F2F2F2" >
          <h4>Videos</h4><p>

            <?php
                      
              include ("conexion.php");
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
                $id_usu = $fila["id_usuario"];}
                                }
               
              $sentencia = "SELECT CAN_TITULO, CAN_ARTISTA , CAN_FILE, CAN_USU_ID FROM tbl_cancion WHERE $Usersid = CAN_USU_ID  " ;
              $resultado = mysql_query($sentencia, $conexion);
              if ($resultado) {
                // Recorre todas las filas de la tabla y carga la información en la página web
                while ($fila = mysql_fetch_array($resultado)) {
                $ruta = $fila["CAN_FILE"];
                $artista = $fila["CAN_ARTISTA"];
                $titulo = $fila["CAN_TITULO"];
                $visitas = $fila["CAN_VISITAS"];
                echo "<iframe width='250' height='180' src= ". $ruta . " frameborder='0' allowfullscreen></iframe>";
                echo "           ";
                                                              }
                                }
          }
           ?>
        </div>

        <?php
        if( isset( $_POST['Tablaturas'] ) && $_POST['Tablaturas'] != '' )
        { 
          ?>
          <div class="span8" style="background-color:#F2F2F2" align="centers">
            <h4>Tablaturas</h4>
            <?php
              include ("conexion.php");
              $variable = "SELECT usu.id_usuario
              FROM tbl_user usu, tbl_tablaturas tabs
              WHERE usu.tx_username = '$Usersid'
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
              $sentencia = "SELECT TAB_FILE, TAB_TITULO , TAB_TIPO FROM tbl_tablaturas WHERE $Usersid = tab_usu_id";
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
          }
          ?>
          </div>

        <?php
        if( isset( $_POST['Lecciones'] ) && $_POST['Lecciones'] != '' )
        { 
          ?>
          <div class="span8" style="background-color:#F2F2F2">
            <h4>Lecciones</h4><p>
            <?php
                // Conecta con la Base de Datos
                include ("conexion.php");
                mysql_select_db("yourinstrument", $conexion);
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
                $sentencia = "SELECT LEC_TITULO , LEC_VIDEO, LEC_USU_ID FROM tbl_leccion WHERE $Usersid = LEC_USU_ID  LIMIT 0, 6 ";
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
          }
            ?>
          </div>

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
    <script src='js/funciones_contac.js'></script>

    <script>
    $('#login').modal
    ({
      keyboard: true
      backdrop:false
    })
    </script>

    <script>
    $('#registro').modal
    ({
      keyboard: true
      backdrop:false
    })
    </script>   

    <script>
    (function(d, s, id) 
    {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }
    (document, 'script', 'facebook-jssdk'));
    </script>
    
    <script src="js/holder.js"></script>

  </body>
</html>