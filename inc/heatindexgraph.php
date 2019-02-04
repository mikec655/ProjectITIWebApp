
<canvas id="myChart"></canvas>
<?php
include("dataReader.php");
    if (isset($_GET['station'])) {
        $selected_val = $_GET['station'];  // Storing Selected Value In Variable
        $station_number = $selected_val;
        $selected_val = readDataOfStation(date("Y-m-d"), $selected_val, "110000100000", 60, FALSE);  // Retrieving Selected Value
        $rtrn_array = array();
        foreach ($selected_val['time'] as $time) {
            $rtrn_array[] = '"' . date("H:i", $time / 1000) .
                '"';
        }

        $rtrn_array2 = array();
        $counter = 0;
        foreach ($selected_val['wdsp'] as $wdsp) {
            $rtrn_array2[] = '"' . round(calculateHeatIndex($selected_val['temp'][$counter++], $wdsp), 1) . '"';
        }

    }
?>

<script src="lib/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php  echo implode(",", $rtrn_array); ?>],
            datasets: [{
                label: 'Heat Index Station ' + <?php echo $station_number?>,
                data: [ <?php echo implode(",", $rtrn_array2) ?>],
                backgroundColor: ['rgba(57, 106, 203, 0.5)'],
                borderColor: ['rgba(0, 0, 255, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
  
    });
</script>

<?php
$linkpath = 'Station ' . date("Y-m-d") . '.xml';

echo "<a href='xml/" . $linkpath . "' download='$linkpath'>Download</a>";
$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$root = $dom->createElement('Top10_countries');
$counter = 0;
foreach ($highest_temperatures as $key => $value) {
    $station_node = $dom->createElement('Rank' . $rank);
    $attr_rank_id = new DOMAttr('rank', $rank);
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
    $counter++;
}
$dom->save("../xml/" . $linkpath);

?>
