
<canvas id="myChart"></canvas>
<?php
include("dataReader.php");
    if (isset($_GET['station'])) {
        $selected_val = $_GET['station'];  // Storing Selected Value In Variable
        $station_number = $selected_val;
        $selected_val = readDataOfStation(date("Y-m-d"), $selected_val, "11100011000", 60, FALSE);  // Retrieving Selected Value
    }
?>

<script src="lib/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php $rtrn_array = array();
                    foreach ($selected_val['time'] as $time) {
                        $rtrn_array[] = '"' . date("H:i", $time / 1000) .
                            '"';
                    }
                    echo implode(",", $rtrn_array);?>
                ],
                datasets: [{
                    label: 'Weather data of India/station ' + <?php echo $station_number?>,
                    data: [
                        <?php
                        $rtrn_array = array();
                        $counter = 0;
                        foreach ($selected_val['wdsp'] as $temp) {
                            $rtrn_array[] = '"' . floorp(calculateHeatIndex($selected_val['temp'][$counter], $temp), 2) . '"';
                        }
                        echo implode(",", $rtrn_array)
                        ?>],
                    backgroundColor: [
                        'rgba(57, 106, 203, 0.5)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 255, 1)'
                    ],
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
                ?>
            </div>


            <div class="chart_container" style="position: relative; height: auto; width: 100%">
                <canvas id="myChart"></canvas>
            </div>

            <script src="lib/Chart.bundle.min.js"></script>
            <script>
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [
<?php
$rtrn_array = array();
foreach ($selected_val['time'] as $time) {
    $rtrn_array[] = '"' . formatSeconds($time) .
            '"';
}
echo implode(",", $rtrn_array);
?>
                        ],
                        datasets: [{
                                label: 'Weather data of India/station ' + <?php echo $station_number ?>,
                                data: [
<?php
$rtrn_array = array();
$counter = 0;
foreach ($selected_val['wdsp'] as $temp) {
    $rtrn_array[] = '"' . floorp(calculateHeatIndex($selected_val['temp'][$counter], $temp), 2) . '"';
}
echo implode(",", $rtrn_array)
?>],
                                backgroundColor: [
                                    'rgba(57, 106, 203, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
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
                        ,
                        responsive: true
                    }
                })
                        ;

            </script>
            <script>
                var interval =
                        setInterval(function updateChart() {
                            myChart.data.datasets[0].data =
                                    [
<?php
$rtrn_array = array();
$counter = 0;
foreach ($selected_val['wdsp'] as $temp) {

    $rtrn_array[] = '"' . floorp(calculateHeatIndex($selected_val['temp'][$counter], $temp), 2) . '"';
}
echo implode(",", $rtrn_array)
?>];
                            myChart.data.labels = [
<?php
$rtrn_array = array();
foreach ($selected_val['time'] as $time) {
    $rtrn_array[] = '"' . formatSeconds($time) .
            '"';
}
echo implode(",", $rtrn_array);
?>
                            ];
            }
            ,
            60000 //elke minuut update de chart
        )
</script>
