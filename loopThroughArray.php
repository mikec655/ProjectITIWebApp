<?php

include ("inc/stationsasia.php"); 
include ("inc/countriesasia.php");

// $countriesasia
// $stationsasia
$countryname = '';
$myArray = array();
$arr = '';
$station = '';

if(isset($_GET['station'])){
    foreach($stationsasia as $stations){
        if ($stations[0] == $_GET['station']){
            $countryname = $stations[2];                
        }
    }
}

foreach($stationsasia as $stations2){
    if ($stations2[2] == $countryname){
        array_push($myArray, $stations2[1]);   
    }             
}


?>