<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<h1>usuarios</h1>
<?php
include "conexion/conexion.php";
session_start();

if(!isset($_SESSION["Ses_codigo"])){
		header("Location: index.php");
}else {
	//esto es cuadno se envia un formulario
	if (isset($_POST["crear"])) {
		$codigoDigitado=$_REQUEST["codigo"];
		$passwordDigitado=$_REQUEST["password"];
		$nombreDigitado=$_REQUEST["nombre"];
		$apellidoDigitado=$_REQUEST["apellido"];
		$correoDigitado=$_REQUEST["correo"];
		//solo el nombre de la imagen
		$nombreimagen=$_FILES['imagen']['name'];
		//ruta donde se va a tomar la imagen
		$rutacarga="images/".$_FILES['imagen']['name'];
		//ruta de donde se va a taer la imagen
		$rutaguarda=$_FILES['imagen']['tmp_name'];
		$usuariofoto=copy ($rutaguarda,$rutacarga)or die("Porfavor selecciona una imagen");
		//para enviar los datos
		mysql_query("insert INTO usuario VALUES('','$codigoDigitado','$nombreDigitado','$apellidoDigitado','$correoDigitado','$nombreimagen','$passwordDigitado')")or die(mysql_error());
		echo "Usuario agregado";
	}

	$consulta=mysql_query("select * FROM usuario ");
	$fila=mysql_num_rows($consulta);

	echo '<table><tr>
			<td>codigo</td>
			<td>nombre</td>
			<td>apellido</td>
			<td>correo</td>
			</tr>';

	if($fila!=false){
		//creo una nueva variable que contiene un array con todos los usuarios
		while($registro=mysql_fetch_array($consulta)) {

			$codigo=$registro["codigo"];
			$nombre=$registro["nombre"];
			$apellido=$registro["apellido"];
			$correo=$registro["correo"];

			echo '<tr onClick="perfil('.$codigo.')">
			<td>'.$codigo.'</td>
			<td>'.$nombre.'</td>
			<td>'.$apellido.'</td>
			<td>'.$correo.'</td>
			</tr>';
		}
		echo  '</table>';
	}
}
?>
</html>
<script type="text/javascript">

function perfil(codigo){
	//?vartemporal="+ es como decir get a una variable temporal
	document.location.href="perfil.php?vartemporal="+codigo;
}

</script>