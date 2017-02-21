<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>YourInstrument</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Web de YourInstrument">
    <meta name="author" content="Yourinstrument">
    
    <link href="css/bootstrap.css" rel="stylesheet">
    

    <style>
    .rounded-img{
    border:0;
    border-radius:0px 15px 0px 15px;
    }
    </style>
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
    <style>
    .contacto{
  border: 1px solid #CED5D7;
  border-radius: 6px;
  padding: 45px 45px 20px;
  margin-top: 50px;
  background-color: white;
  box-shadow: 0px 5px 10px #B5C1C5, 0 0 0 10px #EEF5F7 inset;
}
.contacto label{
  display: block; 
  font-weight: bold;
}
.contacto div{
  margin-bottom: 15px;
}
.contacto input[type='text'], .contacto textarea{
  padding: 7px 6px;
  width: 294px;
  border: 1px solid #CED5D7;
  resize: none;
  box-shadow:0 0 0 3px #EEF5F7;
  margin: 5px 0;
}
.contacto input[type='text']:focus, .contacto textarea:focus{
  outline: none;
  box-shadow:0 0 0 3px #dde9ec;
}
.contacto input[type='text'].invalido, .contacto textarea.invalido{
  box-shadow:0 0 0 3px #FFC9C9;
}
.contacto input[type='submit']{
  border: 1px solid #CED5D7;
  box-shadow:0 0 0 3px #EEF5F7;
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: bold;
  text-shadow: 1px 1px 0px white;
  
  background: #e4f1f6; 
  background: -moz-linear-gradient(top, #e4f1f6 0%, #cfe6ef 100%);
  background: -webkit-linear-gradient(top, #e4f1f6 0%,#cfe6ef 100%); 
}
.contacto input[type='submit']:hover{
  background: #edfcff; 
  background: -moz-linear-gradient(top, #edfcff 0%, #cfe6ef 100%);
  background: -webkit-linear-gradient(top, #edfcff 0%,#cfe6ef 100%); 
}
.contacto input[type='submit']:active{
  background: #cfe6ef; 
  background: -moz-linear-gradient(top, #cfe6ef 0%, #edfcff 100%);
  background: -webkit-linear-gradient(top, #cfe6ef 0%,#edfcff 100%);
}
.error{
    background-color: #BC1010;
    border-radius: 4px 4px 4px 4px;
    color: white;
    font-weight: bold;
    margin-left: 16px;
    margin-top: 6px;
    padding: 6px 12px;
    position: absolute;
}
.error:before{
    border-color: transparent #BC1010 transparent transparent;
    border-style: solid;
    border-width: 6px 8px;
    content: "";
    display: block;
    height: 0;
    left: -16px;
    position: absolute;
    top: 8px;
    width: 0;
}
.result_fail{
    background: none repeat scroll 0 0 #BC1010;
    border-radius: 20px 20px 20px 20px;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    text-align: center;
}
.result_ok{
    background: none repeat scroll 0 0 #1EA700;
    border-radius: 20px 20px 20px 20px;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    text-align: center;
}
</style>

     


</head>
<body>


  <div class="navbar navbar-static">
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
                    include ("modals.php");
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
              </div><!-- /.nav-collapse -->
      </div>
    </div>

    
   
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
                      <li><a href="saxotab.php">Tablatura</a></li>
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
            </div>
            
            


          

            <div class="well bg-white padding20 ">
            <div class="grid">
                
                   <img src="img/logorender.png">

                 <form class='contacto' name="f1" method="post" action="enviamsj.php">
                       <legend>Contactenos</legend>
                       <div><label>Tu Nombre:</label><input type='text' name="f_nom" class='nombre' value=''></div>
                       <div><label>Tu Email:</label><input type='text'  name="f_mail" class='email' value=''></div>
                       <div><label>Asunto:</label><input type='text'  name="f_asunto" class='asunto' value=''></div>
                       <div><label>Mensaje:</label><textarea rows='6'  name="f_mensaje" class='mensaje'></textarea></div>
                       <div><input type='submit' value='Enviar Mensaje' class='boton'></div>
                 </form>

             
                 
            </div>


                



            </div>
        </div>
            






<br><br>
        </div>

         <div id="footer"  style="background-image: url(img/blanco.jpg);"> 
      <div class="gutter" align="center"> 
        <img src="img/logorender.png" alt="YourInstrument" title="logotipo"> </a><br>
        <ul><li class="footerList"><a class="" data-toggle="modal" href="#Mision">Misión y Visión</a></li></ul> 
      </div> 
      <!--<div class="columns"> 
        <div class="col"> 
          <ul> 
            <li class="footerIconAW" align="center" color="#FFFFFF"><a href="index.php">YOURINSTRUMENT</a></li>
            <li class="footerList"><a class="" data-toggle="modal" href="#Mision">Misión y Visión</a></li> 
          </ul> 
        </div> -->
        <div class="col"> 
          <ul> 
            <li class="footerIconWEB" align="center"><a href="#">PARTNERS</a></li> 
            <li class="footerList"><a href="#" align="center">Inforunners</a></li>
          </ul> 
        </div> 
        <div class="col"> 
          <ul> 
            <li class="footerIconCONTACT" align="center"><a href="#">DEVELOPERS</a></li> 
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

</body>
</html>