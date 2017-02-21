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
                    echo "<a href='perfil.php'> $usu </a>";
                    echo "&nbsp&nbsp<a href='log_out.php'><button type='submit' class='btn'> Cerrar Sesion </button></a>";                       
                  }
                  else
                  {
                    echo "<a class='btn' data-toggle='modal' href='#login'>Login</a>&nbsp&nbsp";
                    echo "<a class='btn' data-toggle='modal' href='#registro'>Registro</a>";
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
    </div><!-- Termino barra menu -->

    <div class="container">
      <div class= "row-fluid">  

        <div class="well span3">
          <form action="Perfil.php" name="perfil" method="POST">
              <ul class="nav nav-list">
                <li class="nav-header"><h4>Menu Feria</h4></li>
                <li class="divider"></li>
                <?php

                echo "<li><a href='feria.php?idusu=$Usersid&name=$Usersnames&Producto=True' name ='Producto'>Producto</a></li>";
                echo "<li><a href='feria.php?idusu=$Usersid&name=$Usersnames&Permutar=True' name ='Permutar'>Permutar</a></li>";
                echo "<li class='divider'></li>";
                ini_set('error_reporting',E_ALL & ~E_NOTICE);
                session_start(); 
                if ($_SESSION["usuario"]!='')
                {    
                  $usu = "".$_SESSION['usuario']; 
                  $idusu = "".$_SESSION['id_usu'];
                  echo "<li><a href='feria.php?idusu=$Usersid&name=$Usersnames&Subir_Instrumento=True' name ='Subir_Instrumento'>Subir Instrumento</a></li>";     
                  echo "<li class='divider'></li>";
                  echo "<li><a href='feria.php?idusu=$Usersid&name=$Usersnames&Mis_Productos=True' name ='Mis_Productos'>Mis Instrumentos</a></li>";                 
                }
              ?>
              </ul>
          </form>
        </div><!-- Fin menu lateral-->
  
      <?php
       if( isset( $_GET['Mis_Productos'] ))
        { 
          echo"<div class='span9 well' style='background-color:#F2F2F2' align='center'>";        
            echo '<div class="row">';
             echo '<div class = "span9 offset3">';
                echo '<ul class="thumbnails">';
                  echo '<div class="row">';
                  echo "<h4>Mis Instrumentos</h4><p><p>";

                    $query = "SELECT FER_IMG, FER_USU_ID FROM tbl_feria where $idusu = FER_USU_ID";
                    $consulta = mysql_query($query);                
                   //VERIFICAR DEMOSTRACION DE IMAGEN
                    while($row = mysql_fetch_array($consulta))
                    {
                      $imagen = $row['FER_IMG'];                        
                    
                    ?>
                    <li class="span2,5" align="left">
                        <img src="mostrarimagenes.php? id=<?php echo $imagen ?>" width="200" height="100"/>
                    </li>
                    
                    <?php                
                    }
                    echo '</div>';
                  echo '</ul>';            
              echo '</div>';
            echo '</div>';
          echo '</div>';
        }

        if( isset( $_GET['Producto'] ))
          { 
            echo"<div class='span9 well' style='background-color:#F2F2F2'>";        
              echo '<div class="row">';
               echo '<div class = "span9 offset2">';
                  echo '<ul class="thumbnails">';
                    echo "<h4>Instrumentos</h4><p><p>";

                      $query = "SELECT fer.FER_IMG
                                      ,fer.FER_MARCA
                                      ,fer.FER_MODELO 
                                      ,fer.FER_ANO
                                      ,fer.FER_INSTRUMENTO  
                                      ,fer.FER_DESCRIPCION 
                                      ,usu.tx_username
                                  FROM tbl_feria fer
                                      ,tbl_user usu";
                      $result = mysql_query($query);   
                    
                      while ($fila = mysql_fetch_object($result))    
                      {       
                      
                        $imagen = $fila->FER_IMG; 
                        $marca = $fila->FER_MARCA;
                        $modelo = $fila->FER_MODELO; 
                        $año = $fila->FER_ANO;
                        $instrumento = $fila->FER_INSTRUMENTO;
                        $descripcion = $fila->FER_DESCRIPCION;
                        $username = $fila->tx_username;          
                        
                      
                        echo '<div class="row">';            
                          echo '<div class="span3">';                        
                           echo $imagen;                                  
                          echo '</div>';            
                          echo '<div class="span8">'; 
                            echo '<h4>Marca:</h4> ',$marca,'<br>';
                            echo '<h4>Modelo:</h4> ',$modelo,'<br>';
                            echo '<h4>Descripcion:</h4> ',$descripcion,'<br>';
                            echo '<h4>A&ntildeo:</h4> ',$año,'<br>';
                            echo '<h4>Instrumento:</h4> ',$marca,'<br>';
                            echo '<h4>Instrumento de:</h4> ',"<a href='PerfilesUsers.php?userid=$userid&name=$username'> $username </a>",'<br></br>';
                          echo '</div>';//cierre div span 4
                        echo '</div><p><hr>';//cierre div row

                      echo '</ul>';//cierre ul thumbnails            
                  echo '</div>';//cierre span9
                echo '</div>';//cierre row
              echo '</div>';//cierre div class span9 well

                      }
                      mysql_close($conexion);
          }

          if( isset( $_GET['Subir_Instrumento'] ))
            { 
        ?>
             <div class="span9 well" style="background-color:#F2F2F2" align="centers">
                <form action="subirinstrumento.php" enctype="multipart/form-data" method="post">
                  <h4><center>Subir instrumento</center></h4><p><p>
                  <table>
                    <tbody>
                    <tr>
                      <td>Imagen Instrumento:</td>
                      <td><input name="imagen" type="file" required="required"/></td>
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
                      </select> 
                      </td>
                    </tr>
                    <tr>
                      <td>Descripcion:</td>
                      <td><textarea rows="5" cols="70" name="descripcion" required="required"></textarea></td>
                    </tr>
                    <tr>
                      <td>A&ntildeo:</td>
                      <td><input name="ano" type="number" required="required"/></td>
                    </tr>
                     <tr>
                      <td>Marca:</td>
                      <td><input name="marca" type="text" required="required"/></td>
                    </tr>
                     <tr>
                      <td>Modelo:</td>
                      <td><input name="modelo" type="text" required="required"/></td>
                    </tr>
                    <tr>
                      <td>Precio:</td>
                      <td><input name="precio" type="number" required="required"/></td>
                    </tr>
                    <tr>
                      <td></td><td><center><input type="submit" value="Subir"/></center></td>
                    </tr>
                    </tbody>
                  </table>
                </form>
              </div>
        <?php
        }
        ?>





       


      </div><!-- FIN row-fluid-->    
    </div><!-- container-->

 

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