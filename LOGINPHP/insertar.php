<?php 
include("conexion.php");
$conexion = conectar();

$curso = $_POST['curso'];
$horario = $_POST['horario'];
$carrera = $_POST['carrera'];
$profesor = $_POST['profesor'];

$query = "INSERT INTO cursos(curso, horario, carrera, profesor)
         VALUES('$curso', '$horario', '$carrera', '$profesor')";

$resultado = mysqli_query($conexion, $query);

if($resultado) {
    header('location: home.php');
} else {
    echo 'Algo anda mal';
}
?>