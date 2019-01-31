<?php

include("inc/dataReader.php");
include("inc/countriesasia.php");

$highest_temperatures = array();

$data = readDataOfAsia(date("Y-m-d"), "110000000000", 60, FALSE);
foreach ($data as $station) {
    $highest_temperatures[$station[0]] = array(max($station[3]['temp']), $station[2], $station[1]);
}

arsort($highest_temperatures);
$highest_temperatures = array_slice($highest_temperatures, 0, 10, TRUE);
$rank = 1;

foreach ($highest_temperatures as $key => $value) {
    $rank;
    $rankxml = $rank;
    $key;
    $value[1];
    $value[2];
    round($value[0], 1);
}

$currentday = date("Y-m-d");
$linkpath = 'Top 10 of ' . $currentday . '.xml';

$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$xml_file_name = 'top10 warmest countries.xml';
$root = $dom->createElement('Top10_countries');
foreach ($highest_temperatures as $key => $value) {
    $station_node = $dom->createElement('Rank' . $rankxml);
    $attr_rank_id = new DOMAttr('rank', $rankxml);
    $station_node->setAttributeNode($attr_rank_id);
    $child_node_stationnr = $dom->createElement('Station_number', $key);
    $station_node->appendChild($child_node_stationnr);
    $child_node_country = $dom->createElement('Country', $value[1]);
    $station_node->appendChild($child_node_country);
    $child_node_stationname = $dom->createElement('Station_Name', $value[2]);
    $station_node->appendChild($child_node_stationname);
    $child_node_temperature = $dom->createElement('Temp', round($value[0], 1));
    $station_node->appendChild($child_node_temperature);
    $root->appendChild($station_node);
    $dom->appendChild($root);
    $rankxml++;
}
foreach ($highest_temperatures as $key => $value) {
    echo "<tr><th>Rank #" . $rank++ . "</th><th>" . $key . "</th><th>" . $value[1] . "</th><th>" . $value[2] . "</th><th>" . round($value[0], 1) . "°C</th></tr>";
}
?>