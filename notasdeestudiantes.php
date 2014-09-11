<?php
  include_once("includes/database.php");

  if (isset($_GET["codigo"])){
    $codigo = $_GET["codigo"];

    echo "<h1>Notas de estudiante: ".$codigo."</h1><br /><br />";
  } else {
    echo "<h1>Notas de estudiantes</h1><br /><br />";
  }

  $query = "SELECT estudiantesWeb.estudiantes.nombre AS Nombre,
    MAX(IF(estudiantesWeb.notas.nombre = 'Taller1', estudiantesWeb.notasdeestudiantes.valor, '0')) AS `Taller1`,
    MAX(IF(estudiantesWeb.notas.nombre = 'Taller2', estudiantesWeb.notasdeestudiantes.valor, '0')) AS `Taller2`,
    MAX(IF(estudiantesWeb.notas.nombre = 'Taller3', estudiantesWeb.notasdeestudiantes.valor, '0')) AS `Taller3`,
    MAX(IF(estudiantesWeb.notas.nombre = 'Taller4', estudiantesWeb.notasdeestudiantes.valor, '0')) AS `Taller4`,
    FROM notasdeestudiantes
    JOIN estudiantes ON estudiantesWeb.notasdeestudiantes.codigoEstudiante=estudiantesWeb.estudiantes.codigo
    JOIN notas ON estudiantesWeb.notasdeestudiantes.idNota=estudiantesWeb.notas.idNota
    GROUP BY estudiantesWeb.estudiantes.nombre";

  //$query = "SELECT estudiantes.codigo, estudiantes.nombre, notasdeestudiantes.valor FROM estudiantes, notasdeestudiantes WHERE estudiantes.codigo=notasdeestudiantes.codigoEstudiante";
  //pido las notas de todos los estudiantes

  $result = mysqli_query($con,$query);
  //convierto variable resultado en array, guarda cada objeto en una variable row

  echo print_r($result);

  while($row = mysql_fetch_array($result, MYSQL_NUM)) {
    echo "<tr>";
    echo "<td>" . $row['Nombre'] . "</td>";
    echo "<td>" . $row['Taller1'] . "</td>";
    echo "<td>" . $row['Taller2'] . "</td>";
    echo "<td>" . $row['Taller3'] . "</td>";
    echo "<td>" . $row['Taller4'] . "</td>";
    echo "</tr>";
  }

?>