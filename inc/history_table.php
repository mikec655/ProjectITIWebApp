<?php
echo $_GET['date'];
if(isset($_GET['station']) and isset($_GET['date'])){
        include("dataReader.php");
        $station = readDataOfStation($_GET['date'], $_GET['station'], "110000010000", 60, FALSE);
        if ($station == -1){
            echo "Unknown Station or Invalid Date";
        } else {
            echo "<tr><th>Time</th><th>Temperature</th><th>Rainfall</th></tr>"; 
            for($i = 0; $i < count($station['time']); $i++){
                $time = date("H:i", $station['time'][$i] / 1000);
                $temp = round($station['temp'][$i], 1);
                $prcp = round($station['prcp'][$i], 2);
                echo "<tr><th>$time</th><td>$temp</td><td>$prcp</td></tr>";
            }
        }
    }
?>