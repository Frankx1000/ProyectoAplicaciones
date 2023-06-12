<?php 
include("conexion.php");
$conexion = conectar();

$nombre = $_POST['nombre'];

if(!empty($_POST['nombre'])){
$query = "INSERT INTO profesores(nombre)
         VALUES('$nombre')";

$resultado = mysqli_query($conexion, $query);

if($resultado) {
    header('location: home2.php');
} else {
    echo 'Algo anda mal';
} 
} else {
    echo 'Algo anda mal';
}
?>