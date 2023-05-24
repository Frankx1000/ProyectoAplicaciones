<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM cursos WHERE id='$id'";
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
</head>
<body>
    <div class="container mt-2">
    <div class="row">
    <h1 class="text-center">ACTUALIZAR</h1>
    </div>
    <form action="update.php" method="post">
                <input type="text"
                     name="id" 
                     value="<?php echo $row['id']?>"
                     hidden>
                <input type="text"
                     name="curso" 
                     class="form-control mb-3"
                     value="<?php echo $row['curso']?>"
                     placeholder="Curso"
                >
                <input type="text"
                     name="horario" 
                     class="form-control mb-3"
                     value="<?php echo $row['horario']?>"
                     placeholder="Horario"
                >
                <input type="text"
                     name="carrera" 
                     class="form-control mb-3"
                     value="<?php echo $row['carrera']?>"
                     placeholder="Carrera"
                >
                <input type="text"
                     name="profesor" 
                     class="form-control mb-3"
                     value="<?php echo $row['profesor']?>"
                     placeholder="Profesor"
                >

                <input type="submit" 
                class="table__item__link2 btn btn-primary btn-block mb-2"
                value="Actualizar"
                style="width: 100%;" 
                >

                <button class="btn btn-dark" style="width: 100%;"  @onclick="location.redirect('index.php')">
                    Regresar
                </button>
    </form>
      </div>
    </div> 
    <script src="confirmacion2.js"></script>
    
</body>
</html>