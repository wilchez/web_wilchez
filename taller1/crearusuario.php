<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    </head>
<?php
// " "es para enviar una cadena
include "conexion/conexion.php";
//1.imprimir esos datos que se digiraron

session_start();
?>
<form id="crear" method="POST" action="usuarios.php" enctype="multipart/form-data"> 
	codigo: <input name="codigo" type="text" ><br>
	password: <input name="password" type="text" ><br>
	nombre: <input name="nombre" type="text" ><br>
	apellido: <input name="apellido" type="text" ><br>
	correo: <input name="correo" type="text" ><br>
	imagen: <input name="imagen" type="file"><br>
	<input name="crear" type="submit" value="enviar">
</form>
</html>