<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Hero Cycles</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- <meta http-equiv="refresh" content="3"> -->
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
                        $name = '';
                        $country = '';
                        if (isset($_GET['station'])) {
                            foreach ($stationsasia as $stations) {
                                if ($stations[0] == $_GET['station']) {
                                    $name = $stations[1];
                                    $country = $stations[2];
                                }
                            }
                        }
                        ?>
                        <div>
                            <h1><?php if (isset($_GET['station'])) echo "Weather Data History of Station " . $_GET['station'] . ": " ?></h1>
                            <h2><?php
                                if ($country !== null) {
                                    echo $country . "  " . $name;
                                } else {
                                    echo 'Country' . $_GET['station'] . 'not in Asia';
                                }
                                ?></h2>   
                            <form action= "history.php" method="get">
                                <select name="country">
                                    <?php foreach ($countriesasia as $countries): ?>
                                        <?php echo "<option value=\"$countries\" >$countries</option>"; ?>
                                    <?php endforeach; ?>
                                </select>

                                <b>Stations</b><input type="text" value="<?php if (isset($_GET['station'])) echo $_GET['station']; ?>" name="station">
                                <b>Date</b>
                                <input type="date" name="date"value=<?php if (isset($_GET['date'])) echo $_GET['date'];
                                    else echo $today; ?>min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>
                                <input type="submit">
                                <input type="submit" id = 'action' name = 'action' value = 'Download XML'>
                            </form>
                        </div>
                        <br>
                        <br>
                        <table>
                            <?php require("inc/history_table.php"); ?>
                            <?php require("inc/savexmlmodule.php"); ?>
                        </table>
                    </center>
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