<!DOCTYPE html>
<html>
<head>
    <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
    ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
    <?php include ("inc/popup.php"); ?>
    <?php include ("inc/stationsasia.php"); ?>
    <?php include ("inc/countriesasia.php"); ?>
    <?php include ("loopThroughArray.php"); ?>
<body>
<center>  
    <?php
        $timezone = "Asia/Colombo";
        date_default_timezone_set($timezone);
        $today = date("Y-m-d");
        $dateMin28 = new DateTime($today);
        $dateMin28 = $dateMin28->sub(new DateInterval('P28D'));
        $dateMin28 = $dateMin28->format('Y-m-d');
        // $name = '';
        // $country = '';
        // if(isset($_GET['station'])){
        //     foreach($stationsasia as $stations){
        //         if ($stations[0] == $_GET['station']){
        //             $name = $stations[1];
        //             $country = $stations[2];                  
        //         }
        //     }
        // }
    ?>
    <div>
    <h1 id=h1id></h1>
    <form action= "history.php" method="get">
    <div class="wrapper">
    <select name="country" id="country" class="iscountry">
        <?php foreach ($countriesasia as $countries): ?>
        <?php echo "<option value=\"$countries\">$countries</option>"; ?>
        <?php endforeach; ?>
    </select>
    <select name="station" id="station" class="iscountry">
        <?php foreach ($myArray as $stat): ?>
        <?php echo "<option value=\"$stat\">$stat</option>"; ?>
        <?php endforeach; ?>
    </select>
    <div id ='country'></div>
    <h1><?php if(isset($_GET['station'])) echo "Weather Data History of Station " . $_GET['station']. ": "?></h1>
    <!-- <h2><?php if($country !== null){  
                    echo $country . "  " . $name;
                }else {
                    echo 'Country' . $_GET['station'] . 'not in Asia';
        } ?></h2>   -->
        <?php
            if(isset($_GET['submit']) and isset($_GET['country']) ){
                $selected_val = $_GET['station'];  
                $selected_val2 = $_GET['country'];
            }
        ?>
    <b>Date</b><input type="date" name="date" id="date"
        value=<?php if(isset($_GET['date'])) echo $_GET['date']; else echo $today; ?>
        min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>
    <input type="submit" id = 'action' name = 'action' value = 'Download XML'>
    </form>
    </div>
    <table id="table">
    </table>
    <table>
        <?php require("inc/history_table.php");?>
        <?php require("inc/savexmlmodule.php");?>
    </table>
    </center>
    <script>
        $("#country").change(function() {
            country = $("#country").val();
        $("#station").load("inc/stationbox.php?country=" + country);
        $("#h1id").text(country);
        });
        $("#station").change(function() {
            date = $("#date").val();
            station = $("#station").val();
        $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
        });
        $("#station").change( function() {
        $( "button:first" ).trigger( "click" );
        // update( $( "span:last" ) );
        });
    </script>
</head>
</body>
    <div class="footer">
        <?php require("inc/footermodule.php") ?>
    </div>
</html>
