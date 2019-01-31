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
                    <input type="submit" id = 'action' name = 'action' value = 'Download XML'>
            </form>
        </div>
        <table>
            <?php require("inc/history_table.php"); ?>
            <?php require("inc/savexmlmodule.php");?>
    </head>

    <body onload="startTime()">

    <div id="txt"></div>

        </table>
        </center>
    </body>
        <div class="footer">
        <?php require("inc/footermodule.php") ?>
        </div>

</html>
