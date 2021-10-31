<?php include ("template/cabecera.php"); ?>





<?php 
include ("administrador/config/bd.php");
$sentenciaSQL=$conexion->prepare("SELECT *FROM usuarios");
$sentenciaSQL->execute();
$listausuarios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="col-md-7">
    <table class="table">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Nacimiento</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Recibio almuerzo?</th>
                <th>Imagen</th>
        

            </tr>
        </thead>
        <tbody>

        <?php foreach ($listausuarios as $usuarios){ ?>
            <tr>
                <td ><?php echo $usuarios['cedula'] ?></td>
                <td ><?php echo $usuarios['nombre'] ?></td>
                <td><?php echo $usuarios['apellido']; ?></td>
                <td><?php echo $usuarios['direccion']; ?></td>
                <td><?php echo $usuarios['telefono']; ?></td>
                <td><?php echo $usuarios['nacimiento']; ?></td>
                <td><?php echo $usuarios['edad']; ?></td>
                <td><?php echo $usuarios['genero']; ?></td>
                <td><?php echo $usuarios['almuerzo']; ?></td>

                <td >
                <img class="card-img-top" src="./img/<?php echo  $usuarios['imagen']; ?>" alt="">
                
                
                    
            </td>


                
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>









<?php include ("template/pie.php");?>


<?php 
$count=current($conexion->query("SELECT COUNT(id)FROM `usuarios` WHERE almuerzo= 'si'")->fetch());

echo "numero de almuerzos entregados=".$count;
?> 
</br>
<?php 
$count=current($conexion->query("SELECT COUNT(id)FROM `usuarios` WHERE almuerzo= 'no'")->fetch());

echo "numero de almuerzos sin entregars=".$count;
?>  







<?php 

// cantidad de registros  por pagina
$por_pagina=25;

if(isset($_GET['pagina']))
{
$pagina=$_GET['pagina'];

}else{

  $pagina=1;


}

// la pagina inicoa en 0 y se multiplica

$empieza=($pagina-1)*$por_pagina;



// seleccioanr los registro
$query=$conexion->prepare("SELECT * FROM usuarios LIMIT $empieza, $por_pagina");
$query->execute();

?>  

<div>
<?php 

$total_registros=current($conexion->query("SELECT COUNT(id)FROM `usuarios`")->fetch());


//division de paginas
$total_paginas=ceil($total_registros/$por_pagina);


//link de la primera pagina


  
echo "<center> <a href='productos.php?pagina=1'>".'<<  '."</a> ";

for($i=1;$i<=$total_paginas;$i++)
{
  echo " <a href='productos.php?pagina=".$i."'>".$i."</a>";
}
//link de la ultima pagina
echo "<a href='productos.php?pagina=$total_paginas'>".'   >>'."</a> </center>";
 

?>  

</div>









