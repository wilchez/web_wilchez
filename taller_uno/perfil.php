<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Inicio</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>

	<button><a href="crearusuario.php">crear usuario</a></button>

<?php
// " "es para enviar una cadena
include "conexion/conexion.php";
//1.imprimir esos datos que se digiraron

session_start();
//isset es si exite la variable
if((isset($_POST["enviar"]))||(isset($_GET["vartemporal"]))){

	if(isset($_POST["enviar"])){
		//creo una variable para rescatar la variable del formulario del otro php
		$codigoDigitado=$_REQUEST["codigo"];
		$passwordDigitado=$_REQUEST["password"];
	}
	else if(isset($_GET["vartemporal"])){
		$codigoDigitado=$_REQUEST["vartemporal"];
		$consultaPassword=mysql_query("select 'password' FROM usuario WHERE codigo=$codigoDigitado");
		if($registro=mysql_fetch_array($consultaPassword)){
			$passwordDigitado=$registro["password"];
		}
	}

	//el punto indica que hay algo mas y en las comillas aplico html solo cuando se imprime
	//echo $codigoDigitado."<br>".$passwordDigitado;

//2. verificar si exiten esos datos	

	$usuarioCorrecto=false;

	//se crea una variable donde se ingresa la consulta

	//mysqlqery es una funcion para consultar datos
	$consulta=mysql_query("select * FROM usuario WHERE codigo=$codigoDigitado AND password=$passwordDigitado");
	$consultaTareas=mysql_query("select * FROM tarea WHERE codigo_delegado=$codigoDigitado");
	
		//tres iguales evaluan si tiene el mismo valor y si es del mismo tipo
		if($consulta===false) {
    		//die(mysql_error()); //me dice que error hay en la consulta de la base de datos
		}

		//mysql_fetch_array es una funcion que trae un resultado de alguna consulta
		if($registro=mysql_fetch_array($consulta)){

			$usuarioCorrecto=true;
			$codigo=$registro["codigo"];
			$nombre=$registro["nombre"];
			$apellido=$registro["apellido"];
			$correo=$registro["correo"];
			$imagen=$registro["imagen"];

			if($imagen==null){
			echo  '<br><img src="images/foto.jpg" width="100"/>';
			}else {
			echo  '<br><img src="images/'.$imagen.'"/>';
			}
			echo '<p>'.$codigo.'</p>'.
			'<br><p>'.$nombre.'</p>'.
			'<br><p>'.$apellido.'</p>'.
			'<br><p>'.$correo.'</p>';
		}
	
	$filas=mysql_num_rows($consultaTareas);

	if($filas!=false){
		while($registroTarea=mysql_fetch_array($consultaTareas)){

			$nombreTarea=$registroTarea["nombre"];
			$fecha_inicial=$registroTarea["fecha_inicial"];
			$fecha_final=$registroTarea["fecha_final"];
			$prioridad=$registroTarea["prioridad"];
			$descripcion=$registroTarea["descripcion"];
			$proceso=$registroTarea["proceso"];
			$codigo_creador=$registroTarea["codigo_creador"];


			if($prioridad=="a"){
				$laprioridad="Prioridad: Alta";
			}
			else if($prioridad=="m"){
				$laprioridad="Prioridad: Media";
			}
			else if($prioridad=="b"){
				$laprioridad="Prioridad: Baja";
			}

			if($proceso=="p"){
				$elproceso="Proceso: En proceso";
			}
			else if($proceso=="r"){
				$elproceso="Proceso: En revisión";
			}
			else if($proceso=="f"){
				$elproceso="Proceso: Finalizado";
			}

			echo '<p>'.$nombreTarea.'</p>'.
			'<br><p> Fecha inicial: '.$fecha_inicial.'</p>'.
			'<br><p> Fecha final: '.$fecha_final.'</p>'.
			'<br><p>'.$laprioridad.'</p>'.
			'<br><p> Descripción: '.$descripcion.'</p>'.
			'<br><p>'.$elproceso.'</p>'.
			'<br><p> Creado por: '.$codigo_creador.'</p>';
		}
	}else{
		echo '<p>'.$nombre.' sin tareas pendientes</p>';
	}

	if($usuarioCorrecto==false){
		//redirecciona a una pag
		header("Location: index.php");
	} else {
		//esta es mi coockie que la puedo llamar en otros archivos
		$_SESSION["Ses_codigo"]=$codigoDigitado;
		$_SESSION["Ses_password"]=$passwordDigitado;
	}
}
else if(!isset($_SESSION["Ses_codigo"])){
		header("Location: index.php");
}
?>
</html>