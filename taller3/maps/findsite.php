<?php

	include_once("includes/database.php");

	if($_POST){
      $type = $_POST["typeSite"];

      $result=mysqli_query($con,"SELECT nombre, latitud, longitud, id FROM sitios WHERE tipo='$type'");
      //$totalFilas = mysql_num_rows($result);  

      $list = array();

      //if($totalFilas!=0){

        while ($row=mysqli_fetch_array($result)) {
          $list[] = $row;
        }

        //print_r($list);
        
      //}

      mysql_close($con);

      echo json_encode($list);
  }else{
  	echo "nada";
  }
?>
