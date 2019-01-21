<?php

function readData($date, $station, $needed) {

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

echo "<pre>";
print_r(readData("2019-01-21", 988510, "110000000000"));
echo "</pre>";

?>