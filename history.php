<!DOCTYPE html>
<html>
    <head>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <?php include ("inc/popup.php"); ?>
    <body>
        <center>
            <?php
            $timezone = "Asia/Colombo";
            date_default_timezone_set($timezone);
            $today = date("Y-m-d");

            $dateMin28 = new DateTime($today);
            $dateMin28 = $dateMin28->sub(new DateInterval('P28D'));
            $dateMin28 = $dateMin28->format('Y-m-d')
            ?>
            <div>
            <h1>Weather Data History of Station <?php if(isset($_GET['station'])) echo $_GET['station'] ?></h1>
                <form action= "history.php" method="get">
                    <b>stations</b><input type="text" placeholder="" name="station">
                    <b>Date</b><input type="date" name="date"
                           value=<?php echo $today; ?>
                           min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>
                    <input type="submit">
                </form>
            </div>
        </div>
        <table>

            
            <?php
            if(isset($_GET['station']) or isset($_GET['date'])){
                echo "<tr><th>Time</th><th>Temperature</th><th>Rainfall</th></tr>"; 
                include("inc/dataReader.php");
                $station = readDataOfStation($_GET['date'], $_GET['station'], "11000001000", 60, FALSE);
                for($i = 0; $i < count($station['time']); $i++){
                    $time = $station['time'][$i];
                    $temp = $station['temp'][$i];
                    $prcp = $station['prcp'][$i];
                    echo "<tr><th>$time</th><td>$temp</td><td>$prcp</td></tr>";
                }
            } else {
                echo "Enter date and station!";
            }
            ?>
        </table>
    </center>


</body>


<div class="footer">
    <center>
        <button></i> Download data to XML</button>
    </center>
    <?php
    require("inc/footermodule.php")
    ?>
</div>

</html>
