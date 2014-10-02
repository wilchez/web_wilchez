<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" hreF="css/styles.css">
</head>
<body>
		<div class="container">
			<header>
				<div id="header">
					<a href="includes/logout.php">Cerrar sesión</a> 
				</div>
				<figure class="logo">
					<img src="images/logo.png" alt="wilchez" title="wilchez">
				</figure>
			</header>
		<?php session_start();

		if(isset($_SESSION["correo"])){
			$correo=$_SESSION["correo"];	
			if(isset($_GET)){
				if(isset($_GET["correo"])){

					$correo=$_GET["correo"];
				}
			}
			$_SESSION['perfil']=$correo;
			include_once("includes/database.php");

			$query = "SELECT * FROM mensajes.usuarios WHERE correo='".$correo."'";
			$resultado=mysqli_query($conexion,$query);
			$row=mysqli_fetch_array($resultado);

			$correo=$row["correo"];

			if($correo>""){
				echo '<div id="infoperfil"><figure > <img src="data/'.$row["foto"].'"> </figure> </div> <div id="infopersonal"> ';
				echo '<h1> '.$row["nombre"].'
				</h1> <br> <h6 style="float: right;">
				</h1> </div></div>';
			}else{
				echo $row["nombre"];
				die("Usuario invalido");
			}
			
		}
		?>

	</header>

	<section>
		<?php 		
		if(isset($_SESSION["correo"])){
			$correo=$_SESSION["correo"];

			if(isset($_GET)){
				if(isset($_GET["correo"])){

					$correo=$_GET["correo"];
				}
			}
			$_SESSION['perfil']=$correo;

			include_once("includes/database.php");

			$query = "SELECT * FROM mensajes.mensajes join mensajes.usuarios on mensajes.correo=usuarios.correo WHERE mensajes.comentado='".$correo."'";
			$resultado=mysqli_query($conexion,$query);

			if($resultado<>""){

				while ($row = mysqli_fetch_array($resultado)) {

					$fav="$";

					$identi=$row["id"];
					$query="SELECT * FROM mensajes.favoritos WHERE usuario='".$correo."' AND  id_mensaje='".$identi."'";

					$res=mysqli_query($conexion,$query);
					if($res<>""){
						$fav="%";
					}
					$imagen=$row["foto"];
					$likes=$row["likes"];
					$dislikes=$row["dislikes"];
					$comentador=$row["nombre"];
					$comentario=$row["comentario"];
					$fecha=$row["fecha"];
					include("includes/mensajes.php");
				}
			}else{
				echo "No hay comentarios";
			}
		}
		
		?>

	</section>
</body>
</html>