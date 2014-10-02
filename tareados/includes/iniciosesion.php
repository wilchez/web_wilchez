<?php  session_start();

include_once("database.php");
$nombre = $_GET["nombre"];
$contrasena=$_GET["contrasena"];			
$query= "SELECT * from mensajes.usuarios WHERE  correo='".$nombre."' AND contrasena='".$contrasena."'";
$resultado=mysqli_query($conexion,$query);
$usu=mysqli_fetch_array($resultado)['correo'];

if($usu!=""){
	$_SESSION['correo']=$nombre;
	$_SESSION['perfil']=$nombre;
	$_SESSION['contrasena']=$contrasena;
	header ("Location: ../mensajes.php");

}else{
	header ("Location: ../index.php?mensaje=Usuario o contraseña incorrecto.");
}

?>