<?php

include("dataReader.php");
include("countriesasia.php");

$highest_temperatures = array();

$data = readDataOfAsia(date("Y-m-d"), "110000000000", 60, FALSE);
foreach ($data as $station) {
    $highest_temperatures[$station[0]] = array(max($station[5]['temp']), $station[2], $station[1]);
}

arsort($highest_temperatures);
$highest_temperatures = array_slice($highest_temperatures, 0, 10, TRUE);
$rank = 1;

echo "<center><h1>Top 10 temperatures in Asia</h1>";
echo "<table><tr><th></th><th>Weather Station</th><th>Country</th><th>Name</th><th>Temperature</th></tr>";
foreach ($highest_temperatures as $key => $value) {
    echo "<tr><th>Rank #" . $rank . "</th><th>" . $key . "</th><th>" . $value[1] . "</th><th>" . $value[2] . "</th><th>" . round($value[0], 1) . "°C</th></tr>";
    $rank++;
}
echo "</table></center>";
?>