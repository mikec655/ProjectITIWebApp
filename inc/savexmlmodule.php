<?php
if(isset($_GET['station']) and isset($_GET['date'])){
    include("dataReader.php");
    $station = readDataOfStation($_GET['date'], $_GET['station'], "110000010000", 60, FALSE);
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
        $prcp = round($station['prcp'][$i], 2);
        
        $downloadpath = 'xml/'. $_GET['station'] . '.xml';
        $xml_file_name = '../xml/'. $_GET['station'] . '.xml';
        $root = $dom->createElement('Station');
        $time_node = $dom->createElement('Time');
        $attr_time_id = new DOMAttr('Time', date("H:i", $station['time'][$i] / 1000));
        $time_node->setAttributeNode($attr_time_id);
        
        $child_node_temp = $dom->createElement('Temp', round($station['temp'][$i], 1));
        $time_node->appendChild($child_node_temp);
        
        $child_node_prcp = $dom->createElement('prcp', round($station['prcp'][$i], 2));
        $time_node->appendChild($child_node_prcp);
        $root->appendChild($time_node);
        $dom->appendChild($root);
        }
    $dom->save($xml_file_name);
    echo '<a href="' . $downloadpath .'" download>Download</a>';   
    }
}

   
?>