<?php

	include_once("database.php");

	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$codigo = $_POST["codigo"];
	$correo = $_POST["correo"];
	//echo "Mi nombre es ".$nombre;

$query = "INSERT INTO `estudiantes`(`codigo`, `nombre`, `apellido`, `correo`) VALUES ('$codigo','$nombre','$apellido','$correo')";

if (!mysqli_query($con,$query)) {
  die('Error: ' . mysqli_error($con));
}

?>