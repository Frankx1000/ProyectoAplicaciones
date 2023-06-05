<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM profesores WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="4.css">
</head>
<body>
<center>
<p><font size="7">
<body>
<div class="card backcolor" style="width: 44rem; color:blue;  ">
  <div class="card-body">
    <p class="card-text">
    <h1 class="text-center">ACTUALIZAR PROFESORES</h1>
    </div>
    <form action="update2.php" method="post">
                <input type="text"
                     name="id" 
                     value="<?php echo $row['id']?>"
                     hidden>
                <input type="text"
                     name="nombre" 
                     class="form-control mb-3"
                     value="<?php echo $row['nombre']?>"
                     placeholder="profesor"
                >

                <input type="submit" 
                class="table__item__link2 btn btn-primary btn-block mb-2"
                value="Actualizar"
                style="width: 90%;" 
                >

                <button class="btn btn-dark mb-5" style="width: 90%;"  @onclick="location.redirect('home2.php')">
                    Regresar
                </button>
                </form>
    </p>
</div>
</div>
   </font></p>
</center>
    <script src="confirmacion2.js"></script>
    
</body>
</html>