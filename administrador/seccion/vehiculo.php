
<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 






$txtIdVehiculo=(isset($_POST['txtIdVehiculo']))?$_POST['txtIdVehiculo']:"";
$txtMarca=(isset($_POST['txtMarca']))?$_POST['txtMarca']:"";
$txtIdPersona=(isset($_POST['txtIdPersona']))?$_POST['txtIdPersona']:"";
$txtIdTipo=(isset($_POST['txtIdTipo']))?$_POST['txtIdTipo']:"";
$txtPlaca=(isset($_POST['txtPlaca']))?$_POST['txtPlaca']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO vehiculo (IdVehiculo,Marca,IdPersona,IdTipo,Placa) 
        VALUES (:IdVehiculo,:Marca,:IdPersona,:IdTipo,:Placa	);");
         $sentenciaSQL->bindParam(':IdVehiculo',$txtIdVehiculo);
        $sentenciaSQL->bindParam(':Marca',$txtMarca);
        $sentenciaSQL->bindParam(':IdPersona',$txtIdPersona);
        $sentenciaSQL->bindParam(':IdTipo',$txtIdTipo);
          $sentenciaSQL->bindParam(':Placa',$txtPlaca);
        $sentenciaSQL->execute();
        header("Location:vehiculo.php");
           break;

        
            case "Cancelar":
                header("Location:vehiculo.php");
                //echo "presionado boton Cancelar";
                break;

                case "Borrar":
                  

                    $sentenciaSQL=$conexion->prepare("DELETE FROM vehiculo WHERE IdVehiculo=:IdVehiculo ");
                     $sentenciaSQL->bindParam(':IdVehiculo',$txtIdVehiculo);
                     $sentenciaSQL->execute();
                     header("Location:vehiculo.php");
 
                     
                     //echo "presionado boton Borrar";
                     break;
 
                
                            



}

$sentenciaSQL=$conexion->prepare("SELECT *FROM vehiculo");
$sentenciaSQL->execute();
$listavehiculo=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario de Vehiculo
    </div>
    <div class="card-body">
        
    Formulario de Vehiculo
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdVehiculo">Id Vehiculo :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdVehiculo; ?>" name="txtIdVehiculo" id="txtIdVehiculo" placeholder="Id Vehiculo">
    </div>

    <div class = "form-group">
    <label for="txtMarca">Marca:</label>
    <input type="text" class="form-control" value="<?php echo $txtMarca; ?>" name="txtMarca" id="txtMarca" placeholder="Marca">
    </div>


    <div class = "form-group">
    <label for="txtIdPersona">Id Persona:</label>
    <input type="text" class="form-control" value="<?php echo $txtIdPersona; ?>" name="txtIdPersona" id="txtIdPersona" placeholder="Id Persona">
    </div>

    <div class = "form-group">
    <label for="txtIdTipo">Id Tipo:</label>
    <input type="text" class="form-control" value="<?php echo $txtIdTipo; ?>" name="txtIdTipo" id="txtIdTipo" placeholder="Id Tipo">
    </div>

    <div class = "form-group">
    <label for="txtPlaca">Placa:</label>
    <input type="text" class="form-control" value="<?php echo $txtPlaca; ?>" name="txtPlaca" id="txtPlaca" placeholder="Placa">
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
                <th>IdVehiculo</th>
                <th>Marca</th>
                <th>IdPersona</th>
                <th>IdTipo</th>
                <th>Placa</th>
                

              
       	
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listavehiculo as $vehiculoo){ ?>
            <tr>
                <td ><?php echo $vehiculoo['IdVehiculo'] ?></td>
                <td ><?php echo $vehiculoo['Marca'] ?></td>
                <td><?php echo $vehiculoo['IdPersona']; ?></td>
                <td><?php echo $vehiculoo['IdTipo']; ?></td>
                <td><?php echo $vehiculoo['Placa']; ?></td>
               

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="txtIdVehiculo" id="txtIdVehiculo" value="<?php echo $bahias['IdVehiculo']; ?>"/>
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



      
        


  
  










