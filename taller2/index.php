<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>
<body>
		
		<?php
		//incluir mi coneccion a la base de datos
		include "conexion/conexion.php";
		?>

	<body>

<header>
	<div id="logo">
		<figure class="logo"><img src="images/logo.png" ></figure>
	</div>
	<div id="login">
		<h1>usuario: sebas.wilchez@gmail.com password: 10212026</h1><br>
		<form id="login" method="POST" action="perfil.php"> 
			<p>Código:<input name="codigo" type="text">
			Password:<input name="password" type="password"></p>
			<input name="enviar" type="submit" value="iniciar sesión">
		</form>
	</div>
	<nav>
		<ul>
			<button><a href="home.php">Home</a></button>
			<button><a href="catalogo.php">Catalogo</a></button>
			<button><a href="perfil.php">Perfil</a></button>
			<button><a href="perfil.php?c=1">Cerrar Session</a></button>
		</ul>
	</nav>
</header>

<footer class="mifooter">
	<p>Producters © 2014</p>
</footer>
</body>
</html>