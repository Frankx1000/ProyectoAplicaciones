<?php
require 'database.php';
$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && ($_POST['password']) == ($_POST['repassword'])) {
    $sql = 'INSERT INTO usuarios (email, password, rol) VALUES (:email, :password, :rol)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':rol', $_POST['rol']);
    $newPass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $newPass);
    
    if ($stmt->execute()) {
        $message = 'Usuario creado correctamente';
    } else {
        $message = 'Datos Erroneos .... Vuelva a intentar';
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<center>
<p><font size="5">
<body>
<div class="card" style="width: 20rem; ">
  <div class="card-body">
    <h5 class="card-title">SIGN UP PLEASE OR</h5>
    <p class="card-text">
        <?php if(!empty($message)): ?>
    <p>
        <?= $message ?>
    </p>
    <?php endif; ?>
    
    <span> 
    <a href="login.php" class="btn btn-primary" style="width: 100%;">LOGIN</a>
    </span>
</p>

  </div>
</div>
   
    </font></p>

  <div class="card" style="width: 65rem;">
  <div class="card-body">
    <form action="signup.php" method="post">
        <input type="email" name="email" placeholder="Ingrese su email" class="form-control mb-3" style="width: 100%;">
        <input type="password" name="password" placeholder="Ingrese su password" class="form-control mb-3" style="width: 100%;">
        <input type="password" name="repassword" placeholder="Confirme su password" class="form-control mb-3" style="width: 100%;">
        
        <select name="rol" class="mb-3" style="width: 100%;">
        <option value="PROFESOR">PROFESOR</option>
        <option value="ALUMNO" selected>ALUMNO</option>
        </select>
   
        <input class="btn btn-warning btn-block mb-2" type="submit" value="REGISTER" style="width: 100%;">
        <a href="index.php" class="btn btn-success" style="width: 100%;">HOME</a>
    </form>
</div>
</div>
   </center>

</body>
</html>