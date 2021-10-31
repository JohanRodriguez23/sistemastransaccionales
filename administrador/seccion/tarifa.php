
<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 





$txtIdTarifa=(isset($_POST['txtIdBahtxtIdTarifaia']))?$_POST['txtIdTarifa']:"";
$txtCosto=(isset($_POST['txtCosto']))?$_POST['txtCosto']:"";
$txtIdTipo=(isset($_POST['txtIdTipo']))?$_POST['txtIdTipo']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO tarifa (IdTarifa,Costo,IdTipo	) 
        VALUES (:IdTarifa,:Costo,:IdTipo	);");
         $sentenciaSQL->bindParam(':IdTarifa',$txtIdTarifa);
        $sentenciaSQL->bindParam(':Costo',$txtCosto);
        $sentenciaSQL->bindParam(':IdTipo',$txtIdTipo);
        $sentenciaSQL->execute();
        header("Location:tarifa.php");
           break;

        
            case "Cancelar":
                header("Location:tarifa.php");
                //echo "presionado boton Cancelar";
                break;


                case "Borrar":
                  

                    $sentenciaSQL=$conexion->prepare("DELETE FROM tarifa WHERE IdTarifa=:IdTarifa ");
                     $sentenciaSQL->bindParam(':IdTarifa',$txtIdTarifa);
                     $sentenciaSQL->execute();
                     header("Location:tarifa.php");
 
                     
                     //echo "presionado boton Borrar";
                     break;
              
                            



}

$sentenciaSQL=$conexion->prepare("SELECT *FROM tarifa");
$sentenciaSQL->execute();
$listatarifa=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario de Tarifa
    </div>
    <div class="card-body">
        
    Formulario de Tarifa
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdTarifa">Id tarifa :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdTarifa; ?>" name="txtIdTarifa" id="txtIdTarifa" placeholder="Id tarifa">
    </div>

    <div class = "form-group">
    <label for="txtCosto">Costo:</label>
    <input type="text" class="form-control" value="<?php echo $txtCosto; ?>" name="txtCosto" id="txtCosto" placeholder="Costo">
    </div>


    <div class = "form-group">
    <label for="txtIdTipo">Id tipo:</label>
    <input type="text" class="form-control" value="<?php echo $txtIdTipo; ?>" name="txtIdTipo" id="txtIdTipo" placeholder="Id tarifa">
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
                <th>IdTarifa</th>
                <th>Costo</th>
                <th>IdTipo</th>
                
                
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listatarifa as $tarifaa){ ?>
            <tr>
                <td ><?php echo $tarifaa['IdTarifa'] ?></td>
                <td ><?php echo $tarifaa['Costo'] ?></td>
                <td><?php echo $tarifaa['IdTipo']; ?></td>

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="txtIdTarifa" id="txtIdTarifa" value="<?php echo $bahias['IdTarifa']; ?>"/>
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



      
        


  
  










