<!DOCTYPE html>
<html>
<!--Profe el proyecto se realizó con conlaboración de Juan Esteban Lopez-->
<head>
	<title>Index</title>
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" hreF="css/styles.css"> 
</head>
<body>	

	<div class="container">
		<figure class="logo">
			<img src="images/logo.png" alt="wilchez" title="wilchez">
		</figure>

		<section class="campos-log">

			
			<form name="formulario prueba" id="formulario_registro" method="GET" action="includes/iniciosesion.php">
				<h1>user annie pass annie</h1><br>
				<label>Nombre:  </label><br>

				<select name="nombre">
					<?php
					include_once("includes/database.php");

					$query = "SELECT nombre, correo FROM mensajes.usuarios";
					$resultado=mysqli_query($conexion,$query);
					while ($row = mysqli_fetch_array($resultado)) {
						echo '<option value="'.$row["correo"].'">'.$row["nombre"].'</option>';
					}
				echo '</select><br><br>

				<label>Contraseña:	</label><br><input type="password" name="contrasena" id="contrasena"  class="formulario_datos"><br><br>
				<input type="submit" value="entrar" name="entrar" id="entrar" class="boton">
			</form>
		</section>';
					if(isset($_GET["mensaje"])){
						if($_GET["mensaje"]<>""){
							echo "<p>".$_GET["mensaje"]."</p>";
						}
					}
					?>
	</div>
</body>
</html>