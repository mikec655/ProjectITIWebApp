<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
include_once("inc/dataReader.php");
$testCountry = readDataOfCountry("2019-01-21", "INDIA", "110000000000", 60, FALSE);


foreach ($testCountry as $station){
    print_r($station);
    echo "<br/><br/>";
}
/*
$station = readDataOfStation("2019-01-21",'100050' , "11000001000", 60, FALSE);

for($i = 0; $i < count($station['time']); $i++){
    $time = $station['time'][$i];
    $temp = round($station['temp'][$i], 1);
    $prcp = round($station['prcp'][$i], 2);
    echo "<tr>" .
        "Time: ".
        "<th>$time</th>" .
        "<br/>" .
        "Temp: ".
        "<td>$temp</td>" .
        "<br/>" .
        "Prcp: ".
        "<td>$prcp</td>" .
        "</tr><br/><br/>";
}*/
?>
<canvas id="myChart"  width="200" height="200"></canvas>
<script src="lib/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: 'Weather data of India',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>