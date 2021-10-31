


<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 

	




$txtIdParqueadero=(isset($_POST['txtIdParqueadero']))?$_POST['txtIdParqueadero']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtUbicacion=(isset($_POST['txtUbicacion']))?$_POST['txtUbicacion']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO parqueadero (IdParqueadero,Nombre,Ubicacion) 
        VALUES (:IdParqueadero,:Nombre,:Ubicacion);");
         $sentenciaSQL->bindParam(':IdParqueadero',$txtIdParqueadero);
        $sentenciaSQL->bindParam(':Nombre',$txtNombre);
        $sentenciaSQL->bindParam(':Ubicacion',$txtUbicacion);
        $sentenciaSQL->execute();
        header("Location:parqueadero.php");
           break;

        
            case "Cancelar":
                header("Location:parqueadero.php");
                //echo "presionado boton Cancelar";
                break;
            
                case "Borrar":
                  

                    $sentenciaSQL=$conexion->prepare("DELETE FROM parqueadero WHERE IdParqueadero=:IdParqueadero");
                     $sentenciaSQL->bindParam(':IdParqueadero',$txtIdParqueadero);
                     $sentenciaSQL->execute();
                     header("Location:parqueadero.php");
 
                     
                     //echo "presionado boton Borrar";
                     break;   

                
                            



}

$sentenciaSQL=$conexion->prepare("SELECT *FROM parqueadero");
$sentenciaSQL->execute();
$listabahia=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario parqueadero
    </div>
    <div class="card-body">
        
    Formulario de bahia
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdParqueadero">Id del parqueadero :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdParqueadero; ?>" name="txtIdParqueadero" id="txtIdParqueadero" placeholder="ID  de parqueadero">
    </div>

    <div class = "form-group">
    <label for="txtNombre">Nombre parqueadero:</label>
    <input type="text" class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre parqueadero">
    </div>


    <div class = "form-group">
    <label for="txtUbicacion">Ubicacion:</label>
    <input type="text" class="form-control" value="<?php echo $txtUbicacion; ?>" name="txtUbicacion" id="txtUbicacion" placeholder="Ubicacion">
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
                <th>IdParqueadero</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
                
               
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listabahia as $parqueaderoo){ ?>
            <tr>
                <td ><?php echo $parqueaderoo['IdParqueadero'] ?></td>
                <td ><?php echo $parqueaderoo['Nombre'] ?></td>
                <td><?php echo $parqueaderoo['Ubicacion']; ?></td>

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="IdParqueadero" id="IdParqueadero" value="<?php echo $bahias['IdParqueadero']; ?>"/>
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



      
        
