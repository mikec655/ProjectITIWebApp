<?php
if(isset($_GET['station']) and isset($_GET['date'])){
    include("dataReader.php");
    $station = readDataOfStation($_GET['date'], $_GET['station'], "111111111111", 60, FALSE);
    if ($station == -1){
        // echo "Unknown Station or Invalid Date";
    } else {
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
            
    for($i = 0; $i < count($station['time']); $i++){
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
        $array = array("Frost", "Rain", "Snow", "Hail", "Thunderstrom", "Tornado");
        
        $downloadpath = 'xml/'. $_GET['station'] . '.xml';
        $xml_file_name = '../xml/'. $_GET['station'] . '.xml';
        $root = $dom->createElement('Station');
        $time_node = $dom->createElement('Time');
        $attr_time_id = new DOMAttr('Time', date("H:i", $station['time'][$i] / 1000));
        $time_node->setAttributeNode($attr_time_id);
        
        $child_node_temp = $dom->createElement('Temperature', round($station['temp'][$i], 1));
        $time_node->appendChild($child_node_temp);
        $child_node_dewp = $dom->createElement('Dewpoint', round($station['dewp'][$i], 1));
        $time_node->appendChild($child_node_dewp);
        $child_node_airpressurestation = $dom->createElement('Airpressure', round($station['slp'][$i], 1));
        $time_node->appendChild($child_node_airpressurestation);
        $child_node_airpressuresea = $dom->createElement('Airpressuresea', round($station['stp'][$i], 1));
        $time_node->appendChild($child_node_airpressuresea);
        $child_node_visib = $dom->createElement('Visibility', round($station['visib'][$i], 1));
        $time_node->appendChild($child_node_visib);
        $child_node_windspeed = $dom->createElement('Windspeed', round($station['wdsp'][$i], 1));
        $time_node->appendChild($child_node_windspeed);
        $child_node_rainfall = $dom->createElement('Rainfall', round($station['prcp'][$i], 2));
        $time_node->appendChild($child_node_rainfall);
        $child_node_snowfall = $dom->createElement('Snowfall', round($station['sndp'][$i], 1));
        $time_node->appendChild($child_node_snowfall);

        $array_index = 0;
        for ($j = 32; $j >= 1; $j/=2){
            if ($frshtt / $j >= 1){
                $frshtt -= $j;
                $node = $dom->createElement($array[$array_index], "YES");
                $time_node->appendChild($node);
            } else {
                $node = $dom->createElement($array[$array_index], "NO");
                $time_node->appendChild($node);
            }
            $array_index++;
        }

        $child_node_cloudcoverage = $dom->createElement('Cloudcoverage', round($station['cldc'][$i], 1));
        $time_node->appendChild($child_node_cloudcoverage);
        $child_node_winddirection = $dom->createElement('Winddirection', round($station['wnddir'][$i], 1));
        $time_node->appendChild($child_node_winddirection);
        
        $root->appendChild($time_node);
        $dom->appendChild($root);
        }
    $dom->save($xml_file_name);
    echo '<a href="' . $downloadpath .'" download>Download</a>';   
    }
}
?>