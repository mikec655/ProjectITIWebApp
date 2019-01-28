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
            <h1><?php if(isset($_GET['station'])) echo "Weather Data History of Station " . $_GET['station'] ?></h1>
                <form action= "history.php" method="get">
                    <b>stations</b><input type="text" value="<?php if(isset($_GET['station'])) echo $_GET['station']; ?>" name="station">
                    <b>Date</b><input type="date" name="date"
                           value=<?php if(isset($_GET['date'])) echo $_GET['date']; else echo $today; ?>
                           min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>
                    <input type="submit">
                </form>
            </div>
        </div>
        <table>

            
            <?php
            if(isset($_GET['station']) and isset($_GET['date'])){
                include("inc/dataReader.php");
                $station = readDataOfStation($_GET['date'], $_GET['station'], "11000001000", 60, FALSE);
                if ($station == -1){
                    echo "Unknown Station or Invalid Date";
                } else {
                    echo "<tr><th>Time</th><th>Temperature</th><th>Rainfall</th></tr>"; 
                    for($i = 0; $i < count($station['time']); $i++){
                        $time = date("H:i", $station['time'][$i] / 1000);
                        $temp = round($station['temp'][$i], 1);
                        $prcp = round($station['prcp'][$i], 2);
                        echo "<tr><th>$time</th><td>$temp</td><td>$prcp</td></tr>";
                    }
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
