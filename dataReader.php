<?php

function readDataOfStation($date, $station, $needed) {

    $filePath = "testdata/" . $date . "/" . $station . ".dat";
    if(!$fp = fopen ($filePath, 'rb')) return 0;

    $result = array();

    $keys = array("time", "temp", "dewp", "stp", "slp", "visib", "wdsp", "prcp", "sndp", "frshtt", "cldc", "wnddir");

    for ($i = 0; $i < 12; $i++){
        if (substr($needed, $i, 1) == '1'){
            $result[$keys[$i]] = array();
        }
    }
    
    $length = 43;
    while(true) {
        if(!$data = fread($fp, $length)) break;
        $array = unpack("Ntime/Gtemp/Gdewp/Gstp/Gslp/Gvisib/Gwdsp/Gprcp/Gsndp/Cfrshtt/Gcldc/nwnddir", $data);
        $i = 0;
        foreach ($array as $key => $value){
            if (substr($needed, $i, 1) == '1'){
                array_push($result[$key], $value);
            }
            $i++;
        }
        
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
    }

    return $result;
}

// echo "<pre>";
// print_r(readData("2019-01-21", 72000, "110000000000"));
// echo "</pre>";

function readDataOfCountry($date, $country, $needed){
    if(!$fp = fopen ("testdata/stations.csv", 'r')) return 0;
    $stations = array();

    $station = fgetcsv($fp);
    while(($station = fgetcsv($fp)) !== FALSE){
        if ($station[2] == $country) {
            $data = readDataOfStation($date, $station[0], $needed);
            array_push($station, $data);
            array_push($stations, $station);

        }
    }

    // echo "<pre>";
    // print_r($stations);
    // echo "</pre>";

    return $stations;
}

readDataOfCountry("2019-01-21", "INDIA", "110000000000");
?>