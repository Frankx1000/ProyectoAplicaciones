<?php
session_start();
require 'database.php';
if (isset($_SESSION['user_id'])) {
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $registro = $conn->prepare($query);
    $registro->bindParam(':id', $_SESSION['user_id']);
    $registro->execute();
    $resultado = $registro->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($resultado) > 0) {
        $user = $resultado;
    }
}
?>

<?php
    include("conexion.php");
    $conexion = conectar();
    $query = "SELECT * FROM cursos";
    $resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>CURSOS</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
    
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>CURSOS</h1>
			</div>
			<nav class="menu">
				<a href="index.php">Inicio</a>
                <?php if(!empty($user)): ?>
                <a> Welcome: <?= $user['email']; ?>  LOGGED IN</a>
            <?php else: ?>
            
            <?php endif; ?>
				<a href="logout.php">LOGOUT</a>
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="home.php">CURSOS</a>
			<a href="home2.php">PROFESORES</a>
			<a href="home3.php">ALUMNOS</a>
			<a href="about.php">ACERCA DE NOSOTROS</a>
			<a href="logout.php">LOGOUT</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>

<div class="contenido">
<div class="">

  <div class="container mt-5" align="center">
  
        <div class="row">
            
               <div class="col-md-3">
                
                <h1>NUEVO CURSO</h1>
                
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
                            class="btn btn-info">EDITAR</a> </td>
                            
                          <td>  <a href="delete.php?id=<?php echo $row['id']?>" 
                            class="table__item__link btn btn-danger">BORRAR</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
	</div>
</div>
</body>
</html>

      <script src="confirmacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>