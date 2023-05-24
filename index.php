<?php
    include("conexion.php");
    $conexion = conectar();
    $query = "SELECT * FROM cursos";
    $resultado = mysqli_query($conexion, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA ESCOLAR</title>
  </head>
  <body>
  <div class="container mt-5">
  <h1>SISTEMA DE REGISTRO DE CURSOS</h1>
        <div class="row">
            <div class="col-md-4">
                <h1>Ingresa los datos</h1>
                <form action="insertar.php" method="post">
                    <input type="text"
                     name="curso" 
                     class="form-control mb-3"
                     placeholder="Curso"
                >
                <input type="text"
                     name="horario" 
                     class="form-control mb-3"
                     placeholder="horario"
                >
                <input type="text"
                     name="carrera" 
                     class="form-control mb-3"
                     placeholder="carrera"
                >
                <input type="text"
                     name="profesor" 
                     class="form-control mb-3"
                     placeholder="Profesor"
                >

                <input type="submit" 
                class="btn btn-primary"
                value="Insertar"
                style="width: 100%;" 
                >
                </form>
            </div>
            <div class="col-md-7">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>curso</th>
                            <th>horario</th>
                            <th>carrera</th>
                            <th>profesor</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    while($row=mysqli_fetch_array($resultado)) {
                    ?>
                    <tr>
                        <td><?php echo $row['curso'] ?></td>
                        <td><?php echo $row['horario'] ?></td>
                        <td><?php echo $row['carrera'] ?></td>
                        <td><?php echo $row['profesor'] ?></td>
                        <td>
                            <a href="actualizar.php?id=<?php echo $row['id']?>" 
                            class="btn btn-warning">EDITAR</a> </td>
                            
                          <td>  <a href="delete.php?id=<?php echo $row['id']?>" 
                            class="table__item__link btn btn-danger">BORRAR</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            <script src="confirmacion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>