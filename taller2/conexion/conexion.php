<?php
//informacion de la base de datos
$hostname="localhost";
$database="catalogo";
$username="root";
$password="";
//conexion a base de datos --funciones en parentesis y en azul
$conexion=mysql_pconnect($hostname,$username,$password) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database);
?>