<?php
if (isset($_GET['station']) and isset($_GET['date'])) {
    echo "<table>";
    include("dataReader.php");
    $station = readDataOfStation($_GET['date'], $_GET['station'], "111111111111", 60, FALSE);
    if ($station == -1) {
        echo "Unknown Station or Invalid Date";
    } else {
        echo "<tr><th>Time</th>" .
        "<td>Temperature</td>" . 
        "<td>Dew point</td>" .
        "<td>Air pressure (Station level)</td>" .
        "<td>Air pressure (Sea Level)</td>" .
        "<td>Visibility</td>" . 
        "<td>Wind Speed</td>" .
        "<td>Rainfall</td>" .
        "<td>Snowfall</td>" .
        "<td>Frost</td>" .
        "<td>Rain</td>" .
        "<td>Snow</td>" .
        "<td>Hail</td>" .
        "<td>Thunderstorm</td>" .
        "<td>Tornado</td>" .
        "<td>Cloud Coverage</td>" .
        "<td>Wind direction</td></tr>";
        for ($i = 0; $i < count($station['time']); $i++) {
            $time = date("H:i", $station['time'][$i] / 1000);
            $temp = round($station['temp'][$i], 1);
            $dewp = round($station['dewp'][$i], 1);
            $slp = round($station['slp'][$i], 1);
            $stp = round($station['stp'][$i], 1);
            $visib = round($station['visib'][$i], 1);
            $wdsp = round($station['wdsp'][$i], 1);
            $prcp = round($station['prcp'][$i], 2);
            $sndp = round($station['sndp'][$i], 1);
            $frshtt = round($station['frshtt'][$i], 1);
            $cldc = round($station['cldc'][$i], 1);
            $wnddir = round($station['wnddir'][$i], 1);
            
            echo "<tr><th>$time</th>" .
            "<td>$temp °C</td>" . 
            "<td>$dewp °C</td>" .
            "<td>$slp mbar</td>" .
            "<td>$stp mbar</td>" .
            "<td>$visib km</td>" . 
            "<td>$wdsp km/h</td>" .
            "<td>$prcp cm</td>" .
            "<td>$sndp cm</td>";
            for ($j = 32; $j >= 1; $j/=2){
                if ($frshtt / $j >= 1){
                    $frshtt -= $j;
                    echo "<td>YES</td>";
                } else {
                    echo "<td>NO</td>";
                }
            }
            echo "</td><td>$cldc %</td>" .
            "<td>$wnddir °</td></tr>";
        }
    }
    echo "</table>";
}
?>