
<link rel="stylesheet" href="../../css/bootstrap.min.css"/> 


<?php include ('../template/cabecera.php');?>

<?php 






$txtIdPersona=(isset($_POST['txtIdPersona']))?$_POST['txtIdPersona']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtTelefono=(isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
$txtFirma=(isset($_POST['txtFirma']))?$_POST['txtFirma']:"";
$txtN°Documento=(isset($_POST['txtN°Documento']))?$_POST['txtN°Documento']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";







include ('../config/bd.php');

switch($accion){
    case "Agregar":

       // INSERT INTO persona (IdPersona,Nombre,Direccion,Telefono,Firma,N°Documento) VALUES (:IdPersona,:Nombre,:Direccion,:Telefono,:Firma,:N°Document);

        $sentenciaSQL= $conexion->prepare("INSERT INTO persona (IdPersona,Nombre,Direccion,Telefono,Firma,N°Documento) VALUES (:IdPersona,:Nombre,:Direccion,:Telefono,:Firma,:N°Document);");
        $sentenciaSQL->bindParam(':IdPersona',$txtIdPersona);
        $sentenciaSQL->bindParam(':Nombre',$txtNombre);
        $sentenciaSQL->bindParam(':Direccion',$txtDireccion);
        $sentenciaSQL->bindParam(':Telefono',$txtTelefono);
        $sentenciaSQL->bindParam(':Firma',$txtFirma);
        $sentenciaSQL->bindParam(':N°Documento',$txtN°Documento);
        
        $sentenciaSQL->execute();
        header("Location:persona.php");
           break;

        
            case "Cancelar":
                header("Location:persona.php");
                //echo "presionado boton Cancelar";
                break;

                case "Borrar":
                  

                    $sentenciaSQL=$conexion->prepare("DELETE FROM persona WHERE IdPersona=:IdPersona");
                     $sentenciaSQL->bindParam(':IdPersona',$txtIdPersona);
                     $sentenciaSQL->execute();
                     header("Location:persona.php");
 
                     
                     //echo "presionado boton Borrar";
                     break; 
                
                            



}

$sentenciaSQL=$conexion->prepare("SELECT *FROM persona");
$sentenciaSQL->execute();
$listapersona=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Formulario de la Persona
    </div>
    <div class="card-body">
        
    Formulario de de Persona
    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtIdPersona">Id persona :</label>
    <input type="text" class="form-control" value="<?php echo $txtIdPersona; ?>" name="txtIdPersona" id="txtIdPersona" placeholder="Id persona">
    </div>

    <div class = "form-group">
    <label for="txtNombre">Nombre:</label>
    <input type="text" class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
    </div>


    <div class = "form-group">
    <label for="txtDireccion">Direccion:</label>
    <input type="text" class="form-control" value="<?php echo $txtDireccion; ?>" name="txtDireccion" id="txtDireccion" placeholder="Direccion">
    </div>

    <div class = "form-group">
    <label for="txtTelefono">Telefono:</label>
    <input type="text" class="form-control" value="<?php echo $txtTelefono; ?>" name="txtTelefono" id="txtTelefono" placeholder="Telefono">
    </div>

    <div class = "form-group">
    <label for="txtFirma">Firma:</label>
    <input type="text" class="form-control" value="<?php echo $txtFirma; ?>" name="txtFirma" id="txtFirma" placeholder="Firma">
    </div>

    <div class = "form-group">
    <label for="txtN°Documento">N°Documento:</label>
    <input type="text" class="form-control" value="<?php echo $txtN°Documento; ?>" name="txtN°Documento" id="txtN°Documento" placeholder="N°Documento">
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
                <th>IdPersona</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Firma</th>
                <th>N°Documento</th>


       	
            </tr>
        </thead>
        <tbody>

        <?php foreach ($listapersona as $personaa){ ?>
            <tr>
                <td ><?php echo $personaa['IdPersona'] ?></td>
                <td ><?php echo $personaa['Nombre'] ?></td>
                <td><?php echo $personaa['Direccion']; ?></td>
                <td><?php echo $personaa['Telefono']; ?></td>
                <td><?php echo $personaa['Firma']; ?></td>
                <td><?php echo $personaa['N°Documento']; ?></td>

                
           


                
                <td>
                     
                    <form  method="post">

                     <input type="hidden" name="txtIdPersona" id="txtIdPersona" value="<?php echo $bahias['IdPersona']; ?>"/>
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



      
        


  
  










