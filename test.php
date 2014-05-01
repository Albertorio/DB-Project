<?php $data= file("data_A13_10.csv");
      $data2 = file("data_S11_10.csv");
$username = "mroque";
$password = "alexis_roque@live.com";
$hostname = "localhost";
$db = "particulado";

$con=mysql_connect($hostname,$username,$password);
mysql_select_db($db);

// Check connection
//if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}

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
$days = 1437;

 echo '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
            
          ["Day", "Blue", "Green", "Red"],';
         for($x=1; $x<$days; $x++){
            $arr = explode(",", $data[$x]);
            if($x+1>=$days){
if(empty($arr[5])==false){
                 echo '[', floatVal($arr[1]),', ', floatVal($arr[5]),', ', floatVal($arr[6]),',',floatVal($arr[7]),']';
              }
            }else{
                if(empty($arr[5])==false){
                 echo '[', floatVal($arr[1]),', ', floatVal($arr[5]),', ', floatVal($arr[6]),',',floatVal($arr[7]),'],';
               }
            }
          }


       echo' ]);
            
        var options = {
          title: "Absorcion 1/1/2013",
          colors: ["blue", "green", "red"]
        };

        var chart = new google.visualization.LineChart(document.getElementById("chart_div"));
        chart.draw(data, options);
      }

    </script>';

echo '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
            
          ["Day", "Blue", "Green", "Red"],';
         for($x=1; $x<$days; $x++){
            $arr = explode(",", $data2[$x]);
            if($x+1>=$days){
              if(empty($arr[4])==false){
                 echo '[', floatVal($arr[1]),', ', floatVal($arr[4]),', ', floatVal($arr[5]),',',floatVal($arr[6]),']';
              }
            }else{
                if(empty($arr[4])==false){
                 echo '[', floatVal($arr[1]),', ', floatVal($arr[4]),', ', floatVal($arr[5]),',',floatVal($arr[6]),'],';
               }
            }
          }


       echo' ]);
            
        var options = {
          title: "Dispersion 1/1/2013",
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
