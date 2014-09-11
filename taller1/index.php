<html>


<?php
//incluir mi coneccion a la base de datos
include "conexion/conexion.php";

?>

<!---post es un metodo seguro para enviar formulario -->
<form id="login" method="POST" action="perfil.php"> 
	codigo: <input name="codigo" type="text" ><br>
	password: <input name="password" type="password" ><br>
	<input name="enviar" type="submit" value="enviar">
</form>

<div style="display: none">
	<p>Error de usuario o contraseña</p>
</div>

</html>
<!--
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
//aca me refiero al formulario
$("#login").submit(function(){
//ajax es un metod para enviar formularios
	$.ajax({
		//que tipo de metodo se utiliza para enviar el formulario
		type: "POST",
		url: "perfil.php",
		data: dataString,  //tipo de dato que es un string, una acadena
		//sucess es el resultado
		success: function(){
			alert("funciona");		
		},
		error: function(){
			//a none se le aplica: fadein anima y muestra - delay define un tiempo - fadeout desaparece
			$(".none").fadeIn(1000).delay(3000).fadeOut(1000);
			//cada uno de los elementos se resetea
			$("#login")[0].reset();
			alert('error; ' + eval(error));
		},
	})
})

</script>-->