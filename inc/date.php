<?php
$timezone = "Asia/Colombo";
        date_default_timezone_set($timezone);
        $today = date("Y-m-d");
        $dateMin28 = new DateTime($today);
        $dateMin28 = $dateMin28->sub(new DateInterval('P28D'));
        $dateMin28 = $dateMin28->format('Y-m-d')
?>