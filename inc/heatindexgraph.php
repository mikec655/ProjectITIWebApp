
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
$root = $dom->createElement('HEATINDEX');
$attr = new DOMAttr('station', $_GET['station']);
$root->setAttributeNode($attr);
$counter = 0;
$station_node = $dom->createElement('station');
$attr = new DOMAttr('id', $counter);
foreach ($rtrn_array as $key ) {
    $station_node = $dom->createElement('INSERT', $rtrn_array2[$counter]);
    $attr = new DOMAttr('time', $key);
    $station_node->setAttributeNode($attr);
    $root->appendChild($station_node);
    $dom->appendChild($root);
    $counter++;
}
$dom->save("../xml/" . $linkpath);

?>
