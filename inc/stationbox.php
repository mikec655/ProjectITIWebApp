<?php
    include("stationsasia.php");
    echo "<select name='station' id='station'>";
    foreach ($stationsasia as $station) {
        if ($_GET["country"] == $station[2]){
            echo "<option value='" . $station[0] . "'>" . $station[1] . "</option>";
        }
    }
    echo "</select>";
?>