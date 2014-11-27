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
// " "es para enviar una cadena
include "conexion/conexion.php";
//1.imprimir esos datos que se digiraron

session_start();

if(isset($_REQUEST['c'])){
	$c=$_REQUEST['c'];
	if($c==1){
		session_destroy();
		echo "<script>document.location.href='index.php'</script>";
	}
}

$consultaProductos=mysql_query("select * FROM productos");
echo '<section>
	<div id="contenedor">
	<ul>';
	//mysql_fetch_array es una funcion que trae un resultado de alguna consulta
	while($registro=mysql_fetch_array($consultaProductos)){

		$codigo=$registro["codigo"];
		$nombre=$registro["nombre"];
		$descripcion=$registro["descripcion"];
		$imagen=$registro["imagen"];
		$precio=$registro["precio"];
		echo '<article>';
		echo '<li style="float:left; width:20%">';
		if($imagen==null){
		echo  '<img src="images/foto.jpg" width="100"/>';
		}else {
		echo  '<img src="images/'.$imagen.'"/>';
		}
		echo
		'<p>'.$nombre.'</p><br>'.
		'<p>'.$descripcion.'</p><br>'.
		'<p>valor $'.$precio.'</p><br>'.
		'<button><a href="carro.php?p='.$codigo.'">Comprar</a></button>';
		echo '</li>';

		echo '</article>';
	}

	echo '</ul>
	</div>
</section>';
?>


</html>