<?php
    include("dataReader.php");
    include("countriesasia.php");
    $highest_temperatures = array();
    foreach ($countries as $country) {
        $data = readDataOfCountry(date("Y-m-d"), $country, "110000000000", 60 * 60, FALSE);
        foreach ($data as $station) {
            $highest_temperatures[$station['stn']] = array(max($station['data']['temp']), $country, $station['name']);
            //print_r($station['data']['temp']);
        }
    }
    arsort($highest_temperatures);
    $highest_temperatures = array_slice($highest_temperatures, 0, 10, TRUE);
    $rank = 1;
    foreach ($highest_temperatures as $key => $value) {
        echo "<tr><th>Rank #" . $rank++ . "</th><th>" . $key . "</th><th>" . $value[1] . "</th><th>" . $value[2] . "</th><th>" . round($value[0], 1) . "°C</th></tr>";
    }
    ?>