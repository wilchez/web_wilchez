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

//isset es si exite la variable
if((isset($_POST["enviar"]))||(isset($_GET["vartemporal"]))){

	if(isset($_POST["enviar"])){
		//creo una variable para rescatar la variable del formulario del otro php
		$usuarioDigitado=$_REQUEST["usuario"];
		$passwordDigitado=$_REQUEST["password"];
	}
	else if(isset($_GET["vartemporal"])){
		$usuarioDigitado=$_REQUEST["vartemporal"];
		$consultaPassword=mysql_query("select 'password' FROM usuario WHERE codigo=$usuarioDigitado");
		if($registro=mysql_fetch_array($consultaPassword)){
			$passwordDigitado=$registro["password"];
		}
	}

	//el punto indica que hay algo mas y en las comillas aplico html solo cuando se imprime
	//echo $usuarioDigitado."<br>".$passwordDigitado;

//2. verificar si exiten esos datos	

	$usuarioCorrecto=false;

	//se crea una variable donde se ingresa la consulta

	//mysqlqery es una funcion para consultar datos
	$consulta=mysql_query("select * FROM usuario WHERE codigo=$usuarioDigitado AND password=$passwordDigitado");
	$usuarioCorrecto=true;


	$consultaProductosDestacados=mysql_query("select * FROM productos WHERE destacado=1");
		//tres iguales evaluan si tiene el mismo valor y si es del mismo tipo
		if($consulta===false) {
    		//die(mysql_error()); //me dice que error hay en la consulta de la base de datos
		}


		echo '<ul class="destacado"> <h4>Productos Destacados<h4>';
		//mysql_fetch_array es una funcion que trae un resultado de alguna consulta
		while($registro=mysql_fetch_array($consultaProductosDestacados)){

			$codigo=$registro["codigo"];
			$nombre=$registro["nombre"];
			$descripcion=$registro["descripcion"];
			$imagen=$registro["imagen"];
			$precio=$registro["precio"];

			echo '<li>';
			if($imagen==null){
			echo  '<img src="images/foto.jpg" width="100"/>';
			}else {
			echo  '<img src="images/'.$imagen.'"/>';
			}
			echo
			'<p>'.$nombre.'</p>'.
			'<p>'.$descripcion.'</p>'.
			'<p>'.$precio.'</p>'.
			'<p><a href="carro.php?p='.$codigo.'">Comprar</a></p>';
			echo '</li>';
		}

		echo '</ul>';



	$consultaProductos=mysql_query("select * FROM productos");
		//tres iguales evaluan si tiene el mismo valor y si es del mismo tipo
		if($consulta===false) {
    		//die(mysql_error()); //me dice que error hay en la consulta de la base de datos
		}


		echo '<ul>';
		//mysql_fetch_array es una funcion que trae un resultado de alguna consulta
		while($registro=mysql_fetch_array($consultaProductos)){

			$codigo=$registro["codigo"];
			$nombre=$registro["nombre"];
			$descripcion=$registro["descripcion"];
			$imagen=$registro["imagen"];
			$precio=$registro["precio"];

			echo '<li style="float:left; width:20%">';
			if($imagen==null){
			echo  '<img src="images/foto.jpg" width="100"/>';
			}else {
			echo  '<img src="images/'.$imagen.'"/>';
			}
			echo
			'<p>'.$nombre.'</p>'.
			'<p>'.$descripcion.'</p>'.
			'<p>'.$precio.'</p>'.
			'<p><a href="carro.php?p='.$codigo.'">Comprar</a></p>';
			echo '</li>';
		}

		echo '</ul>';

	if($usuarioCorrecto==false){
		//redirecciona a una pag
		header("Location: index.php");
	} else {
		//esta es mi coockie que la puedo llamar en otros archivos
		$_SESSION["Ses_usuario"]=$usuarioDigitado;
		$_SESSION["Ses_password"]=$passwordDigitado;
	}
}
else if(!isset($_SESSION["Ses_usuario"])){
		header("Location: index.php");
}
?>
</html>