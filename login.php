<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
}

require 'database.php';
if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $registro = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email= :email');
    $registro->bindParam(':email', $_POST['email']);
    $registro->execute();
    $usuario = $registro->fetch(PDO::FETCH_ASSOC);
    $message = '';

    if (count($usuario) > 0 && password_verify($_POST['password'], $usuario['password'])) {
    $_SESSION['user_id'] = $usuario['id'];
    header('Location: home.php');
     } else {
        $message = 'Datos erroneos';
     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
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
    <h5 class="card-title">LOGIN PLEASE OR</h5>
    <p class="card-text">
        <?php if(!empty($message)): ?>
    <p>
        <?= $message ?>
    </p>
    <?php endif; ?>
    
    <span>
    <a href="signup.php" class="btn btn-warning" style="width: 100%;">SIGNUP</a>
    </span>
</p>
</div>
</div>
   </font></p>

<div class="card" style="width: 65rem;">
  <div class="card-body">
  <form action="login.php" method="post">
  <input type="email" name="email" placeholder="Ingrese su email" class="form-control mb-3" style="width: 100%;">
  <input type="password" name="password" placeholder="Ingrese su password" class="form-control mb-3" style="width: 100%;">
  <input type="submit" class="btn btn-primary btn-block mb-2" value="LOGIN" style="width: 100%;">
  <a href="index.php" class="btn btn-success" style="width: 100%;">HOME</a>
  </form>
  </div>
</div>
   </center>

</body>
</html>