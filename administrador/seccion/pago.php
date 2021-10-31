
<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 








$txtIdPago=(isset($_POST['txtIdPago']))?$_POST['txtIdPago']:"";
$txtIdBahia=(isset($_POST['txtIdBahia']))?$_POST['txtIdBahia']:"";
$txtIdVehiculo=(isset($_POST['txtIdVehiculo']))?$_POST['txtIdVehiculo']:"";
$txtTiempo=(isset($_POST['txtTiempo']))?$_POST['txtTiempo']:"";
$txtCosto=(isset($_POST['txtCosto']))?$_POST['txtCosto']:"";
$txtFecha=(isset($_POST['txtFecha']))?$_POST['txtFecha']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO pago (IdPago,IdBahia,IdVehiculo,Tiempo,Costo,Fecha) 
        VALUES (:IdPago,:IdBahia,:IdVehiculo,:Tiempo,:Costo,:Fecha);");
         $sentenciaSQL->bindParam(':IdPago',$txtIdPago);
         $sentenciaSQL->bindParam(':IdBahia',$txtIdBahia);
         $sentenciaSQL->bindParam(':IdVehiculo',$txtIdVehiculo);
         $sentenciaSQL->bindParam(':Tiempo',$txtTiempo);
         $sentenciaSQL->bindParam(':Costo',$txtCosto);
         $sentenciaSQL->bindParam(':Fecha',$txtFecha);
      
        $sentenciaSQL->execute();
        header("Location:pago.php");
           break;

        
            case "Cancelar":
                header("Location:pago.php");
                //echo "presionado boton Cancelar";
                break;

                case "Borrar":
                  

                    $sentenciaSQL=$conexion->prepare("DELETE FROM pago WHERE IdPago=:IdPago ");
                     $sentenciaSQL->bindParam(':IdPago',$txtIdPago);
                     $sentenciaSQL->execute();
                     header("Location:pago.php");
 
                     
                     //echo "presionado boton Borrar";
                     break;

                
                            



}

$sentenciaSQL=$conexion->prepare("SELECT *FROM pago");
$sentenciaSQL->execute();
$listapago=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario de Pago
    </div>
    <div class="card-body">
        
    Formulario de bahia
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdPago">Id Pago :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdPago; ?>" name="txtIdPago" id="txtIdPago" placeholder="Id Pago">
    </div>

    <div class = "form-group">
    <label for="txtIdBahia">Id Bahia:</label>
    <input type="text" class="form-control" value="<?php echo $txtIdBahia; ?>" name="txtIdBahia" id="txtIdBahia" placeholder="Id Bahia">
    </div>


    <div class = "form-group">
    <label for="txtIdVehiculo">Id Vehiculo:</label>
    <input type="text" class="form-control" value="<?php echo $txtIdVehiculo; ?>" name="txtIdVehiculo" id="txtIdVehiculo" placeholder="Id Vehiculo">
    </div>

    <div class = "form-group">
    <label for="txtTiempo">Tiempo:</label>
    <input type="text" class="form-control" value="<?php echo $txtTiempo; ?>" name="txtTiempo" id="txtTiempo" placeholder="Tiempo">
    </div>

    <div class = "form-group">
    <label for="txtCosto">Costo:</label>
    <input type="text" class="form-control" value="<?php echo $txtCosto; ?>" name="txtCosto" id="txtCosto" placeholder="Costo">
    </div>

    <div class = "form-group">
    <label for="txtFecha">Fecha:</label>
    <input type="text" class="form-control" value="<?php echo $txtFecha; ?>" name="txtFecha" id="txtFecha" placeholder="Fecha">
    </div>

    
    <div class="btn-group" role="group" aria-label="">
        <button type="submit"  name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
        <button type="submit"  name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
        
        

        
    </div>

    </form>
    </div>
    
</div>
</div>



<div class="col-md-7">
    <table class="table ">
        <thead>
        <tr >
                <th>IdPago</th>
                <th>IdBahia</th>
                <th>IdVehiculo</th>
                <th>Tiempo</th>
                <th>Costo</th>
                <th>Fecha</th>

                
       	
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listapago as $pagoo){ ?>
            <tr>
                <td ><?php echo $pagoo['IdPago'] ?></td>
                <td ><?php echo $pagoo['IdBahia'] ?></td>
                <td><?php echo $pagoo['IdVehiculo']; ?></td>
                <td><?php echo $pagoo['Tiempo']; ?></td>
                <td><?php echo $pagoo['Costo']; ?></td>
                <td><?php echo $pagoo['Fecha']; ?></td>

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="txtIdPago" id="txtIdPago" value="<?php echo $bahias['IdPago']; ?>"/>
                     <input type="submit" name= "accion" value="Borrar" class="btn btn-danger"/>

                     

                    </form>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>





<?php include ('../template/pie.php');?>




</div>



      
        


  
  










