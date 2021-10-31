<?php

session_start();  
if($_POST){

  if(($_POST['usuario']=="jax")&&($_POST['contraseña']=="sistema")){
    $_SESSION['usuario']="ok";
    $_SESSION['nombreUsuario']="jax";


    header ('Location:inicio.php');
}else{

$mensaje="Error: El usuario o contraseña son incorrectos ";

}
  
 
}


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Administrador </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  </head>
  <body>
   
    <div class="container">
        <div class="row">

        <div class="col-md-4">
          
        </div>

            <div class="col-md-12">
<br/><br/><br/>
                <div class="card">
                    <div class="card-header">
                        Login 
                    </div>
                    <div class="card-body">

                    <?php if(isset($mensaje)){  ?>
                       <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                       </div>
                       <?php } ?>

                    <form method ="POST">
                    <div class = "form-group">
                    <label >Usuario</label>

                    <input type="text" class="form-control" name="usuario"   placeholder="escribe tu usuario">

                    
                    </div>
                    
                    <div class="form-group">  
                    <label  >Password</label>
                    <input type="password" class="form-control" name="contraseña" placeholder="escribe tu contraseña">
                    </div>

                      </br>    </br>      
                      <button type="submit" class="btn btn-primary btn-lg">Entrar al administrador</button>
                    </form>
                    
                    


                    </div>
                    
                </div>



            </div>
            
        </div>
    </div>

  </body>
</html>