<?php
    include("conexion.php");
    $conn = conectar();
    $nua = $_POST['nua'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $curso = $_POST['curso'];

    $sql = "UPDATE alumnos SET  nua='$nua', nombre='$nombre', edad='$edad', curso='$curso'  WHERE nua='$nua'";
    $query = mysqli_query($conn, $sql);
    if($query) {
        Header("Location: home3.php");
    } else {
        echo $query;
    }
?>