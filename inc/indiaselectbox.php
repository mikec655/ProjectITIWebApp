<?php
include("stationsasia.php");
foreach($stationsasia as $station){
    echo "<option value='" . $station[0] ."'>" . $station[1] .  "</option>";
}
?>