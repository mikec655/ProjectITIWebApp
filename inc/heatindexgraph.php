
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
                    <?php $rtrn_array = array();
                    foreach ($selected_val['time'] as $time) {
                        $rtrn_array[] = '"' . formatSeconds($time) .
                            '"';
                    }
                    echo implode(",", $rtrn_array);?>
                ];


                myChart.update();

            }
            ,
            60000 //elke minuut update de chart
        )
</script>