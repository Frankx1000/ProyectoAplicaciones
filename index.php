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

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>INDEX</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
<center>
<p><font size="5">
<body>
<div class="card backcolor" style="width: 60rem; color:green;  ">
  <div class="card-body">
    
        <p><font size="10">
        <?php if(!empty($user)): ?>
         <h1>BIENVENIDO: <?= $user['email']; ?></h1>
         <h1>SESION ACTIVA</h1>
        <a href="home.php" class="btn btn-primary" style="width: 45%;">INGRESAR AL SISTEMA</a>  
        <a href="logout.php" class="btn btn-danger" style="width: 45%;">LOGOUT</a>  

    <?php else: ?>
        <h1>Please login or Signup</h1>
        <a href="login.php" class="btn btn-primary " style="width: 45%;">LOGIN</a>
        <a href="signup.php" class="btn btn-warning" style="width: 45%;">SIGNUP</a>   
    <?php endif; ?>

</p>
  </div>
</div>
   
    </font></p>
    </center>

</body>
</html>