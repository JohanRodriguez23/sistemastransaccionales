<?php 


$host="localhost";
$bd="psistemastrans";
$usuario="root";
$contraseña="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contraseña);
    if($conexion){echo " ";}


} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
