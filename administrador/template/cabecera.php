<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");

}else{

  if($_SESSION['usuario']=="ok"){
   $nombreUsuario=$_SESSION["nombreUsuario"];
}

} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>


<link rel="stylesheet" href="../css/bootstrap.min.css"/>

</head>
<body>

<?php $url="http://".$_SERVER['HTTP_HOST']."/sistemastrans"?>

<!–– MENU ––>

 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
       

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">


        <li class="nav-item">
        <a class="nav-item nav-link active" href="#">ADminsitrador del sitio  <span class="sr-only">(current)</span></a>
            <span class="visually-hidden">(current)</span> </a>
        </li>

        <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php ">inicio</a>
        </li>

        <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/bahia.php">bahia</a>
        </li>

        <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/pago.php"> pago</a>
       </li>

       <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/parqueadero.php">parqueadero</a>
       </li>

       <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/persona.php"> persona</a>
       </li>

       <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/tarifa.php"> tarifa</a>
       </li>

       <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/tipovehiculo.php"> tipovehiculo</a>
       </li>

       <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/vehiculo.php"> vehiculo</a>
       </li>










        <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">cerrar secion</a>
        </li>

        <li class="nav-item">
        <a class="nav-item nav-link" href="<?php echo $url;?>">visitar sitio</a>
        </li>

        
        

</nav>

</br> 




        <!–– CONTENEDOR  ––>
<div class="container">
</br>

    <div class="row" >