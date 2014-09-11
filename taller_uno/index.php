<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>
<body>
	<div class="content">
		
		<?php
		//incluir mi coneccion a la base de datos
		include "conexion/conexion.php";
		?>

		<h1>Login</h1>
		<p>logearse con codigo: 10212026 y password: 10212026</p>

		<!---post es un metodo seguro para enviar formulario -->
		<form id="login" method="POST" action="perfil.php"> 
			<p>Código:<br><input name="codigo" type="text" ><br><br>
			Password:<br><input name="password" type="password" ><br></p>
			<input name="enviar" type="submit" value="enviar">
		</form>
	</div>
</body>
</html>