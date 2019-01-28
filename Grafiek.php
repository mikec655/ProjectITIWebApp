<html>
<head>
    <title>PHP Test</title>
    <?php
    require("inc/headermodule.php");
    require("inc/loginrequire.php");
    ?>
</head>
<body>

<?php
include_once("inc/dataReader.php");
$country = readDataOfCountry("2019-01-21", "INDIA", "110000000000", 60, FALSE);
?>
<div class="Form_container" style="position: centers">
    <form action="#" method="post">
        <select name="Station">
            <?php
            foreach ($country as $stationX) { ?>
                <option value="<?= $stationX['stn'] ?>"><?= $stationX['name'] ?></option>
                <?php
            } ?>
        </select>
        <input type="submit" name="submit" value="Get Selected Values"/>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $selected_val = $_POST['Station'];  // Storing Selected Value In Variable
        $station_number = $selected_val;
        $selected_val = readDataOfStation("2019-01-21", $selected_val, "11000001000", 60, FALSE);  // Retrieving Selected Value
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
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            datasets: [{
                label: 'Weather data of India/station ' + <?php echo $station_number?>,
                data: [
                    <?php
                    $rtrn_array = array();
                    foreach ($selected_val['temp'] as $temp) {
                        $rtrn_array[] = '"' . $temp . '"';
                    }
                    echo implode(",", $rtrn_array)
                    ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
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
            },
            responsive: true
        }
    });

</script>
</body>
</html>