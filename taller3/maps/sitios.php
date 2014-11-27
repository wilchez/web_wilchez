<!DOCTYPE html>
    <html>
    <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      <title>Google Maps Multiple Markers</title>
      <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
      <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
      <style>
  body{background-color:#000;}
      .content{width:800px;margin:auto;}
      #div1 {width:226px;height:70px;border:1px solid #aaaaaa;background-color:#fff;}
      .column_right{float: left; width: 226px; padding: 20px;}
      </style>
    </head>
    <body>
      <div class="content">
        <div id="map" style="float:left; width: 530px; height: 530px;"></div>

        <?php

        include_once("includes/database.php");

        $result=mysqli_query($con,"SELECT nombre, latitud, longitud, id FROM sitios WHERE tipo='universidad'");

        $list = array();

        while ($row=mysqli_fetch_array($result)) {
          $list[] = $row;
        }

        //print_r($list);

        //mysql_close($con);

        ?>


        <script type="text/javascript">
          var locations = <?php echo json_encode($list); ?>;
          //alert(locations);

          sitelocation(locations);

          function sitelocation(locations){

            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 13,
              center: new google.maps.LatLng(3.3419502, -76.52954),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
        console.log(locations[i][0]);
        console.log(+locations[i][1]);
        console.log(locations[i][2]);
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
              });

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow.setContent(locations[i][0]);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }
          }
        </script>
        <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            var typeSite = "";
            if(data=="drag1"){
                typeSite="universidad";
            }
            if(data=="drag2"){
              typeSite="restaurantes";
            }
            if(data=="drag3"){
              typeSite="hogares";
            }
      console.log(typeSite);

            if(typeSite==""){
              alert("no se ha definido un tipo de sitio para buscar");
            }else{
              $.ajax({
                  url: "findsite.php",
                  type: "post",
                  data: {
                      typeSite: typeSite,
                  },
                  success: function(data) {
                      var locations = $.parseJSON(data);
                      console.log(data);
                      if(locations.length < 1){
                        alert("No existe ningun dato");
                      }else{
                        //alert(data);
            //console.log(locations[i][1]);
                        sitelocation(locations);
                        
                      }
                  },
                  error: function() {
                      //alert("failure");
                  }
               });         
            }
        }
        </script>

        <div class="column_right">
          <img id="drag1" src="img/uni.png" draggable="true" ondragstart="drag(event)" >
          <img id="drag2" src="img/res.png" draggable="true" ondragstart="drag(event)" >
          <img id="drag3" src="img/hog.png" draggable="true" ondragstart="drag(event)" >

          <canvas id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></canvas>
          <script>
          var c = document.getElementById("div1");
          var ctx = c.getContext("2d");
          ctx.moveTo(0,0);
          ctx.lineTo(300,150);
          ctx.stroke();
          var ctx = c.getContext("2d");
          ctx.moveTo(300,0);
          ctx.lineTo(0,150);
          ctx.stroke();
          </script>
        </div>
      </div>
    </body>
    </html>