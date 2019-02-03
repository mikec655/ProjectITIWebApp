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
    ?>
    <div>
    <h1><?php if(isset($_GET['station'])) echo "Weather Data History of Station " . $_GET['station']. ": "?></h1>
    <h1 id=h1id></h1>
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
    <b>Date</b><input type="date" name="date" id="date"
        value=<?php if(isset($_GET['date'])) echo $_GET['date']; else echo $today; ?>
        min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>        
    </div>
    <div id="cheat">
    </div>
    <table id="table">
    </table>
    </center>
    <script>
        $("#country").change(function() {
            country = $("#country").val();
            date = $("#date").val();
            station = $("#station").val();
            action = $("#action").val();
        $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
        $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date + "&action=" + action);
        $("#station").load("inc/stationbox.php?country=" + country);
        $("#h1id").text(country);
        });
        $("#station").change(function() {
            date = $("#date").val();
            station = $("#station").val();
        $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
        $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date);
        });
    </script>
</head>
</body>
    <div class="footer">
        <?php require("inc/footermodule.php") ?>
    </div>
</html>
