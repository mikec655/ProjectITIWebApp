<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Historical Data - HeroCycles Weather App</title>
        <link rel="icon" href="img/icon.png"/>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- <meta http-equiv="refresh" content="3"> -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    </head>
    <body onload="startTime()">
        <div class="container">
            <?php include("inc/header.php"); ?>
            <?php include ("inc/stationsasia.php"); ?>
            <?php include ("inc/countriesasia.php"); ?>
        </div>
        <div>
            <img src="img/headerHC.jpg" alt="header image" class="headerimg"/>
        </div>
        <div class="login">
                <?php require("inc/loginrequire.php"); ?>
        </div>
        <div class="container">
            <div id="content">
                <div class="col9 grayborder">
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
                <h1 id='text'>Weather Data</h1>
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
                $('text').attr("Weather data", "Weather Data History of Station" + station);
                $("#h1id").text(country);
                });
                $("#station").change(function() {
                    date = $("#date").val();
                    station = $("#station").val();
                $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
                $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date);
                $('text').attr("Weather data", "Weather Data History of Station" + station);
                });
                $("#date").change(function() {
                    country = $("#country").val();
                    date = $("#date").val();
                    station = $("#station").val();
                    action = $("#action").val();
                $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
                $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date + "&action=" + action);
                $('text').attr("Weather data", "Weather Data History of Station" + station);
                });
            </script>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="left"><?php include ("inc/footer.php") ?></div>
            </div>
        </div>
    </body>
</html>
