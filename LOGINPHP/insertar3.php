<?php 
include("conexion.php");
$conexion = conectar();

$nua = $_POST['nua'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$curso = $_POST['curso'];

$query = "INSERT INTO alumnos(nua, nombre, edad, curso)
         VALUES('$nua', '$nombre', '$edad', '$curso')";

$resultado = mysqli_query($conexion, $query);

if($resultado) {
    header('location: home3.php');
} else {
    echo 'Algo anda mal';
}
?>