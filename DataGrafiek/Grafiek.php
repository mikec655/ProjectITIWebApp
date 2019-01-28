<html>
<head>
    <title>PHP Test</title>
</head>
<body>

<?php
include_once("inc/dataReader.php");
$testCountry = readDataOfCountry("2019-01-21", "INDIA", "110000000000", 60, FALSE);
?>

<select name="per1" id="per1">
    <option selected="selected">Choose one</option>
    <?php
    foreach($testCountry as $stationX) { ?>
        <option value="<?= $stationX['stn'] ?>"><?= $stationX['name'] ?></option>
        <?php
    } ?>
</select>


<form action="#" method="post">
    <select name="Color">
        <?php
        foreach($testCountry as $stationX) { ?>
            <option value="<?= $stationX['stn'] ?>"><?= $stationX['name'] ?></option>
            <?php
        } ?>
    </select>
    <input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
if(isset($_POST['submit'])){
    $selected_val = $_POST['Color'];  // Storing Selected Value In Variable
    echo "You have selected :" .$selected_val;  // Displaying Selected Value
    $selected_val = readDataOfStation("2019-01-21",$selected_val , "11000001000", 60, FALSE);
}
?>
<pre>
    <?php
    print_r($selected_val)
    ?>
</pre>

<canvas id="myChart"  width="200" height="200"></canvas>
<script src="lib/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: 'Weather data of India/' .$selected_val ,
                data: [12, 19, 3, 5, 2, 3],
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
                        beginAtZero:true
                    }
                }]
            }
        }
    });

</script>
</body>
</html>