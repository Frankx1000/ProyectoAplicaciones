<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE profesores SET nombre='$nombre' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        Header("Location: home2.php");
    } else {
        echo $query;
    }
?>