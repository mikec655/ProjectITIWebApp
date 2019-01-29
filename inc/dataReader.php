<?php

function readDataOfStation($date, $station, $needed, $frequency, $last)
{

    $filePath = "testdata/" . $date . "/" . $station . ".dat";
    if (file_exists($filePath)) {
        if (!$fp = fopen($filePath, 'rb')) return -1;
    } else {
        return -1;
    }


    $result = array();

    $keys = array("time", "temp", "dewp", "stp", "slp", "visib", "wdsp", "prcp", "sndp", "frshtt", "cldc", "wnddir");

    for ($i = 0; $i < 12; $i++) {
        if (substr($needed, $i, 1) == '1') {
            $result[$keys[$i]] = array();
        }
    }

    $byteIndex = 0;
    if ($last) {
        $byteIndex = filesize($filePath) - 43;
        fseek($fp, $byteIndex);
    }


    $length = 43;
    while (true) {
        if (!$data = fread($fp, $length)) break;
        $array = unpack("Ntime/Gtemp/Gdewp/Gstp/Gslp/Gvisib/Gwdsp/Gprcp/Gsndp/Cfrshtt/Gcldc/nwnddir", $data);

        // if($array["time"] % ($frequency * 1000) != 0) continue;

        $i = 0;
        foreach ($array as $key => $value) {
            if (substr($needed, $i, 1) == '1') {
                array_push($result[$key], $value);
            }
            $i++;
        }

        $byteIndex += 43 * $frequency;
        fseek($fp, $byteIndex);
    }

    return $result;
}

// $data = readDataOfStation("2019-01-21", 10010, "100000000000", 60, FALSE);
// echo "<pre>";
// print_r($data);
// echo "</pre>";

function readDataOfCountry($date, $country, $needed, $frequency, $last)
{
    if (!$fp = fopen("testdata/stations.csv", 'r')) return 0;
    $stations = array();

    $keys = array("stn", "name", "lat", "long", "elev", "data");

    $station = fgetcsv($fp);
    while (($station = fgetcsv($fp)) !== FALSE) {
        if ($station[2] == $country) {
            $data = readDataOfStation($date, $station[0], $needed, $frequency, $last);
            $namedData["stn"] = $station[0];
            $namedData["name"] = $station[1];
            $namedData["lat"] = $station[3];
            $namedData["long"] = $station[4];
            $namedData["elev"] = $station[5];
            $namedData["data"] = $data;
            array_push($stations, $namedData);

        }
    }

    // echo "<pre>";
    // print_r($stations);
    // echo "</pre>";

    return $stations;
}

function formatSeconds($milliseconds)
{
    $seconds = floor($milliseconds / 1000);
    $minutes = floor($seconds / 60);
    $hours = floor($minutes / 60);
    $milliseconds = $milliseconds % 1000;
    $seconds = $seconds % 60;
    $minutes = $minutes % 60;

    $format = '%u:%02u';
    $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
    return rtrim($time, '0');
}

function floorp($val, $precision)
{
    $mult = pow(10, $precision); // Can be cached in lookup table
    return floor($val * $mult) / $mult;
}

function calculateHeatIndex($currentTemp, $currentDewpoint)
{
    /*//Setting parameters for Function
    $temperature = $currentTemp;
    $humidity = ($temperature/$currentDewpoint);
    $answer;
    $C1 = -42.379;
    $C2 = 2.04901523;
    $C3 = 10.14333127;
    $C4 = -0.22475541;
    $C5 = -.00683783;
    $C6 = -5.481717E-2;
    $C7 = 1.22874E-3;
    $C8 = 8.5282E-4;
    $C9 = -1.99E-6;
    $T = $temperature;
    $R = $humidity;
    $T2 = $temperature * $temperature;
    $R2 = $humidity * $humidity;

    //Function of Calculating Heat Index
    $answer = $C1 + ($C2 * $T) + ($C3 * $R) + ($C4 * $T * $R) + ($C5 * $T2) + ($C6 * $R2) + ($C7 * $T2 * $R) + ($C8 * $T * $R2) + ($C9 * $T2 * $R2);

    return $answer;*/
    //Tgevoel(°C) = 33 + (Tlucht- 33)*(0.474 + 0.454√(v)-0.0454.v)
    $awnser = 33 + ($currentTemp-33)*(0.474 + 0.454 * sqrt($currentDewpoint)-0.0454*$currentDewpoint);
    return $awnser;

}

//readDataOfCountry("2019-01-21", "INDIA", "110000000000", 60, FALSE);

// $data = readDataOfCountry("2019-01-21", "VIETNAM", "000000010000", 0, TRUE);
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>