<html>
<head>
    <title>PHP Test</title>
</head>
<body>
<?php
include_once("inc/dataReader.php");
$station = readDataOfStation("2019-01-21",'100050' , "11000001000", 60, FALSE);
//echo $station;
/*foreach($station as $test){
    print_r($test);
    echo '<br/>';
}*/
for($i = 0; $i < count($station['time']); $i++){
    $time = $station['time'][$i];
    $temp = round($station['temp'][$i], 1);
    $prcp = round($station['prcp'][$i], 2);
    echo "<tr><th>$time</th><br/><td>$temp</td><br/><td>$prcp</td></tr>";
}
?>

</body>
</html>