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
    <body>
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
        <div>
            <div>
                <center>  
                    <?php
                    // $timezone = "Asia/Colombo";
                    // date_default_timezone_set($timezone);
                    $today = date("Y-m-d");
                    $dateMin28 = new DateTime($today);
                    $dateMin28 = $dateMin28->sub(new DateInterval('P28D'));
                    $dateMin28 = $dateMin28->format('Y-m-d');
                    ?>
                    <div>
                        <h1 id='h1title'></h1>
                        <h3 id='h3title'></h3>
                        <select name="country" id="country" class="iscountry">
                            <?php
                            foreach ($countriesasia as $countries) {
                                echo "<option value='$countries'>$countries</option>";
                            }
                            ?>
                        </select>
                        <select name="station" id="station" class="iscountry">
                            <?php foreach ($myArray as $stat): ?>
                                <?php echo "<option value=\"$stat\">$stat</option>"; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="date" name="date" id="date"
                                value=<?php
                                if (isset($_GET['date']))
                                    echo $_GET['date'];
                                else
                                    echo $today;
                                ?>
                                min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>        
                        <div id="cheat">
                        </div>
                        <table id="table" style="width: 100%, nowrap;">
                        </table>
                </center>
                <script>
                    $(document).ready(function () {
                        console.log(window.location.search.substr(1));
                        if (window.location.search.substr(1) == "") {
                            country = "INDIA";
                            station = 420710;
                            stationName = "AMRITSAR";

                        } else {
                            var urlParams = new URLSearchParams(window.location.search);
                            station = urlParams.getAll('station');
                            stationName = urlParams.getAll('name');
                            country = urlParams.getAll('country');
                        }
                        $("#country").val(country);
                        $("#station").load("inc/stationbox.php?country=" + country, function() {
                            $("#station").val(station);
                            date = $("#date").val();
                            $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date);
                            $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
                            $("#h1title").text("Weather Data on of Station:");
                            $("#h3title").text(stationName + ", " + country);
                            console.log(station + " " + date);
                        });
                        
                    });
                    var updateTable = function() {
                        country = $("#country").val();
                        station = $("#station").val();
                        $("#station").val($("#station").val());
                        stationName = $("#station option:selected").text();
                        date = $("#date").val();
                        $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date);
                        $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
                        $("#h1title").text("Weather Data on of Station:");
                        $("#h3title").text(stationName + ", " + country);
                    }
                    var updateTableByCountry = function() {
                        country = $("#country").val();
                        station = $("#station option:first").val();
                        $("#station").val($("#station option:first").val());
                        stationName = $("#station option:selected").text();
                        date = $("#date").val();
                        $("#cheat").load("inc/savexmlmodule.php?station=" + station + "&date=" + date);
                        $("#table").load("inc/history_table.php?station=" + station + "&date=" + date);
                        $("#h1title").text("Weather Data on of Station:");
                        $("#h3title").text(stationName + ", " + country);
                    }
                    $("#country").change(function () {
                        country = $("#country").val();
                        $("#station").load("inc/stationbox.php?country=" + country, updateTableByCountry);
                    });
                    $("#station").change(updateTable);
                    $("#date").change(updateTable);
                </script>
            </div>
        </div>
    <center>
        <div id="footer">
            <div class="container">
                <?php include ("inc/footer.php") ?>
            </div>
        </div>
    </center>  
</body>
</html>
