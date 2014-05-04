<?php
$data= file("data_A13_10.csv");
$data2 = file("data_S11_10.csv");
$username = "mroque";
$password = "alexis_roque@live.com";
$hostname = "localhost";
$db = "particulado";

//conecto a la bd
$con=mysqli_connect($hostname,$username,$password, $db);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Polvo del Sahara</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbo.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>


<?php
$count =1;
//somedate es la fecha q estamos buscando hasta ahora solamente tenemos hasta el 10 de enero
$somedate=1062013;
//el primer result busca los datos de dispersion de la fecha q eliges
$result = mysqli_query($con, 'Select Min, Blue, Green, Red from Relation where date='.$somedate.' and Graph_id="dispersion"');
//el segundo result busca los datod de absorcion
$result2 = mysqli_query($con, 'Select Min, Blue, Green, Red from Relation where date='.$somedate.' and Graph_id="absorcion"');

//este script es para hacer las graficas
echo '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {        var data = google.visualization.arrayToDataTable([
        
            
          ["Day", "Blue", "Green", "Red"],';
//el while saca los datos de todo los rows que cumplen con el query de arriba          
     while($row = mysqli_fetch_array($result2)){
       //el if es para chekiar q se acabaron los rows ahora mismo esta un poco marroneao pero funciona
       //lo unico que cambia entre los dos echos es al final ']' , esto es para que la grafica funcione
        if($count!=794){
         echo '[', $row['Min'],',', $row['Blue'],',',$row['Green'],',',$row['Red'],'],';
        $count++;
        }else{
         echo '[', $row['Min'],',', $row['Blue'],',',$row['Green'],',',$row['Red'],']';
        }
     }
//aqui lo que hay son diferentes opciones que le puedes poner a la grafica
      echo' ]);
            
        var options = {
          title: "Absorcion '.$somedate.'",
          colors: ["blue", "green", "red"]
        };

        var chart = new google.visualization.LineChart(document.getElementById("chart_div"));
        chart.draw(data, options);
      }

    </script>';
//esto es lo mismo pero para la segunda grafica    
$count2 =1;
echo '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {        var data = google.visualization.arrayToDataTable([
        
            
          ["Day", "Blue", "Green", "Red"],';
     while($row = mysqli_fetch_array($result)){
        $count2++;
        if($count2!=818){
         echo '[', $row['Min'],',', $row['Blue'],',',$row['Green'],',',$row['Red'],'],';
          }else{
         echo '[', $row['Min'],',', $row['Blue'],',',$row['Green'],',',$row['Red'],']';
        }
     }

      echo' ]);
            
        var options = {
          title: "Dispersion '.$somedate.'",          
          colors: ["blue", "green", "red"]
        };

        var chart = new google.visualization.LineChart(document.getElementById("chart_div2"));
        chart.draw(data, options);
      }

    </script>';


?>

  </head>

  <body>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
          <ul class="nav navbar-nav ">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="historial.html">Historial</a></li>
            <li><a href="da.html">Descargar Archivos</a></li>
                        <li><a href= "info.html">Informacion Extra</a></li>
          </ul>
        </div>
                </div>
        </nav>

    <div class="jumbotron">
      <div class="container">
        <h1>Historial</h1>
        <p>Aqui podra ver la actividad del polvo del sahara en las diferentes fechas</p>
      </div>
    </div>

    <div class="container">
       <p><b>Escoja la fecha que desea verificar</b></p>
                <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        1/1/2013
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                                <li><a href="#">4/27/2014</a></li>
                                <li><a href="#">4/26/2014</a></li>
                        </ul>
                </div>

    <div id="chart_div" style="width: 1100px; height: 500px;"></div>
    <div id="chart_div2" style="width: 1100px; height: 500px;"></div>

    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
