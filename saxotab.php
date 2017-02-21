<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>YourInstrument</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Web de YourInstrument">
    <meta name="author" content="Yourinstrument">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    
    <style type="text/css">    
      body 
      {
        padding-bottom: 40px;
      }
      .brand
      {
        height: 10px; 
        width: 200px;
      }        
    </style>      
  </head>

  <body>
    <div class="navbar navbar-static"><!-- inicio navbar-->
      <div class="navbar-inner" id= "navbar-superior">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php"> <img src="img/logorender.png" alt="YourInstrument" title="logotipo"> </a>
          <!--  <div class="nav-collapse">-->
          <ul class="nav pull-right" style="margin-top: 4px">
            <div class="control-group">
              <?php
                ini_set('error_reporting',E_ALL & ~E_NOTICE);
                session_start(); 
                if ($_SESSION["usuario"]!='')
                {    
                  $usu = "".$_SESSION['usuario']; 
                  echo "<a href='Conf.php'> $usu </a>";
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
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- Fin navbar-->

    <br>

   <div class="container">  
      <div class="navbar " background-color="black"> <!--Inicio navbar-inverse--> 
        <div class="navbar-inner">
          <ul class="nav">
            <li class="disabled"><a><b>Instrumentos</b></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Guitarra<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="guitarracancion.php">Cancion</a></li>
                <li><a href="guitarraleccion.php">Leccion</a></li>
                <li><a href="guitarratab.php">Tablatura</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bajo<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="bajocancion.php">Cancion</a></li>
                <li><a href="bajoleccion.php">Leccion</a></li>
                <li><a href="bajotab.php">Tablatura</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bateria<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="bateriacancion.php">Cancion</a></li>
                <li><a href="baterialeccion.php">Leccion</a></li>
                <li><a href="bateriatab.php">Tablatura</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Piano<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pianocancion.php">Cancion</a></li>
                <li><a href="pianoleccion.php">Leccion</a></li>
                <li><a href="pianotab.php">Tablatura</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Saxofon<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="saxocancion.php">Cancion</a></li>
                <li><a href="saxoleccion.php">Leccion</a></li>
              </ul>
            </li>
            <li>
              <a href="feria.php" class="toggle">Feria De Las Pulgas</a>
            </li>
            <li>
              <a href="contacto.php" class="toggle">Contacto</a>
            </li>
          </ul>
        </div>
      </div><!--fin navbar-inverse-->

<div class="hero-unit">
  <h2>Tablaturas de la semana <small>Las mas vistas de esta semana</small></h2><p><p>
  <div class="row-fluid">
  <?php
    include ("conexion.php");
    include ("modals.php");
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
    $sentencia = "SELECT TAB_FILE, TAB_TITULO , TAB_TIPO FROM tbl_tablaturas WHERE TAB_CATEGORIA = 'saxofon'";
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
  ?>
  </div>
</div><!--fin hero-->

      <div class="row">
        <div class="span4" align= "center">
          <div class="span4">
            <div class="fb-like-box" data-href="http://www.facebook.com/yourinstrumentfans" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
          </div><!-- /.span4 -->
        </div>
        <div class="span4" align= "center">
          <h2>ACCEDE</h2>
          <p>SE PARTE DE ESTA COMUNIDAD</p>
          <img src="img/consigna.png" alt="YourInstrument" title="Consigna"></a>
        </div>
        <div class="span4" align= "center">
          <div class="fb-like-box" data-href="http://www.facebook.com/Inforunners" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
        </div>
      </div>

      <?php
        if (isset($_POST['salir']))
        {
          require("php/log_out.php");
        }
      ?>
    </div><!-- fin container-->

    <div id="footer"  style="background-image: url(img/blanco.jpg);"> 
      <div class="col">
      <!--<div class="gutter" align="center"> -->
        <img src="img/logorender.png" alt="YourInstrument" title="logotipo"> </a><br>
        <ul><li class="footerList"><a class="" data-toggle="modal" href="#Mision">Misión y Visión</a></li></ul> 
     <!-- </div> -->
    </div>
        <div class="col"> 
          <ul> 
            <li class="footerIconWEB" align="center">PARTNERS</li> 
            <li class="footerList"><a href="http://inforunners.cl/" align="center">Inforunners</a></li>
          </ul> 
        </div> 
        <div class="col"> 
          <ul> 
            <li class="footerIconCONTACT" align="center">DEVELOPERS</li> 
            <li class="c2">Nicolás Celis:<br>n.celis@hotmail.com</li> 
            <li class="c2">Victor Salas:<br>soul.of.fallen@gmail.com</li>        
          </ul> 
        </div>
        <div id="footerFooter">
          YourInstrument Lessons&nbsp;&nbsp;|&nbsp;&nbsp;
          <span class="red"><a href="contacto.php">Contactenos</a></span>
          &nbsp;&nbsp;|&nbsp;&nbsp;
          <span class="lightGrey">&copy;YourInstrument 2014</span></p>
        </div>
      </div> 
    </div>  

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