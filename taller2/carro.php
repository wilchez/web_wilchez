<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>

	<h1>Carro de Compras</h1>

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

if(!isset($_SESSION["Ses_usuario"])){
	header("Location: index.php");
}else{
	//esto es cuadno se envia un formulario
	if (isset($_POST["comprar"])) {
		$codigoProducto=$_POST["codigoProducto"];
		$idusuario=$_POST["idusuario"];
		$fecha= date("Y-m-d");

		mysql_query("insert INTO compras VALUES('','$idusuario','$codigoProducto','$fecha')")or die(mysql_error());
		echo "Producto Comprado";
	}

	if(isset($_GET["p"])){
		$codigoProducto=$_REQUEST["p"];
		$usuario=$_SESSION["Ses_usuario"];
		$consulta2=mysql_query("select id FROM usuario WHERE correo=$usuario");
		$registro2=mysql_fetch_array($consulta2);
		$idUsuario=$registro2["id"];

		$consulta=mysql_query("select * FROM productos WHERE codigo=$codigoProducto");
		$fila=mysql_num_rows($consulta);

		echo '<table><tr>
				<td>codigo</td>
				<td>nombre</td>
				<td>imagen</td>
				<td>precio</td>
				</tr>';

		if($fila!=false){
			//creo una nueva variable que contiene un array con todos los usuarios
			while($registro=mysql_fetch_array($consulta)) {

				$codigo=$registro["codigo"];
				$nombre=$registro["nombre"];
				$imagen=$registro["imagen"];
				$precio=$registro["precio"];

				echo '<tr>
				<td>'.$codigo.'</td>
				<td>'.$nombre.'</td>
				<td>';

				if($imagen==null){
					echo  '<img src="images/foto.jpg" width="100"/>';
				}else{
					echo  '<img src="images/'.$imagen.'"/>';
				}

				echo '</td>
				<td>'.$precio.'</td>
				</tr>';

				echo '<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td>'.$precio.'</td>
				</tr>';

				echo '<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>
				<form id="crear" method="POST" action="carro.php?p='.$codigoProducto.'" enctype="multipart/form-data"> 
					<input name="codigoProducto" type="hidden" value="'.$codigoProducto.'">
					<input name="idusuario" type="hidden" value="'.$idUsuario.'">
					<input name="comprar" type="submit" value="Comprar">
				</form>
				</td>
				</tr>';
			}
		}

		echo  '</table>';
	}else{
		echo '<p>No hay producto seleccionado para comprar</p>';
	}
}
?>

</html>