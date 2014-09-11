<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
		echo'<select name="codigo_delegado">';
		while ($registro=mysql_fetch_array($consulta)) {
			$codigo=$registro["codigo"];
			$nombre=$registro["nombre"];
			$apellido=$registro["apellido"];

			echo '<option value="'.$codigo.'">'.$nombre.$apellido.'</option>';	
		}
		echo '</select>';		
	}
}

if(isset($_POST["crear"])){	
	$nombreTarea=$_REQUEST["nombre"];
	$fecha_inicial=$_REQUEST["fecha_inicial"];
	$fecha_final=$_REQUEST["fecha_final"];
	$prioridad=$_REQUEST["prioridad"];
	$descripcion=$_REQUEST["descripcion"];
	$codigo_creador=$_SESSION["Ses_codigo"];
	$codigo_delegado=$_REQUEST["codigo_delegado"];
	$proceso="p";
	mysql_query("insert INTO tarea VALUES('','$nombreTarea','$fecha_inicial','$fecha_final','$prioridad','$descripcion','$codigo_creador','$codigo_delegado','$proceso')")or die(mysql_error());
	echo "Tarea agregada";
}

?>


<h1>Crear tarea</h1>
<form id="creartarea" method="POST" action="tareas.php" enctype="multipart/form-data"> 
	<p>Nombre:<br><input name="nombre" type="text" ><br><br>
	Fecha inicial:<br><input name="fecha_inicial" type="text" ><br><br>
	Fecha final:<br><input name="fecha_final" type="text" ><br><br>
	Prioridad: <select name="prioridad"><option value="b">baja</option><option value="m">media</option><option value="a">alta</option></select><br><br>
	Delegado: <?php listausuario(); ?><br><br>
	Descripción:<br><input name="descripcion" type="text" ><br>
	<input name="crear" type="submit" value="crear tarea">
</form>

</html>