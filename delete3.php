<?php
    include("conexion.php");
    $conn = conectar();
    $nua = $_GET['nua'];
    $sql = "DELETE FROM alumnos WHERE nua='$nua'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        Header("Location: home3.php");
    }
?>