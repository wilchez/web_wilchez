<html>
<head>
	<title>Notas de Estudiantes</title>
	<meta charset="utf-8">
</head>
<body>
	
<?php
	include_once("includes/database.php");

	
	echo "<h1>Listado de estudiantes</h1><br /><br />";
    
	
	$query = "SELECT * FROM estudiantesweb.estudiantes ORDER BY apellido";
	$result = mysqli_query($con,$query);

 	while ($row = mysqli_fetch_array($result)) {
 		echo "<a href='notasdeestudiantes.php?codigo=".$row["codigo"]."'>".$row["codigo"]."</a> ".$row["nombre"]." ".$row["apellido"]." ".$row["correo"];
 		echo "<br />";
 	}	
?>
	<a href="notasdeestudiantes.php">test</a>
	<h1>Crea un nuevo estudiante</h1>
	<form action="includes/crearEstudiante.php" method="POST">
		<label>Nombre</label> <input type="text" name="nombre"><br />	
		<label>Apellido</label> <input type="text" name="apellido"><br />
		<label>Código</label> <input type="text" name="codigo"><br />
		<label>Correo</label> <input type="text" name="correo"><br />
		<input type="submit" value="Enviar">
	</form>

</body>
</html>