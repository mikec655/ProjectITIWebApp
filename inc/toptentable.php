<?php

include("dataReader.php");
$countries = array(
    "AFGHANISTAN",
    "ARMENIA",
    "AZERBAIJAN",
    "BAHRAIN",
    "BANGLADESH",
    "BHUTAN",
    "BRUNEI",
    "CAMBODIA",
    "CHINA",
    "CYPRUS",
    "GEORGIA",
    "INDIA",
    "INDONESIA",
    "IRAN",
    "IRAQ",
    "ISRAEL",
    "JAPAN",
    "JORDAN",
    "KAZAKHSTAN",
    "KUWAIT",
    "KYRGYZSTAN",
    "LAOS",
    "LEBANON",
    "MALAYSIA",
    "MALDIVES",
    "MONGOLIA",
    "MYANMAR",
    "NEPAL",
    "NORTH KOREA",
    "OMAN",
    "PAKISTAN",
    "PALESTINE",
    "PHILIPPINES",
    "QATAR",
    "RUSSIA",
    "SAUDI ARABIA",
    "SINGAPORE",
    "SOUTH KOREA",
    "SRI LANKA",
    "SYRIA",
    "TAIWAN",
    "TAJIKISTAN",
    "THAILAND",
    "TIMOR-LESTE",
    "TURKEY",
    "TURKMENISTAN",
    "UNITED ARAB EMIRATES",
    "UZBEKISTAN",
    "VIETNAM",
    "YEMEN"
);
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
    $rank;
    $rankxml = $rank;
    $key;
    $value[1];
    $value[2];
    round($value[0], 1);
}

$roundedtemp = round($value[0], 1);
$currentday = date('l jS \of F Y h:i:s A');
$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$xml_file_name = 'top10 warmest countries.xml';
$root = $dom->createElement('Top10_countries');
foreach ($highest_temperatures as $key => $value) {
    $station_node = $dom->createElement('Top10');
    $attr_rank_id = new DOMAttr('rank', $rankxml);
    $station_node->setAttributeNode($attr_rank_id);
    $child_node_stationnr = $dom->createElement('Station_number', $key);
    $station_node->appendChild($child_node_stationnr);
    $child_node_country = $dom->createElement('Country', $value[1]);
    $station_node->appendChild($child_node_country);
    $child_node_stationname = $dom->createElement('Station_Name', $value[2]);
    $station_node->appendChild($child_node_stationname);
    $child_node_temperature = $dom->createElement('Temp', $roundedtemp);
    $station_node->appendChild($child_node_temperature);
    $root->appendChild($station_node);
    $dom->appendChild($root);
    $rankxml++;
}
foreach ($highest_temperatures as $key => $value) {
    echo "<tr><th>Rank #" . $rank++ . "</th><th>" . $key . "</th><th>" . $value[1] . "</th><th>" . $value[2] . "</th><th>" . round($value[0], 1) . "°C</th></tr>";
}
?>