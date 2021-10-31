
<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 





$txtIdBahia=(isset($_POST['txtIdBahia']))?$_POST['txtIdBahia']:"";
$txtIdParqueadero=(isset($_POST['txtIdParqueadero']))?$_POST['txtIdParqueadero']:"";
$txtDisponible=(isset($_POST['txtDisponible']))?$_POST['txtDisponible']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO bahia (IdBahia,IdParqueadero,Disponible) 
        VALUES (:IdBahia,:IdParqueadero,:Disponible);");
         $sentenciaSQL->bindParam(':IdBahia',$txtIdBahia);
        $sentenciaSQL->bindParam(':IdParqueadero',$txtIdParqueadero);
        $sentenciaSQL->bindParam(':Disponible',$txtDisponible);
        $sentenciaSQL->execute();
        header("Location:bahia.php");
           break;

        
            case "Cancelar":
                header("Location:bahia.php");
                //echo "presionado boton Cancelar";
                break;

                case "Borrar":
                  

                   $sentenciaSQL=$conexion->prepare("DELETE FROM bahia WHERE IdBahia=:IdBahia ");
                    $sentenciaSQL->bindParam(':IdBahia',$txtIdBahia);
                    $sentenciaSQL->execute();
                    header("Location:bahia.php");

                    
                    //echo "presionado boton Borrar";
                    break;

                

                
                            



}

$sentenciaSQL=$conexion->prepare("SELECT * FROM bahia");
$sentenciaSQL->execute();
$listabahia=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario de Bahia
    </div>
    <div class="card-body">
        
    Formulario de bahia
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdBahia">Id de la bahia :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdBahia; ?>" name="txtIdBahia" id="txtIdBahia" placeholder="Numero de bahia">
    </div>

    <div class = "form-group">
    <label for="txtIdParqueadero">Id parqueadero:</label>
    <input type="text" class="form-control" value="<?php echo $txtIdParqueadero; ?>" name="txtIdParqueadero" id="txtIdParqueadero" placeholder="Id parqueadero">
    </div>


    <div class = "form-group">
    <label for="txtDisponible">Disponibilidad:</label>
    <input type="text" class="form-control" value="<?php echo $txtDisponible; ?>" name="txtDisponible" id="txtDisponible" placeholder="Disponibilidad">
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
                <th>IdBahia</th>
                <th>IdParqueadero</th>
                <th>Disponible</th>
                
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listabahia as $bahias){ ?>
            <tr>
                <td ><?php echo $bahias['IdBahia'] ?></td>
                <td ><?php echo $bahias['IdParqueadero'] ?></td>
                <td><?php echo $bahias['Disponible']; ?></td>

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="txtIdBahia" id="txtIdBahia" value="<?php echo $bahias['IdBahia']; ?>"/>
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



      
        


  
  










