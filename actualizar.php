<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM cursos WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    $query2 = "SELECT * FROM profesores";
    $resultado2 = mysqli_query($conn, $query2);
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
<p><font size="5">
<body>
<div class="card backcolor" style="width: 44rem; color:blue;  ">
  <div class="card-body">
    <p class="card-text">
    <h1 class="text-center">ACTUALIZAR CURSO</h1>
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
                     style="width: 91%;"
                >

                <select name="horario" class="mb-3" style="width: 45%;" >
                <option value="8:00-10:00">8:00-10:00</option>
                <option value="10:00-12:00">10:00-12:00</option>
                <option value="12:00-14:00">12:00-14:00</option>
                <option value="14:00-16:00">14:00-16:00</option>
                <option value="16:00-18:00">16:00-18:00</option>
                </select>

                <select name="carrera" class="mb-3" style="width: 45%;" >
                <option value="Sistemas">Sistemas</option>
                <option value="Mecatronica">Mecatronica</option>
                <option value="Electrica">Electrica</option>
                <option value="Electronica">Electronica</option>
                <option value="I.Artificial">I.Artificial</option>
                <option value="Tronco Comun">Tronco Comun</option>
                </select>

                <select name="profesor" class="mb-3" style="width: 91%;">
                 <?php
                while($ren=mysqli_fetch_array($resultado2)) {
                ?>
                <option value="<?php echo $ren['nombre'] ?>"><?php echo $ren['nombre'] ?></option>

                <?php 
                 
                 } 
                 ?>
                </select>   

                <input type="submit" 
                class="btn btn-primary mb-3"
                value="Actualizar"
                style="width: 91%;" 
                >

                <button class="btn btn-dark mb-5" style="width: 91%;"  @onclick="location.redirect('home.php')">
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