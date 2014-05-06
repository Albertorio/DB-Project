<?php
$data= file("data_A13_10.csv");
$data2 = file("data_S11_10.csv");
$username = "mroque";
$password = "alexis_roque@live.com";
$hostname = "localhost";
$db = "particulado";

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
$date_word = str_split(strVal($_GET["date"]));

if(count($date_word)==8){
        switch($date_word[1]){
                case "0":
                  $month = "octubre";
                  break;
                case "1":
                  $month = "noviembre";
                  break;
                case "2":
                  $month = "diciembre";
                  break;
        }
}else{

switch($date_word[0]){
        case "1":
          $month = "enero";
          break;
 case "2":
          $month = "febrero";
          break;
        case "3":
          $month = "marzo";
          break;
        case "4":
          $month = "abril";
          break;
        case "5":
          $month = "mayo";
          break;
        case "6":
          $month = "junio";
          break;
        case "7":
          $month = "julio";
          break;
        case "8":
          $month = "agosto";
          break;
        case "9":
          $month = "septiembre";
          break;
}
}
$result = mysqli_query($con, 'Select Min, Blue, Green, Red from Relation where date='.$_GET["date"].' and Graph_id="dispersion"');
$result2 = mysqli_query($con, 'Select Min, Blue, Green, Red from Relation where date='.$_GET["date"].' and Graph_id="absorcion"');
$dates = mysqli_query($con, 'Select * from Date');
$my_date = array();

while($row = mysqli_fetch_array($dates)){
        $my_date[] = $row['Date_id'];
}
echo '<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {        var data = google.visualization.arrayToDataTable([
        
            
          ["Day", "Blue", "Green", "Red"],';
     while($row = mysqli_fetch_array($result2)){
         echo '[', $row['Min'],',', $row['Blue'],',',$row['Green'],',',$row['Red'],'],';
     }

      echo' ]);
            
        var options = {
          title: "Absorcion ';
        if($date_word[1]==0){
        echo $date_word[2], "/", $month, "/", $date_word[3],$date_word[4],$date_word[5],$date_word[6];
        }else{
echo $date_word[1],$date_word[2],"/", $month, "/", $date_word[3],$date_word[4],$date_word[5],$date_word[6];
        }
        echo '",
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
     while($row = mysqli_fetch_array($result)){
         echo '[', $row['Min'],',', $row['Blue'],',',$row['Green'],',',$row['Red'],'],';
     }

      echo' ]);
            
        var options = {
          title: "Dispersion ';
        if($date_word[1]==0){
        echo $date_word[2], "/", $month, "/", $date_word[3],$date_word[4],$date_word[5],$date_word[6];
        }else{
        echo $date_word[1],$date_word[2],"/", $month, "/", $date_word[3],$date_word[4],$date_word[5],$date_word[6];
        }

        echo '",          
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
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="test.php?date=1012013">Historial</a></li>
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
    <div class="row">
        <div class="col-md-4">
       <h4><b>Escoja la fecha que desea verificar</b></h4>
                <div class="btn-group">
                    <button type="button" class="btn btn-info">
                        <?php
                            echo '<a href="downtest.php?date='.$_GET["date"].'" target ="_blank" style= "text-decoration:none;color:white;">Descargar</a>';
                        ?>
                    </button>
                </div>
        <div class="col-md-4">
            <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_GET["date"];?>
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <?php
                                for($x=0;$x<count($my_date);$x++){
                                        echo '<li><a href="test.php?date='.$my_date[$x].'">'.$my_date[$x].'</a></li>';
                                }
                        ?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
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
