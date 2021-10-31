
<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 






$txtIdTipo=(isset($_POST['txtIdTipo']))?$_POST['txtIdTipo']:"";
$txtClase=(isset($_POST['txtClase']))?$_POST['txtClase']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO tipovehiculo (IdTipo, Clase) 
        VALUES (:IdTipo,:Clase);");
         $sentenciaSQL->bindParam(':IdTipo',$txtIdTipo);
        $sentenciaSQL->bindParam(':Clase',$txtClase);
        $sentenciaSQL->execute();
        header("Location:tipovehiculo.php");
           break;

        
            case "Cancelar":
                header("Location:tipovehiculo.php");
                //echo "presionado boton Cancelar";
                break;

                case "Borrar":
                  

                    $sentenciaSQL=$conexion->prepare("DELETE FROM tipovehiculo WHERE IdTipo=:IdTipo ");
                     $sentenciaSQL->bindParam(':IdTipo',$txtIdTipo);
                     $sentenciaSQL->execute();
                     header("Location:tipovehiculo.php");
 
                     
                     //echo "presionado boton Borrar";
                     break;

                
                            



}

$sentenciaSQL=$conexion->prepare("SELECT *FROM tipovehiculo");
$sentenciaSQL->execute();
$listabahia=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario de Tipo de Vehiculo
    </div>
    <div class="card-body">
        
    Formulario de bahia
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdTipo">Id tipo :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdTipo; ?>" name="txtIdTipo" id="txtIdTipo" placeholder="Id tipo">
    </div>

    <div class = "form-group">
    <label for="txtClase">Clase:</label>
    <input type="text" class="form-control" value="<?php echo $txtClase; ?>" name="txtClase" id="txtClase" placeholder="clase">
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
                <th>IdTipo</th>
                <th>Clase</th>
              
                
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listabahia as $tipo){ ?>
            <tr>
                <td ><?php echo $tipo['IdTipo'] ?></td>
                <td ><?php echo $tipo['Clase'] ?></td>
                

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="txtIdTipo" id="txtIdBahia" value="<?php echo $bahias['IdTipo']; ?>"/>
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



      
        


  
  










