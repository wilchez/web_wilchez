<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    </head>
<?php
include "conexion/conexion.php";
session_start();

function listausuario(){	
	//hacer la consulta de usuarios
	$consulta=mysql_query("select nombre, codigo, apellido FROM usuario");
	//hago un listado para saber si esta vacio
	$fila=mysql_num_rows($consulta);
	if($fila!=false){
		echo'<select name="usuarios">';
		while ($registro=mysql_fetch_array($consulta)) {
			$codigo=$registro["codigo"];
			$nombre=$registro["nombre"];
			$apellido=$registro["apellido"];

			echo '<option value="'.$codigo.'">'.$nombre.$apellido.'</option>';	
		}
		echo '</select>';
		
	}
}

?>

<form id="crear" method="POST" action="tareas.php" enctype="multipart/form-data"> 
	codigo: <input name="codigo" type="text" ><br>
	password: <input name="password" type="text" ><br>
	nombre: <input name="nombre" type="text" ><br>
	apellido: <input name="apellido" type="text" ><br>
	<?php listausuario(); ?>
	correo: <input name="correo" type="text" ><br>
	imagen: <input name="imagen" type="file" ><br>
	<input name="crear" type="submit" value="enviar">
</form>

</html>