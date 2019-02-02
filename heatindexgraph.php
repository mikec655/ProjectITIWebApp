<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HeroCycles</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- <meta http-equiv="refresh" content="3"> -->
    </head>
    <body>
        <div class="container">
            <?php
            include("inc/header.php");
            ?>
        </div>
        <div>
            <img src="img/headerHC.jpg" alt="header image" class="headerimg"/>
        </div>
        <div id="delimiter"></div>
        <div class="container">
            <?php
            include_once("inc/dataReader.php");
            $country = readDataOfCountry("2019-02-02", "INDIA", "110000000000", 60, FALSE);
            ?>
            <div class="Form_container" style="position: center">
                <form action="#" method="post" style="text-align: center">
                    <select name="Station">
                        <?php foreach ($country as $stationX) { ?>
                            <option value="<?= $stationX['stn'] ?>"><?= $stationX['name'] ?></option>
                        <?php }
                        ?>
                    </select>
                    <input type="submit" name="submit" value="Get Selected Values"/>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $selected_val = $_POST['Station'];  // Storing Selected Value In Variable
                    $station_number = $selected_val;
                    $selected_val = readDataOfStation("2019-01-21", $selected_val, "11100011000", 60, FALSE);  // Retrieving Selected Value
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


                            myChart.update();

                        }
                        ,
                                60000 //elke minuut update de chart
                                )
            </script>
        </div>
        <div id="footer">
            <div class="container">
                <div class="left">&copy; ITV2A</div>
            </div>
        </div>
    </body>
</html>