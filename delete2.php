<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "DELETE FROM profesores WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        Header("Location: home2.php");
    }
?>