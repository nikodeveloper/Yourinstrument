
<!--Modal Login-->
<div class="modal hide fade in" id="login" style="display: none;">
      <form action="validarUsuario.php" name="log_usuario" method="POST">
        <div class="modal-header">        
          <a class="close" data-dismiss="modal">×</a>
          <h3>Login</h3>
        </div>
        <div class="modal-body"  align="center">        
          <input type="email" class="input" placeholder="Email" required="required" name="mail">
          <input type="password" class="input" placeholder="Password" required="required" name="pass">    
        </div>
        <div class="modal-footer" align="center">
          <a href="#" class="btn" align="center" data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-primary" name="login">Login</button>
        </div>
      </form> 
    </div>

    <div class="modal hide fade in" id="csesion" style="display: none;">
      <form action="log_out.php" name="log_out" method="POST">
        <div class="modal-header">        
          <a class="close" data-dismiss="modal">×</a>
          <h3>Cerrar Sesion</h3>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn" data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-primary" name="log_out">Cerrar Sesion</button>
        </div>
      </form> 
    </div>  
<!--FIN Modal Login-->


<!--Modal Registro-->
    <div class="modal hide fade in" id="registro" style="display: none;">
      <form action="registro.php" name="reg_usuario" method="POST">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Registo</h3>
        </div>
        <div class="modal-body">        
          <div class="control-group">                             
            <input type="text" class="input-block-level-small" placeholder="Nombre" required="required" name="nombre">              
            <input type="email" class="input-block-level-small" placeholder="nick@correo.com" required="required" name="email"><p> 
            <input type="text" class="input-block-level-small" placeholder="Nickname" required="required" name="nick"><p>              
          </div>        
          <div class="control-group">
            <br></br>            
            <input type="password" class="input-block-level-small" placeholder="Ingrese Constraseña" required="required" name="pass">                
            <input type="password" class="input-block-level-small" placeholder="Repita Constraseña" required="required" name="cpass">              
          </div>       
        </div>
        <div class="modal-footer" align="center">
          <a href="#" class="btn"data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-primary" name="registro">Registro</button>
        </div>
      </form>
    </div>
<!--FIN Modal Registro-->

<!--Modal Mision-Vision-->
    <div class="modal hide fade in" id="Mision" style="display: none;">
      <form action="" name="log_usuario" method="POST">
        <div class="modal-header">        
          <a class="close" data-dismiss="modal">×</a>
          <h2>Mision y Visión</h2>
        </div>
        <div class="modal-body"> 
          <h4><center>“Ser el mejor portal de enseñanza musical en chile”</center></h4><p>
          <h4><center>“Satisfacer a los usuarios de tal manera que sientan<br> que los instrumentos aprendidos han sido de una gran ayuda y utilidad.”</center></h4><p>
        </div>
        <div class="modal-footer" align="center">
          <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
        </div>
      </form> 
    </div>
<!--FIN Modal Mision-Vision-->