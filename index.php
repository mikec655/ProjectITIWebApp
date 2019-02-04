<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Home - HeroCycles Weather App</title>
        <link rel="icon" href="img/icon.png"/>
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
            <img src="img/headerHC.jpg" alt="HeroCycles Banner" class="headerimg"/>
        </div>
        <div class="login">
            <center>
                <?php require("inc/loginrequire.php"); ?>
            </center>
        </div>
        <div id="delimiter"></div>
        <div class="container">
            <div class="delimiter"></div>
            <div id="content">
                <div class="col3 grayborder">
                    <center>
                    <h2>Top 10 Temperatures</h2>
                    </center>
                    <br><br>
                    <p style="color: midnightblue">
                        The first page in the menu will show the top 10 warmest stations in Asia. 
                        These stations are sorted by temperature in an ascending order starting with the station that measured that warmest temperature.
                        <br><br><br><br><br>
                        <a href="toptenheat.php">Check out the top 10 warmest stations.</a>
                    </p>
                </div>
                <div class="col3 grayborder">
                    <center>
                    <h2>Rainfall Map</h2>
                    </center>
                    <br><br>
                    <p style="color: midnightblue">
                        The second page in the menu will show an interactive map.
                        The map has several stations marked by raindrops where the rainfall is more than 1 millimeter.
                        <br><br><br><br><br><br>
                        <a href="rainfall.php">Check out the interactive map</a>
                    </p>
                </div>
                <div class="col3 grayborder">
                    <center>
                    <h2>Heat Index</h2>
                    </center>
                    <br><br>
                    <p style="color: midnightblue">
                        The third page in the menu will show a graph of the heatindex per station in India.
                        The graph will show the corrected temperature measured from the last hour.
                        <br><br><br><br><br><br>
                        <a href="toptenheat.php">Check out the corrected temperature.</a>
                    </p>
                </div>
            </div>
            <div class="delimiter"></div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="left"><?php include ("inc/footer.php")?></div>
            </div>
        </div>
    </body>
</html>