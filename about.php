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
	<title>ABOUT US</title>
	<link rel="stylesheet" href="stylesabout.css">
</head>
<body>
    
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>SISTEMA ESCOLAR</h1>
			</div>
			<nav class="menu">

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

<div class="heading">
<h1>ABOUT US</h1>
<p>
Un buen diseño hace la vida mejor. 
Somos expertos en diseño web y entrenados en desarrollo web para la industria digital. 
Ofrecemos un servicio personalizado, profesional y confiable.
</p>
</div>

<div class="container">
  <section class="about">
<div class="about-image">
<img src="images/emp.jpg">
</div>
<div class="about-content">
<p>
Un buen diseño hace la vida mejor. Somos expertos en diseño web y entrenados en desarrollo web para la industria digital. Ofrecemos un servicio personalizado, profesional y confiable.
Somos una agencia ganadora de diseño web ubicada en Manchester, Reino Unido. Nos especializamos en diseño web, desarrollo web, ecommerce y SEO Orgánico.
Con más de una década de experiencia, Shape está integrada por un equipo fresco, vibrante y energético con talento creativo, conocimiento de la industria y estándares de calidad muy altos.
Trabajamos con startups ambiciosas y con empresas de alcance global como Blackberry, NHS y L’Occitane; podemos ajustarnos a tus necesidades sin problemas.
</p>
<a href="" class="read-more">SABER MAS</a>
</div>
	</div>
	</section>
	</div>

</body>
</html>