<?php

function readDataOfStation($date, $station, $needed, $frequency, $last) {

    $filePath = "../public/data/" . $date . "/" . $station . ".dat";
    if (file_exists($filePath)) {
        if (!$fp = fopen($filePath, 'rb'))
            return -1;
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
        if (!$data = fread($fp, $length))
            break;
        $array = unpack("Ntime/Gtemp/Gdewp/Gstp/Gslp/Gvisib/Gwdsp/Gprcp/Gsndp/Cfrshtt/Gcldc/nwnddir", $data);

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

function readDataOfCountry($date, $country, $needed, $frequency, $last) {
    if (!$fp = fopen("../public/data/stations.csv", 'r'))
        return 0;
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
    return $stations;
}

function calculateHeatIndex($currentTemp, $currentWindspeed) {
    $awnser = 33 + ($currentTemp - 33) * (0.474 + 0.454 * sqrt($currentWindspeed) - 0.0454 * $currentWindspeed);
    return $awnser;
}

function readDataOfAsia($date, $needed, $frequency, $last) {
    $stationnetje = array();
    include ("stationsasia.php");
    foreach ($stationsasia as $station) {
        $data = readDataOfStation($date, $station[0], $needed, $frequency, $last);
        $data2 = array();
        $data2[0] = $station[0];
        $data2[1] = $station[1];
        $data2[2] = $station[2];
        $data2[3] = $station[3];
        $data2[4] = $station[4];
        $data2[5] = $data;
        array_push($stationnetje, $data2);
    }
    return $stationnetje;
}
?>