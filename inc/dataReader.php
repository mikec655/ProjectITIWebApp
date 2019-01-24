<?php

function readDataOfStation($date, $station, $needed, $frequency, $last) {
    
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
        if($last){
            $fz = filesize ($filePath);
            $data = fread($fp, $fz - 43);
        } 
        if(!$data = fread($fp, $length)) break;
        $array = unpack("Ntime/Gtemp/Gdewp/Gstp/Gslp/Gvisib/Gwdsp/Gprcp/Gsndp/Cfrshtt/Gcldc/nwnddir", $data);

        if($array["time"] % ($frequency * 1000) != 0) continue;

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

// $data = readDataOfStation("2019-01-21", 10010, "100000010000", 60, FALSE);
// echo "<pre>";
// print_r($data);
// echo "</pre>";

function readDataOfCountry($date, $country, $needed, $frequency, $last){
    if(!$fp = fopen ("testdata/stations.csv", 'r')) return 0;
    $stations = array();

    $keys = array("stn", "name", "lat", "long", "elev", "data");

    $station = fgetcsv($fp);
    while(($station = fgetcsv($fp)) !== FALSE){
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

//readDataOfCountry("2019-01-21", "INDIA", "110000000000", 60, FALSE);

// $data = readDataOfCountry("2019-01-21", "VIETNAM", "000000010000", 0, TRUE);
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>