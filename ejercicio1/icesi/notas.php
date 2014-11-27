<?php
	include_once("includes/database.php");

	
	echo "<h1>Listado de notas</h1><br /><br />";
    
	
	$query = "SELECT * FROM estudiantesweb.notas";
	$result = mysqli_query($con,$query);

 	while ($row = mysqli_fetch_array($result)) {
 		echo $row["idNota"]." ".$row["nombre"]." ".$row["porcentaje"];
 		echo "<br />";
 	}

?>