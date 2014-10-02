<?php session_start();

if(isset($_GET)){
	if(isset($_GET["mensaje"]) AND isset($_GET["tipo"])){
		$t=$_GET["tipo"];
		if($t==4){
			$query=	"INSERT INTO `favoritos`(`usuario`, `id_mensaje`) VALUES (".$_SESSION["correo"].",".$_GET["mensaje"].")"
		}else{			
			$up="likes";
			if($t==2){
				$up="dislikes";
			}else if($t==1){
				$up="no";
			}

			$query= "SELECT * from mensajes.mensajes WHERE  id='".$_GET["mensaje"]."'";
			$resultado=mysqli_query($conexion,$query);
			$li=mysqli_fetch_array($resultado)[$up];
			$li=$li+1;

			 $query = "UPDATE mensajes.mensajes SET `".$up."`=".$li." WHERE `id`=".$_GET["mensaje"];
			mysqli_query($conexion,$query);

			$query="INSERT INTO `likes`(`usuario`, `id_mensaje`, `tipo`) VALUES (".$_SESSION["correo"].",".$_GET["mensaje"].",".$t.")";
		}
	}
}

?>