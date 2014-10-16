<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>

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

<?php
include "conexion/conexion.php";
session_start();

if(isset($_REQUEST['c'])){
	$c=$_REQUEST['c'];
	if($c==1){
		session_destroy();
		echo "<script>document.location.href='index.php'</script>";
	}
}

if(!isset($_SESSION["Ses_usuario"])){
		header("Location: index.php");
}else {

	$usuario=$_SESSION["Ses_usuario"];
	$consulta2=mysql_query("select * FROM usuario WHERE correo=$usuario");
	$registro2=mysql_fetch_array($consulta2);
	$idUsuario=$registro2["id"];
	$nombreUsuario=$registro2["nombre"];

	$consulta=mysql_query("select * FROM compras WHERE idUsuario=$idUsuario");
	$fila=mysql_num_rows($consulta);


	echo '<table> Tus Compras
			<tr>
			<td>Producto</td>
			<td>imagen</td>
			<td>Precio</td>
			<td>Fecha</td>
			</tr>';

	if($fila!=false){
		while($registro=mysql_fetch_array($consulta)) {

			$codigoProducto=$registro["codigoProducto"];
			$fecha=$registro["fecha"];

			$consulta3=mysql_query("select * FROM productos WHERE codigo=$codigoProducto");
			$registro3=mysql_fetch_array($consulta3);
			$nombreProducto=$registro3["nombre"];
			$imagenProducto=$registro3["imagen"];
			$precioProducto=$registro3["precio"];

			echo '<tr>
			<td>'.$nombreProducto.'</td>
			<td>';

			if($imagen==null){
				echo  '<img src="images/foto.jpg" width="100"/>';
			}else {
				echo  '<img src="images/'.$imagen.'"/>';
			}

			echo '</td>
			<td>'.$precioProducto.'</td>
			<td>'.$fecha.'</td>
			</tr>';
		}
	}else{
		echo '<tr>No has hecho compras aún</tr>';
	}

	echo  '</table>';
}
?>
</html>