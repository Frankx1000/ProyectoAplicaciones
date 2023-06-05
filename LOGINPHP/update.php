<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_POST['id'];
    $curso = $_POST['curso'];
    $horario = $_POST['horario'];
    $carrera = $_POST['carrera'];
    $profesor = $_POST['profesor'];

    $sql = "UPDATE cursos SET curso='$curso', horario='$horario', carrera='$carrera', profesor='$profesor' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        Header("Location: home.php");
    } else {
        echo $query;
    }
?>